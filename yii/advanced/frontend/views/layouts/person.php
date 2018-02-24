<?php $this->beginPage() ?>
<html>
<head>
    <meta charset="utf-8" />
    <title>看书网</title>
    <meta name="keywords" content="看书网" />
    <meta name="description" content="提供各种好看的小说" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>        <!--引入顺序，先jquery，再bootstrap-->
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<div class="wrap">
    <div class="top_header">
        <div class="logo">
            <a href="javascript:void(0);">
                <img src="image/logo.png">
            </a>
        </div>
        <div class="search">
            <div class="input-group">
                <div class="dropdown input-group-addon">
                <span class="dropdown-toggle" data-toggle="dropdown">
                    综合
                    <b class="caret"></b>
                </span>
                    <ul class="dropdown-menu">
                        <li><a href="#">综合</a></li>
                        <li><a href="#">书名</a></li>
                        <li><a href="#">作者</a></li>
                        <li><a href="#">简介</a></li>
                    </ul>
                </div>
                <div class="search_txt">
                    <input style="width: 350px;height: 40px" type="search" name="sc" class="form-control">
                </div>
                <div style="width: 50px" class="search_btn input-group-addon"><a href="#"><img src="image/search.png"></a></div>
            </div>
        </div>
        <div class="head_oper">
            <div class="register">
                <span class="btn btn-default"><a href="?r=user/register" >注册</a></span>
            </div>
            <div class="login">
                <span class="btn btn-default"><a href="?r=user/login" >登录</a></span>
            </div>
        </div>
    </div>
    <div class="top_nav">
        <div class="top_nav_box">
            <ul>
                <li><a href="#">首页</a></li>
                <li><a href="#">小说排行榜</a></li>
                <li><a href="#">小说书库</a></li>
                <li><a href="#">男生热血</a></li>
                <li><a href="#">女生言情</a></li>
                <li><a href="#">出版专区</a></li>
            </ul>
        </div>
        <div class="top_nav_category">
            <ul>
                <li><a href="#">玄幻·奇幻</a></li>
                <li><a href="#">武侠·仙侠</a></li>
                <li><a href="#">都市·言情</a></li>
                <li><a href="#">历史·军事</a></li>
                <li><a href="#">网游·竞技</a></li>
                <li><a href="#">全本小说</a></li>
                <li><a href="#">免费小说</a></li>
            </ul>
        </div>
    </div>
    <script>

    </script>
    <?= $content ?>
</div>
<div class="footer">
    <p  class="p_01"><a href="javascript:void(0);" rel="nofollow">关于看书网</a>|<a href="javascript:void(0);" rel="nofollow">联系我们</a>|<a href="javascript:void(0);" rel="nofollow">诚聘英才</a>|<a href="javascript:void(0);" rel="nofollow">商务合作</a>|<a href="javascript:void(0);" rel="nofollow">友情链接</a></p>
    <p>本站所收录所有<a href="javascript:void(0);">玄幻小说</a>、<a href="javascript:void(0);">言情小说</a>、<a href="javascript:void(0);">都市小说</a>及其它各类<a href="javascript:void(0);">小说</a>作品、小说评论均属其个人行为，不代表本站立场。</p>
    <p>Copyright (C) 2004-2012 <a href="javascript:void(0);">看书网</a> All Rights Reserved 成都古羌科技有限公司 版权所有</p>
    <p>蜀ICP备05000570号 电信增值业务许可证：川B2-20100073</p>
    <p>网络文化经营许可证：川网文[2011]0207-6号</p>
</div>
</body>
</html>
<?php $this->endPage() ?>
