-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2019 at 03:18 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajvithi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bag_type`
--

CREATE TABLE `bag_type` (
  `id` int(11) NOT NULL,
  `bag_type_code` varchar(100) NOT NULL,
  `branch_name` varchar(300) NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` text NOT NULL,
  `cancel_date` text NOT NULL,
  `bag_type_hname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bag_type`
--

INSERT INTO `bag_type` (`id`, `bag_type_code`, `branch_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`, `bag_type_hname`) VALUES
(1, '1', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 05:09:59', 'นายเอ  สกุลโอเค', '', '', 'CPD-A1 Single 350'),
(20, '2', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 07:18:26', 'นายเอ  สกุลโอเค', '', '', 'CPD-A1 Single 450'),
(21, '3', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 07:18:59', 'นายเอ  สกุลโอเค', '', '', 'CPD-A1 Double 350'),
(23, '4', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 09:48:32', 'นายเอ  สกุลโอเค', '09-02-2019 09:17:36', '', 'CPD-A1 Double 450');

-- --------------------------------------------------------

--
-- Table structure for table `blood_gr`
--

CREATE TABLE `blood_gr` (
  `id` int(11) NOT NULL,
  `blood_gr_code` varchar(100) NOT NULL,
  `branch_name` varchar(300) NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` text NOT NULL,
  `cancel_date` text NOT NULL,
  `blood_gr_hname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_gr`
--

INSERT INTO `blood_gr` (`id`, `blood_gr_code`, `branch_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`, `blood_gr_hname`) VALUES
(25, '10', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:08:05', 'นายเอ  สกุลโอเค', '', '', 'A'),
(26, '11', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:23:21', 'นายเอ  สกุลโอเค', '', '', 'A2'),
(27, '12', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:23:28', 'นายเอ  สกุลโอเค', '', '', 'A3'),
(28, '13', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:23:36', 'นายเอ  สกุลโอเค', '', '', 'A2B'),
(29, '14', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:23:44', 'นายเอ  สกุลโอเค', '', '', 'A3B'),
(30, '15', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:24:25', 'นายเอ  สกุลโอเค', '', '', 'Ah'),
(31, '16', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:24:40', 'นายเอ  สกุลโอเค', '', '', 'A1'),
(32, '17', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 10:24:58', 'นายเอ  สกุลโอเค', '', '', 'A1B'),
(38, '18', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-13 15:03:40', 'นายเอ  สกุลโอเค', '', '', 'A1B3');

-- --------------------------------------------------------

--
-- Table structure for table `blood_rh`
--

CREATE TABLE `blood_rh` (
  `id` int(11) NOT NULL,
  `blood_rh_code` varchar(100) NOT NULL,
  `branch_name` varchar(300) NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` text NOT NULL,
  `cancel_date` text NOT NULL,
  `blood_rh_hname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_rh`
--

INSERT INTO `blood_rh` (`id`, `blood_rh_code`, `branch_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`, `blood_rh_hname`) VALUES
(37, '2', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 11:19:59', 'นายเอ  สกุลโอเค', '', '', 'Negative'),
(38, '3', '', 'นายเอ  สกุลโอเค', '2019-02-09 11:20:26', '', '23-04-2019 09:44:46', '', 'Weak D');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type`
--

CREATE TABLE `blood_type` (
  `id` int(11) NOT NULL,
  `blood_type_code` varchar(100) NOT NULL,
  `blood_type_name` varchar(300) NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` text NOT NULL,
  `cancel_date` text NOT NULL,
  `blood_type_hname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_type`
--

INSERT INTO `blood_type` (`id`, `blood_type_code`, `blood_type_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`, `blood_type_hname`) VALUES
(1, 'B38', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 05:09:59', 'นายเอ  สกุลโอเค', '', '', 'Aged Plasma/cryo-removed plasma'),
(12, 'B05', '[CRYO]', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:02:59', 'นายเอ  สกุลโอเค', '', '', 'Cryoprecipitate'),
(13, 'B06', '[CRP]', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:04:42', 'นายเอ  สกุลโอเค', '', '', 'Cryoprecipitate Removed Plasma'),
(14, 'B37', '[HTFDC]', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:06:13', 'นายเอ  สกุลโอเค', '', '', 'Freeze dried Cryoprecipitate'),
(15, 'B24', '[FFP]', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:07:14', 'นายเอ  สกุลโอเค', '', '', 'Fresh Frozen Plasma'),
(16, 'B35', '[LDSDR]', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:10:43', 'นายเอ  สกุลโอเค', '', '', 'Leukocyte-Depleted Single Donor Red Cell');

-- --------------------------------------------------------

--
-- Table structure for table `branch_info`
--

CREATE TABLE `branch_info` (
  `id` int(11) NOT NULL,
  `branch_code` varchar(100) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` text NOT NULL,
  `cancel_date` text NOT NULL,
  `branch_hname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch_info`
--

INSERT INTO `branch_info` (`id`, `branch_code`, `branch_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`, `branch_hname`) VALUES
(1, '100', 'สภากาชาดไทย', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 05:09:59', 'นายเอ  สกุลโอเค', '09-02-2019 12:24:22', '', 'สภากาชาดไทย'),
(5, '102', 'โรงพยาบาลระยอง', 'นายเอ  สกุลโอเค', '2019-02-08 05:09:59', 'นายเอ  สกุลโอเค', '09-02-2019 01:24:38', '', 'โรงพยาบาลระยอง'),
(6, '103', 'เหล่ากาชาด/รพ.จันทบุรี', 'นายเอ  สกุลโอเค', '2019-02-08 17:10:36', 'นายเอ  สกุลโอเค', '09-02-2019 01:25:39', '', 'เหล่ากาชาด/รพ.จันทบุรี'),
(7, '104', 'สภากาชาดไทย88', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 17:13:17', 'นายเอ  สกุลโอเค', '09-02-2019 11:41:06', '', 'เหล่ากาชาด/รพ.สป'),
(8, '105', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 18:29:11', 'นายเอ  สกุลโอเค', '10-02-2019 11:07:41', '', 'เหล่ากาชาด/รพ.ฉะเชิงเทรา'),
(11, '106', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 18:51:53', 'นายเอ  สกุลโอเค', '10-02-2019 11:07:35', '10-02-2019 11:07:35', 'ภาคบริการโลหิตแห่งชาติ ที่10 จ.เชียงใหม่');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `short_desc` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`cat_id`, `category_name`, `short_desc`, `image`, `created_date`, `updated_date`) VALUES
(1, 'PackA', 'gggggddddd', '20190112104823.jpg', '2017-06-06 14:54:47', '2017-06-06 14:54:47'),
(15, 'PackB', 'short_desc', '20190112104833.jpg', '2019-01-12 00:45:24', '2019-01-12 00:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `rec_date`) VALUES
(1, 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 18:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `donat_mobile_unit`
--

CREATE TABLE `donat_mobile_unit` (
  `id` int(11) NOT NULL,
  `dmu_code` varchar(100) NOT NULL,
  `dmu_name` text NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cancel_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donat_mobile_unit`
--

INSERT INTO `donat_mobile_unit` (`id`, `dmu_code`, `dmu_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`) VALUES
(41, '', 'WWW', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-05-24 01:08:19', 'นายเอ  สกุลโอเค', '2019-05-23 19:22:52', ''),
(42, '', 'XXC', 'นายเอ  สกุลโอเค', '2019-05-24 01:09:35', 'นายเอ  สกุลโอเค', '2019-05-23 19:23:03', ''),
(43, '', 'QQQ', 'นายเอ  สกุลโอเค', '2019-05-24 02:38:56', '', '2019-05-23 19:38:56', ''),
(44, '', 'CCCC', 'นายเอ  สกุลโอเค', '2019-05-24 13:42:17', '', '2019-05-24 06:42:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `donat_rec`
--

CREATE TABLE `donat_rec` (
  `id` int(11) NOT NULL,
  `dn_typeone` text NOT NULL,
  `dn_cmnd` text NOT NULL,
  `dn_place` text NOT NULL,
  `dn_placeadd` text NOT NULL,
  `dn_mobile_unit` text NOT NULL,
  `dn_mobile_dept` text NOT NULL,
  `dn_mobile_stff` text NOT NULL,
  `idcardno` text NOT NULL,
  `dn_bofd` text NOT NULL,
  `dn_age` text NOT NULL,
  `dn_career` text NOT NULL,
  `dn_tel` text NOT NULL,
  `dn_mobile` text NOT NULL,
  `dn_gender` text NOT NULL,
  `dn_name` text NOT NULL,
  `dn_srname` text NOT NULL,
  `dn_addr` text NOT NULL,
  `dn_moo` text NOT NULL,
  `dn_soi` text NOT NULL,
  `dn_street` text NOT NULL,
  `dn_country` text NOT NULL,
  `zip_code` text NOT NULL,
  `type_ofdn` text NOT NULL,
  `dn_hn` text NOT NULL,
  `dn_an` text NOT NULL,
  `dn_diagnosis` text NOT NULL,
  `blood_use_date` text NOT NULL,
  `ward` text NOT NULL,
  `bag_no` text NOT NULL,
  `bag_type` text NOT NULL,
  `blood_expire` text NOT NULL,
  `dn_date` text NOT NULL,
  `dn_date_last` text NOT NULL,
  `blood_use_datetw` text NOT NULL,
  `dn_of_no` text NOT NULL,
  `blood_type` text NOT NULL,
  `rh` text NOT NULL,
  `hemoglobin` text NOT NULL,
  `pre_bp` text NOT NULL,
  `post_bp` text NOT NULL,
  `pulse` text NOT NULL,
  `bld_driller` text NOT NULL,
  `dn_weight` text NOT NULL,
  `dn_height` text NOT NULL,
  `pulse_status` text NOT NULL,
  `physic_exam` text NOT NULL,
  `lungs_heart_st` text NOT NULL,
  `donat_status` text NOT NULL,
  `physic_exam_rest` text NOT NULL,
  `physic_ex_select` text NOT NULL,
  `bg_pre_staff` text NOT NULL,
  `sign_stff` text NOT NULL,
  `dn_no` text NOT NULL,
  `dn_place_norm` text NOT NULL,
  `dn_place_ontime` text NOT NULL,
  `dn_prefixname` text NOT NULL,
  `pre_bp_one` text NOT NULL,
  `post_bp_one` text NOT NULL,
  `drug` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `remark_code` varchar(100) NOT NULL,
  `branch_name` varchar(300) NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` text NOT NULL,
  `cancel_date` text NOT NULL,
  `remark_hname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `remark_code`, `branch_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`, `remark_hname`) VALUES
(27, '1', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 15:20:53', 'นายเอ  สกุลโอเค', '', '', 'Leak'),
(28, '2', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 15:21:53', 'นายเอ  สกุลโอเค', '', '', 'แดง,ขุ่น,เขียว,ทิ้ง'),
(29, '8', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 15:23:51', 'นายเอ  สกุลโอเค', '', '', 'DAT Positive'),
(30, '9', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 15:24:07', 'นายเอ  สกุลโอเค', '', '', 'Risk'),
(31, '10', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 15:24:39', 'นายเอ  สกุลโอเค', '', '', 'No Swirling');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `surname` text COLLATE utf8_unicode_ci NOT NULL,
  `position` text COLLATE utf8_unicode_ci NOT NULL,
  `department` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `name`, `status`, `active`, `surname`, `position`, `department`, `start_date`, `gender`) VALUES
(1, 'admin', 'admin', 'เอ', 'admin', 'Y', 'สกุลโอเค', 'นักเทคนิค', 'ธนาคารเลือด', '2019-02-08', 'นาย');

-- --------------------------------------------------------

--
-- Table structure for table `stockin_type`
--

CREATE TABLE `stockin_type` (
  `id` int(11) NOT NULL,
  `stockin_type_code` varchar(100) NOT NULL,
  `branch_name` varchar(300) NOT NULL,
  `rec_name` text NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_name` text NOT NULL,
  `edit_date` text NOT NULL,
  `cancel_date` text NOT NULL,
  `stockin_type_hname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stockin_type`
--

INSERT INTO `stockin_type` (`id`, `stockin_type_code`, `branch_name`, `rec_name`, `rec_date`, `edit_name`, `edit_date`, `cancel_date`, `stockin_type_hname`) VALUES
(1, '30', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-08 05:09:59', 'นายเอ  สกุลโอเค', '', '', 'รับจากการเบิกเลือดหายาก'),
(17, '40', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:46:53', 'นายเอ  สกุลโอเค', '', '', 'รับจากการเบิกเลือดสำหรับ Stock'),
(18, '80', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:47:18', 'นายเอ  สกุลโอเค', '', '', 'รับจากการเบิก Apheresis Product'),
(19, '90', '', 'เจ้าหน้าที่ระบบธนาคารเลือด', '2019-02-09 06:47:39', 'นายเอ  สกุลโอเค', '', '', 'รับจากการเบิก Rh Negative');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roll` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roll`, `created_date`, `updated_date`) VALUES
(1, 'admin', '123456', '', '2017-06-05 18:46:45', '2017-06-05 18:46:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bag_type`
--
ALTER TABLE `bag_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_gr`
--
ALTER TABLE `blood_gr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_rh`
--
ALTER TABLE `blood_rh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_type`
--
ALTER TABLE `blood_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_info`
--
ALTER TABLE `branch_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donat_mobile_unit`
--
ALTER TABLE `donat_mobile_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donat_rec`
--
ALTER TABLE `donat_rec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockin_type`
--
ALTER TABLE `stockin_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bag_type`
--
ALTER TABLE `bag_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `blood_gr`
--
ALTER TABLE `blood_gr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `blood_rh`
--
ALTER TABLE `blood_rh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `blood_type`
--
ALTER TABLE `blood_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `branch_info`
--
ALTER TABLE `branch_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `donat_mobile_unit`
--
ALTER TABLE `donat_mobile_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `donat_rec`
--
ALTER TABLE `donat_rec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stockin_type`
--
ALTER TABLE `stockin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
