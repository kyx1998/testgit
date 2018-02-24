CREATE TABLE `check`(
  `check_id` INT unsigned NOT NULL auto_increment,
  `user_name` VARCHAR(32) NOT NULL DEFAULT '',
  `book_name` VARCHAR(32) NOT NULL DEFAULT '',
  `book_link` VARCHAR(1024) NOT NULL DEFAULT '',
  `top_class_id` INT unsigned NOT NULL DEFAULT 0,
  `class_id` INT unsigned NOT NULL DEFAULT 0,
  `book_content` VARCHAR(2048) NOT NULL DEFAULT '',
  `ctime` INT NOT NULL DEFAULT 0,
  PRIMARY KEY(`check_id`)
)engine=innodb DEFAULT charset=utf8;