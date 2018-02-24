<?php
namespace common\models;

use yii\db\ActiveRecord;

class Week extends ActiveRecord{
    public static function tableName(){
        return '{{%week_recommend}}';
    }
    public static function getAll(){
        $week = self::find()->limit(5)->asArray()->orderBy('squence')->all();
        for($i=0;$i<count($week);$i++){
            $book = Book::find()->where(['book_id'=>$week[$i]['book_id']])->asArray()->one();
            $week[$i]['book_name'] = $book['book_name'];
            $week[$i]['book_link'] = $book['book_link'];
            $week[$i]['book_img'] = $book['book_img'];
            $week[$i]['book_content'] = $book['book_content'];
            $user = Users::find()->where(['user_id'=>$week[$i]['user_id']])->asArray()->one();
            $week[$i]['user_name'] = $user['user_name'];
        }
        return $week;
    }
}