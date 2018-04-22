-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Apr 2018 pada 23.14
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rata_kriteria` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_04_20_183213_create_alternatifs_table', 2),
(6, '2018_04_20_184311_create_kriterias_table', 3),
(7, '2018_04_20_185406_create_nilai_kriterias_table', 4),
(8, '2018_04_20_221250_create_nilai_alternatif_kriterias_table', 5),
(10, '2018_04_22_152136_add_norm_kriteria_to_nilai_kriterias', 6),
(11, '2018_04_22_172251_rename_norm_alernatif_in_nilai_alt_kriteria', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_alternatif_kriterias`
--

CREATE TABLE `nilai_alternatif_kriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `alternatif_1_id` int(10) UNSIGNED NOT NULL,
  `alternatif_2_id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `bobot_alternatif` double DEFAULT NULL,
  `norm_alternatif` double DEFAULT NULL,
  `rata_alternatif_kriteria` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriterias`
--

CREATE TABLE `nilai_kriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria_1_id` int(10) UNSIGNED NOT NULL,
  `kriteria_2_id` int(10) UNSIGNED NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `norm_kriteria` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vedo alfarizi', 'vedoalfarizi@gmail.com', '$2y$10$EmhP8Uowl6rLrYq3y045Pev01SToXpwWkIc7JtOgGIgmZz.pBNHnS', '3AOXP4S4CABZ9ZbgQSWiXdDKPLkwns2SFiAHiOn99V9EsKSHwcesnarfL1qe', '2018-04-08 10:57:05', '2018-04-08 10:57:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif_kriterias`
--
ALTER TABLE `nilai_alternatif_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_alternatif_kriterias_alternatif_1_id_foreign` (`alternatif_1_id`),
  ADD KEY `nilai_alternatif_kriterias_alternatif_2_id_foreign` (`alternatif_2_id`),
  ADD KEY `nilai_alternatif_kriterias_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `nilai_kriterias`
--
ALTER TABLE `nilai_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_kriterias_kriteria_1_id_foreign` (`kriteria_1_id`),
  ADD KEY `nilai_kriterias_kriteria_2_id_foreign` (`kriteria_2_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nilai_alternatif_kriterias`
--
ALTER TABLE `nilai_alternatif_kriterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_kriterias`
--
ALTER TABLE `nilai_kriterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai_alternatif_kriterias`
--
ALTER TABLE `nilai_alternatif_kriterias`
  ADD CONSTRAINT `nilai_alternatif_kriterias_alternatif_1_id_foreign` FOREIGN KEY (`alternatif_1_id`) REFERENCES `alternatifs` (`id`),
  ADD CONSTRAINT `nilai_alternatif_kriterias_alternatif_2_id_foreign` FOREIGN KEY (`alternatif_2_id`) REFERENCES `alternatifs` (`id`),
  ADD CONSTRAINT `nilai_alternatif_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai_kriterias`
--
ALTER TABLE `nilai_kriterias`
  ADD CONSTRAINT `nilai_kriterias_kriteria_1_id_foreign` FOREIGN KEY (`kriteria_1_id`) REFERENCES `kriterias` (`id`),
  ADD CONSTRAINT `nilai_kriterias_kriteria_2_id_foreign` FOREIGN KEY (`kriteria_2_id`) REFERENCES `kriterias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
