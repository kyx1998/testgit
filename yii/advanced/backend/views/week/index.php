<?php
$this->params['main_title'] = '每周推荐';
$this->params['sub_title'] = '添加书籍';
$this->params['page'] = 'navWeek';
$this->params['active'] = 1;
?>
<div class="row">
    <div class="col-sm-3">
        <h4>类别添加</h4>
        <form action="?r=week/add" method="post">
            <div class="form-group">
                <label>书名</label>
                <input type="text" value="" name="book_name" class="form-control" placeholder="" onblur="CheckBook();">
                <input type="text" name="book_id" value="" hidden>
            </div>
            <div class="form-group">
                <label>作者</label>
                <input type="text" value="" name="user_name" class="form-control" placeholder="" onblur="CheckUser();">
                <input type="text" name="user_id" value="" hidden>
            </div>
            <div class="form-group">
                <label>显示顺序</label>
                <select name="squence">
                    <?php for($i=1;$i<6;$i++):?>
                    <option value="<?= $i?>"><?= $i?></option>
                    <?php endfor;?>
                </select>
            </div>
            <input type="button" class="btn btn-default" onclick="Submit();" value="增加">
        </form>
        <div class="form-group">
            <div class="form-lable"></div>
            <div class="form-value">
                <span class="errormsg"><?= empty($errmsg)?'':$errmsg ?></span>
            </div>
        </div>
    </div>

    <div class="col-sm-9">
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="width: 15%">书名</th>
                <th style="width: 15%">作者</th>
                <th style="width: 15%">分类</th>
                <th style="width: 15%">顺序</th>
                <th style="width: 15%">状态</th>
                <th style="width: 15%">操作</th>
            </tr>
            </thead>

            <tbody>
            <?php
            for($i=0;$i<count($books);$i++):
                ?>
                <tr>
                    <td><?= $books[$i]['book_name']?></td>
                    <td><?= $user[$i]['user_name']?></td>
                    <td><?= $classes[$i]['class_name']?></td>
                    <td><?= $week[$i]['squence']?></td>
                    <td><?= $books[$i]['status']?></td>
                    <td><a href="?r=week/update-page&week_id=<?= $week[$i]['week_id'] ?>">编辑</a> | <a href="?r=week/del&week_id=<?= $week[$i]['week_id'] ?>">删除</a> </td>
                </tr>
            <?php endfor;?>

            </tbody>
        </table>

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