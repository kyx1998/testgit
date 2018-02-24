<?php

namespace common\common;

class ErrDesc {
    const OK = 1;

    const ERR_PHONE_EXIST           = 100;      // 用户名已注册
    const ERR_PARAM                 = 101;      // 参数错误
    const ERR_PHONE_FORMAT          = 102;      // 手机号码格式错误
    const ERR_CK_PWD                = 103;      // 两次密码不对
    const ERR_BOOK_NOT_EXIST       = 104;      // 该类书不存在
    const ERR_VERIFY_CODE           = 105;      // 验证码错误
    const ERR_NAME_PASSWD          = 106;      // 用户名或密码错误
    const ERR_USER_NOT_EXIST        =107;       //用户名不存在
    const ERR_AUTHOR_NOT_EXIST      =108;       //不存在与该书对应的作者
    const ERR_USER_EXIST            =109;        //该用户名已存在
    const ERR_CONTENT               =110;         //内容不能为空
    const ERR_SEND_SMS              = 200;      // 发送短信失败

    const ERR_MENU_CHILD            = 300;      // 目录有孩子,不能删除
    const ERR_NO_CHILD_MENU         = 301;      // 没有子目录

    // 资源相关
    const ERR_UPFILE               = 2000;     // 文件上传错误
    const ERR_FILE_TYPE             =2004;
    const ERR_FILE_NOT_EXIST        = 2001;     // 路径不存在
    const ERR_DOMAIN_NOT            = 2002;     // 域不允许
    const ERR_SENSITIVE_WORD        = 2003;     // 敏感词

    public static $DESC = [
        self::OK                    => 'ok',
        self::ERR_PHONE_EXIST       => '手机号码已注册',
        self::ERR_PARAM             => '参数错误',
        self::ERR_PHONE_FORMAT      => '手机号码格式错误',
        self::ERR_CK_PWD            => '两次密码不对',
        self::ERR_BOOK_NOT_EXIST   => '该类书不存在',
        self::ERR_VERIFY_CODE       => '验证码错误',
        self::ERR_NAME_PASSWD      => '用户名或密码错误',
        self::ERR_USER_NOT_EXIST    =>'用户名不存在',
        self::ERR_AUTHOR_NOT_EXIST  =>'不存在与该书对应的作者',
        self::ERR_USER_EXIST         =>'该用户名已存在',
        self::ERR_CONTENT           =>'内容不能为空',
        self::ERR_SEND_SMS          => '发送短信失败',

        self::ERR_MENU_CHILD        => '目录有孩子,不能删除',
        self::ERR_NO_CHILD_MENU     => '没有子目录',

        self::ERR_UPFILE           => '文件上传错误',
        self::ERR_FILE_TYPE        =>'文件类型错误',
        self::ERR_FILE_NOT_EXIST    => '路径不存在',
        self::ERR_DOMAIN_NOT        => '域不允许',
        self::ERR_SENSITIVE_WORD    => '敏感词',
    ];
}