CREATE TABLE `bookcase`(
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `book_id` INT unsigned NOT NULL DEFAULT 0,
  FOREIGN KEY(`user_id`) REFERENCES users(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY(`book_id`) REFERENCES book(`book_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;