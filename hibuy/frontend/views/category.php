<?php
$categorys = $GLOBALS['categorys'];
$productInfos = $GLOBALS['productInfos'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0, user-scalable=0">
    <title>全部分类</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/catgory.css" rel="stylesheet" type="text/css">
    <link href="css/youxuan.css" type="text/css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="title">全部分类</div>
        <div class="catgorys">
            <?php
            foreach($categorys as $category):
            ?>
            <div class="catgroy-item">
                <a href="javascript:void(0);" onclick="req('<?php echo $category["category_id"];?>');">
                <img src="<?php echo $category['category_img'];?>">
                <p><?php echo $category['category_name'];?></p>
                </a>
            </div>
            <?php endforeach;?>
        </div>

        <div class="youxuan-product">
            <input name="sum" value="<?php echo count($productInfos);?>" hidden>
            <?php
            for($i=0;$i<6;$i+=2):
                ?>
                <div class="product-row">
                    <div class="product-item" id="<?php echo $i;?>">
                        <a href="http://www.baidu.com/">
                            <img class="list_img_url" src="<?php echo $productInfos[$i]['list_img_url']; ?>">
                            <p class="product_name"><?php echo $productInfos[$i]['product_name'];?></p>
                            <div class="price-car">
                                <span class="origin_price">￥ <?php echo $productInfos[$i]['origin_price'];?></span>
                                <img src="image/car1.png" onclick="alert('已加入购物车');return false">
                            </div>
                        </a>
                    </div>

                    <div class="product-item" id="<?php echo $i+1;?>">
                        <a href="http://www.baidu.com/">
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
        var i=0;
        function req(info) {
            var sum = document.getElementsByName('sum')[0].value
            //创建ajax对象
            var xhr = new XMLHttpRequest();
            //创建http协议请求
            var url = '?c=Category&m=showByReq&category_id='+info;
            xhr.open("get",url);
            //发送http协议请求
            xhr.send(null);
            //判断状态
            xhr.onreadystatechange=function () {
                if (xhr.readyState==4 && xhr.status==200){
                    var respObj = JSON.parse(xhr.responseText);
                    for(i=0;i<sum;i++){

                        if(i<respObj.data.length){
                            document.getElementsByClassName("list_img_url")[i].src=respObj.data[i].list_img_url;
                            document.getElementsByClassName("product_name")[i].innerText=respObj.data[i].product_name;
                            document.getElementsByClassName("origin_price")[i].innerText=respObj.data[i].origin_price;
                            document.getElementById(i).style.display='block';      //将已定义为隐藏的div显示
                        }else{
                            document.getElementById(i).style.display='none';     //隐藏多余的div并释放其占用的空间
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>