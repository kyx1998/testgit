CREATE TABLE `book`(
  `book_id` INT unsigned NOT NULL auto_increment,
  `book_name` VARCHAR(32) NOT NULL DEFAULT '',
  `book_link` VARCHAR(1024) NOT NULL DEFAULT '',
  `book_img` VARCHAR(1024) NOT NULL DEFAULT '',
  `book_content` VARCHAR(2048) NOT NULL DEFAULT '',
  `top_class_id` INT unsigned NOT NULL DEFAULT 0,
  `class_id` INT unsigned NOT NULL DEFAULT 0,
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `status` tinyint NOT NULL DEFAULT 0,
  `click` INT NOT NULL DEFAULT 0,
  `save` INT NOT NULL DEFAULT 0,
  `upload` INT NOT NULL DEFAULT 0,
  `ctime` INT NOT NULL DEFAULT 0,
  PRIMARY KEY(`book_id`)
)engine=innodb DEFAULT charset=utf8;