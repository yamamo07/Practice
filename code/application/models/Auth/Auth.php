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

//require_once ('../../../application/models/Login.php');

class Models_Auth_Auth
{
    
    private $config;
    
    private function __construct()
    {
        $this->config = new Zend_Config_Ini('../application/configs/application.ini', APPLICATION_ENV);
    }
    
    static public function factory()
    {
		return new self();
    }
    
    public function check($userId, $userPass)
    {
        $params = array(
            'host' => $this->config->db->params->host,
            'username' => $this->config->db->params->username,
            'password' => $this->config->db->params->password,
            'dbname' => $this->config->db->params->dbname
        );
        $dbAdapter = Zend_Db::factory($this->config->db->adapter, $params);
        
        $authAdapter =  new Zend_Auth_Adapter_DbTable($dbAdapter);
        $authAdapter->setTableName($this->config->auth->tableName)
            ->setIdentityColumn($this->config->auth->identityColumn)
            ->setCredentialColumn($this->config->auth->credentialColumn)
            ->setCredentialTreatment('MD5(?)');
        $authAdapter->setIdentity($userId);
        $authAdapter->setCredential($userPass);

        $auth = Zend_Auth::getInstance();
        $authResult = $auth->authenticate($authAdapter);
        if ($authResult->isValid()) {
            // 認証成功(ログインできる。)
            $result['status'] = true;
        } else {
            // 認証失敗(ログインできない。)
            $result['status'] = false;
        }
        
        return $result;
    }
    
}
