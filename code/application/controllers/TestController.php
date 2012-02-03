<?php 
class TestController extends Zend_Controller_Action  
{ 
    function helloAction() 
    {   
        $this->view->name = 'yossy';
    }   
}