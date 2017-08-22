<?php
include_once 'ConnectDB.php';
function db_get_sell_num(){
    $sqlLink = sqlLink();
    //$tableName = product_style_table_name();
    $sqlStr = "select product_id,sum(`sell_num`) from hb_product_style group by product_id";
    $productSellNumInfos = [];
    $i = 0;
    $result = mysqli_query($sqlLink, $sqlStr);
    if (empty($result)) {
        return $productSellNumInfos;
    }
    while ($info = mysqli_fetch_assoc($result)) {
        $productSellNumInfos[$i] = $info;
        $i++;
    }
    return $productSellNumInfos;
}
$productSellNumInfos = db_get_sell_num();
print_r($productSellNumInfos);