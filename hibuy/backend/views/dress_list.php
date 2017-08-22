<?php
$dressInfos = $GLOBALS['dressInfos'];
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
                navMenu('navDress', 2);
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
                            穿搭样式列表
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
                                    <th>穿搭ID</th>
                                    <th>样式</th>
                                    <th class="center">图片</th>
                                    <th>删除</th>
                                    <th>修改</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($dressInfos as $info):?>
                                    <tr>
                                        <td><?php echo $info['dress_id']; ?></td>
                                        <td><?php echo $info['dress_name']; ?></td>
                                        <td class="center" ><img src="<?php echo $info['dress_img']; ?>" ></td>
                                        <td>
                                            <a class="red" href="" onclick="DeleteInfo(<?php echo $info['dress_id'];?>);">
                                                <i class="icon-trash bigger-130"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="red" href="?c=Dress&m=updateDress&dress_id=<?php echo $info['dress_id'];?>">
                                                <i class="icon-pencil bigger-130"></i>
                                            </a>
                                        </td>

                                    </tr>

                                <?php endforeach;?>


                                </tbody>
                            </table>
                        </div>


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
            function DeleteInfo(dress_id){
                //var dress_img = document.getElementsByName('dress_img')[0].value;
                //var submit = document.getElementsByName('submit')[0].value;
                if(dress_id==''){
                    alert('请检测参数');
                    return;
                }
                var formData = new FormData();
                formData.append('dress_id',dress_id);
                ajaxUpFile('?c=Dress&m=showDeleteDress',formData,function(respTest){
                    var xmlHttpObj = JSON.parse(respTest);
                    if(xmlHttpObj.code!=1){
                        alert(xmlHttpObj.msg);
                        return;
                    }
                    alert('删除成功');
                })
            }
        </script>
</body>
</html>
