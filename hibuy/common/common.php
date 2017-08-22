<?php
include_once '../conf/rtcode.php';


/**
 * 返回客户端的数据 统一的出口
 * @param int $code
 * @param string $msg
 * @param array $data
 */
function rtMsg($code=1, $data=[])
{
    $rt = [
        'code' => $code,
        'msg' => RT_MSG($code),
        'data' => $data
    ];
    echo json_encode($rt);                  //直接写return json_encode($rt)返回的数据JSON.parse()不识别，会报错
    return;
}

// 获取客户端的参数
function getClientParam($param, $defalut='')
{
    $requestParam = array_merge($_GET, $_POST);
    if(array_key_exists($param, $requestParam)) {
        return $requestParam[$param];
    }
    return $defalut;
}
function views($fileName)
{
    $file = $fileName . '.php';
    include 'views/' . $file;
}