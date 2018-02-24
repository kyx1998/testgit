<?php
namespace frontend\controllers;

use common\common\ErrDesc;
use common\controllers\ReadBaseController;
use common\models\Users;

class UserController extends ReadBaseController{
    public $layout = 'test';
    public function actionCheckUser(){
        $user_name = $this->getClientParam('user_name');
        if(empty(Users::find()->where(['user_name'=>$user_name])->one())){
            return $this->rtJson(ErrDesc::OK);
        }
        return $this->rtJson(ErrDesc::ERR_USER_EXIST);
    }
    public function actionGetCode(){
        $code = rand(1000,9999);
        return $this->rtJson(ErrDesc::OK,['code'=>$code]);
    }
    public function actionLogin(){
        session_start();
        if(!empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['index/index']);
        }
        $user_name = $this->getClientParam('user_name');
        $password = $this->getClientParam('password');
        if(empty($user_name)||empty($password)){
            return $this->render('login');
        }
        if(empty(Users::findOne(['user_name'=>$user_name, 'password'=>$password]))){
            /*$user = Users::find();
            $info = $user->andWhere(['user_name'=>$user_name, 'password'=>$password])->one();    //打印sql语句
            $sql = $user->createCommand()->getRawSql();
            print_r($sql);
            die();*/
            return $this->render('login',['errmsg'=>ErrDesc::$DESC[ErrDesc::ERR_NAME_PASSWD]]);
        }
        \Yii::$app->session['user_name'] = $user_name;
        return $this->redirect(['index/index']);
    }
    public function actionRegisterPage($errmsg=''){
        $code = rand(1000,9999);
        return $this->render('register',['code'=>$code,'errmsg'=>$errmsg]);
    }
    public function actionRegister(){
        if(!empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['index/index']);
        }
        $user_name = $this->getClientParam('user_name');
        $password = $this->getClientParam('password');
        if(empty($user_name) || empty($password)){
            return $this->redirect(['register-page','errmsg'=>ErrDesc::$DESC[ErrDesc::ERR_NAME_PASSWD]]);   //重定向数据以get方式显示在下一页面，会在url中显示
        }
        $user = new Users();
        $user->user_name = $user_name;
        $user->password = $password;
        $user->save();
        return $this->redirect(['index/index']);
    }
    public function actionLoginOut(){
        $session = \Yii::$app->session;
        $session->remove('user_name');
        return $this->redirect(['index/index']);
    }
}