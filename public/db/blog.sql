-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 06:05 AM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `staff_id` int(10) UNSIGNED NOT NULL,
  `blog_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bài viết';

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `staff_id`, `blog_avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'img/blog/Staff_c4ca4238a0b923820dcc509a6f75849b_2020_04_15_20_38_37.jpg', '2020-04-15 13:38:37', '2020-04-15 13:38:37', NULL),
(2, 1, 'img/blog/Staff_c4ca4238a0b923820dcc509a6f75849b_2020_04_15_20_49_37.jpg', '2020-04-15 13:49:37', '2020-04-15 13:49:37', NULL),
(3, 1, 'img/blog/Staff_c4ca4238a0b923820dcc509a6f75849b_2020_04_15_20_50_46.jpg', '2020-04-15 13:50:46', '2020-04-15 13:50:46', NULL),
(4, 1, 'img/blog/Staff_c4ca4238a0b923820dcc509a6f75849b_2020_04_15_20_51_49.jpg', '2020-04-15 13:51:49', '2020-04-15 13:51:49', NULL),
(5, 1, 'img/blog/Staff_c4ca4238a0b923820dcc509a6f75849b_2020_04_15_20_52_39.jpg', '2020-04-15 13:52:39', '2020-04-15 13:52:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_staff_id_index` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
