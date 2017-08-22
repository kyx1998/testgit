<?php
include_once 'ConnectDB.php';

function product_table_name()
{
    return 'hb_product';
}
function db_add_product($product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark){

    $tableName = product_table_name();
    $sqlStr = "insert into ${tableName}(`product_no`,`product_name`,`product_subname`,`list_img_url`,`origin_price`,`discount_price`,`freight_type`,`freight_limit`,`is_optimization`,`is_hot`,`is_week_popular`,`category_id`,`dress_id`,`popular_category_id`,`ctime`,`remark`)VALUES ('${product_no}','${product_name}','${product_subname}','${list_img_url}',${origin_price},${discount_price},${freight_type},${freight_limit},${is_optimization},${is_hot},${is_week_popular},${category_id},${dress_id},${popular_category_id},${ctime},'${remark}')";
    $sqlLink = sqlLink();
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_update_sell_num($product_id,$sell_num){
    $tableName = product_table_name();
    $sqlStr = "update ${tableName} set sell_num=${sell_num} WHERE `product_id`=${product_id}";
    $sqlLink = sqlLink();
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_update_stock($product_id,$stock){
    $tableName = product_table_name();
    $sqlStr = "update ${tableName} set stock=${stock} WHERE `product_id`=${product_id}";
    $sqlLink = sqlLink();
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_get_product(){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "select * from ${tableName}";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }
    return $productInfos;
}
function db_get_one_product($product_id){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $strSql = "select * from ${tableName} where product_id=${product_id}";
    $result = mysqli_query($sqlLink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}
function db_delete_one_product($product_id){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "delete from ${tableName} WHERE `product_id`=${product_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_update_one_product($product_id,$product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "update ${tableName} set `product_no` = '${product_no}',`product_name` = '${product_name}',`product_subname` = '${product_subname}',`list_img_url` = '${list_img_url}',`origin_price` = ${origin_price},`discount_price` = ${discount_price},`freight_type` = ${freight_type},`freight_limit` = ${freight_limit},`is_optimization` = ${is_optimization},`is_hot` = ${is_hot},`is_week_popular` = ${is_week_popular},`category_id` = ${category_id},`dress_id` = ${dress_id},`popular_category_id` = ${popular_category_id},`ctime` = ${ctime},`remark` = '${remark}'WHERE `product_id` = ${product_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}

function db_get_product_info(){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "select `product_id`,`product_name` from ${tableName}";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }
    return $productInfos;
}
//销量降序
function db_get_product_sell_num(){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "select * from ${tableName} ORDER BY `sell_num` DESC ";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }
    return $productInfos;
}
//价格升序
function db_get_product_view($req=1,$info=1){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "select * from ${tableName} WHERE $req=1 ORDER BY $info";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }
    return $productInfos;
}

function db_get_product_origin_price(){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "select * from ${tableName} ORDER BY `origin_price`";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }

    return $productInfos;
}

function db_get_one_category($category_id){
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $strSql = "select * from ${tableName} where category_id=${category_id}";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqlLink, $strSql);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }

    return $productInfos;
}
//联合查询
function db_get_product_name()
{
    $sqlLink = sqlLink();
    $tableName = product_table_name();
    $sqlStr = "select *from hb_product_category,hb_dress,hb_popular_category,${tableName} WHERE hb_product_category.category_id = ${tableName}.category_id AND hb_dress.dress_id = ${tableName}.dress_id AND hb_popular_category.popular_category_id = ${tableName}.popular_category_id ORDER BY ${tableName}.product_id";

    $productNameInfos = [];
    $i = 0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if (empty($result)) {
        return $productNameInfos;
    }
    while ($info = mysqli_fetch_assoc($result)) {
        $productNameInfos[$i] = $info;
        $i++;
    }
    return $productNameInfos;
}
