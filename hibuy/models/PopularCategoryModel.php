<?php
include_once 'ConnectDB.php';

function popular_category_table_name()
{
    return 'hb_popular_category';
}

function db_add_popular_category($popular_category_name,$popular_category_img){
    $sqlLink = sqlLink();
    $tableName = popular_category_table_name();
    $sqlStr = "insert into ${tableName}(`popular_category_name`,`popular_category_img`) VALUES ('${popular_category_name}','${popular_category_img}')";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_delete_one_popular_category($popular_category_id){
    $sqlLink = sqlLink();
    $tableName = popular_category_table_name();
    $sqlStr = "delete from ${tableName} WHERE `popular_category_id`=${popular_category_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_update_one_popular_category($popular_category_id,$popular_category_name,$popular_category_img){
    $sqlLink = sqlLink();
    $tableName = popular_category_table_name();
    $sqlStr = "update ${tableName} set `popular_category_name`='${popular_category_name}',`popular_category_img`='${popular_category_img}' WHERE `popular_category_id`='${popular_category_id}'";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_get_one_popular_category($popular_category_id)
{
    $sqllink = sqlLink();
    $tablename = popular_category_table_name();
    $strSql = "select * from ${tablename} where popular_category_id=${popular_category_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}
function db_get_popular_category()
{
    $sqllink = sqlLink();
    $tablename = popular_category_table_name();
    $sqlStr = "select * from ${tablename}";
    $popularCategoryInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $popularCategoryInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $popularCategoryInfos[$i] = $info;
        $i++;
    }
    return $popularCategoryInfos;
}
function db_get_popular_category_info(){
    $sqlLink = sqlLink();
    $tableName = popular_category_table_name();
    $sqlStr = "select `popular_category_id`,`popular_category_name` from ${tableName}";
    $popularCategoryInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $popularCategoryInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $popularCategoryInfos[$i] = $info;
        $i++;
    }
    return $popularCategoryInfos;
}