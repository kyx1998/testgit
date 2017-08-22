<?php
include_once 'ConnectDB.php';

function msg_board_table_name()
{
    return 'msg_board';
}
function db_add_msg($title,$msg_img,$msg_content,$ctime){
    $tablename = msg_board_table_name();
    $sqlStr = "insert into ${tablename}(`title`,`msg_img`,`msg_content`,`ctime`) VALUES ($title,$msg_img,$msg_content,$ctime)";

    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}

function db_get_all_msg()
{
    $sqllink = sqlLink();
    $tablename = msg_board_table_name();
    $sqlStr = "select * from ${tablename}";
    $msgInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $msgInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $msgInfos[$i] = $info;
        $i++;
    }
    return $msgInfos;
}

function db_delete_one_msg($msg_id){
    $sqlLink = sqlLink();
    $tableName = msg_board_table_name();
    $sqlStr = "delete from ${tableName} WHERE `msg_id`=${msg_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
//已读
function db_update_prefer($msg_id,$readed){
    $tablename = msg_board_table_name();
    $sqlStr = "update ${tablename} set `readed`=($readed) WHERE `msg_id` = ${msg_id}";
    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}
function db_get_one_msg($msg_id){
    $sqlLink = sqlLink();
    $tableName = msg_board_table_name();
    $sqlStr = "select * from ${tableName} WHERE `msg_id`=${msg_id}";
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}



