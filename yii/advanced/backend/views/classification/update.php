<?php
$this->params['main_title'] = '小说管理';
$this->params['sub_title'] = '小说类别目录';
$this->params['page'] = 'navBook';
$this->params['active'] = 1;
?>
<div class="row">
    <div class="col-sm-3">
        <h4>类别修改</h4>
        <form action="?r=classification/update" method="post">
            <div class="form-group">
                <label>父级分类目录</label>
                <select class="form-control" name="parent_id">
                    <option value="-1">顶级目录</option>
                    <?php if(!empty($classes)): ?>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['class_id'] ?>" <?php if($class['class_id']==$parent_id){echo 'selected';}?>><?php if($class['level'] != 0) echo '|'; echo str_repeat('----', $class['level']) . $class['class_name']; ?></option>
                        <?php endforeach;?>
                    <?php endif; ?>
                </select>
            </div>
            <input name="class_id" type="text" value="<?= $class_id ?>" hidden>
            <div class="form-group">
                <label>名称</label>
                <input type="text" name="class_name" class="form-control" placeholder=""  value="<?= $class_name ?>">
            </div>
            <input type="button" class="btn btn-default" onclick="Submit();" value="增加">
        </form>
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