<?php
namespace backend\controllers;

use common\common\ErrDesc;
use common\controllers\ReadBaseController;
use common\models\Week;
use common\models\Book;
use common\models\Classification;
use common\models\Users;

class WeekController extends ReadBaseController{
    public function actionIndex(){
        $week = Week::find()->asArray()->all();
        $books=[];
        $classes=[];
        $user=[];
        foreach($week as $value){
            $book = Book::find()->where(['book_id'=>$value['book_id']])->one();
            $user[] = Users::find()->where(['user_id'=>$book['user_id']])->one();
            $classes[] = Classification::find()->where(['class_id'=>$value['top_class_id']])->one();
            $books[] = $book;
        }
        return $this->render('index',['week'=>$week,'books'=>$books,'classes'=>$classes,'user'=>$user]);
    }
    public function actionCheckBook(){
        $book_name = $this->getClientParam('book_name');
        $book = Book::find()->where(['book_name'=>$book_name])->one();
        if(empty($book)){
            return $this->rtJson(ErrDesc::ERR_BOOK_NOT_EXIST);
        }
        return $this->rtJson(ErrDesc::OK,$book);
    }
    public function actionCheckUser(){
        $user_name = $this->getClientParam('user_name');
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        if(empty($user)){
            return $this->rtJson(ErrDesc::ERR_USER_NOT_EXIST);
        }
        $book = Book::find()->where(['user_id'=>$user['user_id']])->all();
        if(empty($book)){
            return $this->rtJson(ErrDesc::ERR_AUTHOR_NOT_EXIST);
        }else{
            return $this->rtJson(ErrDesc::OK,$user);
        }
    }
    public function actionAdd(){
        $user_id = $this->getClientParam('user_id');
        $book_id = $this->getClientParam('book_id');
        $squence = $this->getClientParam('squence');
        if(empty($user_id) || empty($book_id)){
            return $this->redirect(['index']);
        }
        $book = Book::find()->where(['book_id'=>$book_id])->one();
        $class = Classification::find()->where(['class_id'=>$book['class_id']])->one();
        $week = new Week();
        $week->top_class_id = $class['parent_id'];
        $week->squence = $squence;
        $week->book_id = $book_id;
        $week->user_id = $user_id;
        $week->insert();
        return $this->redirect(['index']);
    }
    public function actionDel(){
        $week_id = $this->getClientParam('week_id');
        Week::deleteAll(['week_id'=>$week_id]);
        return $this->redirect(['index']);
    }
    public function actionUpdatePage(){
        $week = Week::find()->asArray()->one();
        $book = Book::find()->where(['book_id'=>$week['book_id']])->one();
        $user = Users::find()->where(['user_id'=>$week['user_id']])->one();
        return $this->render('update',['book'=>$book,'user'=>$user,'week'=>$week]);
    }
    public function actionUpdate(){
        $book_id = $this->getClientParam('book_id');   //下划线写错了。。。
        $user_id = $this->getClientParam('user_id');
        $week_id = $this->getClientParam('week_id');
        $squence = $this->getClientParam('squence');
        if(empty($user_id) || empty($book_id)){
            return $this->redirect(['index']);
        }
        $book = Book::find()->where(['book_id'=>$book_id])->one();
        $class = Classification::find()->where(['class_id'=>$book['class_id']])->one();
        $week = Week::find()->where(['week_id'=>$week_id])->one();
        $week->top_class_id = $class['parent_id'];
        $week->squence = $squence;
        $week->book_id = $book_id;
        $week->user_id = $user_id;
        //$edit->updateAll(['book_id'=>$book_id,'user_id'=>$user_id],['edit_id'=>$edit_id]);
        $week->save();
        return $this->redirect(['index']);
    }
}