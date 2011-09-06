<?php

/**
 * 
 */
class SqlS_QueryInsertTest extends PHPUnit_Framework_TestCase {

    var $table = 'testTable';
    var $fields = array('id', 'testid', 'tField1', 'testField2');
    var $fields_str;
    var $pk = 'testid';

    function setUp() {
        $this->fields_str = SqlS_QueryBase::fields_to_sql($this->fields, $this->table);
    }

    function testArgsTableFieldsPK() {
        $sql = new SqlS_QueryInsert($this->table, $this->fields, $this->pk);

        $values = array('tField' => 'Blub');
        $sql->values($values);
        $testString = "INSERT INTO {$this->table} ({$this->fields_str}) VALUES (?)";
        $this->assertEquals($testString, (string) $sql);
        $this->assertEquals($sql->sql_values, array_values($values));
    }

    function testArgsTableFields() {
        $sql = new SqlS_QueryInsert($this->table, $this->fields);

        $values = array('tField' => 'Blub');
        $sql->values($values);
        $testString = "INSERT INTO {$this->table} ({$this->fields_str}) VALUES (?)";
        $this->assertEquals($testString, (string) $sql);
        $this->assertEquals($sql->sql_values, array_values($values));
    }

    function testArgsTable() {
        $sql = new SqlS_QueryInsert($this->table);
        
        $values = array('tField' => 'Blub');
        $sql->values($values);
        $testString = "INSERT INTO {$this->table} VALUES (?)";
        $this->assertEquals($testString, (string) $sql);
        $this->assertEquals($sql->sql_values, array_values($values));
    }

}