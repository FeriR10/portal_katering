-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2024 at 06:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalkatering`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cekout`
--

CREATE TABLE `cekout` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cekout`
--

INSERT INTO `cekout` (`id`, `users_id`, `menu_id`, `qty`, `total_harga`, `date`, `created_at`, `updated_at`) VALUES
(1, 13, 6, 2, 10000000, '2024-09-06', '2024-09-03 08:22:05', '2024-09-03 08:22:05'),
(2, 13, 6, 2, 10000000, '2024-09-07', '2024-09-03 08:23:01', '2024-09-03 08:23:01'),
(3, 13, 6, 2, 10000000, '2024-09-06', '2024-09-03 08:25:43', '2024-09-03 08:25:43'),
(4, 13, 5, 1, 60000, '2024-09-14', '2024-09-03 08:31:35', '2024-09-03 08:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `harga_satuan` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `users_id`, `menu_id`, `qty`, `harga_satuan`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, '11', '6', '1', '5000000', '5000000', '2024-09-03 03:48:19', '2024-09-03 03:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `merchant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `deskripsi`, `thumbnail`, `harga`, `created_at`, `updated_at`, `merchant_id`) VALUES
(4, 'nasi', 'nasi putih', 'menu/xbDcbTvvFyPfTeT6i1c0mCEjAvwxzyf7y01VfiMV.jpg', '200000', '2024-09-03 02:12:03', '2024-09-03 02:12:03', 1),
(5, 'ayam', 'ayam bakar', 'menu/XIv3p0LSVPDqFrwKK1grTg3jk3u5psnzepJpWL40.jpg', '60000', '2024-09-03 02:37:11', '2024-09-03 02:37:11', 1),
(6, 'kue', 'kue kering', 'menu/kQGoYENL8XJSEEUtP4lbudCQQNUTxreDsRebVZ6H.png', '5000000', '2024-09-03 03:30:47', '2024-09-03 03:30:47', 2),
(7, 'kopi', 'kpo cup', 'menu/PNhaIv67kKVaSYG8o3QCL6oAqPAK6bWGui4jT8yH.jpg', '10000', '2024-09-03 05:38:08', '2024-09-03 05:38:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_merchant` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jenis_makanan` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `nama_merchant`, `lokasi`, `jenis_makanan`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'RESTO BARU', 'Bandung', 'Makanan berat', 2, NULL, NULL),
(2, 'CAPE', 'BEKASI', 'CEMILAN', 11, '2024-09-03 03:29:11', '2024-09-03 03:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2024_09_03_040843_create_role_table', 2),
(8, '2024_09_03_051626_create_profile_table', 3),
(9, '2024_09_03_055617_create_menu_table', 4),
(12, '2024_09_03_082634_create_merchant_table', 5),
(13, '2024_09_03_083530_add_merchant_id_to_menu_table', 6),
(15, '2024_09_03_104335_create_keranjang_table', 7),
(18, '2024_09_03_144639_create_cekout_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_prusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `users_id`, `nama_prusahaan`, `alamat`, `kontak`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 2, 'PT INI', 'ini', '89001923', 'ini', NULL, '2024-09-02 22:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', NULL, NULL),
(2, 'backoffice', NULL, NULL),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wcl3HV0jQEcOaljl7c8E2Z8ILwOGHuOrnUuyt1ad', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ3VzRFlzZ2NTUlJHTUZrSnMzZnlIR3Nmd2FmMXFxcjdZa1k5dE5YeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mcm9udG9mZmljZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1725379146);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$nmeYpmxIoM4NdRd0FFnfxu9YaKGZe/ITNvej6yu3DFMhHYjdbZZCq', '1', NULL, '2024-09-02 21:05:58', '2024-09-02 21:05:58'),
(2, 'feri', 'feri@gmail.com', NULL, '$2y$12$oC5FxdE.xjTKGhEX/tvtm.T13gwwopWO9fARX5bkGfhHSchOtEqWO', '2', NULL, '2024-09-02 21:17:24', '2024-09-02 21:17:24'),
(3, 'deva', 'deva@gmail.com', NULL, '$2y$12$fpMUXCuRZZb19DPA8EuTtu88XdctEcU154uZgTmnNuyXV90vKT3ZO', '2', NULL, '2024-09-03 02:37:36', '2024-09-03 02:37:36'),
(4, 'tes', 'tes@gmail.com', NULL, '$2y$12$X77PsU5bfAq9S60Y8/D13eeW.Exd6EPacTJd73OlwfNSFzvq5qRsy', '2', NULL, '2024-09-03 02:57:53', '2024-09-03 02:57:53'),
(5, 'coba', 'coba@gmail.com', NULL, '$2y$12$R5B8Ovi62mtp/SHAS57NkO.FEtPyF1o9hK7jvNeEXdCerG7H193FG', '2', NULL, '2024-09-03 03:08:05', '2024-09-03 03:08:05'),
(6, 'sendy', 'sendy@gmail.com', NULL, '$2y$12$mF5Oub/njtjO5V7uuJzj4ulggwZ2c0IAxr/dWJ/KiXwG5MUSynJFC', '2', NULL, '2024-09-03 03:12:36', '2024-09-03 03:12:36'),
(7, 'nia', 'nia@gmail.com', NULL, '$2y$12$PP9zQTI9RzXLcos96MHj8e3Lb4MgwVsoEVGezBk75jlCUG8WjkM.a', '2', NULL, '2024-09-03 03:13:39', '2024-09-03 03:13:39'),
(8, 'kiki', 'kiki@gmail.com', NULL, '$2y$12$YKMRUUkD.IDr45XF5AzskemXqMPfrQ3ZUtXWkSuZhbXT8cJd.gdaS', '2', NULL, '2024-09-03 03:15:24', '2024-09-03 03:15:24'),
(9, 'ada', 'ada@gmail.com', NULL, '$2y$12$tbW7XKwU29gG0r17bS14U.zwkSWLoiQD4GZMVEQEwJjIuoh38Q0iK', '2', NULL, '2024-09-03 03:17:40', '2024-09-03 03:17:40'),
(10, 'ini', 'ini@gmail.com', NULL, '$2y$12$gF8rpVBec70YwXRupyr39.8X2FZs6PJhD44cQLizJ9QtwrJInohqC', '2', NULL, '2024-09-03 03:22:43', '2024-09-03 03:22:43'),
(11, 'cape', 'cape@gmail.com', NULL, '$2y$12$FE9b1C0hz661bS3hHUlwUOg5bmy/KVd7/UHQnqRQHXtDUjZpdP1.e', '2', NULL, '2024-09-03 03:29:11', '2024-09-03 03:29:11'),
(12, 'ff', 'ff@gmail.com', NULL, '$2y$12$shFPgMFn.2Lca7Vf1M5P9eAeak4ZOXO205YxPdT.uNeuh4beWyBse', '3', NULL, '2024-09-03 06:39:44', '2024-09-03 06:39:44'),
(13, 'lol', 'lol@gmail.com', NULL, '$2y$12$RPXi8eeu67SxT//ZtkkE3O4pMOthLclSyVqSc4qp1siS05cTxLXN6', '3', NULL, '2024-09-03 06:44:09', '2024-09-03 06:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cekout`
--
ALTER TABLE `cekout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cekout_users_id_foreign` (`users_id`),
  ADD KEY `cekout_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_merchant_id_foreign` (`merchant_id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_users_id_foreign` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_users_id_foreign` (`users_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cekout`
--
ALTER TABLE `cekout`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cekout`
--
ALTER TABLE `cekout`
  ADD CONSTRAINT `cekout_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `cekout_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`);

--
-- Constraints for table `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `merchant_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
