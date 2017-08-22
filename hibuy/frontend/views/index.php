<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
$dressInfos = $GLOBALS['dressInfos'];
$popularCategoryInfos = $GLOBALS['popularCategoryInfos'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>HiBuy</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <link href="css/kingSwape.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- 轮播 -->


    <div class="swape_box">
        <div class="imgs">
            <div class="img">
                <a href="javascript:void(0);">
                    <img src="image/1.png" alt="1">
                </a>
            </div>
            <div class="img">
                <a href="javascript:void(0);">
                    <img src="image/0.png" alt="2">
                </a>
            </div>
            <div class="img">
                <a href="javascript:void(0);">
                    <img src="image/2.png" alt="3">
                </a>
            </div>
            <div class="img">
                <a href="javascript:void(0);">
                    <img src="image/1.png" alt="4">
                </a>
            </div>
        </div>
        <div class="left btn">&lt;</div>
        <div class="right btn">&gt;</div>
        <div class="circles">
        </div>
    </div><!-- end 轮播组件 -->

    <!-- 目录 -->
    <div class="menu">
        <div class="menu-item">
            <a href="?c=youxuan&m=showyouxuan">
                <img src="image/youxuan.png">
                <p>优选</p>
            </a>
        </div>
        <div class="menu-item">
            <a href="javascript:void(0);">
                <img src="image/rexiao.png">
                <p>热销</p>
            </a>
        </div>
        <div class="menu-item">
            <a href="?c=Category&m=showCategory">
                <img src="image/fenlei.png">
                <p>分类</p>
            </a>
        </div>
        <div class="menu-item">
            <a href="javascript:void(0);">
                <img src="image/youhui.png">
                <p>优惠</p>
            </a>
        </div>
    </div>

    <!-- 热销 -->
    <div class="row hotbuy">
        <a href="?c=MsgBoard&m=showListMsg">
            <img src="image/hot.png">
            <p class="hotbuy-desc">
                今日热点|《择天记》开播鹿晗的盛世美颜不够看
            </p>
        </a>

    </div>

    <!-- 潮流穿搭 -->
    <div class="row fashion">
        <div class="fashion-head">
            <img src="image/fashion.png"><span>潮流搭配</span>
        </div>
        <div class="fashion-product">
            <?php
            foreach($dressInfos as $info):
            ?>
            <div class="product-item">
                <a href="?c=Product&m=showFashion&req=is_week_popular">
                    <img src="<?php echo $info['dress_img'];?>">
                    <p><?php echo $info['dress_name'];?></p>
                </a>
            </div>
            <?php endforeach;?>
        </div>
    </div>

    <!-- 每周流行 -->
    <div class="row weekpopular">
        <div class="fashion-head">
            <img src="image/week.png"><span>每周流行</span>
        </div>

        <div class="popular-product">
            <?php
            foreach($popularCategoryInfos as $info):
            ?>
            <div class="product-item">
                <a href="?c=weekpopular&m=showWeekPopular&req=is_week_popular">
                    <img src="<?php echo $info['popular_category_img'];?>">
                    <p><?php echo $info['popular_category_name'];?></p>
                </a>
            </div>
            <?php endforeach;?>
        </div>
    </div>

    <!-- 精选专题 -->
    <div class="row subject">
        <div class="fashion-head">
            <img src="image/j.png"><span>精选专题</span>
        </div>

        <div class="edit">
            <a href="subject.html">
                <img src="image/j1.png">
                <div class="edit-desc">
                    <p class="edit-title">------小编专栏------</p>
                    <p>初冬温暖套装
                        让你天生时髦难自弃
                    </p>
                </div>
            </a>

        </div>

        <div class="subject-product">
            <div class="product-item">
                <a href="detail.html">
                    <img src="image/w1.png">
                    <p>￥58.00</p>
                </a>
            </div>
            <div class="product-item">
                <a href="detail.html">
                    <img src="image/w2.png">
                    <p>￥58.00</p>
                </a>
            </div>
            <div class="product-item">
                <a href="detail.html">
                    <img src="image/w3.png">
                    <p>￥58.00</p>
                </a>
            </div>
            <div class="product-item">
                <a href="detail.html">
                    <img src="image/w4.png">
                    <p>￥58.00</p>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="nav">
    <div class="home nav-item">
        <a href="javascript:void(0);">
            <img src="image/hom1.png">
        </a>
    </div>
    <div class="shopping nav-item">
        <a href="javascript:void(0);">
            <img src="image/shopping1.png">
        </a>
    </div>
    <div class="dongtai nav-item">
        <a href="javascript:void(0);">
            <img src="image/dongtai1.png">
        </a>
    </div>
    <div class="my nav-item">
        <a href="javascript:void(0);">
            <img src="image/my1.png">
        </a>
    </div>
</div>

<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/index.js"></script>
<script src="js/kingSwape.js"></script>
<script>
    KingSwape({time:2000})
</script>
</body>
</html>