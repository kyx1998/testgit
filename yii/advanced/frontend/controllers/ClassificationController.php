<?php
namespace frontend\controllers;

use common\controllers\ReadBaseController;
use common\common\ErrDesc;
use common\models\Book;
use common\models\Bookcase;
use common\models\Users;
use common\models\Classification;

class ClassificationController extends ReadBaseController{
    public $layout = 'test';
    public $enableCsrfValidation = false;
    public $books;
    public function actionGetSave(){
        session_start();
        if(empty(\Yii::$app->session['user_name'])) {
            return $this->rtJson(ErrDesc::ERR_PARAM);
        }
        $book_id = $this->getClientParam('book_id');
        $user_name = $this->getClientParam('user_name');
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $model = Book::find()->where(['book_id'=>$book_id])->one();
        $case = new Bookcase();
        $case->user_id = $user['user_id'];
        $case->book_id = $book_id;
        $case->insert();
        $save = $model['save'];
        $model->save=$save+1;
        $model->update();
        return $this->rtJson(ErrDesc::OK);
    }
    public function actionClassification(){
        $top_class_id = $this->getClientParam('top_class_id');
        $class_id = $this->getClientParam('class_id');
        $req = $this->getClientParam('req');
        $status = $this->getClientParam('status');
        if(!empty($top_class_id)){
            $this->GetTopClass($top_class_id);
        }else{
            $this->GetBook($class_id,$req,$status);
        }
        $info = Classification::find()->where(['parent_id'=>-1])->asArray()->all();
        $classes = [];
        foreach($info as $value){
            $classes[] = Classification::getChildren($value['class_id']);
        }
        $book = Book::find()->where(['top_class_id'=>\Yii::$app->session['class_id']])->all();
        $num = count($book);
        $sum = Book::find()->count();
        $page = ceil(count($this->books)/4);
        return $this->render('classification',['info'=>$info,'classes'=>$classes,'sum'=>$sum,'num'=>$num,'books'=>$this->books,'page'=>$page]);
    }
    public function GetTopClass($top_class_id){
        $this->books = Book::find()->where(['top_class_id'=>$top_class_id])->orderBy(\Yii::$app->session['req'])->asArray()->all();
        for($i=0;$i<count($this->books);$i++){
            $class = Classification::find()->select(['class_name'])->where(['class_id'=>$this->books[$i]['class_id']])->asArray()->one();
            $this->books[$i]['class_name'] = $class['class_name'];
            $user = Users::find()->select(['user_name'])->where(['user_id'=>$this->books[$i]['user_id']])->asArray()->one();
            $this->books[$i]['user_name'] = $user['user_name'];
        }
    }
    public function GetBook($class_id,$req,$status){
        if(empty($class_id)){
            if(empty($req)){
                $this->books = Book::getBy($status);
            }else{
                $this->books = Book::getAll($req);
            }
        }else{
            $this->books = Book::find()->where(['class_id'=>$class_id])->asArray()->all();
            for($i=0;$i<count($this->books);$i++){
                $class = Classification::find()->select(['class_name'])->where(['class_id'=>$this->books[$i]['class_id']])->asArray()->one();
                $this->books[$i]['class_name'] = $class['class_name'];
                $user = Users::find()->select(['user_name'])->where(['user_id'=>$this->books[$i]['user_id']])->asArray()->one();
                $this->books[$i]['user_name'] = $user['user_name'];
            }
        }

    }
    public function actionGetClass(){
        $class_id = $this->getClientParam('class_id');
       // $books = Book::find()->where([''])
    }
    public function actionGetReq(){
        $req = $this->getClientParam('req');
    }
    public function actionGetStatus(){
        $status = $this->getClientParam('status');
    }
}