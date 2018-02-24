<?php
namespace common\models;

use common\common\ErrDesc;
use yii\db\ActiveRecord;

class Classification extends ActiveRecord{
    public static function tableName(){
        return '{{%classification}}';
    }
    public function rules(){
        return[
            [['parent_id','class_name'],'safe']
        ];
    }
    public static function getChildren($parent_id)
    {
        $children = self::findAll(['parent_id' => $parent_id]);
        return $children;
    }

    public static function getMenu()
    {
        return self::find()->asArray()->all();

    }

    public static function del($class_id)
    {
        $child = self::getChildren($class_id);
        if(!empty($child)) {
            return ErrDesc::ERR_MENU_CHILD;
        }
        self::find()->where(['class_id' => $class_id])->one()->delete();
        return ErrDesc::OK;
    }
}