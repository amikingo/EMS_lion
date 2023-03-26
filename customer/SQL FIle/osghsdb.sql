-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 05:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osghsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-10-27 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblguard`
--

CREATE TABLE `tblguard` (
  `ID` int(11) NOT NULL,
  `Profilepic` varchar(250) DEFAULT NULL,
  `Name` mediumtext DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `IDtype` varchar(100) DEFAULT NULL,
  `IDnumber` varchar(250) DEFAULT NULL,
  `RegistrationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguard`
--

INSERT INTO `tblguard` (`ID`, `Profilepic`, `Name`, `MobileNumber`, `Address`, `IDtype`, `IDnumber`, `RegistrationDate`) VALUES
(2, 'ad04ad2d96ae326a9ca9de47d9e2fc741666330795.jpg', 'Rakesh Chandra', 4554646545, 'J&K block Laxmi nagar', 'Adhar Card', '6464kjkjk', '2022-10-21 05:39:55'),
(3, 'b64810fde7027715e614449aff1d595f1666676176.png', 'Harish Rawat', 1324546578, 'H-900, Vbghjg,\r\njhuiy,\r\nkjoujio', 'Voter Card', '689gj8h789', '2022-10-21 06:34:23'),
(4, 'ad04ad2d96ae326a9ca9de47d9e2fc741666334112.jpg', 'Kunal Singh', 6446464654, 'oiuoumnkjh\r\nkoiujio\r\nkoijiouo', 'Adhar Card', '9798ioui', '2022-10-21 06:35:12'),
(5, 'ecebbecf28c2692aeb021597fbddb1741666334145.jpg', 'John', 9798787987, 'yuiyuiyuiyuiyiuyu\r\njhjjkjhkhhkjljljlklkl;k;l\'\r\nljiuiouoiuio', 'Adhar Card', 'hkhkjh799898', '2022-10-21 06:35:45'),
(6, 'ecebbecf28c2692aeb021597fbddb1741666334189.jpg', 'Karuna Devi', 8979979879, 'tuytuytuytuytuytuytu\r\nyiutufukhk', 'Voter Card', 'khjhkjhkjhkj1235', '2022-10-21 06:36:29'),
(7, 'ad04ad2d96ae326a9ca9de47d9e2fc741666334224.jpg', 'Meena Sahani', 4564646464, 'jkhkhkhkhkjhkjhkjhkyhiu\r\nopiouiioyiuyuiy\r\noiuoiuoiuoiu', 'Adhar Card', 'jkljljkljl1213456', '2022-10-21 06:37:04'),
(8, 'ecebbecf28c2692aeb021597fbddb1741666334284.jpg', 'Meera Rajput', 8789797979, 'juoiyyiyiuyiuyifdiuv ntiyrh\r\nuifyciruc\r\njiuiouoiuo', 'Voter Card', 'opipiip1213', '2022-10-21 06:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblhiring`
--

CREATE TABLE `tblhiring` (
  `ID` int(10) NOT NULL,
  `BookingNumber` varchar(250) DEFAULT NULL,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `RequirementNumber` int(11) DEFAULT NULL,
  `Shift` varchar(100) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Dateofbooking` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `GuardAssign` mediumtext DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhiring`
--

INSERT INTO `tblhiring` (`ID`, `BookingNumber`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Address`, `RequirementNumber`, `Shift`, `Gender`, `Dateofbooking`, `Status`, `Remark`, `GuardAssign`, `UpdationDate`) VALUES
(1, '790106442', 'Gunjan', 'Singh', 'gun@gmail.com', 9879879797, 'gjhghjdgyegtyutrrvy', 10, '24hrs', 'Male', '2022-10-25 07:15:34', 'Accepted', 'Accepted', 'Rakesh Chandra,Harish Rawat,Kunal Singh', '2022-10-27 12:11:43'),
(2, '733896436', 'Jhanvi', 'Sharma', 'janvi', 7897987987, 'yututyec76547w\r\ntyrc4ytw34', 25, 'Day', 'Female', '2022-10-25 07:24:50', 'Rejected', 'Rejected', 'dfh', '2022-10-27 12:25:08'),
(3, '796114163', 'Komal', 'Singh', 'komal@gmail.com', 7979879879, 'hjkhjkhdjkfhjkerhget', 10, '24hrs', 'Female', '2022-10-27 12:34:15', NULL, NULL, NULL, NULL),
(4, '310626930', 'Anuj', 'Kumar', 'ak@gmail.com', 1234567890, 'A 234 XYZ Street Mayur ViharDelhi 110092', 2, 'Day', 'Male', '2022-10-27 15:27:50', 'Rejected', 'Request Rejected', '', '2022-10-27 16:44:13'),
(5, '545716697', 'Rahul', 'Singh', 'rhulk@gmail.com', 1425362514, 'H 911 ABC Apartment Rajnagar Extension Ghaziabad', 2, 'Day', 'Male', '2022-10-27 16:50:43', 'Accepted', 'Request Approved', 'Rakesh Chandra,Harish Rawat', '2022-10-27 16:51:26'),
(6, '552641280', 'Sanjeev', 'Kumar', 'snjv@gmail.com', 1425363625, 'P 123 XYZ Apartment Indrapuram GZB', 1, 'Day', 'Male', '2022-10-27 16:59:40', 'Accepted', 'Request Accepted', 'Rakesh Chandra', '2022-10-27 17:00:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblguard`
--
ALTER TABLE `tblguard`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Name` (`Name`(3072));

--
-- Indexes for table `tblhiring`
--
ALTER TABLE `tblhiring`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblguard`
--
ALTER TABLE `tblguard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblhiring`
--
ALTER TABLE `tblhiring`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
