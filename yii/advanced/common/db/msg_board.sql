CREATE TABLE `msg_board`(
  `msg_id` INT unsigned NOT NULL auto_increment,
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `book_id` INT unsigned NOT NULL DEFAULT 0,
  `content` VARCHAR(2048) NOT NULL DEFAULT '',
  `like` INT NOT NULL DEFAULT 0,
  `ctime` INT NOT NULL DEFAULT 0,
  PRIMARY KEY(`msg_id`),
  FOREIGN KEY(`user_id`) REFERENCES users(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY(`book_id`) REFERENCES book(`book_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;