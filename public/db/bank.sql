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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `b_id` int(10) UNSIGNED NOT NULL,
  `b_txnref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_orderInfo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_amount` int(11) DEFAULT NULL,
  `b_responseCode` int(11) DEFAULT NULL,
  `b_bankcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_vnp_TmnCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_vnp_HashSecret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`b_id`, `b_txnref`, `b_orderInfo`, `b_amount`, `b_responseCode`, `b_bankcode`, `b_vnp_TmnCode`, `b_vnp_HashSecret`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '19,1', 'Thanh toán hóa đơn phí dich vụ', 500000000, 0, 'NCB', 'UDOPNWS1', 'EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN', '2020-05-21 11:34:42', '2020-05-21 11:34:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`b_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `b_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
