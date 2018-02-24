<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/index.css" rel="stylesheet" />

<div class="contain">
    <div class="main1">
        <div class="week_like">
            <div class="week_like_top">
                <h2>本周推荐</h2>
                <a href="#" rel="1" class="now">全站</a>
                <?php for($i=0;$i<count($top_classes);$i++):?>
                <a href="javascript:void(0);" rel="<?= $i+2?>"><?= $top_classes[$i]['class_name']?></a>
                <?php endfor;?>
            </div>
            <div style="display: block" class="week_like_1 imgs">
                <div style="display: block" class="week_like_img1"><img src="image/Annie1.jpg"></div>
                <div class="week_like_img1"><img src="image/Annie2.jpg"></div>
                <div class="week_like_img1"><img src="image/Annie3.jpg"></div>
                <div class="week_like_img1"><img src="image/Annie4.jpg"></div>
                <div class="week_like_img1"><img src="image/Annie5.jpg"></div>
            </div>
            <?php for($j=0;$j<count($show);$j++):?>
            <div class="<?= 'week_like_'.($j+2).' imgs'?>">
                <?php for($k=0;$k<count($show[$j]);$k++):?>
                <div class="<?= 'week_like_img'.($j+2)?>"><img src="<?= $show[$j][$k]['show_img']?>"></div>
                <?php endfor;?>
            </div>
            <?php endfor;?>
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
                <h2>全站最佳</h2>
                <div class="title2_box">
                    <a href="#">全站</a>
                    |
                    <a href="#">男生</a>
                    |
                    <a href="#">女生</a>
                    |
                    <a href="#">个性</a>
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
            <div class="book_head">全站点击榜</div>
            <div class="new_book_btn">
                <a class="btn1" style="background-color: #666;color: #fff"  href="javascript:void(0)">周榜</a>
                <a class="btn2" style="color: #666" href="javascript:void(0)">月榜</a>
            </div>
            <div class="new_book_link" id="list1">
                <ul>
                    <?php for($i=0;$i<count($books_click);$i++):?>
                    <li><label style="color: white;font-size: 12px" class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $books_click[$i]['book_id']?>"><?= $books_click[$i]['book_name']?></a><span class="user_name"><?= $books_click[$i]['user_name']?></span></li>
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
            <div class="book_head">全站收藏榜</div>
            <div class="new_book_btn">
                <a class="btn1" style="background-color: #666;color: #fff" href="javascript:void(0)">周榜</a>
                <a class="btn2" style="color: #666" href="javascript:void(0)">月榜</a>
            </div>
            <div class="new_book_link" id="list1">
                <ul>
                    <?php for($i=0;$i<count($books_save);$i++):?>
                        <li><label style="color: white;font-size: 12px" class="num"><?= $i+1?></label><a href="?r=detail/detail&book_id=<?= $books_save[$i]['book_id']?>"><?= $books_save[$i]['book_name']?></a><span class="user_name"><?= $books_save[$i]['user_name']?></span></li>
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
        <div class="edit_like">
            <div class="edit_head">
                <h2>编辑推荐</h2>
            </div>
            <div class="edit_btn">
                <a class="btn3" style="color: #f60;" href="javascript:void(0);">免费新书</a>
                |
                <a class="btn4" href="javascript:void(0);">完本好书</a>
            </div>
            <div class="edit_list" id="list3">
                <ul>
                    <?php foreach($books_free as $value):?>
                    <li>
                        <a href="?r=classification/classification&class_id=<?= $value['class_id']?>">[<?= $value['class_name']?>]</a>
                        <a href="?r=detail/detail&book_id=<?= $value['book_id']?>"><?= $value['book_name']?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="edit_list" style="display:none;" id="list4">
                <ul>
                    <?php foreach($books_fin as $value):?>
                        <li>
                            <a href="?r=classification/classification&class_id=<?= $value['class_id']?>">[<?= $value['class_name']?>]</a>
                            <a href="?r=detail/detail&book_id=<?= $value['book_id']?>"><?= $value['book_name']?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <?php foreach($trees as $key=>$tree):?>
        <div class="boy_like">
            <div class="boy_like_head">
                <h2><?= $key?></h2>
            </div>
            <div class="boy_like_btn">
                <a class="now" style="color: #f60" href="javascript:void(0);">全部</a>
                |
               <!-- <?php /*foreach($classes as $k=>$value):*/?>
                    --><?php /*if($key = $k):*/?>
                <?php for($j=0;$j<count($classes[$key]);$j++):?>
                <a href="javascript:void(0);" onclick="getBook(<?= $classes[$key][$j]['class_id']?>,this);"><?= $classes[$key][$j]['class_name']?></a>
                |
                <?php endfor;?>
                        <?php /*endif;*/?><!--
                --><?php /*endforeach;*/?>
            </div>
            <?php /*for($a):*/?>
            <div class="boy_like_list">
                <ul class="list">
                    <li>
                        <label style="color: white;font-size: 12px" class="num"><?= 1?></label>
                        <a href="#"><?= $tree[0]['class_name']?></a>
                        <a href="#"><?= $tree[0]['book_name']?></a>
                        <label style="font-size: 12px" class="sum"><?= $tree[0]['click']?></label>
                        <a class="book" href="#"><img src="<?= $tree[0]['book_img']?>"><?= $tree[0]['book_content']?></a>
                    </li>
                    <?php for($i=1;$i<count($tree);$i++):?>
                    <li>
                        <label style="color: white;font-size: 12px" class="num"><?= $i+1?></label>
                        <a href="?r=classification/classification&class_id=<?= $tree[$i]['class_id']?>"><?= $tree[$i]['class_name']?></a>
                        <a href="?r=detail/detail&book_id=<?= $tree[$i]['book_id']?>"><?= $tree[$i]['book_name']?></a>
                        <label style="font-size: 12px" class="sum"><?= $tree[$i]['click']?></label>
                    </li>
                    <?php endfor;?>
                    <li><a class="more" href="?r=classification/classification">更多</a></li>
                </ul>
            </div>

        </div>
        <?php endforeach;?>
        <!--<div class="boy_like">
            <div class="boy_like_head">
                <h2>女生最爱榜</h2>
            </div>
            <div class="boy_like_btn">
                <a href="#">问啊</a>
                |
                <a href="#">啊二人我</a>
                |
                <a href="#">哇饿饿</a>
                |
                <a href="#">委屈巍峨</a>
                |
                <a href="#">请问青蛙</a>
                |
                <a href="#">请问青蛙</a>
                |
                <a href="#">而人</a>
            </div>
            <div class="boy_like_list">
                <ul class="list">
                    <li>
                        <span class="num">1</span>
                        <a href="#">[锁定]</a>
                        <a href="#">阿迪达斯</a>
                        <span class="sum">5666</span>
                        <a class="book" href="#">
                            <img src="image/Annie2.jpg">
                            三大殿啊算法啊啊是撒打算萨芬发阿枫 萨芬阿斯弗啊阿萨飒飒发啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊
                        </a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a class="more" href="#">更多</a></li>
                </ul>
            </div>
        </div>
        <div class="boy_like">
            <div class="boy_like_head">
                <h2>个性推荐榜</h2>
            </div>
            <div class="boy_like_btn">
                <a href="#">问啊</a>
                |
                <a href="#">啊二人我</a>
                |
                <a href="#">哇饿饿</a>
                |
                <a href="#">委屈巍峨</a>
                |
                <a href="#">请问青蛙</a>
                |
                <a href="#">请问青蛙</a>
                |
                <a href="#">而人</a>
            </div>
            <div class="boy_like_list">
                <ul class="list">
                    <li>
                        <span class="num">1</span>
                        <a href="#">[锁定]</a>
                        <a href="#">阿迪达斯</a>
                        <span class="sum">5666</span>
                        <a class="book" href="#">
                            <img src="image/Annie2.jpg">
                            三大殿啊算法啊啊是撒打算萨芬发阿枫 萨芬阿斯弗啊阿萨飒飒发啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊
                        </a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a href="#">
                            <span class="num">1</span>
                            <a href="#">[锁定]</a>
                            <a href="#">阿迪达斯</a>
                            <span class="sum">5666</span>
                        </a></li>
                    <li><a class="more" href="#">更多</a></li>
                </ul>
            </div>
        </div>-->
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