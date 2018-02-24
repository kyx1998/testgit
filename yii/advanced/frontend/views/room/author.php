<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/room.css" rel="stylesheet" />
<link href="css/usermsg.css" rel="stylesheet" />
<div class="contain">
    <div class="head" >
        <div class="btn user_info"><a href="?r=room/basic-info">个人资料</a></div>
        <div class="btn review"><a href="?r=room/review">我的书架</a></div>
        <div class="btn user_book"><a href="?r=room/user-book">我的作品</a></div>
        <div class="btn user_msg"><a href="?r=room/user-msg">我的书评</a></div>
        <div class="btn user_msg"><a href="?r=room/author" style="color: #f60">成为作者</a></div>
    </div>
    <div class="main">
        <form action="?r=room/author-sub" method="post">
            <div class="form-group">
                <label>书名</label>
                <input type="text" name="book_name" class="form-control" placeholder="">
                <input type="text" name="user_name" value="<?= $this->params['user_name']?>" hidden>
            </div>
            <div class="form-group">
                <label>所属类别</label>
                <select name="class" class="-1" onchange="getChild(this);">
                    <option value="" selected>--|--</option>
                    <?php foreach($classes as $class):?>
                        <option  value="<?= $class['class_id']?>"><?= $class['class_name']?></option>
                    <?php endforeach;?>
                </select>
                <!--<select name="class" onchange="getChild(this);">
                    <option>1</option>
                    <option>2</option>
                </select>-->
            </div>
            <div class="form-group">
                <label>简介</label>
                <input type="text" name="book_content" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>上传文件</label>
                <input type="file" name="upfile" class="form-control" placeholder="" onchange="UpFile(this,'http://localhost/yii/advance/resource/index.php');">
                <input type="text" name="book_link" value="" hidden>
            </div>
            <input type="button" class="btn btn-default" onclick="Submit();" value="进行审核">
        </form>
    </div>
</div>
<script>
    function getChild(elem){
        var class_id = $(elem).val();
        if(class_id==''){
            return;
        }
        //alert(class_id);
        $.ajax({
            url:'?r=room/get-child',
            data:'class_id='+class_id,
            dataType:'json',
            type:'post',
            success:function(responceMsg){
                if(responceMsg.code == <?= \common\common\ErrDesc::OK ?>){
                    if($(elem).attr('class')==-1){    //移除其他类型的复选框，重新生成，有点low，，，
                        $('#class').remove();
                    }
                    var menus = responceMsg.data;
                    if(menus==''){            //防止产生空的复选框
                        $(elem).attr('name','class_id');
                        $(elem).next('select').remove();     //移除上一次选择的多余分类
                        alert('ok');
                        return;
                    }
                    $(elem).removeAttr('name');          //删除上一次设置的name
                    alert('请选择下一级分类');
                    var select = $(elem).after('<select id="class"></select>');
                    //$('[name=j]').attr('name','class1');
                    //$('#class').attr('onchange','getChild(this)');
                    $(elem).next('select').attr('onchange','getChild(this)');
                    var options = '';
                    for(var i = 0; i < menus.length; i++) {
                        options += '<option value="' + menus[i].class_id + '">' + menus[i].class_name + '</option>';
                    }
                    //$('[name=j]').html(options);
                    //$('#class').append(options);
                    $(elem).next('select').append(options);
                }
            }
        })
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
    function UpFile(elem){
        var book_name = document.getElementsByName('book_name')[0].value;
        var url = 'http://localhost/yii/advanced/resource/index.php?c=Book&m=upFile';
        var file = elem.files[0];
        var formData = new FormData();               //异步上传二进制文件
        formData.append('book_name',book_name);
        formData.append('upfile',file);     //文件转化为键值对形式，由于是数组形式，可支持多文件上传
        ajaxUpFile(url, formData, function (respTest) {
            var xmlHttpObj = JSON.parse(respTest);            //json参数是否正确
            if(xmlHttpObj.code!=1){
                alert(xmlHttpObj.msg);
                return;
            }
            var book_url = xmlHttpObj.data.url;
            document.getElementsByName('book_link')[0].value = book_url;
        });
    }
</script>
<script>
    function Submit() {
        var class_id = $('[name=class_id]').val();
        //alert($('[name=class_id]').attr('name'));
        if(typeof(class_id)=="undefined"){
            alert('请选择分类');
            return;
        }
        $('form').submit();
    }
</script>
