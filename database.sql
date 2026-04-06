-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
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


-- Dumping database structure for absen
CREATE DATABASE IF NOT EXISTS `absen` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `absen`;

-- Dumping data for table absen.absensi: ~0 rows (approximately)
DELETE FROM `absensi`;

-- Dumping data for table absen.check_absensi: ~0 rows (approximately)
DELETE FROM `check_absensi`;

-- Dumping data for table absen.guru: ~3 rows (approximately)
DELETE FROM `guru`;
INSERT INTO `guru` (`id`, `id_user`, `nama_guru`, `nip`, `jenis_kelamin`, `foto`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	(1, 3, 'SRI RENGGAYONI', '198410122009122001', 'P', '1775461855_3x4.jpg', 'Padang', '082285498005', '2026-04-06 07:50:55', '2026-04-06 07:50:55'),
	(2, 4, 'DINY MAULINA', '199201182005012004', 'P', '1775461920_WhatsApp Image 2026-03-25 at 16.43.39.jpeg', 'Padang', '082285498005', '2026-04-06 07:52:00', '2026-04-06 07:52:00'),
	(3, 5, 'ELSANORA WIRANTI', '199109152020122021', 'P', NULL, 'Padang', '082285498005', '2026-04-06 07:52:44', '2026-04-06 07:52:44');

-- Dumping data for table absen.kelas: ~2 rows (approximately)
DELETE FROM `kelas`;
INSERT INTO `kelas` (`id`, `nama_kelas`, `id_guru`, `created_at`, `updated_at`) VALUES
	(1, 'IX.1', NULL, '2026-03-25 01:43:31', '2026-03-25 01:43:31'),
	(2, 'IX.2', NULL, '2026-03-25 01:44:38', '2026-03-25 01:44:38');

-- Dumping data for table absen.mapel: ~2 rows (approximately)
DELETE FROM `mapel`;
INSERT INTO `mapel` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(1, 'IPA', '2026-03-25 08:08:51', '2026-03-25 08:08:51'),
	(3, 'IPS', '2026-03-25 08:16:15', '2026-03-25 08:16:15');

-- Dumping data for table absen.migrations: ~1 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_03_25_075804_create_pikets_table', 1);

-- Dumping data for table absen.siswa: ~3 rows (approximately)
DELETE FROM `siswa`;
INSERT INTO `siswa` (`id`, `nama_siswa`, `nisn`, `jenis_kelamin`, `id_kelas`, `created_at`, `updated_at`) VALUES
	(1, 'Ahmad Rizky Pratama', '0045123456', 'L', 1, '2026-03-25 04:44:44', '2026-03-25 04:44:44'),
	(2, 'Dimas Saputra', '0045123457', 'L', 1, '2026-03-25 04:52:00', '2026-03-25 04:52:00'),
	(3, 'Fajar Nugroho', '0045123458', 'L', 1, '2026-03-25 04:52:57', '2026-03-25 04:52:57');

-- Dumping data for table absen.users: ~5 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$2MVLtdWaWVusG1KKOxuUdOG5peACsErLFisoLPus9AIXGG6Ga/1Di', 'admin', NULL, '2026-01-28 16:09:47', '2026-01-28 16:09:47'),
	(2, 'Guru', 'guru@gmail.com', NULL, '$2y$12$tfVQRVeJKEXuIzO7RlkLxObF5jLjFMvgHaqGIGLlwkkw3noRCryJq', 'guru', NULL, '2026-01-28 16:09:47', '2026-01-28 16:09:47'),
	(3, 'SRI RENGGAYONI', 'renggaunnie1210@gmail.com', NULL, '$2y$12$mg44Z0KDzr4PGk2lAaLzUefuqcp2glAsxUGWFZNV5RNjGb1oalOfC', 'guru', NULL, '2026-04-06 07:50:55', '2026-04-06 07:50:55'),
	(4, 'DINY MAULINA', 'viradiana40@gmail.com', NULL, '$2y$12$bEBmHh2K3Vg9w2OYuM8akeOP8Ihtx8BDq3C7kvpAqly8XKEx1Dz8O', 'guru', NULL, '2026-04-06 07:52:00', '2026-04-06 07:52:00'),
	(5, 'ELSANORA WIRANTI', 'elsanorawiranti66@gmail.com', NULL, '$2y$12$8yvNFuDkMzG326vT65gmy.eTsz5tJ9Px4N6U0G3fY18urXfekbvJq', 'guru', NULL, '2026-04-06 07:52:44', '2026-04-06 07:52:44');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
