<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/room.css" rel="stylesheet" />
<div class="contain">
    <div class="head" >
        <div class="btn user_info"><a href="?r=room/basic-info">个人资料</a></div>
        <div class="btn review"><a href="?r=room/review" style="color: #f60">我的书架</a></div>
        <div class="btn user_book"><a href="?r=room/user-book">我的作品</a></div>
        <div class="btn user_msg"><a href="?r=room/user-msg">我的书评</a></div>
        <div class="btn user_msg"><a href="?r=room/author">成为作者</a></div>
    </div>
    <div class="main">
        <div class="review">
            <div class="head2"></div>
            <table class="table" cellpadding="0" cellspacing="0">
                <tr>
                    <th>序号</th>
                    <th>类别</th>
                    <th>书名</th>
                    <th>作者</th>
                    <th>更新时间</th>
                    <th>状态</th>
                </tr>
                <?php for($i=0;$i<count($books);$i++):?>
                    <tr>
                        <td><?= $i+1?></td>
                        <td><a href="#" class="class"><?= $books[$i]['class_name']?></a></td>
                        <td class="name"><a style="color: #1886ac" href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_name']?></a></td>
                        <td><a style="color: #1886ac" href="#"><?= $books[$i]['user_name']?></a></td>
                        <td><?= $books[$i]['ctime']?></td>
                        <td style="color: #008000"><?= ($books[$i]['status']==1)?'连载':'完本'?></td>
                    </tr>
                <?php endfor;?>
            </table>
            <!-- <div class="page_btn"><a href="#">上一页</a><a href="#">下一页</a></div>-->
        </div>
    </div>
</div>
