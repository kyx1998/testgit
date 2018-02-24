<?php
namespace frontend\controllers;

use common\controllers\ReadBaseController;
use common\models\Book;
use common\models\ShowImg;
use common\models\Classification;
use common\models\Users;
use common\models\Week;

class GirlController extends ReadBaseController{
    public $layout='test';
    public $enableCsrfValidation = false;
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
        $imgs = ShowImg::find()->where(['class_id'=>7])->asArray()->orderBy('squence')->all();
        $new_click = Book::find()->where(['status'=>0])->asArray()->orderBy('click DESC')->all();
        $new_save = Book::find()->where(['status'=>0])->asArray()->orderBy('save DESC')->all();
        $books_click = Book::getAll('click');
        $books_save = Book::getAll('save');
        $girl_click = $this->getBooks(Book::find()->where(['top_class_id'=>7])->asArray()->orderBy('click')->all());
        $girl_save = $this->getBooks(Book::find()->where(['top_class_id'=>7])->asArray()->orderBy('save')->all());
        $week = Week::find()->where(['top_class_id'=>7])->asArray()->orderBy('squence DESC')->all();
        $weeks=[];
        foreach($week as $value){
            $weeks[] = Book::find()->where(['book_id'=>$value['book_id']])->asArray()->one();
        }
        $weeks = $this->getBooks($weeks);
        $girl_new = $this->getBooks(Book::find()->andWhere(['top_class_id'=>7,'status'=>0])->asArray()->orderBy('click DESC')->all());
        $girl_serial = $this->getBooks(Book::find()->andWhere(['top_class_id'=>7,'status'=>1])->asArray()->orderBy('click DESC')->all());
        $girl_com = $this->getBooks(Book::find()->andWhere(['top_class_id'=>7,'status'=>2])->asArray()->orderBy('click DESC')->all());
        return $this->render('index',['imgs'=>$imgs,'new_click'=>$new_click,'new_save'=>$new_save,'week'=>$weeks,'books_click'=>$books_click,'book_save'=>$books_save,'girl_click'=>$girl_click,'girl_save'=>$girl_save,'girl_new'=>$girl_new,'girl_serial'=>$girl_serial,'girl_com'=>$girl_com]);
    }
}