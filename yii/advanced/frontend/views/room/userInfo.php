<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/room.css" rel="stylesheet" />
<div class="contain">
    <div class="head" >
        <div class="btn user_info"><a href="?r=room/basic-info" style="color: #f60">个人资料</a></div>
        <div class="btn review"><a href="?r=room/review">我的书架</a></div>
        <div class="btn user_book"><a href="?r=room/user-book">我的作品</a></div>
        <div class="btn user_msg"><a href="?r=room/user-msg">我的书评</a></div>
        <div class="btn user_msg"><a href="?r=room/author">成为作者</a></div>
    </div>
    <div class="main">
        <div class="user_info">
            <div class="user_btn">
                <a href="javascript:void(0);" onclick="list_switch(this,'basic_info');">基本资料</a>
                |
                <a href="javascript:void(0);" onclick="list_switch(this,'user_img');">上传头像</a>
                |
                <a href="javascript:void(0);" onclick="list_switch(this,'cg_pwd');">修改密码</a>
            </div>
            <div class="list basic_info">
                <span>修改基本资料</span>
                <form action="?r=room/basic-info" method="post">
                    <div class="form-group">
                        <label>性别：</label>
                        <input type="radio" name="gender" value="1" <?= ($user['gender']==1)?'checked':''?>>保密
                        <input type="radio" name="gender" value="2" <?= ($user['gender']==2)?'checked':''?>>男
                        <input type="radio" name="gender" value="3" <?= ($user['gender']==3)?'checked':''?>>女
                    </div>
                    <input type="submit" value="修改">
                    <div class="form-group">
                        <div class="form-lable"></div>
                        <div class="form-value">
                            <span class="errormsg"><?= empty($_GET['errmsg'])?'':$_GET['errmsg'] ?></span>
                        </div>
                    </div>
                </form>

            </div>
            <div style="display: none" class="list user_img">
                <form class="form form-horizontal" style="margin:50px 100px" role="form" method="post" action="?r=room/user-img" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> 展示图 </label>
                        <div class="col-sm-9">
                            <div class="widget-box">
                                <div class="widget-body">
                                    <input type="file"  id="id-input-file-1" onchange="UpImg(this)"/>
                                    <div class="widget-main">
                                        <div class="row">
                                            <ul class="ace-thumbnails" id="list_image_src" >
                                                <li><a href="" title="Photo Title" data-rel="colorbox"><img src="<?= $user['user_img']?>" name="img" id="img"></a><div class="tools">
                                                        <a href="javascript:void(0);" onclick="DeleteImage(this);">
                                                            <i class="icon-remove red"></i>
                                                        </a>
                                                    </div><input type="text" value="" name="user_img" hidden></li>   <!--存储img图片路径-->

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" value="上传">上传</button>
                </form>
            </div>
            <div style="display: none" class="list cg_pwd">
                <form action="?r=room/cg-pwd" method="post">
                    <div class="input-group">
                        <label>用户名</label>
                        <input type="text" name="user_name" class="form-control" placeholder="" value="<?= $user['user_name']?>" readonly>
                    </div>
                    <div class="input-group">
                        <label>旧密码</label>
                        <input type="password" name="password" class="form-control" placeholder="">
                    </div>
                    <div class="input-group">
                        <label>新密码</label>
                        <input type="password" name="new_password" class="form-control" placeholder="">
                    </div>
                    <div class="input-group">
                        <label>确认新密码</label>
                        <input type="password" name="check_pwd" class="form-control" placeholder="">
                    </div>
                    <input type="button" onclick="Submit();" value="修改">
                </form>
            </div>
            <script>
                function Submit(){
                    var password = $('[name=password]').val();
                    var new_password = $('[name=new_password]').val();
                    var checkPwd = $('[name=check_pwd]').val();
                    /*$.ajax({
                        url:'?r=room/cg-pwd',
                        data:'password='+password,
                        dataType:'json',
                        type:'post',
                        success:function(respData){
                            if(respData.code == ){
                                return;
                            }else{
                                alert('')
                            }
                        }
                    })*/
                    if(checkPwd==new_password){
                        $('form').submit();
                        return;
                    }else{
                        alert('两次密码不一致');
                        return;
                    }
                }
            </script>
        </div>
    </div>
</div>
<script>
    function list_switch(elem,req){
        $('.user_btn>a').css('color','#666');
        $(elem).css('color','#2b7ca3');
        $('.list').hide();
        $('.'+req).show();
    }
</script>
<script>
    function ajaxUpFile(url,data,callFun){
        var xmlHttp;
        if(window.XMLHttpRequest){
            xmlHttp = new XMLHttpRequest();
        }else{
            xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlHttp.open('post',url,true);
        xmlHttp.send(data);
        xmlHttp.onreadystatechange = function (){

            if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                callFun(xmlHttp.responseText);
            }
        }
    }
    function UpImg(elem){
        var url = 'http://localhost/yii/advanced/resource/index.php';
        var img_input = elem.files[0];
        var formData = new FormData();               //异步上传二进制文件
        formData.append('img',img_input);     //文件转化为键值对形式，由于是数组形式，可支持多文件上传
        ajaxUpFile(url, formData, function (respTest) {
            var xmlHttpObj = JSON.parse(respTest);            //json参数是否正确
            if(xmlHttpObj.code!=1){
                alert(xmlHttpObj.msg);
                return;
            }
            var img_url = xmlHttpObj.data.url;
            document.getElementsByName('img')[0].src = img_url;
            document.getElementsByName('user_img')[0].value = img_url;
        });
    }
</script>
