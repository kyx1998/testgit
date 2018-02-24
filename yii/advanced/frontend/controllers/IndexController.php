<?php
namespace frontend\controllers;

use common\common\ErrDesc;
use common\controllers\ReadBaseController;
use common\models\Book;
use common\models\Classification;
use common\models\Edit;
use common\models\ShowImg;
use common\models\Week;

class IndexController extends ReadBaseController{
    public $parent;
    public $layout = 'test';
    public $enableCsrfValidation = false;
    public function Refer($class){
        if($class['parent_id']!=-1){
            $this->parent[] = $class;
            $parent = Classification::find()->where(['class_id'=>$class['parent_id']])->one();
            $this->Refer($parent);
        }else{
            $this->parent[] = $class;
        }
    }
    public function actionGetBook(){
        $class_id = $this->getClientParam('class_id');
        $model = new Book();
        $books = $model->getByClass($class_id);
        return $this->rtJson(ErrDesc::OK,$books);
    }
    public function actionIndex(){
        $classIds = ShowImg::find()->asArray()->groupBy('class_id')->all();
        $top_classes=[];
        foreach($classIds as $id){
            $top_classes[] = Classification::find()->where(['class_id'=>$id['class_id']])->one();
        }
        $show=[];
        foreach($top_classes as $value){
            $show[] = ShowImg::find()->where(['class_id'=>$value['class_id']])->all();
        }
        $new_click = Book::find()->where(['status'=>0])->asArray()->orderBy('click DESC')->all();
        $new_save = Book::find()->where(['status'=>0])->asArray()->orderBy('save DESC')->all();
        $week = Week::getAll();
        $books_click = Book::getAll('click');
        $books_save = Book::getAll('save');
        $books_free = Edit::getBy(0);
        $books_fin = Edit::getBy(2);
        $book = new Book();
        $trees = $book->getByTopClass();

        $classes = [];
        $class = Classification::find()->where(['parent_id'=>-1])->asArray()->all();
        foreach($class as $value){
            $classes[$value['class_name']] = Classification::getChildren($value['class_id']);
        }
        /*print_r($classes);
        die();*/
        return $this->render('index',['top_classes'=>$top_classes,'show'=>$show,'new_click'=>$new_click,'new_save'=>$new_save,'week'=>$week,'books_click'=>$books_click,'books_save'=>$books_save,'books_free'=>$books_free,'books_fin'=>$books_fin,'trees'=>$trees,'classes'=>$classes]);
    }
}