<?php
namespace backend\controllers;

use common\controllers\ReadBaseController;
use Yii;

class IndexController extends ReadBaseController{
    public function actionIndex(){
        return $this->render('index');
    }
}