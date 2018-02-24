<?php
namespace common\models;

use yii\db\ActiveRecord;

class ShowImg extends ActiveRecord{
    public static function tableName(){
        return '{{%show_imgs}}';
    }
    public function rules(){
        return [
          [['class_id','book_id','show_img','squence'],'safe']
        ];
    }
}