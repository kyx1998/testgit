<?php
?>
<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">分类管理</a>
            </li>
        </ul><!-- .breadcrumb -->

    </div>

    <div class="page-content">
        <div class="page-header">
            <h1>
                分类管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    分类列表
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="table-responsive">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>分类名</th>
                            <th>删除</th>
                            <th>修改</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                /*
        * 查找 $parent 的所有子元素
        * @param $classes //全部的数据
        * @param $parent
        * @param $ll
        */
                                function Show($classes, $parent, $ll)
                                {
                                    $ll++;
                                    foreach ($classes as $cl) {
                                        if($cl['parent_id'] == $parent['class_id']) {
                                            echo '<tr>';
                                            echo '<td>|' .str_repeat(' ',$ll) . $cl['class_name'] . '</td>';
                                            echo '</tr>';
                                            Show($classes, $cl, $ll);
                                        }

                                    }
                                }
                                foreach ($classes as $class) {
                                    if($class['parent_id'] == -1) {
                                        echo '<tr>';
                                        echo '<td>' . $class['class_name'] . '</td>';
                                        echo '</tr>';
                                        Show($classes, $class, 1);
                                    }
                                }
                                ?>
                                <!--<td>
                                    <a class="red" href="?r=test/classification-delete&class_id=<?php /*echo $info['class_id']; */?>">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="red" href="?r=test/classification-update-page&class_id=<?php /*echo $info['class_id']; */?>">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>
                                </td>-->

                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->

                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
