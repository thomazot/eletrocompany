<?php

class Application_Model_DbTable_Resource extends Zend_Db_Table_Abstract
{

    protected $_name = 'resources';
    protected $_primary = 'id';
    protected $_dependentTables = array('Application_Model_DbTable_Privilege');

}

