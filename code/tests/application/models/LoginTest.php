<?php

require_once ('../../../application/models/Login.php');
    
class LoginTest extends PHPUnit_Framework_TestCase
{
   
    public function setUp()
    {
        //$this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        //parent::setUp();
    }

    public function testLogin()
    {
        $loginObj = Login::factory();
        
        $id = 'test';
        $pass = 'test';
        $result = $loginObj->login($id ,$pass);
        $this->assertTrue($result['status']);
        
        
        $id = '';
        $pass = '';
        $result = $loginObj->login($id ,$pass);
        $this->assertFalse($result['status']);
        
        // assertions
        /*
        $this->assertModule($urlParams['module']);
        $this->assertController($urlParams['controller']);
        $this->assertAction($urlParams['action']);
        $this->assertQueryContentContains("div#welcome h3", "This is your project's main page");
        
         */
    }


}
