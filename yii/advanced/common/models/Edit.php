<?php
namespace common\models;

use yii\db\ActiveRecord;

class Edit extends ActiveRecord{
    public static function tableName(){
        return '{{%edit_recommend}}';
    }
    public static function getBy($status){
        $edit = self::find()->asArray()->all();
        $books=[];
        foreach($edit as $value){
            $book= Book::find()->where(['book_id'=>$value['book_id']])->asArray()->one();
            if($book['status']==$status){
                $books[] = $book;
            }
        }
        for($i=0;$i<count($books);$i++){
            $class = Classification::find()->select(['class_name'])->where(['class_id'=>$books[$i]['class_id']])->asArray()->one();
            $user = Users::find()->where(['user_id'=>$books[$i]['user_id']])->asArray()->one();
            $books[$i]['class_name'] = $class['class_name'];
            $books[$i]['user_name'] = $user['user_name'];
        }
        /*print_r($books);
        die();*/
        return $books;
    }
}