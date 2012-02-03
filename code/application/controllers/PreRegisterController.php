<?php

class PreRegisterController extends Zend_Controller_Action
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
        if(isset($post['address'])) {
            // 仮登録処理
            $newUserAddress = $post['address'];
            print 'なにこれ';
            
            // 仮登録処理クラス
            $result = Model_PreRegister::factory()->registerUser($newUserAddress);
            
            if ($result['msg']) {
                // メール飛ばしたか、飛ばせなかったかみたいなメッセージアサイン
            } else {
                // なーんかエラーだよ
            } 
        }
        
    }

}
