CREATE TABLE `week_recommend`(
  `week_id` INT NOT NULL auto_increment,
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `book_id` INT unsigned NOT NULL DEFAULT 0,
  `top_class_id` INT unsigned NOT NULL DEFAULT 0,
  `squence` tinyint NOT NULL DEFAULT 0,
  PRIMARY KEY(`week_id`),
  FOREIGN KEY(`book_id`) REFERENCES book(`book_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;