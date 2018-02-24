<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'defaultRoute'=>'index',                    //默认路由只想site，全局配置中改为index（自己加的参数）
    'components' => [
        'redis' => [
        'class' => 'yii\redis\Connection',
        'hostname' => 'localhost',
        'port' => 6379,
        'database' => 0,
    ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=airead',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];
