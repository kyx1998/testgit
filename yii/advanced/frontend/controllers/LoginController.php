<?php
namespace frontend\controllers;

use frontend\models\Admin;
use yii\web\Controller;

class LoginController extends MsgBaseController{
    public static function Admin(){
        $admin = new Admin();
        return $admin;
    }
    public function actionCheckUserName(){
        $userName = $this->getClientParam('username');
        if($this->Admin()->findone(['name'=>$userName])){
            return $this->asJson('ok');
        }else{
            return $this->asJson('error');
        }
    }
    public function CheckPassWord(){
        $pwd =md5($this->getClientParam('password'));

        if($this->Admin()->findone(['password'=>$pwd])){
            return $this->render('index');
        }else{
            return $this->render('login','用户名或密码错误');
        }
    }
}