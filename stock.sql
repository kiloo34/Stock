-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 10, 2021 at 02:16 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `stok`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `kode`, `nama`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'M1', 'barring', '75', '2021-01-09 15:10:16', '2021-01-09 16:33:49'),
(2, 'M2', 'Roda', '142', '2021-01-09 15:57:24', '2021-01-09 16:34:02');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2021_01_09_162729_create_material_table', 1),
(15, '2021_01_09_162751_create_pemakaian_table', 1);

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
-- Table structure for table `pemakaian`
--

CREATE TABLE `pemakaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`id`, `material_id`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, '25', '2020-12-31', '2021-01-09 15:43:16', '2021-01-09 15:43:16'),
(2, 1, '25', '2020-12-31', '2021-01-09 16:21:49', '2021-01-09 16:21:49'),
(3, 1, '25', '2020-12-31', '2021-01-09 16:21:53', '2021-01-09 16:21:53'),
(4, 1, '25', '2021-01-26', '2021-01-09 16:32:44', '2021-01-09 16:32:44'),
(5, 1, '25', '2021-01-21', '2021-01-09 16:33:49', '2021-01-09 16:33:49'),
(6, 2, '33', '2021-01-19', '2021-01-09 16:34:02', '2021-01-09 16:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$hqqI.TFfuE5WhRaXPhS.pOVEfyWeDNkv//8owQwn8uIqhr0tzFIO.', 'admin', NULL, '2021-01-09 15:01:08', '2021-01-09 15:01:08'),
(2, 'admin new', 'admin@admin1.com', NULL, '$2y$10$qezc8cN6.KPCW5NsiSCDlOOzmhjxOdgMnrfkfnAaw0.wlAR8i.8TG', 'admin', NULL, '2021-01-09 15:02:49', '2021-01-09 15:02:49'),
(3, 'ads', 'asdsfa@asf.asf', NULL, '$2y$10$O0FEnHDu/BIm3CJ1GghSe.4UVAKCMgVscYhWkbAEDZtuRqN6o0RA.', 'admin', NULL, '2021-01-09 15:04:33', '2021-01-09 15:04:33'),
(4, 'ads', 'asfmik@asmnk.av', NULL, '$2y$10$5.p2pnGWVM/sr4qpnH/xFuQRwv/eUsW5yKMm0eu1Pdv.qdixjPw4q', 'admin', NULL, '2021-01-09 15:05:38', '2021-01-09 15:05:38'),
(5, 'fassa', 'asf@af.sfa', NULL, '$2y$10$bz.NkZRQGjmpCMD2dYB9rOkAUv0N/lCqCZtm692WxlZMuqRldpuvK', 'admin', NULL, '2021-01-09 15:06:31', '2021-01-09 15:06:31'),
(6, 'fas', 'asf@asfm.asf', NULL, '$2y$10$pqslya6Cj8xbDmDtq62O3eYRtXIz5QOjwWCqLFkdwv3ZD00jz7UUS', 'admin', NULL, '2021-01-09 15:08:36', '2021-01-09 15:08:36'),
(7, 'asfmkfas', 'mandor@mandor.com', NULL, '$2y$10$qtn2cAjPvcLzxgYhQIQs8ORUAwcKEdqOxLdsM81alIdM9kls9UqPi', 'mandor', NULL, '2021-01-09 15:10:38', '2021-01-09 15:10:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
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
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemakaian_material_id_foreign` (`material_id`);

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
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD CONSTRAINT `pemakaian_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
