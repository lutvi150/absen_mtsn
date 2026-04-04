-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table absen.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int NOT NULL,
  `jumlah_siswa` int NOT NULL,
  `id_guru` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absen.absensi: ~0 rows (approximately)
DELETE FROM `absensi`;

-- Dumping structure for table absen.check_absensi
CREATE TABLE IF NOT EXISTS `check_absensi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_absensi` int NOT NULL,
  `id_siswa` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absen.check_absensi: ~0 rows (approximately)
DELETE FROM `check_absensi`;

-- Dumping structure for table absen.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `foto` text COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guru_id_user_unique` (`id_user`),
  UNIQUE KEY `guru_nama_guru_unique` (`nama_guru`),
  UNIQUE KEY `guru_nip_unique` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absen.guru: ~0 rows (approximately)
DELETE FROM `guru`;

-- Dumping structure for table absen.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_guru` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelas_nama_kelas_unique` (`nama_kelas`),
  KEY `kelas_id_guru_foreign` (`id_guru`),
  CONSTRAINT `kelas_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absen.kelas: ~0 rows (approximately)
DELETE FROM `kelas`;
INSERT INTO `kelas` (`id`, `nama_kelas`, `id_guru`, `created_at`, `updated_at`) VALUES
	(1, 'IX.1', NULL, '2026-03-25 01:43:31', '2026-03-25 01:43:31'),
	(2, 'IX.2', NULL, '2026-03-25 01:44:38', '2026-03-25 01:44:38');

-- Dumping structure for table absen.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absen.mapel: ~2 rows (approximately)
DELETE FROM `mapel`;
INSERT INTO `mapel` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(1, 'IPA', '2026-03-25 08:08:51', '2026-03-25 08:08:51'),
	(3, 'IPS', '2026-03-25 08:16:15', '2026-03-25 08:16:15');

-- Dumping structure for table absen.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `id_kelas` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siswa_nisn_unique` (`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absen.siswa: ~0 rows (approximately)
DELETE FROM `siswa`;
INSERT INTO `siswa` (`id`, `nama_siswa`, `nisn`, `jenis_kelamin`, `id_kelas`, `created_at`, `updated_at`) VALUES
	(1, 'Ahmad Rizky Pratama', '0045123456', 'L', 1, '2026-03-25 04:44:44', '2026-03-25 04:44:44'),
	(2, 'Dimas Saputra', '0045123457', 'L', 1, '2026-03-25 04:52:00', '2026-03-25 04:52:00'),
	(3, 'Fajar Nugroho', '0045123458', 'L', 1, '2026-03-25 04:52:57', '2026-03-25 04:52:57');

-- Dumping structure for table absen.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absen.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$2MVLtdWaWVusG1KKOxuUdOG5peACsErLFisoLPus9AIXGG6Ga/1Di', 'admin', NULL, '2026-01-28 16:09:47', '2026-01-28 16:09:47'),
	(2, 'Guru', 'guru@gmail.com', NULL, '$2y$12$tfVQRVeJKEXuIzO7RlkLxObF5jLjFMvgHaqGIGLlwkkw3noRCryJq', 'guru', NULL, '2026-01-28 16:09:47', '2026-01-28 16:09:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
