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

class Login
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
        $result = Model_Auth::factory()->auth($userId, $userPass);
        
        $result['status'] = true;
        
        return $result;
    }
    
}
