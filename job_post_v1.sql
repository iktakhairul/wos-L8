-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2021 at 08:13 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nittodin`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` enum('shop','service') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_type` enum('proprietorship','partnership','private','public') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranking_score` double(5,2) DEFAULT '0.00',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identical_documents`
--

CREATE TABLE `identical_documents` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `birth_certificate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_number` bigint NOT NULL,
  `tin_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_license_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `service_category_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_datetime` datetime DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `required_persons` int DEFAULT '1',
  `budget` double(15,2) DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `service_category_id`, `user_id`, `title`, `description`, `latitude`, `longitude`, `city`, `country`, `address`, `approval_datetime`, `start_datetime`, `end_datetime`, `required_persons`, `budget`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Service Electric Line Repair', '<p>I had two flat in khilkhet, one of them had a problem with kitchen light, i need to repair them and want two people.</p>\n\n<ul>\n	<li>Service line from bedroom.</li>\n	<li>Line from main cutout.</li>\n</ul>\n\n<p>Do not apply if you don&#39;t have enougt working experiences.</p>', '23.826247253616998', '90.41602969999998', 'Dhaka District', 'Bangladesh', '143/E Jamtola Rd, Dhaka, Bangladesh', NULL, '2021-11-18 22:56:00', '2021-11-19 22:56:00', 2, 650.00, 'electrician,service line,repair electric line,electric line mechanic,dhaka', 'active', '2021-11-18 14:12:44', '2021-11-18 14:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `job_responses`
--

CREATE TABLE `job_responses` (
  `id` bigint UNSIGNED NOT NULL,
  `service_category_id` int DEFAULT NULL,
  `job_post_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `demanded_budget` double(15,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_timelines`
--

CREATE TABLE `job_timelines` (
  `id` bigint UNSIGNED NOT NULL,
  `job_post_id` int DEFAULT NULL,
  `job_response_id` int DEFAULT NULL,
  `job_post_user_id` int DEFAULT NULL,
  `job_worker_user_id` int DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `ratings` double(5,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_19_064553_create_profiles_table', 1),
(6, '2021_10_19_083727_create_identical_documents_table', 1),
(7, '2021_11_01_073303_create_media_table', 1),
(8, '2021_11_02_221321_create_businesses_table', 1),
(9, '2021_11_03_065645_create_shops_table', 1),
(10, '2021_11_03_065652_create_shop_users_table', 1),
(11, '2021_11_08_104240_create_service_categories_table', 1),
(12, '2021_11_08_104300_create_job_posts_table', 1),
(13, '2021_11_08_104317_create_job_responses_table', 1),
(14, '2021_11_08_104328_create_job_timelines_table', 1),
(15, '2021_11_15_131732_create_ratings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_division_id` bigint DEFAULT NULL,
  `present_district_id` bigint DEFAULT NULL,
  `present_thana_id` bigint DEFAULT NULL,
  `present_postal_code` int DEFAULT NULL,
  `present_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_division_id` bigint DEFAULT NULL,
  `permanent_district_id` bigint DEFAULT NULL,
  `permanent_thana_id` bigint DEFAULT NULL,
  `permanent_postal_code` bigint DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_score` double(2,2) DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` double(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `full_name`, `father_name`, `mother_name`, `spouse_name`, `dob`, `gender`, `religion`, `present_division_id`, `present_district_id`, `present_thana_id`, `present_postal_code`, `present_latitude`, `present_longitude`, `present_city`, `present_country`, `present_address`, `permanent_division_id`, `permanent_district_id`, `permanent_thana_id`, `permanent_postal_code`, `permanent_address`, `profile_score`, `referral_code`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 1, 'System Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '23.7942306', '90.4044471', NULL, NULL, '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-18 14:12:44', '2021-11-18 14:12:44'),
(2, 2, 'Asst. System Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '23.7942306', '90.4044471', NULL, NULL, '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-18 14:12:44', '2021-11-18 14:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `job_timeline_id` int DEFAULT NULL,
  `job_post_id` int DEFAULT NULL,
  `job_post_user_id` int DEFAULT NULL,
  `job_worker_user_id` int DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `ratings` double(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `slug`, `service_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electrician', 'Electrician-563-ED', 'ESC-7869', 1, '2021-11-18 14:12:44', '2021-11-18 14:12:44'),
(2, 'Plumber', 'Plumber-243-PL', 'ESC-5612', 1, '2021-11-18 14:12:44', '2021-11-18 14:12:44'),
(3, 'Mechanic', 'Mechanic-894-ME', 'MEC-6534', 1, '2021-11-18 14:12:44', '2021-11-18 14:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `business_id` int UNSIGNED DEFAULT NULL,
  `type` enum('online','offline','combined') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_contact_numbers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `thana_id` int DEFAULT NULL,
  `postal_code` int DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_location` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_users`
--

CREATE TABLE `shop_users` (
  `id` bigint UNSIGNED NOT NULL,
  `shop_id` int UNSIGNED DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` double(4,2) DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `domains` text COLLATE utf8mb4_unicode_ci,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `weight` double DEFAULT '9.99',
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_profile_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'incomplete',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `contact_number`, `avatar`, `type`, `domains`, `role`, `weight`, `permissions`, `status`, `password`, `complete_profile_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'System Admin', 'system.admin@mailinator.com', NULL, '01987654321', NULL, 'system', 'system,developer,admin,dashboard,operator,support,merchant', 'system', 99.99, 'all', 'active', '$2y$10$P8uIlOnYqvLjSmWFyq2LmepL2okvHi9lNS5110OcIbDdxY1346EJe', 'complete', NULL, '2021-11-18 14:12:44', '2021-11-18 14:12:44'),
(2, 'Asst. System Admin', 'asst.system.admin@mailinator.com', NULL, '01987654320', NULL, 'system', 'system,developer,admin,dashboard,operator,support,merchant', 'system', 99.99, 'all', 'active', '$2y$10$HGSaFOieJWlxxQg6rNzKY.s50UyR4YatmCLMQocHTmnShQcJWy1NW', 'complete', NULL, '2021-11-18 14:12:44', '2021-11-18 14:12:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_user_id_index` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `identical_documents`
--
ALTER TABLE `identical_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identical_documents_id_index` (`id`),
  ADD KEY `identical_documents_user_id_index` (`user_id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_responses`
--
ALTER TABLE `job_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_timelines`
--
ALTER TABLE `job_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_id_index` (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`),
  ADD KEY `profiles_present_division_id_index` (`present_division_id`),
  ADD KEY `profiles_present_district_id_index` (`present_district_id`),
  ADD KEY `profiles_present_thana_id_index` (`present_thana_id`),
  ADD KEY `profiles_permanent_division_id_index` (`permanent_division_id`),
  ADD KEY `profiles_permanent_district_id_index` (`permanent_district_id`),
  ADD KEY `profiles_permanent_thana_id_index` (`permanent_thana_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_user_id_index` (`user_id`),
  ADD KEY `shops_business_id_index` (`business_id`),
  ADD KEY `shops_division_id_index` (`division_id`),
  ADD KEY `shops_district_id_index` (`district_id`),
  ADD KEY `shops_thana_id_index` (`thana_id`),
  ADD KEY `shops_postal_code_index` (`postal_code`);

--
-- Indexes for table `shop_users`
--
ALTER TABLE `shop_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_users_shop_id_index` (`shop_id`),
  ADD KEY `shop_users_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_contact_number_unique` (`contact_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identical_documents`
--
ALTER TABLE `identical_documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_responses`
--
ALTER TABLE `job_responses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_timelines`
--
ALTER TABLE `job_timelines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_users`
--
ALTER TABLE `shop_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
