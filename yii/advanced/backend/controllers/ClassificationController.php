<?php
namespace backend\controllers;

use common\common\ErrDesc;
use common\common\Tree;
use common\controllers\ReadBaseController;
use common\models\Classification;

class ClassificationController extends ReadBaseController{
    public function actionIndex(){
        $classes = Classification::getMenu();
        if(empty($classes)){
            $this->requestData['classes'] = $classes;
            return $this->render('index',$this->requestData);
        }
        $tree = new Tree($classes);           //Tree不能接收一个空的数组
        $tree->genTree();
        $treeForm = $tree->tree;
        $this->requestData['classes'] = $treeForm;
        return $this->render('index',$this->requestData);
    }
    public function actionAdd(){
        if(empty($this->requestData)){
            return $this->redirect(['index']);
        }
        if(empty($this->requestData['class_name'])){
            $this->requestData['errmsg'] = ErrDesc::$DESC[ErrDesc::ERR_PARAM];
            return $this->redirect(['classification/index','errmsg'=>ErrDesc::$DESC[ErrDesc::ERR_PARAM]]);
        }
        $model = new Classification();
        $model->attributes = $this->requestData;
        $model->save();
        return $this->redirect(['classification/index']);
    }
    public function actionDel(){
        $class_id = $this->getClientParam('class_id');
        if(empty($class_id)){
            return $this->redirect(['index']);
        }
        if((Classification::del($class_id))==1){
            return $this->redirect(['classification/index']);
        }else{
            return $this->redirect(['classification/index','errmsg'=>ErrDesc::$DESC[ErrDesc::ERR_MENU_CHILD]]);
        }
    }
    public function actionUpdatePage(){
        $class_id = $this->getClientParam('class_id');
        //$this->requestData = Classification::find()->where(['class_id'=>$class_id])->one();  //方便，但同时也限制了$this->requestDate数组的大小，无法再向其内部插入数据
        $class = Classification::find()->where(['class_id'=>$class_id])->one();
        $this->requestData['class_id'] = $class['class_id'];
        $this->requestData['class_name'] = $class['class_name'];
        $this->requestData['parent_id'] = $class['parent_id'];
        $classes = Classification::getMenu();
        $tree = new Tree($classes);
        $tree->genTree();
        $treeForm = $tree->tree;
        $this->requestData['classes'] = $treeForm;
        return $this->render('update',$this->requestData);
    }
    public function actionUpdate(){
        $class_id = $this->getClientParam('class_id');
        $class = Classification::find()->where(['class_id'=>$class_id])->one();
        $class->parent_id = $this->requestData['parent_id'];
        $class->class_name = $this->requestData['class_name'];
        $class->update();
        return $this->redirect(['index']);
    }
}