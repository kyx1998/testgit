<?php
$this->params['user_name'] = \Yii::$app->session['user_name'];
?>
<link href="css/classification.css" rel="stylesheet">

<div class="contain">
    <div class="main1">
        <div class="head1">
            <span>共有符合<?= $num?>条件的作品</span>
            <span>总共有<?= $sum?>部作品</span>
        </div>
        <div class="menu">
            <ul class="class">
                <li>
                    <span>作品类别：</span>
                    <ul class="book_class">
                        <?php for($i=0;$i<count($classes);$i++):?>
                        <li>
                            <a href="?r=classification/classification&top_class_id=<?= $info[$i]['class_id']?>" style="color: #ff6600"><?= $info[$i]['class_name']?></a>
                            <?php for($j=0;$j<count($classes[$i]);$j++){?>
                            <a href="?r=classification/classification&class_id=<?= $classes[$i][$j]['class_id']?>"><?= $classes[$i][$j]['class_name']?></a>
                                <div hidden><?= $classes[$i][$j]['class_id']?></div>
                            <?php }?>
                        </li>
                        <?php endfor;?>
                    </ul>
                </li>
                <li>
                    <span>写作进度：</span>
                    <ul class="book_class">
                       <li>
                           <a href="?r=classification/classification&status=''" style="color: #ff6600">全部</a>
                           <a href="?r=classification/classification&status=1">连载中</a>
                           <div hidden>1</div>
                           <a href="?r=classification/classification&status=2">完本</a>
                           <div hidden>2</div>
                       </li>
                    </ul>
                </li>
                <li>
                    <span>排序方式：</span>
                    <ul class="book_class">
                        <li>
                            <a href="?r=classification/classification&req=''" style="color: #ff6600">默认</a>
                            <a href="?r=classification/classification&req=click">点击数</a>
                            <div hidden>click</div>
                            <a href="?r=classification/classification&req=save">收藏数</a>
                            <div hidden>save</div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="main2">
        <div class="head2"></div>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th>序号</th>
                <th>类别</th>
                <th>书名</th>
                <th>作者</th>
                <th>更新时间</th>
                <th>状态</th>
            </tr>
            <?php for($j=0;$j<$page;$j++):?>
                <?php if($j==($page-1)){?>
            <?php for($i=($j*4);$i<(count($books));$i++):?>
                        <?php if($j>0){?>
                <tr class="infoma <?= $j+1?>" style="display: none">
                    <td><?= $i+1?></td>
                    <td><a href="#" class="class"><?= $books[$i]['class_name']?></a></td>
                    <td class="name"><a style="color: #1886ac" href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_name']?>
                            <div class="box" style="display: none">
                                <div class="book_info">
                                    <div class="img">
                                        <img src="<?= $books[$i]['book_img']?>">
                                    </div>
                                    <div class="info">
                                        <a href="#"><?= $books[$i]['book_name']?></a>
                                        <span>作者：<a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['user_name']?></a></span>
                                        <a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_content']?></a>
                                    </div>
                                </div>
                                <div class="nav">
                                    <a href="#">在线阅读</a>
                                    <a href="javascript:void(0);" onclick="getSave(<?= $books[$i]['book_id']?>);">收藏本书</a>
                                    <a href="#">下载</a>
                                </div>
                            </div>
                        </a></td>
                    <td><a style="color: #1886ac" href="#"><?= $books[$i]['user_name']?></a></td>
                    <td><?= $books[$i]['ctime']?></td>
                    <td style="color: #008000"><?= ($books[$i]['status']==1)?'连载':'完本'?></td>
                </tr>
                            <?php }else{?>
                            <tr class="infoma <?= $j+1?>">
                                <td><?= $i+1?></td>
                                <td><a href="#" class="class"><?= $books[$i]['class_name']?></a></td>
                                <td class="name"><a style="color: #1886ac" href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_name']?>
                                        <div class="box" style="display: none">
                                            <div class="book_info">
                                                <div class="img">
                                                    <img src="<?= $books[$i]['book_img']?>">
                                                </div>
                                                <div class="info">
                                                    <a href="#"><?= $books[$i]['book_name']?></a>
                                                    <span>作者：<a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['user_name']?></a></span>
                                                    <a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_content']?></a>
                                                </div>
                                            </div>
                                            <div class="nav">
                                                <a href="#">在线阅读</a>
                                                <a href="javascript:void(0);" onclick="getSave(<?= $books[$i]['book_id']?>);">收藏本书</a>
                                                <a href="#">下载</a>
                                            </div>
                                        </div>
                                    </a></td>
                                <td><a style="color: #1886ac" href="#"><?= $books[$i]['user_name']?></a></td>
                                <td><?= $books[$i]['ctime']?></td>
                                <td style="color: #008000"><?= ($books[$i]['status']==1)?'连载':'完本'?></td>
                            </tr>
                            <?php }?>
            <?php endfor;?>
            <?php }else{?>
            <?php for($i=($j*4);$i<(($j+1)*4);$i++):?>
                        <?php if($j>0){?>
                            <tr class="infoma <?= $j+1?>" style="display: none">
                                <td><?= $i+1?></td>
                                <td><a href="#" class="class"><?= $books[$i]['class_name']?></a></td>
                                <td class="name"><a style="color: #1886ac" href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_name']?>
                                        <div class="box" style="display: none">
                                            <div class="book_info">
                                                <div class="img">
                                                    <img src="<?= $books[$i]['book_img']?>">
                                                </div>
                                                <div class="info">
                                                    <a href="#"><?= $books[$i]['book_name']?></a>
                                                    <span>作者：<a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['user_name']?></a></span>
                                                    <a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_content']?></a>
                                                </div>
                                            </div>
                                            <div class="nav">
                                                <a href="#">在线阅读</a>
                                                <a href="javascript:void(0);" onclick="getSave(<?= $books[$i]['book_id']?>);">收藏本书</a>
                                                <a href="#">下载</a>
                                            </div>
                                        </div>
                                    </a></td>
                                <td><a style="color: #1886ac" href="#"><?= $books[$i]['user_name']?></a></td>
                                <td><?= $books[$i]['ctime']?></td>
                                <td style="color: #008000"><?= ($books[$i]['status']==1)?'连载':'完本'?></td>
                            </tr>
                        <?php }else{?>
                            <tr class="infoma <?= $j+1?>">
                                <td><?= $i+1?></td>
                                <td><a href="#" class="class"><?= $books[$i]['class_name']?></a></td>
                                <td class="name"><a style="color: #1886ac" href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_name']?>
                                        <div class="box" style="display: none">
                                            <div class="book_info">
                                                <div class="img">
                                                    <img src="<?= $books[$i]['book_img']?>">
                                                </div>
                                                <div class="info">
                                                    <a href="#"><?= $books[$i]['book_name']?></a>
                                                    <span>作者：<a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['user_name']?></a></span>
                                                    <a href="?r=detail/detail&book_id=<?= $books[$i]['book_id']?>"><?= $books[$i]['book_content']?></a>
                                                </div>
                                            </div>
                                            <div class="nav">
                                                <a href="#">在线阅读</a>
                                                <a href="javascript:void(0);" onclick="getSave(<?= $books[$i]['book_id']?>);">收藏本书</a>
                                                <a href="#">下载</a>
                                            </div>
                                        </div>
                                    </a></td>
                                <td><a style="color: #1886ac" href="#"><?= $books[$i]['user_name']?></a></td>
                                <td><?= $books[$i]['ctime']?></td>
                                <td style="color: #008000"><?= ($books[$i]['status']==1)?'连载':'完本'?></td>
                            </tr>
                        <?php }?>
            <?php endfor;?>
            <?php }?>
            <?php endfor;?>
        </table>
        <div class="page_btn">
            <?php for($i=0;$i<$page;$i++):?>
            <a href="javascript:void(0);" onclick="getPage(<?= $i+1?>);"><?= $i+1?></a>
            <?php endfor;?>
    </div>
</div>
<script>
    $('.name').hover(function(){
        $(this).children('.box').css('display','block');    //children查询当前标签的子标签
    },
        function(){
            $('.box').css('display','none');
        }
    );
</script>
<script>
    function getPage(id){
        $('.infoma').hide();
        $('.'+id).show();
    }
</script>
<script>
    function Search(elem){
        $(elem).next().addClass('class',)
        var status = document.getElementsByClassName('status')[0].innerText;
        alert(status);
        /*return;
        $.ajax({
            url:'?'
        })*/
    }
</script>
<script>
    function getSave(book_id){
        $.ajax({
            url:'?r=classification/get-save',
            data:'book_id='+book_id,
            dataType:'json',
            type:'post',
            success:function(respData){
                if(respData.code==1){
                    alert('收藏成功');
                    return;
                }
            }
        })
    }
</script>
