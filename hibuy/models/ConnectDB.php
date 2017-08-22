<?php



function sqlLink()
{
    //global $mysql;
    include '../conf/dababase.php';
    $_sqlLink = connect($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database'], $mysql['port']);
    mysqli_query($_sqlLink,'set names utf8');
    return $_sqlLink;
}

function connect($host='localhost', $user='root', $password='', $database='hibuy', $port='3306')
{
    $sqlLink = mysqli_connect($host, $user, $password, $database, $port) or die('数据库连接失败:'. mysqli_error($sqlLink));
    return $sqlLink;
}