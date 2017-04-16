-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 11:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(10) UNSIGNED NOT NULL,
  `sirsup` int(10) UNSIGNED NOT NULL,
  `place_type` smallint(5) UNSIGNED NOT NULL,
  `type` smallint(5) UNSIGNED NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL,
  `med` tinyint(3) UNSIGNED NOT NULL,
  `area` tinyint(3) UNSIGNED NOT NULL,
  `fsj` smallint(5) UNSIGNED NOT NULL,
  `fsl` bigint(20) UNSIGNED NOT NULL,
  `rang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `place`, `post_code`, `sirsup`, `place_type`, `type`, `level`, `med`, `area`, `fsj`, `fsl`, `rang`, `created_at`, `updated_at`) VALUES
(10, 'JUDEŢUL ALBA', 0, 1, 1, 40, 1, 0, 7, 1, 100000000000, 'II', NULL, NULL),
(29, 'JUDEŢUL ARAD', 0, 1, 2, 40, 1, 0, 5, 2, 200000000000, '', NULL, NULL),
(38, 'JUDEŢUL ARGEŞ', 0, 1, 3, 40, 1, 0, 3, 3, 300000000000, '', NULL, NULL),
(47, 'JUDEŢUL BACAU', 0, 1, 4, 40, 1, 0, 1, 4, 400000000000, '', NULL, NULL),
(56, 'JUDEŢUL BIHOR', 0, 1, 5, 40, 1, 0, 6, 5, 500000000000, '', NULL, NULL),
(65, 'JUDEŢUL BISTRIŢA-NASAUD', 0, 1, 6, 40, 1, 0, 6, 6, 600000000000, '', NULL, NULL),
(74, 'JUDEŢUL BOTOŞANI', 0, 1, 7, 40, 1, 0, 1, 7, 700000000000, '', NULL, NULL),
(83, 'JUDEŢUL BRAŞOV', 0, 1, 8, 40, 1, 0, 7, 8, 800000000000, '', NULL, NULL),
(92, 'JUDEŢUL BRAILA', 0, 1, 9, 40, 1, 0, 2, 9, 900000000000, '', NULL, NULL),
(109, 'JUDEŢUL BUZAU', 0, 1, 10, 40, 1, 0, 2, 10, 1000000000000, '', NULL, NULL),
(118, 'JUDEŢUL CARAŞ-SEVERIN', 0, 1, 11, 40, 1, 0, 5, 11, 1100000000000, '', NULL, NULL),
(127, 'JUDEŢUL CLUJ', 0, 1, 12, 40, 1, 0, 6, 13, 1300000000000, '', NULL, NULL),
(136, 'JUDEŢUL CONSTANŢA', 0, 1, 13, 40, 1, 0, 2, 14, 1400000000000, '', NULL, NULL),
(145, 'JUDEŢUL COVASNA', 0, 1, 14, 40, 1, 0, 7, 15, 1500000000000, '', NULL, NULL),
(154, 'JUDEŢUL DÂMBOVIŢA', 0, 1, 15, 40, 1, 0, 3, 16, 1600000000000, '', NULL, NULL),
(163, 'JUDEŢUL DOLJ', 0, 1, 16, 40, 1, 0, 4, 17, 1700000000000, '', NULL, NULL),
(172, 'JUDEŢUL GALAŢI', 0, 1, 17, 40, 1, 0, 2, 18, 1800000000000, '', NULL, NULL),
(181, 'JUDEŢUL GORJ', 0, 1, 18, 40, 1, 0, 4, 20, 2000000000000, '', NULL, NULL),
(190, 'JUDEŢUL HARGHITA', 0, 1, 19, 40, 1, 0, 7, 21, 2100000000000, '', NULL, NULL),
(207, 'JUDEŢUL HUNEDOARA', 0, 1, 20, 40, 1, 0, 5, 22, 2200000000000, '', NULL, NULL),
(216, 'JUDEŢUL IALOMIŢA', 0, 1, 21, 40, 1, 0, 3, 23, 2300000000000, '', NULL, NULL),
(225, 'JUDEŢUL IAŞI', 0, 1, 22, 40, 1, 0, 1, 24, 2400000000000, '', NULL, NULL),
(234, 'JUDEŢUL ILFOV', 0, 1, 23, 40, 1, 0, 8, 25, 2500000000000, '', NULL, NULL),
(243, 'JUDEŢUL MARAMUREŞ', 0, 1, 24, 40, 1, 0, 6, 26, 2600000000000, '', NULL, NULL),
(252, 'JUDEŢUL MEHEDINŢI', 0, 1, 25, 40, 1, 0, 4, 27, 2700000000000, '', NULL, NULL),
(261, 'JUDEŢUL MUREŞ', 0, 1, 26, 40, 1, 0, 7, 28, 2800000000000, '', NULL, NULL),
(270, 'JUDEŢUL NEAMŢ', 0, 1, 27, 40, 1, 0, 1, 29, 2900000000000, '', NULL, NULL),
(289, 'JUDEŢUL OLT', 0, 1, 28, 40, 1, 0, 4, 30, 3000000000000, '', NULL, NULL),
(298, 'JUDEŢUL PRAHOVA', 0, 1, 29, 40, 1, 0, 3, 31, 3100000000000, '', NULL, NULL),
(305, 'JUDEŢUL SATU MARE', 0, 1, 30, 40, 1, 0, 6, 32, 3200000000000, '', NULL, NULL),
(314, 'JUDEŢUL SALAJ', 0, 1, 31, 40, 1, 0, 6, 33, 3300000000000, '', NULL, NULL),
(323, 'JUDEŢUL SIBIU', 0, 1, 32, 40, 1, 0, 7, 34, 3400000000000, '', NULL, NULL),
(332, 'JUDEŢUL SUCEAVA', 0, 1, 33, 40, 1, 0, 1, 35, 3500000000000, '', NULL, NULL),
(341, 'JUDEŢUL TELEORMAN', 0, 1, 34, 40, 1, 0, 3, 36, 3600000000000, '', NULL, NULL),
(350, 'JUDEŢUL TIMIŞ', 0, 1, 35, 40, 1, 0, 5, 37, 3700000000000, '', NULL, NULL),
(369, 'JUDEŢUL TULCEA', 0, 1, 36, 40, 1, 0, 2, 38, 3800000000000, '', NULL, NULL),
(378, 'JUDEŢUL VASLUI', 0, 1, 37, 40, 1, 0, 1, 39, 3900000000000, '', NULL, NULL),
(387, 'JUDEŢUL VÂLCEA', 0, 1, 38, 40, 1, 0, 4, 40, 4000000000000, '', NULL, NULL),
(396, 'JUDEŢUL VRANCEA', 0, 1, 39, 40, 1, 0, 2, 41, 4100000000000, '', NULL, NULL),
(403, 'MUNICIPIUL BUCUREŞTI', 0, 1, 40, 40, 1, 0, 8, 42, 4200000000000, '', NULL, NULL),
(519, 'JUDEŢUL CALARAŞI', 0, 1, 51, 40, 1, 0, 3, 12, 1200000000000, '', NULL, NULL),
(528, 'JUDEŢUL GIURGIU', 0, 1, 52, 40, 1, 0, 3, 19, 1900000000000, '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
