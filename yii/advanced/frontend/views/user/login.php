<link href="css/login.css" rel="stylesheet" />

<div class="contain">
    <div class="cont_left panel panel-default">
        <div class="panel-heading">用户登录</div>
        <form class="login-form" action="?r=user/login" method="post">
            <div class="form-group">
                <div class="form-lable">用户名</div>
                <div class="form-value">
                    <input type="text" name="user_name">
                </div>
            </div>
            <div class="form-group">
                <div class="form-lable">密码</div>
                <div class="form-value">
                    <input type="password" name="password" placeholder="请输入6-20位号码字符">
                </div>
            </div>
            <div class="form-group">
                <div class="form-lable"></div>
                <div class="form-value">
                    <a class="btn-register" href="javascript:void(0);" onclick="Submit();">登录</a>
                    <a class="btn-login-rg" href="?r=user/register">注册</a>
                </div>
            </div>
            <div class="form-group">
                <div class="form-lable"></div>
                <div class="form-value">
                    <span class="errormsg"><?= empty($errmsg)?'':$errmsg ?></span>
                </div>
            </div>
        </form>
    </div>
    <div class="cont_right">
        <div class="book">
            <div class="head"><span>新书榜</span></div>
            <div class="book_btn">
                <a class="btn1" href="javascript:void(0)">新书</a>
                <a class="btn2" href="javascript:void(0)">连载</a>
            </div>
            <div id="list1" class="book_link">
                <ul>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                </ul>
            </div>
            <div id="list2" style="display: none" class="book_link">
                <ul>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                    <li><span class="num">1</span><a href="#">撒旦1</a><span class="sum">12321</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function Submit(){
        var user_name = $('[name=user_name]').val();
        if(user_name==''){
            $('.errormsg').text('用户名不能为空');
            return;
        }
        $('form').submit();
    }
</script>

