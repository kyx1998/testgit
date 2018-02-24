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

// 书籍管理
function navBook($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 书籍管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=book/add">
										<i class="icon-double-angle-right"></i>
										添加书籍
									</a>
								</li>

								<li class="%s">
									<a href="?r=book/list">
										<i class="icon-double-angle-right"></i>
										书籍列表
									</a>
								</li>
								<li class="%s">
									<a href="?r=classification/index">
										<i class="icon-double-angle-right"></i>
										书籍类别目录
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '','');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active','');
    else if($act == 3)
        $li = sprintf($liFormat, 'active open', '', '','active');
    else
        $li = sprintf($liFormat, '', '', '','');
    return $li;
}

// 每周推荐展示图管理
function navShowImg($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 每周推荐展示图管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=showimg/add">
										<i class="icon-double-angle-right"></i>
										添加图片
									</a>
								</li>

								<li class="%s">
									<a href="?r=showimg/list">
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

//编辑推荐
function navEdit($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 编辑推荐 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=edit/index">
										<i class="icon-double-angle-right"></i>
										推荐列表
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
//全站最佳
function navWeek($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 全站最佳 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=week/index">
										<i class="icon-double-angle-right"></i>
										推荐列表
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
function navMsg($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 评论管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=msg/index">
										<i class="icon-double-angle-right"></i>
										评论列表
									</a>
								</li>
								<li class="%s">
									<a href="?r=msg/search-page">
										<i class="icon-double-angle-right"></i>
										搜索评论
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active','');
    else if($act == 2)
            $li = sprintf($liFormat, 'active open', '','active');
    else
        $li = sprintf($liFormat, '', '','');
    return $li;
}
//审核管理
function navCheck($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 审核管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=check/index">
										<i class="icon-double-angle-right"></i>
										审核列表
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
        'navEdit',
        'navWeek',
        'navMsg',
        'navCheck',
    ];
    foreach ($menu as $m) {
        if($m == $page)
            echo $m($active);
        else
            echo $m(0);
    }
}