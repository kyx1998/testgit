<?php
namespace test\controllers;

use common\controllers\ReadBaseController;
use yii\test\common\UpFile;

class TestController extends ReadBaseController{
    public function actionUpFile(){
        $file = new UpFile($_FILES);
        print_r($file->upFile());
    }
    public function actionUpImg(){
        $file = new UpFile($_FILES);
        print_r($file->upImg());
    }
}