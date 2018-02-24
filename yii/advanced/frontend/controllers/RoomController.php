<?php
namespace frontend\controllers;

use common\common\ErrDesc;
use common\controllers\ReadBaseController;
use common\models\Book;
use common\models\Bookcase;
use common\models\Check;
use common\models\Classification;
use common\models\Msg;
use common\models\Users;

class RoomController extends ReadBaseController{
    public $layout='test';
    public function actionReview(){
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['user/login']);
        }
        $user_name = \Yii::$app->session['user_name'];
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $bookcase = Bookcase::find()->where(['user_id'=>$user['user_id']])->asArray()->all();
        $books=[];
        foreach ($bookcase as $value) {
            $book = Book::find()->where(['book_id'=>$value['book_id']])->asArray()->one();
            $user = Users::find()->where(['user_id'=>$book['user_id']])->asArray()->one();
            $class = Classification::find()->where(['class_id'=>$book['class_id']])->asArray()->one();
            $book['user_name'] = $user['user_name'];
            $book['class_name'] = $class['class_name'];
            $books[] = $book;
        }
        return $this->render('review',['books'=>$books]);
    }
    public function actionBasicInfo(){
        session_start();
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['user/login']);
        }
        $user_name = \Yii::$app->session['user_name'];
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $gender = $this->getClientParam('gender');
        if(empty($gender)){
            return $this->render('userInfo',['user'=>$user]);
        }else{
            $user->gender = $gender;
            $user->update();
            return $this->redirect(['room/basic-info']);
        }
    }
    public function actionUserImg(){
        session_start();
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['user/login']);
        }
        $user_name = \Yii::$app->session['user_name'];
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $user_img = $this->getClientParam('user_img');
        if(empty($user_img)){
            return $this->render('userInfo',['user'=>$user]);
        }else{
            $user->user_img = $user_img;
            $user->update();
            return $this->redirect(['room/basic-info']);
        }
    }
    public function actionCgPwd(){
        session_start();
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['user/login']);
        }
        $user_name = \Yii::$app->session['user_name'];
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $password = $this->getClientParam('password');
        if($password!=$user['password']){
            return $this->redirect(['room/basic-info','errmsg'=>'旧密码错误']);
        }
        $new_password = $this->getClientParam('new_password');
        if(empty($new_password)){
            return $this->render('userInfo',['user'=>$user]);
        }else{
            $user->password = $new_password;
            $user->update();
            return $this->render('userInfo',['user'=>$user]);
        }
    }
    public function actionUserBook(){
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['user/login']);
        }
        $user_name = \Yii::$app->session['user_name'];
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $book = Book::find()->where(['user_id'=>$user['user_id']])->asArray()->all();
        $books=[];
        foreach ($book as $value) {
            $book = Book::find()->where(['book_id'=>$value['book_id']])->asArray()->one();
            $class = Classification::find()->where(['class_id'=>$book['class_id']])->asArray()->one();
            $book['class_name'] = $class['class_name'];
            $books[] = $book;
        }
        return $this->render('userBook',['books'=>$books]);
    }
    public function actionUserMsg(){
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->redirect(['user/login']);
        }
        $user_name = \Yii::$app->session['user_name'];
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $msg = Msg::find()->where(['user_id'=>$user['user_id']])->asArray()->all();
        $msgs=[];
        foreach ($msg as $value) {
            $book = Book::find()->where(['book_id'=>$value['book_id']])->asArray()->one();
            $user = Users::find()->where(['user_id'=>$value['user_id']])->asArray()->one();
            $value['book_name'] = $book['book_name'];
            $value['user_name'] = $user['user_name'];
            $value['user_img'] = $user['user_img'];
            $msgs[] = $value;
        }
        return $this->render('userMsg',['msgs'=>$msgs]);
    }
    public function actionAuthor(){
        $classes = Classification::find()->where(['parent_id'=>-1])->asArray()->all();
        return $this->render('author',['classes'=>$classes]);
    }
    public function actionAuthorSub(){
        $class = Classification::find()->where(['class_id'=>$this->requestData['class_id']])->one();
        $this->requestData['top_class_id'] = $class['parent_id'];
        $this->requestData['ctime'] = time();
        $check = new Check();
        $check->attributes = $this->requestData;
        $check->save();
        return $this->redirect(['author']);
    }
    public function actionGetChild(){
        $class_id = $this->getClientParam('class_id');
        if(empty($class_id)) {
            return $this->rtJson(ErrDesc::ERR_PARAM);
        }
        $classes = Classification::find()->where(['parent_id'=>$class_id])->asArray()->all();
        return $this->rtJson(ErrDesc::OK, $classes);
    }
}