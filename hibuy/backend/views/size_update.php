<?php $sizeInfo = $GLOBALS['sizeInfo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>修改商品尺码</title>
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
                navMenu('navSize', 1);
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
                        <a href="#">尺寸管理</a>
                    </li>
                </ul><!-- .breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        尺寸管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            修改尺寸
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 尺码 </label>

                                <div class="col-sm-9">
                                    <input type="text" name="size_id" value="<?php echo $sizeInfo['size_id'];?>" hidden>
                                    <input type="text" name="size_name" placeholder="" class="input-sm" value="<?php echo $sizeInfo['size_name'];?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 备注 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="remark" placeholder="备注" class="col-xs-10 col-sm-5" value="<?php echo $sizeInfo['remark'];?>"/>
                                </div>
                            </div>


                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="button" onclick="UpdateSize();">
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

                        <p style="color: red" name="tips"></p>
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

        <script>
            /**
             * 异步提交数据
             * @param url  提交的url
             * @param data 要提交的数据 格式为name1=value1&name2=valu3&....
             * @param callFun 提交成功后回调的函数
             */
            function ajaxSubmit(url, data, callFun) {
                var xmlhttp;
                if(window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                }else {
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                }
                xmlhttp.open('post', url, true);
                xmlhttp.setRequestHeader('Content-type',' application/x-www-form-urlencoded');
                xmlhttp.send(data);
                xmlhttp.onreadystatechange = function () {
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        callFun(xmlhttp.responseText);
                    }
                }
            }
            function UpdateSize() {
                document.getElementsByName('tips')[0].innerText = '';
                var size_name = document.getElementsByName('size_name')[0].value;
                var remark = document.getElementsByName('remark')[0].value;
                var size_id = document.getElementsByName('size_id')[0].value;
                if(size_name == '') {
                    document.getElementsByName('tips')[0].innerText = '请检测参数';
                    return false;
                }
               // var formData = new FormData();
                var url = '?c=Size&m=updateSizePage';
                //formData.append('size_id',size_id);
                //formData.append('size_name',size_name);
                //formData.append('remark',remark);
                var Data = 'size_name='+size_name+'&size_id='+size_id+'&remark='+remark;
                ajaxSubmit(url, Data, function (rspText) {
                    var respObj = JSON.parse(rspText);
                    if(respObj.code == 2) {
                        document.getElementsByName('tips')[0].innerText = '请检测参数';
                        return false;
                    }
                    document.getElementsByName('tips')[0].innerText = '提交成功';
                    document.getElementsByName('size_name')[0].value = respObj.data.size_name;
                    document.getElementsByName('remark')[0].value = respObj.data.remark;
                    return true;
                })
            }
        </script>
</body>
</html>
