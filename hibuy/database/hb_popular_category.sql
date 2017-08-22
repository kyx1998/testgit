/**
    表名: hb_popular_category
    数据库: hibuy
    描述: 每周流行中的类别
    作者: kingphp
    建表时间: 2017-07-28

*/
CREATE TABLE `hb_popular_category`
(
  `popular_category_id` INT NOT NULL auto_increment,
  `popular_category_name` VARCHAR(16) NOT NULL DEFAULT '',
  `popular_category_img` VARCHAR (520) NOT NULL DEFAULT '',
  PRIMARY KEY(`popular_category_id`)
)engine=innodb DEFAULT charset=utf8;