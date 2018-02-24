<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/index.css" rel="stylesheet" />
<link href="css/boy.css" rel="stylesheet" />

<div class="contain">
    <div class="main1">
        <div class="week_like">
            <div class="week_like_top">
                <h2>本周推荐</h2>
                <a href="#" rel="1" class="now">女生</a>
            </div>
            <div style="display: block" class="<?= 'week_like_1 imgs'?>">
                <?php for($k=0;$k<count($imgs);$k++):?>
                    <?php if($k==0){?>
                        <div style="display: block" class="week_like_img1"><img src="<?= $imgs[$k]['show_img']?>"></div>
                    <?php }else{?>
                        <div class="week_like_img1"><img src="<?= $imgs[$k]['show_img']?>"></div>
                    <?php }?>
                <?php endfor;?>
            </div>
            <div class="squares"></div>
            <div class="week_like_book">
                <?php for($i=0;$i<count($week);$i++):?>
                    <h3><a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>"><?= $week[$i]['book_name']?></a></h3>
                    <p><a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>"><?= $week[$i]['book_content']?></a></p>
                <?php endfor;?>
            </div>
        </div>
        <div class="new_book">
            <div class="book_head">新书榜</div>
            <div class="new_book_btn">
                <a class="btn1" style="background-color: #666;color: #fff" href="javascript:void(0)">新书点击榜</a>
                <a class="btn2" style="color: #666" href="javascript:void(0)">新书收藏榜</a>
            </div>
            <div class="new_book_link" id="list1">
                <ul>
                    <?php for($i=0;$i<count($new_click);$i++):?>
                        <li><label style="color: white;font-size: 12px" class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $new_click[$i]['book_id']?>"><?= $new_click[$i]['book_name']?></a><span class="user_name"><?= $new_click[$i]['click']?></span></li>
                    <?php endfor;?>
                </ul>
            </div>
            <div id="list2" style="display: none" class="new_book_link">
                <ul>
                    <?php for($i=0;$i<count($new_save);$i++):?>
                        <li><label style="color: white;font-size: 12px" class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $new_save[$i]['book_id']?>"><?= $new_save[$i]['book_name']?></a><span class="user_name"><?= $new_save[$i]['save']?></span></li>
                    <?php endfor;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main2">
        <div class="qzzj">
            <div class="title2">
                <h2>女生最佳</h2>
                <div class="title2_box">
                    <!--<a href="#">全站</a>
                    |-->
                    <a href="#">女生</a>
                    <!--|
                    <a href="#">女生</a>
                    |
                    <a href="#">个性</a>-->
                </div>
            </div>
            <div class="qzzj_booklist">
                <?php for($i=0;$i<count($week);$i++):?>
                <?php if($i==0){?>
                <div class="booklist_info_large">
                    <a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>">
                        <img src="<?= $week[$i]['book_img']?>">
                    </a>
                    <h3 class="book_name"><a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>"><?= $week[$i]['book_name']?></a></h3>
                    <p class="author">作者：
                        <a href="#"><?= $week[$i]['user_name']?></a>
                    </p>
                    <p><a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>"><?= $week[$i]['book_content']?></a></p>
                </div>
                <div class="info_list">
                    <?php }else{?>
                        <div class="booklist_info">
                            <div class="booklist_info_img">
                                <a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>">
                                    <img src="<?= $week[$i]['book_img']?>">
                                </a>
                            </div>
                            <div class="book_real_info">
                                <h3 class="book_name"><a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>"><?= $week[$i]['book_name']?></a></h3>
                                <p class="author">作者：
                                    <a href="#"><?= $week[$i]['user_name']?></a>
                                </p>
                                <p><a href="?r=detail/detail&book_id=<?= $week[$i]['book_id']?>">一本好看的书</a></p>
                            </div>
                        </div>
                    <?php }?>
                    <?php endfor;?>
                </div>
            </div>
        </div>
        <div class="qzdjb">
            <div class="book_head">女生点击榜</div>
            <div class="new_book_btn">
                <a class="btn1" style="background-color: #666;color: #fff"  href="javascript:void(0)">周榜</a>
                <a class="btn2" style="color: #666" href="javascript:void(0)">月榜</a>
            </div>
            <div class="new_book_link" id="list1">
                <ul>
                    <?php for($i=0;$i<count($girl_click);$i++):?>
                        <li><label style="color: white;font-size: 12px" class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $girl_click[$i]['book_id']?>"><?= $girl_click[$i]['book_name']?></a><span class="user_name"><?= $girl_click[$i]['user_name']?></span></li>
                    <?php endfor;?>
                </ul>
            </div>
            <div id="list2" style="display: none" class="new_book_link">
                <ul>
                    <li><a href="#">撒旦1</a></li>
                    <li><a href="#">阿斯顿2</a></li>
                    <li><a href="#">阿斯顿2</a></li>
                    <li><a href="#">安第斯山3</a></li>
                    <li><a href="#">阿斯顿4</a></li>
                    <li><a href="#">阿德撒旦5</a></li>
                    <li><a href="#">非官方6</a></li>
                </ul>
            </div>
        </div>
        <div class="qzscb">
            <div class="book_head">女生收藏榜</div>
            <div class="new_book_btn">
                <a class="btn1" style="background-color: #666;color: #fff" href="javascript:void(0)">周榜</a>
                <a class="btn2" style="color: #666" href="javascript:void(0)">月榜</a>
            </div>
            <div class="new_book_link" id="list1">
                <ul>
                    <?php for($i=0;$i<count($girl_save);$i++):?>
                        <li><label style="color: white;font-size: 12px" class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $girl_save[$i]['book_id']?>"><?= $girl_save[$i]['book_name']?></a><span class="user_name"><?= $girl_save[$i]['user_name']?></span></li>
                    <?php endfor;?>
                </ul>
            </div>
            <div id="list2" style="display: none" class="new_book_link">
                <ul>
                    <li><a href="#">撒旦1</a></li>
                    <li><a href="#">阿斯顿2</a></li>
                    <li><a href="#">阿斯顿2</a></li>
                    <li><a href="#">安第斯山3</a></li>
                    <li><a href="#">阿斯顿4</a></li>
                    <li><a href="#">阿德撒旦5</a></li>
                    <li><a href="#">非官方6</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main3">
        <div class="boy_list">
            <div class="list_head">
                <h3>排行榜</h3>
                <a href="#" onclick="list_switch('new');">新书</a>
                |
                <a href="#" onclick="list_switch('serial');">连载</a>
                |
                <a href="#" onclick="list_switch('com');">完本</a>
            </div>
            <div class="list new">
                <?php for($i=0;$i<ceil(count($girl_new)/4);$i++):?>
                    <?php if($i==ceil(count($girl_new)/4)-1){?>
                        <ul>
                            <?php for($j=$i*4;$j<count($girl_new);$j++):?>
                                <li><label style="color: white;font-size: 12px" class="num"><?= $j+1?></label><a href="#"><?= $girl_new[$j]['book_name']?></a><span class="user_name"><?= date('Y-m-d H:i:s',$girl_new[$j]['ctime'])?></span></li>
                            <?php endfor;?>
                        </ul>
                    <?php }else{?>
                        <ul>
                            <?php for($j=$i*4;$j<($i+1)*4;$j++):?>
                                <li><label style="color: white;font-size: 12px" class="num"><?= $j+1?></label><a href="#"><?= $girl_new[$j]['book_name']?></a><span class="user_name"><?= date('Y-m-d H:i:s',$girl_new[$j]['ctime'])?></span></li>
                            <?php endfor;?>
                        </ul>
                    <? }?>
                <?php endfor;?>
                <ul>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                </ul>
            </div>
            <div style="display: none" class="list serial">
                <?php for($i=0;$i<ceil(count($girl_serial)/4);$i++):?>
                    <?php if($i==ceil(count($girl_serial)/4)-1){?>
                        <ul>
                            <?php for($j=$i*4;$j<count($girl_serial);$j++):?>
                                <li><label style="color: white;font-size: 12px" class="num"><?= $j+1?></label><a href="#"><?= $girl_serial[$j]['book_name']?></a><span class="user_name"><?= date('Y-m-d H:i:s',$girl_serial[$j]['ctime'])?></span></li>
                            <?php endfor;?>
                        </ul>
                    <?php }else{?>
                        <ul>
                            <?php for($j=$i*4;$j<($i+1)*4;$j++):?>
                                <li><label style="color: white;font-size: 12px" class="num"><?= $j+1?></label><a href="#"><?= $girl_serial[$j]['book_name']?></a><span class="user_name"><?= date('Y-m-d H:i:s',$girl_serial[$j]['ctime'])?></span></li>
                            <?php endfor;?>
                        </ul>
                    <? }?>
                <?php endfor;?>
                <ul>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                </ul>
            </div>
            <div style="display: none" class="list com">
                <?php for($i=0;$i<ceil(count($girl_com)/4);$i++):?>
                    <?php if($i==ceil(count($girl_com)/4)-1){?>
                        <ul>
                            <?php for($j=$i*4;$j<count($girl_com);$j++):?>
                                <li><label style="color: white;font-size: 12px" class="num"><?= $j+1?></label><a href="#"><?= $girl_com[$j]['book_name']?></a><span class="user_name"><?= date('Y-m-d H:i:s',$girl_com[$j]['ctime'])?></span></li>
                            <?php endfor;?>
                        </ul>
                    <?php }else{?>
                        <ul>
                            <?php for($j=$i*4;$j<($i+1)*4;$j++):?>
                                <li><label style="color: white;font-size: 12px" class="num"><?= $j+1?></label><a href="#"><?= $girl_com[$j]['book_name']?></a><span class="user_name"><?= date('Y-m-d H:i:s',$girl_com[$j]['ctime'])?></span></li>
                            <?php endfor;?>
                        </ul>
                    <? }?>
                <?php endfor;?>
                <ul>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                    <li><label style="color: white;font-size: 12px" class="num">1</label><a href="#">123</a><span class="user_name">2017-10-13</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function week(rel=1){
        img_cnt = $('.week_like_img'+rel).size();
        for(var i=0; i < img_cnt; i++) {
            square = '<div class="square" data-rel="'+i +'"></div>';
            $('.week_like .squares').append(square);
        }
        function timeInterval(){
            imgs = setInterval(function () {
                //var week_like_img = document.getElementById(id);
                //$('#'+(id-1)).css('display', 'none');
                //$('#'+id).css('display', 'block');
                $('.week_like_img'+rel).css('display', 'none');  //函数用于获取当前jQuery对象所匹配的元素中指定索引的元素，并返回封装该元素的jQuery对象。

                //alert(id);
                id++;
                $('.week_like_img'+rel).eq(id).css('display', 'block');
                if(id==(img_cnt)){
                    //$('#'+(id-1)).css('display', 'none');
                    $('.week_like_img'+rel).css('display', 'none');
                    id=0;
                    //$('#'+id).css('display', 'block');
                    $('.week_like_img'+rel).eq(id).css('display', 'block');
                }
            },3000);
        }
        id=0;
        timeInterval();
        $('.square').hover(function(){
                clearInterval(imgs);
                pos = $(this).attr('data-rel');
                $('.week_like_img'+rel).css('display', 'none');   //此处应移除所有
                $('.week_like_img'+rel).eq(pos).css('display', 'block');
            },
            function(){
                // pos = $(this).attr('data-rel');
                // $('.week_like_img').eq(pos).css('display', 'none');
                id=pos;
                timeInterval();
            }
        );
    }
    week();
    $('.week_like_top a').hover(function(){
            clearInterval(imgs);  //防止多个week()方法同时在运行
            $('.week_like_top a').removeClass('now');
            $('.week_like_top a').css('color','#333');
            $(this).addClass('now');
            $('.now').css('color','#f60');
            rel = $(this).attr('rel');
            $('.imgs').css('display','none');
            $('.imgs>div').css('display','none');
            $('.week_like .squares').empty();
            $('.week_like_img'+rel).eq(0).css('display','block');
            $('.week_like_'+rel).css('display','block');
            //rel = $(this).attr('rel');
            //alert(rel);
            week(rel);
            //rel=0;
        },
        function(){            //鼠标移开对应的方法，不设置会运行上面的方法两次，出bug..

        }
    );


    //week(rel);
    // ^[0-9]*$
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
    $('.btn3').click(function(){
        $(this).css('color','#f60');
        $(this).next().css('color','#666');             //下一个
        $(this).parent().nextAll('#list3').css('display','block');
        $(this).parent().nextAll('#list4').css('display','none');
    });
    $('.btn4').click(function(){
        $(this).css('color','#f60');
        //$('.btn1').css('background-color','white');
        $(this).prev().css('color','#666');               //前一个
        $(this).parent().nextAll('#list3').css('display','none');
        //$('#list2').css('display','block');
        $(this).parent().nextAll('#list4').css('display','block');
    });
</script>
<script>
    function getBook(class_id,elem){
        $.ajax({
            url:'?r=index/get-book',
            data:'class_id='+class_id,
            dataType:'json',
            type:'post',
            success:function(respData){
                var data = respData.data;
                for(i=0;i<data.length;i++){
                    if(i==0){
                        $(elem).parent().nextAll('.boy_like_list').children().html('<li>\
                    <label style="color: white;font-size: 12px" class="num">'+(i+1)+'</label>\
                        <a href="">'+data[i].book_name+'</a>\
                        <label style="font-size: 12px" class="sum">'+data[i].status+'</label>\
                        <a class="book" href=""><img src="'+data[i].book_img+'">'+data[i].book_content+'</a>\
                    </li>')
                    }else{
                        $(elem).parent().nextAll('.boy_like_list').children().append('<li>\
                    <label style="color: white;font-size: 12px" class="num">'+(i+1)+'</label>\
                        <a href="">'+data[i].book_name+'</a>\
                        <label style="font-size: 12px" class="sum">'+data[i].status+'</label>\
                        </li>\
                        <li><a class="more" href=""></a></li>');
                    }
                }
            }
        })
    }
</script>
<script>
    function list_switch(req){
        $('.list').hide();
        $('.'+req).show();
    }
</script>