-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 09:32 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory_jvt`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `hardware_day_left`
-- (See below for the actual view)
--
CREATE TABLE `hardware_day_left` (
`id_hw` int(20)
,`nama_hw` varchar(50)
,`nama_merk_hw` varchar(255)
,`seri_hw` varchar(30)
,`tgl_batas_garansi` date
,`day_left` int(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `log_hardware`
--

CREATE TABLE `log_hardware` (
  `id_log_hw` int(11) NOT NULL,
  `id_hw_lama` int(11) DEFAULT NULL,
  `id_lokasi_lama` int(11) NOT NULL,
  `id_lokasi_baru` int(11) NOT NULL,
  `id_departemen_lama` int(11) NOT NULL,
  `id_departemen_baru` int(11) NOT NULL,
  `tgl_beli_hw_lama` date NOT NULL,
  `tgl_beli_hw_baru` date NOT NULL,
  `tgl_batas_garansi_lama` date NOT NULL,
  `tgl_batas_garansi_baru` date NOT NULL,
  `id_staff_baru` int(11) NOT NULL,
  `id_staff_lama` int(11) NOT NULL,
  `waktu_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_hardware`
--

INSERT INTO `log_hardware` (`id_log_hw`, `id_hw_lama`, `id_lokasi_lama`, `id_lokasi_baru`, `id_departemen_lama`, `id_departemen_baru`, `tgl_beli_hw_lama`, `tgl_beli_hw_baru`, `tgl_batas_garansi_lama`, `tgl_batas_garansi_baru`, `id_staff_baru`, `id_staff_lama`, `waktu_ubah`) VALUES
(1, 2, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2022-02-01', '2022-02-01', 3, 1, '2021-03-10 00:29:40'),
(2, 3, 1, 1, 1, 1, '2021-02-01', '2021-02-17', '2021-03-03', '2021-03-03', 2, 2, '2021-03-10 12:23:55'),
(3, 11, 2, 2, 1, 1, '2021-02-15', '2021-02-15', '2021-03-31', '2021-03-31', 3, 3, '2021-03-19 13:01:56'),
(4, 11, 2, 2, 1, 1, '2021-02-15', '2021-02-15', '2021-03-31', '2021-03-31', 3, 3, '2021-03-19 13:04:56'),
(5, 11, 2, 2, 1, 1, '2021-02-15', '2021-02-15', '2021-03-31', '2021-03-31', 3, 3, '2021-03-19 13:05:06'),
(6, 9, 1, 1, 1, 1, '2021-02-02', '2021-02-02', '2021-05-15', '2021-05-15', 1, 1, '2021-03-19 13:09:49'),
(7, 3, 1, 2, 1, 3, '2021-02-17', '2021-02-17', '2021-03-03', '2021-03-03', 2, 2, '2021-03-19 13:12:40'),
(8, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 2, 2, '2021-03-19 13:39:23'),
(9, 8, 4, 4, 2, 2, '2021-03-29', '2021-03-29', '2021-03-31', '2021-03-31', 2, 2, '2021-03-19 13:39:35'),
(10, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 2, 2, '2021-03-19 13:44:06'),
(11, 3, 2, 2, 3, 3, '2021-02-17', '2021-02-17', '2021-03-03', '2021-03-03', 2, 2, '2021-03-19 13:47:03'),
(12, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 5, 2, '2021-03-19 13:48:03'),
(13, 1, 4, 4, 2, 2, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-19 13:48:53'),
(14, 1, 4, 4, 2, 2, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-19 13:52:52'),
(15, 12, 1, 1, 2, 2, '2021-03-01', '2021-03-01', '2021-03-31', '2021-03-31', 4, 4, '2021-03-19 13:56:31'),
(16, 8, 4, 4, 2, 2, '2021-03-29', '2021-03-29', '2021-03-31', '2021-03-31', 2, 2, '2021-03-19 13:57:04'),
(17, 9, 1, 1, 1, 1, '2021-02-02', '2021-02-02', '2021-05-15', '2021-05-15', 1, 1, '2021-03-19 13:59:39'),
(18, 1, 4, 1, 2, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-19 14:36:37'),
(19, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-19 15:13:08'),
(20, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-19 15:15:31'),
(21, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-19 22:47:09'),
(22, 2, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2022-02-01', '2022-02-01', 3, 3, '2021-03-19 22:47:20'),
(23, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 5, 5, '2021-03-19 22:47:55'),
(24, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 5, 5, '2021-03-19 22:48:28'),
(25, 8, 4, 4, 2, 2, '2021-03-29', '2021-03-29', '2021-03-31', '2021-03-31', 2, 2, '2021-03-19 22:49:03'),
(26, 4, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 2, 2, '2021-03-19 22:49:41'),
(27, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 5, 5, '2021-03-19 22:50:16'),
(28, 10, 3, 3, 2, 2, '2021-02-06', '2021-02-06', '2021-03-20', '2021-03-20', 3, 3, '2021-03-20 11:14:00'),
(29, 10, 3, 3, 2, 2, '2021-02-06', '2021-02-06', '2021-03-20', '2021-03-20', 3, 3, '2021-03-20 11:15:52'),
(30, 3, 2, 2, 3, 3, '2021-02-17', '2021-02-17', '2021-03-03', '2021-03-03', 2, 2, '2021-03-20 23:09:23'),
(31, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-20 23:14:57'),
(32, 3, 2, 2, 3, 3, '2021-02-17', '2021-02-17', '2021-03-03', '2021-03-03', 2, 2, '2021-03-20 23:15:39'),
(33, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-20 23:15:43'),
(34, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2022-02-17', 1, 1, '2021-03-20 23:15:52'),
(35, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2022-02-17', '2021-03-21', 1, 1, '2021-03-20 23:47:54'),
(36, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2021-03-21', '2021-03-21', 5, 1, '2021-03-23 09:59:36'),
(37, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2021-03-21', '2021-03-21', 5, 5, '2021-03-23 10:00:12'),
(38, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 5, 5, '2021-03-26 13:39:46'),
(39, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2021-03-21', '2021-03-21', 5, 5, '2021-03-28 22:14:44'),
(40, 1, 1, 1, 3, 3, '2021-02-26', '2021-02-26', '2021-03-21', '2021-03-21', 5, 5, '2021-03-28 22:20:07'),
(41, 2, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2022-02-01', '2022-02-01', 3, 3, '2021-03-29 13:43:42'),
(42, 5, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2021-03-03', '2021-03-03', 5, 5, '2021-03-29 15:27:20'),
(43, 1, 1, 3, 3, 3, '2021-02-26', '2021-02-26', '2021-03-21', '2021-03-21', 3, 5, '2021-03-29 15:36:13'),
(44, 1, 3, 4, 3, 6, '2021-02-26', '2021-02-26', '2021-03-21', '2021-03-21', 4, 3, '2021-03-29 15:40:09'),
(45, 2, 1, 1, 1, 1, '2021-02-01', '2021-02-01', '2022-02-01', '2022-02-01', 3, 3, '2021-03-29 16:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `log_software`
--

CREATE TABLE `log_software` (
  `id_log_sw` int(11) NOT NULL,
  `id_sw_lama` int(11) NOT NULL,
  `tgl_pembelian_lama` date NOT NULL,
  `tgl_pembelian_baru` date NOT NULL,
  `tgl_batas_lisensi_lama` date DEFAULT NULL,
  `tgl_batas_lisensi_baru` date DEFAULT NULL,
  `waktu_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_software`
--

INSERT INTO `log_software` (`id_log_sw`, `id_sw_lama`, `tgl_pembelian_lama`, `tgl_pembelian_baru`, `tgl_batas_lisensi_lama`, `tgl_batas_lisensi_baru`, `waktu_ubah`) VALUES
(1, 2, '2021-03-01', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-10 12:26:10'),
(2, 2, '2021-03-27', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-19 13:50:53'),
(3, 4, '2021-03-03', '2021-03-03', '2021-03-29', '2021-03-29', '2021-03-19 13:51:24'),
(4, 2, '2021-03-27', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-19 13:53:00'),
(5, 2, '2021-03-27', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-20 10:36:44'),
(6, 2, '2021-03-27', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-20 10:36:58'),
(7, 6, '2021-02-03', '2021-02-03', '2021-02-20', '2021-02-20', '2021-03-20 10:39:27'),
(8, 4, '2021-03-03', '2021-03-03', '2021-03-29', '2024-11-30', '2021-03-21 00:50:44'),
(9, 4, '2021-03-03', '2021-03-03', '2024-11-30', '2024-11-30', '2021-03-21 00:53:57'),
(10, 6, '2021-02-03', '2021-02-01', '2021-02-20', '2021-03-31', '2021-03-22 21:05:06'),
(11, 2, '2021-03-27', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-22 23:51:55'),
(12, 2, '2021-03-27', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-23 10:42:33'),
(13, 5, '2021-03-09', '2021-03-09', '2021-03-31', NULL, '2021-03-23 10:44:18'),
(14, 5, '2021-03-09', '2021-03-09', NULL, NULL, '2021-03-29 10:58:27'),
(15, 7, '0000-00-00', '2021-04-30', NULL, NULL, '2021-03-30 01:36:06'),
(16, 2, '2021-03-27', '2021-03-27', '2021-03-31', '2021-03-31', '2021-03-30 04:34:37'),
(17, 10, '2021-03-01', '2021-03-01', '2021-03-31', '2021-03-31', '2021-03-31 04:17:50'),
(18, 7, '2021-04-30', '2021-04-30', NULL, NULL, '2021-03-31 04:18:40'),
(19, 4, '2021-03-03', '2021-03-03', '2024-11-30', '2023-09-21', '2021-03-31 04:39:17');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Stand-in structure for view `software_day_left`
-- (See below for the actual view)
--
CREATE TABLE `software_day_left` (
`id_sw` int(20)
,`nama_sw` varchar(255)
,`tgl_batas_lisensi` date
,`day_left` int(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catatan`
--

CREATE TABLE `tbl_catatan` (
  `id_catatan` int(11) NOT NULL,
  `judul_catatan` varchar(255) NOT NULL,
  `isi_catatan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_catatan`
--

INSERT INTO `tbl_catatan` (`id_catatan`, `judul_catatan`, `isi_catatan`) VALUES
(1, 'Contact Person Admin', '0895360242060 (Alvin)\r\n0189329123942 (Ichsan)'),
(5, 'Mengedit Data (User)', 'Silahkan menghubungi contact person yang sudah disediakan.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'Dept. IT Infrastructure'),
(2, 'Dept. Furniture Industry'),
(3, 'Dept. Network Development'),
(4, 'Dept. Application Development'),
(5, 'Dept. Web Development'),
(6, 'Dept. Database Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hardware`
--

CREATE TABLE `tbl_hardware` (
  `id_hw` int(20) NOT NULL,
  `nama_hw` varchar(50) NOT NULL,
  `id_merk_hw` int(11) DEFAULT NULL,
  `seri_hw` varchar(30) DEFAULT NULL,
  `id_kategori_hw` int(5) DEFAULT NULL,
  `kode_asset` varchar(30) DEFAULT NULL,
  `id_kondisi` int(11) DEFAULT NULL,
  `harga_hw` decimal(50,0) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `tgl_beli_hw` date DEFAULT NULL,
  `tgl_batas_garansi` date DEFAULT NULL,
  `deskripsi_hw` varchar(255) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `sisa_hari` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hardware`
--

INSERT INTO `tbl_hardware` (`id_hw`, `nama_hw`, `id_merk_hw`, `seri_hw`, `id_kategori_hw`, `kode_asset`, `id_kondisi`, `harga_hw`, `id_lokasi`, `id_departemen`, `tgl_beli_hw`, `tgl_batas_garansi`, `deskripsi_hw`, `id_staff`, `sisa_hari`) VALUES
(1, 'Monitor', 117, 'Vision224', 1, 'HUI-WOR-439', 2, '10000000', 4, 6, '2021-02-26', '2021-03-21', 'Monitor kiosk cadangan', 4, '334'),
(2, 'MonitorA', 67, 'ZD0', 2, 'SDF32FDSF3', 2, '6000000', 1, 1, '2021-02-01', '2022-02-01', 'Monitor informasi ruang staff', 3, NULL),
(3, 'Keyboard', 67, 'P780', 4, 'HSD-1240', 1, '100000', 2, 3, '2021-02-17', '2021-03-03', 'Keyboard utama untuk meeting', 2, ''),
(4, 'Mouse', 82, 'P780', 4, 'HSD-1240', 1, '240000', 1, 1, '2021-02-01', '2021-03-03', 'mouse cadangan untuk meeting staff', 2, NULL),
(5, 'PC', 70, 'Aspire7-H-G70', 6, 'HSD-1240', 1, '15000000', 1, 1, '2021-02-01', '2021-03-03', 'PC data untuk meeting', 5, NULL),
(8, 'Keyboard Mekanik', 70, 'G9', 1, 'KYB-823921', 1, '1000000', 4, 2, '2021-03-29', '2021-03-31', 'Keyboard cadangan industri', 2, NULL),
(9, 'Mouse Wireless', 69, 'M-195', 1, 'MOU-932132', 2, '500000', 1, 1, '2021-02-02', '2021-05-15', 'Mouse wireless workstation ruang staff', 1, NULL),
(11, 'Speaker', 84, 'HG-260', 1, 'SIM-WOR-490', 3, '1000000', 2, 1, '2021-02-15', '2021-03-31', 'Speaker sekunder untuk rapat', 3, NULL),
(12, 'Proyektor', 78, 'P-132', 1, 'PYR-123892', 2, '8000000', 1, 2, '2021-03-01', '2021-03-31', 'Proyektor untuk kolaborasi staff', 4, NULL),
(13, 'Proyektor', 79, 'A723', 2, 'EPS-PRY-214', 1, '7000000', 1, 1, '2021-03-06', '2021-03-19', 'Proyektor lama ruang staff', 4, NULL),
(14, 'Speaker DUA', 84, 'HG-260', 1, 'SIM-WOR-531', 3, '1000000', 2, 1, '2021-02-15', '2021-03-31', 'Speaker lama ruang meeting', 3, NULL),
(15, 'Laptop Kantor', 73, 'ideapad 100', 5, 'LAP-21-9', 2, '5000000', 3, 6, '2021-03-30', '2022-03-31', 'Laptop office untuk security', 4, NULL),
(16, 'Unit Microcontroller', 122, 'UNO 2021.3.4', 7, 'DUINO-2021', 2, '500000', 4, 1, '2021-03-29', '2021-07-31', 'Unit arduino untuk riset dan pengembangan', 6, NULL),
(17, 'Monitor MAC', 72, 'IMAC', 1, 'MAC-WOR-A23', 2, '10000000', 5, 1, '2021-03-23', '2021-05-27', 'Monitor resepsionis 1', 8, NULL),
(18, 'Monitor MAC', 72, 'IMAC-Pro', 1, 'MAC-WOR-A32', 2, '7000000', 4, 5, '2021-03-16', '2022-02-25', 'Monitor resepsionis 2', 14, NULL),
(19, 'Speaker Tengah', 71, 'ADVUltra', 1, 'ADV-ULT-342', 1, '200000', 10, 4, '2021-03-16', '2022-08-12', 'Speaker lama tengah ruang', 12, NULL),
(20, 'Switch Mikro', 123, 'SWF44', 2, 'MKR-SW1-444', 2, '3000000', 9, 5, '2021-03-01', '2021-09-10', 'Switch direksi 1', 9, NULL),
(21, 'Router Center', 124, '2405-23TT', 2, 'CIS-SER-245', 2, '6000000', 8, 6, '2021-03-23', '2021-07-02', 'Router untuk jaringan manajer', 7, NULL),
(22, 'Harddisk Internal 2TB', 94, 'SGT.13', 4, 'SPA-SGT-029', 2, '2000000', 4, 4, '2021-03-22', '2021-03-31', 'Hardisk cadangan utama', 4, NULL),
(23, 'SSHD-IN-1TB', 94, 'SGT.S.H', 4, 'SEA-SSH-990', 2, '3000000', 4, 3, '2021-03-31', '2021-08-04', 'SSHD untuk cadangan PC', 13, NULL),
(24, 'Laptop Kerja2', 70, 'AD9258', 5, 'LAP-KER-4AS', 2, '6000000', 2, 2, '2021-03-15', '2021-03-31', 'Laptop office untuk meeting', 1, NULL),
(25, 'PC-Power', 81, 'LAT03i5', 6, 'DEL-PCL-098', 2, '20000000', 5, 5, '2021-03-23', '2021-03-31', 'PC utama di lobby', 4, NULL),
(26, 'SwitchPower', 123, 'MKR-P13', 2, 'MK-SER-024', 1, '2000000', 6, 2, '2020-06-09', '2021-03-25', 'Switch untuk instalasi power', 5, NULL),
(27, 'Laptop Mobile', 67, 'VAIO14', 5, 'LAP-VAI-4R4', 2, '10000000', 9, 6, '2021-03-22', '2021-03-31', 'Laptop untuk meeting eksternal', 3, NULL),
(28, 'Laptop Office Pro', 73, 'Carbon x1', 5, 'LEN-LAP-X123', 2, '35000000', 9, 3, '2021-03-01', '2022-07-08', 'Laptop Profesional Office', 4, NULL),
(29, 'Macbook', 72, 'PRO7', 5, 'MAC-BOO-482', 2, '30000000', 7, 1, '2021-03-08', '2022-05-18', 'Macbook untuk datacenter', 10, NULL),
(30, 'Proyektor Kolaborator', 83, 'Vision+62', 1, 'SSP-SDP-SDP', 2, '7000000', 10, 4, '2021-03-09', '2021-03-25', 'Proyektor utama ruang kolaborasi', 5, NULL),
(31, 'RAM2GBDDR5', 96, 'Vpro32', 4, 'VG-091-BIC', 2, '2000000', 4, 3, '2021-03-31', '2021-11-18', 'RAM sparepart fullspeed', 13, NULL),
(32, 'Flash Drive 32GB', 92, 'SanData', 7, 'SAN-DIS-142', 1, '200000', 7, 1, '2021-03-09', '2021-03-31', 'USB Flash Drive type c', 10, NULL),
(33, 'Flash Drive 16GB', 95, 'DataT', 7, 'KGS-DAT-097', 2, '50000', 3, 4, '2021-03-01', '2021-03-31', 'Flash Disk serba guna', 2, NULL),
(34, 'Mouse Mini', 85, 'VTRm2', 1, 'MOS-VRT-011', 3, '50000', 4, 5, '2020-08-02', '2021-02-18', 'Mouse bekas tim Web', 12, NULL),
(35, 'PC-Full', 77, 'HAWPAC', 6, 'HP-PC-HAW', 2, '30000000', 8, 6, '2021-03-01', '2021-12-15', 'PC manajer DB', 12, NULL),
(36, 'HUB-6', 98, 'Link-pro1', 2, 'PSD-391-DFF', 2, '2000000', 6, 2, '2021-03-31', '2021-07-23', 'Hub untuk komunikasi internal', 2, NULL),
(37, 'Laptop Kerja3', 93, 'Satellite3', 5, 'SAT-TOS-897', 3, '10000000', 4, 6, '2021-03-02', '2021-03-31', 'Laptop bekas tur bisnis', 1, NULL),
(38, 'RouterBA', 99, 'Link-DSS', 2, 'DLINK-00033', 2, '2000000', 3, 4, '2021-03-31', '2021-09-30', 'Router network security', 12, NULL),
(39, 'SSD-1TB', 106, 'AD-tb1', 4, 'ADT-IIJ-900', 2, '10000000', 7, 2, '2021-03-01', '2021-03-31', 'ADATA ssd baru Data Center', 13, NULL),
(40, 'Printer Alpha', 77, 'HPinkJet43', 3, 'OOP-918-BUD', 1, '6000000', 1, 4, '2021-03-02', '2021-05-15', 'Printer HP utama', 11, NULL),
(41, 'Mouse Dual Wireless', 121, 'WR-d2', 1, 'MOS-WRD-222', 1, '200000', 10, 3, '2021-03-08', '2021-05-15', 'Mouse umum kolaborator', 2, NULL),
(42, 'Laptop Office 1', 73, 'Yoga Pro 3', 5, 'LAP-YOG-238', 2, '20000000', 1, 2, '2021-03-03', '2021-03-31', 'Laptop mobile untuk meeting', 12, NULL),
(43, 'Mouse Wireless BT', 113, 'CPT098', 1, 'CPT-319-CCC', 2, '300000', 3, 4, '2021-03-31', '2021-09-24', 'Mouse mini wireless bluetooth', 10, NULL),
(44, 'Macbook', 72, 'Air4', 5, 'MAC-BOO-AI2', 2, '30000000', 9, 5, '2021-03-01', '2021-07-31', 'Macbook untuk direksi', 11, NULL),
(45, 'PC Office4', 67, 'SM-of4', 6, 'DDD-IHB-983', 2, '30000000', 7, 4, '2020-09-08', '2021-07-23', 'PC utama Data Center', 12, NULL),
(46, 'PC Apple', 72, 'MAC-PC6', 6, 'MAC-PCA-888', 1, '50000000', 7, 2, '2021-03-02', '2021-08-27', 'PC utama Data Center', 13, NULL),
(47, 'Laptop Presenter', 70, 'ZenbookU', 5, 'ZEN-AS-928', 2, '40000000', 2, 5, '2021-03-01', '2021-04-23', 'Laptop presenter utama ruang meeting', 4, NULL),
(48, 'Mouse Wireless Duo', 102, 'GIG88', 1, 'DID-GIG-A22', 2, '100000', 10, 2, '2021-06-08', '2021-07-16', 'Mouse cadangan', 2, NULL),
(49, 'Router0', 124, 'Catalyst33', 2, 'CIS-CAT-6', 2, '4000000', 7, 1, '2021-01-04', '2021-06-30', 'Router utama data center IT', 6, NULL),
(50, 'Google Glass 1', 120, 'GlassM', 7, 'GG-GLA-895', 2, '70000000', 10, 1, '2021-03-01', '2021-08-20', 'Perangkat Google Glass untuk riset', 1, NULL),
(51, 'Printer Direksi', 78, 'InkPro1', 3, 'PRI-CAN-465', 2, '5000000', 9, 6, '2020-11-15', '2021-07-15', 'Printer Direksi Instan', 12, NULL),
(52, 'Printer Dual', 78, 'SCPR4', 3, 'PRN-DUO-432', 1, '10000000', 8, 6, '2021-03-03', '2021-05-13', 'Printer fungsi ganda, print dan scan', 9, NULL),
(53, 'Microcontroller 2', 116, 'Mega32', 7, 'GEN-UNO-093', 2, '100000', 4, 1, '2021-03-01', '2021-07-22', 'Microcontroller untuk pengembangan infrastruktur', 4, NULL);

--
-- Triggers `tbl_hardware`
--
DELIMITER $$
CREATE TRIGGER `trigger_log_hw` BEFORE UPDATE ON `tbl_hardware` FOR EACH ROW BEGIN
   IF (NEW.id_lokasi <> OLD.id_lokasi OR NEW.id_departemen <> OLD.id_departemen OR NEW.tgl_beli_hw <> OLD.tgl_beli_hw OR NEW.tgl_batas_garansi <> OLD.tgl_batas_garansi OR NEW.id_staff <> OLD.id_staff) THEN
     INSERT INTO log_hardware
    set id_hw_lama = OLD.id_hw,
    id_lokasi_lama=old.id_lokasi,
    id_lokasi_baru=new.id_lokasi,
    id_departemen_lama=old.id_departemen,
    id_departemen_baru=new.id_departemen,
    tgl_beli_hw_lama=old.tgl_beli_hw,
    tgl_beli_hw_baru=new.tgl_beli_hw,
    tgl_batas_garansi_lama=old.tgl_batas_garansi,
    tgl_batas_garansi_baru=new.tgl_batas_garansi,
    id_staff_lama=old.id_staff,
    id_staff_baru=new.id_staff,
    waktu_ubah = NOW();
   END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_lisensi`
--

CREATE TABLE `tbl_jenis_lisensi` (
  `id_jenis_lisensi` int(5) NOT NULL,
  `jenis_lisensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_lisensi`
--

INSERT INTO `tbl_jenis_lisensi` (`id_jenis_lisensi`, `jenis_lisensi`) VALUES
(1, 'Subscription'),
(2, 'One-Time Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_hw`
--

CREATE TABLE `tbl_kategori_hw` (
  `id_kategori_hw` int(5) NOT NULL,
  `nama_kategori_hw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori_hw`
--

INSERT INTO `tbl_kategori_hw` (`id_kategori_hw`, `nama_kategori_hw`) VALUES
(1, 'Workstations'),
(2, 'Network'),
(3, 'Printer'),
(4, 'Sparepart'),
(5, 'Laptop'),
(6, 'PC'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kondisi`
--

CREATE TABLE `tbl_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `icon_kondisi` varchar(255) NOT NULL,
  `text_kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kondisi`
--

INSERT INTO `tbl_kondisi` (`id_kondisi`, `nama_kondisi`, `icon_kondisi`, `text_kondisi`) VALUES
(1, 'Rusak Ringan ', 'fa fa-info-circle fa-fw', 'text-warning'),
(2, 'Baik ', 'fa fa-check-circle fa-fw', 'text-success'),
(3, 'Rusak ', 'fa fa-warning fa-fw', 'text-danger');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'R. Staff'),
(2, 'R. Meeting'),
(3, 'R. Security'),
(4, 'R. Gudang'),
(5, 'R. Lobby'),
(6, 'R. Dapur'),
(7, 'R. Data Center'),
(8, 'R. Manajer'),
(9, 'R. Direksi'),
(10, 'R. Kolaborasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk_hw`
--

CREATE TABLE `tbl_merk_hw` (
  `id_merk_hw` int(11) NOT NULL,
  `nama_merk_hw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_merk_hw`
--

INSERT INTO `tbl_merk_hw` (`id_merk_hw`, `nama_merk_hw`) VALUES
(67, 'Samsung'),
(69, 'LG'),
(70, 'Asus'),
(71, 'Advan'),
(72, 'Apple'),
(73, 'Lenovo'),
(74, 'Polytron'),
(75, 'Sony'),
(76, 'Acer'),
(77, 'HP'),
(78, 'Canon'),
(79, 'Epson'),
(80, 'Casio'),
(81, 'Dell'),
(82, 'Logitech'),
(83, 'Compaq'),
(84, 'Simbada'),
(85, 'Votre'),
(86, 'Genius'),
(87, 'JBL'),
(88, 'Anker'),
(89, 'Marshall'),
(90, 'Altec'),
(91, 'Advance'),
(92, 'Sandisk'),
(93, 'Toshiba'),
(94, 'Seagate'),
(95, 'Kingstone'),
(96, 'V-Gen'),
(97, 'TP-Link'),
(98, 'Prolink'),
(99, 'D-Link'),
(100, 'Netlink'),
(101, 'Diamond'),
(102, 'Gigabyte'),
(103, 'TheBrand'),
(104, 'Megaton'),
(105, 'QUEEN'),
(106, 'Adata'),
(108, 'BenQ'),
(109, 'Merk B'),
(110, 'Rodi'),
(111, 'Rido'),
(113, 'Cliptech'),
(114, 'Robot'),
(115, 'Micropack'),
(116, 'Genuino'),
(117, 'Huion'),
(118, 'RaspberryPi'),
(119, 'Microstock'),
(120, 'Google'),
(121, 'Microsoft'),
(122, 'Arduino'),
(123, 'Mikrotik'),
(124, 'Cisco');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk_sw`
--

CREATE TABLE `tbl_merk_sw` (
  `id_merk_sw` int(11) NOT NULL,
  `nama_merk_sw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_merk_sw`
--

INSERT INTO `tbl_merk_sw` (`id_merk_sw`, `nama_merk_sw`) VALUES
(1, 'ESET'),
(2, 'Adobe'),
(3, 'Corel'),
(4, 'Microsoft'),
(5, 'Oracle'),
(6, 'IBM'),
(7, 'SAP'),
(8, 'Symantec'),
(9, 'EMC'),
(10, 'VMware'),
(11, 'HP'),
(12, 'Intuit'),
(13, 'Cisco'),
(14, 'Autodesk'),
(15, 'Google'),
(16, 'Piriform'),
(17, 'IObit'),
(18, 'AVG'),
(19, 'MacAfee'),
(20, 'Kespersky'),
(21, 'Norton'),
(22, 'Sony'),
(23, 'Wondershare'),
(24, 'Internet Download Manager'),
(25, 'FLStudio'),
(26, 'Figma'),
(27, 'Avira'),
(28, 'inVision'),
(29, 'Davinci'),
(30, 'Ashampoo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_software`
--

CREATE TABLE `tbl_software` (
  `id_sw` int(20) NOT NULL,
  `nama_sw` varchar(255) NOT NULL,
  `id_merk_sw` int(11) DEFAULT NULL,
  `id_jenis_lisensi` int(11) NOT NULL,
  `id_hw` int(11) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `tgl_batas_lisensi` date DEFAULT NULL,
  `harga_sw` decimal(50,0) DEFAULT NULL,
  `kode_lisensi` varchar(255) DEFAULT NULL,
  `deskripsi_sw` varchar(255) DEFAULT NULL,
  `versi_sw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_software`
--

INSERT INTO `tbl_software` (`id_sw`, `nama_sw`, `id_merk_sw`, `id_jenis_lisensi`, `id_hw`, `tgl_pembelian`, `tgl_batas_lisensi`, `harga_sw`, `kode_lisensi`, `deskripsi_sw`, `versi_sw`) VALUES
(2, 'IObit Internet Security', 17, 1, 5, '2021-03-27', '2021-03-31', '1300000', 'cwec-v332-v23v-2v3v', 'Internet Security untuk PC', '12.3.2.1'),
(3, 'ESET Antivirus', 1, 1, 5, '2021-03-17', '2021-03-31', '2000000', 'ASD78-ASDJ3-ASDUI-GFO45', 'Antivirus PC kerja', '13.0.212'),
(4, 'Adobe Illustrator', 2, 1, 15, '2021-03-03', '2023-09-21', '2000000', 'ASD78-ASDJ3-ASDUI-GFO45-XVCU4', 'Aplikasi editor gambar vektor Adobe', '21.5.53.1'),
(6, 'CCleaner', 16, 1, 15, '2021-02-01', '2021-03-31', '1000000', '333-3f4-g55-h45', 'Aplikasi pembersih sampah digital PC', '2020.997.3.1'),
(7, 'Corel Draw x6', 3, 2, 5, '2021-04-30', NULL, '3000000', '1223-1212-3424-5241', 'Software editor gambar vektor', '2017.3.1'),
(8, 'Corel Draw 19', 3, 2, 5, '2021-03-23', NULL, '2400000', 'ddu2-4rf2-f32f-1f13', 'Corel draw versi tahun 2019', '2019.5.3'),
(9, 'AutoCAD 2020', 14, 2, 5, '2021-03-08', NULL, '5000000', 'swo1-3d33-dewr-13ed', 'Aplikasi prototyping hardware', '2020.8.4.1'),
(10, 'Android Studio 5 Enterprise', 15, 1, 5, '2021-03-01', '2021-03-31', '1000000', '1233-2344-3455-4566', 'Aplikasi developer android versi Entreprise', '5.2021.4.5'),
(11, 'Corel PhotoPaint', 3, 2, 15, '2021-03-23', NULL, '500000', '232c-2r4c-4ff5-f35v', 'Aplikasi corel pengolah gambar bitmap', '5.2021.4.5'),
(12, 'Corel PhotoPaint', 3, 2, 15, '2021-03-23', NULL, '500000', '232c-2r4c-4ff5-f35v', 'Aplikasi corel pengolah gambar bitmap', '5.2021.4.5'),
(13, 'Database Management Enterprise', 5, 1, 35, '2021-03-01', '2021-06-18', '1200000', 'www-244-532-dcc', 'Database management', '230.2342.31a'),
(14, 'SQL server Pro', 4, 2, 25, '2021-03-17', NULL, '2000000', '222-353-f24-536', 'Database management dari Microsoft', '2021.99.45'),
(15, 'Photoshop Cs6', 2, 1, 24, '2021-03-02', '2021-08-19', '1000000', 'dddd-555gg-34fg-23f2', 'Manipulator gambar bitmap', '2016.344.21'),
(16, 'Kaspersky Antivirus Pro', 20, 1, 27, '2021-03-17', '2021-04-15', '500000', 'wefj-v242-2vv4-24f1', 'Aplikasi sekuritas', '444.64.2020'),
(17, 'Oracle VMware Enterprise', 10, 2, 46, '2021-03-31', NULL, '5000000', 'swxc-e3ff-42gf-g24g', 'VMware untuk kelola virtual machine', '333.978.86.3'),
(18, 'Microsoft Office 365', 4, 1, 28, '2021-03-02', '2022-02-11', '2000000', '4f44-4f44-2g44-24gh', 'Aplikasi office profesional', '2021.4.3.4'),
(19, 'Microsoft Office 2016', 4, 2, 29, '2021-03-01', NULL, '3000000', 'swo1-3d33-dewr-13ed', 'Aplikasi office profesional 2016', '2021.99.667'),
(20, 'IObit Driver Update', 17, 1, 44, '2021-03-09', '2021-04-22', '5000000', 'swo1-3d33-dewr-13ed', 'Aplikasi driver update', '2121.979.675'),
(21, 'Norton Utility', 21, 2, 24, '2021-03-31', NULL, '3000000', '222-353-f24-536', 'Aplikasi troubleshooting sistem', '2424.96.63'),
(22, 'Filmora 2020', 23, 2, 27, '2021-03-02', NULL, '1000000', 'www-244-532-dcc', 'Editor video kegiatan', '2020.8.4.1'),
(23, 'AVG antimalware', 18, 2, 27, '2021-03-08', NULL, '1300000', 'dddd-555gg-34fg-23f2', 'Antimalware kantor', '230.2342.31a'),
(24, 'Magix Vegas Pro 2020', 22, 1, 29, '2021-03-16', '2021-08-19', '500000', '4666-i6i6-y557-8989', 'Editor video kegiatan staff', '4444.13.30.2021'),
(25, 'Internet Download Manager', 24, 2, 37, '2021-03-24', NULL, '1300000', '24rf-24f4-22gv-4213', 'Download manager laptop kantor', '2016.344.21'),
(26, 'IObit Antivirus', 17, 1, 37, '2021-03-01', '2021-05-14', '1000000', 'bteb-ik75-89k6-7iku', 'Antivirus laptop kerja', '230.2342.31a'),
(27, 'Microsoft Office 2019 Pro', 4, 2, 42, '2021-03-31', NULL, '5000000', 'dddd-eeee-3re2-v23v', 'Aplikasi office profesional 2019', '2021.99.45'),
(28, 'FLStudio20', 25, 2, 25, '2021-03-09', NULL, '500000', '222-353-f24-536', 'Aplikasi olah audio profesional', '2020.8.4.1'),
(29, 'inVision Desktop Pro', 28, 1, 37, '2021-03-01', '2022-06-09', '1000000', 'wed3-3f4f-24g4-24g2', 'Aplikasi desain UX dengan kolaborator', '2020.131.145'),
(30, 'Cisco Webex Meeting', 13, 1, 35, '2021-03-11', '2022-03-03', '1000000', 'eeec-ec22-23ff-4g42', 'Aplikasi online meeting dengan client', '2021.44.56'),
(31, 'Ashampoo Uninstaller Pro', 30, 2, 24, '2021-03-30', NULL, '2000000', '2222-4444-2425-2546', 'Aplikasi uninstaller khusus', '3444.2021.445'),
(32, 'Davinci Studio 17', 29, 2, 25, '2021-03-08', NULL, '2000000', '3231-134f-31f1-3rf3', 'Aplikasi editor video alternatif', '2021.2.245.25'),
(33, 'Adobe Ligthroom CC', 2, 1, 45, '2021-03-15', '2021-04-23', '200000', '1332-13ff-23g4-24gf', 'Aplikasi audit foto digital', '2021.425.13.1'),
(34, 'Adobe Xd CC Pro', 2, 1, 47, '2021-03-01', '2021-04-01', '200000', '2232-2456-5888-6854', 'Aplikasi desain UI/UX dan prototyping dari Adobe', '2020.14.1.4'),
(35, 'EMC Equation Pro 2020', 9, 1, 28, '2021-03-01', '2021-04-23', '100000', '8kh5-56j4-4678-56hg', 'Aplikasi pelaporan digital marketing', '2020.13.25.6'),
(36, 'Intuit Cloud Accounting', 12, 1, 46, '2021-03-08', '2021-04-08', '200000', '31e1-2334-24f1-1f14', 'Aplikasi akuntansi cloud', '122.245.2021.3'),
(37, 'Symantec Cloud Security', 8, 1, 35, '2021-03-01', '2021-04-16', '200000', 'd334-24gt-24g3-13f4', 'Aplikasi keamanan cloud', '2020.43.35a'),
(38, 'IBM SPSS Statistic', 6, 1, 45, '2021-03-01', '2021-09-09', '300000', '13d1-13f1-13fg-g556', 'Aplikasi pengolah data statistik perusahaan', '2021.1.34'),
(39, 'Microsoft Azure Cloud', 4, 1, 47, '2021-03-24', '2021-04-15', '100000', '222-353-f24-536', 'Aplikasi dan layanan cloud computing microsoft', '2021.9.24'),
(40, 'SAP SE Data Processing', 7, 1, 47, '2021-03-09', '2022-02-11', '500000', 'ee34-wgg5-68k6-4522', 'Aplikasi pengolah data bisnis', '5.2021.4.2'),
(41, 'VMware Workstation Pro', 10, 2, 35, '2021-03-25', NULL, '2000000', '222-353-f24-536', 'Aplikasi pengelola virtual machine', '2020.8.4.1'),
(42, 'IBM Watson Studio', 6, 1, 25, '2021-03-23', '2021-07-15', '1000000', '3d11-f1ff-g24g-h675', 'Aplikasi dan layanan Cloud AI untuk bisnis', '230.42.2020');

--
-- Triggers `tbl_software`
--
DELIMITER $$
CREATE TRIGGER `trigger_log_sw` BEFORE UPDATE ON `tbl_software` FOR EACH ROW BEGIN
   IF (NEW.tgl_pembelian <> OLD.tgl_pembelian OR NEW.tgl_batas_lisensi <> OLD.tgl_batas_lisensi OR NEW.nama_sw <> OLD.nama_sw) THEN
    INSERT INTO log_software
    set id_sw_lama = old.id_sw,
    tgl_pembelian_lama=old.tgl_pembelian,
    tgl_pembelian_baru=new.tgl_pembelian,
    tgl_batas_lisensi_lama=old.tgl_batas_lisensi,
    tgl_batas_lisensi_baru=new.tgl_batas_lisensi,
    waktu_ubah = NOW();
   END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(255) NOT NULL,
  `no_telp_staff` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id_staff`, `nama_staff`, `no_telp_staff`) VALUES
(1, 'Bagas Pradana', '089234923403'),
(2, 'Raffi Ahmad', '084444444444'),
(3, 'Danang Fauzi', '089123231234'),
(4, 'Artanto Galih Pradipta', '089123932409'),
(5, 'Taufik Dimas Saputra', '08123092314'),
(6, 'Darmaji Manullang', '08237431234'),
(7, 'Ian Salahudin', '085231294243'),
(8, 'Jefri Nasrullah Utama', '081723421434'),
(9, 'Silvia Yuni Hariyah', '08323443314'),
(10, 'Paramita Pratiwi', '08123234999'),
(11, 'Clara Raisa Pudjiastuti', '088231194388'),
(12, 'Gadang Darmana Winarno', '087231434322'),
(13, 'Diana Nur Auliasari', '085641244766'),
(14, 'Septiani Almaidah Kusumawati Dewi', '089666777444'),
(15, 'Dewi Iswati', '088666345222');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'JVT Inventory', 'jvtinventory@gmail.com', NULL, '$2y$10$YUsAt7gRDDBJOl8YwvmkvexwodOyjkEwFSEhnrD6rGtWj24MZgaiW', NULL, '2021-03-25 02:49:01', '2021-03-25 02:49:01', 'Admin'),
(9, 'Alexander Pierce', 'alexander@gmail.com', NULL, '$2y$10$glN2sbtcFMCabgLBZ6vdseAIwNZwimnHb3P/0KjTqEtX4uAe4K/lG', NULL, '2021-03-18 01:23:57', '2021-03-18 01:23:57', 'User'),
(10, 'Arbila Neisya', 'arbila@gmail.com', NULL, '$2y$10$YCaGTdWRDBCF44kxOcXgG.WpTUWEQ9i0cJe1CM0tkEZ9tJyPknL/e', NULL, '2021-03-18 01:41:35', '2021-03-18 01:41:35', 'User'),
(11, 'Alvin Alvrahesta', 'alvin@gmail.com', NULL, '$2y$10$I9eAGQfxiUcFKxDF9CFX9OFMXXgwEMXrcpUSBzVm3UhXtI9dZA/FS', NULL, '2021-03-18 15:35:28', '2021-03-18 02:27:12', 'Admin'),
(12, 'Aldy Sufriyanto', 'aldy@gmail.com', NULL, '$2y$10$0A6I5z7soL3mYVrWFdma/uST.DCkxa5bCS6q4qKoa0BxEqvPSjL46', NULL, '2021-03-18 15:35:44', '2021-03-18 04:51:14', 'Admin'),
(13, 'Jeremy Martin', 'jeremy@gmail.com', NULL, '$2y$10$/DPONftRejzmTc0kPjf.wuRDyuXijcG7HFP6U7lPZXoZ4yKFX3YHO', NULL, '2021-03-18 04:59:57', '2021-03-18 04:59:57', 'User'),
(14, 'Ichsan Arsyi Putra', 'ichsan@gmail.com', NULL, '$2y$10$acPD0ZfCgjcKs.yGE8ELWOb0wmCkKg1ZdYT/LanyJS1LYKpm8Avbe', NULL, '2021-03-18 05:02:49', '2021-03-18 15:36:12', 'Admin'),
(15, 'Wahyu Liga', 'wahyu@gmail.com', NULL, '$2y$10$hZiszpsxJrz9Bspg07h.pOYSD33cPIQSvAApoQelNcrwdtulIifMe', NULL, '2021-03-18 15:35:55', '2021-03-18 05:05:08', 'Admin'),
(16, 'Lina Aulia', 'lina@gmail.com', NULL, '$2y$10$KC6hognU2P77M2s0voPrL.eFh28YgtRHey/NeVNAYQHWjOXLBE7Ee', NULL, '2021-03-18 15:36:08', '2021-03-18 15:36:25', 'User'),
(17, 'Joko Widodo', 'joko@gmail.com', NULL, '$2y$10$EkdM3v2OHrprnwPBZ9EhwuaV.d8EMjC2Aol3J6xBoTpNZ8Kgg95aq', NULL, '2021-03-18 05:29:26', '2021-03-18 15:36:28', 'User'),
(18, 'Norma Sakinah', 'norma@gmail.com', NULL, '$2y$10$7mA/cMvQ1bEDpWu6Ske/T./J9Sw9LN1gvXXE4truWSPJ0O2ry6/ia', NULL, '2021-03-18 12:54:13', '2021-03-18 12:54:13', 'User'),
(19, 'Budi Prakoso', 'budi@gmail.com', NULL, '$2y$10$j.a5WDC9SihaDufzmYL5BOG1//.JgkLoTVkEcxLdXLfjeewzza5li', NULL, '2021-03-19 10:12:47', '2021-03-19 10:12:47', 'Admin'),
(20, 'Linda Sahaja', 'linda@gmail.com', NULL, '$2y$10$SwK3y6mRZQFHKgJLcH0xIO.nOpOp6.lGXQH4qhTH0tbVbmrZGY6hy', NULL, '2021-03-19 19:05:58', '2021-03-19 19:05:58', 'Admin'),
(21, 'Rehan Dwi Putra', 'rehan@gmail.com', NULL, '$2y$10$vOVGjSPJXDE/gcsNWNH2kewVyihUth4OXUBiEo2lYZqMyJdam72Fm', NULL, '2021-03-19 21:36:52', '2021-03-19 21:36:52', 'User'),
(22, 'Brahma Putra', 'brahma@gmail.com', NULL, '$2y$10$3/IveCbajLr/53u0v4Y2Jugd1WztcEwKRZ27W6smOxVYa69e5zzvy', NULL, '2021-03-19 21:44:08', '2021-03-19 21:44:08', 'User'),
(43, 'Zaky Rido', 'zaky@gmail.com', NULL, '$2y$10$Q25bNKQ2lH5TOlIxgk8J4ueg1eRtP9Mx0bGO525gm347mwLcaP7bO', NULL, '2021-03-25 03:21:59', '2021-03-25 03:21:59', 'User'),
(44, 'Rian', 'rian@gmai.com', NULL, '$2y$10$hMtdT2Dx0ik/MpPp65QmNOCbQqD7hX0ms7dX.MmpUJ4Qxex3Mp6Me', NULL, '2021-03-29 05:33:38', '2021-03-29 05:33:38', 'Admin');

-- --------------------------------------------------------

--
-- Structure for view `hardware_day_left`
--
DROP TABLE IF EXISTS `hardware_day_left`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hardware_day_left`  AS SELECT `tbl_hardware`.`id_hw` AS `id_hw`, `tbl_hardware`.`nama_hw` AS `nama_hw`, `tbl_merk_hw`.`nama_merk_hw` AS `nama_merk_hw`, `tbl_hardware`.`seri_hw` AS `seri_hw`, `tbl_hardware`.`tgl_batas_garansi` AS `tgl_batas_garansi`, (select case when to_days(`tbl_hardware`.`tgl_batas_garansi`) - to_days(current_timestamp()) >= 0 then to_days(`tbl_hardware`.`tgl_batas_garansi`) - to_days(current_timestamp()) else 0 end) AS `day_left` FROM (`tbl_hardware` left join `tbl_merk_hw` on(`tbl_hardware`.`id_merk_hw` = `tbl_merk_hw`.`id_merk_hw`)) ;

-- --------------------------------------------------------

--
-- Structure for view `software_day_left`
--
DROP TABLE IF EXISTS `software_day_left`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `software_day_left`  AS SELECT `tbl_software`.`id_sw` AS `id_sw`, `tbl_software`.`nama_sw` AS `nama_sw`, `tbl_software`.`tgl_batas_lisensi` AS `tgl_batas_lisensi`, (select case when to_days(`tbl_software`.`tgl_batas_lisensi`) - to_days(current_timestamp()) >= 0 then to_days(`tbl_software`.`tgl_batas_lisensi`) - to_days(current_timestamp()) else 0 end AS `day_left`) AS `day_left` FROM `tbl_software` WHERE `tbl_software`.`id_jenis_lisensi` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `log_hardware`
--
ALTER TABLE `log_hardware`
  ADD PRIMARY KEY (`id_log_hw`),
  ADD KEY `index_id_hw` (`id_hw_lama`) USING BTREE,
  ADD KEY `id_hw` (`id_hw_lama`);

--
-- Indexes for table `log_software`
--
ALTER TABLE `log_software`
  ADD PRIMARY KEY (`id_log_sw`);

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
-- Indexes for table `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tbl_hardware`
--
ALTER TABLE `tbl_hardware`
  ADD PRIMARY KEY (`id_hw`),
  ADD KEY `index_id_merk_hw` (`id_merk_hw`),
  ADD KEY `index_id_kondisi` (`id_kondisi`),
  ADD KEY `index_id_departemen` (`id_departemen`),
  ADD KEY `index_id_lokasi` (`id_lokasi`) USING BTREE,
  ADD KEY `index_id_kategori_hw` (`id_kategori_hw`) USING BTREE,
  ADD KEY `index_id_staff` (`id_staff`);

--
-- Indexes for table `tbl_jenis_lisensi`
--
ALTER TABLE `tbl_jenis_lisensi`
  ADD PRIMARY KEY (`id_jenis_lisensi`);

--
-- Indexes for table `tbl_kategori_hw`
--
ALTER TABLE `tbl_kategori_hw`
  ADD PRIMARY KEY (`id_kategori_hw`);

--
-- Indexes for table `tbl_kondisi`
--
ALTER TABLE `tbl_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_merk_hw`
--
ALTER TABLE `tbl_merk_hw`
  ADD PRIMARY KEY (`id_merk_hw`);

--
-- Indexes for table `tbl_merk_sw`
--
ALTER TABLE `tbl_merk_sw`
  ADD PRIMARY KEY (`id_merk_sw`);

--
-- Indexes for table `tbl_software`
--
ALTER TABLE `tbl_software`
  ADD PRIMARY KEY (`id_sw`),
  ADD KEY `index_id_jenis_lisensi` (`id_jenis_lisensi`),
  ADD KEY `index_id_merk_sw` (`id_merk_sw`),
  ADD KEY `index_id_hw` (`id_hw`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id_staff`);

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
-- AUTO_INCREMENT for table `log_hardware`
--
ALTER TABLE `log_hardware`
  MODIFY `id_log_hw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `log_software`
--
ALTER TABLE `log_software`
  MODIFY `id_log_sw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_hardware`
--
ALTER TABLE `tbl_hardware`
  MODIFY `id_hw` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_jenis_lisensi`
--
ALTER TABLE `tbl_jenis_lisensi`
  MODIFY `id_jenis_lisensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori_hw`
--
ALTER TABLE `tbl_kategori_hw`
  MODIFY `id_kategori_hw` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kondisi`
--
ALTER TABLE `tbl_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_merk_hw`
--
ALTER TABLE `tbl_merk_hw`
  MODIFY `id_merk_hw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_merk_sw`
--
ALTER TABLE `tbl_merk_sw`
  MODIFY `id_merk_sw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_software`
--
ALTER TABLE `tbl_software`
  MODIFY `id_sw` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hardware`
--
ALTER TABLE `tbl_hardware`
  ADD CONSTRAINT `tbl_hardware_ibfk_10` FOREIGN KEY (`id_kategori_hw`) REFERENCES `tbl_kategori_hw` (`id_kategori_hw`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hardware_ibfk_11` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id_lokasi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hardware_ibfk_12` FOREIGN KEY (`id_staff`) REFERENCES `tbl_staff` (`id_staff`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hardware_ibfk_2` FOREIGN KEY (`id_departemen`) REFERENCES `tbl_departemen` (`id_departemen`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hardware_ibfk_3` FOREIGN KEY (`id_merk_hw`) REFERENCES `tbl_merk_hw` (`id_merk_hw`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hardware_ibfk_9` FOREIGN KEY (`id_kondisi`) REFERENCES `tbl_kondisi` (`id_kondisi`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_software`
--
ALTER TABLE `tbl_software`
  ADD CONSTRAINT `tbl_software_ibfk_1` FOREIGN KEY (`id_jenis_lisensi`) REFERENCES `tbl_jenis_lisensi` (`id_jenis_lisensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_software_ibfk_2` FOREIGN KEY (`id_merk_sw`) REFERENCES `tbl_merk_sw` (`id_merk_sw`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_software_ibfk_3` FOREIGN KEY (`id_hw`) REFERENCES `tbl_hardware` (`id_hw`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
