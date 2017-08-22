/*
      用户留言表
      存放用户留言
*/
CREATE TABLE `msg_board`
(
  `msg_id` INT NOT NULL auto_increment,
  `title` VARCHAR (32) NOT NULL DEFAULT '',
  `msg_img` VARCHAR (2048) NOT NULL DEFAULT '',
  `msg_content` VARCHAR(2048) NOT NULL DEFAULT '',
  `ctime` INT NOT NULL DEFAULT 0,
  `read` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`msg_id`)
)engine=innodb DEFAULT charset=utf8;