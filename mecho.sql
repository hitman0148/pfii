-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 04:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$ckDre6BkE7dyhTmOZy696e9MaH7cP9yXRi3KX.CI/gRXijyN58.BK', NULL, '2024-09-02 06:50:22', '2024-09-02 06:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `className` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allDay` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `title`, `description`, `start`, `end`, `className`, `icon`, `allDay`, `date_created`, `created_by`, `is_active`) VALUES
(1, 'Title', 'Test', '03 September 2024 10:50 pm', '03 September 2024 10:50 pm', 'fc-bg-default', 'circle', 1, '2024-09-02 00:00:00', 'Admin', 'Y'),
(2, 'Test Event', 'tes', '10 October 2024 11:51 pm', '10 October 2024 11:51 pm', 'fc-bg-default', 'circle', 1, '2024-10-01 00:00:00', 'Admin', 'Y');

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
-- Table structure for table `md_months`
--

CREATE TABLE `md_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `md_months`
--

INSERT INTO `md_months` (`id`, `month`, `year`, `date_created`, `created_by`, `is_deleted`) VALUES
(1, 'Jul', '2024', '2024-02-27 10:35:52', NULL, 'N'),
(2, 'Aug', '2024', '2024-02-27 10:35:52', NULL, 'N'),
(3, 'Sep', '2024', '2024-02-27 10:35:52', NULL, 'N');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_07_03_075720_create_clients_table', 1),
(5, '2024_07_03_101255_create_admins_table', 1),
(6, '2024_07_03_101307_create_sellers_table', 1),
(7, '2024_07_28_051736_create_p_f_i_i__members_table', 1),
(8, '2024_07_28_051819_create_p_f_i_i_designations_table', 1),
(9, '2024_07_28_051929_create_p_f_i_i__accomps_table', 1),
(10, '2024_08_20_050437_create_calendars_table', 1),
(11, '2024_10_02_171425_monthlydue', 2),
(12, '2024_10_03_182114_md_months', 3);

-- --------------------------------------------------------

--
-- Table structure for table `monthlydue`
--

CREATE TABLE `monthlydue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mid` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthlydue`
--

INSERT INTO `monthlydue` (`id`, `mid`, `date`, `amt`, `date_created`, `created_by`) VALUES
(1, 1, 'sdf', '100', '2024-10-03 00:00:00', 'Ruben'),
(2, 1, '10', '100', '2024-10-03 00:00:00', 'Ruben');

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
-- Table structure for table `pfii_accomps`
--

CREATE TABLE `pfii_accomps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_date` date NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personels` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pfii_accomps`
--

INSERT INTO `pfii_accomps` (`id`, `activity_date`, `site`, `activity`, `remarks`, `personels`, `date_created`, `created_by`, `is_active`) VALUES
(1, '2024-09-02', 'Shell', 'GMM', 'Remarks', '3+4', '2024-09-02', 'Admin', 'Y'),
(2, '2024-10-03', 'asdf', 'asdf', 'asdf', '3+4', '2024-10-02', 'Admin', 'N'),
(3, '2024-09-29', 'padil pitugo', 'prayer: ruel de leon<br>introduce your self<br>opening remarks: james martino<br>treasurers report:&nbsp; liquidation of budget : raquel mandar<br>future activity: tree planting in laguna', 'time in: 6:30 pm  \r\ntime out:  9:00 pm', '4', '2024-10-02', 'Admin', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pfii_designations`
--

CREATE TABLE `pfii_designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `date_created` date NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pfii_designations`
--

INSERT INTO `pfii_designations` (`id`, `designation`, `is_active`, `date_created`, `created_by`) VALUES
(1, 'CHAPTER COMMANDER', 'Y', '2024-09-02', 'Admin'),
(2, 'CHAPTER DEPUTY CMDR-ADMIN', 'Y', '2024-09-02', 'Admin'),
(3, 'CHAPTER DEPUTY CMDR-OPERATION', 'Y', '2024-09-02', 'Admin'),
(4, 'CHAPTER SECERETARY', 'Y', '2024-09-02', 'Admin'),
(5, 'CHAPTER TREASURER', 'Y', '2024-09-02', 'Admin'),
(6, 'CHAPTER AUDITOR', 'Y', '2024-09-02', 'Admin'),
(7, 'CHAPTER ADVISER', 'Y', '2024-09-02', 'Admin'),
(8, 'CHAPTER P.I.O', 'Y', '2024-09-02', 'Admin'),
(9, 'CHAPTER COORDINATOR', 'Y', '2024-09-02', 'Admin'),
(10, 'CHAPTER OFFICER-MEMBERSHIP', 'Y', '2024-09-02', 'Admin'),
(11, 'CHAPTER OFFICER-GRIEVANCE', 'Y', '2024-09-02', 'Admin'),
(12, 'CHAPTER OFFICER-ANTI-CRIME', 'Y', '2024-09-02', 'Admin'),
(13, 'CHAPTER OFFICER-COMMUNITY SERVICE', 'Y', '2024-09-02', 'Admin'),
(14, 'CHAPTER OFFICER-MARSHALL', 'Y', '2024-09-02', 'Admin'),
(15, 'CHAPTER OFFICER-MONITORING', 'Y', '2024-09-02', 'Admin'),
(16, 'CHAPTER OFFICER-RADIO COMM', 'Y', '2024-09-02', 'Admin'),
(17, 'CHAPTER OFFICER-RESCUE', 'Y', '2024-09-02', 'Admin'),
(18, 'CHAPTER OFFICER-INTELLIGENCE', 'Y', '2024-09-02', 'Admin'),
(19, 'CHAPTER OFFICER-TRAFFIC', 'Y', '2024-09-02', 'Admin'),
(20, 'CHAPTER OFFICER-ANTI ILL. DRUGS', 'Y', '2024-09-02', 'Admin'),
(21, 'CHAPTER OFFICER-EDUCATION', 'Y', '2024-09-02', 'Admin'),
(22, 'CHAPTER OFFICER-RELIEF OPERATION', 'Y', '2024-09-02', 'Admin'),
(23, 'CHAPTER OFFICER-INSPECTOR', 'Y', '2024-09-02', 'Admin'),
(24, 'CHAPTER OFFICER-WAYS AND MEANS', 'Y', '2024-09-02', 'Admin'),
(25, 'CHAPTER OFFICER-SPECIAL OPERATION', 'Y', '2024-09-02', 'Admin'),
(26, 'CHAPTER OFFICER-LIVELIHOOD', 'Y', '2024-09-02', 'Admin'),
(27, 'CHAPTER OFFICER-PROPERTY CUSTODIAN', 'Y', '2024-09-02', 'Admin'),
(28, 'CHAPTER OFFICER-MARKETING', 'Y', '2024-09-02', 'Admin'),
(29, 'CHAPTER OFFICER-MEDIA', 'Y', '2024-09-02', 'Admin'),
(30, 'CHAPTER OFFICER-YOUTH', 'Y', '2024-09-02', 'Admin'),
(31, 'CHAPTER OFFICER-BROTHERHOOD', 'Y', '2024-09-02', 'Admin'),
(32, 'CHAPTER OFFICER-INVESTIGATION', 'Y', '2024-09-02', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pfii_members`
--

CREATE TABLE `pfii_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_stat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pfii_members`
--

INSERT INTO `pfii_members` (`id`, `id_no`, `fname`, `lname`, `mi`, `bday`, `gender`, `civil_stat`, `address`, `mobile_no`, `date_expiration`, `is_active`) VALUES
(1, 'SATC-7', 'BERNALDO', 'DE LEON', 'LACATAN', '1972-09-15', 'Male', 'M', '08 kampupot st.wawa taguig city', '9086806358', '1972-09-15', 'Y'),
(2, 'SATC-17', 'JEMGIEL', 'MARTINO', 'G', '1993-04-11', 'Male', 'Married', '179 San Juan, Pasay, 1709 Kalakhang Maynila, Philippines', '9364524393', '1993-11-04', 'Y'),
(3, '1', 'JAMES', 'MARTINO', 'GASPADO', '1987-01-08', 'Male', 'Married', 'Block 7 lot 12 Samasipat Sta Ana Taguig City', '9558717510', '1987-08-01', 'Y'),
(4, 'SATC - 02', 'JEFFRY', 'CAYA', 'MENDOZA', '1995-07-30', 'Male', 'Single', 'Blk 2 lot 1 Service 7 pinagbuklod Sta. Ana Taguig City', '9624705858', '1995-07-30', 'Y'),
(5, 'SATC-07-3', 'ARIEL', 'LIBRIA', 'PORTUGAL', '1980-08-17', 'Male', 'Married', 'Daet, Camarines Norte', '9458134570', '1980-08-17', 'Y'),
(6, 'SATC-08', 'DANIEL', 'DE LEON', 'INOVEJAS', '2001-03-08', 'Male', 'Single', 'Block 10 Lot 10 Golden Harvest Subd. Calzada Taguig City', '9636338500', '2001-08-03', 'Y'),
(7, 'SATC- 21', 'ALONA', 'ESPARES', 'ENCILA', '1993-05-02', 'Female', 'Married', 'Blk7 lot19 Bagong Sikat Sta Ana Taguig City', '9551157318', '1993-02-05', 'Y'),
(8, 'SATC-34', 'JOHN BRIAN', 'MAHILUM', 'PARTOS', '1999-12-08', 'Male', 'Single', 'Sangaville, Sta. Ana, Taguig City', '9385872278', '1999-08-12', 'Y'),
(9, 'SATC-33', 'RASSEL', 'ARANTE', 'LABUSON', '2000-05-31', 'MALE', 'SINGLE', 'SANGAVILLE STA. ANA, TAGUIG CITY', '9912943002', '2000-05-31', 'Y'),
(10, 'SATC -18', 'GARRY', 'PORTEZA', 'BALANO', '1982-04-03', 'Male', 'Married', '833 Baron St West service road barangay pinagsama Taguig', '9182389696', '1982-03-04', 'Y'),
(11, '9', 'BRIAN', 'BARAWID', 'KUAN', '1991-04-11', 'Male', 'Single', '3220 St. Luke st. Janssen Ville II San Juan, Cainta, Rizal', '9269960622', '1991-11-04', 'Y'),
(12, 'SATC-07-4', 'MARLON', 'SALAVERIA', 'SABANDO', '2024-07-09', 'Male', 'Married', 'BRGY:Catan- Agan San Enrique, iloilo', '9150846215', '2024-09-07', 'Y'),
(13, 'SATC.13', 'JULIUS', 'GALAPIA', 'RAMOS', '1978-04-07', 'Male', 'Married', 'Blk1 lot 20 pinagbuklod Sta Ana Taguig City', '9994378971', '1978-07-04', 'Y'),
(16, 'SATC-04', 'RUBEN', 'PEDRAGOSA', 'M', NULL, NULL, NULL, NULL, NULL, '2024-10-03', 'Y'),
(17, 'SATC-53', 'RAYMOND', 'CRUZ', 'D.', NULL, NULL, NULL, NULL, NULL, '2025-09-30', 'Y'),
(18, 'SATC-54', 'RUDY', 'PATAY JR.', 'S', NULL, NULL, NULL, NULL, NULL, '2025-09-30', 'Y'),
(19, 'SATC-55', 'FIDEL', 'MAISA JR.', 'H', NULL, NULL, NULL, NULL, NULL, '2025-09-30', 'Y'),
(20, 'SATC-56', 'JOHN PAUL', 'MARTINEZ', 'L', NULL, NULL, NULL, NULL, NULL, '2025-09-30', 'Y'),
(21, 'SATC-43', 'PHYTON', 'HONOR', 'C', NULL, NULL, NULL, NULL, NULL, '2025-09-30', 'Y'),
(22, 'SATC-48', 'RENIE', 'CHO', 'C', NULL, NULL, NULL, NULL, NULL, '2025-09-30', 'Y'),
(23, 'SATC-49', 'JOJIE', 'CALUMBA', 'D', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(24, 'SATC-50', 'JONNY', 'CALUMBA', 'A', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(25, 'SATC-51', 'SAGANE', 'SANCHEZ', 'A', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(26, 'SATC-52', 'JARWIN', 'MAJERANO', 'I', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(27, 'SATC-07-6', 'BARRY', 'IMPROSO', 'E', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(28, 'SATC-44', 'LAURICO', 'MORENO II', 'C', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(29, 'SATC-45', 'STEVEN NICOLE', 'PEDRO', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(30, 'SATC-46', 'JOHN PAUL', 'CAYA', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(31, 'SATC-47', 'RONIE', 'ABUGAN', 'R', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(32, 'SATC-05', 'JOEVEL', 'IBANEZ', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(33, 'SATC-04', 'RAQUEL', 'MANDAR', 'R', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(34, 'SATC-04', 'RENDON', 'CARMELITO', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(35, 'SATC-04', 'ALEX', 'CABICO', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(37, 'SATC-04', 'JASPER', 'MORTEL', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(38, 'SATC-04', 'JAYSON MARC', 'ENRIQUEZ', 'C', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(39, 'SATC-04', 'JOHN EMMANUEL', 'MOLERO', 'M', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(40, 'SATC-04', 'EUGEN', 'EPINO', 'B', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(41, 'SATC-04', 'JONIEL', 'MARINDUQUE', 'M', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(42, 'SATC-04', 'MANNY', 'FERNANDEZ', 'B', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(43, 'SATC-04', 'RAMON JR', 'ANTONIO', 'A', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(44, 'SATC-04', 'MELCHOR', 'ELISAN', 'T', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(45, 'SATC-04', 'JHON MICHAEL', 'ELISAN', 'T', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(46, 'SATC-04', 'JAYSON', 'LAULHATI', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(47, 'SATC-04', 'ABRIO', 'RICKY', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(48, 'SATC-04', 'ALBERT', 'ENCILA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(49, 'SATC-04', 'ALFIE', 'ENCILA', 'OMBAO', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(50, 'SATC-07', 'GELI', 'AMANCIO JR', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(51, 'SATC-04', 'AMAY', 'CALUMBA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(52, 'SATC-04', 'AVELIBO', 'VALENCIA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(53, 'SATC-04', 'BLESSREYJHON', 'DIVINA', 'A', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(54, 'SATC-04', 'BRY', 'MAXILOM', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(55, 'SATC-04', 'DENNIS', 'PAAGUNTALAN', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(56, 'SATC-04', 'EUGENE', 'ESPINO', 'B', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(57, 'SATC-04', 'JERRIC', 'CAYA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(58, 'SATC-04', 'JHUN', 'MAISA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(59, 'SATC-04', 'JOJIE', 'DEGUIT', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(60, 'SATC-04', 'MICHAEL', 'CALUMBA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(61, 'SATC-04', 'MISLE', 'ENCILA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(62, 'SATC-04', 'NOE', 'CRISTO', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(63, 'SATC-04', 'NOMAR', 'NOLEBA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(64, 'SATC-04', 'PHILIP', 'LAMIGO III', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(65, 'SATC-04', 'RUEL', 'DE LEON', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(66, 'SATC-04', 'RIX', 'SANCHEZ', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(67, 'SATC-04', 'RICARDO', 'CAYA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(68, 'SATC-04', 'RHINA', 'MESINA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(69, 'SATC-04', 'RHEY', 'ESPARES', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(70, 'SATC-04', 'RENZ', 'RENDON', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(71, 'SATC-04', 'STEVEN PATRICK', 'SAMSON', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y'),
(72, 'SATC-04', 'WACKY', 'LIBRIA', 'I', NULL, NULL, NULL, '', NULL, NULL, 'Y');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `md_months`
--
ALTER TABLE `md_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlydue`
--
ALTER TABLE `monthlydue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pfii_accomps`
--
ALTER TABLE `pfii_accomps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pfii_designations`
--
ALTER TABLE `pfii_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pfii_members`
--
ALTER TABLE `pfii_members`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `md_months`
--
ALTER TABLE `md_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `monthlydue`
--
ALTER TABLE `monthlydue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pfii_accomps`
--
ALTER TABLE `pfii_accomps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pfii_designations`
--
ALTER TABLE `pfii_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pfii_members`
--
ALTER TABLE `pfii_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
