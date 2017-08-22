<?php
if(!defined('HIBUY')) {
    die('you cant access');
}

include_once '../models/ProductModel.php';
include_once '../models/DressModel.php';
include_once '../models/ProductCategoryModel.php';
include_once '../models/PopularCategoryModel.php';
include_once '../models/ProductStyleModel.php';
function addProduct(){
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)) {
        $GLOBALS['categoryInfo'] = db_get_category_info();
        $GLOBALS['dressInfos'] = db_get_dress_info();
        $GLOBALS['popularCategoryInfos'] = db_get_popular_category_info();
        include 'views/product_add.php';
        return;
    }
    $product_no = getClientParam('product_no');
    $product_name = getClientParam('product_name');
    $product_subname = getClientParam('product_subname');
    $list_img_url = getClientParam('list_img_url');
    $origin_price = getClientParam('origin_price');
    $discount_price = getClientParam('discount_price');
    $freight_type = getClientParam('freight_type');
    $freight_limit = getClientParam('freight_limit');
    $is_optimization = getClientParam('is_optimization');
    $is_hot = getClientParam('is_hot');
    $is_week_popular = getClientParam('is_week_popular');
    $category_id = getClientParam('category_id');
    $dress_id = getClientParam('dress_id');
    $popular_category_id = getClientParam('popular_category_id');
    $ctime = getClientParam('ctime');
    $remark = getClientParam('remark');
    if(empty($product_no) || empty($product_name) ||empty($origin_price) ||empty($category_id)){
        rtMsg(ERR_PARAM);
        include 'views/product_add.php';
        return;
    }
    db_add_product($product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark);
    return rtMsg();
}

function showListProduct(){
    $productSellNumInfos = db_get_sell_num();
    $productStockInfos = db_get_stock();
    foreach($productSellNumInfos as $info){
        db_update_sell_num($info['product_id'],$info['sum(`sell_num`)']);
    }
    foreach($productStockInfos as $info){
        db_update_stock($info['product_id'],$info['sum(`stock`)']);
    }
    $GLOBALS['productNameInfos'] = db_get_product_name();
    include 'views/product_list.php';
}

function showDeleteProduct(){
    $product_id = getClientParam('product_id');
    if(empty($product_id)){
        rtMsg(ERR_PARAM);
        include 'views/product_list.php';
        return;
    }
    db_delete_one_product($product_id);
    return rtMsg();
}

function updateProduct(){
    $product_id = getClientParam('product_id');
    if(empty($product_id)){
        header('location: ?c=Product&m=showListProduct');
        return;
    }
    $productInfo = db_get_one_product($product_id);
    if(empty($productInfo)) {
        header('location: ?c=Product&m=showListProduct');
        return;
    }
    $GLOBALS['categoryInfo'] = db_get_category_info();
    $GLOBALS['dressInfos'] = db_get_dress_info();
    $GLOBALS['popularCategoryInfos'] = db_get_popular_category_info();
    $GLOBALS['productInfo'] = $productInfo;
    views('product_update');
}

function updateProductPage(){
    $GLOBALS['rt_code'] = '0';
    $product_id = getClientParam('product_id');
    $product_no = getClientParam('product_no');
    $product_name = getClientParam('product_name');
    $product_subname = getClientParam('product_subname');
    $list_img_url = getClientParam('list_img_url');
    $origin_price = getClientParam('origin_price');
    $discount_price = getClientParam('discount_price');
    $freight_type = getClientParam('freight_type');
    $freight_limit = getClientParam('freight_limit');
    $is_optimization = getClientParam('is_optimization');
    $is_hot = getClientParam('is_hot');
    $is_week_popular = getClientParam('is_week_popular');
    $category_id = getClientParam('category_id');
    $dress_id = getClientParam('dress_id');
    $popular_category_id = getClientParam('popular_category_id');
    $ctime = getClientParam('ctime');
    $remark = getClientParam('remark');
    if(empty($product_no) || empty($product_name) ||empty($origin_price) ||empty($category_id) ||empty($dress_id) ||empty($popular_category_id)){
        rtMsg(ERR_PARAM);
        include 'views/product_add.php';
        return;
    }
    db_update_one_product($product_id,$product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark);



    return rtMsg();
}
