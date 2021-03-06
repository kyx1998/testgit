/*
  留言回复表
*/
CREATE TABLE `reply_msg`
(
  `reply_id` INT NOT NULL auto_increment,
  `reply_content` VARCHAR (2048) NOT NULL DEFAULT '',
  `reply_img` VARCHAR (2048) NOT NULL DEFAULT '',
  `prefer` INT NOT NULL DEFAULT 0,
  `ctime` INT NOT NULL DEFAULT 0,
  `msg_id` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`reply_id`),
  FOREIGN KEY (`msg_id`) REFERENCES msg_board(`msg_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;