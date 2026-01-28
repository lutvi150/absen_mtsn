-- --------------------------------------------------------
-- Host:                         103.15.226.176
-- Server version:               10.6.22-MariaDB-cll-lve-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table teamclov_demo_10.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.absensi: ~8 rows (approximately)
REPLACE INTO `absensi` (`id`, `tanggal`, `jam_masuk`, `jam_keluar`, `mata_pelajaran`, `id_kelas`, `jumlah_siswa`, `id_guru`, `created_at`, `updated_at`) VALUES
	(7, '2025-07-21', '10:00:00', '00:00:00', 'Seni Budaya', 10, 0, 1, '2025-07-21 03:37:46', '2025-07-21 03:37:46'),
	(8, '2025-07-21', '10:00:00', '00:00:00', 'Seni Budaya', 10, 0, 1, '2025-07-21 03:37:47', '2025-07-21 03:37:47'),
	(14, '2025-07-02', '02:00:00', '06:00:00', 'Guru Kelas', 11, 4, 3, '2025-07-24 16:31:02', '2025-07-24 16:31:02'),
	(15, '2025-07-25', '08:00:00', '12:00:00', 'Guru Kelas', 11, 4, 3, '2025-07-25 02:49:51', '2025-07-25 02:49:51'),
	(16, '2025-07-25', '08:00:00', '12:00:00', 'Guru Kelas', 11, 4, 3, '2025-07-25 02:49:52', '2025-07-25 02:49:52'),
	(18, '2025-07-02', '08:00:00', '12:00:00', 'Guru Kelas', 15, 3, 15, '2025-07-25 06:45:08', '2025-07-25 06:45:08'),
	(20, '2025-07-01', '08:00:00', '12:00:00', 'Guru Kelas', 15, 3, 15, '2025-07-25 06:48:01', '2025-07-25 06:48:01'),
	(21, '2025-07-03', '08:00:00', '12:00:00', 'Guru Kelas', 15, 3, 15, '2025-07-25 06:48:39', '2025-07-25 06:48:39'),
	(22, '2025-07-04', '08:00:00', '12:00:00', 'Guru Kelas', 15, 3, 15, '2025-07-25 06:49:09', '2025-07-25 06:49:09'),
	(23, '2025-07-05', '08:00:00', '12:00:00', 'Guru Kelas', 15, 3, 15, '2025-07-25 06:49:37', '2025-07-25 06:49:37');

-- Dumping structure for table teamclov_demo_10.check_absensi
CREATE TABLE IF NOT EXISTS `check_absensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.check_absensi: ~24 rows (approximately)
REPLACE INTO `check_absensi` (`id`, `id_absensi`, `id_siswa`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 2, 6, 'Alfa', 'Alfa', '2025-07-20 23:24:36', '2025-07-21 00:02:42'),
	(2, 2, 7, 'Alfa', 'Alfa', '2025-07-20 23:48:58', '2025-07-20 23:53:20'),
	(3, 2, 8, 'Alfa', 'Alfa', '2025-07-20 23:50:56', '2025-07-20 23:50:56'),
	(4, 2, 9, 'Alfa', 'Alfa', '2025-07-21 00:00:05', '2025-07-21 00:03:14'),
	(5, 3, 6, 'Alfa', 'Bolos', '2025-07-21 01:13:25', '2025-07-21 03:48:28'),
	(6, 3, 7, 'Alfa', 'cabut', '2025-07-21 01:19:19', '2025-07-21 03:50:21'),
	(7, 6, 10, 'Hadir', '-', '2025-07-21 01:40:18', '2025-07-21 01:40:18'),
	(8, 6, 11, 'Alfa', 'Cabut', '2025-07-21 01:40:51', '2025-07-21 01:40:51'),
	(9, 3, 8, 'Sakit', '-', '2025-07-21 01:49:47', '2025-07-21 04:02:17'),
	(10, 3, 9, 'Hadir', '-', '2025-07-21 02:39:02', '2025-07-21 02:39:02'),
	(11, 11, 6, 'Hadir', '-', '2025-07-21 04:56:58', '2025-07-21 04:56:58'),
	(12, 11, 7, 'Hadir', '-', '2025-07-21 04:57:06', '2025-07-21 04:57:06'),
	(13, 11, 8, 'Hadir', '-', '2025-07-21 04:57:06', '2025-07-21 04:57:06'),
	(14, 11, 9, 'Hadir', '-', '2025-07-21 04:57:06', '2025-07-21 04:57:06'),
	(15, 11, 12, 'Alfa', 'Tidak masuk pada pelajaran BAM', '2025-07-21 04:57:06', '2025-07-21 04:58:21'),
	(16, 12, 10, 'Alfa', 'Tanpa Keterangan', '2025-07-24 04:14:34', '2025-07-25 02:52:05'),
	(17, 12, 11, 'Hadir', '-', '2025-07-24 04:14:34', '2025-07-25 02:51:17'),
	(18, 12, 13, 'Alfa', 'Bolos di jam BAM', '2025-07-24 04:14:34', '2025-07-24 04:25:41'),
	(19, 6, 13, 'Hadir', '-', '2025-07-24 04:46:50', '2025-07-24 04:46:50'),
	(20, 12, 19, 'Hadir', '-', '2025-07-25 02:51:17', '2025-07-25 02:51:17'),
	(21, 20, 10, 'Alfa', 'tanpa keterangan', '2025-07-25 07:13:44', '2025-07-25 07:14:25'),
	(22, 20, 11, 'Sakit', '-', '2025-07-25 07:13:44', '2025-07-25 07:14:30'),
	(23, 20, 19, 'Izin', '-', '2025-07-25 07:13:44', '2025-07-25 07:14:34'),
	(24, 23, 10, 'Hadir', '-', '2025-07-25 07:27:47', '2025-07-25 07:27:47'),
	(25, 23, 11, 'Alfa', 'tanpa keterangan', '2025-07-25 07:28:04', '2025-07-25 07:28:04'),
	(26, 23, 19, 'Hadir', '-', '2025-07-25 07:28:35', '2025-07-25 07:28:35');

-- Dumping structure for table teamclov_demo_10.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `foto` text DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guru_id_user_unique` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.guru: ~11 rows (approximately)
REPLACE INTO `guru` (`id`, `id_user`, `nama_guru`, `nip`, `jenis_kelamin`, `foto`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	(1, 6, 'Winta lagi', '199606122022031004', 'P', NULL, 'Solok', '082285498005', '2025-07-13 09:18:38', '2025-07-24 04:50:57'),
	(3, 8, 'HERMAWATI', '19670989', 'P', NULL, 'Batu Bajanjang', '08131234567', '2025-07-20 06:39:54', '2025-07-20 06:39:54'),
	(4, 9, 'YATMAWATI', '196806181992102001', 'P', NULL, 'Simanau', '082172912653', '2025-07-20 13:48:39', '2025-07-20 13:48:39'),
	(5, 10, 'MISRAWATI', '197507062010012006', 'P', NULL, 'Padang Panjang', '081373992879', '2025-07-20 13:56:38', '2025-07-20 13:56:38'),
	(6, 11, 'ERMAWENI', '-', 'P', NULL, 'Rangkiang Luluih', '081373992879', '2025-07-20 13:57:36', '2025-07-20 13:57:36'),
	(7, 13, 'DEVIA LADESERMI', '12345', 'P', NULL, 'Batu Bajanjang', '081373992879', '2025-07-20 13:59:49', '2025-07-20 13:59:49'),
	(8, 14, 'RELI SOPIANTO', '0', 'L', NULL, 'Rangkiang Luluih', '081373992879', '2025-07-20 14:02:30', '2025-07-20 14:02:30'),
	(9, 15, 'SISRIA AGUSTRI PRATAMA', '123456789', 'P', NULL, 'Batu Bajanjang', '081373992879', '2025-07-20 14:03:56', '2025-07-20 14:03:56'),
	(10, 16, 'SARIWASMARTI', '12345678910', 'P', NULL, 'Rangkiang Luluih', '081373992879', '2025-07-20 14:05:31', '2025-07-20 14:05:31'),
	(11, 18, 'Fitri Sandra Okta Johari', '1234567891011', 'L', NULL, 'Batu Bajanjang', '081373992879', '2025-07-20 14:06:35', '2025-07-20 14:06:35'),
	(13, 20, 'tes', '-', 'L', '1753053073_download.jpeg', 'tesststs', '082285498005', '2025-07-20 23:11:13', '2025-07-20 23:11:13'),
	(15, 22, 'Winta Jusriani', '199806052025212004', 'P', '1753061200_foto.jpg', 'Batu Bajanjang', '081373992879', '2025-07-21 01:26:43', '2025-07-21 01:26:43');

-- Dumping structure for table teamclov_demo_10.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelas_nama_kelas_unique` (`nama_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.kelas: ~6 rows (approximately)
REPLACE INTO `kelas` (`id`, `nama_kelas`, `id_guru`, `created_at`, `updated_at`) VALUES
	(11, 'Kelas I', '3', '2025-07-20 05:06:27', '2025-07-24 15:13:16'),
	(15, 'Kelas II', '15', '2025-07-20 14:06:58', '2025-07-24 15:14:21'),
	(17, 'Kelas III', '9', '2025-07-20 14:07:33', '2025-07-24 15:14:34'),
	(19, 'Kelas IV', '4', '2025-07-24 15:15:04', '2025-07-24 15:15:04'),
	(20, 'Kelas V', '10', '2025-07-24 15:15:28', '2025-07-24 15:15:28'),
	(21, 'Kelas VI', '6', '2025-07-24 15:15:44', '2025-07-24 15:15:44');

-- Dumping structure for table teamclov_demo_10.orang_tua
CREATE TABLE IF NOT EXISTS `orang_tua` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('Ayah','Ibu') NOT NULL DEFAULT 'Ayah',
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.orang_tua: ~39 rows (approximately)
REPLACE INTO `orang_tua` (`id`, `id_siswa`, `nama`, `jenis`, `pekerjaan`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Budi', 'Ayah', 'Petani', 'Solok', '081373992879', '2025-07-13 08:42:30', '2025-07-13 08:42:30'),
	(2, 2, 'Lala', 'Ibu', 'Petani', 'Solok', '081373992879', '2025-07-13 08:42:30', '2025-07-13 08:42:30'),
	(3, 3, 'Arianto', 'Ayah', 'PNS', 'Solok', '081373992879', '2025-07-13 08:43:24', '2025-07-13 08:43:24'),
	(4, 3, 'Yani', 'Ibu', 'PNS', 'Solok', '081373992879', '2025-07-13 08:43:24', '2025-07-13 08:43:24'),
	(5, 4, 'didi', 'Ayah', 'pns', 'solok', '081373992879', '2025-07-13 12:54:16', '2025-07-13 12:54:16'),
	(6, 4, 'lili', 'Ibu', 'rt', 'solok', '081373992879', '2025-07-13 12:54:16', '2025-07-13 12:54:16'),
	(7, 5, 'Tes', 'Ayah', 'tes', 'tes', '081373992879', '2025-07-20 04:40:16', '2025-07-20 04:40:16'),
	(8, 5, 'tes', 'Ibu', 'tes', 'Tes', '081373992879', '2025-07-20 04:40:16', '2025-07-20 04:40:16'),
	(9, 6, 'Nazir Wanto', 'Ayah', 'Wiraswasta', 'Batu Bajanjang', '082285498005', '2025-07-20 06:23:25', '2025-07-20 06:23:25'),
	(10, 6, 'Rini Andini', 'Ibu', 'PNS', 'Batu Bajanjang', '081373992879', '2025-07-20 06:23:25', '2025-07-20 06:23:25'),
	(11, 7, 'Basril', 'Ayah', 'Petani', 'Jorong Kampuang Tangah', '081373992879', '2025-07-20 06:34:44', '2025-07-20 06:34:44'),
	(12, 7, 'Rosma Neli', 'Ibu', 'RT', 'Jorong Kampuang Tangah', '081373992879', '2025-07-20 06:34:44', '2025-07-20 06:34:44'),
	(13, 8, 'Agussardi', 'Ayah', 'Petani', 'Jr. Kampuang Tangah', '081373992879', '2025-07-20 13:36:49', '2025-07-20 13:36:49'),
	(14, 8, 'Rury Syafnur', 'Ibu', 'RT', 'Jr. Kampuang Tangah', '081373992879', '2025-07-20 13:36:49', '2025-07-20 13:36:49'),
	(15, 9, 'Nasrizal', 'Ayah', 'Petani', 'Jr. Jorong Kampuang', '081373992879', '2025-07-20 13:43:54', '2025-07-20 13:43:54'),
	(16, 9, 'Deniar', 'Ibu', 'RT', 'Jr. Jorong Kampuang', '081373992879', '2025-07-20 13:43:54', '2025-07-20 13:43:54'),
	(17, 10, 'Yusrizal.M', 'Ayah', 'Petani', 'Jorong Kampuang Tangah', '081373992879', '2025-07-21 01:30:09', '2025-07-21 01:30:09'),
	(18, 10, 'Rismi Ani Fitri', 'Ibu', 'Rt', 'Jorong Kampuang Tangah', '081373992879', '2025-07-21 01:30:09', '2025-07-21 01:30:09'),
	(19, 11, 'Sudirman', 'Ayah', 'Petani', 'Jorong Batu Bagantuang', '081373992879', '2025-07-21 01:36:02', '2025-07-21 01:36:02'),
	(20, 11, 'Yesi Palnusa', 'Ibu', 'Rt', 'Jorong Batu Bagantuang', '081373992879', '2025-07-21 01:36:02', '2025-07-21 01:36:02'),
	(22, 12, 'Nur Asma', 'Ibu', 'Rt', 'Batu Bajanjang', '085278461226', '2025-07-21 04:49:54', '2025-07-21 04:49:54'),
	(24, 13, 'Bustami', 'Ibu', 'PNS', 'Batu Bajanjang', '085278461226', '2025-07-21 04:51:36', '2025-07-21 04:51:36'),
	(25, 14, 'WIRDAUS', 'Ayah', 'Petani', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:29:51', '2025-07-24 15:29:51'),
	(26, 14, 'NEN SUHERNI', 'Ibu', 'RT', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:29:51', '2025-07-24 15:29:51'),
	(27, 15, 'YENDRIZAL', 'Ayah', 'PPPK', 'Jorong Bancah Laweh', '081373992879', '2025-07-24 15:36:55', '2025-07-24 15:36:55'),
	(28, 15, 'YULIDA ERNI', 'Ibu', 'PPPK', 'Jorong Bancah Laweh', '081373992879', '2025-07-24 15:36:55', '2025-07-24 15:36:55'),
	(29, 16, 'SUDIRMAN', 'Ayah', 'Petani', 'Jorong Kampuang Tangah', '081373992879', '2025-07-24 15:39:07', '2025-07-24 15:39:07'),
	(30, 16, 'MURNI', 'Ibu', 'RT', 'Jorong Kampuang Tangah', '081373992879', '2025-07-24 15:39:07', '2025-07-24 15:39:07'),
	(31, 17, 'RAMIDI', 'Ayah', 'Wiraswasta', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:41:29', '2025-07-24 15:41:29'),
	(32, 17, 'HERNIZIL EXTOFIA', 'Ibu', 'RT', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:41:29', '2025-07-24 15:41:29'),
	(33, 18, 'ARDISON', 'Ayah', 'Petani', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:45:42', '2025-07-24 15:45:42'),
	(34, 18, 'RAMADAN', 'Ibu', 'RT', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:45:42', '2025-07-24 15:45:42'),
	(35, 19, 'ROKA', 'Ayah', 'Wiraswasta', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:49:01', '2025-07-24 15:49:01'),
	(36, 19, 'DESRI POPI YONDRA', 'Ibu', 'RT', 'Jorong Koto Tuo', '081373992879', '2025-07-24 15:49:01', '2025-07-24 15:49:01'),
	(37, 20, 'Nasrul (Alm)', 'Ayah', '-', '-', '081373992879', '2025-07-24 16:00:35', '2025-07-24 16:00:35'),
	(38, 20, 'Febri Astuti', 'Ibu', 'THL', 'Jorong Kampuang Tangah', '081373992879', '2025-07-24 16:00:35', '2025-07-24 16:00:35'),
	(39, 21, 'Taherman', 'Ayah', 'Petani', 'Jorong Koto Tuo', '081373992879', '2025-07-24 16:04:15', '2025-07-24 16:04:15'),
	(40, 21, 'Nurmailis', 'Ibu', 'RT', 'Jorong Koto Tuo', '081373992879', '2025-07-24 16:04:15', '2025-07-24 16:04:15'),
	(41, 22, 'Darwin', 'Ayah', 'Wiraswasta', 'Jorong Koto Tuo', '081373992879', '2025-07-24 16:07:42', '2025-07-24 16:07:42'),
	(42, 22, 'Delfitri', 'Ibu', 'RT', 'Jorong Koto Tuo', '081373992879', '2025-07-24 16:07:42', '2025-07-24 16:07:42'),
	(43, 23, 'Nurasin', 'Ayah', 'Petani', 'Jorong Kampuang Tangah', '081373992879', '2025-07-24 16:11:48', '2025-07-24 16:11:48'),
	(44, 23, 'Sijas', 'Ibu', 'RT', 'Jorong Kampuang Tangah', '081373992879', '2025-07-24 16:11:48', '2025-07-24 16:11:48'),
	(45, 24, 'Musliadi', 'Ayah', 'Petani', 'Jorong Koto tuo', '081373992879', '2025-07-24 16:25:51', '2025-07-24 16:25:51'),
	(46, 24, 'Metra Nensis', 'Ibu', 'RT', 'Jorong Koto tuo', '081373992879', '2025-07-24 16:25:51', '2025-07-24 16:25:51'),
	(47, 25, 'Sadriwal', 'Ayah', 'Wiraswasta', 'Jorong Pangka Pulai', '081373992879', '2025-07-24 16:28:36', '2025-07-24 16:28:36'),
	(48, 25, 'Irawati', 'Ibu', 'RT', 'Jorong Pangka Pulai', '081373992879', '2025-07-24 16:28:36', '2025-07-24 16:28:36');

-- Dumping structure for table teamclov_demo_10.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `foto` text DEFAULT NULL,
  `alamat` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siswa_nis_unique` (`nisn`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.siswa: ~16 rows (approximately)
REPLACE INTO `siswa` (`id`, `nama_siswa`, `nisn`, `jenis_kelamin`, `foto`, `alamat`, `id_kelas`, `created_at`, `updated_at`) VALUES
	(6, 'Adiba Mutiara Nazrin', '12345', 'P', NULL, 'Batu Bajanjang', 11, '2025-07-20 06:23:25', '2025-07-20 06:23:25'),
	(7, 'Afgani Aprilio', '1670', 'L', NULL, 'Jr. Kampuang Tangah', 11, '2025-07-20 06:34:44', '2025-07-20 06:34:44'),
	(8, 'Aslan Hanafis', '1673', 'L', NULL, 'Jr. Kampuang Tangah', 11, '2025-07-20 13:36:49', '2025-07-20 13:36:49'),
	(9, 'Tiwi Pera Putri', '1685', 'P', NULL, 'Jr. Kampuang Tangah', 11, '2025-07-20 13:43:54', '2025-07-20 13:43:54'),
	(10, 'Uwais Qarni', '1687', 'L', NULL, 'Jorong Kampuang Tangah', 15, '2025-07-21 01:30:09', '2025-07-21 01:30:09'),
	(11, 'Aftar Dirmansyah', '1716', 'L', NULL, 'Jorong Batu Bagantuang', 15, '2025-07-21 01:36:01', '2025-07-21 01:36:01'),
	(14, 'AZIDAN ZIO PERMANA', '1547', 'L', NULL, 'Jorong Koto Tuo', 19, '2025-07-24 15:29:51', '2025-07-24 15:29:51'),
	(15, 'ABDUL SAID RAMADHAN', '1620', 'L', NULL, 'Jorong Bancah Laweh', 17, '2025-07-24 15:36:55', '2025-07-24 15:36:55'),
	(16, 'AFIFA NADYA RAFANDA', '1621', 'P', NULL, 'Jorong Kampuang Tangah', 17, '2025-07-24 15:39:07', '2025-07-24 15:39:07'),
	(17, 'ALZIFRAN RAHMADANA', '1622', 'L', NULL, 'Jorong Koto Tuo', 17, '2025-07-24 15:41:29', '2025-07-24 15:41:29'),
	(18, 'BILQIIS KALISTA', '1623', 'P', NULL, 'Jorong Koto Tuo', 17, '2025-07-24 15:45:42', '2025-07-24 15:45:42'),
	(19, 'NAFIZA ALFIOKA PRATAMA', '1628', 'P', NULL, 'Jorong Koto Tuo', 15, '2025-07-24 15:49:01', '2025-07-24 15:49:01'),
	(20, 'HANAIFFA WANIA HASNA', '1610', 'P', NULL, 'Jorong Kampuang Tangah', 19, '2025-07-24 16:00:35', '2025-07-24 16:00:35'),
	(21, 'ADIA NURVITA', '1585', 'P', NULL, 'Jorong Koto Tuo', 19, '2025-07-24 16:04:15', '2025-07-24 16:04:15'),
	(22, 'Rizki Febriazis', '1493', 'L', NULL, 'Jorong Koto Tuo', 20, '2025-07-24 16:07:42', '2025-07-24 16:07:42'),
	(23, 'Atika Putri', '1496', 'P', NULL, 'Jorong Kampuang Tangah', 20, '2025-07-24 16:11:48', '2025-07-24 16:11:48'),
	(24, 'Muhammad Paris Akbar', '1457', 'L', NULL, 'Jorong Koto tuo', 21, '2025-07-24 16:25:51', '2025-07-24 16:25:51'),
	(25, 'Ahmad Fahri', '1464', 'L', NULL, 'Jorong Pangka Pulai', 21, '2025-07-24 16:28:36', '2025-07-24 16:28:36');

-- Dumping structure for table teamclov_demo_10.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.users: ~15 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$TB9HQUH2KPjEF7aYHKtB.e1o6TMT25zhlL5WBKykc.0nW4nSx4UKe', 'admin', NULL, '2025-07-09 12:01:57', '2025-07-13 10:24:36'),
	(6, 'Winta', 'guru@gmail.com', NULL, '$2y$12$ZcSjzN3zSUvFcwB49V32U.FEYG6fxyoZIDHqYGPMHtrvtWJafMqL2', 'guru', NULL, '2025-07-13 09:18:38', '2025-07-13 10:28:05'),
	(7, 'wiza', 'wiza@gmail.com', NULL, '$2y$12$EDeOVRf4.qYztq4.HkLxe.a9ywx9DxbtCSXobgdYL16pbqE.kLK3y', 'guru', NULL, '2025-07-13 12:59:10', '2025-07-13 13:00:08'),
	(8, 'HERMAWATI', 'hermawati@gmail.com', NULL, '$2y$12$X6OdotPHRLBM0l1ycG4JVecQgLSFo2WZQ9sQOkb2ZsZnbGnRA8r72', 'guru', NULL, '2025-07-20 06:39:54', '2025-07-20 06:39:54'),
	(9, 'YATMAWATI', 'yatmawati68@gmail.com', NULL, '$2y$12$8C5YiAOThO0zd0GCkxAW9uMZqXOO0puRo4gzTvblN0tCYXP1jzkmC', 'guru', NULL, '2025-07-20 13:48:39', '2025-07-25 07:24:29'),
	(10, 'MISRAWATI', 'misrawati@gmail.com', NULL, '$2y$12$UB.rwwajgNfCm/U5/Qxat.A2mwEcHvZ2NbgoBfCk8OHr3bRTYNcwq', 'guru', NULL, '2025-07-20 13:56:38', '2025-07-20 13:56:38'),
	(11, 'ERMAWENI', 'ermaweni@gmail.com', NULL, '$2y$12$4.L6CeS0SP3f1EDrD8YLD.FGhbsnIYT0c.yWtFU7hXoQsiHWwyoLy', 'guru', NULL, '2025-07-20 13:57:36', '2025-07-20 13:57:36'),
	(13, 'DEVIA LADESERMI', 'devia@gmail.com', NULL, '$2y$12$xsiEnUGcwBXJpIynjneA7OVYa8ela1FSbIe18ASK23/JCJHYHJEiG', 'guru', NULL, '2025-07-20 13:59:48', '2025-07-20 13:59:48'),
	(14, 'RELI SOPIANTO', 'reli@gmail.com', NULL, '$2y$12$z6.pnPY4zghBda7znGMtXOgiu.3VlPwU5BoJ.0645/gH7Ghq7WY/6', 'guru', NULL, '2025-07-20 14:02:30', '2025-07-20 14:02:30'),
	(15, 'SISRIA AGUSTRI PRATAMA', 'sisria@gmail.com', NULL, '$2y$12$g/1CsHdeYUXHUldr/VKFFuCaI7DvDFC2GQDi7dkfU0A8VnP5.QEIe', 'guru', NULL, '2025-07-20 14:03:56', '2025-07-20 14:03:56'),
	(16, 'SARIWASMARTI', 'was@gmail.com', NULL, '$2y$12$o5bxkRJ61cQfC6ZCfNqhBuy99mfPuBSKtupHTpBS2kOtGqeCLhQXa', 'guru', NULL, '2025-07-20 14:05:31', '2025-07-20 14:05:31'),
	(18, 'Fitri Sandra Okta Johari', 'david@gmail.com', NULL, '$2y$12$Wp16qp6OyZyJLpgzIpVhc.A2gw6dvzBZN/aWqc5ceP858YIRGo.Ba', 'guru', NULL, '2025-07-20 14:06:35', '2025-07-20 14:06:35'),
	(19, 'tes', 'gurutes@gmail.com', NULL, '$2y$12$igVKc2k48YMj1iWinwEF/.KawnwF8IBEN6vuMi5MYmIGxeHxWbnTm', 'guru', NULL, '2025-07-20 23:10:19', '2025-07-20 23:10:19'),
	(20, 'tes', 'gurutesbla _balal@gmail.com', NULL, '$2y$12$TeKUxyqGIEUCFto/SztouuinOJZT01LH56i/omUIvuM1YZoI8chUO', 'guru', NULL, '2025-07-20 23:11:13', '2025-07-20 23:11:13'),
	(21, 'tes', 'tes@gmail.com', NULL, '$2y$12$o1seusl1qrtQSwhaYdzxI.48IO2HqDejtRzE.qO5zWhVNDYbyGSXS', 'guru', NULL, '2025-07-20 23:32:54', '2025-07-20 23:32:54'),
	(22, 'Winta Jusriani', 'wintajusriani148@gmail.com', NULL, '$2y$12$sRWbjKdPPZ9eX.ffYjoZbOUXFkG6wXpCi9Vcxui1RbcN.Ozir8gue', 'guru', NULL, '2025-07-21 01:26:40', '2025-07-21 01:27:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
