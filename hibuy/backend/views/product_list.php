<?php
$productNameInfos=$GLOBALS['productNameInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>商品</title>
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
                navMenu('navProduct', 2);
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
                        <a href="#">商品管理</a>
                    </li>
                </ul><!-- .breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        商品管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            商品列表
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
                                    <th>商品ID</th>
                                    <th>商品唯一标识符</th>
                                    <th>商品分类</th>
                                    <th>潮流搭配类别</th>
                                    <th>每周流行类别</th>
                                    <th>商品名称</th>
                                    <th>商品子名称</th>
                                    <th>展示图片</th>
                                    <th>商品原价</th>
                                    <th>折扣价</th>
                                    <th>运费类型</th>
                                    <th>包邮额度</th>
                                    <th>是否优选</th>
                                    <th>是否热销</th>
                                    <th>是否每周流行</th>
                                    <th>库存</th>
                                    <th>销量</th>
                                    <th>创建时间</th>
                                    <th>备注</th>
                                    <th>删除</th>
                                    <th>修改</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($productNameInfos as $info):?>
                                    <tr>
                                        <td><?php echo $info['product_id']; ?></td>
                                        <td><?php echo $info['product_no']; ?></td>
                                        <td><?php
                                            echo $info['category_name'];
                                           ?>
                                        </td>
                                        <td><?php echo $info['dress_name'];?></td>
                                        <td><?php echo $info['popular_category_name'];?></td>
                                        <td><?php echo $info['product_name']; ?></td>
                                        <td><?php echo $info['product_subname']; ?></td>
                                        <td><img src="<?php echo $info['list_img_url'];?>"></td>
                                        <td><?php echo $info['origin_price']; ?></td>
                                        <td><?php echo $info['discount_price']; ?></td>
                                        <td><?php echo $info['freight_type']; ?></td>
                                        <td><?php echo $info['freight_limit']; ?></td>
                                        <td><?php echo $info['is_optimization']; ?></td>
                                        <td><?php echo $info['is_hot']; ?></td>
                                        <td><?php echo $info['is_week_popular'];?></td>
                                        <td><?php echo $info['stock'];?></td>
                                        <td><?php echo $info['sell_num'];?></td>
                                        <td><?php echo $info['ctime'];?></td>
                                        <td><?php echo $info['remark'];?></td>
                                        <td>
                                            <a class="red" href="" onclick="DeleteInfo(<?php echo $info['product_id'];?>);">
                                                <i class="icon-trash bigger-130"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="red" href="?c=Product&m=updateProduct&product_id=<?php echo $info['product_id']; ?>">
                                                <i class="icon-edit bigger-130"></i>
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
    function DeleteInfo(product_id){
        //var dress_img = document.getElementsByName('dress_img')[0].value;
        //var submit = document.getElementsByName('submit')[0].value;
        if(product_id==''){
            alert('请检测参数');
            return;
        }
        var formData = new FormData();
        formData.append('product_id',product_id);
        ajaxUpFile('?c=Product&m=showDeleteProduct',formData,function(respTest){
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

