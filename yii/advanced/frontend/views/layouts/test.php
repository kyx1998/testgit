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
                    <b class="caret" id=""></b>
                </span>
            <ul class="dropdown-menu">
                <li><a href="#" onclick="switchs(this,'');">综合</a></li>
                <li><a href="#" onclick="switchs(this,'book_name');">书名</a></li>
                <li><a href="#" onclick="switchs(this,'user_name');">作者</a></li>
                <li><a href="#" onclick="switchs(this,'book_content');">简介</a></li>
            </ul>
        </div>
        <div class="search_txt">
            <input style="width: 350px;height: 40px" type="search" name="sc" class="form-control">
        </div>
        <div style="width: 50px" class="search_btn input-group-addon" onclick="s_sub();"><a href="#"><img src="image/search.png"></a></div>
    </div>
        <script>
            function switchs(elem,condition){
                var search = elem.innerText;
                //var search = document.getElementsByClassName('dropdown-toggle')[0].innerHTML;
                document.getElementsByClassName('dropdown-toggle')[0].innerHTML = elem.innerText+'<b class="caret" id="'+condition+'"></b>';
                //alert(search);
            }
            function s_sub(){
                var info = $('[name=sc]').val();
                if(info==''){
                    alert('搜索条件不能为空！');
                    return;
                }
                var search = document.getElementsByClassName('caret')[0];
                window.location.href='?r=search/index&value='+info+'&name='+search.id;
            }
        </script>
    </div>
    <?php if(empty($this->params['user_name'])){?>
    <div class="head_oper">
        <div class="register">
            <span class="btn btn-default"><a href="?r=user/register" >注册</a></span>
        </div>
        <div class="login">
            <span class="btn btn-default"><a href="?r=user/login" >登录</a></span>
        </div>
    </div>
    <?php }else{?>
    <div><p>欢迎<span style="color: #f60"><?= $this->params['user_name']?></span>登录</p></div>
        <div><a href="?r=room/basic-info">个人中心</a></div>
        <div><a href="?r=room/review">我的书架</a></div>
        <div><a href="?r=user/login-out">退出</a></div>
    <?php }?>
</div>
<div class="top_nav">
    <div class="top_nav_box">
        <ul>
            <li><a href="?r=index/index">首页</a></li>
            <li><a href="#">小说排行榜</a></li>
            <li><a href="?r=classification/classification" target="_blank">小说分类</a></li>
            <li><a href="?r=boy/index" target="_blank">男生热血</a></li>
            <li><a href="?r=girl/index" target="_blank">女生言情</a></li>
            <li><a href="?r=person/index" target="_blank">个性专区</a></li>
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
