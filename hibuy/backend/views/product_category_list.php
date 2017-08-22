<?php
$categoryInfos = $GLOBALS['categoryInfos'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>商品分类</title>
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
						navMenu('navProductCategory', 2);
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
								<a href="#">商品类别管理</a>
							</li>
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								商品类别管理
								<small>
									<i class="icon-double-angle-right"></i>
									 商品类别列表
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
                                            <th>类别ID</th>
                                            <th>名称</th>
                                            <th class="center">图片</th>
                                            <th>删除</th>
                                            <th>修改</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($categoryInfos as $info):?>
                                            <tr>
                                                <td><?php echo $info['category_id']; ?></td>
                                                <td><?php echo $info['category_name']; ?></td>
                                                <td class="center" ><img src="<?php echo $info['category_img']; ?>" ></td>
                                                <td>
                                                    <a class="red" href="?c=ProductCategory&m=showDeleteProductCategory&category_id=<?php echo $info['category_id'];?>">
                                                        <i class="icon-trash bigger-130"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="red" href="?c=ProductCategory&m=updateProductCategory&category_id=<?php echo $info['category_id'];?>">
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
</body>
</html>

