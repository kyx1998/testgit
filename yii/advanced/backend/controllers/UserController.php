<?php
namespace backend\controllers;

use common\common\ErrDesc;
use common\controllers\ReadBaseController;
use common\models\Users;

class UserController extends ReadBaseController{
    public $layout=false;
    public function actionLogin(){
        $user_name = $this->getClientParam('user_name');
        $password = $this->getClientParam('password');
        if(empty($user_name)||empty($password)){
            return $this->render('login',['errmsg'=>ErrDesc::$DESC[ErrDesc::ERR_NAME_PASSWD]]);
        }
        $user = Users::findOne(['user_name'=>$user_name, 'password'=>$password]);
        if($user['privilege']!=0){
            return $this->render('login',['errmsg'=>ErrDesc::$DESC[ErrDesc::ERR_PARAM]]);
        }
        return $this->redirect(['index/index']);
    }
}