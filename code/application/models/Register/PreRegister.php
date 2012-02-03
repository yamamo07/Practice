<?php
//
//    Copyright (c) 2008 DWANGO Co., LTD.
//    All rights reserved.
//
//
//    $Id$ 
//
/**
 * 仮登録クラス
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
    
    public function registerUser($newUserAddress)
    {
        
        if (!$newUserAddress) {
            $result['status'] = false;
            $result['err_msg'] = '記入漏れあるよ';
            return $result;
        }
        
        // バリデーションはのちほど
        
        // 仮登録用コード生成
        $timeStamp = time();
        $preRegisterCode = MD5($timeStamp);
        
        // DB書き込みクラス
        $dbResult = Model_PreRegisterInfoDao::factory()->insert($newUserAddress, $preRegisterCode);
        
        // メール送信クラス
        if ($dbResult) {
            $mailResult = Model_SendPreRegisterMail::factory()->send($newUserAddress, $preRegisterCode);
        }
        
        if ($mailResult) {
            // メール送信できた
            $result['status'] = true;
        } else {
            // メール送信できなかった
            $result['status'] = false;
        }
        
        return $result;
    }
    
}
