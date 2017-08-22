<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/DressModel.php';
include_once '../models/PopularCategoryModel.php';
function showIndex()
{
    $dress_name = getClientParam('dress_name');
    $GLOBALS['dressInfos'] = db_get_dress($dress_name);
    $GLOBALS['popularCategoryInfos'] = db_get_popular_category();
    //print_r($dressInfos);
    views('index');
    return;
}