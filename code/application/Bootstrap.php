<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initSmarty()
    {
        error_reporting(E_ALL|E_STRICT);
        ini_set('display_errors', 1);
        date_default_timezone_set('Asia/Tokyo');

        define('APP_DIR', dirname(dirname(__FILE__)) . '/application/');
        define('APP_SMARTY_DIR', APP_DIR . '/smarty/');
        define('SMARTY_DIR', '../library/Smarty/libs/');

        // directory setup and class loading
        set_include_path('.' . PATH_SEPARATOR . '../library/'
            . PATH_SEPARATOR . SMARTY_DIR
            . PATH_SEPARATOR . get_include_path());
        require_once 'Zend/Loader/Autoloader.php';
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->setFallbackAutoloader(true);

        // setup controller
        $frontController = Zend_Controller_Front::getInstance();
        $frontController->throwExceptions(true);
        $frontController->setControllerDirectory(APP_DIR . 'controllers');

        // smarty setup
        require_once( SMARTY_DIR .'Smarty.class.php' );
        require_once('../application/smarty/Zend_View_Smarty.class.php');
        
        $view = new Zend_View_Smarty(
            APP_SMARTY_DIR . 'templates',
            array(
                'compile_dir' => APP_SMARTY_DIR . 'templates_c',
                'config_dir'  => APP_SMARTY_DIR . 'configs',
                'cache_dir'   => APP_SMARTY_DIR . 'cache'
            )
        );

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view)
                     ->setViewBasePathSpec($view->getEngine()->template_dir)
                     ->setViewScriptPathSpec(':controller/:action.:suffix')
                     ->setViewScriptPathNoControllerSpec(':action.:suffix')
                     ->setViewSuffix('tpl');
        //Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
        // run!
        //$frontController->dispatch();

        //require_once 'Zend/Controller/Front.php';
        //Zend_Controller_Front::run("../application/controllers");
        
        
        
        
        /*$viewConfig = $this->getOption('view');
        $this->moduleDirectory = APPLICATION_PATH . '/../' . $viewConfig['smarty']['template_dirname'];

        $view = new Base_View_Smarty($this->moduleDirectory, $viewConfig['smarty']);
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper("ViewRenderer");
        $viewRenderer->setView($view)
                    ->setViewBasePathSpec($view->getEngine()->template_dir)
                    ->setViewSuffix('tpl');

        $viewRenderer->setViewScriptPathSpec(':module/:controller/:action.:suffix');*/

    }
}

