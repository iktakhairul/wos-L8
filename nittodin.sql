-- -------------------------------------------------------------
-- TablePlus 4.6.6(422)
--
-- https://tableplus.com/
--
-- Database: nittodin
-- Generation Time: 2022-05-12 02:22:46.4990
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `babies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inseminationDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodGroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `identical_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `birth_certificate_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_number` bigint(20) NOT NULL,
  `tin_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_license_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `identical_documents_id_index` (`id`),
  KEY `identical_documents_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'local',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_datetime` datetime DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `required_persons` int(11) DEFAULT '1',
  `budget` double(15,2) DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_responses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_category_id` int(11) DEFAULT NULL,
  `job_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `demanded_budget` double(15,2) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_timelines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_post_id` int(11) DEFAULT NULL,
  `job_response_id` int(11) DEFAULT NULL,
  `job_post_user_id` int(11) DEFAULT NULL,
  `job_worker_user_id` int(11) DEFAULT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ratings` double(5,2) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `toUserId` int(11) DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `notificationTypeId` int(11) DEFAULT NULL,
  `fromUserId` int(11) DEFAULT NULL,
  `toUserId` int(11) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `notifications_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `birthCertificate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_postal_code` int(11) DEFAULT NULL,
  `present_latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_score` double(2,2) DEFAULT NULL,
  `referral_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` double(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_id_index` (`id`),
  KEY `profiles_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ratings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_timeline_id` int(11) DEFAULT NULL,
  `job_post_id` int(11) DEFAULT NULL,
  `job_post_user_id` int(11) DEFAULT NULL,
  `job_worker_user_id` int(11) DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ratings` double(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `service_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `domains` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `weight` double DEFAULT '9.99',
  `permissions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_profile_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'incomplete',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_contact_number_unique` (`contact_number`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `job_posts` (`id`, `service_category_id`, `user_id`, `type`, `title`, `description`, `latitude`, `longitude`, `city`, `country`, `address`, `approval_datetime`, `start_datetime`, `end_datetime`, `required_persons`, `budget`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'local', 'Service Electric Line Repair', '<p>I had two flat in khilkhet, one of them had a problem with kitchen light, i need to repair them and want two people.</p>\n\n<ul>\n	<li>Service line from bedroom.</li>\n	<li>Line from main cutout.</li>\n</ul>\n\n<p>Do not apply if you don&#39;t have enougt working experiences.</p>', '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2021-11-18 22:56:00', '2021-11-19 22:56:00', 2, 650.00, 'electrician,service line,repair electric line,electric line mechanic,dhaka', 'active', '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(2, 1, 3, 'local', 'Need a Electrician', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-05-05 17:44:00', '2022-04-29 17:44:00', 4, 5000.00, NULL, 'active', '2022-03-25 05:48:27', NULL),
(3, 1, 3, 'local', 'Electricians need to meet the qualifications', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-03-31 19:12:00', '2022-04-06 19:14:00', 10, 50000.00, 'Commercial Experience,Conducting Systems Tests', 'active', '2022-03-25 07:16:07', NULL),
(4, 1, 6, 'local', 'Electrician Skills', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-12 19:20:00', '2022-04-28 19:21:00', 3, 10000.00, NULL, 'active', '2022-03-25 07:20:09', '2022-03-25 07:21:22'),
(5, 1, 7, 'local', 'Electrician job', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-05 19:27:00', '2022-03-24 19:27:00', 11, 56000.00, 'Cable,Cable Harness Assembly', 'active', '2022-03-25 07:29:03', NULL),
(6, 1, 8, 'local', 'Need a Electrical Installations and Schematics', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-01 19:36:00', '2022-04-13 19:37:00', 14, 45000.00, 'Electrical Installations,Schematics', 'active', '2022-03-25 07:40:25', NULL),
(7, 4, 12, 'local', 'Web Devoloper', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-07 21:37:00', '2022-04-21 21:37:00', 5, 65000.00, 'Font gesign,page gesign', 'active', '2022-03-25 09:40:48', NULL),
(8, 4, 13, 'local', 'Apps devolopment', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-06 22:50:00', '2022-04-21 00:50:00', 6, 65000.00, 'php,java,css', 'complete', '2022-03-25 09:49:11', '2022-03-25 11:10:21'),
(9, 4, 14, 'local', 'Site Devolopment', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-12 21:55:00', '2022-04-26 21:55:00', 6, 100000.00, 'Bootstap,java,css', 'active', '2022-03-25 09:56:31', NULL),
(10, 4, 13, 'local', 'Devolopment', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-12 02:23:00', '2022-04-21 14:34:00', 3, 34000.00, 'Programmer', 'active', '2022-03-25 10:21:43', NULL),
(11, 3, 15, 'local', 'Need Mechanic Expert', '<p>NEED HONEST PERSON WHO WORKS HIS BEST</p>', '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-15 15:16:00', '2022-04-27 15:15:00', 9, 20000.00, 'Problem solving,Detail-oriented', 'active', '2022-03-30 03:19:56', NULL),
(12, 3, 15, 'local', 'Need Mechanic Expert', '<p>NEED HONEST PERSON WHO WORKS HIS BEST</p>', '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-15 15:16:00', '2022-04-27 15:15:00', 9, 20000.00, 'Problem solving,Detail-oriented', 'active', '2022-03-30 03:21:12', NULL),
(13, 3, 16, 'local', 'Problem solving', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-04-11 16:10:00', '2022-04-27 16:10:00', 3, 43000.00, 'Problem solving,Computers,Learning', 'active', '2022-03-30 04:11:36', NULL),
(14, 3, 17, 'local', 'Computers Expert', NULL, '67.92347', '34.24435', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, '2022-03-31 16:17:00', '2022-04-12 16:17:00', 10, 40000.00, 'Computers,Communication', 'active', '2022-03-30 04:17:59', NULL);

INSERT INTO `job_responses` (`id`, `service_category_id`, `job_post_id`, `user_id`, `description`, `demanded_budget`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 6, 'Vi ami ata 75000 er neca korta parbo na', 75000.00, 'active', '2022-03-25 10:25:24', NULL),
(2, 4, 8, 4, 'vi ami 5 yea dora ai kaz kori...', 60000.00, '1.confirm_order', '2022-03-25 10:31:01', '2022-03-25 10:43:38'),
(3, 3, 13, 18, 'I want to work...', 45000.00, 'active', '2022-03-30 07:26:25', NULL),
(4, 3, 13, 17, 'I an expert on this. I have 5 year experience !', 44000.00, '1.confirm_order', '2022-03-30 07:31:50', '2022-03-30 07:37:14'),
(5, 3, 14, 16, 'I want to work..', 440000.00, 'active', '2022-03-30 20:38:34', NULL),
(6, 3, 14, 18, 'I ahave 5 year expriese', 450000.00, '1.confirm_order', '2022-03-30 20:39:29', '2022-03-30 20:40:27');

INSERT INTO `job_timelines` (`id`, `job_post_id`, `job_response_id`, `job_post_user_id`, `job_worker_user_id`, `comments`, `ratings`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 13, 4, 'tik aca vi ......', NULL, '5.complete_from_owner', '2022-03-25 10:43:38', '2022-03-25 11:10:21'),
(2, 13, 4, 16, 17, 'Welcome to join us...', NULL, '5.complete_from_worker', '2022-03-30 07:37:14', '2022-03-30 07:48:48'),
(3, 14, 6, 17, 18, 'welcome to work', NULL, '5.complete_from_worker', '2022-03-30 20:40:27', '2022-03-30 20:41:56');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_19_064553_create_profiles_table', 1),
(6, '2021_10_19_083727_create_identical_documents_table', 1),
(7, '2021_11_01_073303_create_media_table', 1),
(8, '2021_11_08_104240_create_service_categories_table', 1),
(9, '2021_11_08_104300_create_job_posts_table', 1),
(10, '2021_11_08_104317_create_job_responses_table', 1),
(11, '2021_11_08_104328_create_job_timelines_table', 1),
(12, '2021_11_15_131732_create_ratings_table', 1),
(13, '2021_11_24_152301_create_notifications_types_table', 1),
(14, '2021_12_04_064256_create_messages_table', 1),
(15, '2021_12_24_150419_create_notifications_table', 1),
(16, '2022_05_09_192439_create_babies_table', 2);

INSERT INTO `notifications_types` (`id`, `type`, `description`, `createdBy`, `created_at`, `updated_at`) VALUES
(1, 'Found New Job', 'Found a new job post near you.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(2, 'Found New Job', '40+ Jobs are posted near you.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(3, 'Job Post', 'You have a newly created job post.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(4, 'New Proposal', 'Mr. Tom submitted a proposal to your job.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(5, 'Confirmed Proposal', 'Mr. Jerry confirmed your job proposal. Check in my works.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(6, 'Work Inquiry', 'Mr. Tom start working, Please check My Job Timeline.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(7, 'Work Inquiry', 'Mr. Tom done his work, Waiting for your confirmation.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(8, 'Payment', 'Mr. Jerry claimed payment confirmed, Please check and Confirm Payment.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(9, 'Ratings', 'Ratings updated.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(10, 'Complete', 'You successfully complete job process.', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44');

INSERT INTO `profiles` (`id`, `user_id`, `full_name`, `father_name`, `mother_name`, `spouse_name`, `profileImage`, `dob`, `birthCertificate`, `gender`, `religion`, `present_postal_code`, `present_latitude`, `present_longitude`, `present_city`, `present_country`, `present_address`, `profile_score`, `referral_code`, `tags`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 1, 'System Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, NULL, NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(2, 2, 'Asst. System Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, NULL, NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(3, 3, 'John Doe', 'fahad', 'puspita', NULL, NULL, '2001-02-23', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Calibrating Level,Pressure,Temperature,Flow Measuring Systems', 4.30, '2022-03-25 04:20:56', '2022-03-25 05:49:54'),
(4, 4, 'Joram Van', 'fahad', 'swati', NULL, NULL, '2001-02-23', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Commercial Experience,Construction Experience,Conducting 3-Phase Motor Replacement', 4.60, '2022-03-25 07:01:12', '2022-03-25 11:16:15'),
(5, 5, 'Van Horis', 'fahad', 'Anika', NULL, NULL, '1999-03-21', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Conducting Systems Tests,Industrial Control Systems', NULL, '2022-03-25 07:05:02', '2022-03-25 07:08:56'),
(6, 6, 'Cris Morich', 'Md.Helel Uddin', 'Howya Khatul', NULL, NULL, '2003-01-12', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Industrial Control Systems,Industrial Experience', NULL, '2022-03-25 07:16:54', '2022-03-25 07:18:47'),
(7, 7, 'Nyon Jorn', 'imran khan', 'Anika', NULL, 'profile-image-1648214810.jpg', '1980-03-21', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Solar,Troubleshooting', 3.90, '2022-03-25 07:22:20', '2022-03-25 07:29:21'),
(8, 8, 'Alexandra', 'fahad', 'tuba', NULL, NULL, '2001-02-23', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Electrical Installations and Schematics', NULL, '2022-03-25 07:30:22', '2022-03-25 07:40:51'),
(9, 9, 'Chester Bennington', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, NULL, NULL, '2022-03-25 07:41:49', '2022-03-25 07:41:49'),
(10, 10, 'Mike Sadora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, NULL, NULL, '2022-03-25 07:44:20', '2022-03-25 07:44:20'),
(11, 11, 'Koven John', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, NULL, 4.90, '2022-03-25 07:45:33', '2022-03-25 07:45:33'),
(12, 12, 'Akcent Martin', 'fahad', 'swati', NULL, NULL, '1999-02-23', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'css,php,html', 5.00, '2022-03-25 09:34:06', '2022-03-25 09:36:22'),
(13, 13, 'Smith Alen', 'fahad', 'swati', NULL, NULL, '2001-02-23', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'php,java', 4.70, '2022-03-25 09:42:15', '2022-03-25 09:47:19'),
(14, 14, 'Jonson Haris', 'fahhad bin imran', 'puspita', NULL, NULL, '2009-01-23', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Bootstap,java', 4.80, '2022-03-25 09:51:57', '2022-03-25 09:54:30'),
(15, 15, 'Parker Starlin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Organized,Problem solving', 4.60, '2022-03-30 03:12:07', '2022-03-30 03:13:54'),
(16, 16, 'Vladimir Joe', 'Iube', 'Forida', NULL, NULL, '1999-02-23', NULL, 'female', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Administrative skills,Computers', 4.90, '2022-03-30 03:23:35', '2022-03-30 03:59:20'),
(17, 17, 'Fancristine Rock', 'fahad', 'puspita', NULL, NULL, '2003-01-12', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Communication,Detail-oriented', NULL, '2022-03-30 04:13:27', '2022-03-30 04:14:53'),
(18, 18, 'Will Jonson', 'imran khan', 'bristi', NULL, NULL, '1998-04-23', NULL, 'male', NULL, NULL, '56.8465', '232.87', 'NY', 'USA', '4/A, Lane 5, NY, USA', NULL, NULL, 'Administrative skills.,Organized', NULL, '2022-03-30 05:38:26', '2022-03-30 05:42:37');

INSERT INTO `ratings` (`id`, `job_timeline_id`, `job_post_id`, `job_post_user_id`, `job_worker_user_id`, `type`, `comments`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 13, 4, 'job_owner', 'thanks', 6.00, '2022-03-25 11:08:01', NULL),
(2, 1, 8, 13, 4, 'job_worker', 'Thanks.', 4.30, '2022-03-25 11:10:21', NULL),
(3, 2, 13, 16, 17, 'job_owner', 'Thanks .Go ahead', 4.50, '2022-03-30 07:48:48', NULL),
(4, 3, 14, 17, 18, 'job_owner', 'goof to work', 4.60, '2022-03-30 20:41:56', NULL);

INSERT INTO `service_categories` (`id`, `name`, `slug`, `service_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electrician', 'Electrician-563-ED', 'ESC-7869', 1, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(2, 'Plumber', 'Plumber-243-PL', 'ESC-5612', 1, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(3, 'Mechanic', 'Mechanic-894-ME', 'MEC-6534', 1, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(4, 'Programmer', 'FJ-SC-Programmer-123', '123', 1, '2022-03-25 09:14:08', NULL);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `contact_number`, `avatar`, `type`, `domains`, `role`, `weight`, `permissions`, `status`, `password`, `complete_profile_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'System Admin', 'system.admin@mailinator.com', NULL, '987-562-245', NULL, 'system', 'system,developer,admin,dashboard,operator,support,merchant', 'system', 99.99, 'all', 'active', '$2y$10$8iAC8o.Bx9v2C3j.Cb/csOlX3btxnERklWzbkTljSGzpREl2xklr2', 'complete', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(2, 'Asst. System Admin', 'asst.system.admin@mailinator.com', NULL, '987-562-244', NULL, 'system', 'system,developer,admin,dashboard,operator,support,merchant', 'system', 99.99, 'all', 'active', '$2y$10$MhnckKz6Fdrynni8dr0hBuAgVJ2TK6YBxRTnLZgzaAEMipqhrtap6', 'complete', NULL, '2022-03-25 03:15:44', '2022-03-25 03:15:44'),
(3, 'John Doe', 'user1@gmail.com', NULL, '987-562-243', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$k.9Q3.HxSZpsReeE5TlCmufcwXFRBDKtpD66Q6hyQBxANeMLPAMZS', 'present_info_only', NULL, '2022-03-25 04:20:56', '2022-03-25 05:49:54'),
(4, 'Joram Van', 'user2@gmail.com', NULL, '987-562-242', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$K0jXAm8kdruAMnba4aysxu.7AM93.7tiW400UZRU/CjtZOwZWxJOK', 'present_info_only', NULL, '2022-03-25 07:01:12', '2022-03-25 07:03:35'),
(5, 'Van Horis', 'user3@gmail.com', NULL, '987-562-241', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$021rEZyBHmJklm18lFVRmeXvshJp1wzFUi/oCmiC7jqBTllBVAEBW', 'present_info_only', NULL, '2022-03-25 07:05:02', '2022-03-25 07:08:56'),
(6, 'Cris Morich', 'user4@gmail.com', NULL, '987-562-240', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$maWK4MzrM0snJCSDncIu1OJHRD72WPIvCSIUi.BSxbBrpyINDCXDK', 'present_info_only', NULL, '2022-03-25 07:16:54', '2022-03-25 07:18:09'),
(7, 'Nyon Jorn', 'user5@gmail.com', NULL, '987-562-246', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$eCcEi2p/LzWO7S9pdR6mhe8bWf4LO4BxuLQITOiLukSK.0etDhXwy', 'present_info_only', NULL, '2022-03-25 07:22:20', '2022-03-25 07:26:55'),
(8, 'Alexandra', 'user6@gmail.com', NULL, '987-562-247', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$jYbbZYar7uP32RHOgnkF9u9oXONSY2QrRlLAGBjtfKomLN3iAFiR2', 'present_info_only', NULL, '2022-03-25 07:30:22', '2022-03-25 07:31:43'),
(9, 'Chester Bennington', 'user7@gmail', NULL, '987-562-248', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$npgoTz1ImK0KOqeejIkC7uVvlrujNtQ4uCXcJTDlPgx2khzECsNH2', 'incomplete', NULL, '2022-03-25 07:41:49', '2022-03-25 07:41:49'),
(10, 'Mike Sadora', 'user7@gamil.com', NULL, '987-562-249', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$GFC3GOX2dhz2hHGK1fEQx.xqV3Tbzw7X0eXzclhm0TLaAWn3Jgz4C', 'incomplete', NULL, '2022-03-25 07:44:20', '2022-03-25 07:44:20'),
(11, 'Koven John', 'user8@gmail.com', NULL, '987-562-210', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$e.8.sy1i4iR8BdpfQUtldeyMRYX1f4I9wFfECS6y1rGx056/f6YIi', 'incomplete', NULL, '2022-03-25 07:45:33', '2022-03-25 07:45:33'),
(12, 'Akcent Martin', 'user11@gmail.com', NULL, '987-562-211', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$CJP.UgmslpdXbvN/eSFfM.VjA/sIdLXM7JuG/iXIkS2rlenkpDh1O', 'present_info_only', NULL, '2022-03-25 09:34:06', '2022-03-25 09:36:00'),
(13, 'Smith Alen', 'user12@gmail.com', NULL, '987-562-212', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$tP55jIXiyF2mg9HcCh0NIeW5Dq8v1LPCOs9yHighM7HTACXz0A6xK', 'present_info_only', NULL, '2022-03-25 09:42:15', '2022-03-25 09:47:19'),
(14, 'Jonson Haris', 'user13@gmail.com', NULL, '987-562-213', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$NmdCQTP9gYlk6gJErnMNSuysuIkanjDzu0ahETBaswTwIOiJlSSk.', 'present_info_only', NULL, '2022-03-25 09:51:57', '2022-03-25 09:53:13'),
(15, 'Parker Starlin', 'user14@gmail.com', NULL, '987-562-214', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$NailGF5oZ70dIHZTGAaXMeCvu0DCyv6quzcw6fQ03zXJeBTrpQH6e', 'present_info_only', NULL, '2022-03-30 03:12:07', '2022-03-30 03:12:07'),
(16, 'Vladimir Joe', 'user15@gmail.com', NULL, '987-562-215', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$ajUB3IUerWGQP/c8HuJGZeLyTaxiWbqmm71BelRcJvKQyD6nrOjgm', 'present_info_only', NULL, '2022-03-30 03:23:35', '2022-03-30 03:58:56'),
(17, 'Fancristine Rock', 'user16@gmail.com', NULL, '987-562-216', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$DMMnEIE8BgKL9gxek9IdXOcv7JeABhdjlXEHYkgiaVBjl5/gDI/hq', 'present_info_only', NULL, '2022-03-30 04:13:27', '2022-03-30 04:14:12'),
(18, 'Will Jonson', 'user17@gmail.com', NULL, '987-562-217', NULL, 'user', NULL, 'user', 9.99, NULL, 'active', '$2y$10$MUMHLmIfhv.1pGXgAbOk1.ei/3J25kYc5BMoGNHBJ2pRFzY42JXhq', 'present_info_only', NULL, '2022-03-30 05:38:26', '2022-03-30 05:42:00');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;