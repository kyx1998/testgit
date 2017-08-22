<?php
if(!defined('HIBUY')) {
    die('you cant access');
}

include_once '../models/ProductModel.php';
include_once '../models/ColorModel.php';
include_once '../models/SizeModel.php';
include_once '../models/ProductStyleModel.php';
//异步添加穿搭样式
function addProductStyle(){
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)) {
        $GLOBALS['colorInfos'] = db_get_all_color();
        $GLOBALS['sizeInfos'] = get_all_size();
        $GLOBALS['productInfos'] = db_get_product_info();
        include 'views/product_style_add.php';
        return;
    }
    $product_id = getClientParam('product_id');
    $color_id = getClientParam('color_id');
    $size_id = getClientParam('size_id');
    $stock = getClientParam('stock');
    $sell_num = getClientParam('sell_num');
    if(empty($product_id) || empty($color_id)||empty($size_id)||empty($stock)||empty($sell_num)) {
        rtMsg(ERR_PARAM);
        include 'views/product_style_add.php';
        return;
    }
    db_add_product_style($product_id,$color_id,$size_id,$stock,$sell_num);
    return rtMsg();
}
function showListProductStyle(){
    $GLOBALS['productStyleInfos'] = db_get_style_name();
    include 'views/product_style_list.php';
}
//异步删除
function showDeleteProductStyle(){
    $style_id = getClientParam('style_id');
    if(empty($style_id)){
        rtMsg(ERR_PARAM);
        include 'views/product_style_list.php';
        return;
    }
    db_delete_one_product_style($style_id);
    return rtMsg();
}

//修改某个穿搭样式页面
function updateProductStyle(){
    $GLOBALS['colorInfos'] = db_get_all_color();
    $GLOBALS['sizeInfos'] = get_all_size();
    $GLOBALS['productInfos'] = db_get_product_info();
    $style_id = getClientParam('style_id');
    if(empty($style_id)){
        header('location: ?c=ProductStyle&m=showListProductStyle');
        return;
    }
    $productStyleInfo = db_get_one_product_style($style_id);
    if(empty($productStyleInfo)) {
        header('location: ?c=ProductStyle&m=showListProductStyle');
        return;
    }
    $GLOBALS['productStyleInfo'] = $productStyleInfo;
    views('product_style_update');
}
//提交修改，返回页面
function updateProductStylePage(){
    $GLOBALS['rt_code'] = '0';
    $style_id = getClientParam('style_id');
    $product_id = getClientParam('product_id');
    $color_id = getClientParam('color_id');
    $size_id = getClientParam('size_id');
    $stock = getClientParam('stock');
    $sell_num = getClientParam('sell_num');

    if(empty($product_id) || empty($color_id)||empty($size_id)||empty($stock)||empty($sell_num)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_product_style($style_id,$product_id, $color_id,$size_id,$stock,$sell_num);

    //$productStyleInfo = db_get_one_product_style($style_id);
    //return rtMsg(OK,$productStyleInfo);
    return rtMsg();
}


