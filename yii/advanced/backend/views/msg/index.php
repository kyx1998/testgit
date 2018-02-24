<?php
$this->params['main_title'] = '评论管理';
$this->params['sub_title'] = '评论列表';
$this->params['page'] = 'navMsg';
$this->params['active'] = 1;
?>
<div class="row">
    <div class="col-sm-12">
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
            <?php for($i=0;$i<count($msg);$i++):?>
                <tr>
                    <td><?= $msg[$i]['msg_id'] ?></td>
                    <td><?= $book[$i]['book_name'] ?></td>
                    <td><?= $user[$i]['user_name'] ?></td>
                    <td><?= $msg[$i]['content'] ?></td>
                    <td><?= $msg[$i]['likes'] ?></td>
                    <td><?= $msg[$i]['ctime'] ?></td>
                    <td><a href="?r=msg/del&msg_id=<?= $msg[$i]['msg_id'] ?>">删除</a> </td>
                </tr>
            <?php endfor; ?>
            </tbody>
        </table>

    </div>
</div>
