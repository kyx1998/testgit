<?php
namespace backend\controllers;

use common\controllers\ReadBaseController;
use common\models\Check;
use common\models\Classification;
use common\models\Users;

class CheckController extends ReadBaseController{
    public function actionIndex(){
        $model = Check::find()->asArray()->all();
        $check=[];
        foreach($model as $value){
            $class= Classification::find()->where(['class_id'=>$value['class_id']])->one();
            $value['class_name'] = $class['class_name'];
            $top_class = Classification::find()->where(['class_id'=>$value['top_class_id']])->one();
            $value['top_class_name'] = $top_class['class_name'];
            $check[] = $value;
        }
        return $this->render('index',['check'=>$check]);
    }
    public function actionCheckOn(){
        $user_name = $this->getClientParam('user_name');
        $check_id = $this->getClientParam('check_id');
        $user = Users::find()->where(['user_name'=>$user_name])->one();
        $user->privilege = 2;
        $user->update();
        Check::deleteAll(['check_id'=>$check_id]);
        return $this->redirect(['index']);
    }
    public function actionCheckOut(){
        $check_id = $this->getClientParam('check_id');
        Check::deleteAll(['check_id'=>$check_id]);
        return $this->redirect(['index']);
    }
}