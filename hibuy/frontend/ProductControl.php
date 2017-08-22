<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/ProductModel.php';
function showFashion()
{
    $req = getClientParam('req');
    $GLOBALS['productInfos'] = db_get_product_view($req);
    views('fashion');
}
function showreixiao(){
    $req = getClientParam('req');
    $GLOBALS['productInfos'] = db_get_product_view($req);
    views('reixiao');
}
function showNewProduct(){
    $GLOBALS['productInfos'] = db_get_product_sell_num();
    views('new_product');
}
function showPrice(){
    $GLOBALS['productInfos'] = db_get_product_origin_price();
    views('price');
}