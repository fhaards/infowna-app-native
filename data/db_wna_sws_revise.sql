-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 02:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wna_sws`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `email`, `name`, `phone`, `address`, `vision`, `mission`, `about`) VALUES
(1, 'company@mail.coms', 'company_name', '+6281331155', 'Company Address', '&lt;p&gt;&lt;span style=&quot;color: #0a0a0a; font-family: Montserrat, Verdana, Geneva, sans-serif; font-size: 16px; background-color: #fefefe;&quot;&gt;A world in which all individuals, communities, and peoples work toward the protection and full expression of their human rights; are active participants in the decisions that affect them; share equitably in the knowledge, wealth, and resources of society; and are free to achieve their full potential.&lt;/span&gt;&lt;/p&gt;', '&lt;p&gt;&lt;span style=&quot;color: #0a0a0a; font-family: Montserrat, Verdana, Geneva, sans-serif; font-size: 16px; background-color: #fefefe;&quot;&gt;To reduce poverty and injustice, strengthen democratic values, promote international cooperation, and advance human achievement.&lt;/span&gt;&lt;/p&gt;', '&lt;h2 style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 24px; font-family: Nunito, sans-serif; color: #012970;&quot;&gt;Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti reprehenderit.&lt;/h2&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin: 15px 0px 30px; line-height: 24px; color: #444444; font-family: \'Open Sans\', sans-serif; font-size: 16px;&quot;&gt;Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_indonesia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_status_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visa_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requests_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_letter` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`req_id`, `uuid`, `name`, `passport_id`, `email`, `gender`, `phone`, `nationality`, `address_indonesia`, `passport_img`, `req_status`, `req_status_info`, `category`, `created_at`, `updated_at`, `visa_img`, `requests_type`, `img_letter`) VALUES
('0202220812444A57D8E2', '4a57d8e2-c0f4-4260-8af9-2bc133aae462', 'jemberpinks', '123', 'pinks@mail.com', 'Male', '081122334455', 'Japan', 'test', '0202220812444A57D8E2-Passport.jpeg', 'Approved', '', 'KITAS', '2002-02-22 13:12:44', '2002-02-22 13:12:44', '0202220812444A57D8E2-Visa.jpeg', 'NEW', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `password`, `user_group`, `user_status`, `created_at`, `updated_at`) VALUES
(1, '4d7737cc-ae62-454a-95a7-83c5d78c90ad', 'Administrator', 'admin@mail.com', '$2y$10$Gc1cmaDA/9PT.6cRdXON2uivHMWF.CyD8E21ZD87Ne6tlOEIcJo3m', 'admin', '1', '2021-12-22 08:37:27', '2021-12-22 08:37:27'),
(2, '8c1ee3b7-a854-4c2c-8d4c-568a6cdc4411', 'li qiang', 'liqiang@mail.com', '$2y$10$.bTc5rMZTxY3TmKlS87yIeSCrwfSP/QBS1IWtf6b5ti3lPPPEiEqi', 'user', '1', '2029-01-22 09:02:45', '2029-01-22 09:02:45'),
(3, '7c052c95-7d67-4fde-a229-a68092775f9f', 'choi seung jin', 'choiseungjin@mail.com', '$2y$10$LS6i5XpkXbXXqnqpdG6OheDqiO6riiqwIefj.OAXjIkBZC7jUrB8m', 'user', '1', '2001-02-22 11:10:12', '2001-02-22 11:10:12'),
(4, '03f08a45-bf83-4c15-bad7-c7babfcb9d91', 'yang ji un', 'yangjiun@mail.com', '$2y$10$gYAgOWvFgrC6Y9LOiayym.y2vnboQc7ddbuBjuwPoM48COAo5Yu6C', 'user', '1', '2001-02-22 11:15:51', '2001-02-22 11:15:51'),
(5, '626a54c7-ae91-4448-a3ff-80fbf6b7e30e', 'rius', 'rius@mail.com', '$2y$10$UydOgkWRiMqHs/5rG.AWAuShUTFEms0tF0jlMK64vFs7nrjHjFWbO', 'user', '1', '2001-02-22 14:27:49', '2001-02-22 14:27:49'),
(6, '4a57d8e2-c0f4-4260-8af9-2bc133aae462', 'jemberpinks', 'pinks@mail.com', '$2y$10$VEu43jfrtEhlAXecMvxuTusAkNm7EOGxgyj7p6zFhCXjLBLuQ.q5W', 'user', '1', '2002-02-22 12:23:46', '2002-02-22 12:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `districts` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`uuid`, `gender`, `phone`, `birth_date`, `birth_place`, `address`, `country`, `districts`, `postcode`, `photo`) VALUES
('03f08a45-bf83-4c15-bad7-c7babfcb9d91', 'Male', '081245637', '1971-02-24', 'seoul', 'seoul south korea', 'Korea (Democratic People\'s Republic of)', 'seoul', '231232', NULL),
('4a57d8e2-c0f4-4260-8af9-2bc133aae462', 'Male', '081122334455', '1989-02-04', 'Japan', 'St. Nakagawa, Tokyo', 'Japan', 'Tokyo', '564345', NULL),
('4d7737cc-ae62-454a-95a7-83c5d78c90ad', 'Male', '+6281122334455', '2021-12-22', 'Jakarta', 'Jakart', 'Indonesia', 'Jakarta', '-', NULL),
('626a54c7-ae91-4448-a3ff-80fbf6b7e30e', 'Male', '09809128391', '2021-12-29', 'fujian', 'swasembada', 'Bangladesh', 'apaaja', '231232', NULL),
('7c052c95-7d67-4fde-a229-a68092775f9f', 'Male', '09809128391', '1957-03-26', 'seoul', 'seoul south korea', 'Korea (Democratic People\'s Republic of)', 'seoul', '231232', NULL),
('8c1ee3b7-a854-4c2c-8d4c-568a6cdc4411', 'Male', '09809128391', '1994-12-17', 'fujian', 'shanghai fujian china', 'China', 'shanghai', '177665', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
