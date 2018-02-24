@echo off

 @set input1=""

:begin



F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < user.sql
echo 'user.sql ok\n';

F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < book.sql
echo 'book.sql ok\n';

F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < msg_board.sql
echo 'msg_board.sql ok\n';

F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < bookcase.sql
echo 'bookcase.sql ok\n';

F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < classification.sql
echo 'classification.sql ok\n';

F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < show_imgs.sql
echo 'show_imgs.sql ok\n';

F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < edit_recommend.sql
echo 'edit_recommend.sql ok\n';

F:\wamp\bin\mysql\mysql5.6.17\bin\mysql -uroot airead < week_recommend.sql
echo 'week_recommend.sql ok\n';
