<?php

/**
 * Description of RoleTest
 *
 * @author thomaz
 */
class RoleTest extends ControllerTestCase {
    
    public function testVerificaTipoModel() {
        $this->assertInstanceOf("Application_Model_Role", new Application_Model_Role());
    }
}