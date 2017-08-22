<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/SizeModel.php';

function addSize()
{
    $sizeName = getClientParam('size_name');
    $remark = getClientParam('remark');
    if (empty($sizeName)) {
        return rtMsg(ERR_PARAM);
    }
    add_size($sizeName, $remark);
    return rtMsg();
}
//获取所有尺寸
function getAllSize()
{
    $infos = get_all_size();
    return rtMsg(OK, $infos);
}
//获取指定尺寸
function getAllSizeWhere($sizeId)
{
    $sizeId = getClientParam('size_id');
    $infos = get_where_size($sizeId);
    return rtMsg(OK, $infos);
}
//添加尺寸
function showAddSize(){
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)){
        include 'views/size_add.php';
        return;
    }
    $size_value = getClientParam('size_value');
    $remark = getClientParam('remark');
    if(empty($size_value)){
        $GLOBALS['rt_code'] = ERR_PARAM;
        include 'views/size_add.php';
        return;
    }
    add_size($size_value,$remark);
}
//尺寸列表
function showListSize(){
    $GLOBALS['sizeInfos'] = get_all_size();
    include 'views/size_list.php';
}
//删除某个尺寸
function deleteSize()
{
    $size_id = getClientParam('size_id');
    if(empty($size_id)) {
        return showListSize();
    }
    db_delete_one_size($size_id);
    return showListSize();
}
//修改尺寸
function updateSize(){
    $size_id = getClientParam('size_id');
    if(empty($size_id)){
        header('location: ?c=Size&m=showListSize');
    }
    $sizeInfo = get_where_size($size_id);
    if(empty($sizeInfo)){
        header('location: ?c=Size&m=showListSize');
    }
    $GLOBALS['sizeInfo'] = $sizeInfo;
    views('size_update');
}
//修改成功，提交页面
function updateSizePage(){
    $GLOBALS['rt_code'] = 0;
    $size_id = getClientParam('size_id');
    $sizeName = getClientParam('size_name');
    $remark = getClientParam('remark');
    if(empty($size_id) || empty($sizeName)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_size($size_id,$sizeName,$remark);
    $sizeInfo = get_where_size($size_id);
    return rtMsg(OK,$sizeInfo);
}