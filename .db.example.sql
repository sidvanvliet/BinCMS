-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bincms
CREATE DATABASE IF NOT EXISTS `bincms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bincms`;

-- Dumping structure for table bincms.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_filename_unique` (`filename`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bincms.media: ~2 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `item_id`, `filename`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(5, 21, '472b07b9fcf2c2451e8781e944bf5f77cd8457c8.jpg', NULL, '2018-09-18 18:12:50', '2018-09-18 18:12:50'),
	(6, 27, 'bc33ea4e26e5e1af1408321416956113a4658763.jpg', NULL, '2018-11-04 14:19:29', '2018-11-04 14:19:29');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table bincms.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bincms.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_09_16_122747_add_hierarchy_roles', 1),
	(4, '2018_09_16_125303_add_portfolio_items', 2),
	(5, '2018_09_16_140807_portfolio_items_add_views', 3),
	(7, '2018_09_16_151611_portfolio_settings', 4),
	(9, '2018_09_18_144239_add_media', 5),
	(10, '2018_11_02_130016_add_homepage_views', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bincms.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bincms.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table bincms.portfolio
CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_is_public` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_views` bigint(20) NOT NULL DEFAULT '0',
  `homepage_views` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bincms.portfolio: ~26 rows (approximately)
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` (`id`, `item_name`, `item_description`, `item_is_public`, `deleted_at`, `created_at`, `updated_at`, `item_views`, `homepage_views`) VALUES
	(1, 'Lorem ipsum', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2018-09-16 17:05:25', '2018-09-14 15:08:01', '2018-11-04 14:18:42', 0, 1),
	(2, 'My item', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2018-09-16 17:05:25', NULL, '2018-09-16 17:05:25', 0, 0),
	(3, 'Random Post', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, '2018-09-18 17:36:00', NULL, '2018-09-18 17:36:00', 0, 0),
	(4, 'My item', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, '2018-09-18 17:36:06', NULL, '2018-09-18 17:36:06', 568, 0),
	(5, 'Spoon, tea.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 1, '2018-09-18 17:36:09', NULL, '2018-09-18 17:36:09', 0, 0),
	(7, 'Random Post', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, '2018-09-16 17:05:11', NULL, '2018-09-16 17:05:11', 0, 0),
	(8, 'Hello World!', 'Lorem ipsum, my dude!', 1, '2018-09-18 17:36:13', '2018-09-16 16:33:11', '2018-09-18 17:36:13', 0, 0),
	(9, 'Spoon, tea.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, '2018-09-16 17:05:53', NULL, '2018-09-16 17:05:53', 0, 0),
	(10, 'Spoon, tea.', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2018-09-18 17:36:16', NULL, '2018-09-18 17:36:16', 0, 0),
	(11, 'My item', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, '2018-09-16 17:05:55', NULL, '2018-09-16 17:05:55', 0, 0),
	(12, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2018-09-16 17:05:57', NULL, '2018-09-16 17:05:57', 0, 0),
	(13, 'Lorem ipsum', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, '2018-09-18 17:36:18', NULL, '2018-09-18 17:36:18', 0, 0),
	(14, 'My item', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2018-09-18 17:36:20', NULL, '2018-09-18 17:36:20', 0, 0),
	(15, 'gfddfgdf', 'dfggdf', 1, '2018-09-18 17:36:20', '2018-09-18 17:50:40', '2018-09-18 17:50:40', 0, 0),
	(16, 'fdgfddfg', 'dfggdf', 1, '2018-09-18 17:36:20', '2018-09-18 18:00:08', '2018-09-18 18:00:08', 0, 0),
	(17, 'MyTestItem', 'Item!', 1, '2018-09-18 17:36:20', '2018-09-18 18:01:10', '2018-11-04 19:37:50', 0, 7),
	(18, 'Lorem ipsum', 'Hey', 1, '2018-09-18 17:36:20', '2018-09-18 18:02:19', '2018-11-04 19:37:50', 0, 7),
	(19, 'Lorem ipsum', 'Hey', 1, '2018-09-18 17:36:20', '2018-09-18 18:03:13', '2018-11-04 19:37:50', 0, 7),
	(20, 'Lorem test', 'test', 1, NULL, '2018-09-18 18:09:15', '2018-11-04 19:37:50', 0, 7),
	(21, 'Lorem ipsum', 'Lorem ipsum, blabla.', 1, NULL, '2018-09-18 18:12:50', '2018-11-04 19:53:02', 7, 218),
	(22, 'fghfhghgf', 'fghhgf', 1, NULL, '2018-09-18 18:14:02', '2018-11-04 19:53:02', 0, 10),
	(23, 'fghfhghgf', 'fghhgf', 1, NULL, '2018-09-18 18:14:09', '2018-11-04 19:53:02', 0, 6),
	(24, 'fghfhghgf', 'fghhgf', 1, NULL, '2018-09-18 18:14:14', '2018-11-04 19:53:02', 0, 6),
	(25, 'fdggdfdgf', 'dfdfgdfg', 1, NULL, '2018-09-18 18:14:45', '2018-11-04 19:53:02', 0, 6),
	(26, 'Sample post', 'This is my sample post', 1, '2018-09-16 17:05:25', '2018-09-18 18:22:19', '2018-11-04 14:18:42', 0, 109),
	(27, 'Jeremy Heywood: UK\'s former top civil servant dies', 'Sir Jeremy was cabinet secretary from 2012 until 2018 and head of the civil service between 2014 and 2018.\r\n\r\nPM Theresa May said "he worked tirelessly to serve our country" and is a "huge loss to British public life".\r\n\r\nHis wife Suzanne paid tribute to a "wonderful father" who "crammed a huge amount into his 56 years".', 1, NULL, '2018-11-04 14:19:29', '2018-11-04 19:53:02', 27, 80);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;

-- Dumping structure for table bincms.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_setting_unique` (`setting`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bincms.settings: ~8 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `setting`, `value`) VALUES
	(1, 'name', 'Sid\'s Devfolio'),
	(2, 'styling', '.black{\r\n   color:#1f1f1f;\r\n}'),
	(3, 'paginate', '6'),
	(4, 'bgcolour', '#F8FAFC'),
	(5, 'subtitle', 'Hi, this is my portfolio. I showcase some of my recent work here!'),
	(6, 'seo_keywords', 'webdev, developer, netherlands, laravel, php'),
	(7, 'seo_language', 'en'),
	(8, 'seo_description', 'Hi, this is my portfolio. I showcase some of my recent work here!');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table bincms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_is_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bincms.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_is_admin`) VALUES
	(1, 'SX1OAK', 'sv1oak@gmail.com', NULL, '$2y$12$SAZFfFSE4C1ZqYeRtvr2De0I0riveVJnZ/jcFtpIHLAzxIMh07JCC', 'CC44rU3iEN5Ch60IB6Zb7IPjSM46o7FaVApI6GyEu2Bv36jUbGkV0UIUI8aD', '2018-09-16 12:31:56', '2018-09-16 12:31:56', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
