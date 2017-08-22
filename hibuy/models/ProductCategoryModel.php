<?php
include_once 'ConnectDB.php';
function product_category_table_name()
{
    return 'hb_product_category';
}

function db_add_product_category($category_name,$imgurl){
    $sqlLink = sqlLink();
    $tableName = product_category_table_name();
    $sqlStr = "insert into ${tableName}(`category_name`,`category_img`) VALUES ('${category_name}','${imgurl}')";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}

function db_get_product_category($category_name){
    $sqlLink = sqlLink();
    $tableName = product_category_table_name();
    if($category_name==''){
        $sqlStr = "select * from ${tableName}";
    }else{
        $sqlStr = "select * from ${tableName} where category_name='${category_name}'";
    }

    $result = mysqli_query($sqlLink,$sqlStr);
    $categoryInfos=[];
    $i=0;
    if(empty($result)) {
        return $categoryInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $categoryInfos[$i] = $info;
        $i++;
    }
    return $categoryInfos;
}
function db_delete_product_category($category_id){
    $sqlLink = sqlLink();
    $tableName = product_category_table_name();
    $sqlStr = "delete from ${tableName} WHERE `category_id`=${category_id}";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_update_one_product_category($category_id,$category_name,$category_img){
    $sqlLink = sqlLink();
    $tableName = product_category_table_name();
    $sqlStr = "update ${tableName} set `category_name`='${category_name}',`category_img`='${category_img}' WHERE `category_id`='${category_id}'";
    mysqli_query($sqlLink,$sqlStr);
    return true;
}
function db_get_one_product_category($category_id)
{
    $sqllink = sqlLink();
    $tablename = product_category_table_name();
    $strSql = "select * from ${tablename} where category_id=${category_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}
function db_get_category_info(){
    $sqlLink = sqlLink();
    $tableName = product_category_table_name();
    $sqlStr = "select `category_id`,`category_name` from ${tableName}";
    $categoryInfo = [];
    $i=0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if(empty($result)) {
        return $categoryInfo;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $categoryInfo[$i] = $info;
        $i++;
    }
    return $categoryInfo;
}


