<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/ProductCategoryModel.php';
include_once '../models/ProductModel.php';

function showCategory()
{
    $category_name = getClientParam('category_name');
    $GLOBALS['productInfos'] = db_get_product();
    $GLOBALS['categorys'] = db_get_product_category($category_name);
    views('category');
}

function showByReq()
{
    $category_id = getClientParam('category_id');
    $productInfos = db_get_one_category($category_id);
    rtMsg(OK, $productInfos);
}