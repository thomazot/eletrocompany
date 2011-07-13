<?php

class Application_Model_Role extends Application_Model_Abstract
{
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Role();
        $this->_table   = "roles";
    }
}

