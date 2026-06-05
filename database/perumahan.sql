-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2026 at 01:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perumahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `home_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `status` enum('pending','process','accept') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `home_id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'accept', '2026-03-30 06:10:26', '2026-03-30 06:12:12'),
(2, 2, 4, 'pending', '2026-03-30 06:39:57', '2026-03-30 06:39:57'),
(3, 2, 6, 'pending', '2026-03-30 07:32:32', '2026-03-30 07:32:32'),
(4, 2, 7, 'process', '2026-03-30 08:16:23', '2026-03-30 08:17:29'),
(5, 3, 8, 'process', '2026-03-30 08:28:25', '2026-03-30 08:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Yedi', '0895414015102', '2026-03-30 06:09:10', '2026-03-30 06:09:10', NULL),
(2, 'yediku', '0', '2026-03-30 06:10:26', '2026-03-30 06:10:26', 2),
(3, 'Fani', '085229497743', '2026-03-30 06:39:36', '2026-03-30 06:39:36', NULL),
(4, 'admin', '0', '2026-03-30 06:39:57', '2026-03-30 06:39:57', 1),
(5, 'Arjuno', '085328772487', '2026-03-30 07:32:25', '2026-03-30 07:32:25', NULL),
(6, 'Arjuno', '0', '2026-03-30 07:32:32', '2026-03-30 07:32:32', 3),
(7, 'dimas', '087742441474', '2026-03-30 07:56:55', '2026-03-30 07:56:55', 4),
(8, 'sahl', '085229497743', '2026-03-30 08:25:42', '2026-03-30 08:25:42', 5);

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
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Perumahan Griya Sedaya Kandeman', 'perumahan-griya-sedaya-kandeman', 'vmYAgsDL7oaxIzSroGo9.webp', '2026-03-30 05:49:27', '2026-03-30 05:49:27'),
(3, 'Perumahan Griya Sedaya Batang', 'perumahan-griya-sedaya-batang', 'hdhyXo44sWCGcyCdsmrr.webp', '2026-03-30 06:18:50', '2026-03-30 06:18:50'),
(4, 'Perumahan Griya Sedaya Subah', 'perumahan-griya-sedaya-subah', 'cpJO9V8wMEEw3cIT5rU3.webp', '2026-03-30 06:19:15', '2026-03-30 06:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `home_images`
--

CREATE TABLE `home_images` (
  `id` bigint UNSIGNED NOT NULL,
  `home_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_images`
--

INSERT INTO `home_images` (`id`, `home_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '75XRsUGbBn5nMVnZHGE2.webp', '2026-03-30 05:48:07', '2026-03-30 05:48:07'),
(2, 2, 'JuCetJKSSzwmmjKV5UqU.webp', '2026-03-30 06:38:23', '2026-03-30 06:38:23'),
(3, 3, 'Zp3CJdkGtMWUfZdgKDL3.webp', '2026-03-30 08:28:11', '2026-03-30 08:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `home_lists`
--

CREATE TABLE `home_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_area` int NOT NULL,
  `land_area` int NOT NULL,
  `number_of_bedrooms` int NOT NULL,
  `number_of_bathrooms` int NOT NULL,
  `price` int NOT NULL,
  `electrical_power` int NOT NULL,
  `status` enum('dijual','terjual','sewa','tersewa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `floorplan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sketch_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_lists`
--

INSERT INTO `home_lists` (`id`, `category_id`, `name`, `slug`, `desc`, `building_area`, `land_area`, `number_of_bedrooms`, `number_of_bathrooms`, `price`, `electrical_power`, `status`, `floorplan`, `sketch_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Perumahan Griya Sedaya Kandeman', 'perumahan-griya-sedaya-kandeman', '<div>PERUMAHAN KANDEMA</div>', 200, 250, 2, 1, 110000000, 64, 'dijual', 'flmaQDc4WC9CsES0imUp.webp', 'N8JSoGGnUdxCVSkWQB49.webp', '2026-03-30 05:48:07', '2026-03-30 08:26:23'),
(2, 4, 'Perumahan Griya Sedaya Subah Type 36', 'perumahan-griya-sedaya-subah-type-36', '<div>PERUMAHAN TIPE 3</div>', 12, 20, 2, 1, 112000000, 110, 'dijual', 'Aa6iznpeIQqUL6NcNohs.webp', 'Bzz2ihxNSxMUaSfgZtHx.webp', '2026-03-30 06:38:23', '2026-03-30 06:38:23'),
(3, 3, 'Perumahan Griya Sedaya 1', 'perumahan-griya-sedaya-1', '<div>type 2</div>', 13, 20, 1, 1, 120000000, 50, 'dijual', 'xUSKHdDcKzRRrj18wXRp.webp', 'dgZPF62xLpoVDMZ3hZMh.webp', '2026-03-30 08:28:10', '2026-03-30 08:28:10');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_07_092051_create_home_lists_table', 1),
(6, '2024_02_07_092154_create_home_images_table', 1),
(7, '2024_02_07_092306_create_customers_table', 1),
(8, '2024_02_07_092350_create_bookings_table', 1),
(9, '2024_02_07_092442_create_settings_table', 1),
(10, '2024_02_10_021034_create_home_categories_table', 1),
(11, '2024_02_10_021307_create_sliders_table', 1),
(12, '2024_02_27_031739_create_wishlists_table', 1),
(13, '2025_12_09_130827_add_role_to_users_table', 1),
(14, '2025_12_09_145758_add_user_id_to_customers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_promotion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `desc`, `phone`, `image_promotion`, `image_logo`, `created_at`, `updated_at`) VALUES
(1, 'Perumahan Griya Nusantara', '<p><strong>Perumahan Griya Nusantara</strong> , hunian berkonsep rumah tumbuh dengan sentuhan desain yang modern. Berlokasi di perbatasan Gading Serpong dan BSD, Perumahan Griya Nusantara dilengkapi dengan berbagai fasilitas cluster seperti Club House, Kolam Renang, Lapangan Basket serta lingkungan rumah yang nyaman. Untuk memudahkan Anda dan keluarga, Perumahan Griya Nusantara juga dikeliling berbagai fasilitas kota yang lengkap seperti rumah sakit, sekolah, pusat perbelanjaan dan perkantoran.</p>\n        <h4 class=\"mt-3 mb-2\">Keunggulan dari Perumahan Griya Nusantara:</h4>\n        \n            <li>Terletak di kawasan premium Gading Serpong,</li>\n            <li>500 meter dari Jalan Boulevard Gading Serpong</li>\n            <li>Desain rumah yang cantik dengan konsep modern classic.</li>\n        \n        <h4 class=\"mt-3 mb-2\">Fasilitas cluster yang lengkap:</h4>\n        \n            <li>Suasana lingkungan yang sejuk dan asri.</li>\n            <li>5 menit ke Bethsaida Hospital, Giant, Pasar Modern, BEZ Plaza, Aeon Mall, dan Indonesia Convention Exhibition (ICE).</li>\n        \n        <p>Lokasi : Jalan Hudson, Cijantra, Pagedangan, Tangerang, Banten 15336.</p>\n        \n        \n        ', '6285176720024', 'IyLMbO24gZ3oQQCqx8AO.webp', 'eZErbU9cNcFHWxsHwAGj.webp', '2026-03-30 05:10:34', '2026-03-30 05:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BeNjBiNWTToj6LlcrhZl.webp', NULL, NULL),
(2, 'image.png', NULL, NULL),
(3, 'tAaYtMsvP6vM3aNeKFwv.webp', '2026-03-30 05:41:37', '2026-03-30 05:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$12$T0DN0baHAo2wv7qkLz0CB.JFKyZJkpLwUjmidF2LBddA3vy9UOaFm', 'admin', NULL, NULL, NULL),
(2, 'yediku', 'yediku@gmail.com', NULL, '$2y$12$Lk4jo9At89auNMvLqS97vO0cnpGUnpvkcJ3m5unFg6JQ6TXvdqozu', 'user', NULL, '2026-03-30 06:08:08', '2026-03-30 06:08:08'),
(3, 'Arjuno', 'arjuno@gmail.com', NULL, '$2y$12$VY2Xagnj9HdpeaO95YBn0uCbU8KHHa7gtLA7FIgm827X4zHpFwFHa', 'user', NULL, '2026-03-30 07:31:18', '2026-03-30 07:31:18'),
(4, 'dimas', 'dimas@gmail.com', NULL, '$2y$12$P9aFNYVuA7ppXtFO6iEgbOmWwnA2oh/5neNL3SZS61h4083rkn4pO', 'user', NULL, '2026-03-30 07:56:55', '2026-03-30 07:56:55'),
(5, 'sahl', 'sahl@gmail.com', NULL, '$2y$12$5ogqTXBXyg/9QXDDA4UAEOsGBP3Zd2kBwlv0nx9OFyZQLrYKvioYa', 'user', NULL, '2026-03-30 08:25:42', '2026-03-30 08:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `home_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `home_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2026-03-30 06:10:56', '2026-03-30 06:10:56'),
(2, 2, 7, '2026-03-30 08:18:46', '2026-03-30 08:18:46'),
(3, 2, 8, '2026-03-30 08:54:28', '2026-03-30 08:54:28'),
(4, 1, 8, '2026-03-30 08:55:19', '2026-03-30 08:55:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_images`
--
ALTER TABLE `home_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_lists`
--
ALTER TABLE `home_lists`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_images`
--
ALTER TABLE `home_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_lists`
--
ALTER TABLE `home_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
