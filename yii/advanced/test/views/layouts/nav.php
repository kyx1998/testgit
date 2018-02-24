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
function navBook($act=0)
{
    $liFormat = '<li class="%s">
							<a href="color_add.html" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 小说管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="color_add.php">
										<i class="icon-double-angle-right"></i>
										添加小说
									</a>
								</li>

								<li class="%s">
									<a href="color_list.php">
										<i class="icon-double-angle-right"></i>
										小说列表
									</a>
								</li>
								<li class="%s">
									<a href="color_list.php">
										<i class="icon-double-angle-right"></i>
										小说类别目录
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
function navShowImg($act=0)
{
    $liFormat = '<li class="%s">
							<a href="color_add.php" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 网站展示图管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="size_add.php">
										<i class="icon-double-angle-right"></i>
										添加图片
									</a>
								</li>

								<li class="%s">
									<a href="size_list.php">
										<i class="icon-double-angle-right"></i>
										图片列表
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
function navMsgBoard($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?r=test/classification-add" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 用户留言管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=test/classification-list">
										<i class="icon-double-angle-right"></i>
										商品尺寸列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active');
    else
        $li = sprintf($liFormat, '', '');
    return $li;
}


function navMenu($page, $active)
{
    $menu = [
        'navControl',
        'navBook',
        'navShowImg',
        'navMsgBoard',
    ];
    foreach ($menu as $m) {
        if($m == $page)
            echo $m($active);
        else
            echo $m(0);
    }
}