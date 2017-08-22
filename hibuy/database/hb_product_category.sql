/**
    表名: hb_product_category
    数据库: hibuy
    描述: 商品分类
    作者: kingphp
    建表时间: 2017-07-28

    category_name: 名称, 如裙子/上衣/家居/新款...
    category_img: 展示的图片
*/
CREATE TABLE `hb_product_category`
(
  `category_id` INT NOT NULL auto_increment,
  `category_name` VARCHAR(16) NOT NULL DEFAULT '',
  `category_img` VARCHAR(520) NOT NULL DEFAULT '',
  PRIMARY KEY(`category_id`)
)engine=innodb DEFAULT charset=utf8;