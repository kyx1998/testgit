<?php
$dressInfo = $GLOBALS['dressInfo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>潮流穿搭</title>
    <?php
    include_once 'test.php';
    t1();
    ?>

    <style>

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
                navMenu('navDress', 1);
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
                        <a href="#">潮流穿搭</a>
                    </li>
                </ul><!-- .breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        穿搭样式管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            修改穿搭样式
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="x"> 样式名 </label>
                                <div class="col-sm-7">
                                    <input type="text" name="dress_id" value="<?php echo $dressInfo['dress_id'];?>" hidden>
                                    <input id="x" type="text"  name="dress_name" class="input-small" value="<?php echo $dressInfo['dress_name'];?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 图片 </label>
                                <div class="col-sm-4">

                                    <div class="widget-box">
                                        <div class="widget-body">
                                            <input type="file"  id="id-input-file-1" onchange="UpFile(this,'http://localhost/studyPHP/hibuy/resource/index.php');"/>
                                            <div class="widget-main">
                                                <div class="row">
                                                    <ul class="ace-thumbnails" id="list_image_src" >
                                                        <li><a href="<?php echo $dressInfo['dress_img'];?>" title="Photo Title" data-rel="colorbox"><img src="<?php echo $dressInfo['dress_img'];?>" name="img"></a><div class="tools">
                                                                <a href="javascript:void(0);" onclick="DeleteImage(this);">
                                                                    <i class="icon-remove red"></i>
                                                                </a>
                                                            </div><input type="text" name="dress_img" value="<?php echo $dressInfo['dress_img'];?>" hidden></li>   <!--存储img图片路径-->

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="space-4"></div>


                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="button" name="submit" value="submit" onclick="Submit()">
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

                $('#id-input-file-1').ace_file_input({
                    //style: 'well',
                    no_file:'No File ...',
                    btn_choose:'Choose',
                    btn_change:'Change',
                    droppable:false,
                    //onchange:null,
                    thumbnail:'large', //| true | large
                    whitelist:'gif|png|jpg|jpeg',
                    blacklist:'exe|php',
                    allowExt: ['gif','png'],
                    icon_remove: false,
                    onchange:function () {
                        alert('aaa');
                    },
                    before_change: function (files, dropped) {
                        //alert('x');
                        return true;
                    }
                    //
                });

                colorbox_params = {
                    reposition:true,
                    scalePhotos:true,
                    scrolling:false,
                    previous:'<i class="icon-arrow-left"></i>',
                    next:'<i class="icon-arrow-right"></i>',
                    close:'&times;',
                    current:'{current} of {total}',
                    maxWidth:'100%',
                    maxHeight:'100%',
                    onOpen:function(){
                        document.body.style.overflow = 'hidden';
                    },
                    onClosed:function(){
                        document.body.style.overflow = 'auto';
                    },
                    onComplete:function(){
                        $.colorbox.resize();
                    }
                };
                $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);


            })
        </script>
        <div style="display:none"></div>
        <script>
            function ajaxUpFile(url,data,callFun){
                var xmlHttp;
                if(window.XMLHttpRequest){
                    xmlHttp = new XMLHttpRequest();
                }else{
                    xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
                }
                xmlHttp.open('post',url,true);
                xmlHttp.send(data);
                xmlHttp.onreadystatechange = function (){

                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                        callFun(xmlHttp.responseText);
                    }
                }
            }
            function UpFile(elem,url){
                var img_input = elem.files[0];
                var formData = new FormData();               //异步上传二进制文件
                formData.append('img',img_input);     //文件转化为键值对形式，由于是数组形式，可支持多文件上传
                ajaxUpFile(url, formData, function (respTest) {
                    var xmlHttpObj = JSON.parse(respTest);            //json参数是否正确
                    if(xmlHttpObj.code!=1){
                        alert(xmlHttpObj.msg);
                        return;
                    }
                    var img_url = xmlHttpObj.data.url;
                    document.getElementsByName('img')[0].src = img_url;
                    document.getElementsByClassName('cboxElement')[0].href = img_url;
                    document.getElementsByName('dress_img')[0].value = img_url;
                });
            }
            function Submit(){
                var dress_id = document.getElementsByName('dress_id')[0].value;
                var dress_name = document.getElementsByName('dress_name')[0].value;
                var dress_img = document.getElementsByName('dress_img')[0].value;
                if(dress_name=='' || dress_img==''){
                    alert('请检测参数');
                    return;
                }
                var formData = new FormData();
                formData.append('dress_id',dress_id);
                formData.append('dress_name',dress_name);
                formData.append('dress_img',dress_img);
                ajaxUpFile('?c=Dress&m=updateDressPage',formData,function(respTest){
                    var xmlHttpObj = JSON.parse(respTest);
                    if(xmlHttpObj.code!=1){
                        console.log(xmlHttpObj.data);
                        alert(xmlHttpObj.msg);
                        return;
                    }
                    alert('修改成功');
                    document.getElementsByName('dress_name')[0].value = xmlHttpObj.data.dress_name;
                    document.getElementsByName('dress_img')[0].value = xmlHttpObj.data.dress_img;
                })
            }
        </script>
</body>
</html>