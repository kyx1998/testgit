<?php
define('HIBUY', true);

include_once '../common/common.php';

if(empty($_GET['c'])) {
    $c= 'Index';
}
else
    $c = $_GET['c'];

$controlFile = $c . 'Control.php';
if(!file_exists($controlFile)) {
    die('you access file not exist');
}

include_once $controlFile;

if(empty($_GET['m'])) {
    $method = 'showIndex';
}
else
    $method = $_GET['m'];
if(!function_exists($method)) {
    die('you cant access, contact to KingPHP');
}

$method();
