<?php
$this->params['main_title'] = '每周推荐';
$this->params['sub_title'] = '修改书籍';
$this->params['page'] = 'navWeek';
$this->params['active'] = 1;
?>
<div class="row">
    <div class="col-sm-3">
        <h4>类别添加</h4>
        <form action="?r=week/update" method="post">
            <div class="form-group">
                <label>书名</label>
                <input type="text" value="<?= $book['book_name']?>" name="book_name" class="form-control" placeholder="" onblur="CheckBook();">
                <input type="text" name="book_id" value="<?= $book['book_id']?>" hidden>
            </div>
            <div class="form-group">
                <label>作者</label>
                <input type="text" value="<?= $user['user_name']?>" name="user_name" class="form-control" placeholder="" onblur="CheckUser();">
                <input type="text" name="user_id" value="<?= $user['user_id']?>" hidden>
            </div>
            <div class="form-group">
                <label>显示顺序</label>
                <select name="squence">
                    <?php for($i=1;$i<5;$i++):?>
                        <?php if($i ==$week['squence']):?>
                        <option value="<?= $i?>" selected><?= $i?></option>
                        <?php endif;?>
                        <option value="<?= $i?>"><?= $i?></option>
                    <?php endfor;?>
                </select>
            </div>
            <input type="text" name="edit_id" value="<?= $week['week_id']?>" hidden>
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
    function CheckBook(){
        var book_name = $('[name=book_name]').val();
        if(book_name==''){
            $('.errormsg').text('书名不能为空');
            return;
        }
        $.ajax({
            url:'?r=week/check-book',
            data:'book_name='+book_name,
            dataType:'json',
            type:'post',
            success:function(respData){
                var code = parseInt(respData.code);

                if(code == <?= \common\common\ErrDesc::OK ?>){
                    $('.errormsg').text('');
                    var data = respData.data;
                    document.getElementsByName('book_id')[0].value = data.book_id;
                    return;
                }
                $('.errormsg').text('书籍不存在');
            },
            error: function (msg) {

            }
        })
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
            url:'?r=week/check-user',
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
            },
            error: function (msg) {

            }
        })
    }
</script>
<script>
    function Submit() {
        var book_name = $('[name=book_name]').val();
        if(book_name == '') {
            return;
        }
        $('form').submit();
    }
</script>