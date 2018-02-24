<?php
namespace backend\controllers;

use common\controllers\ReadBaseController;
use common\models\Book;
use common\models\Users;
use common\models\Classification;
use common\common\Tree;
use common\common\ErrDesc;

class BookController extends ReadBaseController{
    public $parent;
    public function actionCheckAuthor(){
        $user_name = $this->getClientParam('user_name');
        $user = Users::find()->andWhere(['user_name'=>$user_name,'privilege'=>2])->one();
        if(!empty($user)){
            return $this->rtJson(ErrDesc::OK,$user);
        }
        return $this->rtJson(ErrDesc::ERR_AUTHOR_NOT_EXIST);
    }
    public function actionGetChild(){
        $class_id = $this->getClientParam('class_id');
        if(empty($class_id)) {
            return $this->rtJson(ErrDesc::ERR_PARAM);
        }
        $classes = Classification::find()->where(['parent_id'=>$class_id])->asArray()->all();
        return $this->rtJson(ErrDesc::OK, $classes);
    }
    public function actionAdd(){
        if(empty($this->requestData)){
            $classes = Classification::find()->where(['parent_id'=>-1])->all();
            //$tree = new Tree($classes);           //Tree不能接收一个空的数组
            return $this->render('add',['classes'=>$classes]);
        }
        $book = new Book();
        $user = Users::find()->where(['user_name'=>$this->requestData['user_name']])->one();
        $class = Classification::find()->where(['class_id'=>$this->requestData['class_id']])->one();
        $this->requestData['user_id'] = $user['user_id'];
        $this->requestData['top_class_id'] = $class['parent_id'];
        $this->requestData['ctime'] = strtotime($this->requestData['ctime']);
        $book->attributes = $this->requestData;
        /*print_r($this->requestData);
        die();*/
        $book->save();
        return $this->redirect(['list']);
    }
    public function actionList(){
        $books = Book::find()->asArray()->all();
        $user =[];
        $classes=[];
        $top_classes=[];
        foreach($books as $book){
            $user[] = Users::find()->where(['user_id'=>$book['user_id']])->one();
            $classes[] = Classification::find()->where(['class_id'=>$book['class_id']])->one();
            $top_classes[] = Classification::find()->where(['class_id'=>$book['top_class_id']])->one();
        }
        return $this->render('list',['books'=>$books,'user'=>$user,'classes'=>$classes,'top_classes'=>$top_classes]);
    }
    public function actionDel(){
        $book_id = $this->getClientParam('book_id');
        Book::deleteAll(['book_id'=>$book_id]);
        return $this->redirect(['list']);
    }
    public function Refer($class){
        if($class['parent_id']!=-1){
            $this->parent[] = $class;
            $parent = Classification::find()->where(['class_id'=>$class['parent_id']])->one();
            $this->Refer($parent);
        }else{
            $this->parent[] = $class;
        }
    }
    public function actionUpdatePage(){
        $book_id = $this->getClientParam('book_id');
        $book = Book::find()->where(['book_id'=>$book_id])->one();
        $user = Users::find()->where(['user_id'=>$book['user_id']])->one();
        $class = Classification::find()->where(['class_id'=>$book['class_id']])->one();
        $this->Refer($class);      //递归寻所有父母，数组最后一个即为祖先
        $classes=[];
        foreach($this->parent as $value){
            $classes[] = Classification::find()->where(['parent_id'=>$value['parent_id']])->all();
        }
        return $this->render('update',['book'=>$book,'user'=>$user,'class'=>$this->parent,'classes'=>$classes]);
    }
    public function actionUpdate(){
        $book_id = $this->requestData['book_id'];
        if(empty($book_id)){
            return $this->redirect('list');
        }
        $book = Book::find()->where(['book_id'=>$book_id])->one();
        $class = Classification::find()->where(['class_id'=>$this->requestData['class_id']])->one();
        $this->requestData['top_class_id'] = $class['parent_id'];
        $this->requestData['ctime'] = strtotime($this->requestData['ctime']);
        $book->book_name = $this->requestData['book_name'];
        $book->book_link = $this->requestData['book_link'];
        $book->book_img = $this->requestData['book_img'];
        $book->book_content = $this->requestData['book_content'];
        $book->top_class_id = $this->requestData['top_class_id'];
        $book->class_id = $this->requestData['class_id'];
        $book->user_id = $this->requestData['user_id'];
        $book->status = $this->requestData['status'];
        $book->ctime = $this->requestData['ctime'];
        $book->update();
        return $this->redirect(['list']);
    }
}