<?php

class Application_Model_Role
{

    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Role();
        $this->_table = "roles";
    }
    
    public function save (array $data) {
        $dt = new Zend_Date();
        $dt = $dt->toString('yyyy-MM-dd h:i:s');
        
        $data['created_at'] = $dt;
        $data['updated_at'] = $dt;
        
        $dbTable = new Application_Model_DbTable_Role();
        
        return $dbTable->insert($data);
    }
}

