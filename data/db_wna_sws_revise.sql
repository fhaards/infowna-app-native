-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2022 pada 01.50
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

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
-- Struktur dari tabel `about`
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
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `email`, `name`, `phone`, `address`, `vision`, `mission`, `about`) VALUES
(1, 'company@mail.coms', 'company_name', '+6281331155', 'Company Address', '&lt;p&gt;&lt;span style=&quot;color: #0a0a0a; font-family: Montserrat, Verdana, Geneva, sans-serif; font-size: 16px; background-color: #fefefe;&quot;&gt;A world in which all individuals, communities, and peoples work toward the protection and full expression of their human rights; are active participants in the decisions that affect them; share equitably in the knowledge, wealth, and resources of society; and are free to achieve their full potential.&lt;/span&gt;&lt;/p&gt;', '&lt;p&gt;&lt;span style=&quot;color: #0a0a0a; font-family: Montserrat, Verdana, Geneva, sans-serif; font-size: 16px; background-color: #fefefe;&quot;&gt;To reduce poverty and injustice, strengthen democratic values, promote international cooperation, and advance human achievement.&lt;/span&gt;&lt;/p&gt;', '&lt;h2 style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 24px; font-family: Nunito, sans-serif; color: #012970;&quot;&gt;Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti reprehenderit.&lt;/h2&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin: 15px 0px 30px; line-height: 24px; color: #444444; font-family: \'Open Sans\', sans-serif; font-size: 16px;&quot;&gt;Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `requests`
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `extend_at` datetime DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `visa_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requests_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_letter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `password`, `user_group`, `user_status`, `created_at`, `updated_at`) VALUES
(1, '4d7737cc-ae62-454a-95a7-83c5d78c90ad', 'Administrator', 'admin@mail.com', '$2y$10$Gc1cmaDA/9PT.6cRdXON2uivHMWF.CyD8E21ZD87Ne6tlOEIcJo3m', 'admin', '1', '2021-12-22 08:37:27', '2021-12-22 08:37:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_account`
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
-- Dumping data untuk tabel `users_account`
--

INSERT INTO `users_account` (`uuid`, `gender`, `phone`, `birth_date`, `birth_place`, `address`, `country`, `districts`, `postcode`, `photo`) VALUES
('4a57d8e2-c0f4-4260-8af9-2bc133aae462', 'Male', '081122334455', '1989-02-04', 'Japan', 'St. Nakagawa, Tokyo', 'Japan', 'Tokyo', '564345', NULL),
('4d7737cc-ae62-454a-95a7-83c5d78c90ad', 'Male', '+6281122334455', '2021-12-22', 'Jakarta', 'Jakart', 'Indonesia', 'Jakarta', '-', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`uuid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
