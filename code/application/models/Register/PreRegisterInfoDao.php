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

class Models_Register_PreRegisterInfoDao
{
    
    //private $config;
    private $preRegDb;
    
    private function __construct()
    {
        $config = new Zend_Config_Ini('../application/configs/application.ini', APPLICATION_ENV);
        $params = array(
            'host' => $this->config->db->params->host,
            'username' => $this->config->db->params->username,
            'password' => $this->config->db->params->password,
            'dbname' => $this->config->db->params->dbname
        );
        $this->preRegDb = Zend_Db::factory($this->config->db->adapter, $params);
    }
    
    static public function factory()
    {
		return new self();
    }
    
    public function insert($newUserAddress, $preRegisterCode)
    {
        $data = array(
            'address' => $newUserAddress,
            'pre_register_code' => $preRegisterCode,
            'create_date' => date('Y-m-d H:i:s'),
        );
        $result = $this->preRegDb->insert('pre_register_info', $data);
        return $result;
    }
    
    public function findBy (){
        
    }
    
}