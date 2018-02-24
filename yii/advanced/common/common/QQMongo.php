<?php
namespace common\common;

class QQMongo {
    public static $QQCollection = null;

    public static function initCollection()
    {
        if(empty(self::$QQCollection)) {
            $mogo = new \MongoClient();
            $mogo->connect();
            self::$QQCollection = $mogo->qingqing->qingqing;
        }
    }

    /**
     * 生成手机验证码
     */
    public static function genVerifyCode($user_phone)
    {
        self::initCollection();
        $veriyCode = rand(1000, 9999);
        self::$QQCollection->save(['_id' => $user_phone,'code' => $veriyCode]);
        return $veriyCode;
    }
    /**
     * 获取验证码
     */
    public static function getVerifyCode($user_phone)
    {
        self::initCollection();
        $res = self::$QQCollection->findOne(['_id'=>$user_phone]);
        if(empty($res))
            return false;
        return $res['code'];
    }
}