<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/room.css" rel="stylesheet" />
<link href="css/usermsg.css" rel="stylesheet" />
<div class="contain">
    <div class="head" >
        <div class="btn user_info"><a href="?r=room/basic-info">个人资料</a></div>
        <div class="btn review"><a href="?r=room/review">我的书架</a></div>
        <div class="btn user_book"><a href="?r=room/user-book">我的作品</a></div>
        <div class="btn user_msg"><a href="?r=room/user-msg" style="color: #f60">我的书评</a></div>
        <div class="btn user_msg"><a href="?r=room/author">成为作者</a></div>
    </div>
    <div class="main">
        <div class="user_btn">
            <a href="javascript:void(0);">我的评论</a>
        </div>
        <?php foreach($msgs as $msg):?>
        <div class="user_msg">
            <div class="img"><img src="<?= $msg['user_img']?>"></div>
            <div class="msg_info">
                <div class="user"><a href="#" style="margin-right: 5px"><?= $msg['user_name']?></a><span>发表</span><span style="float: right;margin-right: 50px"><?= date('Y-m-d H:i:s',$msg['ctime'])?></span></div>
                <div class="content" style="padding: 10px 0"><?= $msg['content']?></div>
                <div class="book"><span><?= date('Y-m-d H:i:s',$msg['ctime'])?></span>来自<a href="?r=detail/detail&book_id=<?= $msg['book_id']?>">《<?= $msg['book_name']?>》</a>书评区</div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
