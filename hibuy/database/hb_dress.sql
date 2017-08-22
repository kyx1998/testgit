/**
    表名: hb_dress
    数据库: hibuy
    描述: 潮流穿搭
    作者: kingphp
    建表时间: 2017-07-28

*/
CREATE TABLE `hb_dress`
(
  `dress_id` INT NOT NULL auto_increment,
  `dress_name` VARCHAR(16) NOT NULL DEFAULT '',
  `dress_img` VARCHAR (520) NOT NULL DEFAULT '',
  PRIMARY KEY(`dress_id`)
)engine=innodb DEFAULT charset=utf8;