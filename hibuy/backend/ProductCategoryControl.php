<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include '../models/ProductCategoryModel.php';

function addProductCategory()
{
    $category_name = getClientParam('category_name');
    $category_img = getClientParam('category_img');
    if(empty($category_img) || empty($category_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_add_product_category($category_name, $category_img);
    return rtMsg();
}


function showAddProductCategory()
{
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)) {
        include 'views/product_category_add.php';
        return;
    }
    $category_name = getClientParam('category_name');
    $category_img =getClientParam('category_img');
    if(empty($category_name) || empty($category_img)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
        include 'views/product_category_add.php';
        return;
    }
    $imgurl = ' ../frontend/image/'.$category_img;
    db_add_product_category($category_name,$imgurl);
    $GLOBALS['rt_code'] = OK;
    include 'views/product_category_add.php';
}


function showListProductCategory()
{
    $category_name = getClientParam('category_name');
    $GLOBALS['categoryInfos'] = db_get_product_category($category_name);
    include 'views/product_category_list.php';
}
function showDeleteProductCategory(){
    $category_name = getClientParam('category_name');
    $category_id = getClientParam('category_id');
    //die();
    db_delete_product_category($category_id);
    /*$GLOBALS['categoryInfos'] = db_get_product_category($category_name);
    include 'views/product_category_list.php';*/
    showListProductCategory();
}
//修改某个分类页面
function updateProductCategory(){
    $category_id = getClientParam('category_id');
    if(empty($category_id)){
        header('location: ?c=ProductCategory&m=showListProductCategory');
        return;
    }
    $categoryInfo = db_get_one_product_category($category_id);
    if(empty($categoryInfo)) {
        header('location: ?c=ProductCategory&m=showListProductCategory');
        return;
    }
    $GLOBALS['categoryInfo'] = $categoryInfo;
    views('product_category_update');
}
//提交修改，返回页面
function updateProductCategoryPage(){
    $GLOBALS['rt_code'] = '0';
    $category_id = getClientParam('category_id');
    $category_name = getClientParam('category_name');
    $category_img = getClientParam('category_img');
    if(empty($category_id) || empty($category_name) || empty($category_img)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_product_category($category_id, $category_name, $category_img);

    $categoryInfo = db_get_one_product_category($category_id);
    return rtMsg(OK,$categoryInfo);
}