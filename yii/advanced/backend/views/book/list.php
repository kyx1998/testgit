<?php
$this->params['main_title'] = '书籍管理';
$this->params['sub_title'] = '书籍列表';
$this->params['page'] = 'navBook';
$this->params['active'] = 2;
?>
<div class="row">

    <div class="col-sm-12">
        <p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>书名</th>
                <th>展示图</th>
                <th>顶级分类</th>
                <th>分类</th>
                <th>作者</th>
                <th>状态</th>
                <th>点击量</th>
                <th>收藏量</th>
                <th>下载量</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>

            <?php for($i=0;$i<count($books);$i++):?>
                <tr>
                    <td><?= $books[$i]['book_name'] ?></td>
                    <td><img style="width: 80px" src="<?= $books[$i]['book_img'] ?>"></td>
                    <td><?= $top_classes[$i]['class_name'] ?></td>
                    <td><?= $classes[$i]['class_name'] ?></td>
                    <td><?= $user[$i]['user_name'] ?></td>
                    <td><?= $books[$i]['status'] ?></td>
                    <td><?= $books[$i]['click'] ?></td>
                    <td><?= $books[$i]['save'] ?></td>
                    <td><?= $books[$i]['upload'] ?></td>
                    <td><?= $books[$i]['ctime'] ?></td>
                    <td><a href="?r=book/update-page&book_id=<?= $books[$i]['book_id'] ?>">编辑</a> | <a href="?r=book/del&book_id=<?= $books[$i]['book_id'] ?>">删除</a> </td>
                </tr>
            <?php endfor; ?>


            </tbody>
        </table>

    </div>
</div>

<script>
    function Submit() {
        $('form').submit();
    }
</script>