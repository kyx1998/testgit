<?php
include_once 'ConnectDB.php';
function dress_table_name()
{
    return 'hb_dress';
}
function db_add_dress($dress_name,$dress_img){
    $sqlLink = sqlLink();
    $tableName = dress_table_name();
    $sqlStr = "insert into ${tableName}(`dress_name`,`dress_img`)VALUES ('${dress_name}','${dress_img}')";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_get_dress($dress_name){
    $sqlLink = sqlLink();
    $tableName = dress_table_name();
    if($dress_name==''){
        $sqlStr = "select * from ${tableName}";
    }else{
        $sqlStr = "select * from ${tableName} where dress_name='${dress_name}'";
    }
    $result = mysqli_query($sqlLink,$sqlStr);
    $dressInfos=[];
    $i=0;
    if(empty($result)) {
        return $dressInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $dressInfos[$i] = $info;
        $i++;
    }
    return $dressInfos;
}
//删除某个颜色
function db_delete_one_dress($dress_id){
    $sqlLink = sqlLink();
    $tableName = dress_table_name();
    $sqlStr = "delete from ${tableName} WHERE `dress_id` = ${dress_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
//获取指定穿搭样式
function db_get_one_dress($dress_id)
{
    $sqllink = sqlLink();
    $tablename = dress_table_name();
    $strSql = "select * from ${tablename} where dress_id=${dress_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}

//修改某个穿搭样式
function db_update_one_dress($dress_id,$dress_name,$dress_img){
    $sqlLink = sqlLink();
    $tableName = dress_table_name();
    $sqlStr = "update ${tableName} set `dress_name`='${dress_name}',`dress_img`='${dress_img}' WHERE `dress_id`='${dress_id}'";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}

function db_get_dress_info(){
    $sqlLink = sqlLink();
    $tableName = dress_table_name();
    $sqlStr = "select `dress_id`,`dress_name` from ${tableName}";
    $dressInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $dressInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $dressInfos[$i] = $info;
        $i++;
    }
    return $dressInfos;
}