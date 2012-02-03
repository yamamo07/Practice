<?php
//
//    Copyright (c) 2008 DWANGO Co., LTD.
//    All rights reserved.
//
//
//    $Id$ 
//
/**
 * 認証クラス
 */

require_once ('../../../application/models/Login.php');

class Auth
{
    
    private $config;
    
    private function __construct()
    {
        $config = new Zend_Config_Ini('../application/configs/application.ini', APPLICATION_ENV);
    }
    
    static public function factory()
    {
		return new self();
    }
    
    public function check($userId, $userPass)
    {
        $dbAdapter = Zend_Db::factory($config->db->adapter, $params);
        
        $authAdapter =  new Zend_Auth_Adapter_DbTable($dbAdapter);
        $authAdapter->setTableName($this->memberTableName)
            ->setIdentityColumn($config->authfront->identityColumn)
            ->setCredentialColumn($config->authfront->credentialColumn)
            ->setCredentialTreatment('MD5(?)');

        $authAdapter->setIdentity($userId);
        $authAdapter->setCredential($userPass);

        $result = $this->_auth->authenticate($authAdapter);
        if ($result->isValid())
        {
            // 認証成功(ログインできる。)
            $result['status'] = true;
        }
        else
        {
            // 認証失敗(ログインできない。)
            $result['status'] = false;
        }
        
        //$result['status'] = true;
        
        return $result;
    }
    
}
