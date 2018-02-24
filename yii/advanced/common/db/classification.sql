CREATE TABLE `classification`(
  `class_id` INT unsigned NOT NULL auto_increment,
  `parent_id` INT NOT NULL DEFAULT -1,
  `class_name` VARCHAR(32) NOT NULL DEFAULT '',
  PRIMARY KEY(`class_id`),
   index(`parent_id`)
)engine=innodb DEFAULT charset=utf8;