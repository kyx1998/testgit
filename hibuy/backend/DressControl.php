<?php
if(!defined('HIBUY')) {
    die('you cant access');
}


include_once '../models/DressModel.php';
//异步添加穿搭样式
function addDress(){
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)) {
        include 'views/dress_add.php';
        return;
    }
    $dress_name = getClientParam('dress_name');
    $dress_img = getClientParam('dress_img');
    if(empty($dress_img) || empty($dress_name)) {
        rtMsg(ERR_PARAM);
        include 'views/dress_add.php';
        return;
    }
    db_add_dress($dress_name, $dress_img);
    return rtMsg();
}
function showListDress(){
    $dress_name = getClientParam('dress_name');
    $GLOBALS['dressInfos'] = db_get_dress($dress_name);
    include 'views/dress_list.php';
}
//异步删除
function showDeleteDress(){
    $dress_id = getClientParam('dress_id');
    if(empty($dress_id)){
        rtMsg(ERR_PARAM);
        include 'views/dress_list.php';
        return;
    }
    db_delete_one_dress($dress_id);
    return rtMsg();
}

//修改某个穿搭样式页面
function updateDress(){
    $dress_id = getClientParam('dress_id');
    if(empty($dress_id)){
        header('location: ?c=Dress&m=showListDress');
        return;
    }
    $dressInfo = db_get_one_dress($dress_id);
    if(empty($dressInfo)) {
        header('location: ?c=Dress&m=showListDress');
        return;
    }
    $GLOBALS['dressInfo'] = $dressInfo;
    views('dress_update');
}
//提交修改，返回页面
function updateDressPage(){
    $GLOBALS['rt_code'] = '0';
    $dress_id = getClientParam('dress_id');
    $dress_name = getClientParam('dress_name');
    $dress_img = getClientParam('dress_img');
    if(empty($dress_id) || empty($dress_name) || empty($dress_img)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_dress($dress_id, $dress_name, $dress_img);

    $dressInfo = db_get_one_dress($dress_id);
    return rtMsg(OK,$dressInfo);
}


