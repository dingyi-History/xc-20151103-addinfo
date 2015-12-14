# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 121.42.198.195 (MySQL 5.5.44-0ubuntu0.14.04.1)
# Database: xiciaddinfo
# Generation Time: 2015-11-09 06:27:30 +0000
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
	(1,'总经理','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,'部门1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'部门2','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
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
	('2015_11_07_171842_create_departments_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_access_token_scopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_access_token_scopes`;

CREATE TABLE `oauth_access_token_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_token_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_access_token_scopes_access_token_id_index` (`access_token_id`),
  KEY `oauth_access_token_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_access_token_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_access_token_scopes_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_access_tokens_id_session_id_unique` (`id`,`session_id`),
  KEY `oauth_access_tokens_session_id_index` (`session_id`),
  CONSTRAINT `oauth_access_tokens_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_auth_code_scopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_auth_code_scopes`;

CREATE TABLE `oauth_auth_code_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_code_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_auth_code_scopes_auth_code_id_index` (`auth_code_id`),
  KEY `oauth_auth_code_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_auth_code_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_auth_code_scopes_auth_code_id_foreign` FOREIGN KEY (`auth_code_id`) REFERENCES `oauth_auth_codes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_auth_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_session_id_index` (`session_id`),
  CONSTRAINT `oauth_auth_codes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_client_endpoints
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_client_endpoints`;

CREATE TABLE `oauth_client_endpoints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_client_endpoints_client_id_redirect_uri_unique` (`client_id`,`redirect_uri`),
  CONSTRAINT `oauth_client_endpoints_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_client_grants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_client_grants`;

CREATE TABLE `oauth_client_grants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `grant_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_client_grants_client_id_index` (`client_id`),
  KEY `oauth_client_grants_grant_id_index` (`grant_id`),
  CONSTRAINT `oauth_client_grants_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `oauth_client_grants_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_client_scopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_client_scopes`;

CREATE TABLE `oauth_client_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_client_scopes_client_id_index` (`client_id`),
  KEY `oauth_client_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_client_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_client_scopes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_clients_id_secret_unique` (`id`,`secret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;

INSERT INTO `oauth_clients` (`id`, `secret`, `name`, `created_at`, `updated_at`)
VALUES
	('6vshjmS5Gk1R5LJGJ6AyJ96cWSQvi4PLEITWPH','IvoZ7600Vz','rerum','2015-11-06 07:01:56','2015-11-06 07:01:56'),
	('7CqXIaIKcy09hrqwoS2iC73NRIowKYou22Qk20','AZQ0r2lZNV','cupiditate','2015-11-06 07:01:30','2015-11-06 07:01:30'),
	('d0FaXJpQWMvtKiIU8B8LTZNmgWzyEasZ9jNWIj','Xd92cYodzu','sequi','2015-11-06 07:02:02','2015-11-06 07:02:02'),
	('O9hdOFxucHuICdTOH82rPzBOFkd5ngppvfKd4x','9lOAtEUYRA','ea','2015-11-06 07:01:24','2015-11-06 07:01:24'),
	('TJaLkPMukIGp7a6QblNtGuZuv6vKuUYD6VO19n','w7O19N3wA7','non','2015-11-06 07:01:58','2015-11-06 07:01:58'),
	('ubkwRsphMyTPWoDXjWkFdfZaJ5vwJ3tNRsRfJT','ofeFiWrKXf','est','2015-11-06 07:02:00','2015-11-06 07:02:00');

/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_grant_scopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_grant_scopes`;

CREATE TABLE `oauth_grant_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grant_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_grant_scopes_grant_id_index` (`grant_id`),
  KEY `oauth_grant_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_grant_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_grant_scopes_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_grants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_grants`;

CREATE TABLE `oauth_grants` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_refresh_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`access_token_id`),
  UNIQUE KEY `oauth_refresh_tokens_id_unique` (`id`),
  CONSTRAINT `oauth_refresh_tokens_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_scopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_scopes`;

CREATE TABLE `oauth_scopes` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_session_scopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_session_scopes`;

CREATE TABLE `oauth_session_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_session_scopes_session_id_index` (`session_id`),
  KEY `oauth_session_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_session_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_session_scopes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table oauth_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_sessions`;

CREATE TABLE `oauth_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `owner_type` enum('client','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `owner_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_redirect_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_sessions_client_id_owner_type_owner_id_index` (`client_id`,`owner_type`,`owner_id`),
  CONSTRAINT `oauth_sessions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



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



# Dump of table userinfos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userinfos`;

CREATE TABLE `userinfos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `identity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `relationship_status` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `sex_orietation` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `income_level` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `blood_type` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `residence` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hometown` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `qq` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `weibo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `weixin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `screen_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `addman_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `addman_id` (`addman_id`),
  CONSTRAINT `addman_id` FOREIGN KEY (`addman_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `userinfos` WRITE;
/*!40000 ALTER TABLE `userinfos` DISABLE KEYS */;

INSERT INTO `userinfos` (`id`, `phone`, `name`, `email`, `identity`, `sex`, `relationship_status`, `sex_orietation`, `income_level`, `blood_type`, `birthday`, `residence`, `hometown`, `degree`, `school`, `major`, `profession`, `qq`, `weibo`, `weixin`, `source`, `user_id`, `screen_name`, `address`, `created_at`, `updated_at`, `addman_id`)
VALUES
	(1,'11111111111','12312','123123','123123','女','123123','12312','12312','1321','0000-00-00','123123','123123','123123','123123','13123','13123','1321','12312','13123','12312','13212','1312','123123','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
	(3,'kjafnd`','asmklfk','ands@afkj','andf','男','未知','未知','未知','未知','2013-11-21','csjalkvn','anskjfn','adnkmvn','anfmnad','anmn','nadkj','dkjnvk','fank','fdnkaj','afknjd','knfadkj','akjdnfasnf','kdfnak','2015-11-04 03:51:16','2015-11-04 03:51:16',1),
	(8,'22222222222','asjdlkas','2123@q.com','2312984y23i4y1iu32','女','恋爱','女性','低收入','A','2015-11-22','akjf','slkgaj','lakf','ssdlagn','dsglk','fdkl','33333333','fejklf','lkemg','dmgv','dlnkfg','agdlknm','smgkl','2015-11-04 11:30:52','2015-11-04 11:30:52',1),
	(9,'33333333333','nsajsafk','123@qq.com','33127864832','男','已婚','女性','低收入','B','2015-02-11','kahfkjna','sdlkng','ds,mng','dsnkl','dskjagh','vdsakjgn','12312312312','kjvsnda','aiodfjl','addsng','adn','dasgn','and','2015-11-04 11:34:12','2015-11-04 11:34:12',5),
	(10,'32333333333','nsajsafk','123@qq.com','33127864832','男','已婚','女性','低收入','B','2015-02-11','kahfkjna','sdlkng','ds,mng','dsnkl','dskjagh','vdsakjgn','12312312312','kjvsnda','aiodfjl','addsng','adn','dasgn','and','2015-11-04 11:34:12','2015-11-04 11:34:12',5),
	(11,'32333433333','nsajsafk','123@qq.com','33127864832','男','已婚','女性','低收入','B','2015-02-11','kahfkjna','sdlkng','ds,mng','dsnkl','dskjagh','vdsakjgn','12312312312','kjvsnda','aiodfjl','addsng','adn','dasgn','and','2015-11-04 11:34:12','2015-11-04 11:34:12',5),
	(12,'32333553333','nsajsafk','123@qq.com','33127864832','男','已婚','女性','低收入','B','2015-02-11','kahfkjna','sdlkng','ds,mng','dsnkl','dskjagh','vdsakjgn','12312312312','kjvsnda','aiodfjl','addsng','adn','dasgn','and','2015-11-04 11:34:12','2015-11-04 11:34:12',5),
	(13,'32333553332','nsajsafk','123@qq.com','33127864832','男','已婚','女性','低收入','B','2015-02-11','kahfkjna','sdlkng','ds,mng','dsnkl','dskjagh','vdsakjgn','12312312312','kjvsnda','aiodfjl','addsng','adn','dasgn','and','2015-11-04 11:34:12','2015-11-04 11:34:12',5),
	(14,'32333666331','nsajsafk','123@qq.com','33127864832','男','订婚','双性','中等收入','A','2015-11-09','kahfkjna','sdlkng','ds,mng','dsnkl','dskjagh','vdsakjgn','12312312312','kjvsnda','aiodfjl','addsng','adn','dasgn','and','2015-11-04 11:34:12','2015-11-09 06:15:22',5),
	(15,'12131231222','kslajd','31238@xici.com','3487213985471385','男','恋爱','女性','中等收入','B','2012-11-11','dafkj','dkajsf','djkafn','fdkjn','fdkj','dnkfj','12312312311','ascjnas','dkfn','dangjk','adnsjkg','nkjasfg','sdagkjn','2015-11-05 08:38:52','2015-11-05 08:38:52',5),
	(17,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(18,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(19,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(20,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(21,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(22,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(23,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(24,'87382413212','111','312837@wqie.com','12398124893215','女','单身','未知','低收入','未知','2015-11-06','ajfkl','kdfj','dkjaf','sadnfk','adfk','dsskajfn','21837182','afkdfj','jdafh','jkfah','adgkjh','adkgh','lkghsfkgh','2015-11-05 08:59:50','2015-11-06 01:31:38',5),
	(26,'33445566771','223','222@qwe.com','12312432150849','男','1','1','1','1','2015-11-09','撒酒疯','硕大的','爱疯','大佛','的撒即可','撒开发','2131232123','fakjff','qjfkal','fkl','klfjda','fjdak','flka','0000-00-00 00:00:00','2015-11-09 02:08:08',5),
	(27,'33445566771','223','222@qwe.com','12312432150849','男','1','1','1','1','2015-11-09','撒酒疯','硕大的','爱疯','大佛','的撒即可','撒开发','2131232123','fakjff','qjfkal','fkl','klfjda','fjdak','flka','0000-00-00 00:00:00','2015-11-09 02:08:08',5),
	(28,'33445566771','223','222@qwe.com','12312432150849','男','1','1','1','1','2015-11-09','撒酒疯','硕大的','爱疯','大佛','的撒即可','撒开发','2131232123','fakjff','qjfkal','fkl','klfjda','fjdak','flka','0000-00-00 00:00:00','2015-11-09 02:08:08',5),
	(29,'33445566771','223','222@qwe.com','12312432150849','男','1','1','1','1','2015-11-09','撒酒疯','硕大的','爱疯','大佛','的撒即可','撒开发','2131232123','fakjff','qjfkal','fkl','klfjda','fjdak','flka','0000-00-00 00:00:00','2015-11-09 02:08:08',5),
	(30,'12938129109','jfaddlkd','12893@q113.com','1293812910911111','男','已婚','男性','中等收入','O','2015-11-09','akdjhfdksj','dsjkgh','daskljgh','djsgkl','sgjk','sagjkngl','1932878912','akdjsghl','gsnlkfgn','lgsjf','jlgks','jglk','fslgj','2015-11-09 06:25:25','2015-11-09 06:25:25',5);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `authority`, `realname`, `dep_id`)
VALUES
	(1,'315129552@qq.com','123456','kjdafadfnlkdafn','0000-00-00 00:00:00','0000-00-00 00:00:00',3,'姓名',1),
	(2,'jaslkfj','jkasfn','asfjk','0000-00-00 00:00:00','0000-00-00 00:00:00',3,'姓名',2),
	(3,'121@qq.com','$2y$10$OvsQsf0u0coK4q58lWink.R2vmQw7AT7wdw9iZg.H51REdJd2vs.2','hgpxQ1FDuL6Wn5kIV1eGiYxiKdUAtGbmlo9sIDu7QrI8FIWlX0HUfdGhr2LE','2015-11-04 10:07:43','2015-11-04 10:09:15',3,'姓名',2),
	(4,'222@q.com','$2y$10$Z7Qajgw9syydDMgizpcn6en1fX.hDMtTFkw0ZoK.7lPH6klpVc8Lu','MQwzAYRAipJQVsFUYn7DZrDXMKAb3gUfnZ7KQMYW9MJ5ZHrnvy5nSNkrlLP7','2015-11-04 10:10:00','2015-11-04 10:10:15',3,'姓名',3),
	(5,'aa@qq.com','$2y$10$AJYpk28o5oACN3DASQqyZO.yr6kf1ycQyqHEK.m90wWl1LL/159F6','777XDd12SaNzUcRu7amJl9L0nF818OXhdpDuJzmWk0H4kE1fIc5S5ZhJewAp','2015-11-04 10:10:40','2015-11-07 18:10:48',1,'姓名1',1),
	(6,'a@xici.net','111111','xajdskjfsfafkjdnfsdn','0000-00-00 00:00:00','0000-00-00 00:00:00',3,'姓名3',2),
	(7,'b@xici.net','111111','sfhajkhkajfh','0000-00-00 00:00:00','0000-00-00 00:00:00',2,'姓名2',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
