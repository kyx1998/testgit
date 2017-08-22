/**
    表名: hb_product
    数据库: hibuy
    描述: 商品
    作者: kingphp
    建表时间: 2017-07-28

    product_no: 商品唯一标识符
    product_name: 商品名
    product_subname: 商品子名称
    list_img_url: 商品展示图片,多张图片使用逗号(,)隔开
    origin_price: 商品原价, 单位为分
    discount_price: 折扣价, 单位为分
    freight_type: 运费类型:
                  1 包邮
                  2 不包邮
                  3 满额度包邮  freight_limit为包邮额度
    freight_limit: 包邮额度
    is_optimization: 优选
                  0 非优选 默认
                  1 优选
    is_hot: 热销
            0 非热销 默认
            1 热销
    is_week_popular: 每周流行
            0 非流行 默认
            1 流行
    product_category_id: 商品类型id
    dress_id: 潮流搭配id
    popular_category_id: 每周流行中的类别id

*/
CREATE TABLE `hb_product`
(
  `product_id`  INT unsigned NOT NULL auto_increment,
  `product_no` VARCHAR(64) NOT NULL DEFAULT '',
  `product_name` VARCHAR(64) NOT NULL DEFAULT '',
  `product_subname` VARCHAR(64) NOT NULL DEFAULT '',
  `list_img_url` VARCHAR(2048) NOT NULL DEFAULT '',
  `origin_price` INT unsigned NOT NULL DEFAULT 0,
  `discount_price` INT unsigned NOT NULL DEFAULT 0,
  `freight_type` tinyint NOT NULL DEFAULT 1,
  `freight_limit` INT unsigned NOT NULL DEFAULT 0,
  `is_optimization` tinyint NOT NULL DEFAULT 0,
  `is_hot` tinyint NOT NULL DEFAULT 0,
  `is_week_popular` tinyint NOT NULL DEFAULT 0,
  `category_id` INT NOT NULL DEFAULT 0,
  `dress_id` INT NOT NULL DEFAULT 0,
  `popular_category_id` INT NOT NULL DEFAULT 0,
  `stock` INT NOT NULL DEFAULT 0,
  `sell_num` INT NOT NULL DEFAULT 0,
  `ctime` INT unsigned NOT NULL DEFAULT 0,
  `remark` VARCHAR(64) NOT NULL DEFAULT '',
  PRIMARY KEY(`product_id`),
  FOREIGN KEY(`category_id`) REFERENCES hb_product_category(`category_id`) on DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;