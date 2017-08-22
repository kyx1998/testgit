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
    <title>优选</title>

    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/youxuan.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="youxuan-head">
        <div class="banner">
            <img src="image/b1.png">
        </div>

        <div class="order">
            <div class="order-item selected" onclick="req(this,'1')">综合</div>
            <div class="order-item">
                销量
                <div class="up-down">
                    <div class="up" onclick="req(this,'sell_num',1)"></div>
                    <div class="down" onclick="req(this,'sell_num',-1)"></div>
                </div>
            </div>
            <div class="order-item">
                价格
                <div class="up-down">
                    <div class="up" onclick="req(this,'origin_price',1)"></div>
                    <div class="down" onclick="req(this,'origin_price',-1)"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="youxuan-product">
<input type="text" name="sum" value="<?php echo count($productInfos);?>" hidden>
        <?php
            for($i=0;$i<6;$i+=2):
                ?>
                <div class="product-row">
                    <div class="product-item">
                        <a href="?c=Detail&m=showDetail&product_id=<?php echo $productInfos[$i]['product_id'];?>">
                            <img class="list_img_url" src="<?php echo $productInfos[$i]['list_img_url']; ?>">
                            <p class="product_name"><?php echo $productInfos[$i]['product_name'];?></p>
                            <div class="price-car">
                                <span class="origin_price">￥ <?php echo $productInfos[$i]['origin_price'];?></span>
                                <img src="image/car1.png" onclick="alert('已加入购物车');return false">
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="?c=Detail&m=showDetail&product_id=<?php echo $productInfos[$i+1]['product_id'];?>">
                            <img class="list_img_url" src="<?php echo $productInfos[$i+1]['list_img_url'];?>">
                            <p class="product_name"><?php echo $productInfos[$i + 1]['product_name'];?></p>
                            <div class="price-car">
                                <span class="origin_price">￥ <?php echo $productInfos[$i+1]['origin_price'];?></span>
                                <img src="image/car1.png" onclick="alert('已加入购物车');return false">
                            </div>
                        </a>
                    </div>
                </div>
            <?php endfor;?>


    </div>
</div>
<script>
    id =0;
    function req(elem,info,num) {
        if(info=='sell_num' && num==1){
            elem.className='up up-selected';
        }else if(info=='sell_num' && num!=1){
            elem.className='down down-selected';

        }else if(info=='origin_price'&&num==1){
            elem.className='up up-selected';
        }else{
            elem.className='down down-selected';
        }

        var i=0;
        var sum = document.getElementsByName('sum')[0].value;
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
        var url = '?c=youxuan&m=showByReq&info='+info;
        xhr.open("get",url);
        //发送http协议请求
        xhr.send(null);
        //判断状态
        xhr.onreadystatechange=function () {
            if (xhr.readyState==4 && xhr.status==200){
                var respObj = JSON.parse(xhr.responseText);
                id+=num;
                var sun =6+id;
                for(i+=id;i<(6+id);i++){
                    document.getElementsByClassName("list_img_url")[i-id].src=respObj.data[i].list_img_url;
                    document.getElementsByClassName("product_name")[i-id].innerText=respObj.data[i].product_name;
                    document.getElementsByClassName("origin_price")[i-id].innerText=respObj.data[i].origin_price;
                }



                console.log(sun);
                if(sun==sum){
                    alert('到顶啦，没有更多了');
                    return ;
                }else if(id==0){
                    alert('到底啦，没有更多了');
                    return ;
                }
            }
        }
    }
</script>
</body>
</html>