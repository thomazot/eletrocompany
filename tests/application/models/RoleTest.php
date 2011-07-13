<?php

/**
 * Description of RoleTest
 *
 * @author thomaz
 */
class RoleTest extends ControllerTestCase {
    private $_data = array();
    private $_role = null;
    
    public function setUp() {
        parent::setUp();
        $this->_data[0]['name'] = "Admin";
        $this->_data[1]['name'] = "Vendedor";
        
        $this->_role = new Application_Model_Role();
        
        $this->_db->query($this->_sql['create']['roles']);
    }
    
    public function tearDown() {
        parent::tearDown();
        $this->_db->query($this->_query['drop']['roles']);
    }

    public function testVerificaTipoModel() {
        $this->assertInstanceOf("Application_Model_Role", new Application_Model_Role());
    }
    
    public function testDeveInserirNovaRole() {
        $result = $this->_role->save($this->_data[0]);
        $this->assertEquals(1, $result);
        
        # Triangulando
        $result = $this->_role->save($this->_data[1]);
        $this->assertEquals(2, $result);
    }
}