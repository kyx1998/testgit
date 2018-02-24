<?php
$this->params['main_title'] = '书籍管理';
$this->params['sub_title'] = '书籍更改';
$this->params['page'] = 'navBook';
$this->params['active'] = 2;
?>
<div class="row">
    <div class="col-sm-3">
        <h4>书籍添加</h4>
        <form action="?r=book/update" method="post" enctype="multipart/form-data">
            <div class="space-4"></div>
            <div class="form-group">
                <label>书名</label>
                <input type="text" name="book_name" class="form-control" placeholder="" value="<?= $book['book_name']?>">
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> 展示图 </label>
                <div class="col-sm-9">
                    <div class="widget-box">
                        <div class="widget-body">
                            <input type="file"  id="id-input-file-1" onchange="UpImg(this)"/>
                            <div class="widget-main">
                                <div class="row">
                                    <ul class="ace-thumbnails" id="list_image_src" >
                                        <li><a href="" title="Photo Title" data-rel="colorbox"><img src="<?= $book['book_img']?>" name="img" id="img"></a><div class="tools">
                                                <a href="javascript:void(0);" onclick="DeleteImage(this);">
                                                    <i class="icon-remove red"></i>
                                                </a>
                                            </div><input type="text" value="<?= $book['book_img']?>" name="book_img" hidden></li>   <!--存储img图片路径-->

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>作者</label>
                <input type="text" name="user_name" class="form-control" placeholder="" onblur="CheckUser();" value="<?= $user['user_name']?>">
                <input type="text" name="user_id" value="<?= $user['user_id']?>" hidden>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label>所属类别</label>
                <?php /*for($i=count($classes)-1;$i>=0;$i--):*/?><!--
                    <?php /*if($classes[$i]['parent_id']==-1){*/?>
                <select name="class" class="<?/*= $classes[$i]['parent_id']*/?>" onchange="getChild(this);">
                    <option value="">--|--</option>
                    <option value="<?/*= $classes[$i]['class_id']*/?>" selected><?/*= $classes[$i]['class_name']*/?></option>
                </select>
                    <?php /*}else{*/?>
                    <select name="class" id="class" class="<?/*= $classes[$i]['parent_id']*/?>" onchange="getChild(this);">
                        <option value="">--|--</option>
                        <option id="class" value="<?/*= $classes[$i]['class_id']*/?>" selected><?/*= $classes[$i]['class_name']*/?></option>
                    </select>
                <?php /*}*/?>
                --><?php /*endfor;*/?>
                <?php for($j=count($classes)-1;$j>=0;$j--):?>
                    <?php if($class[$j]['parent_id']==-1){?>
                <select name="class" class="<?= $class[$j]['parent_id']?>" onchange="getChild(this);">
                    <?php for($i=0;$i<count($classes[$j]);$i++):?>
                        <?php if($classes[$j][$i]['class_name']==$class[$j]['class_name']){?>
                            <option value="<?= $classes[$j][$i]['class_id']?>" selected><?= $classes[$j][$i]['class_name']?></option>
                        <?php }else{?>
                            <option value="<?= $classes[$j][$i]['class_id']?>"><?= $classes[$j][$i]['class_name']?></option>
                        <?php }?>
                    <?php endfor;?>
                </select>
                        <?php }else{?>
                <select name="class" id="class" class="<?= $class[$j]['parent_id']?>" onchange="getChild(this);">
                    <?php for($i=0;$i<count($classes[$j]);$i++):?>
                        <?php if($classes[$j][$i]['class_name']==$class[$j]['class_name']){?>
                            <option value="<?= $classes[$j][$i]['class_id']?>" selected><?= $classes[$j][$i]['class_name']?></option>
                        <?php }else{?>
                            <option value="<?= $classes[$j][$i]['class_id']?>"><?= $classes[$j][$i]['class_name']?></option>
                        <?php }?>
                    <?php endfor;?>
                </select>
                <?php }?>
                <?php endfor;?>
            </div>

            <div class="form-group">
                <label>简介</label>
                <input type="text" name="book_content" class="form-control" placeholder="" value="<?= $book['book_content']?>">
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label>上传文件</label>
                <input type="file" name="upfile" class="form-control" placeholder="" onchange="UpFile(this);">
                <input type="text" name="book_link" value="<?= $book['book_link']?>" hidden>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label>状态</label>
                <input type="text" name="status" class="form-control" placeholder="" value="<?= $book['status']?>">
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label>创建时间</label>
                <input type="text" name="ctime" class="form-control" placeholder="" value="<?= $book['ctime']?>">
            </div>
            <div class="space-4"></div>
            <input type="text" name="book_id" value="<?= $book['book_id']?>" hidden>
            <input type="button" class="btn btn-default" onclick="Submit();" value="更改">
        </form>
    </div>
</div>
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
            alert(respTest);
            var xmlHttpObj = JSON.parse(respTest);            //json参数是否正确
            if(xmlHttpObj.code!=1){
                alert(xmlHttpObj.msg);
                return;
            }
            var img_url = xmlHttpObj.data.url;
            document.getElementsByName('img')[0].src = img_url;
            document.getElementsByName('book_img')[0].value = img_url;
        });
    }
    function UpFile(elem){
        var url = 'http://localhost/yii/advanced/resource/index.php?c=Book&m=upFile';
        var file = elem.files[0];
        var formData = new FormData();               //异步上传二进制文件
        formData.append('upfile',file);     //文件转化为键值对形式，由于是数组形式，可支持多文件上传
        ajaxUpFile(url, formData, function (respTest) {
            alert(respTest);
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
    function CheckUser(){
        var user_name = $('[name=user_name]').val();
        if(user_name==''){
            $('.errormsg').text('作者名不能为空');
            return;
        }
        $.ajax({
            url:'?r=book/check-author',
            data:'user_name='+user_name,
            dataType:'json',
            type:'post',
            success:function(respData){
                var code = parseInt(respData.code);
                if(code == <?= \common\common\ErrDesc::OK ?>){
                    $('.errormsg').text('');
                    var data = respData.data;
                    document.getElementsByName('user_id')[0].value = data.user_id;
                    return;
                }
                $('.errormsg').text('不存在与该书对应的作者');
                return;
            },
            error: function (msg) {

            }
        })
    }
</script>
<script>
    function getChild(elem){
        var class_id = $(elem).val();
        //var
        if(class_id==''){
            return;
        }
        //alert(class_id);
        $.ajax({
            url:'?r=book/get-child',
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