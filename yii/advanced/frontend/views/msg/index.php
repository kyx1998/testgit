<!DOCTYPE html>         <!--文档声明，告诉浏览器是h5页面-->
<html>
<head>
    <title>留言板</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            font-size: 15px;
        }
        .container{
            width: 800px;
            margin: 0 auto;
        }
        .nav{
            text-align: center;
        }
        .form-item{
            margin: 10px 0;
        }
        .form-item label{
            display: inline-block;
            width: 10%;
        }
        .form-item input, .form-item textarea{
            width: 80%;
            line-height: 2em;
        }
        .content{
            border-top: solid 1px #e6e6e6;
            margin: 20px 0;
            padding: 10px 0;
        }
        .content-item{
            margin: 10px auto;
            text-align: center;
            font-size: 1.2em;
            background-color: #c1d2ee;
        }
        .ctime{
            text-align: right;
        }
        .name{
            text-align: left;
        }
        .msg-content{
            /*text-indent: 4px;     //字体缩进*/
            color: orangered;
            text-align: left;
            padding-left: 40px;
        }
        .remove{
            text-align: right;
        }
        .name {
            color: #00aa00;
            overflow: hidden;
        }
        .left {
            float: left;
        }
        .right {
            float: right;
            color: red;
            border: solid 1px #b9b9b9;
            display: inline-block;
            width: 24px;
            height: 24px;
            font-weight: bolder;
            text-align: center;
        }
        .right a, .right a:active, .right a:hover, .right a:visited {
            text-decoration: none;
            color: red;
        }
        .msg-content textarea {
            width: 90%;
            border: none;
        }
        .msg-content textarea:focus {
            border: none;
            outline: none;
        //background-color: red;
        }
        .ctime {
            overflow: hidden;
        }
        .ctime .left {
            font-style: normal;
            display: inline-block;
            font-size: 12px;
            padding: 1px;
            color: #ff8917;
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="nav">
        <h1>留言板</h1>
    </div>

    <div class="content">
        <?php foreach($msginfos as $key=>$value):?>
            <div class="content-item">
                <div class="name"><?= $value['user_name'] ?></div>
                <div class="msg-content"><textarea readonly="readonly" ondblclick="Edit(this, <?= $key ?>);" id="content<?= $key ?>" ><?php echo $value['content'];?></textarea></div>      <!--$content由键值'content'决定-->
                <div class="ctime"><?= date('Y-m-d H:i:s',$value['ctime']) ?></div>
                <div class="remove"><a href="?r=msg/del-msg&msgKey=<?= $key ?>">删除</a></div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="msg_board">
        <form action="" method="get">
            <input name="r" value="msg/add-msg" hidden>
            <div class="form-item">
                <label>姓名</label>
                <input name="username" type="text">
            </div>
            <div class="form-item">
                <label>内容</label>
                <textarea name="content"></textarea>
            </div>
            <div class="form-item">
                <label></label>
                <input type="submit" name="submit" value="提交">
            </div>
        </form>
    </div>
</div>
<script>
    function Edit(elem, m_id) {
        $(elem).attr('readonly', false);
        $(elem).css({border:'solid 1px #a1a1a1'});
        //$(elem).parents('.content-item').children('.ctime').children('span').css('display', 'inline-block');
        $('#save'+m_id).css('display', 'inline-block');

    }
    function Save(m_id) {
        var content = $('#content'+m_id).val();
        $.ajax({
            url: '?r=msg2/update',
            data: 'm_id='+m_id+'&content='+content,
            type: 'post',
            dataType: 'json',
            success: function (rsp) {
                if(rsp.code == 1) {
                    $('#content'+m_id).attr('readonly', true);
                    $('#content'+m_id).css({border:'none'});
                }else {
                    alert('失败');
                }
            },
            error: function () {
                alert('error');
            }

        })
    }
</script>
</body>
</html>