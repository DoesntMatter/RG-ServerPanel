<?php
class Guild extends BaseModel {
    
    static $table = 'guild';
    static $primary_key = 'guildid';
    static $name_field = 'name';
    static $plural = 'guilds';
    static $fields = array(
        'guildid',
        'name',
        'leaderguid',
        'info',
        'motd',
        'createdate',
        'BankMoney'
    );
    public $leader;
    public $realm;
    
    public static function find($type, $options, $realm){
        self::set_dbname('realm' . $realm->id);
        $result = parent::find($type,$options);
        if(is_array($result)){
            $op =  array_map(function($elem) use ($realm){
                return Guild::add_related_objects($elem, $realm);
            }, $result);
        } elseif(is_object($result)){
            $op = Guild::add_related_objects($result, $realm); 
        } else {
            $op = false;
        }
        return $op;
    }
    
    public static function count($options, $realm){
        self::set_dbname('realm' . $realm->id);
        return parent::count($options);
    }
    
    public static function add_related_objects($obj, $realm){
        $obj->realm = $realm;
        $obj->leader = $realm->find_characters('first', array('conditions' => array('guid = ?', $obj->leaderguid)));
        return $obj;
    }
}
