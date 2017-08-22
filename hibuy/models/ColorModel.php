<?php
/**
 * 商品颜色相关的操作
 */
include_once 'ConnectDB.php';

function color_table_name()
{
    return 'hb_color';
}

/**
 * 增加颜色
 */
function db_add_color($color_name, $color_value, $remark='')
{
    $tablename = color_table_name();
    $sqlStr = "insert into ${tablename}(`color_name`, `color_value`, `remark`) VALUES ('${color_name}', '${color_value}', '${remark}')";

    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}

/**
 * 获取所有的商品颜色
 */
function db_get_all_color()
{
    $sqllink = sqlLink();
    $tablename = color_table_name();
    $sqlStr = "select * from ${tablename}";
    $colorInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $colorInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $colorInfos[$i] = $info;
        $i++;
    }
    return $colorInfos;
}
//删除指定颜色
function db_delete_one_color($color_id){
    $sqlLink = sqlLink();
    $tableName = color_table_name();
    $sqlStr = "delete from ${tableName} WHERE `color_id`=${color_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
//修改某个颜色
function db_update_one_color($color_id,$color_name,$color_value,$remark){
    $sqlLink = sqlLink();
    $tableName = color_table_name();
    $sqlStr = "update ${tableName} set `color_name` = '${color_name}',`color_value` = '${color_value}',`remark` = '${remark}'WHERE `color_id` =${color_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
//获取指定颜色
function db_get_one_color($color_id)
{
    $sqllink = sqlLink();
    $tablename = color_table_name();
    $strSql = "select * from ${tablename} where color_id=${color_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}
