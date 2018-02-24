<?php
$this->params['main_title'] = '审核管理';
$this->params['sub_title'] = '审核列表';
$this->params['page'] = 'navCheck';
$this->params['active'] = 1;
?>
<div class="row">

    <div class="col-sm-12">
        <p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>书名</th>
                <th>作者</th>
                <th>顶级分类</th>
                <th>分类</th>
                <th>简介</th>
                <th>创建时间</th>
                <th>书籍链接</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($check as $value):?>
            <tr>
                <td><?= $value['book_name']?></td>
                <td><?= $value['user_name']?></td>
                <td><?= $value['top_class_name']?></td>
                <td><?= $value['class_name']?></td>
                <td><?= $value['book_content']?></td>
                <td><?= $value['ctime']?></td>
                <td><a href="<?= $value['book_link']?>">阅读</a></td>
                <td><a href="?r=check/check-on&check_id=<?= $value['check_id'] ?>&user_name=<?= $value['user_name']?>">通过</a>|<a href="?r=check/check-out&check_id=<?= $value['check_id'] ?>">不通过</a></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    </div>
</div>

<script>
    function Submit() {
        $('form').submit();
    }
</script>