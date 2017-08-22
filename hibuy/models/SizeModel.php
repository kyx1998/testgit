<?php
/**
 * 商品尺码操作
 */
include_once 'ConnectDB.php';

function size_table_name()
{
    return 'hb_size';
}

function add_size($size_name,$remark=''){
    $tablename = size_table_name();
    $sqlStr = "insert into ${tablename}(`size_name`,`remark`) VALUES ('${size_name}','${remark}')";
    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}


function get_all_size()
{
    $sqllink = sqlLink();
    $tablename = size_table_name();
    $sqlStr = "select * from ${tablename}";
    $sizeInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $sizeInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $sizeInfos[$i] = $info;
        $i++;
    }
    return $sizeInfos;
}

function get_where_size($size_id)
{
    $sqlLink = sqlLink();
    $tableName = size_table_name();
    $sqlStr = "select * from ${tableName} where size_id='${size_id}'";
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return false;
    }
    $sizeInfo = mysqli_fetch_assoc($result);
    return $sizeInfo;
}

function db_delete_one_size($size_id){
    $sqlLink = sqlLink();
    $tableName = size_table_name();
    $sqlStr = "delete from ${tableName} WHERE `size_id`=${size_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_update_one_size($size_id,$size_name,$remark){
    $sqlLink = sqlLink();
    $tableName = size_table_name();
    $sqlStr = "update ${tableName} set `size_name` = '${size_name}',`remark` = '${remark}'WHERE `size_id` = ${size_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
