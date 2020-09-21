-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 01:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `phone1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `product_id`, `firstname`, `lastname`, `sdate`, `edate`, `add1`, `add2`, `country`, `city`, `state`, `zip`, `phone1`, `email`, `phone2`, `notes`, `created_at`, `updated_at`) VALUES
(1, 7, 'Sruthi', 'P', '26-10-2018', '26-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, 'ugtjhgfhh', '2018-09-30 23:02:18', '2018-09-30 23:02:18'),
(2, 7, 'Sruthi', 'P', '26-10-2018', '26-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, 'ugtjhgfhh', '2018-09-30 23:02:47', '2018-09-30 23:02:47'),
(3, 7, 'Sruthi', 'P', '26-10-2018', '26-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, 'ugtjhgfhh', '2018-09-30 23:02:48', '2018-09-30 23:02:48'),
(4, 7, 'Sruthi', 'P', '26-10-2018', '26-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, 'ugtjhgfhh', '2018-09-30 23:04:34', '2018-09-30 23:04:34'),
(5, 7, 'Sruthi', 'P', '26-10-2018', '26-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, 'ugtjhgfhh', '2018-09-30 23:17:25', '2018-09-30 23:17:25'),
(6, 7, 'Sruthi', 'P', '26-10-2018', '26-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, 'ugtjhgfhh', '2018-09-30 23:18:25', '2018-09-30 23:18:25'),
(7, 2, 'Athulya', 'P', '10-10-2018', '10-10-2018', 'Tirur', 'koyilandi', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, NULL, '2018-10-01 00:30:59', '2018-10-01 00:30:59'),
(8, 7, 'Athulya', 'P', '10-10-2018', '10-10-2018', 'vadakara', 'koyilandi', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, NULL, '2018-10-01 00:33:08', '2018-10-01 00:33:08'),
(9, 2, 'Sruthi', 'P', '25-10-2018', '25-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, NULL, '2018-10-01 00:50:14', '2018-10-01 00:50:14'),
(10, 5, 'Sruthi', NULL, '11-10-2018', '11-10-2018', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', 'ammusruthi09@gmail.com', NULL, NULL, '2018-10-01 01:03:15', '2018-10-01 01:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_id`, `featured`, `created_at`, `updated_at`) VALUES
(15, 'Subjects', 0, 1, '2018-09-19 05:08:27', '2018-09-20 00:51:03'),
(16, 'Mental & Logical Reasoning', 0, 0, '2018-09-19 05:08:43', '2018-09-19 05:08:43'),
(20, 'Analogies', 16, 0, '2018-09-19 05:13:45', '2018-09-19 05:17:05'),
(21, 'Malayalam', 15, 0, '2018-09-19 05:15:29', '2018-09-20 00:51:15'),
(23, 'Language', 0, 0, '2018-09-20 00:44:43', '2018-09-25 01:13:49'),
(24, 'English', 0, 0, '2018-09-20 01:07:56', '2018-09-20 01:07:56'),
(26, 'Chemistry', 15, 0, '2018-09-20 01:10:24', '2018-09-20 01:10:24'),
(28, 'Zoology', 15, 0, '2018-09-20 01:14:22', '2018-09-20 01:14:22'),
(40, 'Subjectssss', 15, 0, '2018-09-20 01:25:36', '2018-09-20 01:25:36'),
(41, 'With Template', 0, 0, '2018-09-25 01:13:34', '2018-09-25 01:13:34'),
(42, 'New sub Category', 15, 0, '2018-09-25 01:17:24', '2018-09-25 01:17:24'),
(43, 'Current Affairs', 0, 0, '2018-09-25 01:49:14', '2018-09-25 01:49:14'),
(46, 'Chemistryy', 0, 0, '2018-09-25 04:28:32', '2018-09-25 04:28:32'),
(47, 'bIOLOGY', 0, 0, '2018-09-25 04:28:45', '2018-09-25 04:28:45'),
(48, 'Physics', 0, 0, '2018-09-25 04:28:58', '2018-09-25 04:28:58'),
(49, 'Maths', 0, 0, '2018-09-25 04:29:16', '2018-09-25 04:29:16'),
(50, 'Kooooo', 0, 1, '2018-09-28 01:00:40', '2018-09-28 01:00:40'),
(51, 'Manglish', 15, 1, '2018-09-28 01:03:03', '2018-09-28 01:03:03'),
(52, 'Nooooo', 50, 1, '2018-09-28 01:04:05', '2018-09-28 01:04:05'),
(53, 'Kolpm', 50, 0, '2018-09-28 01:05:45', '2018-09-28 01:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_09_15_094500_create_categories_table', 2),
(13, '2018_09_20_074607_create_products_table', 3),
(16, '2018_09_29_063346_create_bookings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `phone1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagepath` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `events` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `add1`, `add2`, `country`, `city`, `state`, `zip`, `phone1`, `phone2`, `email`, `imagepath`, `offers`, `type`, `events`, `featured`, `created_at`, `updated_at`) VALUES
(2, 51, 'Kalyani', 'vadakara', NULL, 'india', 'Kozhikode', 'KERALA', 673103, '9965687412', NULL, 'kalyani@gmail.com', 'kalyani@gmail.com', 'GHJGHJGHJG', '2', NULL, 1, '2018-09-21 05:26:20', '2018-09-21 05:34:26'),
(3, 51, 'Krishna Priya', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '9965687412', NULL, 'krishnapriya@gmail.com', 'krishnapriya@gmail.com', 'No New Offers', '1', '3,4', 1, '2018-09-21 23:36:28', '2018-09-22 00:31:55'),
(4, 51, 'CMS', 'SM Street', 'Kozhikode', 'India', 'Kozhikode', 'Kerala', 786543, '09965687412', '9961518614', 'cms@gmail.com', 'cms@gmail.com', 'No New Offers', '1', '1,2', 1, '2018-09-22 04:53:29', '2018-09-26 23:13:23'),
(5, 50, 'ABC', '1234 Street', 'Apartment', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', NULL, 'admin@lavalite.org', NULL, 'nooo', '1', '1,2', 1, '2018-09-27 01:31:09', '2018-09-27 01:31:09'),
(6, 50, 'php', 'vadakara', 'k', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', NULL, 'ammusruthi09@gmail.com', NULL, NULL, '1', '2', 0, '2018-09-27 02:08:55', '2018-09-27 02:08:55'),
(7, 0, 'Java', 'vadakara', 'Koyilandi', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', NULL, 'as@gmail.com', NULL, 'No New Offers', '3', NULL, 1, '2018-09-27 23:56:50', '2018-10-01 06:12:56'),
(8, 0, 'CMS2', 'vadakara', 'kkk', 'India', 'Kozhikode', 'KERALA', 673103, '09965687412', NULL, 'superadmin@gmail.com', NULL, 'No New Offers', '1', NULL, 0, '2018-09-27 23:58:05', '2018-10-01 06:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sruthi', 'superadmin@gmail.com', NULL, '$2y$10$AkB18UzzcGsDB7DwISK5F.ZPK744jpGxK9vGW7pFKVAX7XmYa5qHK', 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
