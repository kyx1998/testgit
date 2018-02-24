<?php
$this->params['main_title'] = '展示图管理';
$this->params['sub_title'] = '图片更改';
$this->params['page'] = 'navShowImg';
$this->params['active'] = 2;
?>
<div class="row">
    <div class="col-sm-3">
        <h4>添加展示图</h4>
        <form action="?r=showimg/update" method="post" enctype="multipart/form-data">
            <div class="space-4"></div>
            <div class="form-group">
                <label>分类</label>
                <select name="class_id">
                    <?php foreach($class as $value):?>
                        <?php if($value['class_id']==$show['class_id']):?>
                            <option value="<?= $value['class_id']?>" selected><?= $value['class_name']?></option>
                        <?php endif;?>
                        <option value="<?= $value['class_id']?>"><?= $value['class_name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label>书名</label>
                <input type="text" name="book_name" class="form-control" placeholder="" onblur="check();" value="<?= $book['book_name']?>">
                <input type="text" name="book_id" value="<?= $show['book_id']?>" hidden>
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
                                        <li><a href="" title="Photo Title" data-rel="colorbox"><img src="" name="img" id="img"></a><div class="tools">
                                                <a href="javascript:void(0);" onclick="DeleteImage(this);">
                                                    <i class="icon-remove red"></i>
                                                </a>
                                            </div><input type="text" value="<?= $show['show_img']?>" name="show_img" hidden></li>   <!--存储img图片路径-->

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>顺序</label>
                <select name="squence">
                    <option value="5">5</option>
                    <?php for($i=1; $i<=4; $i++):?>
                        <?php if($i==$show['squence']){?>
                            <option value="<?= $i ?>" selected><?= $i ?></option>
                        <?php }else{?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php }?>
                    <?php endfor;?>
                </select>
            </div>
            <input type="text" name="img_id" value="<?= $show['img_id']?>" hidden>
            <input type="button" class="btn btn-default" onclick="Submit();" value="修改">
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
    function check(){
        var book_name = $('[name=book_name]').val();
        if(book_name==''){
            $('.errormsg').text('书名不能为空');
            return;
        }
        $.ajax({
            url:'?r=showimg/check',
            data:'book_name='+book_name,
            dataType:'json',
            type:'post',
            success:function(respData){
                var code = parseInt(respData.code);
                if(code == <?= \common\common\ErrDesc::OK ?>){
                    var data = respData.data;
                    if(document.getElementsByName('class_id')[0].value == data.parent.class_id){
                        $('.errormsg').text('');
                        document.getElementsByName('book_id')[0].value = data.book.book_id;
                        return;                  //要有return，否则程序向下执行else部分
                    }
                    $('.errormsg').text('该书籍不属于此分类');
                    return;
                }
                $('.errormsg').text('不存在该类书');
            },
            error: function (msg) {

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
            document.getElementsByName('show_img')[0].value = img_url;
        });
    }
</script>
<script>
    function Submit() {
        var book_name = $('[name=book_name]').val();
        var show_img = $('[name=show_img]').val();
        //alert($('[name=class_id]').attr('name'));
        if(book_name=="" || show_img==''){
            alert('参数错误');
            return;
        }
        $('form').submit();
    }
</script>