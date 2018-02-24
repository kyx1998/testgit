<?php
namespace backend\controllers;

use common\common\ErrDesc;
use common\controllers\ReadBaseController;
use common\models\Book;
use common\models\Classification;
use common\models\Edit;
use common\models\Users;

class EditController extends ReadBaseController{
    public function actionIndex(){
        $edit = Edit::find()->asArray()->all();
        $books=[];
        $classes=[];
        $user=[];
        foreach($edit as $value){
            $book = Book::find()->where(['book_id'=>$value['book_id']])->one();
            $user[] = Users::find()->where(['user_id'=>$book['user_id']])->one();
            $classes[] = Classification::find()->where(['class_id'=>$book['class_id']])->one();
            $books[] = $book;
        }
        return $this->render('index',['edit'=>$edit,'books'=>$books,'classes'=>$classes,'user'=>$user]);
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
        if(empty($user_id) || empty($book_id)){
            return $this->redirect(['index']);
        }
        $edit = new Edit();
        $edit->book_id = $book_id;
        $edit->user_id = $user_id;
        $edit->insert();
        return $this->redirect(['index']);
    }
    public function actionDel(){
        $edit_id = $this->getClientParam('edit_id');
        Edit::deleteAll(['edit_id'=>$edit_id]);
        return $this->redirect(['index']);
    }
    public function actionUpdatePage(){
        $edit = Edit::find()->asArray()->one();
        $book = Book::find()->where(['book_id'=>$edit['book_id']])->one();
        $user = Users::find()->where(['user_id'=>$edit['user_id']])->one();
        return $this->render('update',['book'=>$book,'user'=>$user,'edit'=>$edit]);
    }
    public function actionUpdate(){
        $book_id = $this->getClientParam('book_id');   //下划线写错了。。。
        $user_id = $this->getClientParam('user_id');
        $edit_id = $this->getClientParam('edit_id');
        if(empty($user_id) || empty($book_id)){
            return $this->redirect(['index']);
        }
        $edit = Edit::find()->where(['edit_id'=>$edit_id])->one();
        $edit->book_id = $book_id;
        $edit->user_id = $user_id;
        //$edit->updateAll(['book_id'=>$book_id,'user_id'=>$user_id],['edit_id'=>$edit_id]);
        $edit->save();
        return $this->redirect(['index']);
    }
}