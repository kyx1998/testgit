/**
    表名: hb_color
    数据库: hibuy
    描述: 商品颜色表
    作者: kingphp
    建表时间: 2017-07-28

    color_value: 颜色值, 如 #FF0000
*/
CREATE TABLE `hb_color`
(
  `color_id` INT NOT NULL auto_increment,
  `color_name` VARCHAR(16) NOT NULL DEFAULT '',
  `color_value` VARCHAR(10) NOT NULL DEFAULT '',
  `remark` VARCHAR(64) NOT NULL DEFAULT '',
  PRIMARY KEY(`color_id`)
)engine=innodb DEFAULT charset=utf8;