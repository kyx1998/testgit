<?php
namespace common\models;

use yii\db\ActiveRecord;

class Msg extends ActiveRecord{
    public static function tableName(){
        return '{{%msg_board}}';
    }
}