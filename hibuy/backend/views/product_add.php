<?php
    $categoryInfo=$GLOBALS['categoryInfo'];
    $dressInfos = $GLOBALS['dressInfos'];
    $popularCategoryInfos = $GLOBALS['popularCategoryInfos'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>商品管理</title>
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
						navMenu('navProduct', 1);
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
									 添加商品
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" role="form">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 商品分类 </label>
                                        <div class="col-sm-7">
                                            <select id="category_id">
                                                <option value="0">--请选择--</option>
                                                <?php
                                                foreach($categoryInfo as $info):
                                                ?>
                                                <option value="<?php echo $info['category_id'];?>"><?php echo $info['category_name'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 商品标识符 </label>
                                        <div class="col-sm-7">
                                            <input id="x" type="text" name="product_no"  class="input-small" />
                                        </div>
                                    </div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="x"> 商品名 </label>
										<div class="col-sm-7">
											<input id="x" type="text" name="product_name"  class="input-small" />
										</div>
									</div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 商品子名称</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="text" name="product_subname"  class="input-small" />
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
                                                                    </div><input type="text" value="" name="list_img_url" hidden></li>   <!--存储img图片路径-->

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 原价</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="text" name="origin_price"  class="input-small" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 折扣价</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="text" name="discount_price"  class="input-small" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 运费类型</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="radio" name="freight_type"  value="1" class="input-small" onclick="Check();"/>包邮
                                            <input id="x" type="radio" name="freight_type"  value="2" class="input-small" onclick="Check();"/>不包邮
                                            <input id="x" type="radio" name="freight_type"  value="3" class="input-small" onclick="Check();"/>满额度包邮
                                        </div>
                                    </div>
                                    <div class="form-group" id="freight_limit" hidden>
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 包邮额度</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="text" name="freight_limit"  class="input-small" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 是否优选</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="radio" name="is_optimization"  value="1" class="input-small" />优选
                                            <input id="x" type="radio" name="is_optimization"  value="0" class="input-small" checked="checked"/>非优选
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 是否热销</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="radio" name="is_hot"  value="1" class="input-small" />热销
                                            <input id="x" type="radio" name="is_hot"  value="0" class="input-small" checked="checked"/>非热销
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 是否每周流行</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="radio" name="is_week_popular"  value="1" class="input-small" />每周流行
                                            <input id="x" type="radio" name="is_week_popular"  value="0" class="input-small" checked="checked"/>非每周流行
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 潮流搭配</label>
                                        <div class="col-sm-7">
                                            <select id="dress_id">
                                                <option value="0">--请选择--</option>
                                                <?php
                                                foreach ($dressInfos as $info):
                                                    ?>
                                                    <option value="<?php echo $info['dress_id'];?>"><?php echo $info['dress_name'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 每周流行类别</label>
                                        <div class="col-sm-7">
                                            <select id="popular_category_id">
                                                <option value="0">--请选择--</option>
                                                <?php
                                                foreach ($popularCategoryInfos as $info):
                                                    ?>
                                                    <option value="<?php echo $info['popular_category_id'];?>"><?php echo $info['popular_category_name'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 备注</label>
                                        <div class="col-sm-7">
                                            <input id="x" type="text" name="remark"  value="" class="input-small" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="x"> 创建时间</label>
                                        <div class="col-sm-7">
                                            <input  id="x" type="text" name="ctime"  value="<?php echo date('Y-m-d');?>" class="input-medium"/>
                                        </div>
                                    </div>



                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-info" type="button" name="submit" value="submit" onclick="Submit();">
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
            function ajaxUpFile(url, data, callFun) {
                var xmlhttp;
                if(window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                }else
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                xmlhttp.open('post', url, true);
                xmlhttp.send(data);
                xmlhttp.onreadystatechange=function () {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200) {
                        alert(xmlhttp.responseText);
                        callFun(xmlhttp.responseText);
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
                    document.getElementsByName('list_img_url')[0].value = img_url;
                });
            }
            function getSelectedText(name){                     //获取下拉框选中的值
                var obj = document.getElementById(name);
                for(i=0;i<obj.length;i++){
                    if(obj[i].selected==true){
                        return obj[i].innerHTML;
                    }
                }
            }
            function getRadioValue(obj){                   //获取单选框的value
                for(var i=0; i<obj.length; i ++){
                    if(obj[i].checked){
                        return(obj[i].value);
                    }
                }
            }
            function Check(){
                var freight_type =  getRadioValue(document.getElementsByName('freight_type'));
                if(freight_type ==2){
                    freight_limit =0;
                    document.getElementById('freight_limit').style.display='none';
                }else{
                    document.getElementById('freight_limit').style.display='block';
                     freight_limit =  document.getElementsByName('freight_limit')[0].value;
                }
            }
            function Submit() {
                var submit = document.getElementsByName('submit')[0].value;
                var product_no = document.getElementsByName('product_no')[0].value;
                var product_name =  document.getElementsByName('product_name')[0].value;
                var product_subname =  document.getElementsByName('product_subname')[0].value;
                var list_img_url =  document.getElementsByName('list_img_url')[0].value;
                var origin_price =  document.getElementsByName('origin_price')[0].value;
                var discount_price = document.getElementsByName('discount_price')[0].value;
                var freight_type =  getRadioValue(document.getElementsByName('freight_type'));
                Check(freight_type);

                var is_optimization =  getRadioValue(document.getElementsByName('is_optimization'));
                var is_hot =  getRadioValue(document.getElementsByName('is_hot'));

                var is_week_popular =  getRadioValue(document.getElementsByName('is_week_popular'));

                var category_id = document.getElementById('category_id').value;
                var dress_id = document.getElementById('dress_id').value;
                var popular_category_id = document.getElementById('popular_category_id').value;
                var ctime =  document.getElementsByName('ctime')[0].value;
                var remark =  document.getElementsByName('remark')[0].value;
                if(product_no=='' || product_name==''|| list_img_url==''|| origin_price==''||category_id=='') {
                    alert('请检测参数');
                    return;
                }
                var formdata = new FormData();
                formdata.append('submit',submit);                     //传给控制层进行判断
                formdata.append('product_no',product_no);
                formdata.append('product_name',product_name);
                formdata.append('product_subname',product_subname);
                formdata.append('list_img_url',list_img_url);
                formdata.append('origin_price',origin_price);
                formdata.append('discount_price',discount_price);
                formdata.append('freight_type',freight_type);
                formdata.append('freight_limit',freight_limit);
                formdata.append('is_optimization',is_optimization);
                formdata.append('is_hot',is_hot);
                formdata.append('is_week_popular',is_week_popular);
                formdata.append('category_id',category_id);
                formdata.append('dress_id',dress_id);
                formdata.append('popular_category_id',popular_category_id);
                formdata.append('ctime',ctime);
                formdata.append('remark',remark);
                ajaxUpFile('?c=Product&m=addProduct', formdata, function (respText) {
                    var respObj = JSON.parse(respText);
                    if(respObj.code != 1) {
                        alert(respObj.msg);
                        return;
                    }
                    alert('添加成功');
                })
            }
        </script>
</body>
</html>

