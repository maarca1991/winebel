-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2019 at 01:04 PM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devlofzz_winebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(10) NOT NULL,
  `forgot_pass_string` text,
  `role` enum('admin','inspector') DEFAULT 'inspector',
  `last_ip` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `isDelete` tinyint(1) DEFAULT '0',
  `confirmation_string` varchar(255) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `adate` datetime DEFAULT NULL,
  `active_account` tinyint(4) DEFAULT '0',
  `isApproved` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `contact`, `forgot_pass_string`, `role`, `last_ip`, `last_login`, `isDelete`, `confirmation_string`, `reg_date`, `adate`, `active_account`, `isApproved`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '', 'gxm64R3C', 'admin', '192.185.129.86', '2019-11-18 16:07:07', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sub_total` float(11,2) DEFAULT NULL,
  `order_no` varchar(20) DEFAULT NULL,
  `tax` float(11,2) DEFAULT NULL,
  `grand_total` float(11,2) DEFAULT NULL,
  `order_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=inprogress,1=completed,2=cancled',
  `order_date` datetime DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `sub_total`, `order_no`, `tax`, `grand_total`, `order_status`, `order_date`, `isDelete`, `updated_date`, `adate`) VALUES
(1, 29, 55.00, '0', 12.10, 67.10, '0', NULL, 0, '2019-10-03 09:28:45', '2019-09-27 15:42:31'),
(2, 29, 110.00, 'WINE2', 24.20, 134.20, '1', '2019-09-27 21:15:34', 0, '2019-10-03 09:28:45', '2019-09-27 15:44:20'),
(3, 31, 55.00, 'WINE3', 12.10, 67.10, '1', '2019-09-28 11:13:41', 0, '2019-10-03 09:28:45', '2019-09-28 05:35:25'),
(4, 31, 600.00, 'WINE4', 132.00, 732.00, '2', '2019-09-28 11:44:49', 0, '2019-10-03 09:28:45', '2019-09-28 05:44:10'),
(5, 31, 55.00, 'WINE5', 12.10, 67.10, '2', '2019-09-28 12:14:49', 0, '2019-10-03 09:28:45', '2019-09-28 06:42:57'),
(6, 30, 600.00, 'WINE6', 132.00, 732.00, '1', '2019-09-28 12:21:48', 0, '2019-10-03 09:28:45', '2019-09-28 06:50:56'),
(7, 31, 385.00, '0', 84.70, 469.70, '1', NULL, 0, '2019-10-03 09:28:45', '2019-09-28 07:41:34'),
(8, 32, 55.00, 'WINE000008', 12.10, 67.10, '1', '2019-09-28 17:18:44', 0, '2019-10-03 09:28:45', '2019-09-28 10:12:39'),
(9, 32, 55.00, '0', 12.10, 67.10, '0', NULL, 1, '2019-10-03 09:28:45', '2019-09-28 12:58:29'),
(10, 1, 2450.00, '0', 539.00, 2989.00, '0', NULL, 0, '2019-10-11 13:25:09', '2019-09-30 07:06:28'),
(11, 8, 55.00, '0', 12.10, 67.10, '0', NULL, 0, '2019-10-03 09:28:45', '2019-10-03 07:27:00'),
(12, 7, 155.00, '0', 34.10, 189.10, '0', NULL, 0, '2019-10-06 12:59:43', '2019-10-05 07:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `label_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `quntity` int(11) DEFAULT '1',
  `total` int(11) DEFAULT '55',
  `period` enum('month','year') DEFAULT 'month',
  `isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `adate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `user_id`, `label_id`, `cart_id`, `quntity`, `total`, `period`, `isDelete`, `adate`) VALUES
(1, 29, 35, 1, 1, 55, 'month', 0, '2019-09-27 15:42:31'),
(2, 29, 36, 2, 1, 55, 'month', 0, '2019-09-27 15:44:20'),
(3, 31, 38, 3, 1, 600, 'year', 1, '2019-09-28 05:35:25'),
(4, 31, 38, 4, 1, 600, 'year', 1, '2019-09-28 05:51:13'),
(5, 31, 39, 4, 0, 55, 'month', 1, '2019-09-28 06:01:55'),
(6, 31, 40, 4, 5, 55, 'month', 0, '2019-09-28 06:10:17'),
(7, 31, 40, 5, 5, 55, 'month', 0, '2019-09-28 06:42:57'),
(8, 30, 37, 6, 1, 600, 'year', 0, '2019-09-28 06:50:56'),
(9, 31, 45, 7, 1, 55, 'month', 0, '2019-09-28 07:41:34'),
(10, 31, 44, 7, 1, 55, 'month', 0, '2019-09-28 07:41:34'),
(11, 31, 43, 7, 1, 55, 'month', 0, '2019-09-28 07:41:34'),
(12, 31, 42, 7, 1, 55, 'month', 0, '2019-09-28 07:41:34'),
(13, 31, 41, 7, 1, 55, 'month', 0, '2019-09-28 07:41:34'),
(14, 31, 40, 7, 1, 55, 'month', 0, '2019-09-28 07:41:34'),
(15, 31, 39, 7, 1, 55, 'month', 0, '2019-09-28 07:41:34'),
(16, 32, 49, 8, 2, 600, 'year', 1, '2019-09-28 10:12:39'),
(17, 32, 48, 8, 1, 55, 'month', 0, '2019-09-28 11:19:39'),
(18, 32, 48, 9, 1, 55, 'month', 0, '2019-09-28 12:58:29'),
(19, 1, 33, 10, 1, 55, 'month', 1, '2019-09-30 07:06:28'),
(20, 1, 22, 10, 10000, 1000, 'year', 1, '2019-10-03 05:09:57'),
(21, 8, 52, 11, 1, 55, 'month', 0, '2019-10-03 07:27:00'),
(22, 1, 21, 10, 50000, 1700, 'year', 1, '2019-10-03 07:41:32'),
(23, 1, 22, 10, 1, 55, 'month', 1, '2019-10-04 09:56:35'),
(24, 1, 21, 10, 1, 55, 'month', 1, '2019-10-04 09:56:35'),
(25, 1, 22, 10, 1, 55, 'month', 1, '2019-10-04 09:56:56'),
(26, 1, 21, 10, 100000, 1700, 'year', 0, '2019-10-04 09:57:35'),
(27, 1, 22, 10, 56238, 1700, 'year', 1, '2019-10-04 09:57:35'),
(28, 1, 22, 10, 1, 55, 'month', 1, '2019-10-04 09:58:11'),
(29, 1, 22, 10, 10000, 750, 'year', 0, '2019-10-04 09:58:44'),
(30, 7, 20, 12, 49999, 1000, 'year', 1, '2019-10-05 07:18:11'),
(31, 7, 54, 12, 2, 55, 'month', 1, '2019-10-05 07:29:36'),
(32, 7, 57, 12, 100000, 155, 'month', 0, '2019-10-06 12:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `labels_id` int(11) NOT NULL,
  `winery` varchar(30) NOT NULL,
  `label` varchar(30) NOT NULL,
  `upcirc` float NOT NULL,
  `downcirc` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `label_file` varchar(500) NOT NULL,
  `b1` varchar(10) NOT NULL,
  `b2` varchar(10) NOT NULL,
  `b3` varchar(10) NOT NULL,
  `b4` varchar(10) NOT NULL,
  `b5` varchar(10) NOT NULL,
  `b6` varchar(10) NOT NULL,
  `video_file_1` varchar(500) NOT NULL,
  `video_file_2` varchar(500) NOT NULL,
  `video_file_3` varchar(500) NOT NULL,
  `video_file_4` varchar(500) NOT NULL,
  `video_file_5` varchar(500) NOT NULL,
  `video_file_6` varchar(500) NOT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0=pending,1=Suitable for payment,2=Reject,3=Published',
  `isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`labels_id`, `winery`, `label`, `upcirc`, `downcirc`, `height`, `weight`, `label_file`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `video_file_1`, `video_file_2`, `video_file_3`, `video_file_4`, `video_file_5`, `video_file_6`, `isApproved`, `status`, `isDelete`, `updated_date`, `adate`) VALUES
(18, '1', 'test', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1568729785_2119928.png', 'sdfs', 'ffff', '', '', '', 'knj', 'http://devlopix.com/projects/winebel/images/label/1568729785_167053.mp4', 'http://devlopix.com/projects/winebel/images/label/1568729785_244770.mp4', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1568730115_4642634.mp4', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-17 14:16:25'),
(19, '7', 'my Label', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1568729983_9464827.png', 'Food', 'Wine', 'Winery', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1568729983_5548933.mp4', '', '', '', '', '', 1, '', 1, '2019-10-03 09:52:42', '2019-09-17 14:19:43'),
(20, '7', 'my label', 12, 12, 21, 21, 'http://devlopix.com/projects/winebel/images/label/1568729993_6059266.jpg', 'Test', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1568729993_8334278.mp4', '', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:41', '2019-09-17 14:19:53'),
(21, '1', 'nomedi test', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569082923_7791698.jpg', 'Acqua', 'Sorgente', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569082923_6602116.mp4', 'http://devlopix.com/projects/winebel/images/label/1569082995_7030127.mp4', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:41', '2019-09-21 16:22:03'),
(22, '1', 'Test2', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569083744_3366399.jpg', 'Test video', 'Test graph', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1570170051_8822580.mp4', 'http://devlopix.com/projects/winebel/images/label/1570170052_5645617.mp4', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:40', '2019-09-21 16:35:44'),
(23, '1', 'test222a', 3, 2, 3, 4, 'http://devlopix.com/projects/winebel/images/label/1569233363_2759936.png', 'sdfs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569233363_801152.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-23 10:09:23'),
(24, '1', 'test', 3, 2, 3, 2, 'http://devlopix.com/projects/winebel/images/label/1569234721_6950623.png', 'sdfs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569234721_6773784.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-23 10:32:01'),
(25, '1', 'test', 3, 2, 3, 4, 'http://devlopix.com/projects/winebel/images/label/1569234732_7189292.png', 'sdfs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569234732_207893.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-23 10:32:12'),
(26, '1', 'test', 3, 2, 3, 4, 'http://devlopix.com/projects/winebel/images/label/1569234749_5099395.png', 'sdfs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569234749_6436862.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-23 10:32:29'),
(27, '1', 'test', 3, 3, 3, 2, 'http://devlopix.com/projects/winebel/images/label/1569235573_8479409.png', 'sdfs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569235573_8551959.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-23 10:46:13'),
(28, '1', 'test', 3, 2, 3, 4, 'http://devlopix.com/projects/winebel/images/label/1569235970_8682308.png', 'sdfs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569235970_9881643.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-23 10:52:50'),
(29, '27', 'test test', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569241571_2869827.jpg', 'qwer test', 'qwrrwet', 'qeerqertwe', 'qrqwretwt', '', '', 'http://devlopix.com/projects/winebel/images/label/1569241571_680403.mp4', 'http://devlopix.com/projects/winebel/images/label/1569241571_148613.mp4', 'http://devlopix.com/projects/winebel/images/label/1569241571_1317979.mp4', 'http://devlopix.com/projects/winebel/images/label/1569241571_6975505.mp4', '', '', 1, '1', 0, '2019-10-07 10:18:40', '2019-09-23 12:26:11'),
(30, '27', 'Testo', 456896000, 2533520000, 86352400, 45, 'http://devlopix.com/projects/winebel/images/label/1569242062_2605239.jpg', 'test 1234', 'test 4567', 'teet 45567', 'ey5y', '', '', 'http://devlopix.com/projects/winebel/images/label/1569242062_9207763.jpg', 'http://devlopix.com/projects/winebel/images/label/1569242062_1239301.jpg', 'http://devlopix.com/projects/winebel/images/label/1569242062_5730386.jpg', 'http://devlopix.com/projects/winebel/images/label/1569242062_8201948.mp4', '', '', 1, '1', 0, '2019-10-07 10:18:39', '2019-09-23 12:34:22'),
(31, '27', 'trf', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569243939_7330126.jpg', '55', '56', '67', 'b4', '', '', 'http://devlopix.com/projects/winebel/images/label/1569243939_8590043.jpg', 'http://devlopix.com/projects/winebel/images/label/1569243939_3153859.jpg', 'http://devlopix.com/projects/winebel/images/label/1569243939_5847066.png', 'http://devlopix.com/projects/winebel/images/label/1569243939_1300221.jpg', '', '', 1, '1', 0, '2019-10-07 10:18:38', '2019-09-23 13:05:39'),
(32, '1', 'test', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569303356_2435251.png', 'sdfs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569303356_2252689.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-24 05:35:56'),
(33, '1', 'Testonnic 1', 234324, 324324, 234, 234, 'http://devlopix.com/projects/winebel/images/label/1569415055_4114932.jpg', 'erwe', 'wer', 'tyu', 'uio', '', '', 'http://devlopix.com/projects/winebel/images/label/1569415055_284883.mp4', 'http://devlopix.com/projects/winebel/images/label/1569415055_5575438.mp4', 'http://devlopix.com/projects/winebel/images/label/1569415055_4741403.mp4', 'http://devlopix.com/projects/winebel/images/label/1569415055_7218060.mp4', '', '', 1, '', 1, '2019-10-03 09:52:42', '2019-09-25 12:37:36'),
(34, '1', '50 Years Aged Wine', 25, 30, 27, 30, 'http://devlopix.com/projects/winebel/images/label/1569598471_7045794.jpg', 'Show', 'Hide', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569598471_6247588.mp4', 'http://devlopix.com/projects/winebel/images/label/1569598471_2709932.mp4', '', '', '', '', 1, '', 1, '2019-10-03 09:52:42', '2019-09-27 15:34:31'),
(35, '29', '50 Years Aged Wine', 2, 2, 2, 2, 'http://devlopix.com/projects/winebel/images/label/1569598927_5330352.jpg', 'test', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569598927_2031479.mp4', '', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:38', '2019-09-27 15:42:07'),
(36, '29', 'Text1', 23, 34, 54, 45, 'http://devlopix.com/projects/winebel/images/label/1569599033_4001737.png', 'wqe', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569599033_4034826.mp4', '', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:37', '2019-09-27 15:43:53'),
(37, '30', 'Test for', 4, 5, 6, 7, 'http://devlopix.com/projects/winebel/images/label/1569607998_8172862.png', 'Gajsbshhs', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569607998_4718795.mp4', '', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:35', '2019-09-27 18:13:18'),
(38, '31', 'Label 01', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569648229_6645975.jpg', 'b01', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569648229_1801497.png', '', '', '', '', '', 1, '', 1, '2019-10-03 09:52:42', '2019-09-28 05:23:49'),
(39, '31', '12', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569650478_2675580.jpg', '243', '243', '24', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569649724_8856282.mp4', 'http://devlopix.com/projects/winebel/images/label/1569649724_2732018.jpg', 'http://devlopix.com/projects/winebel/images/label/1569649724_4693489.jpg', '', '', '', 1, '1', 0, '2019-10-07 10:18:34', '2019-09-28 05:48:44'),
(40, '31', 'Label $0 qwertyu', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569650304_1904291.jpg', '243', 'b2', '24', '.', '', '', 'http://devlopix.com/projects/winebel/images/label/1569650304_3673130.png', 'http://devlopix.com/projects/winebel/images/label/1569650304_4682283.jpg', 'http://devlopix.com/projects/winebel/images/label/1569650304_2904790.mp4', 'http://devlopix.com/projects/winebel/images/label/1569650304_2906587.mp4', '', '', 1, '1', 0, '2019-10-07 10:18:33', '2019-09-28 05:58:24'),
(41, '31', 'rtreter', 34, 234, 324342, 23434, 'http://devlopix.com/projects/winebel/images/label/1569650979_225286.png', 'b01', 'wer', 'r4', 't5', '', '', 'http://devlopix.com/projects/winebel/images/label/1569650979_8234674.jpg', 'http://devlopix.com/projects/winebel/images/label/1569650979_2858379.jpg', 'http://devlopix.com/projects/winebel/images/label/1569650979_1758308.ico', 'http://devlopix.com/projects/winebel/images/label/1569650979_4292985.mp4', '', '', 1, '1', 0, '2019-10-07 10:18:33', '2019-09-28 06:09:39'),
(42, '31', 'Test label 02', 12333300, 1.31231e34, 12345, 34567, 'http://devlopix.com/projects/winebel/images/label/1569654072_1975050.png', '243', '78855858', '24', 'qwe', '', '', 'http://devlopix.com/projects/winebel/images/label/1569654072_8714005.mp4', 'http://devlopix.com/projects/winebel/images/label/1569654072_4362864.mp4', 'http://devlopix.com/projects/winebel/images/label/1569654072_8260008.png', 'http://devlopix.com/projects/winebel/images/label/1569654072_6723523.png', '', '', 1, '1', 0, '2019-10-07 10:18:32', '2019-09-28 07:01:12'),
(43, '31', 'Test label 01', 234324, 22333, 2342440, 2313, 'http://devlopix.com/projects/winebel/images/label/1569655136_247327.jpg', 'b01', 'wer', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569655136_7700132.mp4', 'http://devlopix.com/projects/winebel/images/label/1569655136_6210369.mov', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:06', '2019-09-28 07:18:56'),
(44, '31', 'test', 234324, 22333, 2342440, 654, 'http://devlopix.com/projects/winebel/images/label/1569655602_3350264.jpg', 'Buy', 'Buy2', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569655602_5622606.mp4', 'http://devlopix.com/projects/winebel/images/label/1569655602_5814237.mp4', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:06', '2019-09-28 07:26:42'),
(45, '31', 'test', 123, 123123, 1112, 23121, 'http://devlopix.com/projects/winebel/images/label/1569655635_1737378.png', '123', 'wer', '24', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569655635_7907046.jpg', 'http://devlopix.com/projects/winebel/images/label/1569655635_4553282.png', 'http://devlopix.com/projects/winebel/images/label/1569655635_3421336.jpg', '', '', '', 1, '1', 0, '2019-10-07 10:18:07', '2019-09-28 07:27:15'),
(46, '27', 'Test  023023', 0, 5, 8, 85, 'http://devlopix.com/projects/winebel/images/label/1569656455_4839582.jpg', '4646 58', '111222', '1234', '5678', '', '', 'http://devlopix.com/projects/winebel/images/label/1569656455_8274086.mp4', 'http://devlopix.com/projects/winebel/images/label/1569656455_1077815.mp4', 'http://devlopix.com/projects/winebel/images/label/1569656455_324149.mp4', 'http://devlopix.com/projects/winebel/images/label/1569656455_460254.mp4', '', '', 1, '1', 0, '2019-10-07 10:18:07', '2019-09-28 07:40:55'),
(47, '31', 'Test Label 05', 111, 222, 333, 33334, 'http://devlopix.com/projects/winebel/images/label/1569657735_7765833.ico', 'b01', 'b02', 'b03', 'b04', '', '', 'http://devlopix.com/projects/winebel/images/label/1569657735_6400934.mp4', 'http://devlopix.com/projects/winebel/images/label/1569657735_5918800.mp4', 'http://devlopix.com/projects/winebel/images/label/1569657735_3131632.mp4', 'http://devlopix.com/projects/winebel/images/label/1569657735_3292882.mp4', '', '', 1, '1', 0, '2019-10-07 10:18:09', '2019-09-28 08:02:15'),
(48, '32', 'lable 0135', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1569665167_7623876.jpg', 'b013453', 'b25434', '2443553', 't5345', '', '', 'http://devlopix.com/projects/winebel/images/label/1569665167_5743567.mp4', 'http://devlopix.com/projects/winebel/images/label/1569665167_7257896.mp4', 'http://devlopix.com/projects/winebel/images/label/1569667771_2030742.mp4', 'http://devlopix.com/projects/winebel/images/label/1569665167_8802146.mp4', '', '', 1, '1', 0, '2019-10-07 10:18:09', '2019-09-28 10:06:07'),
(49, '32', 'rr', 897, 987, 87, 97, 'http://devlopix.com/projects/winebel/images/label/1569665533_5863253.jpg', 'b01', 'wer', '24', '24', '', '', 'http://devlopix.com/projects/winebel/images/label/1569665533_7882095.mp4', 'http://devlopix.com/projects/winebel/images/label/1569665533_1281513.mp4', 'http://devlopix.com/projects/winebel/images/label/1569665533_5894889.mp4', 'http://devlopix.com/projects/winebel/images/label/1569665533_4679493.mp4', '', '', 1, '', 1, '2019-10-03 09:52:42', '2019-09-28 10:12:14'),
(50, '32', 'test', 23, 323, 24, 424, 'http://devlopix.com/projects/winebel/images/label/1569674610_752847.png', '42', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569674610_9083898.mp4', '', '', '', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-28 12:43:30'),
(51, '32', 'Test label 01', 324, 324, 432, 432, 'http://devlopix.com/projects/winebel/images/label/1569675168_6957622.png', '342', '432', '4333', '2333333333', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1569675168_7973772.mp4', 'http://devlopix.com/projects/winebel/images/label/1569675168_4019782.mp4', 'http://devlopix.com/projects/winebel/images/label/1569675168_2041747.mp4', '', '', NULL, '', 1, '2019-10-03 09:52:42', '2019-09-28 12:52:48'),
(52, '8', 'label1', 12, 34, 56, 78, 'http://devlopix.com/projects/winebel/images/label/1570087363_9628535.jpg', 'test1', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1570087363_6143206.mp4', '', '', '', '', '', 1, '1', 0, '2019-10-07 13:26:17', '2019-10-03 07:22:43'),
(53, '1', 'Test', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1570088472_435349.png', '1', '2', '3', '4', '', '', 'http://devlopix.com/projects/winebel/images/label/1570168925_2241409.mp4', 'http://devlopix.com/projects/winebel/images/label/1570168925_1200000.mp4', 'http://devlopix.com/projects/winebel/images/label/1570168925_1836579.mp4', 'http://devlopix.com/projects/winebel/images/label/1570088472_7935830.mp4', '', '', 1, '', 1, '2019-10-04 06:14:00', '2019-10-03 07:41:12'),
(54, '7', 'etc1', 0, 0, 0, 0, 'http://devlopix.com/projects/winebel/images/label/1570260352_5083984.png', 'test2', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1570260352_6105442.mp4', '', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:11', '2019-10-05 07:25:52'),
(55, '1', 'Test', 12, 12, 12, 12, 'http://devlopix.com/projects/winebel/images/label/1570260383_443107.png', '1', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1570260383_4435361.webm', '', '', '', '', '', 1, '2', 0, '2019-10-07 13:26:19', '2019-10-05 07:26:23'),
(56, '1', 'Test', 12, 12, 12, 12, 'http://devlopix.com/projects/winebel/images/label/1570260914_9382574.jpeg', '1', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1570260914_3662682.webm', '', '', '', '', '', 1, '2', 1, '2019-10-07 07:48:12', '2019-10-05 07:35:14'),
(57, '7', 'Test3', 12, 13, 14, 24, 'http://devlopix.com/projects/winebel/images/label/1570366564_608274.jpg', 'pulsante1', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1570366564_3421655.mp4', '', '', '', '', '', 1, '1', 0, '2019-10-07 10:18:12', '2019-10-06 12:56:04'),
(58, '1', 'Test', 4, 5, 4, 6, 'http://devlopix.com/projects/winebel/images/label/1570516588_3166153.png', 'Fhcvhj', '', '', '', '', '', 'http://devlopix.com/projects/winebel/images/label/1570516588_6442855.mp4', '', '', '', '', '', NULL, '0', 1, '2019-10-08 06:36:56', '2019-10-08 06:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT '0',
  `cart_det_id` int(11) DEFAULT '0',
  `price` double DEFAULT '0',
  `payment_status` enum('0','1','2') DEFAULT '0' COMMENT '0=inprogress,1=completed,2=cancled',
  `payment_date` datetime DEFAULT NULL,
  `txn_id` text,
  `err_msg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `uid`, `cart_det_id`, `price`, `payment_status`, `payment_date`, `txn_id`, `err_msg`) VALUES
(1, 29, 2, 67.1, '1', '2019-09-27 21:15:34', '2G529915PL052045B', 'success'),
(2, 31, 3, 67.1, '0', '2019-09-28 11:05:37', NULL, NULL),
(3, 31, 3, 67.1, '1', '2019-09-28 11:13:41', '7A658543HY3248153', 'success'),
(4, 31, 4, 67.1, '0', '2019-09-28 11:21:37', NULL, NULL),
(5, 31, 4, 67.1, '1', '2019-09-28 11:44:49', '86K852198J324513F', 'success'),
(6, 31, 5, 67.1, '1', '2019-09-28 12:14:49', '9B282384888792640', 'success'),
(7, 30, 6, 732, '1', '2019-09-28 12:21:48', '14513348CL960980U', 'success'),
(8, 32, 8, 67.1, '1', '2019-09-28 17:18:44', '44841507R3678800P', 'success'),
(9, 32, 9, 67.1, '0', '2019-09-28 18:28:34', NULL, NULL),
(10, 1, 10, 67.1, '0', '2019-10-03 10:40:04', NULL, NULL),
(11, 8, 11, 67.1, '0', '2019-10-03 12:57:15', NULL, NULL),
(12, 8, 11, 67.1, '0', '2019-10-03 13:00:09', NULL, NULL),
(13, 1, 10, 179.34, '0', '2019-10-03 13:12:54', NULL, NULL),
(14, 1, 10, 1409.1, '0', '2019-10-03 13:19:18', NULL, NULL),
(15, 1, 10, 1409.1, '0', '2019-10-03 13:23:34', NULL, NULL),
(16, 1, 10, 3294, '0', '2019-10-03 19:11:56', NULL, NULL),
(17, 1, 10, 3361.1, '0', '2019-10-04 15:28:26', NULL, NULL),
(18, 1, 10, 1409.1, '0', '2019-10-04 17:32:21', NULL, NULL),
(19, 1, 10, 1409.1, '0', '2019-10-04 19:47:38', NULL, NULL),
(20, 1, 10, 1409.1, '0', '2019-10-04 19:48:26', NULL, NULL),
(21, 1, 10, 1409.1, '0', '2019-10-04 19:53:55', NULL, NULL),
(22, 1, 10, 1409.1, '0', '2019-10-04 20:25:00', NULL, NULL),
(23, 1, 10, 1409.1, '0', '2019-10-04 20:27:10', NULL, NULL),
(24, 1, 10, 1409.1, '0', '2019-10-04 20:28:14', NULL, NULL),
(25, 1, 10, 1409.1, '0', '2019-10-04 20:29:10', NULL, NULL),
(26, 1, 10, 1409.1, '0', '2019-10-05 12:55:46', NULL, NULL),
(27, 1, 10, 1409.1, '0', '2019-10-05 12:56:57', NULL, NULL),
(28, 1, 10, 1409.1, '0', '2019-10-05 12:56:57', NULL, NULL),
(29, 1, 10, 1409.1, '0', '2019-10-05 12:57:36', NULL, NULL),
(30, 1, 10, 1409.1, '0', '2019-10-05 12:59:13', NULL, NULL),
(31, 7, 12, 2141.1, '0', '2019-10-05 13:01:51', NULL, NULL),
(32, 7, 12, 1287.1, '0', '2019-10-05 13:04:06', NULL, NULL),
(33, 1, 10, 1409.1, '0', '2019-10-05 13:05:25', NULL, NULL),
(34, 1, 10, 1409.1, '0', '2019-10-05 13:06:01', NULL, NULL),
(35, 1, 10, 1409.1, '0', '2019-10-05 13:34:36', NULL, NULL),
(36, 1, 10, 1409.1, '0', '2019-10-05 13:43:05', NULL, NULL),
(37, 1, 10, 1409.1, '0', '2019-10-05 13:50:58', NULL, NULL),
(38, 1, 10, 1409.1, '0', '2019-10-05 13:51:57', NULL, NULL),
(39, 1, 10, 1409.1, '0', '2019-10-05 13:53:23', NULL, NULL),
(40, 7, 12, 189.1, '0', '2019-10-06 18:29:59', NULL, NULL),
(41, 1, 10, 3294, '0', '2019-10-11 18:10:20', NULL, NULL),
(42, 1, 10, 2989, '0', '2019-10-11 21:38:39', NULL, NULL),
(43, 1, 10, 2989, '0', '2019-10-15 14:45:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lang` enum('1','2','3','4','5') NOT NULL DEFAULT '1' COMMENT '1=''English'',2=''Deutch'',3=''Italian'',4=''French'',5=''Spanish''',
  `confirmation_string` varchar(255) DEFAULT NULL,
  `forgotpass_string` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `reg_ip` varchar(255) DEFAULT NULL,
  `forgot_password_time` datetime DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `adate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` enum('admin','user') NOT NULL DEFAULT 'user',
  `active_account` tinyint(4) NOT NULL DEFAULT '0',
  `isDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `lang`, `confirmation_string`, `forgotpass_string`, `last_login`, `reg_ip`, `forgot_password_time`, `reg_date`, `adate`, `created_by`, `active_account`, `isDelete`) VALUES
(1, 'test', 'test1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 'YbHH9FCk', NULL, '2019-10-15 16:42:59', '::1', NULL, '2019-09-07 13:50:51', '2019-09-07 13:50:51', 'admin', 1, 0),
(2, 'test1', 'test1@gmail.com', 'f183ab98622ae194c411e94b400d28ef', '1', 'LBRAhCTc', NULL, NULL, '::1', NULL, '2019-09-07 13:51:08', '2019-09-07 13:51:08', 'admin', 1, 0),
(3, 'test123', 'tes2t@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '1', 'sX9MMqXR', NULL, NULL, '::1', NULL, '2019-09-09 11:29:48', '2019-09-09 11:29:48', 'user', 1, 0),
(4, 'test456', 'test5@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '1', 'mA8PCp38', NULL, NULL, '::1', NULL, '2019-09-09 11:30:32', '2019-09-09 11:30:32', 'user', 0, 0),
(5, 'test456', 'test54@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '1', 'HXSQoT92', NULL, NULL, '::1', NULL, '2019-09-09 11:32:18', '2019-09-09 11:32:18', 'user', 0, 0),
(6, 'test456', 'test4@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '1', 'BXxMTSoz', NULL, NULL, '::1', NULL, '2019-09-09 11:36:36', '2019-09-09 11:36:36', 'user', 0, 0),
(7, 'simone.garza', 'simone.garza@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3', 'hBKWizcs', '', '2019-10-06 18:24:55', '192.185.129.86', NULL, '2019-09-17 12:51:21', '2019-09-17 07:21:21', 'user', 1, 0),
(8, 'simone.garza', 'simone.garza@coloursandbeauty.it', 'e10adc3949ba59abbe56e057f20f883e', '3', 'HYKYJP9o', '', '2019-10-03 12:50:10', '192.185.129.86', NULL, '2019-09-17 12:57:49', '2019-09-17 07:27:49', 'user', 1, 0),
(9, 'sahilg', 'sahilghodasara18@gmail.com', 'e8c8f45019430b6f79862746e96d6e70', '1', 'JvmcnUv2', '', '2019-09-17 16:35:35', '192.185.129.86', NULL, '2019-09-17 13:06:27', '2019-09-17 07:36:27', 'user', 1, 0),
(10, 'test', 'test21453@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '1', '4uO9Fipy', NULL, NULL, '192.185.129.86', NULL, '2019-09-17 13:09:14', '2019-09-17 07:39:14', 'user', 0, 0),
(11, 'jemy', 'ba.sxope@gmail.com', 'f5b74dc2430be83f0aa5d9f236e3c188', '1', 'o8ksVvwl', NULL, NULL, '192.185.129.86', NULL, '2019-09-17 13:09:59', '2019-09-17 07:39:59', 'user', 1, 0),
(12, 'hexajeda', 'hexajeda@88av.net', '14e1b600b1fd579f47433b88e8d85291', '1', 'W4hiiB5T', NULL, NULL, '192.185.129.86', NULL, '2019-09-17 13:10:46', '2019-09-17 07:40:46', 'user', 1, 0),
(19, 'vatin 123', 'vatin123@winnweb.net', 'e10adc3949ba59abbe56e057f20f883e', '2', '4g9fSjSo', '', '2019-09-17 16:14:46', '192.185.129.86', NULL, '2019-09-17 15:32:03', '2019-09-17 10:02:03', 'user', 1, 0),
(20, 'simone.garza', 'bumperin@sukasukasuka.me', '81dc9bdb52d04dc20036dbd8313ed055', '1', '7Jb8iiYq', NULL, NULL, '192.185.129.86', NULL, '2019-09-17 16:52:44', '2019-09-17 11:22:44', 'user', 1, 0),
(21, 'testsimone', 'bumperin@hobicapsa.org', 'ad0234829205b9033196ba818f7a872b', '1', '3Dvqvduc', NULL, '2019-09-17 16:55:33', '192.185.129.86', NULL, '2019-09-17 16:55:06', '2019-09-17 11:25:06', 'user', 1, 0),
(22, 'Testing ABC', 'ticofi@5sun.net', 'e10adc3949ba59abbe56e057f20f883e', '1', '5sOdd74Z', NULL, '2019-09-17 19:18:15', '192.185.129.86', NULL, '2019-09-17 17:54:04', '2019-09-17 12:24:04', 'user', 1, 0),
(26, 'Test User 02', 'rofoga@web-inc.net', 'e10adc3949ba59abbe56e057f20f883e', '1', 'KZ6Dukch', NULL, NULL, '192.185.129.86', NULL, '2019-09-23 12:34:20', '2019-09-23 07:04:20', 'user', 1, 0),
(27, 'Test 0023', 'pahivocob@net1mail.com', 'e10adc3949ba59abbe56e057f20f883e', '3', 'MWz3UbYJ', NULL, '2019-09-23 17:27:32', '192.185.129.86', NULL, '2019-09-23 17:16:50', '2019-09-23 11:46:50', 'user', 1, 0),
(28, 'testimwonial', 'testhp@gmail.com', '4dfa487c10b60f6ef3fe9a56d32a241a', '1', 'Q7OVOXcu', NULL, NULL, '192.185.129.86', NULL, '2019-09-23 18:04:31', '2019-09-23 12:34:31', 'admin', 0, 0),
(29, 'namrata', 'php1.department22@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 'w3PpPZiM', NULL, '2019-09-27 21:20:25', '192.185.129.86', NULL, '2019-09-27 21:05:05', '2019-09-27 15:35:05', 'user', 1, 0),
(30, 'new', 'php1.department@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 'zhZHuZDy', NULL, '2019-09-30 17:45:39', '192.185.129.86', NULL, '2019-09-27 21:22:49', '2019-09-27 15:52:49', 'user', 1, 0),
(31, 'Test 023', 'poxadija@amailr.net', '827ccb0eea8a706c4c34a16891f84e7b', '1', 'oiqxEVw6', '', '2019-09-28 11:22:38', '192.185.129.86', NULL, '2019-09-28 10:45:29', '2019-09-28 05:15:29', 'user', 1, 0),
(32, 'Test User 01', 'teta@mail-fix.net', 'f4093d4303a6804a1cf378c28e59581a', '1', 'JaCjHTv1', '1d562026450017450f6bdf40d', '2019-09-28 15:28:47', '192.185.129.86', NULL, '2019-09-28 15:25:58', '2019-09-28 09:55:58', 'user', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`labels_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `labels_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
