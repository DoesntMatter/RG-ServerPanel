<?php

class BaseModel {

    public static $dbname = '';
    public static $table = '';
    public static $joined_tables = array();
    public static $primary_key = 'id';
    public static $fields = array('*');
    public $data = array();
    public $errors = array();
    private $new;
    private $db;
    private $class_name;

    function __construct($properties=array(), $new=true, $db=null) {
        $this->data = $properties;
        $this->new = $new;
        if (is_null($db)) {
            $db = Environment::get_database(static::$dbname);
        }
        $this->db = $db;
        $this->class_name = get_called_class();
    }

    public function __set($property, $value) {
        return $this->data[$property] = $value;
    }

    public function __get($property) {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        } elseif (method_exists($this, 'get_' . $property)) {
            $func = 'get_' . $property;
            return $this->$func();
        } else {
            return $this->$property;
        }
    }

    public function __isset($property) {
        if (array_key_exists($property, $this->data)) {
            return true;
        } else {
            return isset($this->$property);
        }
    }

    public static function get_fields($db=null) {
        if (empty($db)) {
            $db = Environment::get_database(static::$dbname);
        }
        $fields = $db->columns_array(static::$table);
        array_diff($fields, array('created_at', 'updated_at'));
        return $fields;
    }

    public static function find($type, $options=array(), $db=null) {
        if (empty($db)) {
            $db = Environment::get_database(static::$dbname);
        }
        if ($type == 'all') {
            return static::find_all($options, $db);
        } elseif ($type == 'first' || $type == 'last') {
            return static::find_one($type, $options, $db);
        } elseif (is_numeric($type)) {
            return static::find_by_pk(intval($type), $db);
        } else {
            throw new Exception('Find Error on ' . get_called_class());
        }
    }

    private static function find_all($options, $db) {
        list($sql,$values) = static::get_find_query_and_values($options);
        $class_name = get_called_class();
        $results = $db->query_and_fetch($sql, function($row) use ($class_name, $db) {
                            return $class_name::build($row, false, $db);
                        }, $values);
        return $results;
    }

    private static function find_one($type, $options, $db) {
        if ($type == 'last') {
            $options['order'] = static::$primary_key . ' DESC';
        }
        $options['limit'] = 1;
        list($sql,$values) = static::get_find_query_and_values($options);
        $row = $db->query_and_fetch_one($sql, $values);
        return static::build($row, false, $db);
    }

    private static function find_by_pk($id, $db) {
        $pk = static::$primary_key;
        $options['conditions'] = array("{$pk}=?", $id);
        $options['limit'] = 1;
        list($sql,$values) = static::get_find_query_and_values($options);
        $row = $db->query_and_fetch_one($sql, $values);
        return static::build($row, false, $db);
    }
    
    private static function get_find_query_and_values($options){
        $select = new SqlSelect(static::$table, static::$fields, static::$primary_key);
        if(isset($options['conditions']))
            $select->where($options['conditions']);
        if(isset($options['order']))
            $select->order($options['order']);
        if(isset($options['limit']))
            $select->limit($options['limit']);
        return array((string)$select, $select->sql_values);
    }

    public static function build($data, $new=true, $db=null) {
        if (!empty($data)) {
            $class_name = get_called_class();
            $result = new $class_name($data, $new, $db);
            if (method_exists($result, 'after_build')) {
                $result->after_build();
            }
            return $result;
        } else {
            return false;
        }
    }

    public static function count($options=array(), $db=null) {
        if (empty($db)) {
            $db = Environment::get_database(static::$dbname);
        }
        $table = static::$table;
        $pk = static::$primary_key;
        if (isset($options['conditions'])) {
            $where_str = implode(' AND ', $options['conditions']);
            $sql = "SELECT count($pk) FROM {$table} WHERE $where_str";
        } else {
            $sql = "SELECT count($pk) FROM {$table}";
        }
        $result = $db->query_and_fetch_one($sql);
        return $result["count($pk)"];
    }

    public static function create($params=array(), $db=null) {
        if (empty($db)) {
            $db = Environment::get_database(static::$dbname);
        }
        $obj = static::build($params, true, $db);
        return $obj->save();
    }

    public function reload() {
        if ($obj = static::find($this->{static::$primary_key})) {
            $this->data = $obj->_data;
            return true;
        } else {
            return false;
        }
    }

    public function destroy() {
        $table = static::$table;
        $sql = "DELETE FROM {$table} WHERE id='{$this->id}'";
        $this->db->query($sql);
        return true;
    }

    public function update($data, $db=null) {
        if (is_null($db)) {
            $db = Environment::get_database(static::$dbname);
        }
        $table = static::$table;
        $fields = implode(',', array_keys($data));
        $sets = array();
        foreach ($data as $key => $val) {
            $sets[] = "$key=?";
        }
        $set_part = implode(',', $sets);
        $sql = "UPDATE {$table} SET {set_part} WHERE `id`=" . $this->id;
        return $db->query($sql);
    }

    public function save() {
        if (method_exists($this, 'before_save')) {
            if (!$this->before_save())
                return false;
        }
        $table = static::$table;
        $data = array_intersect_key($this->data, array_flip(static::get_fields()));
        $fields = array_keys($data);
        if ($this->new) {
            $fields = implode(',', $fields);
            $sql = new SQLInsert($table, $fields);
            $sql->values($data);
        } else {
            $sql = new SQLUpdate($table, $fields);
            $sql->set($data);
            $sql->where("id='{$this->id}'");
        }
        if ($this->validate()) {
            $this->db->query($sql);
            if (method_exists($this, 'after_create') && $this->new) {
                $this->after_create();
            } elseif (method_exists($this, 'after_update')) {
                $this->after_update();
            }
            if (method_exists($this, 'after_save')) {
                $this->after_save();
            }
            return true;
        } else {
            return false;
        }
    }

    public function validate() {
        return true;
    }

}