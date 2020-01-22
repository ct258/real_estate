-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 08:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tinhthanhpho`
--

CREATE TABLE `tinhthanhpho` (
  `ttp_id` bigint(20) UNSIGNED NOT NULL COMMENT 'id tỉnh thành phố',
  `ttp_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên tỉnh thành phố',
  `ttp_ghichu` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ghi chú ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tỉnh thành phố';

--
-- Dumping data for table `tinhthanhpho`
--

INSERT INTO `tinhthanhpho` (`ttp_id`, `ttp_ten`, `ttp_ghichu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hồ Chí Minh', 'SG', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(2, 'Hà Nội', 'HN', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(3, 'Đà Nẵng', 'DDN', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(4, 'Bình Dương', 'BD', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(5, 'Đồng Nai', 'DNA', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(6, 'Khánh Hòa', 'KH', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(7, 'Hải Phòng', 'HP', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(8, 'Long An', 'LA', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(9, 'Quảng Nam', 'QNA', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(10, 'Bà Rịa Vũng Tàu', 'VT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(11, 'Đắk Lắk', 'DDL', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(12, 'Cần Thơ', 'CT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(13, 'Bình Thuận  ', 'BTH', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(14, 'Lâm Đồng', 'LDD', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(15, 'Thừa Thiên Huế', 'TTH', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(16, 'Kiên Giang', 'KG', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(17, 'Bắc Ninh', 'BN', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(18, 'Quảng Ninh', 'QNI', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(19, 'Thanh Hóa', 'TH', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(20, 'Nghệ An', 'NA', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(21, 'Hải Dương', 'HD', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(22, 'Gia Lai', 'GL', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(23, 'Bình Phước', 'BP', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(24, 'Hưng Yên', 'HY', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(25, 'Bình Định', 'BDD', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(26, 'Tiền Giang', 'TG', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(27, 'Thái Bình', 'TB', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(28, 'Bắc Giang', 'BG', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(29, 'Hòa Bình', 'HB', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(30, 'An Giang', 'AG', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(31, 'Vĩnh Phúc', 'VP', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(32, 'Tây Ninh', 'TNI', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(33, 'Thái Nguyên', 'TN', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(34, 'Lào Cai', 'LCA', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(35, 'Nam Định', 'NDD', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(36, 'Quảng Ngãi', 'QNG', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(37, 'Bến Tre', 'BTR', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(38, 'Đắk Nông', 'DNO', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(39, 'Cà Mau', 'CM', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(40, 'Vĩnh Long', 'VL', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(41, 'Ninh Bình', 'NB', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(42, 'Phú Thọ', 'PT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(43, 'Ninh Thuận', 'NT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(44, 'Phú Yên', 'PY', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(45, 'Hà Nam', 'HNA', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(46, 'Hà Tĩnh', 'HT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(47, 'Đồng Tháp', 'DDT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(48, 'Sóc Trăng', 'ST', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(49, 'Kon Tum', 'KT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(50, 'Quảng Bình', 'QB', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(51, 'Quảng Trị', 'QT', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(52, 'Trà Vinh', 'TV', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(53, 'Hậu Giang', 'HGI', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(54, 'Sơn La', 'SL', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(55, 'Bạc Liêu', 'BL', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(56, 'Yên Bái', 'YB', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(57, 'Tuyên Quang', 'TQ', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(58, 'Điện Biên', 'DDB', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(59, 'Lai Châu', 'LCH', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(60, 'Lạng Sơn', 'LS', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(61, 'Hà Giang', 'HG', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(62, 'Bắc Kạn', 'BK', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL),
(63, 'Cao Bằng', 'CB', '0000-00-00 00:00:00', '2020-01-16 15:30:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tinhthanhpho`
--
ALTER TABLE `tinhthanhpho`
  ADD PRIMARY KEY (`ttp_id`),
  ADD KEY `tinhthanhpho_ttp_ten_index` (`ttp_ten`),
  ADD KEY `tinhthanhpho_ttp_ghichu_index` (`ttp_ghichu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tinhthanhpho`
--
ALTER TABLE `tinhthanhpho`
  MODIFY `ttp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id tỉnh thành phố', AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
