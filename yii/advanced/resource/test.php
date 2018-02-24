<?php
function getFileType($filename)
{
    $tmp = explode('.', $filename);
    $f_type = end($tmp);
    return $f_type;
}
if(empty($_POST['img'])){

}