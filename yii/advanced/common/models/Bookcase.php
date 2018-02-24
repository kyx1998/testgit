<?php
namespace common\models;

use yii\db\ActiveRecord;

class Bookcase extends ActiveRecord{
    public static function tableName(){
        return '{{%bookcase}}';
    }
}