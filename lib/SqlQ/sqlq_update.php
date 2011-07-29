<?php

class SqlQUpdate extends SqlQBase {

    private $values = array();

    public function __construct($table, $fields, $pk = 'id') {
        parent::__construct($table, $fields, $pk);
    }
    
    public function set($values) {
        $fields = $this->fields;
        $value_keys = array_filter(array_keys($values), function($item) use ($fields){
            return in_array($item, $fields);
        });
        $this->values = array_intersect_key($values, array_flip($value_keys));
        return $this;
    }
    
    function head_part() {
        return "UPDATE {$this->table}";
    }
    
    function fields_part() {
        return '';
    }
    
    function values_part(){
        $sets = $this->fields;
        array_walk($sets, function(&$item){
            $item = $item . '=:' . $item;
        });
        $sets_string = implode(',', $sets);
        return 'SET ' . $sets_string . ' ';
    }
    
    function values_values(){
        $values = array_flip($this->values);
        array_walk($values, function(&$item){
            $item = ':' . $item;
        });
        return array_flip($values);
    }
}