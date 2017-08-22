<?php
$msgInfo = $GLOBALS['msgInfo'];
$replyInfos = $GLOBALS['replyInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title> </title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/replay.css" type="text/css" rel="stylesheet">
    <link href="css/hot_artic.css" type="text/css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="title"><?php echo $msgInfo['title'];?></div>
    <div class="time-view">
        <div class="time"><?php echo $msgInfo['ctime'];?></div>
        <div class="view"><?php echo $msgInfo['readed'];?></div>
    </div>
    <div class="aritc"><?php echo $msgInfo['msg_content'];?></div>


    <div class="reply-div">
        <div class="reply">
            <div class="reply-input">
                <input type="text" class="reply-text" name="reply_content">
                <input type="text" name="ctime" hidden>
                <div class="reply-img">
                    <img src="image/shopping1.png">
                    <input type="file" name="reply_img" class="reply-file" onchange="UpFile(this,'http://localhost/studyPHP/hibuy/resource/index.php')">
                </div>
            </div>
            <input type="text" name="level" value="1" hidden>
            <input type="button" value="发布" class="btn_publish" onclick="addReply();">
        </div>
    </div>


    <div class="recent-comment">
        <div class="comment-header">最近评论</div>
        <?php
        foreach($replyInfos as $info):
            if($info['level']==2):
        ?>
        <div class="comment-item-div">
            <div class="comment-item">
                <div class="replyer">
                    <div class="replyer-info">
                        <div class="replyer-icon"><img src="image/w1.png"></div>
                        <div class="reply-nickname">闲鹤</div>
                    </div>
                    <div class="ctime"><?php echo $info['ctime'];?></div>
                </div>
                <div class="reply-content">
                    <?php echo '@'.$info['reply_content'];?><img src="image/w1.png">
                </div>
                <div class="like-reply">
                    <div class="like"><img src="image/shopping1.png"> <?php echo $info['prefer'];?></div>
                    <div class="reply-op"><img src="image/shopping1.png"> 回复</div>
                </div>
            </div>
            <div class="reply">
                <div class="reply-input">
                    <input type="text" class="reply-text" name="reply_content">
                    <input type="text" name="ctime" hidden>
                    <div class="reply-img">
                        <img src="image/shopping1.png">
                        <input type="file" name="reply_img" class="reply-file" onchange="UpFile(this,'http://localhost/studyPHP/hibuy/resource/index.php')">
                    </div>
                </div>
                <input type="text" name="level" value="2" hidden>
                <input type="button" value="发布" class="btn_publish" onclick="addReply();">
            </div>
        </div>
<?php
endif;?>
            <div class="comment-item-div">
                <div class="comment-item">
                    <div class="replyer">
                        <div class="replyer-info">
                            <div class="replyer-icon"><img src="image/w1.png"></div>
                            <div class="reply-nickname">闲鹤</div>
                        </div>
                        <div class="ctime"><?php echo $info['ctime'];?></div>
                    </div>
                    <div class="reply-content">
                        <?php echo $info['reply_content'];?><img src="image/w1.png">
                    </div>
                    <div class="like-reply">
                        <div class="like"><img src="image/shopping1.png"> <?php echo $info['prefer'];?></div>
                        <div class="reply-op"><img src="image/shopping1.png"> 回复</div>
                    </div>
                </div>
                <div class="reply">
                    <div class="reply-input">
                        <input type="text" class="reply-text" name="reply_content">
                        <input type="text" name="ctime" hidden>
                        <div class="reply-img">
                            <img src="image/shopping1.png">
                            <input type="file" name="reply_img" class="reply-file" onchange="UpFile(this,'http://localhost/studyPHP/hibuy/resource/index.php')">
                        </div>
                    </div>
                    <input type="text" name="level" value="2" hidden>
                    <input type="button" value="发布" class="btn_publish" onclick="addReply();">
                </div>
            </div>
<?php endforeach;?>
        <div class="comment-item-div">
            <div class="comment-item">
                <div class="replyer">
                    <div class="replyer-info">
                        <div class="replyer-icon"><img src="image/w1.png"></div>
                        <div class="reply-nickname">闲鹤</div>
                    </div>
                    <div class="ctime">2017-07-26 08:32:25</div>
                </div>
                <div class="reply-content">
                    不错不错，很好玩的<img src="image/w1.png">
                </div>
                <div class="like-reply">
                    <div class="like"><img src="image/shopping1.png"> 0</div>
                    <div class="reply-op"><img src="image/shopping1.png"> 回复</div>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
    /**
     * 异步提交数据
     * @param url  提交的url
     * @param data 要提交的数据 格式为name1=value1&name2=valu3&....
     * @param callFun 提交成功后回调的函数
     */
    function ajaxSubmit(url, data, callFun) {
        var xmlhttp;
        if(window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }else {
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.open('post', url, true);
        xmlhttp.setRequestHeader('Content-type',' application/x-www-form-urlencoded');
        xmlhttp.send(data);
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                callFun(xmlhttp.responseText);
            }
        }
    }
    function UpFile(elem,url){
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
            document.getElementsByClassName('cboxElement')[0].href = img_url;
            document.getElementsByName('reply_img')[0].value = img_url;
        });
    }
    function AddSize() {
        var reply_content = document.getElementsByName('reply_content')[0].value;
        var ctime = document.getElementsByName('ctime')[0].value;
        var reply_img = document.getElementsByName('reply_img')[0].value;
        var level = document.getElementsByName('level')[0].value;
        if(reply_content == '') {
            return false;
        }
        var formData = new FormData();
        formData.append('reply_content',reply_content);
        formData.append('ctime',ctime);
        formData.append('reply_img',reply_img);
        formData.append('level',level);
        ajaxSubmit('?c=MsgBoard&m=addReply', formData, function (rspText) {
            var respObj = JSON.parse(rspText);
            if(respObj.code !=1) {
                alert(xmlHttpObj.msg);
                return;
            }
            alert('提交成功');
        })
    }
</script>

</body>
</html>