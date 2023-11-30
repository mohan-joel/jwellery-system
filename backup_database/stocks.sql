-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 06:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwellery-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `supplier_email` varchar(255) DEFAULT NULL,
  `jwelleryType_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `barcode` text DEFAULT NULL,
  `serial_num` varchar(200) NOT NULL,
  `net_wt` varchar(100) NOT NULL,
  `gross_wt` varchar(100) NOT NULL,
  `stone_wt` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `date`, `supplier_email`, `jwelleryType_id`, `product_id`, `product_code`, `barcode`, `serial_num`, `net_wt`, `gross_wt`, `stone_wt`, `price`, `created_at`, `updated_at`) VALUES
(5, '2023-11-23', NULL, 2, 14, '83928', '<div style=\"font-size:0;position:relative;width:170px;height:60px;\">\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:0px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:6px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:12px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:16px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:24px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:28px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:32px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:40px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:44px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:52px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:60px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:64px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:68px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:72px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:76px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:84px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:88px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:96px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:100px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:104px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:112px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:116px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:120px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:128px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:136px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:140px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:144px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:152px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:156px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:162px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:166px;top:0\">&nbsp;</div>\r\n</div>\r\n', '4', '50', '48', '40', '30000', '2023-11-21 10:54:13', '2023-11-24 13:15:18'),
(6, '2023-11-22', NULL, 2, 15, '36943', '<div style=\"font-size:0;position:relative;width:170px;height:60px;\">\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:0px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:6px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:12px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:16px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:24px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:32px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:36px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:40px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:44px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:48px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:56px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:64px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:68px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:72px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:76px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:84px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:88px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:96px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:100px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:104px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:108px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:116px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:120px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:128px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:136px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:144px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:148px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:152px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:156px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:162px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:166px;top:0\">&nbsp;</div>\r\n</div>\r\n', '57', '48', '36', '50', '12000', '2023-11-21 10:54:50', '2023-11-24 13:16:30'),
(7, '2023-11-21', NULL, 2, 17, '40903', '<div style=\"font-size:0;position:relative;width:170px;height:60px;\">\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:0px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:6px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:12px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:16px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:20px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:24px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:32px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:36px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:44px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:48px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:52px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:60px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:68px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:72px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:76px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:84px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:88px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:96px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:100px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:104px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:108px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:116px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:124px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:128px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:136px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:144px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:148px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:152px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:156px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:162px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:166px;top:0\">&nbsp;</div>\r\n</div>\r\n', '9', '50', '52', '60', '3500', '2023-11-22 21:25:13', '2023-11-24 12:56:31'),
(8, '2023-11-24', NULL, 2, 6, '39207', '<div style=\"font-size:0;position:relative;width:170px;height:60px;\">\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:0px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:6px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:12px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:16px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:24px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:32px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:36px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:40px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:44px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:48px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:56px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:60px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:68px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:72px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:76px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:84px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:88px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:92px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:100px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:104px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:108px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:116px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:124px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:128px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:132px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:136px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:140px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:148px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:156px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:162px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:166px;top:0\">&nbsp;</div>\r\n</div>\r\n', '1', '100', '120', '110', '10000', '2023-11-23 01:34:16', '2023-11-24 13:12:34'),
(9, '2023-11-24', NULL, 2, 8, '45712', '<div style=\"font-size:0;position:relative;width:170px;height:60px;\">\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:0px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:6px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:12px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:16px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:20px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:24px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:32px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:36px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:44px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:52px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:56px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:64px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:68px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:72px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:76px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:80px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:84px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:92px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:100px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:108px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:112px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:116px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:120px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:128px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:132px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:140px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:144px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:148px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:156px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:162px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:166px;top:0\">&nbsp;</div>\r\n</div>\r\n', '14', '111', '110', '98', '20000', '2023-11-23 01:36:12', '2023-11-24 12:29:39'),
(10, '2023-11-14', NULL, 2, 16, '60017', '<div style=\"font-size:0;position:relative;width:170px;height:60px;\">\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:0px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:6px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:12px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:16px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:20px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:28px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:36px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:40px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:44px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:48px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:52px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:60px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:68px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:72px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:76px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:80px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:88px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:96px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:100px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:108px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:112px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:116px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:120px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:128px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:132px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:136px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:140px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:6px;height:60px;position:absolute;left:148px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:156px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:2px;height:60px;position:absolute;left:162px;top:0\">&nbsp;</div>\r\n<div style=\"background-color:black;width:4px;height:60px;position:absolute;left:166px;top:0\">&nbsp;</div>\r\n</div>\r\n', '10', '25', '30', '35', '1200', '2023-11-23 05:51:47', '2023-11-24 11:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;