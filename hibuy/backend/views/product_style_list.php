<?php
$productStyleInfos = $GLOBALS['productStyleInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>商品样式列表</title>
    <?php
    include_once 'test.php';
    t1();
    ?>

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
                navMenu('navProductStyle', 2);
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
                        <a href="#">商品样式管理</a>
                    </li>
                </ul><!-- .breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        商品样式管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            商品样式列表
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
                                    <th>商品样式ID</th>
                                    <th>商品</th>
                                    <th class="center">颜色</th>
                                    <th>尺寸</th>
                                    <th>库存</th>
                                    <th>销量</th>
                                    <th>删除</th>
                                    <th>修改</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($productStyleInfos as $info):?>
                                    <tr>
                                        <td><?php echo $info['style_id']; ?></td>
                                        <td><?php echo $info['product_name']; ?></td>
                                        <td style="background-color: <?php echo $info['color_value'];?>" ><?php echo $info['color_name']; ?></td>
                                        <td><?php echo $info['size_name']; ?></td>
                                        <td><?php echo $info['stock']?></td>
                                        <td><?php echo $info['sell_num']?></td>
                                        <td>
                                            <a class="red" href="javascript:void(0);" onclick="DeleteInfo(<?php echo $info['style_id'];?>);">
                                                <i class="icon-trash bigger-130"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="red" href="?c=ProductStyle&m=updateProductStyle&style_id=<?php echo $info['style_id']; ?>">
                                                <i class="icon-pencil bigger-130"></i>
                                            </a>
                                        </td>

                                    </tr>

                                <?php endforeach;?>


                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->

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
            function DeleteInfo(style_id){
                //var dress_img = document.getElementsByName('dress_img')[0].value;
                //var submit = document.getElementsByName('submit')[0].value;
                if(style_id==''){
                    alert('请检测参数');
                    return;
                }
                var formData = new FormData();
                formData.append('style_id',style_id);
                ajaxUpFile('?c=ProductStyle&m=showDeleteProductStyle',formData,function(respTest){
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