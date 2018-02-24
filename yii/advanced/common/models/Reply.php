<?php
namespace common\models;

use yii\db\ActiveRecord;

class Reply extends ActiveRecord{
    public static function tableName(){
        return '{{%reply}}';
    }
}