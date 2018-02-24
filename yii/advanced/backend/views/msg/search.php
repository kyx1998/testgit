<?php
$this->params['main_title'] = '评论管理';
$this->params['sub_title'] = '搜索评论';
$this->params['page'] = 'navMsg';
$this->params['active'] = 2;
?>
<div class="row">
    <div class="col-sm-3">
        <h4>类别添加</h4>
        <form action="?r=msg/search" method="post">
            <div class="form-group">
                <span class="col-sm-3 control-label no-padding-right" for="x"> 搜索类型</span>
                <div class="col-sm-7">
                    <input id="x" type="radio" name="freight_type" checked value="1" class="input-small" onclick="check(this)"/>书名
                    <input id="x" type="radio" name="freight_type" value="2" class="input-small" onclick="check(this)"/>作者
                </div>
            </div>
            <div class="form-group" id="1">
                <input type="text" value="" name="book_name" class="form-control" placeholder="请输入书名">
                <input type="text" name="book_id" value="" hidden>
            </div>
            <div class="form-group" id="2" style="display: none">
                <input type="text" value="" name="user_name" class="form-control" placeholder="请输入用户名">
                <input type="text" name="user_id" value="" hidden>
            </div>
            <input type="button" class="btn btn-default" onclick="Submit();" value="搜索">
        </form>
    </div>
    <div class="col-sm-9">
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>书名</th>
                <th>评论用户</th>
                <th>内容</th>
                <th>点赞数</th>
                <th>发表时间</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>
            <?php /*echo $book['book_name'];die();*/?>
            <?php
            if(empty($book['book_name'])){
                ?>
            <?php for($i=0;$i<count($msg);$i++):?>            <!--对应输出查询作者的-->
                <tr>
                    <td><?= $msg[$i]['msg_id'] ?></td>
                    <td><?= $book[$i]['book_name'] ?></td>
                    <td><?= $user['user_name'] ?></td>
                    <td><?= $msg[$i]['content'] ?></td>
                    <td><?= $msg[$i]['likes'] ?></td>
                    <td><?= $msg[$i]['ctime'] ?></td>
                    <td><a href="?r=msg/del&msg_id=<?= $msg[$i]['msg_id'] ?>">删除</a> </td>
                </tr>
            <?php endfor; ?>
            <?php }else{?>
                <?php for($i=0;$i<count($msg);$i++):?>          <!--对应输出查询书的-->
                <tr>
                    <td><?= $msg[$i]['msg_id'] ?></td>
                    <td><?= $book['book_name'] ?></td>
                    <td><?= $user[$i]['user_name'] ?></td>
                    <td><?= $msg[$i]['content'] ?></td>
                    <td><?= $msg[$i]['likes'] ?></td>
                    <td><?= $msg[$i]['ctime'] ?></td>
                    <td><a href="?r=msg/del&msg_id=<?= $msg[$i]['msg_id'] ?>">删除</a> </td>
                </tr>
            <?php endfor; ?>
            <?php }?>
            </tbody>
        </table>

    </div>
</div>
<script>
    function check(elem){
        var type = $(elem).val();
        if(type==1){
            $('#1').css('display','block');
            document.getElementsByName('user_name')[0].value ='';
            $('#2').css('display','none');
        }else{
            $('#1').css('display','none');
            document.getElementsByName('book_name')[0].value ='';
            $('#2').css('display','block');
        }
    }
</script>
<script>
    function Submit() {
        $('form').submit();
    }
</script>