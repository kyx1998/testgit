<?php $colorInfo = $GLOBALS['colorInfo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>修改商品颜色</title>
    <?php
    include_once 'test.php';
    t1();
    ?>

    <style>
        .show-color {
            width: 15px;
            height: 15px;
            background-color: white;
            display: none;
        }
    </style>
</head>

<body>
<?php
t2();
?>
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>


            <ul class="nav nav-list">
                <?php
                include_once 'nav.php';
                navMenu('navColor', 1);
                ?>

            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="#">颜色管理</a>
                    </li>
                </ul><!-- .breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        颜色管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            修改颜色
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal" role="form" action="?c=Color&m=updateColorPage" method="get">
                            <input type="text" name="c" value="Color" hidden>
                            <input type="text" name="m" value="updateColorPage" hidden>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 颜色值 </label>
                                <div class="col-sm-9">
                                    <input name="color_id" type="text" value="<?php echo $colorInfo['color_id']; ?>" hidden>
                                    <input id="colorpicker1" name="color_value" type="text" class="input-small" value="<?php echo $colorInfo['color_value'];?>"/>
                                    <span class="show-color"style="background-color: <?php echo $colorInfo['color_value']; ?>;display: inline-block"></span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 颜色名称 </label>

                                <div class="col-sm-9">
                                    <input type="text" name="color_name" placeholder="白色" class="col-xs-10 col-sm-5" value="<?php echo $colorInfo['color_name'];?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 备注 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="remark"  placeholder="备注" class="col-xs-10 col-sm-5" value="<?php echo $colorInfo['remark'];?>"/>
                                </div>
                            </div>

                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit" name="submit" value="submit">
                                        <i class="icon-ok bigger-110"></i>
                                        Submit
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="icon-undo bigger-110"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>

                        </form>
                        <p style="color: red">
                            <?php
                            if(!empty($GLOBALS['rt_code'])) {
                                if($GLOBALS['rt_code'] == OK) {
                                    echo '添加成功';
                                }
                                else if($GLOBALS['rt_code'] == ERR_PARAM){
                                    echo '请检测参数';
                                }
                            }
                            ?>
                        </p>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->

        <?php
        t3();
        ?>

        <script type="text/javascript">
            jQuery(function($) {
                $('#colorpicker1').colorpicker();
                $('#colorpicker1').blur(function () {
                    $('.show-color').css('display', 'inline-block');
                    $('.show-color').css('backgroundColor', $(this).val());
                })
            })
        </script>
        <div style="display:none"></div>
</body>
</html>
