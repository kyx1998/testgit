<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\controllers\ReadBaseController;
use common\models\Users;
use common\models\Book;
use common\models\Classification;

class SearchController extends ReadBaseController{
    public $layout = 'test';
    public $enableCsrfValidation = false;
    public $book;
    public function getBooks($books){
        for($i=0;$i<count($books);$i++){
            $class = Classification::find()->select(['class_name'])->where(['class_id'=>$books[$i]['class_id']])->asArray()->one();
            $user = Users::find()->where(['user_id'=>$books[$i]['user_id']])->asArray()->one();
            $books[$i]['class_name'] = $class['class_name'];
            $books[$i]['user_name'] = $user['user_name'];
        }
        return $books;
    }
    public function actionIndex(){
        $name = $this->getClientParam('name');
        $value = $this->getClientParam('value');
        $req = $this->getClientParam('req');
        $status = $this->getClientParam('status');
        if($name=='' || $value==''){
            return $this->redirect(['index/index']);
        }
        switch($name){
            case 'book_name':
                $books = Book::find()->where(['like',$name,[$value]])->asArray()->all();
                $this->book = $this->getBooks($books);
                break;
            case 'user_name':
                $books = Book::find()->where(['like',$name,[$value]])->asArray()->all();
                $this->book = $this->getBooks($books);
                break;
            case 'book_content':
                $books = Book::find()->where(['like',$name,[$value]])->asArray()->all();
                $this->book = $this->getBooks($books);
                break;
        }
        if(empty($req) && empty($status)){
        return $this->render('index',['books'=>$this->book]);
        }elseif(!empty($req)){
            $this->book = $this->ArrSort($this->book,$req);
            return $this->render('index',['books'=>$this->book]);
        }elseif(!empty($status)){
            $this->book = $this->Status($this->book,$status);
            return $this->render('index',['books'=>$this->book]);
        }
    }
    //二维数组排序
    public function ArrSort($books,$req){
        foreach($books as $key=>$value){
            $num1[$key] = $value[$req];
        }
        array_multisort($num1,SORT_ASC,$books);
        return $books;
    }
    public function Status($books,$status){
        $book=[];
        foreach($books as $value){
            if($value['status']==$status){
                $book[] = $value;
            }
        }
        return $book;
    }
}