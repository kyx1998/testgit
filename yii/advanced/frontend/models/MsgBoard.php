<?php
namespace frontend\models;

use yii\db\ActiveRecord;

class MsgBoard extends ActiveRecord{
    public static function tableName(){
        return 'm_board';
    }
}