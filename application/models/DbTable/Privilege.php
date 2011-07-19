<?php

class Application_Model_DbTable_Privilege extends Zend_Db_Table_Abstract
{

    protected $_name = 'privileges';
    protected $_primary = 'id';

    protected $_referenceMap = array (
        'Role' => array (
            'columns'       => 'role_id',
            'refTableClass' => 'Application_Model_DbTable_Role',
            'refColumns'    => 'id'
        ),
        'Resource' => array (
            'columns'       => 'resource_id',
            'refTableClass' => 'Application_Model_DbTable_Resource',
            'refColumns'    => 'id'
        )
    );
}

