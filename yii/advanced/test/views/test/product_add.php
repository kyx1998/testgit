<?php
//$this->menu = 'navProductCategory';
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
                    添加分类
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form" action="?r=test/classification-add" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 分类名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 类别 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 商品编号 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 商品名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 商品简介 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 原价 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 折扣价 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 规格 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 分类名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 时间 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 时间 </label>

                        <div class="col-sm-9">
                            <input type="text" name="class_name" placeholder="白色" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 图片 </label>
                        <div class="col-sm-4">

                            <div class="widget-box">
                                <div class="widget-body">
                                    <input type="file"  id="id-input-file-1" onchange="UpFile(this,'http://localhost/studyPHP/hibuy/resource/index.php')"/>
                                    <div class="widget-main">
                                        <div class="row">
                                            <ul class="ace-thumbnails" id="list_image_src" >
                                                <li><a href="" title="Photo Title" data-rel="colorbox"><img src="" name="img" id="img"></a><div class="tools">
                                                        <a href="javascript:void(0);" onclick="DeleteImage(this);">
                                                            <i class="icon-remove red"></i>
                                                        </a>
                                                    </div><input type="text" value="" name="category_img" hidden></li>   <!--存储img图片路径-->

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button" onclick="Upload();">
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
                    <div class="form-group">
                        <div class="form-lable"></div>
                        <div class="form-value">
                            <span class="errormsg"><?= empty($errmsg)?'':$errmsg ?></span>
                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script>
    function Upload(){
        var parent_id = $('#category_id').val();
        var class_name = $('[name=class_name]').val();
        if(class_name==''){
            $('.errormsg').text('分类名不能为空');
            return;
        }
        $.ajax({
            url: '?r=test/classification-add',
            data: 'parent_id='+parent_id+'&class_name='+class_name,
            dataType: 'text',
            type: 'post',
            success:function(){
                alert('添加成功');
                return;
            },
            error: function (msg) {

            }
        });
    }
</script>