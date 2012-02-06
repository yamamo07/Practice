<?php
//
//    Copyright (c) 2008 DWANGO Co., LTD.
//    All rights reserved.
//
//
//    $Id$ 
//
/**
 * ログインクラス
 */

require_once dirname(__FILE__) . '/../Auth/Auth.php';

class Models_Auth_Login
{
    private function __construct()
    {
    
    }
    
    static public function factory()
    {
		return new self();
    }
    
    public function login($userId, $userPass)
    {
        
        if (!$userId || !$userPass) {
            $result['status'] = false;
            $result['err_msg'] = '記入漏れあるよ';
            return $result;
        }
        
        // バリデーションはのちほど
        
        // 認証クラス
        $result = Models_Auth_Auth::factory()->check($userId, $userPass);
        
        //if ($result['status'] == true) {
        //var_dump($result['status']);
        //}
        return $result;
    }
    
}
