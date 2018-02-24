<?php

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
if(!empty($_POST['imgurl'])){
    //改变图片时删除上一张图片，提交后图片才真正保存
    $imgurl =substr($_POST['imgurl'],42,20);
    unlink($imgurl);
}
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
    $type = substr($filetype,6);
    $f_type = getFileType($img['name']);
    $img_size = getimagesize($img['tmp_name']);
    $newsize = 300;
    $dst = imagecreatetruecolor($newsize,$newsize);
    //根据图片路径创建相应图像资源
    $fun = 'imagecreatefrom'.$type;
    $img = $fun($img['tmp_name']);
    //根据原图复制新的尺寸的图片，$dst新的图片的资源句柄，$img旧的。。。。
    imagecopyresampled($dst,$img,0,0,0,0,$newsize,$newsize,$img_size[0],$img_size[1]);
//文件更名


    $new_filename = time() . '.' . $f_type;

//保存文件
//move_uploaded_file($img['tmp_name'],'img/a.jpg');
    //move_uploaded_file($img['tmp_name'], 'image/' . $new_filename);           //注意是否建了image文件夹
    //将修改尺寸后的图片保存
    imagepng($dst,'image/' . $new_filename);
//组合网页访问图片路径
    $request_url = $_SERVER['REQUEST_URI'];
    $filepath = dirname($request_url);
    $img_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/' . $filepath . '/image/' . $new_filename;


    //return rtMsg(OK, ['url'=>$img_url]);      // 原版代码
             //错误码大小写分清
   return rtMsg(OK,['url'=>$img_url]);       //Froala编辑器接收的代码格式['link':'url']
}

