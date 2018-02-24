<link href="css/register.css" rel="stylesheet">
<div class="contain">
    <div class="main">
        <form action="?r=user/register" method="post">
            <div class="input-group input-group-lg col-md-6">
                <label>用户名</label>
                <img class="name_ck" style="float: right;width: 32px" src="">
                <input type="text" name="user_name" value="" class="form-control" placeholder="用户名/邮箱" onblur="CheckUser();">
            </div>
            <div class="input-group input-group-lg col-md-6">
                <label>密码</label>
                <input type="text" name="password" value="" class="form-control" placeholder="">
            </div>
            <div class="input-group input-group-lg col-md-6">
                <label>确认密码</label>
                <img class="pwd_ck" style="float: right;width: 32px" src="">
                <input type="text" name="check_pwd" value="" class="form-control" placeholder="" onblur="CheckPwd();">
            </div>
            <div class="input-group input-group-lr col-md-2">
                <label>验证码</label>
                <img class="code_ck" style="float: right;width: 32px" src="">
                <input type="text" name="check_code" value="" class="form-control" placeholder="" onblur="checkCode();">
            </div>
            <div class="code" onclick="codeChange();"><?= $code?></div>
            <div class="main_btn">
                <div class="register">
                    <a href="javascript:void(0);" onclick="submit();"><span class="btn btn-default">注册</span></a>
                </div>
                <div class="login">
                    <a href="?r=user/login" ><span class="btn btn-default">登录</span></a>
                </div>
            </div>
        </form>
        <div class="form-group">
            <div class="form-lable"></div>
            <div class="form-value">
                <span class="errormsg"><?= empty($errmsg)?'':$errmsg ?></span>
            </div>
        </div>
    </div>
</div>
<script>
    function CheckUser(){
        var user_name = $('[name=user_name]').val();
        if(user_name==''){
            $('.errormsg').text('用户名不能为空');
            $('.name_ck').attr('src','image/cha.svg');
            return;
        }
        $.ajax({
            url:'?r=user/check-user',
            data:'user_name='+user_name,
            dataType:'json',
            type:'post',
            success:function(respData){
                var code = parseInt(respData.code);
                if(code == <?= \common\common\ErrDesc::OK ?>){
                    $('.errormsg').text('');
                    $('.name_ck').attr('src','image/gou.svg');
                    return;
                }
                $('.errormsg').text('该用户名已存在');
                $('.name_ck').attr('src','image/cha.svg');
                return;
            },
            error: function (msg) {

            }
        })
    }
</script>
<script>
    function CheckPwd(){
        var password = $('[name=password]').val();
        /*if(password==''){
            $('.errormsg').text('密码不能为空');
            $('.pwd_ck').attr('src','image/cha.svg');
            return;
        }*/
        var checkPwd = $('[name=check_pwd]').val();
        if(password==checkPwd){
            $('.errormsg').text('');
            $('.pwd_ck').attr('src','image/gou.svg');
            return;
        }else{
            $('.errormsg').text('两次密码不一致');
            $('.pwd_ck').attr('src','image/cha.svg');
            return;
        }
    }
</script>
<script>
    function codeChange(){
        $.ajax({
            url:'?r=user/get-code',
            data:'',
            dataType:'json',
            type:'post',
            success:function(respData){
                if(respData.code == <?= \common\common\ErrDesc::OK ?>){
                    var data = respData.data;
                    document.getElementsByClassName('code')[0].innerText = data.code;
                    return;
                }
            }
        })
    }
</script>
<script>
    function checkCode(){
        var code = document.getElementsByClassName('code')[0].innerText;
        if(document.getElementsByName('check_code')[0].value == code){
            $('.code_ck').attr('src','image/gou.svg');
            return;
        }
        $('.code_ck').attr('src','image/cha.svg');
        $('.errormsg').text('验证码错误');
        codeChange();
        return;
    }
</script>
<script>
    function submit(){
        $('form').submit();
    }
</script>