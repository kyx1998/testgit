<?php
if(!defined('HIBUY')) {
    die('you cant access');
}


include_once '../models/ColorModel.php';

// ajax接口 添加颜色
function addColor()
{
    $colorName = getClientParam('color_name');
    $colorValue = getClientParam('color_value');
    $remark = getClientParam('remark');
    if(empty($colorName) || empty($colorValue)) {
        return rtMsg(ERR_PARAM);
    }
    db_add_color($colorName, $colorValue, $remark);
    return rtMsg();
}

// ajax接口 获取所有颜色
function getAllColor()
{
    $infos = db_get_all_color();
    return rtMsg(OK, $infos);
}

// 显示添加颜色页面
function showAddColor()
{
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)) {
        include 'views/color_add.php';
        return;
    }
    $color_name = getClientParam('color_name');
    $color_value = getClientParam('color_value');
    $remark = getClientParam('remark');

    if(empty($color_name) || empty($color_value)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
        include 'views/color_add.php';
        return;
    }
    db_add_color($color_name, $color_value, $remark);
    $GLOBALS['rt_code'] = OK;
    include 'views/color_add.php';
}

// 显示所有颜色页面
function showListColor()
{
    $GLOBALS['colorInfos'] = db_get_all_color();
    include 'views/color_list.php';
}
// 删除某个颜色页面
function deleteColor()
{
    $color_id = getClientParam('color_id');
    if(empty($color_id)) {
        return showListColor();
    }
    db_delete_one_color($color_id);
    return showListColor();
}
//修改某个颜色页面
function updateColor(){
    $color_id = getClientParam('color_id');
    if(empty($color_id)){
        header('location: ?c=Color&m=showListColor');
        return;
    }
    $colorInfo = db_get_one_color($color_id);
    if(empty($colorInfo)) {
        header('location: ?c=Color&m=showListColor');
        return;
    }
    $GLOBALS['colorInfo'] = $colorInfo;
    views('color_update');
}
//提交修改，返回页面
function updateColorPage(){
    $GLOBALS['rt_code'] = '0';
    $color_id = getClientParam('color_id');
    $colorName = getClientParam('color_name');
    $colorValue = getClientParam('color_value');
    $remark = getClientParam('remark');
    if(empty($color_id) || empty($colorName) || empty($colorValue)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_color($color_id, $colorName, $colorValue, $remark);

    $colorInfo = db_get_one_color($color_id);
    $GLOBALS['colorInfo'] = $colorInfo;
    views('color_update');
}