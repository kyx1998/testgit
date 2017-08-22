<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/MsgBoardModel.php';
include_once '../models/ReplyMsgModel.php';

function showListMsg(){
    $GLOBALS['msgInfos'] = db_get_all_msg();
    views('hot');
}

//用于前台显示和后台列表
function showMsgReply(){
    $msg_id = getClientParam('id');
    $GLOBALS['msgInfo'] = db_get_one_msg($msg_id);
    $GLOBALS['replyInfos'] = db_get_reply($msg_id);
    views('hot_artic');
}
function addReply(){
    $reply_content = getClientParam('reply_content');
    $reply_img = getClientParam('reply_img');
    $ctime = getClientParam('ctime');
    $msg_id = getClientParam('msg_id');
    if (empty($reply_content)) {
        return rtMsg(ERR_PARAM);
    }
    db_add_reply($reply_content,$reply_img,$ctime,$msg_id);
    return rtMsg();
}




