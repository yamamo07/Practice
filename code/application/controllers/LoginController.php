<?php

require_once dirname(__FILE__) . '/../models/Auth/Login.php';

class LoginController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

        // 入力を取得
        $post = $this->getRequest()->getPost();
        if (isset($post['id']) && isset($post['pass'])) {
            // ログイン処理
            $userId = $post['id'];
            $userPass = $post['pass'];
            print 'きたこれ';
            
            // ログインクラス
            $result = Models_Auth_Login::factory()->login($userId, $userPass);
            
            // リダイレクト
            if ($result['status']) {
                $this->view->result = true;
            }
            // エラー
            // 帰ってきたエラーメッセージを表示しましょう
            
        }
    }
}