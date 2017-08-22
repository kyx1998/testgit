<?php
$productInfos = $GLOBALS['productInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>潮流穿搭</title>
    <link href="css/global.css" rel="stylesheet" type="text/css">
    <link href="css/product_list.css" rel="stylesheet" type="text/css">
    <link href="css/fashion.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="header-nav">
        <div class="nav-item"><a href="?c=Product&m=showFashion&req=is_week_popular">流行</a></div>
        <div class="nav-item"><a href="?c=Product&m=showreixiao&req=is_hot">热销</a></div>
        <div class="nav-item selected"><a href="?c=Product&m=showNewProduct">新品</a></div>
        <div class="nav-item"><a href="?c=Product&m=showPrice">价格</a></div>
    </div>

    <div class="product-list">
        <?php
        foreach($productInfos as $info):
        ?>
        <div class="product-item">
            <a href="detail.html">
                <img src="<?php echo $info['list_img_url'];?>">
                <div class="product-title"><?php echo $info['product_name'];?></div>
                <div class="price-shop">
                    <span class="price"><?php echo $info['origin_price'];?></span>
                    <img src="image/car1.png">
                </div>
            </a>
        </div>
        <?php endforeach;?>
    </div>
</div>
</body>
</html>