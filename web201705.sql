﻿# Host: localhost  (Version 5.5.40)
# Date: 2017-08-28 11:58:43
# Generator: MySQL-Front 6.0  (Build 1.57)


#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '@' COMMENT '邮箱',
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin@littleweb','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "e_class"
#

DROP TABLE IF EXISTS `e_class`;
CREATE TABLE `e_class` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "e_class"
#


#
# Structure for table "news"
#

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` blob,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "news"
#

/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (36,'李克强：提升改革开放水平 解决重点民生难题',X'20202020E696B0E58D8EE7A4BEE98391E5B79E35E69C8839E697A5E794B52035E69C8838E697A5E887B339E697A5EFBC8CE4B8ADE585B1E4B8ADE5A4AEE694BFE6B2BBE5B180E5B8B8E5A794E38081E59BBDE58AA1E999A2E680BBE79086E69D8EE5858BE5BCBAE59CA8E6B2B3E58D97E79C81E5A794E4B9A6E8AEB0E8B0A2E4BC8FE79EBBE38081E79C81E995BFE99988E6B6A6E584BFE999AAE5908CE4B88BEFBC8CE59CA8E5BC80E5B081E38081E696B0E4B9A1E38081E98391E5B79EE88083E5AF9FE380820D0A20202020E6B2B3E58D97E887AAE8B4B8E8AF95E9AA8CE58CBAE698AFE59BBDE5AEB6E59CA8E4B8ADE983A8E59CB0E58CBAE8AEBEE7AB8BE79A84E9A696E689B9E887AAE8B4B8E58CBAE38082E69D8EE5858BE5BCBAE69DA5E588B0E5BC80E5B081E78987E58CBAEFBC8CE8B49FE8B4A3E4BABAE4BB8BE7BB8DE8BF99E9878CE4B8BAE69BB4E5A4A7E7A88BE5BAA6E696B9E4BEBFE4BC81E4B89AE58A9EE4BA8BEFBC8CE5AE9EE8A18CE4BA86E2809CE4BA8CE58D81E4BA8CE8AF81E59088E4B880E2809DE694B9E99DA9EFBC8CE8BF87E58EBBE99C80E8A681E88AB13530E5A49AE4B8AAE5B7A5E4BD9CE697A5E38081E58EBBE5A49AE4B8AAE983A8E997A8E38081E8B791E8AEB8E5A49AE6ACA1E58A9EE79086E79A84E4BA8BE9A1B9E78EB0E59CA8E7AE80E58C96E4B8BAE2809CE4B880E7BD91E9809AE58A9EE2809DE38081E695B0E4B8AAE5B7A5E4BD9CE697A5E5AE8CE68890EFBC8CE69D8EE5858BE5BCBAE8A1A8E7A4BAE8B59EE8AEB8E38082E4BB96E4B88EE58A9EE4BA8BE79A84E7BEA4E4BC97E5928CE5898DE69DA5E592A8E8AFA2E5889BE4B89AE79A84E5A4A7E5ADA6E7949FE4BA92E58AA8E4BAA4E6B581EFBC8CE5BE97E79FA5E4B88DE5B091E4BABAE4BB8EE6B2BFE6B5B7E58F91E8BEBEE59CB0E58CBAE7949AE887B3E59BBDE5A496E588B0E8BF99E9878CE68A95E8B584E585B4E4B89AEFBC8CE69D8EE5858BE5BCBAE8AFB4EFBC8CE78EB0E59CA8E5B882E59CBAE7AB9EE4BA89E697A5E8B68BE6BF80E78388EFBC8CE8A681E9809AE8BF87E7AE80E694BFE694BEE69D83E38081E694BEE7AEA1E7BB93E59088E38081E4BC98E58C96E69C8DE58AA1EFBC8CE5A4A7E5B985E9998DE4BD8EE588B6E5BAA6E680A7E4BAA4E69893E68890E69CACEFBC8CE68993E980A0E694B9E99DA9E5BC80E694BEE9AB98E59CB0EFBC8CE8BF99E6A0B7E5B0B1E58FAFE4BBA5E590B8E5BC95E69BB4E5A49AE68A95E8B584E88085EFBC8CE4B99FE4BC9AE69C89E58A9BE6BF80E58F91E585A8E7A4BEE4BC9AE5889BE4B89AE5889BE696B0E783ADE68385E38082E694BFE5BA9CE983A8E997A8E8A681E68A93E7B4A7E695B4E59088E58685E983A8E7AEA1E79086E8818CE883BDEFBC8CE5B0BDE58FAFE883BDE5878FE5B091E5928CE7AE80E58C96E5AFB9E4BC81E4B89AE79A84E5AEA1E689B9E4BA8BE9A1B9EFBC8CE4BDBFE5AEA1E689B9E69BB4E7AE80E38081E79B91E7AEA1E69BB4E5BCBAE38081E69C8DE58AA1E69BB4E4BC98E380820D0A20202020E69D8EE5858BE5BCBAE590ACE58F96E4BA86E5BC80E5B081E5B882E6A39AE688B7E58CBAE5928CE697A7E59F8EE694B9E980A0E68385E586B5E6B187E68AA5E38082E4BB96E69DA5E588B0E5A4A7E585B4E7A4BEE58CBAE5B185E6B091E5AEB6E4B8ADEFBC8CE8BF99E9878CE688BFE5B18BE7A0B4E697A7EFBC8CE586ACE5A4A9E5AF92E586B7EFBC8CE5A48FE5A4A9E6BC8FE99BA8EFBC8CE794B5E7BABFE88081E58C96EFBC8CE69D8EE5858BE5BCBAE58FAEE598B1E5AFB9E8BF99E7B1BBE58DB1E697A7E688BFE8A681E58AA0E5BFABE694B9E980A0E8BF9BE5BAA6E38082E4BB96E8AFB4EFBC8CE58FA4E59F8EE4BFAEE5A48DE698AFE58E86E58FB2E8B4A3E4BBBBEFBC8CE88081E59F8EE58CBAE5B185E4BD8FE78EAFE5A283E694B9E59684E698AFE8BFABE58887E99C80E8A681EFBC8CE4BA8CE88085E4B88DE58FAFE5818FE5BA9FE38082E8A681E5889BE696B0E69CBAE588B6EFBC8CE5819AE5A5BDE7BB9FE7ADB9EFBC8CE697A2E8AEA9E69BB4E5A49AE4BD8FE688BFE59BB0E99ABEE7BEA4E4BC97E5B0BDE5BFABE59C86E4B88AE5AE89E5B185E6A2A6EFBC8CE4B99FE8A681E58887E5AE9EE4BF9DE68AA4E5A5BDE69687E789A9EFBC8CE5AE88E4BD8FE69687E6988EE7A7AFE6B780E79A84E6A0B9E88489E380822020');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
