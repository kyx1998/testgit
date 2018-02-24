<?php
namespace common\models;

use yii\db\ActiveRecord;

class Check extends ActiveRecord{
    public static function tableName(){
        return '{{%check}}';
    }
    public function rules(){
        return [
            [['user_name','book_name','book_link','book_content','top_class_id','class_id','ctime'],'safe']
        ];
    }
}