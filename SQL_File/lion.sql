-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 09:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lion`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `adminTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `adminTypeId`) VALUES
(1, 'kingo', 'admin', 8979555558, 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2022-10-27 04:36:52', 1),
(2, 'abene', 'HR', 123456789, 'admin222@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-01 12:08:05', 2),
(3, 'yab', 'store', 123456789, 'store@gmail.com', '432f45b44c432414d2f97df0e5743818', '0000-00-00 00:00:00', 4),
(4, 'yabu', 'st', 913491283, 'aben@mail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 4),
(5, 'Abenezer Lulseged Wube', 'tr', 7070707, 'amikingo201@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 3),
(6, 'yabu', 'ismeabena', 913491283, 'abenrahel@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 3),
(7, 'amiro', 'itsmeabena', 7070707, 'abenrahel@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 3),
(9, 'amiro', 'hello', 913491283, 'abenrahel@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 10:03:57', 2),
(10, 'test1', 'test1', 9874561234, 'test@cc.cd', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 10:05:12', 2),
(11, 'big mouth l', 'big', 32, 'big@gv.cd', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 10:09:30', 2),
(12, 'amiro', 'hello', 913491283, 'abenrahel@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 10:27:45', 2),
(13, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:13:19', 3),
(14, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:13:41', 3),
(15, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:16:26', 3),
(16, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:16:34', 3),
(17, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:16:54', 3),
(18, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:17:37', 3),
(19, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:17:40', 3),
(20, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:17:44', 3),
(21, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:18:47', 3),
(22, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:19:03', 3),
(23, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:19:12', 3),
(24, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:19:57', 3),
(25, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:19:59', 3),
(26, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:20:01', 3),
(27, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 11:20:33', 3),
(28, '123', '123', 123, '123@jn.cf', '25f9e794323b453885f5181f1b624d0b', '2023-04-30 09:00:07', 3),
(29, 'amiro', 'amiro', 9874561234, 'hgh@gh.com', '25f9e794323b453885f5181f1b624d0b', '2023-05-04 19:42:05', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmintype`
--

CREATE TABLE `tbladmintype` (
  `Id` int(20) NOT NULL,
  `adminType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmintype`
--

INSERT INTO `tbladmintype` (`Id`, `adminType`) VALUES
(1, 'Administrator'),
(2, 'HR'),
(3, 'Store Keeper'),
(4, 'Trainer');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomerstatus`
--

CREATE TABLE `tblcustomerstatus` (
  `ID` int(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcustomerstatus`
--

INSERT INTO `tblcustomerstatus` (`ID`, `Status`) VALUES
(0, 'Rejected'),
(1, 'Approved'),
(2, 'Pending');

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
  `RegistrationDate` timestamp NULL DEFAULT current_timestamp(),
  `isAssigned` int(11) NOT NULL DEFAULT 0,
  `UniformAssigned` int(11) NOT NULL DEFAULT 0,
  `isTrainer` int(11) NOT NULL DEFAULT 1,
  `companyName` varchar(256) NOT NULL,
  `remark` longtext NOT NULL,
  `expir_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblguard`
--

INSERT INTO `tblguard` (`ID`, `Profilepic`, `Name`, `MobileNumber`, `Address`, `IDtype`, `IDnumber`, `RegistrationDate`, `isAssigned`, `UniformAssigned`, `isTrainer`, `companyName`, `remark`, `expir_date`) VALUES
(2, 'ad04ad2d96ae326a9ca9de47d9e2fc741666330795.jpg', 'Rakesh Chandra', 4554646545, 'J&K block Laxmi nagar', NULL, '6464kjkjk', '2022-10-21 05:39:55', 1, 1, 0, '', 'good', '2023-05-30'),
(3, 'b64810fde7027715e614449aff1d595f1666676176.png', 'Harish Rawat', 1324546578, 'H-900, Vbghjg,\r\njhuiy,\r\nkjoujio', NULL, '689gj8h789', '2022-10-21 06:34:23', 1, 1, 0, '', 'fuuuhuhuhuhuh', NULL),
(4, 'ad04ad2d96ae326a9ca9de47d9e2fc741666334112.jpg', 'Kunal Singh', 6446464654, 'oiuoumnkjh\r\nkoiujio\r\nkoijiouo', NULL, '9798ioui', '2022-10-21 06:35:12', 1, 1, 0, '', '', '2023-05-27'),
(5, 'ecebbecf28c2692aeb021597fbddb1741666334145.jpg', 'John', 9798787987, 'yuiyuiyuiyuiyiuyu\r\njhjjkjhkhhkjljljlklkl;k;l\'\r\nljiuiouoiuio', 'Adhar Card', 'hkhkjh799898', '2022-10-21 06:35:45', 1, 1, 0, '', '', NULL),
(6, 'ecebbecf28c2692aeb021597fbddb1741666334189.jpg', 'Karuna Devi', 8979979879, 'tuytuytuytuytuytuytu\r\nyiutufukhk', 'Voter Card', 'khjhkjhkjhkj1235', '2022-10-21 06:36:29', 1, 0, 0, 'Gerard', '', NULL),
(7, 'ad04ad2d96ae326a9ca9de47d9e2fc741666334224.jpg', 'Meena Sahani', 4564646464, 'jkhkhkhkhkjhkjhkjhkyhiu\r\nopiouiioyiuyuiy\r\noiuoiuoiuoiu', 'Adhar Card', 'jkljljkljl1213456', '2022-10-21 06:37:04', 1, 1, 0, 'Hilcoe', '', NULL),
(8, 'ecebbecf28c2692aeb021597fbddb1741666334284.jpg', 'Meera Rajput', 8789797979, 'juoiyyiyiuyiuyifdiuv ntiyrh\r\nuifyciruc\r\njiuiouoiuo', 'Voter Card', 'opipiip1213', '2022-10-21 06:38:04', 1, 1, 0, 'Hilcoe', '', NULL),
(13, '68052edd19db6043d8e04c8a51f32d5e1683232063.jpg', 'abene', 12122212, 'sxdvghnjkl', 'Kebele Card', '234567890', '2023-05-04 20:27:43', 1, 1, 1, 'Hilcoe', '', NULL);

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
  `companyName` varchar(256) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblhiring`
--

INSERT INTO `tblhiring` (`ID`, `BookingNumber`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Address`, `RequirementNumber`, `Shift`, `Gender`, `Dateofbooking`, `Status`, `Remark`, `GuardAssign`, `companyName`, `UpdationDate`) VALUES
(1, '790106442', 'Gunjan', 'Singh', 'gun@gmail.com', 9879879797, 'gjhghjdgyegtyutrrvy', 10, '24hrs', 'Male', '2022-10-25 07:15:34', 'Accepted', 'Accepted', 'Rakesh Chandra,Harish Rawat,Kunal Singh', '', '2022-10-27 12:11:43'),
(2, '733896436', 'Jhanvi', 'Sharma', 'janvi', 7897987987, 'yututyec76547w\r\ntyrc4ytw34', 25, 'Day', 'Female', '2022-10-25 07:24:50', 'Rejected', 'Rejected', 'dfh', '', '2022-10-27 12:25:08'),
(3, '796114163', 'Komal', 'Singh', 'komal@gmail.com', 7979879879, 'hjkhjkhdjkfhjkerhget', 10, '24hrs', 'Female', '2022-10-27 12:34:15', 'Accepted', 'ouhu9uyiuouhnonojn', ',Rakesh Chandra,Harish Rawat', '', '2023-03-20 12:41:02'),
(4, '310626930', 'Anuj', 'Kumar', 'ak@gmail.com', 1234567890, 'A 234 XYZ Street Mayur ViharDelhi 110092', 2, 'Day', 'Male', '2022-10-27 15:27:50', 'Rejected', 'Request Rejected', '', '', '2022-10-27 16:44:13'),
(5, '545716697', 'Rahul', 'Singh', 'rhulk@gmail.com', 1425362514, 'H 911 ABC Apartment Rajnagar Extension Ghaziabad', 2, 'Day', 'Male', '2022-10-27 16:50:43', 'Accepted', 'Request Approved', 'Rakesh Chandra,Harish Rawat', '', '2022-10-27 16:51:26'),
(6, '552641280', 'Sanjeev', 'Kumar', 'snjv@gmail.com', 1425363625, 'P 123 XYZ Apartment Indrapuram GZB', 1, 'Day', 'Male', '2022-10-27 16:59:40', 'Accepted', 'Request Accepted', 'Rakesh Chandra', '', '2022-10-27 17:00:15'),
(7, '948685954', 'amin', 'sssk', 'kinddd@gmail.com', 5678909876, 'addis ababa', 5, '24hrs', 'Female', '2023-03-20 13:23:26', 'Accepted', '...', 'Kunal Singh,John', '', '2023-04-01 13:06:03'),
(8, '730641991', 'ami', 'smask', 'liam@gmail.com', 911121314, 'addis a', 5, '24hrs', 'Male', '2023-03-21 17:18:49', 'Accepted', 'ok', 'Kunal Singh,John,Karuna Devi,Meena Sahani,Meera Rajput', '', '2023-03-21 17:20:54'),
(9, '253846675', 'aminscasdf', 'asssd', 'kinddd@gmail.com', 123456789, 'alkfhkwoghkaorfk', 5, 'Night', 'Both', '2023-04-01 13:29:12', 'Rejected', 'no', 'Rakesh Chandra', '', '2023-04-04 16:35:29'),
(10, '392190967', 'ami', 'aaa', 'jwood@mail.com', 123456789, 'kdasdfhquidfhasdi', 3, '123', 'Both', '2023-04-19 06:00:30', 'Accepted', 'ok', ',Rakesh Chandra,Harish Rawat', '', '2023-04-19 06:01:33'),
(11, '725940116', 'ami', 'aaa', 'jwood@mail.com', 12345678, 'asdfghjkl', 2, NULL, 'Both', '2023-04-20 10:33:34', NULL, 'xc', 'Kunal Singh', '', '2023-05-01 09:43:30'),
(12, '637825644', 'test', 'test2', 'test@gmail.com', 1234668745, 'hfkjdhffasdhfqjasckamksdf', 2, NULL, 'Both', '2023-05-06 15:15:42', 'Accepted', 'hello', 'Meena Sahani,Meera Rajput,abene', 'Hilcoe', '2023-05-06 15:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `file` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `AdminRegdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `email`, `companyName`, `file`, `password`, `cpassword`, `status`, `AdminRegdate`) VALUES
(1, 'Abena', 'Mussa', 'abenrahel@gmail.com', 'Hilcoe', 'cfile/ch-1 pdf.pdf', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 1, '2023-05-05 02:45:24'),
(12, 'mira', ' non', 'mia@gmail.com', 'yab', '.gitconfig', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 0, '2023-05-05 02:45:24'),
(13, 'rah', ' asa', 'hgh@gh.com', 'abbar', 'osghsdb (3).sql', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 2, '2023-05-05 02:45:24'),
(16, 'MIraj', ' Yezid', 'bbgbg@bgbgb.bgb', 'abcd', 'cfile/p.pdf', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 1, '2023-05-05 02:45:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmintype`
--
ALTER TABLE `tbladmintype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcustomerstatus`
--
ALTER TABLE `tblcustomerstatus`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbladmintype`
--
ALTER TABLE `tbladmintype`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblguard`
--
ALTER TABLE `tblguard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblhiring`
--
ALTER TABLE `tblhiring`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
