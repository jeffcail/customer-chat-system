# ************************************************************
# Sequel Ace SQL dump
# 版本号： 20016
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# 主机: 127.0.0.1 (MySQL 5.7.36)
# 数据库: chat
# 生成时间: 2021-01-18 16:24:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# 转储表 chat_communication
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_communication`;

CREATE TABLE `chat_communication` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `fromid` int(5) NOT NULL,
  `fromname` varchar(50) NOT NULL,
  `toid` int(5) NOT NULL,
  `toname` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL,
  `isread` tinyint(2) DEFAULT '0',
  `type` tinyint(2) DEFAULT '1' COMMENT '1是普通文本，2是图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

LOCK TABLES `chat_communication` WRITE;
/*!40000 ALTER TABLE `chat_communication` DISABLE KEYS */;

INSERT INTO `chat_communication` (`id`, `fromid`, `fromname`, `toid`, `toname`, `content`, `time`, `isread`, `type`)
VALUES
	(1,85,'Love violet life',87,'大金','你好呀87',1639967979,1,1),
	(2,87,'大金',85,'Love violet life','你也好呀85',1639967985,1,1),
	(3,89,'雨薇',87,'大金','你好呀87，我是89',1639967994,1,1),
	(4,85,'Love violet life',87,'大金','你好87',1640056478,0,1),
	(5,85,'Love violet life',87,'大金','你好87 测试',1640056536,1,1),
	(6,85,'Love violet life',87,'大金','你好啊87 测试2',1640056548,1,1),
	(7,87,'大金',85,'Love violet life','你也好啊 85 测试1',1640056558,1,1),
	(8,85,'Love violet life',87,'大金','87我头像变了吗',1640057163,1,1),
	(9,87,'大金',85,'Love violet life','变了，你看我的变了吗',1640057176,1,1),
	(10,85,'Love violet life',87,'大金','ni zai xian ma ',1640064138,0,1),
	(11,85,'Love violet life',87,'大金','最新消息，是在最下面吗',1640064328,1,1),
	(12,85,'Love violet life',87,'大金','chat_img_61c16a6abc632.jpeg',1640065642,0,2),
	(13,85,'Love violet life',87,'大金','chat_img_61c16adbe1da5.png',1640065755,0,2),
	(14,85,'Love violet life',87,'大金','chat_img_61c16b2aeb100.jpeg',1640065835,0,2),
	(15,85,'Love violet life',87,'大金','chat_img_61c16ba3680b3.png',1640065955,0,2),
	(16,85,'Love violet life',87,'大金','chat_img_61c20488b14c2.jpeg',1640105096,0,2),
	(17,85,'Love violet life',87,'大金','chat_img_61c205085453e.jpeg',1640105224,0,2),
	(18,85,'Love violet life',87,'大金','chat_img_61c205be96589.png',1640105406,0,2),
	(19,85,'Love violet life',87,'大金','chat_img_61c206bf51eaa.png',1640105663,0,2),
	(20,85,'Love violet life',87,'大金','chat_img_61c208e1b9795.png',1640106209,0,2),
	(21,85,'Love violet life',87,'大金','你哈',1640106989,1,1),
	(22,87,'大金',85,'Love violet life','你个瓜皮',1640106998,1,1),
	(23,85,'Love violet life',87,'大金','chat_img_61c20c0212f7b.jpeg',1640107010,0,2),
	(24,87,'大金',85,'Love violet life','chat_img_61c20c1d0a7da.png',1640107037,0,2),
	(25,87,'大金',85,'Love violet life','chat_img_61c20c489576d.png',1640107080,0,2),
	(26,85,'Love violet life',87,'大金','chat_img_61c20c5166d4f.jpeg',1640107089,0,2),
	(27,85,'Love violet life',87,'大金','[em_20]',1640107708,1,1),
	(28,85,'Love violet life',87,'大金','[em_35]',1640107830,1,1),
	(29,85,'Love violet life',87,'大金','[em_6]',1640107865,1,1),
	(30,85,'Love violet life',87,'大金','哈哈哈哈哈[em_27]',1640107890,1,1),
	(31,87,'大金',85,'Love violet life','[em_8]',1640107989,1,1),
	(32,85,'Love violet life',87,'大金','又一条',1640111294,1,1),
	(33,85,'Love violet life',87,'大金','跟新了吗',1640112172,1,1),
	(34,85,'Love violet life',87,'大金','跟新了吗2',1640112187,1,1),
	(35,87,'大金',85,'Love violet life','我给你发',1640112201,1,1),
	(36,85,'Love violet life',87,'大金','再试试',1640112232,1,1),
	(37,85,'Love violet life',87,'大金','哈哈哈',1640112321,1,1),
	(38,85,'Love violet life',87,'大金','大宝天天见',1642522224,1,1),
	(39,85,'Love violet life',87,'大金','chat_img_61e6e748748af.png',1642522440,0,2),
	(40,87,'大金',85,'Love violet life','[em_63]',1642522454,1,1),
	(41,87,'大金',89,'雨薇','抽烟吗',1642522479,1,1),
	(42,87,'大金',89,'雨薇','抽烟吗',1642522479,1,1),
	(43,89,'雨薇',87,'大金','？',1642522931,1,1),
	(44,85,'Love violet life',87,'大金','你很棒～',1642522953,1,1),
	(45,85,'Love violet life',87,'大金','加油鸭～',1642522976,1,1);

/*!40000 ALTER TABLE `chat_communication` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 chat_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_user`;

CREATE TABLE `chat_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `nickname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '昵称',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `mobile` varchar(15) DEFAULT NULL COMMENT '手机号',
  `password` varchar(64) DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COMMENT='公众号粉丝表';

LOCK TABLES `chat_user` WRITE;
/*!40000 ALTER TABLE `chat_user` DISABLE KEYS */;

INSERT INTO `chat_user` (`id`, `nickname`, `headimgurl`, `sex`, `mobile`, `password`)
VALUES
	(85,'Love violet life','http://chat.com/static/newcj/img/555.jpg',1,NULL,NULL),
	(86,'大美如斯','http://chat.com/static/newcj/img/444.jpg',2,NULL,NULL),
	(87,'大金','http://chat.com/static/newcj/img/333.jpg',1,NULL,NULL),
	(88,'悦悦','http://chat.com/static/newcj/img/222.jpg',2,NULL,NULL),
	(89,'雨薇','http://chat.com/static/newcj/img/111.jpg',2,NULL,NULL);

/*!40000 ALTER TABLE `chat_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
