-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2020 lúc 11:08 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `real_estate`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) UNSIGNED NOT NULL COMMENT 'id của banner',
  `banner_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `banner_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'đường dẫn hình ảnh banner',
  `banner_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banner' COMMENT 'loại banner',
  `banner_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'link khi click vào'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='hình banner';

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_path`, `banner_type`, `banner_link`) VALUES
(34, 'logo_header.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(35, '3.jpg', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(36, '12.jpg', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(37, '7.jpg', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(38, 'logo_header.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(39, 'logo_header.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(40, 'avatar.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(41, 'logo_header.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(42, 'logo_header.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(43, '00585a3568a0a7d.jpg', 'C:\\xampp\\htdocs\\real_estate\\public\\img\\banner', 'banner', NULL),
(44, 'bg2.jpg', 'C:\\xampp\\htdocs\\real_estate\\public\\img\\banner', 'banner', NULL),
(45, 'bg3.jpg', 'C:\\xampp\\htdocs\\real_estate\\public\\img\\banner', 'banner', NULL),
(46, 'bg4.jpg', 'C:\\xampp\\htdocs\\real_estate\\public\\img\\banner', 'banner', NULL),
(47, 'logo_header.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL),
(48, 'logo_header.png', 'C:\\xampp\\htdocs\\real_estate\\public\\/img/banner/logo', 'Logo', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `banner_banner_title_index` (`banner_title`),
  ADD KEY `banner_banner_path_index` (`banner_path`),
  ADD KEY `banner_banner_link_index` (`banner_link`(768));

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id của banner', AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
