<?php

// 控制台
function navControl($act=0)
{
    $liFormat = '<li class="%s">
							<a href="index.php">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 控制台 </span>
							</a>
						</li>';
    if($act == 1) {
        $li = sprintf($liFormat, 'active');
    }
    else
        $li = sprintf($liFormat, '');
    return $li;
}

// 颜色管理
function navColor($act=0)
{
    $liFormat = '<li class="%s">
							<a href="color_add.html" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 颜色管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="color_add.php">
										<i class="icon-double-angle-right"></i>
										添加商品颜色
									</a>
								</li>

								<li class="%s">
									<a href="color_list.php">
										<i class="icon-double-angle-right"></i>
										商品颜色列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 尺寸管理
function navSize($act=0)
{
    $liFormat = '<li class="%s">
							<a href="color_add.php" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 尺寸管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="size_add.php">
										<i class="icon-double-angle-right"></i>
										添加商品尺寸
									</a>
								</li>

								<li class="%s">
									<a href="size_list.php">
										<i class="icon-double-angle-right"></i>
										商品尺寸列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 商品类别
function navProductCategory($act=0)
{
    $liFormat = '<li class="%s">
							<a href="product_category_add.phpl" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 商品分类管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="product_category_add.php">
										<i class="icon-double-angle-right"></i>
										添加商品分类
									</a>
								</li>

								<li class="%s">
									<a href="product_category_list.php">
										<i class="icon-double-angle-right"></i>
										商品尺寸列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}


function navMenu($page, $active)
{
    $menu = [
        'navControl',
        'navColor',
        'navSize',
        'navProductCategory'
    ];
    foreach ($menu as $m) {
        if($m == $page)
            echo $m($active);
        else
            echo $m(0);
    }
}