<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/detail.css" rel="stylesheet">

<div class="contain">
    <div class="path">
        <a href="#">看书网</a>&gt<a href="#"><?= $classes[1]['class_name']?></a>&gt<a href="#"><?= $classes[0]['class_name']?></a>&gt<a style="color: #f60" href="#"><?= $book['book_name']?></a>[书号<?= $book['book_id']?>]
    </div>
    <div class="main">
        <div class="book_detail">
            <div class="detail">
                <div class="img">
                    <img src="<?= $book['book_img']?>">
                    <a href="<?= $book['book_link']?>">点击阅读</a>
                </div>
                <div class="info">
                    <div class="info_head">
                        <span id="content">内容介绍</span>
                        |
                        <span id="info">作品信息</span>
                    </div>
                    <div class="content">
                        <div>
                            <a href="<?= $book['book_link']?>">
                                　　<?= $book['book_content']?>
                            </a>
                        </div>
                        <div class="bookData">
                            <span>已有人<?= $book['click']?>读过此书</span>
                            <label class="save" onclick="getSave(<?= $book['book_id']?>);">+ 收藏</label>
                            <input type="text" name="user_name" value="<?= $this->params['user_name']?>" hidden>
                        </div>
                    </div>
                    <div class="article_info" style="display: none">
                        <table width="100%" cellpadding="10" cellspacing="0">
                            <tbody><tr>
                                <th>作品类别：</th>
                                <td><a href="#" target="_blank"><?= $classes[0]['class_name']?></a></td>
                            </tr>
                            <tr>
                                <th>
                                    <nobr>点击数：</nobr>
                                </th>
                                <td id="weekclickCount"><?= $book['click']?></td>
                                <th>
                                    <nobr>收藏数：</nobr>
                                </th>
                                <td id="monthclickCount"><?= $book['save']?></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <div class="chapter">
                        <div class="new">
                            <span>最新章节</span>
                        </div>
                        <div class="chap_list">
                            <ul>
                                <li><span>最新章节</span>&nbsp<a href="<?= $book['book_link']?>">第一十八章</a><span><?= $book['ctime']?></span></li>
                                <li><span>最新章节</span>&nbsp<a href="<?= $book['book_link']?>">第一十九章</a><span><?= $book['ctime']?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="msg">
                <div class="msg_head">
                    <span>评论区</span>
                </div>
                <div class="msg_btn">
                    <a href="#">全部评论</a>
                </div>
                <!--<div class="sort">
                    <div class="sort_btn">
                        <a style="background-color: #e0e0e0" href="#">默认排序</a><a href="#">按时间排序</a>
                    </div>
                </div>-->
                <div style="display: none" class="msg_main">
                    <div class="user_info">we</div>
                    <div class="user_content">你好，视界</div>
                </div>
                <?php for($i=0;$i<count($contents);$i++):?>
                <div class="msg_main">
                    <div class="user_info">
                        <img src="<?= (empty($users[$i]['user_img']))?'image/Annie1.jpg':$users[$i]['user_img']?>">
                        <div class="brief">
                            <a href="#"><?= $users[$i]['user_name']?></a>说：
                            <span><?= $contents[$i]['ctime']?></span>
                        </div>
                    </div>
                    <div class="user_content"><?= $contents[$i]['content']?></div>
                </div>
                <?php endfor;?>
            </div>
            <div class="reply">
                <div class="title"><span>发表评论</span></div>
                <div class="form">
                    <form action="">
                        <div class="form-group">
                            <textarea name="content" rows="6"></textarea>
                        </div>
                        <input type="text" name="book_id" value="<?= $book['book_id']?>" hidden>
                        <input type="text" name="ctime" value="<?= date('Y-m-d H:i:s',time())?>" hidden>
                        <div>
                            <input type="button" style="background-color:#f60;" class="btn btn-default" onclick="add();" value="增加">
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
        </div>
        <div class="book_list">
            <div class="article">
                <div class="article_head">
                    <span>其他作品</span>
                    <a href="?r=classification/classification">更多</a>
                </div>
                <div class="article_list">
                    <ul>
                        <?php foreach($books as $value):?>
                        <li><a href="?r=detail/detail&book_id=<?= $value['book_id']?>"><?= $value['book_name']?></a><span><?= $value['click']?></span></li>
                        <? endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="book">
                <div class="head"><span>新书推荐榜</span></div>
                <div class="book_btn">
                    <a class="btn1" href="javascript:void(0)">点击</a>
                    <a class="btn2" href="javascript:void(0)">收藏</a>
                </div>
                <div id="list1" class="book_link">
                    <ul>
                        <?php for($i=0;$i<count($new_click);$i++):?>
                        <li><label class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $new_click[$i]['book_id']?>"><?= $new_click[$i]['book_name']?></a><span class="sum"><?= $new_click[$i]['click']?></span></li>
                        <?php endfor;?>
                    </ul>
                </div>
                <div id="list2" style="display: none" class="book_link">
                    <ul>
                        <?php for($i=0;$i<count($new_save);$i++):?>
                            <li><label class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $new_save[$i]['book_id']?>"><?= $new_save[$i]['book_name']?></a><span class="sum"><?= $new_save[$i]['save']?></span></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
            <div class="book">
                <div class="head"><span>连载推荐榜</span></div>
                <div class="book_btn">
                    <a class="btn1" href="javascript:void(0)">点击</a>
                    <a class="btn2" href="javascript:void(0)">收藏</a>
                </div>
                <div id="list1" class="book_link">
                    <ul>
                        <?php for($i=0;$i<count($serial_click);$i++):?>
                        <li><label class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $serial_click[$i]['book_id']?>"><?= $serial_click[$i]['book_name']?></a><span class="sum"><?= $serial_click[$i]['click']?></span></li>
                        <?php endfor;?>
                    </ul>
                </div>
                <div id="list2" style="display: none" class="book_link">
                    <ul>
                        <?php for($i=0;$i<count($serial_save);$i++):?>
                            <li><label class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $serial_save[$i]['book_id']?>"><?= $serial_save[$i]['book_name']?></a><span class="sum"><?= $serial_save[$i]['save']?></span></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
            <div class="book">
                <div class="head"><span>完本推荐榜</span></div>
                <div class="book_btn">
                    <a class="btn1" href="javascript:void(0)">点击</a>
                    <a class="btn2" href="javascript:void(0)">收藏</a>
                </div>
                <div id="list1" class="book_link">
                    <ul>
                        <?php for($i=0;$i<count($complete_click);$i++):?>
                            <li><label class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $complete_click[$i]['book_id']?>"><?= $complete_click[$i]['book_name']?></a><span class="sum"><?= $complete_click[$i]['click']?></span></li>
                        <?php endfor;?>
                    </ul>
                </div>
                <div id="list2" style="display: none" class="book_link">
                    <ul>
                        <?php for($i=0;$i<count($complete_save);$i++):?>
                            <li><label class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $complete_save[$i]['book_id']?>"><?= $complete_save[$i]['book_name']?></a><span class="sum"><?= $complete_save[$i]['save']?></span></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#content').hover(function(){
        $(this).css('color','#f60');
        $(this).css('cursor','default');
        $('.article_info').css('display','none');
        $('.content').css('display','block');
    })
    $('#info').hover(function(){
        $(this).css('color','#f60');
        $(this).css('cursor','default');
        $('.article_info').css('display','block');
        $('.content').css('display','none');
    })
</script>
<script>
    $('.btn1').hover(function(){
            $(this).css('background-color','#666');
            $(this).css('color','#fff');
            $(this).next().css('background-color','white');
            $(this).next().css('color','#666');
            $(this).parent().nextAll('#list1').css('display','block');
            $(this).parent().nextAll('#list2').css('display','none');
        },
        function(){}
    );
    $('.btn2').hover(function(){
            $(this).css('background-color','#666');
            $(this).css('color','#fff');
            $(this).prev().css('background-color','white');
            //$('.btn1').css('background-color','white');
            $(this).prev().css('color','#666');
            $(this).parent().nextAll('#list1').css('display','none');
            //$('#list2').css('display','block');
            $(this).parent().nextAll('#list2').css('display','block');
        },
        function(){}
    );
</script>
<script>
    function getSave(book_id){
        var user_name = $('[name=user_name]').val();
        $.ajax({
            url:'?r=classification/get-save',
            data:'book_id='+book_id+'&user_name='+user_name,
            dataType:'json',
            type:'post',
            success:function(respData){
                if(respData.code==1){
                    alert('收藏成功');
                    return;
                }else{
                    alert('请先登录');
                    return;
                }
            }

        })
    }
</script>
<script>
    function add(){
        var book_id = $('[name=book_id]').val();
        var content = $('[name=content]').val();
        var ctime = $('[name=ctime]').val();
        if(content==''){
            $('.errormsg').text('内容不能为空');
        }
        $.ajax({
            url:'?r=detail/msg',
            data:'book_id='+book_id+'&content='+content+'&ctime='+ctime,
            dataType:'json',
            type:'post',
            success:function(respData){
                if(respData.code==1){
                    var data = respData.data;
                    if(data.user_img==''){
                        $('.msg').append('<div class="msg_main">\
                        <div class="user_info">\
                        <img src="image/Annie1.jpg">\
                        <div class="brief">\
                        <a href="#">'+data.user_name+'</a>说\
                <span>'+ctime+'</span>\
                    </div>\
                    </div>\
                    <div class="user_content">'+content+'</div>\
                        </div>');
                        return;
                    }else{
                        $('.msg').append('<div class="msg_main">\
                        <div class="user_info">\
                        <img src="'+data.user_img+'">\
                        <div class="brief">\
                        <a href="#">'+data.user_name+'</a>说\
                <span>'+ctime+'</span>\
                    </div>\
                    </div>\
                    <div class="user_content">'+content+'</div>\
                        </div>');
                        return;
                    }
                }else{
                    alert('请先登录');
                    return;
                }

            }
        })
        return;
    }
</script>

