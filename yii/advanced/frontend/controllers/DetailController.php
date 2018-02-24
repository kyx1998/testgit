<?php
namespace frontend\controllers;

use common\controllers\ReadBaseController;
use common\common\ErrDesc;
use common\models\Book;
use common\models\Classification;
use common\models\Msg;
use common\models\Users;

class DetailController extends ReadBaseController{
    public $layout = 'test';
    public $enableCsrfValidation = false;
    public function GetClick(){
        $book_id = $this->getClientParam('book_id');
        $model = Book::find()->where(['book_id'=>$book_id])->one();
        $click = $model['click'];
        $model->click=$click+1;
        $model->update();
    }
    public function actionGetSave(){
        $book_id = $this->getClientParam('book_id');
        $model = Book::find()->where(['book_id'=>$book_id])->one();
        $save = $model['save'];
        $model->save=$save+1;
        $model->update();
        return $this->rtJson(ErrDesc::OK);
    }
    public function actionDetail(){
        $this->GetClick();
        $book_id = $this->getClientParam('book_id');
        $book = Book::find()->where(['book_id'=>$book_id])->one();
        $class = Classification::find()->where(['class_id'=>$book['class_id']])->one();
        $model = new Book();
        $model->Refer($class);
        $classes = $model->parent;

       $books = Book::find()->where(['user_id'=>$book['user_id']])->all();

        $contents = Msg::find()->where(['book_id'=>$book_id])->asArray()->all();
        $users=[];
        foreach($contents as $value){
            $users[] = Users::find()->where(['user_id'=>$value['user_id']])->one();
        }
        $new_click = Book::find()->where(['status'=>0])->orderBy('click DESC')->all();
        $new_save = Book::find()->where(['status'=>0])->orderBy('save DESC')->all();
        $serial_click = Book::find()->where(['status'=>1])->orderBy('click DESC')->all();
        $serial_save = Book::find()->where(['status'=>1])->orderBy('save DESC')->all();
        $complete_click = Book::find()->where(['status'=>2])->orderBy('click DESC')->all();
        $complete_save = Book::find()->where(['status'=>2])->orderBy('save DESC')->all();
        return $this->render('detail',['book'=>$book,'classes'=>$classes,'books'=>$books,'contents'=>$contents,'users'=>$users,'new_click'=>$new_click,'new_save'=>$new_save,'serial_click'=>$serial_click,'serial_save'=>$serial_save,'complete_click'=>$complete_click,'complete_save'=>$complete_save]);
    }
    public function actionMsg(){
        session_start();
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->rtJson(ErrDesc::ERR_PARAM);
        }
        $content = $this->getClientParam('content');
        $user_name = \Yii::$app->session['user_name'];
        $book_id = $this->getClientParam('book_id');
        $ctime = $this->getClientParam('ctime');
        if(empty($content)){
            return $this->rtJson(ErrDesc::ERR_CONTENT);
        }
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $user_id = $user['user_id'];
        $msg = new Msg();
        $msg->content = $content;
        $msg->book_id = $book_id;
        $msg->user_id = $user_id;
        $msg->ctime = strtotime($ctime);
        $msg->save();
        return $this->rtJson(ErrDesc::OK,$user);
    }
}