-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 04:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imgtables`
--

CREATE TABLE `imgtables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headerimage` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `backgroundimage` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imgtables`
--

INSERT INTO `imgtables` (`id`, `title`, `image`, `description`, `headerimage`, `backgroundimage`, `created_at`, `updated_at`) VALUES
(2, 'test', 'ZymNation_1704515034.png', 'sdfsd', 'yes', 'yes', '2024-01-05 22:53:54', '2024-01-05 22:53:54'),
(3, 'ram', 'ZymNation_1704516840.jpg', 'ram ram', 'no', 'no', '2024-01-05 23:24:00', '2024-01-05 23:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `status` enum('Activate','Deactivate') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activate',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `name`, `mobile`, `dob`, `email`, `gender`, `address`, `height`, `weight`, `doj`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rajesh Kumar Purohit', '9251435299', '1989-08-18', 'rmcats@gmail.com', 'Male', 'gangashahar, gopeshwar basti\r\nbikaner', 5.60, 65.00, '2023-12-14', 'Activate', '2023-12-13 22:25:49', '2023-12-15 23:34:59'),
(2, 1, 'Vineet kathuria', '9856859652', NULL, NULL, 'Male', 'S.D COLLEGE campus', NULL, NULL, '2023-12-14', 'Activate', '2023-12-13 22:26:32', '2023-12-13 22:26:32'),
(3, 1, 'daku', '9859652415', NULL, NULL, 'Male', NULL, NULL, NULL, '2023-12-16', 'Activate', '2023-12-16 00:28:29', '2023-12-16 00:28:29'),
(4, 1, 'Ramdev', '8955332520', NULL, NULL, 'Male', NULL, NULL, NULL, '2023-12-19', 'Activate', '2023-12-19 04:28:36', '2023-12-19 04:28:54'),
(5, 1, 'daku', '9856421536', NULL, NULL, 'Male', NULL, NULL, NULL, '2023-12-20', 'Activate', '2023-12-19 22:32:56', '2023-12-26 23:17:26'),
(6, 1, 'Suraj', '7896541235', '2011-12-04', 'suraj@gmail.com', 'Male', 'all well', 5.20, 68.00, '2023-12-21', 'Activate', '2023-12-20 22:11:05', '2023-12-24 02:02:35'),
(7, 1, 'babu', '7414587809', NULL, NULL, 'Male', NULL, NULL, NULL, '2023-12-28', 'Deactivate', '2023-12-27 23:18:52', '2024-01-04 00:45:36'),
(8, 1, 'raju', '9989898987', '1997-02-04', NULL, 'Male', NULL, NULL, NULL, '2024-01-04', 'Deactivate', '2024-01-04 09:11:32', '2024-01-04 09:18:22'),
(9, 1, 'xyz', '9856251425', NULL, NULL, 'Male', NULL, NULL, NULL, '2024-01-04', 'Activate', '2024-01-04 09:23:07', '2024-01-04 09:23:07'),
(10, 1, 'garvit', '9856253652', NULL, NULL, 'Male', NULL, NULL, NULL, '2024-01-05', 'Activate', '2024-01-05 05:42:49', '2024-01-05 05:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2023_11_23_042240_create_members_table', 1),
(24, '2023_11_24_041838_create_plans_table', 1),
(27, '2023_12_09_033110_create_payments_table', 2),
(33, '2023_12_09_044042_create_trainers_table', 3),
(34, '2023_12_24_080525_create_trainerpayments_table', 3),
(36, '2024_01_05_050749_create_imgtables_table', 4);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_fees` double(8,2) NOT NULL,
  `plan_discount` double(8,2) DEFAULT NULL,
  `extradiscount` double(8,2) DEFAULT NULL,
  `feessubmited` double(8,2) NOT NULL,
  `dos` date DEFAULT NULL,
  `planexpiredate` date DEFAULT NULL,
  `paymentmode` enum('Cash','Online') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `member_id`, `member_name`, `plan_id`, `plan_name`, `duration`, `plan_fees`, `plan_discount`, `extradiscount`, `feessubmited`, `dos`, `planexpiredate`, `paymentmode`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Vineet kathuria', '2', 'Gold', '6', 9000.00, 25.00, 8.14, 6200.50, '2023-12-06', '2023-06-02', 'Online', 'this is ok', '2023-12-14 23:08:05', '2023-12-14 23:08:05'),
(2, 1, 2, 'Vineet kathuria', '2', 'Gold', '6', 9000.00, 25.00, NULL, 6750.00, '2023-12-16', '2023-06-16', 'Cash', NULL, '2023-12-15 22:36:48', '2023-12-15 22:36:48'),
(3, 1, 1, 'Rajesh Kumar Purohit', '3', 'Silver', '3', 4500.00, 15.00, NULL, 3825.00, '2023-07-14', '2023-10-14', 'Cash', NULL, '2023-12-15 23:36:34', '2023-12-15 23:36:34'),
(4, 1, 1, 'Rajesh Kumar Purohit', '4', 'Regular', '1', 1500.00, NULL, NULL, 1500.00, '2023-12-16', '2024-01-16', 'Cash', NULL, '2023-12-15 23:37:33', '2023-12-15 23:37:33'),
(5, 1, 3, 'daku', '2', 'Gold', '6', 9000.00, 25.00, 50.07, 3370.00, '2023-12-19', '2023-06-19', 'Cash', NULL, '2023-12-19 04:23:55', '2023-12-19 04:23:55'),
(6, 1, 4, 'Ramdev', '1', 'Premium', '12', 18000.00, 33.00, 17.08, 10000.00, '2023-11-24', '2023-12-12', 'Cash', NULL, '2023-12-19 04:34:29', '2023-12-19 04:34:29'),
(7, 1, 6, 'Suraj', '5', 'Regular', '3', 6000.00, 10.00, 10.00, 4860.00, '2023-12-21', '2024-03-21', 'Cash', NULL, '2023-12-20 22:13:28', '2023-12-20 22:13:28'),
(8, 1, 4, 'Ramdev', '1', 'Premium', '12', 18000.00, 33.00, 25.00, 9045.00, '2023-07-22', '2024-07-22', 'Cash', NULL, '2023-12-29 06:30:34', '2023-12-29 06:30:34'),
(9, 1, 5, 'daku', '3', 'Silver', '3', 4500.00, 15.00, NULL, 3825.00, '2024-01-04', '2024-04-04', 'Cash', NULL, '2024-01-04 00:43:44', '2024-01-04 00:43:44'),
(10, 1, 8, 'raju', '6', 'new gold', '18', 15000.00, 20.00, 16.67, 10000.00, '2023-09-07', '2025-03-07', 'Cash', NULL, '2024-01-04 09:16:38', '2024-01-04 09:16:38'),
(11, 1, 10, 'garvit', '5', 'Regular', '3', 6000.00, 10.00, 25.93, 4000.00, '2023-12-01', '2024-03-01', 'Cash', NULL, '2024-01-05 05:45:03', '2024-01-05 05:45:03'),
(12, 1, 9, 'xyz', '5', 'Regular', '3', 6000.00, 10.00, 7.41, 5000.00, '2023-08-11', '2023-11-11', 'Cash', NULL, '2024-01-05 21:27:17', '2024-01-05 21:27:17'),
(13, 1, 9, 'xyz', '4', 'Regular', '1', 1500.00, NULL, NULL, 1500.00, '2023-11-12', '2023-12-12', 'Cash', NULL, '2024-01-05 21:28:03', '2024-01-05 21:28:03'),
(14, 1, 9, 'xyz', '3', 'Silver', '3', 4500.00, 15.00, NULL, 3825.00, '2024-01-06', '2024-04-06', 'Cash', NULL, '2024-01-05 21:28:19', '2024-01-05 21:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Activate','Deactivate') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activate',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `name`, `duration`, `fees`, `discount`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Premium', '12', 18000, 33, 'six month diet chart and one moth trainer free', 'Deactivate', '2023-12-13 22:30:55', '2023-12-29 06:33:59'),
(2, 1, 'Gold', '6', 9000, 25, 'one month diet chart and 1 week trainer free', 'Activate', '2023-12-13 22:33:16', '2024-01-05 05:49:01'),
(3, 1, 'Silver', '3', 4500, 15, 'guidance when you are doing exercise', 'Deactivate', '2023-12-13 22:37:45', '2024-01-05 21:30:28'),
(4, 1, 'Regular', '1', 1500, NULL, NULL, 'Activate', '2023-12-13 22:38:15', '2023-12-13 22:38:15'),
(5, 1, 'Regular', '3', 6000, 10, 'All well', 'Activate', '2023-12-20 22:11:40', '2023-12-20 22:11:40'),
(6, 1, 'new gold', '18', 15000, 20, NULL, 'Activate', '2024-01-04 09:15:05', '2024-01-04 09:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `trainerpayments`
--

CREATE TABLE `trainerpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feessubmited` double(8,2) NOT NULL,
  `dos` date DEFAULT NULL,
  `trainerdurationdate` date DEFAULT NULL,
  `paymentmode` enum('Cash','Online') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainerpayments`
--

INSERT INTO `trainerpayments` (`id`, `user_id`, `member_id`, `member_name`, `trainer_id`, `trainer_name`, `duration`, `feessubmited`, `dos`, `trainerdurationdate`, `paymentmode`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'babu', '2', 'Rajesh purohit', '1', 500.00, '2023-12-01', NULL, 'Cash', 'jai', '2023-12-29 23:09:33', '2023-12-29 23:09:33'),
(2, 1, 6, 'Suraj', '2', 'Rajesh purohits', '0', 6000.00, '2023-12-01', '2024-02-02', 'Cash', NULL, '2024-01-01 23:23:41', '2024-01-01 23:23:41'),
(3, 1, 10, 'garvit', '3', 'vishal', '0', 5000.00, '2024-01-02', '2024-03-02', 'Cash', NULL, '2024-01-05 05:45:59', '2024-01-05 05:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Activate','Deactivate') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activate',
  `doj` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `user_id`, `name`, `image`, `mobile`, `details`, `status`, `doj`, `created_at`, `updated_at`) VALUES
(2, 1, 'Rajesh purohits', 'ZymNation_1704257467.jpg', '9251435299', 'ok', 'Activate', '2023-12-30', '2023-12-29 22:37:11', '2024-01-05 05:47:53'),
(3, 1, 'vishal', 'ZymNation_1704257386.jpg', '9859652415', 'it\'s my life', 'Activate', '2024-01-03', '2024-01-02 23:15:19', '2024-01-02 23:19:46'),
(4, 1, 'rishi verma', 'ZymNation_1704257397.jpg', '7584541523', NULL, 'Deactivate', '2024-01-03', '2024-01-02 23:17:32', '2024-01-05 21:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'axixa', 'admin@axixa.com', NULL, '$2y$10$daE3KrlygsFfgf3ubOwT2uv/QmrW8ks6F0ilbSINpUzHc7Eo6RxIq', NULL, '2023-12-13 22:23:36', '2023-12-13 22:23:36'),
(2, 'vasu', 'vasu@raj.com', NULL, '$2y$10$as/9x4fChg./id56UqJcveML974VgIQogZKOqIJosmRaW6ANIUh4C', NULL, '2023-12-27 22:45:48', '2023-12-27 22:45:48'),
(3, 'anshu', 'anshu@rajesh.com', NULL, '$2y$10$1P4uGjhO.x8Il3zFKwxqa.K8SJyQUuOSnAhN8.dGROC2YGPByJPBe', NULL, '2023-12-27 23:09:43', '2023-12-27 23:09:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imgtables`
--
ALTER TABLE `imgtables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainerpayments`
--
ALTER TABLE `trainerpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imgtables`
--
ALTER TABLE `imgtables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainerpayments`
--
ALTER TABLE `trainerpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
