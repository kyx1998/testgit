<?php
namespace yii\test\common;

use common\common\ErrDesc;
use common\controllers\QQBaseController;
class UpFile extends QQBaseController{
    public $data;
    public static $fileArr =array("gif","jpg","png","bmp","jpeg",'txt');
    public function __construct($data)
    {
        $this->datas = $data;
    }
    private function getFileType($filename)
    {
        $tmp = explode('.', $filename);
        $f_type = end($tmp);
        return $f_type;
    }
    public function upImg(){
        if(empty($_FILES['img'])){
            $this->rtJson(ErrDesc::ERR_UPFILE);
            return;
        }
        $img = $_FILES['img'];
        if ($img['error'] != 0) {
            $this->rtJson(ErrDesc::ERR_UPFILE);
            return;
        }
        $f_type = $this->getFileType($img['name']);
        if (!in_array($f_type, self::$fileArr)) {
            $this->rtJson(ErrDesc::ERR_FILE_TYPE);
            return;
        }
        $img_size = getimagesize($img['tmp_name']);
        $newsize = 300;
        $dst = imagecreatetruecolor($newsize,$newsize);
        //根据图片路径创建相应图像资源
        $fun = 'imagecreatefrom'.$f_type;
        $img = $fun($img['tmp_name']);
        //根据原图复制新的尺寸的图片，$dst新的图片的资源句柄，$img旧的。。。。
        imagecopyresampled($dst,$img,0,0,0,0,$newsize,$newsize,$img_size[0],$img_size[1]);
        $new_filename = time() . '.' . $f_type;
        imagepng($dst,'image/' . $new_filename);
        $request_url = $_SERVER['REQUEST_URI'];
        $filepath = dirname($request_url);
        $img_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/' . $filepath . '/image/' . $new_filename;
        return $this->rtJson(OK, ['url'=>$img_url]);
    }
    public function upFile(){
        if(empty($_FILES['upfile'])){
            $this->rtJson(ErrDesc::ERR_UPFILE);
            return;
        }
        $file = $_FILES['upfile'];
        if ($file['error'] != 0) {
            $this->rtJson(ErrDesc::ERR_UPFILE);
            return;
        }
        $f_type = $this->getFileType($file['name']);
        if (!in_array($f_type, self::$fileArr)) {
            $this->rtJson(ErrDesc::ERR_FILE_TYPE);
            return;
        }
        $new_filename = time() . '.' . $f_type;
        move_uploaded_file($file['tmp_name'], 'book/' . $new_filename);
        $request_url = $_SERVER['REQUEST_URI'];
        $filepath = dirname($request_url);
        $file_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/' . $filepath . '/image/' . $new_filename;
        return $this->rtJson(OK, ['url'=>$file_url]);
    }
}