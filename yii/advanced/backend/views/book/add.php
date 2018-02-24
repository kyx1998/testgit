<?php
$this->params['main_title'] = '书籍管理';
$this->params['sub_title'] = '书籍添加';
$this->params['page'] = 'navBook';
$this->params['active'] = 1;
?>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <form action="?r=book/add" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 书名 </label>

                <div class="col-sm-9">
                    <input type="text" id="form-field-1" name="book_name" placeholder="Bookname" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <!--<div class="form-group">
                <label>书名</label>
                <input type="text" name="book_name" class="form-control" placeholder="">
            </div>
-->
            <div class="space-4"></div>

            <div class="form-group">
                <div class="col-sm-4">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h4>小说及展示图</h4>
                            <span class="widget-toolbar">
                                <a href="#" data-action="collapse">
                                    <i class="icon-chevron-up"></i>
                                </a>
                            </span>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <input type="file" id="id-input-file-2" name="upfile" onchange="UpFile(this,'http://localhost/yii/advance/resource/index.php');"/>
                                <input type="text" name="book_link" value="" hidden>
                                <input multiple="" type="file" id="id-input-file-3" onchange="UpImg(this)"/>
                                <label>
                                    <input type="checkbox" name="file-format" id="id-file-format" class="ace" />
                                    <span class="lbl"> Allow only images</span>
                                </label>
                                <input type="text" value="" name="book_img" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--<div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> 展示图 </label>
                <div class="col-sm-9">
                    <div class="widget-box">
                        <div class="widget-body">
                            <input type="file"  id="id-input-file-1" onchange="UpImg(this)"/>
                            <div class="widget-main">
                                <div class="row">
                                    <ul class="ace-thumbnails" id="list_image_src" >
                                        <li><a href="" title="Photo Title" data-rel="colorbox"><img src="" name="img" id="img"></a><div class="tools">
                                                <a href="javascript:void(0);" onclick="DeleteImage(this);">
                                                    <i class="icon-remove red"></i>
                                                </a>
                                            </div><input type="text" value="" name="book_img" hidden></li>   存储img图片路径

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 作者 </label>
               <!-- <input type="text" name="user_name" class="form-control" placeholder="" onblur="CheckUser();">-->
                <div class="col-sm-9">
                    <input type="text" id="form-field-1" name="user_name" placeholder="" class="col-xs-10 col-sm-5" onblur="CheckUser();" />
                    <input type="text" name="user_id" value="" hidden>
                </div>
            </div>
            <div class="space-4"></div>
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
            <div class="space-4"></div>
            <div class="form-group">
                <label>上传文件</label>
                <input type="file" name="upfile" class="form-control" placeholder="" onchange="UpFile(this,'http://localhost/yii/advance/resource/index.php');">
                <input type="text" name="book_link" value="" hidden>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label>状态</label>
                <input type="text" name="status" class="form-control" placeholder="">
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label>创建时间</label>
                <input type="text" name="ctime" class="form-control" placeholder="1997-05-26">
            </div>
            <div class="space-4"></div>
            <input type="button" class="btn btn-default" onclick="Submit();" value="增加">
        </form>
            <div class="form-group">
                <div class="form-lable"></div>
                <div class="form-value">
                <span class="errormsg"><?= empty($errmsg)?'':$errmsg ?></span>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.page-content -->


<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>                   <!--配合显示文件上传框，使js生效-->
<script src="assets/js/ace.min.js"></script>
<script>
    jQuery(function($) {
        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
            no_file:'小说',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false //| true | large
            //whitelist:'gif|png|jpg|jpeg'
            //blacklist:'exe|php'
            //onchange:''
            //
        });
        $('#id-input-file-3').ace_file_input({
            style:'well',
            btn_choose:'展示图片',
            btn_change:null,
            no_icon:'icon-cloud-upload',
            droppable:true,
            thumbnail:'small'//large | fit
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
            /**,before_remove : function() {
						return true;
					}*/
            ,
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
            alert('ok');
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });
        $('#id-file-format').removeAttr('checked').on('change', function() {
            var before_change
            var btn_choose
            var no_icon
            if(this.checked) {
                btn_choose = "Drop images here or click to choose";
                no_icon = "icon-picture";
                before_change = function(files, dropped) {
                    var allowed_files = [];
                    for(var i = 0 ; i < files.length; i++) {
                        var file = files[i];
                        if(typeof file === "string") {
                            //IE8 and browsers that don't support File Object
                            if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
                        }
                        else {
                            var type = $.trim(file.type);
                            if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
                                || ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
                            ) continue;//not an image so don't keep this file
                        }

                        allowed_files.push(file);
                    }
                    if(allowed_files.length == 0) return false;

                    return allowed_files;
                }
            }
            else {
                btn_choose = "Drop files here or click to choose";
                no_icon = "icon-cloud-upload";
                before_change = function(files, dropped) {
                    return files;
                }
            }
            var file_input = $('#id-input-file-3');
            file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
            file_input.ace_file_input('reset_input');
        });
    });
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
            document.getElementsByName('book_img')[0].value = img_url;
        });
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