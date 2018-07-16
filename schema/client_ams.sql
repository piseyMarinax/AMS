-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 01:06 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `client_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `atb_absents`
--

CREATE TABLE `atb_absents` (
  `id` int(10) UNSIGNED NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `att_typeid` int(11) DEFAULT NULL,
  `addORrequest_by` int(11) DEFAULT NULL,
  `approvedby` int(11) DEFAULT NULL,
  `attdate` date DEFAULT NULL,
  `attdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `att_empty` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `atb_absenttypes`
--

CREATE TABLE `atb_absenttypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `att_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attstatus` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_absenttypes`
--

INSERT INTO `atb_absenttypes` (`id`, `att_title`, `attdetail`, `attstatus`, `created_at`, `updated_at`) VALUES
(1, 'Annual Leave', 'Annual Leave', '1', '2017-10-17 07:00:00', '2017-10-17 07:00:00'),
(3, 'Sick Leave', 'Sick Leave', '1', '2017-10-17 07:00:00', '2017-10-17 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `atb_brands`
--

CREATE TABLE `atb_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `bstatus` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `bdetail` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_brands`
--

INSERT INTO `atb_brands` (`id`, `brand`, `location`, `bstatus`, `bdetail`, `created_at`, `updated_at`) VALUES
(1, 'Head Office', '#8A, Street 1, Borey Belkolon\nSangkat Phnom Penh Thmey\nSensok, Phnom Penh, Cambodia', '1', '#8A, Street 1, Borey Belkolon\r\nSangkat Phnom Penh Thmey\r\nSensok, Phnom Penh, Cambodia\r\nOffice:\r\n(855)23 6666 909\r\nTel:\r\n(855)86 888 506\r\n\r\nE-mail:\r\ninfo@mss.com.kh\r\nWebsite:\r\nwww.mss.com.kh', '2017-10-07 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_depts`
--

CREATE TABLE `atb_depts` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ddetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_depts`
--

INSERT INTO `atb_depts` (`id`, `dept`, `ddetail`, `dstatus`, `created_at`, `updated_at`) VALUES
(1, 'Administrative', 'Administrative', '1', '2017-10-07 17:00:00', NULL),
(3, 'Accounting Office', 'Account Department', '1', '2017-10-07 17:00:00', '2017-10-08 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `atb_documents`
--

CREATE TABLE `atb_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `docname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_documents`
--

INSERT INTO `atb_documents` (`id`, `docname`, `docdetail`, `docstatus`, `created_at`, `updated_at`) VALUES
(1, 'NATIONAL ID', 'អត្តសញ្ញាណប័ណ្ណ', '1', '2017-10-13 17:00:00', '2017-10-13 17:00:00'),
(2, 'Cover Letter & Resumé', 'ប្រវត្តិរូបសង្ខេប', '1', '2017-10-13 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_functions`
--

CREATE TABLE `atb_functions` (
  `id` int(10) UNSIGNED NOT NULL,
  `functitle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funcstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funcdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_functions`
--

INSERT INTO `atb_functions` (`id`, `functitle`, `funcstatus`, `funcdetail`, `created_at`, `updated_at`) VALUES
(1, 'Accounting Manager', '1', 'Manager at Account Department', '2017-10-08 17:00:00', '2017-10-08 17:00:00'),
(4, 'Administrative', '1', 'Manager of Administrative Office', '2017-10-25 17:00:00', NULL),
(5, 'Assistant to Administrative', '1', 'Assistant at Administrative\'s office', '2017-10-25 17:00:00', '2017-10-25 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `atb_salaries`
--

CREATE TABLE `atb_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `staffid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(20,2) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `expiredate` date DEFAULT NULL,
  `dstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sadetail` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_salaries`
--

INSERT INTO `atb_salaries` (`id`, `staffid`, `salary`, `startdate`, `expiredate`, `dstatus`, `sadetail`, `created_at`, `updated_at`) VALUES
(1, '4', 350.00, '2017-01-02', NULL, '1', 'testing data only', '2017-10-29 10:30:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_staffattendances`
--

CREATE TABLE `atb_staffattendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `att_date` date DEFAULT NULL,
  `late_in` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_out` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attaddedby` int(11) DEFAULT NULL,
  `att_detail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `att_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `att_empty` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `atb_staffdocs`
--

CREATE TABLE `atb_staffdocs` (
  `id` int(10) UNSIGNED NOT NULL,
  `sdstaffid` int(11) DEFAULT NULL,
  `sddocid` int(11) DEFAULT NULL,
  `sdtitlenumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdissuedate` date DEFAULT NULL,
  `sdexpiredate` date DEFAULT NULL,
  `sdstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sddetail` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_staffdocs`
--

INSERT INTO `atb_staffdocs` (`id`, `sdstaffid`, `sddocid`, `sdtitlenumber`, `sdissuedate`, `sdexpiredate`, `sdstatus`, `sddetail`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'Resumé', NULL, NULL, '0', 'test data only', '2017-10-29 11:30:30', NULL),
(2, 4, 1, '667890987', NULL, NULL, '0', 'test data only', '2017-10-29 11:35:14', NULL),
(3, 4, 1, '78787788888', '2016-01-02', '2026-12-31', '1', 'test data nation id only', '2017-10-29 11:41:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_stafffunctions`
--

CREATE TABLE `atb_stafffunctions` (
  `id` int(10) UNSIGNED NOT NULL,
  `sfstaffid` int(11) DEFAULT NULL,
  `sfdeptid` int(11) DEFAULT NULL,
  `sffuncid` int(11) DEFAULT NULL,
  `sfstartdate` date DEFAULT NULL,
  `sfenddate` date DEFAULT NULL,
  `sfstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sfdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_stafffunctions`
--

INSERT INTO `atb_stafffunctions` (`id`, `sfstaffid`, `sfdeptid`, `sffuncid`, `sfstartdate`, `sfenddate`, `sfstatus`, `sfdetail`, `created_at`, `updated_at`) VALUES
(1, 17, 1, 4, '2017-01-02', NULL, '1', 'just testing data', '2017-10-28 23:25:41', NULL),
(2, 4, 1, 5, '2017-01-02', NULL, '1', 'testing data only', '2017-10-29 10:31:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_staffs`
--

CREATE TABLE `atb_staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `idnumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staffphoto` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullnameen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullnamekh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdateregister` date DEFAULT NULL,
  `sdateleave` date DEFAULT NULL,
  `saddress` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stafftypeid` int(11) DEFAULT NULL,
  `sbrandid` int(11) DEFAULT NULL,
  `sstatus` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `sdetail` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emptrash` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_staffs`
--

INSERT INTO `atb_staffs` (`id`, `idnumber`, `staffphoto`, `fullnameen`, `fullnamekh`, `dob`, `gender`, `phone`, `semail`, `sdateregister`, `sdateleave`, `saddress`, `stafftypeid`, `sbrandid`, `sstatus`, `added_by`, `sdetail`, `emptrash`, `created_at`, `updated_at`) VALUES
(1, 'AMS0047', NULL, 'Saran', 'saran', '1992-10-18', 'General', '086888172', NULL, '2017-10-18', NULL, 'Phnom Penh', 1, 1, '1', NULL, NULL, '0', '2017-10-18 00:00:00', '2017-10-18 00:00:00'),
(3, 'AMS0049', NULL, 'Davy', 'Davy Sok', '1995-10-22', 'General', '086888172', NULL, '2017-10-22', NULL, 'Phnom Penh', 1, 1, '1', NULL, NULL, '0', '2017-10-22 00:00:00', '2017-10-22 00:00:00'),
(4, 'AMS0050', '135570borey.jpg', 'Borey Sean', 'ស៊ាន បូរី', '1990-02-15', 'General', '070 211 422', 'boreykh2011@gmail.com', '2017-01-02', '1970-01-01', '17, St. 103, Phnom Penh, Cambodia', 1, 1, '1', NULL, 'Description Test\r\n17, St. 103, Phnom Penh, Cambodia', '0', '2017-10-22 21:25:34', '2017-10-26 10:00:08'),
(5, 'AMS0051', '913539800px-no_image_wide.svg.png', 'Sean Boreya', 'ស៊ាន បូរីយ៉ា', '1995-02-15', 'VIP', '070 211 422', 'boreyakh2011@gmail.com', '2017-01-02', NULL, '17, St. 103, Phnom Penh', 1, 1, '1', NULL, 'Description Test111', '0', '2017-10-22 22:29:03', NULL),
(13, 'AMS0052', '634491800px-no_image_wide.svg.png', 'Sean Boreya', 'ស៊ាន បូរីយ៉ា', '1995-02-15', 'General', '070 211 422', 'boreyakh2011@gmail.com', '2017-01-02', NULL, '17, St. 103, Phnom Penh', 1, 1, '1', NULL, 'Description Test1111111', '0', '2017-10-22 23:06:51', NULL),
(14, 'AMS0053', '493701800px-no_image_wide.svg.png', 'Sean Boreya', 'ស៊ាន បូរីយ៉ា', '1995-02-15', 'General', '070 211 422', 'boreyakh2011@gmail.com', '2017-01-02', NULL, '17, St. 103, Phnom Penh', 1, 1, '1', NULL, 'Description Test1111111', '0', '2017-10-22 23:14:49', NULL),
(17, 'AMS0054', '967349boreyii.jpg', 'Sean Boreya', 'ស៊ាន បូរីយ៉ា', '1995-02-15', 'General', '070 211 422', 'boreyakh2011@gmail.com', '2017-01-02', '1970-01-01', '17, St. 103, Phnom Penh, Cambodia', 1, 1, '1', NULL, 'Description Test with address 17, St. 103, Phnom Penh, Cambodia', '0', '2017-10-22 23:23:18', '2017-10-26 09:49:42'),
(21, 'AMS0055', '690770logo2.png', 'Sorya', 'សុរិយា', '2000-10-01', 'VIP', '086308886', 'sorya086@gmail.com', '2017-10-01', NULL, 'Phnom Penh', 1, 1, '1', NULL, 'Test Only', '0', '2017-10-26 04:35:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_staffstatuses`
--

CREATE TABLE `atb_staffstatuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `statid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `sta_issuedate` date DEFAULT NULL,
  `sta_expiredate` date DEFAULT NULL,
  `sta_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sta_files` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_staffstatuses`
--

INSERT INTO `atb_staffstatuses` (`id`, `statid`, `staffid`, `sta_issuedate`, `sta_expiredate`, `sta_status`, `sta_files`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '1970-01-01', '1970-01-01', '1', NULL, '2017-10-22 17:00:00', NULL),
(2, 1, 16, '2017-01-02', '2019-12-31', '1', NULL, '2017-10-22 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_stafftimeworks`
--

CREATE TABLE `atb_stafftimeworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `ststaffid` int(11) DEFAULT NULL,
  `sttimeid` int(11) DEFAULT NULL,
  `ststartdate` date DEFAULT NULL,
  `stexpiredate` date DEFAULT NULL,
  `ststatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `atb_stafftypes`
--

CREATE TABLE `atb_stafftypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_stafftypes`
--

INSERT INTO `atb_stafftypes` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Office', '1', '2017-10-07 17:00:00', NULL),
(2, 'Security', '1', '2017-10-07 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_statuses`
--

CREATE TABLE `atb_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `statustitle` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_statuses`
--

INSERT INTO `atb_statuses` (`id`, `statustitle`, `sdetail`, `sstatus`, `created_at`, `updated_at`) VALUES
(1, 'Single', 'Single', '1', '2017-10-14 17:00:00', NULL),
(2, 'Married', 'Married', '1', '2017-10-14 17:00:00', NULL),
(3, 'Divorced', 'Divorced', '1', '2017-10-14 17:00:00', NULL),
(4, 'Widow', 'Widow', '1', '2017-10-14 17:00:00', NULL),
(5, 'Disabled', 'Disabled', '1', '2017-10-14 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atb_timeworks`
--

CREATE TABLE `atb_timeworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `titleshift` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeofshift` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tdetail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tstatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atb_timeworks`
--

INSERT INTO `atb_timeworks` (`id`, `titleshift`, `timeofshift`, `tdetail`, `tstatus`, `created_at`, `updated_at`) VALUES
(1, 'Full Time 7:30', '7:30 AM - 5:00 PM', 'ម៉ោងចូលធ្វើការ ព្រឹក 7:30 - 11:30 AM និងពេលរសៀលម៉ោង 1:00 - 5:00 PM', '1', '2017-10-13 17:00:00', '2017-10-13 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cont_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cont_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cont_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `tran_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `user_create` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cusvatin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cusdetail` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custrash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cus_code`, `cus_name`, `address`, `phone`, `email`, `web`, `cont_name`, `cont_phone`, `cont_email`, `cus_cf1`, `cus_cf2`, `cus_cf3`, `cus_cf4`, `cus_cf5`, `status`, `tran_status`, `user_create`, `user_update`, `created_at`, `updated_at`, `cusvatin`, `cusdetail`, `custrash`) VALUES
(1, 'CUS001', 'Southern Capital specialized Bank PLC', '#294, St. Mao Tse Tong Blv, PP', '070 211 422', 'admin@mss.com.kh', 'mss.com.kh', 'Visal', '070 211 422', 'admin@mss.com.kh', NULL, NULL, NULL, NULL, NULL, '1', 'N', 3, 3, '2017-10-30 03:13:20', '2017-10-30 03:13:20', 'L001-901637713', 'test data only', '0');

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_barcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `default_cost` decimal(25,2) NOT NULL DEFAULT '0.00',
  `default_price` decimal(25,2) NOT NULL DEFAULT '0.00',
  `item_price1` decimal(25,2) NOT NULL DEFAULT '0.00',
  `item_price2` decimal(25,2) NOT NULL DEFAULT '0.00',
  `item_price3` decimal(25,2) NOT NULL DEFAULT '0.00',
  `item_price4` decimal(25,2) NOT NULL DEFAULT '0.00',
  `item_price5` decimal(25,2) NOT NULL DEFAULT '0.00',
  `unit_stock` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_purch` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_cf1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_cf2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_cf3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_cf4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_cf5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `tran_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `user_create` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `trans_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `category_code`, `category_name`, `parent_id`, `status`, `trans_status`, `created_at`, `updated_at`, `user_create`, `user_update`) VALUES
(1, '001010', 'Sarankhan', 0, '1', '0', '2018-03-28 22:15:54', '2018-03-28 22:15:54', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_29_151800_create_supplier_items_table', 1),
(4, '2017_05_12_005839_create_item_categories_table', 1),
(5, '2017_05_12_013158_add_column_item_categories_table', 1),
(6, '2017_05_12_013504_create_items_table', 1),
(7, '2017_05_12_140400_create_customers_table', 1),
(8, '2017_05_12_141946_create_suppliers_table', 1),
(9, '2017_05_19_130357_add_column_to_users_table', 1),
(10, '2017_05_25_112733_create_group_users_table', 1),
(11, '2017_08_02_015631_create_table_account_groups_table', 2),
(12, '2017_08_02_015710_create_table_account_types_table', 2),
(13, '2017_08_02_015734_create_table_account_charts_table', 2),
(14, '2017_08_02_020632_create_table_journals_table', 3),
(15, '2017_08_10_013827_create_table_incomes_table', 4),
(16, '2017_08_10_013942_create_table_expenses_table', 4),
(17, '2017_08_10_014021_create_table_account_receiveables_table', 4),
(18, '2017_08_10_014051_create_table_account_payables_table', 4),
(19, '2017_08_10_014210_create_table_pay_ars_table', 4),
(20, '2017_08_10_014222_create_table_pay_aps_table', 4),
(21, '2017_08_10_014321_create_table_pay_ar_details_table', 4),
(22, '2017_08_10_014332_create_table_pay_ap_details_table', 4),
(23, '2017_08_10_014425_create_table_journal_entries_table', 4),
(24, '2017_08_20_085052_add_colum_id_tax_journal', 5),
(25, '2017_08_23_013104_create_table_type_of_pays_table', 6),
(26, '2017_08_23_013202_create_table_classes_table', 6),
(27, '2017_08_23_020827_add_colum_class_table_classes', 7),
(28, '2017_08_24_022439_create_table_taxes_table', 8),
(29, '2017_08_28_150341_add_colum_table_income', 9),
(30, '2017_09_05_020240_add_column_acc_id_table_income', 10),
(31, '2017_09_07_002740_add_colum_journal_entry_des', 10),
(32, '2017_10_01_110431_create_table_data_configs_table', 10),
(33, '2017_10_02_120643_add_column_staff_id_users', 10),
(34, '2017_10_08_045441_create_atb_stafftypes_table', 11),
(35, '2017_10_08_050858_create_atb_brands_table', 12),
(36, '2017_10_08_051656_create_atb_functions_table', 13),
(37, '2017_10_08_052039_create_atb_depts_table', 14),
(38, '2017_10_08_053717_create_atb_documents_table', 15),
(39, '2017_10_08_053842_create_atb_timeworks_table', 16),
(40, '2017_10_08_054052_create_atb_salaries_table', 17),
(41, '2017_10_08_054609_create_atb_stafffunctions_table', 18),
(42, '2017_10_08_055019_create_atb_staffdocs_table', 19),
(43, '2017_10_08_055400_create_atbstafftimeworks_table', 20),
(44, '2017_10_08_060038_create_atb_staffs_table', 21),
(45, '2017_10_08_060617_create_atb_stafftimeworks_table', 21),
(46, '2017_10_14_104252_add_cusvatin_to_customers', 22),
(47, '2017_10_15_050118_create_atb_absenttypes_table', 23),
(48, '2017_10_15_050158_create_atb_absents_table', 23),
(49, '2017_10_15_050253_create_atb_staffattendances_table', 23),
(50, '2017_10_15_134701_add_staffphoto_to_atbStaffs', 24),
(51, '2017_10_15_135921_create_atb_statuses_table', 25),
(52, '2017_10_15_140242_add_emptrash_to_atbStaffs', 25),
(53, '2017_10_15_141142_create_atb_staffstatuses_table', 26),
(54, '2017_10_17_043002_add_idnumber_to_atbStaffs', 27),
(56, '2017_10_17_051416_add_staffstatus_to_atbStaffs', 28),
(57, '2017_10_17_053110_add_semail_to_atbStaffs', 29),
(58, '2017_10_23_022535_add_addedBy_to_atbStaffs', 30),
(59, '2017_10_23_024929_add_sdetail_to_atbStaffs', 31),
(60, '2017_10_29_165745_add_sadetail_to_atbSalaries', 32),
(61, '2017_10_29_182827_add_sddetail_to_atb_staffdocs', 33),
(62, '2017_10_30_100149_add_cusdetail_to_customers', 34),
(63, '2017_10_30_132853_add_custrash_to_customers', 35),
(64, '2018_03_31_134541_create_tbcustomers_table', 36),
(65, '2018_03_31_134626_create_tbcusttypes_table', 36),
(66, '2018_03_31_134648_create_tbpricesets_table', 36),
(67, '2018_04_07_064303_create_tbcustrashes_table', 37),
(68, '2018_04_07_100719_create_tbcusfiles_table', 38),
(69, '2018_04_08_044913_create_tbcusitemprices_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `sup_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cont_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cont_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cont_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_cf5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `tran_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `user_create` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_items`
--

CREATE TABLE `supplier_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `sup_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_purch` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defult_cost` decimal(25,2) NOT NULL,
  `user_create` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_account_charts`
--

CREATE TABLE `table_account_charts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ac_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ac_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ac_type` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` smallint(6) DEFAULT NULL,
  `no_trash` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_account_charts`
--

INSERT INTO `table_account_charts` (`id`, `ac_code`, `ac_name`, `ac_type`, `parent_id`, `des`, `ordering`, `no_trash`, `created_at`, `updated_at`) VALUES
(1, '10000', 'Cash', 1, 0, 'Cash', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(2, '10110', 'Bank Account in US', 1, 0, 'Bank Account in US', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(3, '10120', 'Bank Account in Riel', 1, 0, 'Bank Account in Riel', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(4, '10130', 'Cheque', 1, 0, 'Cheque', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(5, '10140', 'Transfer', 1, 0, 'Transfer', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(6, '10200', 'Petty Cash', 1, 0, 'Petty Cash', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(7, '11000', 'Principal', 1, 0, 'Principal', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(8, '11100', 'Accounts Receivable', 1, 0, 'Accounts Receivable', 1, 1, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(9, '11110', 'Accounts Receivable Credit', 1, 0, 'Accounts Receivable Credit', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(10, '11200', 'Tax Receivables', 1, 0, 'Tax Receivables', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(11, '12100', 'Prepaid Expense', 3, 0, 'Prepaid Expense', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(12, '12200', 'Supplies', 3, 0, 'Supplies', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(13, '12300', 'Construction Materials', 3, 0, 'Construction Materials', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(14, '12310', 'Other Construction Materials', 3, 0, 'Other Construction Materials', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(15, '12320', 'Inventory', 3, 0, 'Inventory', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(16, '13000', 'Furniture and Equipment', 2, 0, 'Furniture and Equipment', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(17, '13010', 'F&E Accumulated Depreciation', 2, 0, 'F&E Accumulated Depreciation', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(18, '13100', 'Vehicles', 2, 0, 'Vehicles', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(19, '13110', 'Vehicle Accumulated Depreciation', 2, 0, 'Vehicle Accumulated Depreciation', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(20, '13200', 'Buildings and Improvements', 2, 0, 'Buildings and Improvements', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(21, '13210', 'Buildings and Improvements Acc', 2, 0, 'Buildings and Improvements Acc', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(22, '13300', 'Construction Equipment', 2, 0, 'Construction Equipment', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(23, '13310', 'Construction Equipment Acc', 2, 0, 'Construction Equipment Acc', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(24, '13400', 'Land', 2, 0, 'Land', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(25, '20000', 'Account Payable', 4, 0, 'Account Payable', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(26, '20100', 'Accounts Payable  Credit', 4, 0, 'Accounts Payable  Credit', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(27, '21000', 'Customer Deposit', 5, 0, 'Customer Deposit', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(28, '22000', 'Other Payable', 5, 0, 'Other Payable', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(29, '30100', 'Capital Stock', 6, 0, 'Capital Stock', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(30, '31400', 'Distributions paid to shareholders', 6, 0, 'Distributions paid to shareholders', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(31, '32000', 'Retained Earnings', 6, 0, 'Retained Earnings', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(32, '40000', 'Sale', 7, 0, 'Sale', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(33, '41000', 'Interest Income', 7, 0, 'Interest Income', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(34, '41100', 'Operating Income', 7, 0, 'Operating Income', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(35, '42000', 'Sell Construction Material', 8, 0, 'Sell Construction Material', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(36, '42100', 'Penalty Charge', 10, 0, 'Penalty Charge', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(37, '42200', 'Other Income', 8, 0, 'Other Income', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(38, '43000', 'Miscellaneous Income', 9, 0, 'Miscellaneous Income', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(39, '43100', 'Admin Service Charge', 9, 0, 'Admin Service Charge', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(40, '50000', 'Cost of Goods Sold', 10, 0, 'Cost of Goods Sold', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(41, '51000', 'Salary Expense', 10, 0, 'Salary Expense', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(42, '51100', 'Wages Expense', 10, 0, 'Wages Expense', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(43, '51200', 'Labor Expense', 10, 0, 'Labor Expense', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(44, '51300', 'Interest Expense', 10, 0, 'Interest Expense', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(45, '51400', 'Gas and Electric', 10, 0, 'Gas and Electric', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(46, '51500', 'Water', 10, 0, 'Water', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(47, '51600', 'Telephone', 10, 0, 'Telephone', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(48, '51700', 'Insurance', 10, 0, 'Insurance', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(49, '51800', 'Legal Fees', 10, 0, 'Legal Fees', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(50, '51900', 'Finance Charge', 10, 0, 'Finance Charge', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(51, '52000', 'Property Taxes', 10, 0, 'Property Taxes', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(52, '52100', 'Fuel Expense', 10, 0, 'Fuel Expense', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(53, '52200', 'Repairs and Maintenance', 10, 0, 'Repairs and Maintenance', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(54, '52300', 'Rent', 10, 0, 'Rent', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(55, '53000', 'Taxes', 10, 0, 'Taxes', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(56, '54000', 'Depreciation Expense', 10, 0, 'Depreciation Expense', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(57, '55000', 'Freight and Delivery', 11, 0, 'Freight and Delivery', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(58, '55100', 'Automobile', 11, 0, 'Automobile', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(59, '55200', 'Bank Service Charges', 11, 0, 'Bank Service Charges', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(60, '55300', 'Dues and Subscriptions', 11, 0, 'Dues and Subscriptions', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(61, '55400', 'Union Dues', 11, 0, 'Union Dues', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(62, '55500', 'Office Supplies', 11, 0, 'Office Supplies', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(63, '55600', 'Printing and Reproduction', 11, 0, 'Printing and Reproduction', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(64, '55700', 'Professional Fees', 11, 0, 'Professional Fees', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(65, '55800', 'Accounting Fees', 11, 0, 'Accounting Fees', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(66, '55900', 'Building Repairs', 11, 0, 'Building Repairs', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(67, '56000', 'Computer Repairs', 11, 0, 'Computer Repairs', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(68, '56100', 'Equipment Repairs', 11, 0, 'Equipment Repairs', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(69, '56200', 'Tools and Machinery', 11, 0, 'Tools and Machinery', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(70, '57000', 'Discount', 12, 0, 'Discount', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(71, '57100', 'Miscellaneous', 12, 0, 'Miscellaneous', 1, 0, '2017-08-20 17:00:00', '2017-08-20 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_account_groups`
--

CREATE TABLE `table_account_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `ag_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_account_groups`
--

INSERT INTO `table_account_groups` (`id`, `ag_name`, `created_at`, `updated_at`) VALUES
(1, 'Asset', '2017-08-11 17:00:00', '2017-08-11 17:00:00'),
(2, 'Liability', '2017-08-11 17:00:00', '2017-08-11 17:00:00'),
(3, 'Equity', '2017-08-11 17:00:00', '2017-08-11 17:00:00'),
(4, 'Income', '2017-08-11 17:00:00', '2017-08-11 17:00:00'),
(5, 'Expense', '2017-08-11 17:00:00', '2017-08-11 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_account_payables`
--

CREATE TABLE `table_account_payables` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `ap_date` date DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `ap_action` smallint(6) DEFAULT NULL,
  `referent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_account_receiveables`
--

CREATE TABLE `table_account_receiveables` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `ar_date` date DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `ar_action` smallint(6) DEFAULT NULL,
  `referent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_account_types`
--

CREATE TABLE `table_account_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `at_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at_gruop` int(11) DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_account_types`
--

INSERT INTO `table_account_types` (`id`, `at_name`, `at_gruop`, `des`, `created_at`, `updated_at`) VALUES
(1, 'Current Asset', 1, 'Current Asset', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(2, 'FIXASSET', 1, 'FIXASSET', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(3, 'Other Current Asset', 1, 'Other Current Asset', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(4, 'Current Liabilities', 2, 'Current Liabilities', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(5, 'Other Liabilities', 2, 'Other Liabilities', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(6, 'Capital', 3, 'Capital', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(7, 'Operating Income', 4, 'Operating Income', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(8, 'Non Operating Income', 4, 'Non Operating Income', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(9, 'Other Income', 4, 'Other Income', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(10, 'Operating Expense', 5, 'Operating Expense', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(11, 'Non Operating Expense ', 5, 'Non Operating Expense', '2017-08-20 17:00:00', '2017-08-20 17:00:00'),
(12, 'Other Expense', 5, 'Other Expense', '2017-08-20 17:00:00', '2017-08-20 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_classes`
--

CREATE TABLE `table_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_type` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_classes`
--

INSERT INTO `table_classes` (`id`, `name`, `status`, `created_at`, `updated_at`, `class_type`) VALUES
(1, 'Saran', 1, NULL, NULL, 0),
(2, 'Saran1233', 1, '2017-08-22 17:00:00', '2017-08-22 17:00:00', 0),
(3, 'sSATRANSDFDFF', 1, '2017-08-22 17:00:00', '2017-08-22 17:00:00', 0),
(4, 'sarerervvdfdf', 1, '2017-08-22 17:00:00', '2017-08-22 17:00:00', 0),
(5, 'sdfsdfsdfdsf', 1, '2017-08-22 17:00:00', '2017-08-22 17:00:00', 1),
(6, '2323sara', 1, '2017-08-23 17:00:00', '2017-08-23 17:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_data_configs`
--

CREATE TABLE `table_data_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_vale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_expenses`
--

CREATE TABLE `table_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_incomes`
--

CREATE TABLE `table_incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_incomes`
--

INSERT INTO `table_incomes` (`id`, `code`, `acc_code`, `amount`, `income_date`, `class`, `jn_id`, `image`, `user_id`, `status`, `trash`, `created_at`, `updated_at`, `acc_id`) VALUES
(1, 'IN_0002', '1', 121.00, '2017-08-27', 0, 11, NULL, 2, 1, 0, NULL, NULL, 1),
(2, 'IN_0003', '1', 159.60, '2017-08-27', 0, 13, NULL, 1, 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 1),
(3, 'IN_0005', '1', 122.00, '2017-08-27', 0, 16, NULL, 1, 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 1),
(4, 'IN_0006', '1', 22.00, '2017-08-27', 0, 19, NULL, 1, 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 1),
(5, 'IN_0007', '10000', 900.00, '2017-08-29', 0, 22, NULL, 2, 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 1),
(6, 'IN_0008', '10000', 9000.00, '2017-08-29', 0, 25, NULL, 1, 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 1),
(7, 'IN_0009', '10000', 2709.00, '2017-08-29', 1, 27, NULL, 1, 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_journals`
--

CREATE TABLE `table_journals` (
  `id` int(10) UNSIGNED NOT NULL,
  `jn_pid` int(11) DEFAULT NULL,
  `jn_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jn_ac_type` int(11) DEFAULT NULL,
  `jn_ac_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jn_date_transaction` date DEFAULT NULL,
  `jn_date_pay` date DEFAULT NULL,
  `jn_drb` double(20,2) DEFAULT NULL,
  `jn_crb` double(20,2) DEFAULT NULL,
  `jn_referent` int(11) DEFAULT NULL,
  `jn_class` int(11) DEFAULT NULL,
  `jn_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `referent_tpye` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jn_status` smallint(6) DEFAULT NULL,
  `jn_trash` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tax_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_journals`
--

INSERT INTO `table_journals` (`id`, `jn_pid`, `jn_code`, `jn_ac_type`, `jn_ac_code`, `jn_date_transaction`, `jn_date_pay`, `jn_drb`, `jn_crb`, `jn_referent`, `jn_class`, `jn_des`, `user_id`, `referent_tpye`, `jn_status`, `jn_trash`, `created_at`, `updated_at`, `tax_id`) VALUES
(1, NULL, '122233', 1, NULL, '2017-08-26', '2017-08-26', 1010.00, 0.00, 4, 1, NULL, 1, 'income', 1, 0, '2017-08-25 17:00:00', '2017-08-25 17:00:00', 0),
(2, NULL, 'Saran1223', 1, NULL, '2017-08-26', '2017-08-26', 8170.00, 0.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-25 17:00:00', '2017-08-25 17:00:00', 0),
(3, NULL, 'Saran12231', 5, NULL, '2017-08-26', '2017-08-26', 1022.00, 0.00, 4, 0, NULL, 2, 'income', 1, 0, '2017-08-25 17:00:00', '2017-08-25 17:00:00', 0),
(4, NULL, 'Saran122312323', 4, NULL, '2017-08-26', '2017-08-26', 245.00, 0.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-25 17:00:00', '2017-08-25 17:00:00', 0),
(5, NULL, 'Saran1223123231212', 4, NULL, '2017-08-26', '2017-08-26', 121212.00, 0.00, 4, 0, NULL, 2, 'income', 1, 0, '2017-08-25 17:00:00', '2017-08-25 17:00:00', 0),
(6, NULL, 'Saran1223123231212sdfasd', 4, NULL, '2017-08-26', '2017-08-26', 1121212.00, 0.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-25 17:00:00', '2017-08-25 17:00:00', 0),
(7, NULL, 'Saran1223123231212sdfasdsadsad', 1, NULL, '2017-08-26', '2017-08-26', 12113.00, 0.00, 4, 0, NULL, 2, 'income', 1, 0, '2017-08-25 17:00:00', '2017-08-25 17:00:00', 0),
(8, NULL, '0980988', 1, NULL, '2017-08-27', '2017-08-27', 48.12, 0.00, 4, 1, NULL, 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(9, NULL, 'IN_0001', 4, NULL, '2017-08-27', '2017-08-27', 122.00, 0.00, 4, 0, NULL, 2, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(10, 9, 'IN_0001', 4, NULL, '2017-08-27', '2017-08-27', 122.00, 0.00, 4, 0, NULL, 2, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(11, NULL, 'IN_0002', 4, NULL, '2017-08-27', '2017-08-27', 121.00, 0.00, 4, 0, NULL, 2, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(12, 11, 'IN_0002', 4, NULL, '2017-08-27', '2017-08-27', 121.00, 0.00, 4, 0, NULL, 2, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(13, NULL, 'IN_0003', 4, NULL, '2017-08-27', '2017-08-27', 159.60, 0.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(14, 13, 'IN_0003', 4, NULL, '2017-08-27', '2017-08-27', 0.00, 122.00, 4, 0, 'sER', 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 5),
(15, 13, 'IN_0003', 4, NULL, '2017-08-27', '2017-08-27', 0.00, 12.00, 4, 5, 'dsfdsf', 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 3),
(16, 0, 'IN_0005', 1, '10000', '2017-08-27', '2017-08-27', 122.00, 0.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(17, 16, 'IN_0005', 1, NULL, '2017-08-27', '2017-08-27', 0.00, 122.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(18, 0, 'IN_0005', 1, '10000', '2017-08-27', '2017-08-27', 0.00, 0.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', -1),
(19, 0, 'IN_0006', 1, '10000', '2017-08-27', '2017-08-27', 22.00, 0.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 0),
(20, 19, 'IN_0006', 1, '43000', '2017-08-27', '2017-08-27', 0.00, 20.00, 4, 2, 'sarac', 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', 3),
(21, 19, 'IN_0006', 55, '53000', '2017-08-27', '2017-08-27', 0.00, 2.00, 4, 0, NULL, 1, 'income', 1, 0, '2017-08-26 17:00:00', '2017-08-26 17:00:00', -1),
(22, 0, 'IN_0007', 1, '10000', '2017-08-29', '2017-08-29', 900.00, 0.00, 4, 0, 'Cash', 2, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 0),
(23, 22, 'IN_0007', 1, '41100', '2017-08-29', '2017-08-29', 0.00, 900.00, 4, 0, 'sardf', 2, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 0),
(24, 22, 'IN_0007', 55, '53000', '2017-08-29', '2017-08-29', 0.00, 0.00, 4, 0, 'Taxes', 2, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', -1),
(25, 0, 'IN_0008', 1, '10000', '2017-08-29', '2017-08-29', 9000.00, 0.00, 4, 0, 'Cash', 1, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 0),
(26, 25, 'IN_0008', 32, '40000', '2017-08-29', '2017-08-29', 0.00, 9000.00, 4, 0, 'Sale', 1, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 0),
(27, 0, 'IN_0009', 1, '10000', '2017-08-29', '2017-08-29', 2709.00, 0.00, 4, 1, 'Cash', 1, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 0),
(28, 27, 'IN_0009', 32, '40000', '2017-08-29', '2017-08-29', 0.00, 900.00, 4, 0, 'sara', 1, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 1),
(29, 27, 'IN_0009', 33, '41000', '2017-08-29', '2017-08-29', 0.00, 900.00, 4, 0, 'sara', 1, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 0),
(30, 27, 'IN_0009', 34, '41100', '2017-08-29', '2017-08-29', 0.00, 900.00, 4, 0, 'sara', 1, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', 0),
(31, 27, 'IN_0009', 55, '53000', '2017-08-29', '2017-08-29', 0.00, 9.00, 4, 1, 'Taxes', 1, 'income', 1, 0, '2017-08-28 17:00:00', '2017-08-28 17:00:00', -1);

-- --------------------------------------------------------

--
-- Table structure for table `table_journal_entries`
--

CREATE TABLE `table_journal_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_pay_aps`
--

CREATE TABLE `table_pay_aps` (
  `id` int(10) UNSIGNED NOT NULL,
  `pay_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `ap_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_amount` double(20,2) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `pay_action` smallint(6) DEFAULT NULL,
  `referent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_pay_ap_details`
--

CREATE TABLE `table_pay_ap_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `receiable_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `total_amount` double(20,2) DEFAULT NULL,
  `date_connect` date DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `apply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_amount` double(20,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `action` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_pay_ars`
--

CREATE TABLE `table_pay_ars` (
  `id` int(10) UNSIGNED NOT NULL,
  `pay_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `ar_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_amount` double(20,2) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `pay_action` smallint(6) DEFAULT NULL,
  `referent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_pay_ar_details`
--

CREATE TABLE `table_pay_ar_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `receiable_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `total_amount` double(20,2) DEFAULT NULL,
  `date_connect` date DEFAULT NULL,
  `jn_id` int(11) DEFAULT NULL,
  `apply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_amount` double(20,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `trash` smallint(6) DEFAULT NULL,
  `action` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_taxes`
--

CREATE TABLE `table_taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_vale` double(10,4) DEFAULT NULL,
  `tax_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_taxes`
--

INSERT INTO `table_taxes` (`id`, `tax_name`, `tax_vale`, `tax_detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tax 1%', 0.0100, 'Tax 1%', 1, '2017-08-24 17:00:00', '2017-08-24 17:00:00'),
(2, 'Tax 5%', 0.0500, 'Tax 5%', 1, '2017-08-24 17:00:00', '2017-08-24 17:00:00'),
(3, 'Tax 10%', 0.1000, 'Tax 10%', 1, '2017-08-24 17:00:00', '2017-08-24 17:00:00'),
(4, 'Tax 15%', 0.1500, 'Tax 15%', 1, '2017-08-24 17:00:00', '2017-08-24 17:00:00'),
(5, 'Tax 20%', 0.2000, 'Tax 20%', 1, '2017-08-24 17:00:00', '2017-08-24 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_type_of_pays`
--

CREATE TABLE `table_type_of_pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc_id` int(11) DEFAULT '0',
  `referent_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `amount` double(20,2) DEFAULT '0.00',
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_type_tb`
--

CREATE TABLE `tax_type_tb` (
  `taxid` int(11) NOT NULL,
  `tax_name` int(11) DEFAULT NULL,
  `tax_value` float DEFAULT NULL,
  `tax_status` int(1) DEFAULT NULL,
  `tax_detail` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbcusfiles`
--

CREATE TABLE `tbcusfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `c_files` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbcusfiles`
--

INSERT INTO `tbcusfiles` (`id`, `cus_id`, `c_files`, `created_at`, `updated_at`) VALUES
(1, 5, '329772word-intro-tasks.doc', '2018-04-08 01:23:58', NULL),
(2, 8, '885430111.png', '2018-04-08 04:07:10', NULL),
(3, 9, '78396917-06-2017_02_09_36_ducati2.jpg', '2018-04-09 00:41:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbcusitemprices`
--

CREATE TABLE `tbcusitemprices` (
  `id` int(10) UNSIGNED NOT NULL,
  `cu_id` int(11) DEFAULT NULL,
  `item_price` double(8,2) DEFAULT NULL,
  `items` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbcusitemprices`
--

INSERT INTO `tbcusitemprices` (`id`, `cu_id`, `item_price`, `items`, `created_at`, `updated_at`) VALUES
(1, 4, 13.00, 43.00, '2018-04-07 22:47:54', NULL),
(2, 5, 15.00, 32.00, '2018-04-08 01:23:58', NULL),
(3, 6, 12.00, 25.00, '2018-04-08 04:01:37', NULL),
(4, 7, 12.00, 11.00, '2018-04-08 04:05:48', NULL),
(5, 8, 15.00, 112.00, '2018-04-08 04:07:10', '2018-04-10 02:34:30'),
(6, 9, 13.00, 18.00, '2018-04-09 00:41:42', NULL),
(7, 10, 15.00, 5.00, '2018-04-17 19:54:00', NULL),
(8, 11, 15.00, 8.00, '2018-04-17 19:55:02', NULL),
(9, 12, 15.00, 6.00, '2018-04-17 19:56:27', NULL),
(10, 13, 15.00, 15.00, '2018-04-17 19:57:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomers`
--

CREATE TABLE `tbcustomers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `cust_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_comname` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_tid` int(11) DEFAULT NULL,
  `cust_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_trash` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cust_addr` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_noted` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_regdate` date DEFAULT NULL,
  `cust_regby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbcustomers`
--

INSERT INTO `tbcustomers` (`id`, `cust_id`, `cust_name`, `cust_phone`, `cust_email`, `cust_comname`, `cust_tid`, `cust_status`, `cust_trash`, `cust_addr`, `cust_noted`, `cust_regdate`, `cust_regby`, `created_at`, `updated_at`) VALUES
(1, 1, 'Borey', '070 211 422/085 690936', 'boreykh2011@gmail.com', 'PING IT GROUP', 1, '1', '0', 'Phnom Penh, Cambodia', 'Tested data', '2018-04-01', 1, '2018-03-31 17:00:00', NULL),
(9, 9, 'Sao Dara', '012 321456', 'saodara@yahoo.com', 'Phnom Penh Center', 3, '1', '0', 'Chamkar Morn, Phnom Penh', 'data test', '2018-04-08', 2, '2018-04-09 00:41:42', NULL),
(3, 3, 'Sok Dara', '011 224456', 'test@ymail.com', 'TEST', 1, '1', '0', 'Sen Sok, Phnom Penh, Cambodia', 'Test data', '2018-04-02', 2, '2018-04-07 22:34:41', NULL),
(10, 10, 'Nou Vicheka', '099876543', 'vicheka@gmail.com', NULL, 1, '1', '0', 'Phnom Penh', 'Gas\r\nClean\r\nUtilities', '2018-04-01', 2, '2018-04-17 19:54:00', NULL),
(5, 5, 'Heng Minea', '012 234765', 'mineaheng@yahoo.com', 'Fuji', 2, '1', '0', 'Por Sen Chey, Phnom Penh', 'VIP Customer', '2018-04-01', 2, '2018-04-08 01:23:58', NULL),
(6, 6, 'Phanith', '096 6300173', 'phanith@yahoo.com', 'AMS', 1, '1', '0', 'Por Chen Tong, Phnom Penh, Cambodia', 'Test data insert', '2018-04-08', 2, '2018-04-08 04:01:37', NULL),
(7, 7, 'Mong Dara', '098 123456', 'mongdara@gmail.com', 'test', 2, '1', '0', 'Por Chen Tong', 'test upload', '2018-04-08', 2, '2018-04-08 04:05:48', NULL),
(8, 8, 'Mong Dararoth', '098 123654-098', 'mongdara654@gmail.com', 'test test', 3, '1', '0', 'Por Chen Tong, Phnom Penh', 'test upload test', '2018-04-08', 2, '2018-04-08 04:07:10', '2018-04-10 02:34:30'),
(11, 11, 'Vong Nisa', '099 123456', 'nisa@gmail.com', NULL, 1, '1', '0', 'Phnom Penh', 'Clean\r\nGas\r\nand other services', '2018-04-01', 2, '2018-04-17 19:55:02', NULL),
(12, 12, 'Seng Bunly', '089234567', 'bunly@yahoo.com', NULL, 1, '1', '0', 'Russei Keo, Phnom Penh', 'Clean\r\nGas', '2018-04-01', 2, '2018-04-17 19:56:27', NULL),
(13, 13, 'Morm Molis', '086 232425', 'molis@yahoo.com', NULL, 2, '1', '0', NULL, 'Cleaning\r\nGas\r\nUtilities', '2018-04-01', 2, '2018-04-17 19:57:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbcustrashes`
--

CREATE TABLE `tbcustrashes` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_id` double(8,2) DEFAULT NULL,
  `c_trash_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbcusttypes`
--

CREATE TABLE `tbcusttypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ct_id` int(11) DEFAULT NULL,
  `ct_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_des` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_trash` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbcusttypes`
--

INSERT INTO `tbcusttypes` (`id`, `ct_id`, `ct_title`, `ct_des`, `ct_status`, `ct_trash`, `created_at`, `updated_at`) VALUES
(1, 1, 'Premium', 'for all customer normal or Premium', '1', '0', '2018-03-31 17:00:00', NULL),
(2, 2, 'VIP', 'For Special Customer', '1', '0', '2018-03-31 17:00:00', NULL),
(3, 3, 'Gold', 'Gold customers', '1', '0', '2018-04-07 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbpricesets`
--

CREATE TABLE `tbpricesets` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `p_price` double(100,2) DEFAULT NULL,
  `p_des` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_trash` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `gender`, `phone`, `user_pic`, `status`, `create_by`, `update_by`, `staff_id`) VALUES
(1, 'Saran', 'saran@gamail.com', '$2y$10$VzYdojLY5vBqM7ljD6ogJeoqogFj9PGzuJio3elTUy/LNpzam8chC', 'awSnHPdDBoDV2Qf8rCyAhOOmFW9NZsQvFGnTzxdAOmMs9OtT50UW2mZajAB9', '2017-05-10 12:34:18', '2018-04-18 09:00:20', 'M', '086 123456', NULL, '0', NULL, 3, 0),
(2, 'Khan Saran', 'admin@gmail.com', '$2y$10$bBtTSPxSkepIUrdK/VXsMO5UjbYEOxk.CEbm8RhvszULv4j3XHMkm', 'Xi4NZiWlongyeNWWrYcQ6Ri9wLXdcQe1BJ6xnULz0sQxtHRTG9KSIKCc6Hb4', '2017-05-11 11:18:43', '2018-04-17 01:46:14', 'M', '086 123456', NULL, '1', NULL, 2, 0),
(3, 'Borey', 'boreykh2011@gmail.com', '$2y$10$8bB.YaEjjGnnV9MwZF9ZX.EKedRFrZXvRaEA8fKGOF9DitKiq6ngO', 'rCFNfFhU8VDYOROw2hlEgBz9iTOI3yOIeteYhz7vcNHN6Lm4cQGKUnJ4raMV', '2017-10-14 03:20:38', '2018-04-18 08:58:38', 'M', '070 211 422', NULL, '1', 2, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atb_absents`
--
ALTER TABLE `atb_absents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_absenttypes`
--
ALTER TABLE `atb_absenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_brands`
--
ALTER TABLE `atb_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_depts`
--
ALTER TABLE `atb_depts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_documents`
--
ALTER TABLE `atb_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_functions`
--
ALTER TABLE `atb_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_salaries`
--
ALTER TABLE `atb_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_staffattendances`
--
ALTER TABLE `atb_staffattendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_staffdocs`
--
ALTER TABLE `atb_staffdocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_stafffunctions`
--
ALTER TABLE `atb_stafffunctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_staffs`
--
ALTER TABLE `atb_staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_staffstatuses`
--
ALTER TABLE `atb_staffstatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_stafftimeworks`
--
ALTER TABLE `atb_stafftimeworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_stafftypes`
--
ALTER TABLE `atb_stafftypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_statuses`
--
ALTER TABLE `atb_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atb_timeworks`
--
ALTER TABLE `atb_timeworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_items`
--
ALTER TABLE `supplier_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_account_charts`
--
ALTER TABLE `table_account_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_account_groups`
--
ALTER TABLE `table_account_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_account_payables`
--
ALTER TABLE `table_account_payables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_account_receiveables`
--
ALTER TABLE `table_account_receiveables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_account_types`
--
ALTER TABLE `table_account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_classes`
--
ALTER TABLE `table_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_data_configs`
--
ALTER TABLE `table_data_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_expenses`
--
ALTER TABLE `table_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_incomes`
--
ALTER TABLE `table_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_journals`
--
ALTER TABLE `table_journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_journal_entries`
--
ALTER TABLE `table_journal_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_pay_aps`
--
ALTER TABLE `table_pay_aps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_pay_ap_details`
--
ALTER TABLE `table_pay_ap_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_pay_ars`
--
ALTER TABLE `table_pay_ars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_pay_ar_details`
--
ALTER TABLE `table_pay_ar_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_taxes`
--
ALTER TABLE `table_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_type_of_pays`
--
ALTER TABLE `table_type_of_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcusfiles`
--
ALTER TABLE `tbcusfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcusitemprices`
--
ALTER TABLE `tbcusitemprices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcustomers`
--
ALTER TABLE `tbcustomers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcustrashes`
--
ALTER TABLE `tbcustrashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcusttypes`
--
ALTER TABLE `tbcusttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbpricesets`
--
ALTER TABLE `tbpricesets`
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
-- AUTO_INCREMENT for table `atb_absents`
--
ALTER TABLE `atb_absents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atb_absenttypes`
--
ALTER TABLE `atb_absenttypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `atb_brands`
--
ALTER TABLE `atb_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `atb_depts`
--
ALTER TABLE `atb_depts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `atb_documents`
--
ALTER TABLE `atb_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `atb_functions`
--
ALTER TABLE `atb_functions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `atb_salaries`
--
ALTER TABLE `atb_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `atb_staffattendances`
--
ALTER TABLE `atb_staffattendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atb_staffdocs`
--
ALTER TABLE `atb_staffdocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `atb_stafffunctions`
--
ALTER TABLE `atb_stafffunctions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `atb_staffs`
--
ALTER TABLE `atb_staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `atb_staffstatuses`
--
ALTER TABLE `atb_staffstatuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `atb_stafftimeworks`
--
ALTER TABLE `atb_stafftimeworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atb_stafftypes`
--
ALTER TABLE `atb_stafftypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `atb_statuses`
--
ALTER TABLE `atb_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `atb_timeworks`
--
ALTER TABLE `atb_timeworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier_items`
--
ALTER TABLE `supplier_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_account_charts`
--
ALTER TABLE `table_account_charts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `table_account_groups`
--
ALTER TABLE `table_account_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `table_account_payables`
--
ALTER TABLE `table_account_payables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_account_receiveables`
--
ALTER TABLE `table_account_receiveables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_account_types`
--
ALTER TABLE `table_account_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `table_classes`
--
ALTER TABLE `table_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `table_data_configs`
--
ALTER TABLE `table_data_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_expenses`
--
ALTER TABLE `table_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_incomes`
--
ALTER TABLE `table_incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `table_journals`
--
ALTER TABLE `table_journals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `table_journal_entries`
--
ALTER TABLE `table_journal_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_pay_aps`
--
ALTER TABLE `table_pay_aps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_pay_ap_details`
--
ALTER TABLE `table_pay_ap_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_pay_ars`
--
ALTER TABLE `table_pay_ars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_pay_ar_details`
--
ALTER TABLE `table_pay_ar_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_taxes`
--
ALTER TABLE `table_taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `table_type_of_pays`
--
ALTER TABLE `table_type_of_pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbcusfiles`
--
ALTER TABLE `tbcusfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbcusitemprices`
--
ALTER TABLE `tbcusitemprices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbcustomers`
--
ALTER TABLE `tbcustomers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbcustrashes`
--
ALTER TABLE `tbcustrashes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbcusttypes`
--
ALTER TABLE `tbcusttypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbpricesets`
--
ALTER TABLE `tbpricesets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
