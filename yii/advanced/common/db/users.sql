CREATE TABLE `users`(
  `user_id` INT unsigned NOT NULL auto_increment,
  `book_case_id` INT unsigned NOT NULL DEFAULT 0,
  `user_name` VARCHAR(32) NOT NULL DEFAULT '',
  `password` VARCHAR(32) NOT NULL DEFAULT '',
  `gender` tinyint NOT NULL DEFAULT 0,
  `user_img` VARCHAR(1024) NOT NULL DEFAULT '',
  `privilege` tinyint NOT NULL DEFAULT 1,
  PRIMARY KEY(`user_id`)
)engine=innodb DEFAULT charset=utf8;