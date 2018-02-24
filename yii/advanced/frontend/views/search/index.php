<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/search.css" rel="stylesheet" />

<div class="contain">
    <div class="head">
        <span>共找到相关小说<span style="color: #f60;margin: 0 5px">23</span>部</span>
    </div>
    <div class="main">
        <div class="s_btn">
            排序：
            <a href="?r=search/index&req=book_id&name=<?= $_GET['name']?>&value=<?= $_GET['value']?>">默认</a>
            <a href="?r=search/index&req=ctime&name=<?= $_GET['name']?>&value=<?= $_GET['value']?>">更新时间</a>
            <span>写作进度：</span>
            <a href="?r=search/index&status=1&name=<?= $_GET['name']?>&value=<?= $_GET['value']?>">连载中</a>
            <a href="?r=search/index&status=2&name=<?= $_GET['name']?>&value=<?= $_GET['value']?>">完本</a>
        </div>
        <div class="list">
            <?php foreach($books as $book):?>
            <div class="book">
                <div class="info">
                    <div class="img">
                        <img src="<?= $book['book_img']?>">
                    </div>
                    <div class="detail">
                        <div class="name">
                            <a href="#" style="color: #1886ac;font-weight: bold"><?= $book['book_name']?></a>
                        </div>
                        <div class="info">
                            <span>作者：<a href="#" style="color:red;font-weight: bold"><?= $book['user_name']?></a></span>
                            <span>类别：<a href="#"><?= $book['class_name']?></a></span>
                            <span>点击数：<?= $book['click']?></span>
                        </div>
                        <div class="content">
                        <span>简介：<a href="#"><?= $book['book_content']?></a></span>
                        </div>
                    </div>
                </div>
                <div class="book_btn">
                    <a href="javascript:void(0);">在线阅读</a>
                    <a href="javascript:void(0);">收藏本书</a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

