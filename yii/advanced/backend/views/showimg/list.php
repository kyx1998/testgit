<?php
$this->params['main_title'] = '展示图管理';
$this->params['sub_title'] = '展示列表';
$this->params['page'] = 'navShowImg';
$this->params['active'] = 2;
?>
<div class="row">

    <div class="col-sm-12">
        <p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>分类</th>
                <th>书名</th>
                <th>展示图</th>
                <th>顺序</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>

            <?php for($i=0;$i<count($show);$i++):?>
                <tr>
                    <td><?= $show[$i]['img_id'] ?></td>
                    <td><?= $class[$i]['class_name'] ?></td>
                    <td><?= $book[$i]['book_name'] ?></td>
                    <td><img style="width: 80px" src="<?= $show[$i]['show_img'] ?>"></td>
                    <td><?= $show[$i]['squence'] ?></td>
                    <td><a href="?r=showimg/update-page&img_id=<?= $show[$i]['img_id'] ?>">编辑</a> | <a href="?r=showimg/del&img_id=<?= $show[$i]['img_id'] ?>">删除</a> </td>
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