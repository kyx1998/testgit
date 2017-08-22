/**
    表名: hb_size
    数据库: hibuy
    描述: 商品尺寸表
    作者: kingphp
    建表时间: 2017-07-28

    size_id:
    size_name: 尺寸名称, 如xl,xxl,40码
 */
CREATE TABLE `hb_size`
(
  `size_id` INT NOT NULL auto_increment,
  `size_name` VARCHAR(16) NOT NULL DEFAULT '',
  `remark` VARCHAR(64) NOT NULL DEFAULT '',
  PRIMARY KEY(`size_id`)
)engine=innodb DEFAULT charset=utf8;