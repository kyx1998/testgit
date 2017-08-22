<?php
$colorInfos = $GLOBALS['colorInfos'];
$sizeInfos = $GLOBALS['sizeInfos'];
$productInfos = $GLOBALS['productInfos'];
$productStyleInfo = $GLOBALS['productStyleInfo'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>添加商品样式</title>
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
                navMenu('navProductStyle', 1);
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
                            修改商品样式
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="x"> 商品分类ID </label>
                                <div class="col-sm-7">
                                    <select id="color_id">
                                        <option value="0">--请选择--</option>
                                        <?php
                                        foreach($colorInfos as $info):
                                            if($info['color_id'] == $productStyleInfo['color_id']):
                                            ?>
                                            <option style="background-color: <?php echo $info['color_value'];?>" value="<?php echo $info['color_id'];?>" selected><?php echo $info['color_name'];?></option>
                                        <?php endif;?>
                                            <option style="background-color: <?php echo $info['color_value'];?>" value="<?php echo $info['color_id'];?>"><?php echo $info['color_name'];?></option>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="x"> 商品分类ID </label>
                                <div class="col-sm-7">
                                    <select id="size_id">
                                        <option value="0">--请选择--</option>
                                        <?php
                                        foreach($sizeInfos as $info):
                                            if($info['size_id']==$productStyleInfo['size_id']):
                                            ?>
                                            <option value="<?php echo $info['size_id'];?>" selected><?php echo $info['size_name'];?></option>
                                        <?php endif;?>
                                            <option value="<?php echo $info['size_id'];?>"><?php echo $info['size_name'];?></option>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="x"> 商品分类ID </label>
                                <div class="col-sm-7">
                                    <select id="product_id">
                                        <option value="0">--请选择--</option>
                                        <?php
                                        foreach($productInfos as $info):
                                            if($info['product_id']==$productStyleInfo['product_id']):
                                            ?>
                                            <option value="<?php echo $info['product_id'];?>" selected><?php echo $info['product_name'];?></option>
                                        <?php endif;?>
                                            <option value="<?php echo $info['product_id'];?>"><?php echo $info['product_name'];?></option>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 销量 </label>

                                <div class="col-sm-9">
                                    <input type="text" name="style_id" value="<?php echo $productStyleInfo['style_id'];?>" hidden>
                                    <input type="text" name="stock" placeholder="" class="input-sm" value="<?php echo $productStyleInfo['sell_num'];?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 库存 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="sell_num" placeholder="库存" class="input-sm" value="<?php echo $productStyleInfo['stock'];?>"/>
                                </div>
                            </div>


                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="button" name="submit" onclick="Submit();">
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
            function Submit(){
                var product_id = document.getElementById('product_id').value;
                var color_id = document.getElementById('color_id').value;
                var size_id = document.getElementById('size_id').value;
                var stock = document.getElementsByName('stock')[0].value;
                var style_id = document.getElementsByName('style_id')[0].value;    //从上往下读，要写在stock之后
                var sell_num = document.getElementsByName('sell_num')[0].value;
                if(style_id==''||product_id == ''||color_id==''||size_id==''||stock==''||sell_num=='') {
                    alert('请检测参数');
                    return;
                }
                var formData = new FormData();
                formData.append('style_id',style_id);
                formData.append('product_id',product_id);
                formData.append('color_id',color_id);
                formData.append('size_id',size_id);
                formData.append('stock',stock);
                formData.append('sell_num',sell_num);
                ajaxUpFile('?c=ProductStyle&m=updateProductStylePage', formData, function (rspText) {
                    var respObj = JSON.parse(rspText);
                    if(respObj.code!=1){
                        alert(respObj.msg);
                        return;
                    }
                    alert('修改成功');
                })
            }
        </script>
</body>
</html>