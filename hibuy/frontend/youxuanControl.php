<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/ProductModel.php';

function showyouxuan()
{
    $req = 'is_optimization';
    $GLOBALS['productInfos'] = db_get_product_view($req);
    views('youxuan');
}
function showByReq(){
    $req = 'is_optimization';
    $info = getClientParam('info');
    $productInfos = db_get_product_view($req,$info);
    rtMsg(OK,$productInfos);
}