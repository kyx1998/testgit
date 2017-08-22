<?php
include_once 'ConnectDB.php';
include_once 'ColorModel.php';
include_once 'SizeModel.php';
include_once 'ProductModel.php';

function product_style_table_name()
{
    return 'hb_product_style';
}
//style_id未设置自增，需自己添加，否则ajax传输报错
function db_add_product_style($product_id,$color_id,$size_id,$stock,$sell_num){
    $sqlLink = sqlLink();
    $tableName = product_style_table_name();
    $sqlStr = "insert into ${tableName}(`product_id`,`color_id`,`size_id`,`stock`,`sell_num`)VALUES (${product_id},${color_id},${size_id},${stock},${sell_num})";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_get_product_style()
{
    $sqllink = sqlLink();
    $tablename = product_style_table_name();
    $sqlStr = "select * from ${tablename}";
    $productStyleInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $productStyleInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productStyleInfos[$i] = $info;
        $i++;
    }
    return $productStyleInfos;
}
//删除某个颜色
function db_delete_one_product_style($style_id){
    $sqlLink = sqlLink();
    $tableName = product_style_table_name();
    $sqlStr = "delete from ${tableName} WHERE `style_id` = ${style_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
//获取指定穿搭样式
function db_get_one_product_style($style_id)
{
    $sqllink = sqlLink();
    $tablename = product_style_table_name();
    $strSql = "select * from ${tablename} where style_id=${style_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}

//修改某个穿搭样式
function db_update_one_product_style($style_id,$product_id,$color_id,$size_id,$stock,$sell_num){
    $sqlLink = sqlLink();
    $tableName = product_style_table_name();
    $sqlStr = "update ${tableName} set `product_id`=${product_id},`color_id`=${color_id},`size_id`=${size_id},`stock`=${stock},`sell_num`=${sell_num} WHERE `style_id`='${style_id}'";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
//联合查询
function db_get_style_name()
{
    $sqlLink = sqlLink();
    $tableName = product_style_table_name();
    $sqlStr = "select *from hb_color,hb_size,hb_product,${tableName} WHERE hb_color.color_id = ${tableName}.color_id AND hb_size.size_id = ${tableName}.size_id AND hb_product.product_id = ${tableName}.product_id ORDER BY ${tableName}.product_id";

    $styleNameInfos = [];
    $i = 0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if (empty($result)) {
        return $styleNameInfos;
    }
    while ($info = mysqli_fetch_assoc($result)) {
        $styleNameInfos[$i] = $info;
        $i++;
    }
    return $styleNameInfos;
}
function db_get_sell_num(){
    $sqlLink = sqlLink();
    $tableName = product_style_table_name();
    $sqlStr = "select product_id,sum(`sell_num`) from ${tableName} group by product_id";
    $productSellNumInfos = [];
    $i = 0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if (empty($result)) {
        return $productSellNumInfos;
    }
    while ($info = mysqli_fetch_assoc($result)) {
        $productSellNumInfos[$i] = $info;
        $i++;
    }
    return $productSellNumInfos;
}

function db_get_stock(){
    $sqlLink = sqlLink();
    $tableName = product_style_table_name();
    $sqlStr = "select product_id,sum(`stock`) from ${tableName} group by product_id";
    $productStockInfos = [];
    $i = 0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if (empty($result)) {
        return $productStockInfos;
    }
    while ($info = mysqli_fetch_assoc($result)) {
        $productStockInfos[$i] = $info;
        $i++;
    }
    return $productStockInfos;
}