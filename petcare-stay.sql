-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2026 pada 06.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petcare-stay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pet_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `service_package` enum('Basic','Premium','Grooming Plus') NOT NULL,
  `status` enum('Menunggu','Check In','Selesai','Dibatalkan') NOT NULL DEFAULT 'Menunggu',
  `total_price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `special_request` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `pet_id`, `room_id`, `check_in`, `check_out`, `service_package`, `status`, `total_price`, `special_request`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-06-03', '2026-06-06', 'Premium', 'Menunggu', 315000, 'Tolong diberi makan 2x sehari.', '2026-06-03 11:00:50', '2026-06-03 11:00:50'),
(4, 4, 2, '2026-12-12', '2026-12-14', 'Premium', 'Check In', 360000, NULL, '2026-06-03 17:46:42', '2026-06-03 17:46:42'),
(5, 4, 1, '2026-03-23', '2026-03-24', 'Basic', 'Check In', 75000, NULL, '2026-06-03 17:50:40', '2026-06-03 17:50:40'),
(6, 5, 2, '2026-06-04', '2026-06-05', 'Basic', 'Menunggu', 150000, NULL, '2026-06-03 18:20:46', '2026-06-03 18:20:46'),
(7, 5, 1, '2026-03-23', '2026-03-24', 'Basic', 'Menunggu', 75000, NULL, '2026-06-03 18:23:57', '2026-06-03 18:23:57'),
(8, 6, 3, '2026-06-04', '2026-06-06', 'Premium', 'Menunggu', 160000, NULL, '2026-06-04 05:04:56', '2026-06-04 05:04:56'),
(9, 6, 3, '2027-12-12', '2027-12-13', 'Basic', 'Menunggu', 50000, NULL, '2026-06-04 05:07:56', '2026-06-04 05:07:56'),
(10, 6, 1, '2026-12-26', '2026-12-27', 'Basic', 'Dibatalkan', 75000, NULL, '2026-06-04 05:14:12', '2026-06-04 05:15:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_02_000001_create_pet_owners_table', 1),
(5, '2026_06_02_000002_create_pets_table', 1),
(6, '2026_06_02_000003_create_rooms_table', 1),
(7, '2026_06_02_000004_create_bookings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pets`
--

CREATE TABLE `pets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pet_owner_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `breed` varchar(255) DEFAULT NULL,
  `age` int(10) UNSIGNED DEFAULT NULL,
  `gender` enum('Jantan','Betina') NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pets`
--

INSERT INTO `pets` (`id`, `pet_owner_id`, `name`, `species`, `breed`, `age`, `gender`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'Milo', 'Kucing', 'Persia', 2, 'Jantan', 'Suka makanan basah.', '2026-06-03 11:00:50', '2026-06-03 11:00:50'),
(4, 4, 'kitty', 'kucing', 'anggora', 3, 'Betina', NULL, '2026-06-03 17:38:18', '2026-06-03 17:38:18'),
(5, 5, 'ecco', 'anjing', '-', 4, 'Betina', NULL, '2026-06-03 18:20:11', '2026-06-03 18:20:11'),
(6, 6, 'bruno', 'kucing', 'persia', 3, 'Jantan', NULL, '2026-06-04 05:03:26', '2026-06-04 05:03:26'),
(7, 8, 'mimo', 'kucing', 'persia', 2, 'Betina', NULL, '2026-06-04 05:26:21', '2026-06-04 05:26:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pet_owners`
--

CREATE TABLE `pet_owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pet_owners`
--

INSERT INTO `pet_owners` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Alya Putri', '081234567890', 'alya@example.com', 'Banda Aceh', '2026-06-03 11:00:50', '2026-06-03 11:00:50'),
(4, 4, 'wyna', '0812345678', 'wyna@gmail.com', 'jakarta', '2026-06-03 14:09:37', '2026-06-03 14:09:37'),
(5, 5, 'faiza', '0897654321', 'faiza@gmail.com', 'bandung', '2026-06-03 18:18:52', '2026-06-03 18:18:52'),
(6, 6, 'dea', '0823232323', 'dea@gmail.com', 'surabaya', '2026-06-04 05:02:14', '2026-06-04 05:02:14'),
(7, NULL, 'asha', '0812345678', 'asha@gmail.com', 'bandung', '2026-06-04 05:24:53', '2026-06-04 05:24:53'),
(8, 7, 'putri', '0812345678', 'putri@gmail.com', 'yogyakarta', '2026-06-04 05:25:53', '2026-06-04 05:25:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Standard','Deluxe','VIP') NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL,
  `price_per_day` int(10) UNSIGNED NOT NULL,
  `status` enum('Tersedia','Penuh','Maintenance') NOT NULL DEFAULT 'Tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type`, `capacity`, `price_per_day`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kamar A1', 'Standard', 1, 75000, 'Tersedia', '2026-06-03 11:00:50', '2026-06-03 18:07:55'),
(2, 'Kamar VIP 1', 'VIP', 2, 150000, 'Tersedia', '2026-06-03 11:00:50', '2026-06-03 11:00:50'),
(3, 'kamar A2', 'Standard', 1, 50000, 'Tersedia', '2026-06-03 12:07:13', '2026-06-04 05:18:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jemIHYqSV43IgxNdsL6qGig30E2XqKF7buyFiQXY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:152.0) Gecko/20100101 Firefox/152.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicE9DM01kRnNHWVBrbXY5SEpuTnJpRnRvUzFFcmtZbE5lWUQyRXB0UCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1781802842),
('PZHmqYYsNuTs7KOtZn9Nk2FGm9CmaOGokz9NHws4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWRxS1RBdmp1ODRFalhKaG04ZjNrTlBZekVpYW1CU2VDOHdscXJ1UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1780551015),
('vAABtFbJBoHJpykl80YyqToP8PBm3W3KWyKAyszp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.123.0 Chrome/148.0.7778.97 Electron/42.2.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGtSWGZqak5aU0xBcGVVS2NveXRHN3RWSUNwRDRveDAzVzJvVzd5dSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1780549189);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin PetCare', 'admin@petcare.test', NULL, '$2y$12$WbVViw98WEnMu37YzTMSEOVnQaJ3scBxxPOVocIBgGLH4B9zKR6j.', 'admin', NULL, '2026-06-03 11:00:49', '2026-06-03 11:00:49'),
(4, 'wyna', 'wyna@gmail.com', NULL, '$2y$12$WYtn16PEblrrjQgzX972/Ouue2HGZB7AWDehHMIyFP9xbhtJG4IZG', 'user', NULL, '2026-06-03 14:09:37', '2026-06-03 14:09:37'),
(5, 'faiza', 'faiza@gmail.com', NULL, '$2y$12$4apxLymnCG7AF2Rmo2gPl.5qvcvSKJRdAzMDUW9yx9FRgnmTArtny', 'user', NULL, '2026-06-03 18:18:52', '2026-06-03 18:18:52'),
(6, 'dea', 'dea@gmail.com', NULL, '$2y$12$7SBM5ch05wbgFs41dtByceRl6YSzfT6WLYO84D7xdYU7.NDLBF93O', 'user', NULL, '2026-06-04 05:02:14', '2026-06-04 05:02:14'),
(7, 'putri', 'putri@gmail.com', NULL, '$2y$12$NJK9Nd.HDWQK/u6MrpQgvOD0Imk1ICE2KSiI0c25K8xFJjmAh3apm', 'user', NULL, '2026-06-04 05:25:53', '2026-06-04 05:25:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_pet_id_foreign` (`pet_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pets_pet_owner_id_foreign` (`pet_owner_id`);

--
-- Indeks untuk tabel `pet_owners`
--
ALTER TABLE `pet_owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_owners_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_name_unique` (`name`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pet_owners`
--
ALTER TABLE `pet_owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_pet_owner_id_foreign` FOREIGN KEY (`pet_owner_id`) REFERENCES `pet_owners` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pet_owners`
--
ALTER TABLE `pet_owners`
  ADD CONSTRAINT `pet_owners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
