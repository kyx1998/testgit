<?php
function getFileType($filename)
{
    $tmp = explode('.', $filename);
    $f_type = end($tmp);
    return $f_type;
}
function upFile(){
    if(empty($_FILES['upfile'])){
        rtMsg(ERR_UPLOAD_FILE,['url'=>1]);
        return;
    }
    $file = $_FILES['upfile'];
    if ($file['error'] != 0) {
        rtMsg(ERR_UPLOAD_FILE);
        return;
    }
    $f_type = getFileType($file['name']);
    if (!($f_type=='txt')) {
        rtMsg(ERR_UPLOAD_TYPE);
        return;
    }

    //move_uploaded_file($file['tmp_name'], 'book/' . $new_filename);
    //生成静态html
    $book_name = $_POST['book_name'];
    $ctime = date('Y-m-d',time());
    $content = file_get_contents($file['tmp_name']);
    $tmpFileName = 'template/tmp.html';
    $string = file_get_contents($tmpFileName);
    $string = str_replace("{content}", $content, $string);
    $string = str_replace("{ctime}", $ctime, $string);
    $string = str_replace("{book_name}", $book_name, $string);
    /*$newFile = "book/".date("Ymd");
    if(!is_dir($newFile)){
        mkdir($newFile,0777,true);
    }*/
    //$new_filename = time() . '.' . $f_type;
    $new_filename = time() . '.' . 'html';
    file_put_contents($new_filename, $string);
    rename($new_filename,'book/' . $new_filename);       //函数重命名文件或目录或者移动到其他目录下。

    $request_url = $_SERVER['REQUEST_URI'];
    $filepath = dirname($request_url);
    $file_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/' . $filepath . '/book/' . $new_filename;
    return rtMsg(OK, ['url'=>$file_url]);
}