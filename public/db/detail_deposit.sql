-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 01:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_deposit`
--

CREATE TABLE `detail_deposit` (
  `dd_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm',
  `d_id` int(10) UNSIGNED NOT NULL,
  `real_estate_id` int(10) UNSIGNED NOT NULL,
  `b_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_deposit`
--

INSERT INTO `detail_deposit` (`dd_id`, `created_at`, `updated_at`, `deleted_at`, `d_id`, `real_estate_id`, `b_id`) VALUES
(3, '2020-05-21 11:34:42', '2020-05-21 11:34:42', NULL, 1, 19, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_deposit`
--
ALTER TABLE `detail_deposit`
  ADD PRIMARY KEY (`dd_id`),
  ADD KEY `detail_deposit_b_id_foreign` (`b_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_deposit`
--
ALTER TABLE `detail_deposit`
  MODIFY `dd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_deposit`
--
ALTER TABLE `detail_deposit`
  ADD CONSTRAINT `detail_deposit_b_id_foreign` FOREIGN KEY (`b_id`) REFERENCES `bank` (`b_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
