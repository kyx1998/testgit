<?php

// 控制台
function navControl($act=0)
{
    $liFormat = '<li class="%s">
							<a href="/studyPHP/hibuy/backend/?c=Index&m=showIndex">
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
							<a href="?c=Color&m=showAddColor" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 颜色管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Color&m=showAddColor">
										<i class="icon-double-angle-right"></i>
										添加商品颜色
									</a>
								</li>

								<li class="%s">
									<a href="?c=Color&m=showListColor">
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
							<a href="?c=Size&m=showAddSize" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 尺寸管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Size&m=showAddSize">
										<i class="icon-double-angle-right"></i>
										添加商品尺寸
									</a>
								</li>

								<li class="%s">
									<a href="?c=Size&m=showListSize">
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
							<a href="?c=ProductCategory&m=showAddProductCategory" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 商品分类管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=ProductCategory&m=showAddProductCategory">
										<i class="icon-double-angle-right"></i>
										添加商品分类
									</a>
								</li>

								<li class="%s">
									<a href="?c=ProductCategory&m=showListProductCategory">
										<i class="icon-double-angle-right"></i>
										商品类别列表
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

// 商品管理
function navProduct($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Product&m=addProduct" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 商品管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Product&m=addProduct">
										<i class="icon-double-angle-right"></i>
										添加商品
									</a>
								</li>

								<li class="%s">
									<a href="?c=Product&m=showListProduct">
										<i class="icon-double-angle-right"></i>
										商品列表
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
//潮流穿搭
function navDress($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Dress&m=addDress" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 潮流穿搭 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Dress&m=addDress">
										<i class="icon-double-angle-right"></i>
										添加穿搭样式
									</a>
								</li>

								<li class="%s">
									<a href="?c=Dress&m=showListDress">
										<i class="icon-double-angle-right"></i>
										穿搭样式列表
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

//每周流行
function navPopularCategory($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=PopularCategory&m=addPopularCategory" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 每周流行 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=PopularCategory&m=addPopularCategory">
										<i class="icon-double-angle-right"></i>
										添加流行样式
									</a>
								</li>

								<li class="%s">
									<a href="?c=PopularCategory&m=showListPopularCategory">
										<i class="icon-double-angle-right"></i>
										流行样式列表
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

function navProductStyle($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=ProductStyle&m=addProductStyle" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 商品样式 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=ProductStyle&m=addProductStyle">
										<i class="icon-double-angle-right"></i>
										添加商品样式
									</a>
								</li>

								<li class="%s">
									<a href="?c=ProductStyle&m=showListProductStyle">
										<i class="icon-double-angle-right"></i>
										商品样式列表
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

function navMsg($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Msg&m=addMsg" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 留言管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Msg&m=addMsg">
										<i class="icon-double-angle-right"></i>
										增加留言
									</a>
								</li>

								<li class="%s">
									<a href="?c=Msg&m=showListMsg">
										<i class="icon-double-angle-right"></i>
										留言列表
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
        'navProductCategory',
        'navProduct',
        'navDress',
        'navPopularCategory',
        'navProductStyle',
        'navMsg'
    ];
    foreach ($menu as $m) {
        if($m == $page)
            echo $m($active);
        else
            echo $m(0);
    }
}