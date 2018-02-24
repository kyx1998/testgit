<?php
namespace frontend\controllers;

use frontend\models\MsgBoard;
use yii\web\Controller;

class MsgController extends Controller{
    public $layout=false;
    const PREFIX_MSG_BODY_KEY = 'MSG_RECORD_';
    const MSG_KEY = 'MSG_ID_KEY';
    const PREFIX_USERNAME = 'USER_NAME_';
    public function GetMsgID(){
        $redis= \yii::$app->redis;
        return $redis->Incr(self::MSG_KEY);
    }
    public function GetAllKey(){
        $redis= \yii::$app->redis;
        //获取所有有效的key
        $msgBoyKey = $redis->Keys(self::PREFIX_MSG_BODY_KEY . '*');
        return $msgBoyKey;
    }
    public function rtIndex(){
        $msgBoyKey = $this->GetAllKey();
        $redis= \yii::$app->redis;
        foreach($msgBoyKey as $key){
            $arr = $redis->hgetall($key);
            for($i=0;$i<count($arr);$i+=2){          //格式化
                $msg[$arr[$i]]=$arr[$i+1];
            }
            $msginfos[$key] = $msg;
        }
        //ksort($msginfos);
        //print_r($msginfos);
        return $this->render('index',['msginfos'=>$msginfos,'key'=>$key]);
    }
    public function actionUpdate(){
        $msgModel = new MsgBoard();
        $msgBoard = $msgModel->find()->all();
        $redis= \yii::$app->redis;
        foreach($msgBoard as $value){
            $redis->hmset(self::PREFIX_MSG_BODY_KEY .$value['m_id'],'user_name',$value['user_name'],'user_name_md5',$value['user_name_md5'],'content',$value['content'],'ctime',$value['ctime']);
        }
            //$redis->hmset($value['m_id'],$value);
            //print_r($arr);
        return $this->rtIndex();
    }
    public function actionIndex(){
       return $this->rtIndex();
    }
    public function actionAddMsg(){
        //构造一个消息体
        //消息体标识:$msgKey
        //消息发布姓名：$username
        // 消息发布者姓名加密：$md5Username
        //消息体内容$content
        //消息体创建时间：$ctime
        //获取一个msgid
        $username = $_GET['username'];
        $content = $_GET['content'];
        $ctime = time();
        $md5Username = md5($username);
        $msgModel = new MsgBoard();
        $msgModel->user_name = $username;
        $msgModel->user_name_md5 = $md5Username;
        $msgModel->content = $content;
        $msgModel->ctime = $ctime;
        $msgModel->insert();
        //插入数据
        return $this->actionUpdate();
    }
    public function actionDelMsg(){
        $msgKey = $_GET['msgKey'];
        $msgId = substr($msgKey,11);
        $msgModel = new MsgBoard();
        $msgModel->m_id = $msgId;
        $msgModel->findOne($msgId)->delete();
        $redis= \yii::$app->redis;
        $redis->del($msgKey);
        return $this->rtIndex();
    }
    public function actionUpdatePage(){
        $msgKey = $_GET['msgKey'];
        $msgId = substr($msgKey,12);
        $redis= \yii::$app->redis;
        $info = $redis->hgetall($msgId);
        if($info==''){
            $msgModel = new MsgBoard();
            $info = $msgModel->find()->where(['m_id'=>$msgId])->all();
            $this->actionUpdate();
            return $this->render('up',['info'=>$info]);
        }else{
            return $this->render('up',['info'=>$info]);
        }
        //print_r($info);
    }
}