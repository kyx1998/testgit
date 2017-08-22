<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
$productInfos = $GLOBALS['productInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>每周流行</title>
    <link href="css/global.css" rel="stylesheet" type="text/css">
    <link href="css/product_list.css" rel="stylesheet" type="text/css">
    <link href="css/weekpopular.css" rel="stylesheet" type="text/css">
    <link href="css/youxuan.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="popular-desc">
        <img src="image/w1.png">
        <div class="desc">
            <p class="title">流行详解</p>
            <p>春风吹起来，连衣裙穿起来，凸显气质的早春连衣裙都在这里了。</p>
        </div>
    </div>

    <div class="header-nav">
        <div class="nav-item selected" onclick="req(this,'is_week_popular')">流行</div>
        <div class="nav-item" onclick="req(this,'is_hot')">热销</div>
        <div class="nav-item" onclick="req(this,'sell_num')">新品</div>
        <div class="nav-item" onclick="req(this,'origin_price')">价格</div>
    </div>

    <div class="product-list">
        <?php
        foreach($productInfos as $info):
            ?>

                <div class="product-item">
                    <a href="http://www.baidu.com/">
                        <img class="list_img_url" src="<?php echo $info['list_img_url']; ?>">
                        <p class="product_subname"><?php echo $info['product_name'];?></p>
                        <div class="price-car">
                            <span class="origin_price">￥ <?php echo $info['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('已加入购物车');return false">
                        </div>
                    </a>
                </div>

        <?php endforeach;?>
    </div>
</div>
<script>
    var i=0;
    function req(elem,info) {
        if(info=='sell_num'){
            elem.className='nav-item selected';
        }else if(info=='origin_price'){
            elem.className='nav-item selected';
        }
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
        var url = '?c=weekpopular&m=showByReq&info='+info;
        xhr.open("get",url);
        //发送http协议请求
        xhr.send(null);
        //判断状态
        xhr.onreadystatechange=function () {
            if (xhr.readyState==4 && xhr.status==200){
                var respObj = JSON.parse(xhr.responseText);
                for(i=0;i<6;i++){
                    console.log(document.getElementsByClassName("list_img_url")[i]);
                    document.getElementsByClassName("list_img_url")[i].src=respObj.data[i].list_img_url;
                    document.getElementsByClassName("product_subname")[i].innerText=respObj.data[i].product_name;
                    document.getElementsByClassName("origin_price")[i].innerText='￥'+respObj.data[i].origin_price;
                }
            }
        }
    }
</script>
</body>
</html>