CREATE TABLE `show_imgs`(
  `img_id` INT NOT NULL auto_increment,
  `squence` INT NOT NULL DEFAULT 0,
  `class_id` INT unsigned NOT NULL DEFAULT 0,
  `book_id` INT unsigned NOT NULL DEFAULT 0,
  `show_img` VARCHAR(1024) NOT NULL DEFAULT '',
  PRIMARY KEY(`img_id`)
)engine=innodb DEFAULT charset=utf8;