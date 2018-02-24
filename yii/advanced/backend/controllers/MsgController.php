<?php
namespace backend\controllers;

use common\controllers\ReadBaseController;
use common\models\Book;
use common\models\Msg;
use common\models\Users;

class MsgController extends ReadBaseController{
    public $value;
    public function actionIndex(){
        $msg = Msg::find()->asArray()->all();
        $user=[];
        $book=[];
        foreach($msg as $value){
            $user[]=Users::find()->where(['user_id'=>$value['user_id']])->one();
            $book[]=Book::find()->where(['book_id'=>$value['book_id']])->one();
        }
        return $this->render('index',['msg'=>$msg,'user'=>$user,'book'=>$book]);
    }
    public function actionDel(){
        $msg_id = $this->getClientParam('msg_id');
        Msg::deleteAll(['msg_id'=>$msg_id]);
        return $this->redirect(['index']);
    }
    public function actionSearchPage(){
        $msg=[];
        $book=[];
        $user=[];
        return $this->render('search',['msg'=>$msg,'book'=>$book,'user'=>$user]);
    }
    public function actionSearch(){
        $user_name = $this->getClientParam('user_name');
        $book_name = $this->getClientParam('book_name');
        if(empty($user_name)){
            $book = Book::find()->where(['book_name'=>$book_name])->one();
            $msg = Msg::find()->where(['book_id'=>$book['book_id']])->asArray()->all();
            $user=[];
            foreach($msg as $value){
                $user[] = Users::find()->where(['user_id'=>$value['user_id']])->one();
            }
            return $this->render('search',['msg'=>$msg,'book'=>$book,'user'=>$user]);
        }else{
            $user = Users::find()->where(['user_name'=>$user_name])->one();
            $msg = Msg::find()->where(['user_id'=>$user['user_id']])->asArray()->all();
            $book=[];
            foreach($msg as $value){
                $book[] = Book::find()->where(['book_id'=>$value['book_id']])->one();
            }
            return $this->render('search',['msg'=>$msg,'book'=>$book,'user'=>$user]);
        }
    }
}