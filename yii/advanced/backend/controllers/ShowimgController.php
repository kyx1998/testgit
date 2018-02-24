<?php
namespace backend\controllers;

use common\common\ErrDesc;
use common\controllers\ReadBaseController;
use common\models\Book;
use common\models\Classification;
use common\models\ShowImg;

class ShowimgController extends ReadBaseController{
    public $parent;
    public function Refer($class){
        if($class['parent_id']!=-1){
            $this->parent[] = $class;
            $parent = Classification::find()->where(['class_id'=>$class['parent_id']])->one();
            $this->Refer($parent);
        }else{
            $this->parent[] = $class;
        }
    }
    public function actionCheck(){
        $book_name = $this->getClientParam('book_name');
        $book = Book::find()->where(['book_name'=>$book_name])->one();
        if(empty($book)){
            return $this->rtJson(ErrDesc::ERR_BOOK_NOT_EXIST);
        }
        $class = Classification::find()->where(['class_id'=>$book['class_id']])->one();
        $this->Refer($class);
        $parent = array_pop($this->parent);
        return $this->rtJson(ErrDesc::OK,['parent'=>$parent,'book'=>$book]);
    }
    public function actionAdd(){
        if(empty($this->requestData)){
            $class = Classification::find()->where(['parent_id'=>-1])->asArray()->all();
            return $this->render('add',['class'=>$class]);
        }
        $model = new ShowImg();
        $model->attributes = $this->requestData;
        $model->save();
        return $this->redirect(['list']);
    }
    public function actionList(){
        $show = ShowImg::find()->asArray()->all();
        $book=[];
        $class=[];
        foreach($show as $value){
            $book[] = Book::find()->where(['book_id'=>$value['book_id']])->one();
            $class[] = Classification::find()->where(['class_id'=>$value['class_id']])->one();
        }
        return $this->render('list',['show'=>$show,'book'=>$book,'class'=>$class]);
    }
    public function actionDel(){
        $img_id = $this->getClientParam('img_id');
        ShowImg::deleteAll(['img_id'=>$img_id]);
        return $this->redirect(['list']);
    }
    public function actionUpdatePage(){
        $img_id = $this->getClientParam('img_id');
        $show = ShowImg::find()->where(['img_id'=>$img_id])->one();
        $book = Book::find()->where(['book_id'=>$show['book_id']])->one();
        $class = Classification::find()->where(['parent_id'=>-1])->asArray()->all();
        return $this->render('update',['show'=>$show,'book'=>$book,'class'=>$class]);
    }
    public function actionUpdate(){
        if(empty($this->requestData)){
            return $this->redirect(['update-page']);
        }
        $show = ShowImg::find()->where(['img_id'=>$this->requestData['img_id']])->one();
        $show->attributes = $this->requestData;
        $show->save();
        return $this->redirect(['list']);
    }
}