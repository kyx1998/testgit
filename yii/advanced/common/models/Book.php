<?php
namespace common\models;

use yii\db\ActiveRecord;
use common\common\Tree;

class Book extends ActiveRecord{
    public $parent;
    public static function tableName(){
        return '{{%book}}';
    }
    public function rules(){
        return [
            [['book_id','book_name','book_link','book_img','book_content','top_class_id','class_id','user_id','status','click','save','upload','ctime'],'safe']
        ];
    }
    public static function getAll($req){
        $books = self::find()->asArray()->orderBy($req.' '.'DESC')->all();
        for($i=0;$i<count($books);$i++){
            $class = Classification::find()->select(['class_name'])->where(['class_id'=>$books[$i]['class_id']])->asArray()->one();
            $books[$i]['class_name'] = $class['class_name'];
            $user = Users::find()->select(['user_name'])->where(['user_id'=>$books[$i]['user_id']])->asArray()->one();
            $books[$i]['user_name'] = $user['user_name'];
        }
        return $books;
    }
    public static function getBy($status){
        $books = self::find()->where(['status'=>$status])->asArray()->all();
        for($i=0;$i<count($books);$i++){
            $class = Classification::find()->select(['class_name'])->where(['class_id'=>$books[$i]['class_id']])->asArray()->one();
            $user = Users::find()->where(['user_id'=>$books[$i]['user_id']])->asArray()->one();
            $books[$i]['class_name'] = $class['class_name'];
            $books[$i]['user_name'] = $user['user_name'];
        }
        return $books;
    }
    public function getByTopClass(){                      //按男，女，个性三榜分类
        $books = self::getAll('click');
        $classes = Classification::find()->where(['parent_id'=>-1])->asArray()->all();
        $treeForm=[];
        for($i=0;$i<count($classes);$i++){
            for($j=0;$j<count($books);$j++){
                $class = Classification::find()->where(['class_id'=>$books[$j]['class_id']])->asArray()->one();
                $this->Refer($class);
                $class = array_pop($this->parent);
                if($class['class_id']==$classes[$i]['class_id']){
                    $treeForm[$classes[$i]['class_name']][] = $books[$j];
                }
            }
        }
        return $treeForm;
    }
    public function Refer($class){
        if($class['parent_id']!=-1){
            $this->parent[] = $class;
            $parent = Classification::find()->where(['class_id'=>$class['parent_id']])->one();
            $this->Refer($parent);
        }else{
            $this->parent[] = $class;
        }
    }
    public function getByClass($class_id){
        if($class_id>0){
            $books = self::find()->where(['class_id'=>$class_id])->asArray()->all();
            return $books;
        }else{
            $data = $this->getByTopClass();
            return $data[$class_id];
        }
    }
}