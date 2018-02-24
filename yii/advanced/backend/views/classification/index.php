<?php
$this->params['main_title'] = '小说管理';
$this->params['sub_title'] = '小说类别目录';
$this->params['page'] = 'navBook';
$this->params['active'] = 3;
?>
<div class="row">
    <div class="col-sm-3">
        <h4>类别添加</h4>
        <form action="?r=classification/add" method="post">
            <div class="form-group">
                <label>父级分类目录</label>
                <select class="form-control" name="parent_id">
                    <option value="-1">顶级目录</option>
                    <?php if(!empty($classes)): ?>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['class_id'] ?>"><?php if($class['level'] != 0) echo '|'; echo str_repeat('----', $class['level']) . $class['class_name']; ?></option>
                        <?php endforeach;?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label>名称</label>
                <input type="text" name="class_name" class="form-control" placeholder="">
            </div>
            <input type="button" class="btn btn-default" onclick="Submit();" value="增加">
        </form>
    </div>

    <div class="col-sm-9">
        <p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="width: 60%">名称</th>

                <th style="width: 20%">操作</th>
            </tr>
            </thead>

            <tbody>
            <?php if(!empty($classes)): ?>
                <?php foreach ($classes as $class): ?>
                    <tr>
                        <td><?= str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $class['level']) . $class['class_name'];?></td>
                        <td><a href="?r=classification/del&class_id=<?= $class['class_id'] ?>">删除</a> | <a href="?r=classification/update-page&class_id=<?= $class['class_id'] ?>">编辑</a> </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif;?>


            </tbody>
        </table>

    </div>
</div>

<script>
    function Submit() {
        var class_name = $('[name=class_name]').val();
        if(class_name == '') {
            return;
        }
        $('form').submit();
    }
</script>