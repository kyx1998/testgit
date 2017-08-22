<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/ProductModel.php';

function showWeekPopular()
{
    $req = getClientParam('req');
    $info =1;
    $GLOBALS['productInfos'] = db_get_product_view($req,$info);
    views('weekpopular');
}
function showByReq(){
    $info = getClientParam('info');
    if($info=='sell_num' || $info=='origin_price'){
        $req=1;
        $productInfos = db_get_product_view($req,$info);
        rtMsg(OK,$productInfos);
    }else{
        $req = $info;
        $info=1;
        $productInfos = db_get_product_view($req,$info);
        rtMsg(OK,$productInfos);
    }


}
