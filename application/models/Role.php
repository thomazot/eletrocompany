<?php

class Application_Model_Role extends Application_Model_Abstract
{
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Role();
        $this->_table   = "roles";
    }
    
    protected function _insert(array $data) {
        return $this->_dbTable->insert($data);
    }
    
    protected function _update(array $data) {
        unserialize($data['created_at']);
        return $this->_dbTable->update($data, array("id=?"=> $data["id"]));
    }
}

