<?php
$msgInfos = $GLOBALS['msgInfos'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>今日热点</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/hot.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="banner">
        <img src="image/hot.png">
    </div>

    <div class="hot-items">
        <?php
        foreach($msgInfos as $info):
        ?>
        <div class="hot-item">
            <div class="hot-title"><?php echo $info['title'];?></div>
            <div class="hot-body">
                <a href="?c=MsgBoard&m=showMsgReply&id=<?php echo $info['msg_id'];?>">
                    <div class="hot-content">
                        <div class="author">
                            <div class="author-icon">
                                <img src="image/w1.png">
                            </div>
                            <div class="author-name">
                                <div class="author-name-name">松茸部长</div>
                                <div class="author-tag">资深LifeStyle编辑</div>
                            </div>
                        </div>
                        <div class="hot-content-info"><?php echo $info['msg_content'];?></div>
                    </div>
                    <div class="hot-img">
                        <img src="<?php echo $info['msg_img'];?>">
                    </div>
                </a>
            </div>
            <?php endforeach;?>
        </div>

        <div class="hot-item">
            <div class="hot-title">TO.1 男神女神们读书忙 你还在继续做文盲?</div>
            <div class="hot-body">
                <a href="hot_artic.html">
                    <div class="hot-content">
                        <div class="author">
                            <div class="author-icon">
                                <img src="image/w1.png">
                            </div>
                            <div class="author-name">
                                <div class="author-name-name">松茸部长</div>
                                <div class="author-tag">资深LifeStyle编辑</div>
                            </div>
                        </div>
                        <div class="hot-content-info">刚刚过去的4月23第是“世界读书日”，你今年读过几本书了？阅读这件事听起来高大上的事儿，很多娱乐明星的男神女神也都在做！</div>
                    </div>
                    <div class="hot-img">
                        <img src="image/d1.png">
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
</body>
</html>