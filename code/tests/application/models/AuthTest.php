<?php

require_once ('../../../application/models/Auth.php');
    
class AuthTest extends PHPUnit_Framework_TestCase
{
   
    public function setUp()
    {
        //$this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        //parent::setUp();
    }

    public function testAuth()
    {
        $authObj = Auth::factory();
        
        $id = 'test';
        $pass = 'test';
        $result = $authObj->check($id ,$pass);
        $this->assertTrue($result['status']);
        
        
        /*$id = '';
        $pass = '';
        $result = $authObj->check($id ,$pass);
        $this->assertFalse($result['status']);*/
        
    }


}
