<?php
/**
 * Description of ControllerTestCase
 *
 * @author thomaz
 */

require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';

class ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase {
    
    protected $application;
    protected $_db;
    protected $_sql;
    
    public function appBootstrap() {
        $this->application = new Zend_Application(
                APPLICATION_ENV, APPLICATION_PATH . "/configs/application.ini");
        $this->application->bootstrap();
    }
    
    public function setUp() {
        $this->bootstrap = array($this, "appBootstrap");
        parent::setUp();
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    public function tearDown() {
        $this->reset();
        $this->resetResponse();
    }
}