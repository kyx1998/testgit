CREATE TABLE `edit_recommend`(
  `edit_id` INT NOT NULL auto_increment,
  `book_id` INT unsigned NOT NULL DEFAULT 0,
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY(`edit_id`),
  FOREIGN KEY(`book_id`) REFERENCES book(`book_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;