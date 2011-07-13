<?php

abstract class Application_Model_Abstract {
    protected $_dbTable;
    protected $_table;
    
    public function save($data) {
        $dt = new Zend_Date();
        $dt = $dt->toString("yyyy-MM-dd h:i:s");
        
        $data["created"] = $dt;
        $data["updated"] = $dt;
        
        if(isset($data["id"]))
            return $this->_update($data);
        else
            return $this->_insert($data);
            
    }
    
    abstract protected function _insert(array $data);
    abstract protected function _update(array $data);
    
}

