<?php
include_once 'ConnectDB.php';

function reply_msg_table_name()
{
    return 'reply_msg';
}
function db_add_reply($reply_content,$reply_img,$ctime,$msg_id){
    $tablename = reply_msg_table_name();
    $sqlStr = "insert into ${tablename}(`reply_content`,`reply_img`,`ctime`,`msg_id`) VALUES ($reply_content,$reply_img,$ctime,$msg_id)";

    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}
function db_get_all_reply()
{
    $sqllink = sqlLink();
    $tablename = reply_msg_table_name();
    $sqlStr = "select * from ${tablename}";
    $replyInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $replyInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $replyInfos[$i] = $info;
        $i++;
    }
    return $replyInfos;
}

function db_delete_one_reply($reply_id){
    $sqlLink = sqlLink();
    $tableName = reply_msg_table_name();
    $sqlStr = "delete from ${tableName} WHERE `reply_id`=${reply_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_get_reply($msg_id){
    $sqlLink = sqlLink();
    $tableName = reply_msg_table_name();
    $sqlStr = "select *from ${tableName} where `msg_id` = ${msg_id}";
    $replyInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $replyInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $replyInfos[$i] = $info;
        $i++;
    }
    return $replyInfos;
}