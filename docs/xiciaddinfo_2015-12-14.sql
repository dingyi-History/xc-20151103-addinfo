# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.27)
# Database: xiciaddinfo
# Generation Time: 2015-12-14 03:13:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table departments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;

INSERT INTO `departments` (`id`, `dep_name`, `created_at`, `updated_at`)
VALUES
	(1,'部门0','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,'部门1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'部门2','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dolists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dolists`;

CREATE TABLE `dolists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `docontent` text COLLATE utf8_unicode_ci NOT NULL,
  `dotime` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `addman_id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `dolists` WRITE;
/*!40000 ALTER TABLE `dolists` DISABLE KEYS */;

INSERT INTO `dolists` (`id`, `docontent`, `dotime`, `created_at`, `updated_at`, `addman_id`, `info_id`)
VALUES
	(15,'我是一条记录','2015-12-18 00:00:00','2015-12-11 09:34:35','2015-12-11 09:34:35',21,46),
	(16,'填上一些内容','2015-12-12 00:00:00','2015-12-11 16:32:01','2015-12-11 16:32:01',21,49),
	(20,'添加记录','2015-12-09 00:00:00','2015-12-11 17:03:58','2015-12-11 17:03:58',21,46),
	(21,'添加一些记录','2015-12-10 00:00:00','2015-12-11 17:16:09','2015-12-11 17:16:09',21,49),
	(22,'添加一些记录','2015-12-09 00:00:00','2015-12-11 17:16:26','2015-12-11 17:16:26',21,53),
	(23,'添加一些记录','2015-12-02 00:00:00','2015-12-11 17:16:44','2015-12-11 17:16:44',21,52),
	(24,'加一点记录','2015-12-01 00:00:00','2015-12-11 17:18:56','2015-12-11 17:18:56',21,50),
	(25,'记录一些内容','2015-12-03 00:00:00','2015-12-14 10:24:22','2015-12-14 10:24:22',21,54),
	(26,'记录一些内容','2015-12-17 00:00:00','2015-12-14 10:27:41','2015-12-14 10:27:41',21,54);

/*!40000 ALTER TABLE `dolists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table info_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `info_tag`;

CREATE TABLE `info_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userinfo_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `info_tage_info_id_index` (`userinfo_id`),
  KEY `info_tage_tag_id_index` (`tag_id`),
  CONSTRAINT `info_tage_info_id_foreign` FOREIGN KEY (`userinfo_id`) REFERENCES `userinfos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `info_tage_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `info_tag` WRITE;
/*!40000 ALTER TABLE `info_tag` DISABLE KEYS */;

INSERT INTO `info_tag` (`id`, `userinfo_id`, `tag_id`, `created_at`, `updated_at`)
VALUES
	(42,49,10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(43,49,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(44,49,25,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(45,49,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(46,49,29,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(47,49,28,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(48,46,19,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(49,46,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(50,46,29,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(51,50,10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(52,50,24,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(53,50,25,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(54,50,32,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `info_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2015_11_03_014507_create_userinfos_table',1),
	('2014_04_24_110151_create_oauth_scopes_table',2),
	('2014_04_24_110304_create_oauth_grants_table',2),
	('2014_04_24_110403_create_oauth_grant_scopes_table',2),
	('2014_04_24_110459_create_oauth_clients_table',2),
	('2014_04_24_110557_create_oauth_client_endpoints_table',2),
	('2014_04_24_110705_create_oauth_client_scopes_table',2),
	('2014_04_24_110817_create_oauth_client_grants_table',2),
	('2014_04_24_111002_create_oauth_sessions_table',2),
	('2014_04_24_111109_create_oauth_session_scopes_table',2),
	('2014_04_24_111254_create_oauth_auth_codes_table',2),
	('2014_04_24_111403_create_oauth_auth_code_scopes_table',2),
	('2014_04_24_111518_create_oauth_access_tokens_table',2),
	('2014_04_24_111657_create_oauth_access_token_scopes_table',2),
	('2014_04_24_111810_create_oauth_refresh_tokens_table',2),
	('2015_11_07_171842_create_departments_table',3),
	('2015_11_26_081933_create_dolists_table',4),
	('2015_12_02_123809_create_tags_table',5),
	('2015_12_02_123954_create_info_tag_table',5);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'男','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,'女','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'未婚','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(9,'南京','2015-12-03 10:21:36','2015-12-03 10:21:36'),
	(10,'北京','2015-12-03 10:24:52','2015-12-03 10:24:52'),
	(12,'苏州','2015-12-03 10:25:57','2015-12-03 10:25:57'),
	(13,'上海','2015-12-03 10:30:56','2015-12-03 10:30:56'),
	(14,'镇江','2015-12-03 10:32:46','2015-12-03 10:32:46'),
	(15,'杭州','2015-12-03 10:37:09','2015-12-03 10:37:09'),
	(16,'扬州','2015-12-03 10:37:09','2015-12-03 10:37:09'),
	(17,'宁波','2015-12-03 10:42:36','2015-12-03 10:42:36'),
	(18,'常州','2015-12-03 12:24:51','2015-12-03 12:24:51'),
	(19,'天津','2015-12-03 12:27:24','2015-12-03 12:27:24'),
	(20,'西安','2015-12-03 12:29:10','2015-12-03 12:29:10'),
	(21,'拉萨','2015-12-03 12:29:19','2015-12-03 12:29:19'),
	(23,'大连','2015-12-03 12:41:25','2015-12-03 12:41:25'),
	(24,'广州','2015-12-03 12:41:37','2015-12-03 12:41:37'),
	(25,'深圳','2015-12-03 12:41:40','2015-12-03 12:41:40'),
	(26,'美国','2015-12-11 14:25:16','2015-12-11 14:25:16'),
	(28,'软件工程','2015-12-11 14:40:20','2015-12-11 14:40:20'),
	(29,'程序员','2015-12-11 14:40:43','2015-12-11 14:40:43'),
	(30,'本科','2015-12-11 14:41:15','2015-12-11 14:41:15'),
	(31,'西津渡','2015-12-11 16:03:30','2015-12-11 16:03:30'),
	(32,'大专','2015-12-11 17:19:34','2015-12-11 17:19:34');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userinfos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userinfos`;

CREATE TABLE `userinfos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `identity` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sex` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `relationship_status` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `sex_orietation` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `income_level` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `blood_type` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `residence` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `hometown` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `degree` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `school` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `major` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `profession` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `qq` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `weibo` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `weixin` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `source` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `user_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `screen_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT '无',
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT '无',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `addman_id` int(11) unsigned NOT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `identity` (`identity`),
  KEY `addman_id` (`addman_id`),
  CONSTRAINT `addman_id` FOREIGN KEY (`addman_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `userinfos` WRITE;
/*!40000 ALTER TABLE `userinfos` DISABLE KEYS */;

INSERT INTO `userinfos` (`id`, `phone`, `name`, `email`, `identity`, `sex`, `relationship_status`, `sex_orietation`, `income_level`, `blood_type`, `birthday`, `residence`, `hometown`, `degree`, `school`, `major`, `profession`, `qq`, `weibo`, `weixin`, `source`, `user_id`, `screen_name`, `address`, `created_at`, `updated_at`, `addman_id`, `remark`)
VALUES
	(46,'12839123812','李四','3187381273@qq.com','182391823912903','男','已婚','女性','低收入','未知','2015-12-07','天津','北京','大专','xx学校','计算机','程序员','3187381273','3187381273','3187381273','网络','3187381273','3187381273','天津','2015-12-07 17:23:03','2015-12-11 17:03:41',21,''),
	(49,'1818918918','张三','311321312@qq.com','3201321921312312','男','订婚','女性','高收入','AB','1991-10-31','南京','北京','本科','北京大学','软件工程','程序员','311321312','311321312','311321312','网络','311321312','311321312','南京玄武区','2015-12-11 15:01:03','2015-12-11 16:31:25',21,''),
	(50,'12839112312','李四','3187381273@qq.com','1823913121912903','男','已婚','女性','低收入','未知','2015-12-07','天津','北京','大专','xx学校','计算机','程序员','3187381273','3187381273','3187381273','网络','3187381273','3187381273','天津','2015-12-07 17:23:03','2015-12-11 17:19:42',21,''),
	(51,'1812342312','李四','3187381273@qq.com','18245145141912903','男','已婚','女性','低收入','未知','2015-12-07','天津','北京','大专','xx学校','计算机','程序员','3187381273','3187381273','3187381273','网络','3187381273','3187381273','天津','2015-12-07 17:23:03','2015-12-11 17:03:41',21,''),
	(52,'18234423412','李四','3187381273@qq.com','18231421342303','男','已婚','女性','低收入','未知','2015-12-07','天津','北京','大专','xx学校','计算机','程序员','3187381273','3187381273','3187381273','网络','3187381273','3187381273','天津','2015-12-07 17:23:03','2015-12-11 17:03:41',21,''),
	(53,'18221343412','李四','3187381273@qq.com','182323423303','男','已婚','女性','低收入','未知','2015-12-07','天津','北京','大专','xx学校','计算机','程序员','3187381273','3187381273','3187381273','网络','3187381273','3187381273','天津','2015-12-07 17:23:03','2015-12-11 17:03:41',21,''),
	(54,'18243214212','李四','3187381273@qq.com','182234242112303','男','已婚','女性','低收入','未知','2015-12-07','天津','北京','大专','xx学校','计算机','程序员','3187381273','3187381273','3187381273','网络','3187381273','3187381273','天津','2015-12-07 17:23:03','2015-12-11 17:03:41',21,'');

/*!40000 ALTER TABLE `userinfos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `authority` int(1) unsigned NOT NULL DEFAULT '3',
  `realname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dep_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `dep_id` (`dep_id`),
  CONSTRAINT `dep_id` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `authority`, `realname`, `dep_id`)
VALUES
	(21,'1@1.com','$2y$10$isaq7PIRtD1Sn5K/EBtO3eRme0bpesX4eLSJbVGlaQlUsna18.MLm','70dZKYzzOHFazEwFe4bhZmYVq4Rv3RmIEt0q2cxxQYsipsdJsuWXy9028LmH','2015-11-11 07:48:45','2015-12-11 17:30:31',1,'系统管理员',2),
	(22,'2@2.com','$2y$10$/M2BlgAPolY5h6gZ7PTBAegyhlpRB5K.HoIh687PD8V.Wj1tkG4Ku','l0u77PWNuPRyyfCVMpVBIgc7mRU0GsVhPJU7vA0EZEjFIgaFd0jigD1JWsBj','2015-11-11 07:49:03','2015-11-12 05:30:36',2,'部门管理员',2),
	(23,'3@3.com','$2y$10$IWlpRRCrVGtE0nuGnRjWTO5HS030NZ5O/dVNchtNrrzRCldVhRXBS','KVkONGk4y5BM8qLe4IkQCrbCVPmx5CE9qfMsJoEEJmZxs48SytOVwRjC3Xtn','2015-11-11 07:49:25','2015-11-11 09:54:55',3,'3',3),
	(24,'11@11.com','$2y$10$k3Pdkf0atD3hSSuUrjd./uP/Kw0lhVSxwnLWvpzwaBJyhIdzQl4ge',NULL,'2015-12-14 10:57:12','2015-12-14 10:57:12',2,'左丘',1),
	(25,'22@22.com','$2y$10$IoE.yPhqTkzXEBuMySA8JupR0iACgZiL1OkWZYSO25WgqxwolzN66',NULL,'2015-12-14 10:58:00','2015-12-14 10:58:00',3,'右行',2);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
