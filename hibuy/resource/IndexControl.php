<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
function getFileType($filename)
{
    $tmp = explode('.', $filename);
    $f_type = end($tmp);
    return $f_type;
}
function showIndex()
{
    $ims_arr = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

//统一向客户端返回数据格式


//上传数组是否为空
    if (empty($_FILES['img'])) {
        rtMsg(ERR_UPLOAD_FILE);
        return;
    }

    $img = $_FILES['img'];
//文件上传是否有错误
    if ($img['error'] != 0) {
        rtMsg(ERR_UPLOAD_FILE);
        return;
    }


//文件类型
    $filetype = $img['type'];
    if (!in_array($filetype, $ims_arr)) {
        rtMsg(ERR_UPLOAD_TYPE);
        return;
    }
//文件更名


    $f_type = getFileType($img['name']);

    $new_filename = time() . '.' . $f_type;

//保存文件
//move_uploaded_file($img['tmp_name'],'img/a.jpg');
    move_uploaded_file($img['tmp_name'], 'image/' . $new_filename);           //注意是否建了image文件夹

//组合网页访问图片路径
    $request_url = $_SERVER['REQUEST_URI'];
    $filepath = dirname($request_url);
    $img_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/' . $filepath . '/image/' . $new_filename;
    return rtMsg(OK, ['url'=>$img_url]);            //错误码大小写分清
}

