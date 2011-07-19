<?php

class Application_Model_DbTable_Role extends Zend_Db_Table_Abstract
{
    /**
     * Define o nome da tabela
     */
    protected $_name = 'roles';
    /**
     * Define a chave primaria da tabela
     */
    protected $_primary = 'id';
    
    protected $_dependentTables = array('Application_Model_DbTable_Privilege');
}