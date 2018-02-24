/*
  每本书对应的多条评论
*/
CREATE TABLE `book_review`(
  `book_id` INT unsigned NOT NULL DEFAULT 0,
  `msg_id` INT unsigned NOT NULL DEFAULT 0,
  FOREIGN KEY(`book_id`) REFERENCES book(`book_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;