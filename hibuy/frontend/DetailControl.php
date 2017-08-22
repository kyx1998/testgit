<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/ProductModel.php';
function showDetail(){
    $product_id = getClientParam('product_id');
    $GLOBALS['productInfo'] = db_get_one_product($product_id);
    views('detail');
}