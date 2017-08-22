<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/MsgBoardModel.php';
include_once '../models/ReplyMsgModel.php';

function addMsg(){
    $GLOBALS['rt_code'] = '0';
    $submit = getClientParam('submit');
    if(empty($submit)) {
        views('msg_board_add');
        return;
    }
    $title = getClientParam('title');
    $msg_img = getClientParam('msg_img');
    $msg_content = getClientParam('msg_content');
    $ctime = getClientParam('ctime');
    if(empty($title) || empty($msg_content)) {
        rtMsg(ERR_PARAM);
        views('msg_board_add');
        return;
    }
    db_add_msg($title,$msg_img,$msg_content,$ctime);
    return rtMsg();
}
function showListMsg(){
    $GLOBALS['msgInfos'] = db_get_all_msg();
    views('msg_board_list');
}
function deleteMsg()
{
    $msg_id = getClientParam('msg_id');
    if(empty($msg_id)){
        rtMsg(ERR_PARAM);
        views('msg_board_list');
        return;
    }
    db_delete_one_msg($msg_id);
    return rtMsg();
}

function showListReply()
{
    $msg_id = getClientParam('id');
    $GLOBALS['msgInfo'] = db_get_one_msg($msg_id);
    $GLOBALS['replyInfos'] = db_get_reply($msg_id);
    views('reply_list');
}
function deleteReply()
{
    $reply_id = getClientParam('reply_id');
    if(empty($reply_id)){
        rtMsg(ERR_PARAM);
        views('reply_list');
        return;
    }
    db_delete_one_reply($reply_id);
    return rtMsg();
}
