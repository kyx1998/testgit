<?php $colorInfos = $GLOBALS['colorInfos'];  ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>商品颜色列表</title>
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
					navMenu('navColor', 2);
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
									 颜色列表
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
											<th>颜色ID</th>
											<th>名称</th>
											<th class="center">颜色</th>
											<th>备注</th>
											<th>删除</th>
                                            <th>修改</th>
										</tr>
										</thead>

										<tbody>
										<?php foreach ($colorInfos as $info):?>
										<tr>
											<td><?php echo $info['color_id']; ?></td>
											<td><?php echo $info['color_name']; ?></td>
											<td class="center" style="background-color: <?php echo $info['color_value']; ?>"></td>
											<td><?php echo $info['remark']; ?></td>
											<td>
												<a class="red" href="?c=Color&m=deleteColor&color_id=<?php echo $info['color_id']; ?>">
													<i class="icon-trash bigger-130"></i>
												</a>
											</td>
                                            <td>
                                                <a class="red" href="?c=Color&m=updateColor&color_id=<?php echo $info['color_id']; ?>">
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
</body>
</html>

