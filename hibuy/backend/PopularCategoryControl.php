<?php
if(!defined('HIBUY')) {
    die('you cant access');
}


include_once '../models/PopularCategoryModel.php';
//异步添加穿搭样式
function addPopularCategory(){
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)) {
        include 'views/popular_category_add.php';
        return;
    }
    $popular_category_name = getClientParam('popular_category_name');
    $popular_category_img = getClientParam('popular_category_img');
    if(empty($popular_category_img) || empty($popular_category_name)) {
        rtMsg(ERR_PARAM);
        include 'views/popular_category_add.php';
        return;
    }
    db_add_popular_category($popular_category_name, $popular_category_img);
    return rtMsg();
}
function showListPopularCategory(){
    $popular_category_name = getClientParam('popular_category_name');
    $GLOBALS['PopularCategoryInfos'] = db_get_popular_category($popular_category_name);
    include 'views/popular_category_list.php';
}
//异步删除
function showDeletePopularCategory(){
    $popular_category_id = getClientParam('popular_category_id');
    if(empty($popular_category_id)){
        rtMsg(ERR_PARAM);
        include 'views/popular_category_list.php';
        return;
    }
    db_delete_one_popular_category($popular_category_id);
    return rtMsg();
}

//修改某个穿搭样式页面
function updatePopularCategory(){
    $popular_category_id = getClientParam('popular_category_id');
    if(empty($popular_category_id)){
        header('location: ?c=PopularCategory&m=showListPopularCategory');
        return;
    }
    $PopularCategoryInfo = db_get_one_popular_category($popular_category_id);
    if(empty($PopularCategoryInfo)) {
        header('location: ?c=PopularCategory&m=showListPopularCategory');
        return;
    }
    $GLOBALS['PopularCategoryInfo'] = $PopularCategoryInfo;
    views('popular_category_update');
}
//提交修改，返回页面
function updatePopularCategoryPage(){
    $GLOBALS['rt_code'] = '0';
    $popular_category_id = getClientParam('popular_category_id');
    $popular_category_name = getClientParam('popular_category_name');
    $popular_category_img = getClientParam('popular_category_img');
    if(empty($popular_category_id) || empty($popular_category_name) || empty($popular_category_img)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_popular_category($popular_category_id, $popular_category_name, $popular_category_img);

    $PopularCategoryInfo = db_get_one_popular_category($popular_category_id);
    return rtMsg(OK,$PopularCategoryInfo);
}