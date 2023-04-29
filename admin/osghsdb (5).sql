-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 12:49 PM
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
-- Database: `osghsdb`
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
(3, 'yab', 'store', 123456789, 'store@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00 00:00:00', 3),
(4, 'Abenezer Lulseged', 'st', 913491283, 'abenrahel@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 3),
(5, 'Abenezer Lulseged Wube', 'is', 7070707, 'amikingo201@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 2),
(6, 'yabu', 'ismeabena', 913491283, 'abenrahel@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 3),
(7, 'amiro', 'itsmeabena', 7070707, 'abenrahel@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-28 21:00:00', 3),
(8, 'abcd efg', 'fu', 1234567890, 'asdccd@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-29 09:36:50', 3);

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
(3, 'Store Keeper');

-- --------------------------------------------------------

--
-- Table structure for table `tblattendance`
--

CREATE TABLE `tblattendance` (
  `Id` int(10) NOT NULL,
  `admissionNo` varchar(255) NOT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmId` varchar(10) NOT NULL,
  `sessionTermId` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dateTimeTaken` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblattendance`
--

INSERT INTO `tblattendance` (`Id`, `admissionNo`, `classId`, `classArmId`, `sessionTermId`, `status`, `dateTimeTaken`) VALUES
(162, 'ASDFLKJ', '1', '2', '1', '1', '2020-11-01'),
(163, 'HSKSDD', '1', '2', '1', '1', '2020-11-01'),
(164, 'JSLDKJ', '1', '2', '1', '1', '2020-11-01'),
(172, 'HSKDS9EE', '1', '4', '1', '1', '2020-11-01'),
(171, 'JKADA', '1', '4', '1', '0', '2020-11-01'),
(170, 'JSFSKDJ', '1', '4', '1', '1', '2020-11-01'),
(173, 'ASDFLKJ', '1', '2', '1', '1', '2020-11-19'),
(174, 'HSKSDD', '1', '2', '1', '1', '2020-11-19'),
(175, 'JSLDKJ', '1', '2', '1', '1', '2020-11-19'),
(176, 'JSFSKDJ', '1', '4', '1', '0', '2021-07-15'),
(177, 'JKADA', '1', '4', '1', '0', '2021-07-15'),
(178, 'HSKDS9EE', '1', '4', '1', '0', '2021-07-15'),
(179, 'ASDFLKJ', '1', '2', '1', '0', '2021-09-27'),
(180, 'HSKSDD', '1', '2', '1', '1', '2021-09-27'),
(181, 'JSLDKJ', '1', '2', '1', '1', '2021-09-27'),
(182, 'ASDFLKJ', '1', '2', '1', '0', '2021-10-06'),
(183, 'HSKSDD', '1', '2', '1', '0', '2021-10-06'),
(184, 'JSLDKJ', '1', '2', '1', '1', '2021-10-06'),
(185, 'ASDFLKJ', '1', '2', '1', '0', '2021-10-07'),
(186, 'HSKSDD', '1', '2', '1', '0', '2021-10-07'),
(187, 'JSLDKJ', '1', '2', '1', '0', '2021-10-07'),
(188, 'AMS110', '4', '6', '1', '1', '2021-10-07'),
(189, 'AMS133', '4', '6', '1', '1', '2021-10-07'),
(190, 'AMS135', '4', '6', '1', '1', '2021-10-07'),
(191, 'AMS144', '4', '6', '1', '1', '2021-10-07'),
(192, 'AMS148', '4', '6', '1', '1', '2021-10-07'),
(193, 'AMS151', '4', '6', '1', '1', '2021-10-07'),
(194, 'AMS159', '4', '6', '1', '0', '2021-10-07'),
(195, 'AMS161', '4', '6', '1', '0', '2021-10-07'),
(196, 'AMS110', '4', '6', '1', '1', '2023-04-13'),
(197, 'AMS133', '4', '6', '1', '1', '2023-04-13'),
(198, 'AMS135', '4', '6', '1', '1', '2023-04-13'),
(199, 'AMS144', '4', '6', '1', '1', '2023-04-13'),
(200, 'AMS148', '4', '6', '1', '1', '2023-04-13'),
(201, 'AMS151', '4', '6', '1', '1', '2023-04-13'),
(202, 'AMS159', '4', '6', '1', '0', '2023-04-13'),
(203, 'AMS161', '4', '6', '1', '0', '2023-04-13'),
(204, 'AMS019', '3', '5', '3', '0', '2023-04-13'),
(205, 'AMS021', '3', '5', '3', '1', '2023-04-13'),
(206, 'AMS110', '4', '6', '3', '1', '2023-04-14'),
(207, 'AMS133', '4', '6', '3', '1', '2023-04-14'),
(208, 'AMS135', '4', '6', '3', '1', '2023-04-14'),
(209, 'AMS144', '4', '6', '3', '1', '2023-04-14'),
(210, 'AMS148', '4', '6', '3', '0', '2023-04-14'),
(211, 'AMS151', '4', '6', '3', '0', '2023-04-14'),
(212, 'AMS159', '4', '6', '3', '0', '2023-04-14'),
(213, 'AMS161', '4', '6', '3', '0', '2023-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `Id` int(10) NOT NULL,
  `className` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`Id`, `className`) VALUES
(1, 'Seven'),
(3, 'Eight'),
(4, 'Nine');

-- --------------------------------------------------------

--
-- Table structure for table `tblclassarms`
--

CREATE TABLE `tblclassarms` (
  `Id` int(10) NOT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmName` varchar(255) NOT NULL,
  `isAssigned` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclassarms`
--

INSERT INTO `tblclassarms` (`Id`, `classId`, `classArmName`, `isAssigned`) VALUES
(2, '1', 'S1', '1'),
(4, '1', 'S2', '1'),
(5, '3', 'E1', '1'),
(6, '3', 'N1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblclassteacher`
--

CREATE TABLE `tblclassteacher` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(50) NOT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmId` varchar(10) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclassteacher`
--

INSERT INTO `tblclassteacher` (`Id`, `firstName`, `lastName`, `emailAddress`, `password`, `phoneNo`, `classId`, `classArmId`, `dateCreated`) VALUES
(1, 'Willabc', 'Williams', 'teacher@mail.com', '32250170a0dca92d53ec9624f336ca24', '09089898999', '3', '6', '2020-10-31'),
(4, 'Demola', 'Ade', 'Kumolu@gmail.com', '32250170a0dca92d53ec9624f336ca24', '09672002882', '1', '4', '2020-11-01'),
(5, 'Ryan', 'McQuie', 'ryan@mail.com', '32250170a0dca92d53ec9624f336ca24', '7014560000', '3', '5', '2021-10-07'),
(6, 'John', 'Greenwood', 'jwood@mail.com', '32250170a0dca92d53ec9624f336ca24', '0100000030', '4', '6', '2021-10-07');

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
  `UniformAssigned` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblguard`
--

INSERT INTO `tblguard` (`ID`, `Profilepic`, `Name`, `MobileNumber`, `Address`, `IDtype`, `IDnumber`, `RegistrationDate`, `isAssigned`, `UniformAssigned`) VALUES
(2, 'ad04ad2d96ae326a9ca9de47d9e2fc741666330795.jpg', 'Rakesh Chandra', 4554646545, 'J&K block Laxmi nagar', 'Adhar Card', '6464kjkjk', '2022-10-21 05:39:55', 1, 1),
(3, 'b64810fde7027715e614449aff1d595f1666676176.png', 'Harish Rawat', 1324546578, 'H-900, Vbghjg,\r\njhuiy,\r\nkjoujio', 'Voter Card', '689gj8h789', '2022-10-21 06:34:23', 1, 1),
(4, 'ad04ad2d96ae326a9ca9de47d9e2fc741666334112.jpg', 'Kunal Singh', 6446464654, 'oiuoumnkjh\r\nkoiujio\r\nkoijiouo', 'Adhar Card', '9798ioui', '2022-10-21 06:35:12', 1, 0),
(5, 'ecebbecf28c2692aeb021597fbddb1741666334145.jpg', 'John', 9798787987, 'yuiyuiyuiyuiyiuyu\r\njhjjkjhkhhkjljljlklkl;k;l\'\r\nljiuiouoiuio', 'Adhar Card', 'hkhkjh799898', '2022-10-21 06:35:45', 0, 0),
(6, 'ecebbecf28c2692aeb021597fbddb1741666334189.jpg', 'Karuna Devi', 8979979879, 'tuytuytuytuytuytuytu\r\nyiutufukhk', 'Voter Card', 'khjhkjhkjhkj1235', '2022-10-21 06:36:29', 0, 0),
(7, 'ad04ad2d96ae326a9ca9de47d9e2fc741666334224.jpg', 'Meena Sahani', 4564646464, 'jkhkhkhkhkjhkjhkjhkyhiu\r\nopiouiioyiuyuiy\r\noiuoiuoiuoiu', 'Adhar Card', 'jkljljkljl1213456', '2022-10-21 06:37:04', 0, 0),
(8, 'ecebbecf28c2692aeb021597fbddb1741666334284.jpg', 'Meera Rajput', 8789797979, 'juoiyyiyiuyiuyifdiuv ntiyrh\r\nuifyciruc\r\njiuiouoiuo', 'Voter Card', 'opipiip1213', '2022-10-21 06:38:04', 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblhiring`
--

INSERT INTO `tblhiring` (`ID`, `BookingNumber`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Address`, `RequirementNumber`, `Shift`, `Gender`, `Dateofbooking`, `Status`, `Remark`, `GuardAssign`, `UpdationDate`) VALUES
(1, '790106442', 'Gunjan', 'Singh', 'gun@gmail.com', 9879879797, 'gjhghjdgyegtyutrrvy', 10, '24hrs', 'Male', '2022-10-25 07:15:34', 'Accepted', 'Accepted', 'Rakesh Chandra,Harish Rawat,Kunal Singh', '2022-10-27 12:11:43'),
(2, '733896436', 'Jhanvi', 'Sharma', 'janvi', 7897987987, 'yututyec76547w\r\ntyrc4ytw34', 25, 'Day', 'Female', '2022-10-25 07:24:50', 'Rejected', 'Rejected', 'dfh', '2022-10-27 12:25:08'),
(3, '796114163', 'Komal', 'Singh', 'komal@gmail.com', 7979879879, 'hjkhjkhdjkfhjkerhget', 10, '24hrs', 'Female', '2022-10-27 12:34:15', 'Accepted', 'ouhu9uyiuouhnonojn', ',Rakesh Chandra,Harish Rawat', '2023-03-20 12:41:02'),
(4, '310626930', 'Anuj', 'Kumar', 'ak@gmail.com', 1234567890, 'A 234 XYZ Street Mayur ViharDelhi 110092', 2, 'Day', 'Male', '2022-10-27 15:27:50', 'Rejected', 'Request Rejected', '', '2022-10-27 16:44:13'),
(5, '545716697', 'Rahul', 'Singh', 'rhulk@gmail.com', 1425362514, 'H 911 ABC Apartment Rajnagar Extension Ghaziabad', 2, 'Day', 'Male', '2022-10-27 16:50:43', 'Accepted', 'Request Approved', 'Rakesh Chandra,Harish Rawat', '2022-10-27 16:51:26'),
(6, '552641280', 'Sanjeev', 'Kumar', 'snjv@gmail.com', 1425363625, 'P 123 XYZ Apartment Indrapuram GZB', 1, 'Day', 'Male', '2022-10-27 16:59:40', 'Accepted', 'Request Accepted', 'Rakesh Chandra', '2022-10-27 17:00:15'),
(7, '948685954', 'amin', 'sssk', 'kinddd@gmail.com', 5678909876, 'addis ababa', 5, '24hrs', 'Female', '2023-03-20 13:23:26', 'Accepted', '...', 'Kunal Singh,John', '2023-04-01 13:06:03'),
(8, '730641991', 'ami', 'smask', 'liam@gmail.com', 911121314, 'addis a', 5, '24hrs', 'Male', '2023-03-21 17:18:49', 'Accepted', 'ok', 'Kunal Singh,John,Karuna Devi,Meena Sahani,Meera Rajput', '2023-03-21 17:20:54'),
(9, '253846675', 'aminscasdf', 'asssd', 'kinddd@gmail.com', 123456789, 'alkfhkwoghkaorfk', 5, 'Night', 'Both', '2023-04-01 13:29:12', 'Rejected', 'no', 'Rakesh Chandra', '2023-04-04 16:35:29'),
(10, '392190967', 'ami', 'aaa', 'jwood@mail.com', 123456789, 'kdasdfhquidfhasdi', 3, '123', 'Both', '2023-04-19 06:00:30', 'Accepted', 'ok', ',Rakesh Chandra,Harish Rawat', '2023-04-19 06:01:33'),
(11, '725940116', 'ami', 'aaa', 'jwood@mail.com', 12345678, 'asdfghjkl', 2, NULL, 'Both', '2023-04-20 10:33:34', 'Accepted', 'xc', 'Kunal Singh', '2023-04-20 10:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblsessionterm`
--

CREATE TABLE `tblsessionterm` (
  `Id` int(10) NOT NULL,
  `sessionName` varchar(50) NOT NULL,
  `termId` varchar(50) NOT NULL,
  `isActive` varchar(10) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsessionterm`
--

INSERT INTO `tblsessionterm` (`Id`, `sessionName`, `termId`, `isActive`, `dateCreated`) VALUES
(1, '2019/2020', '1', '0', '2020-10-31'),
(3, '2019/2020', '2', '0', '2020-10-31'),
(4, '2023', '3', '1', '2023-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) NOT NULL,
  `admissionNumber` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmId` varchar(10) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`Id`, `firstName`, `lastName`, `otherName`, `admissionNumber`, `password`, `classId`, `classArmId`, `dateCreated`) VALUES
(1, 'Thomas', 'Griswold', 'none', 'AMS005', '12345', '1', '2', '2020-10-31'),
(3, 'Samuel', 'Rosella', 'none', 'AMS007', '12345', '1', '2', '2020-10-31'),
(4, 'Milagros', 'Lawson', 'none', 'AMS011', '12345', '1', '2', '2020-10-31'),
(6, 'Sandra', 'Salgado', 'none', 'AMS015', '12345', '1', '4', '2020-10-31'),
(7, 'Smith', 'Mack', 'Mack', 'AMS017', '12345', '1', '4', '2020-10-31'),
(8, 'Juliana', 'Debiie', 'none', 'AMS019', '12345', '3', '5', '2020-10-31'),
(9, 'Richard', 'Grimmer', 'none', 'AMS021', '12345', '3', '5', '2020-10-31'),
(10, 'Jon', 'Boller', 'none', 'AMS110', '12345', '4', '6', '2021-10-07'),
(11, 'Aida', 'Hawley', 'none', 'AMS133', '12345', '4', '6', '2021-10-07'),
(12, 'Miguel', 'Bush', 'none', 'AMS135', '12345', '4', '6', '2021-10-07'),
(13, 'Sergio', 'Hammons', 'none', 'AMS144', '12345', '4', '6', '2021-10-07'),
(14, 'Lyn', 'Rogers', 'none', 'AMS148', '12345', '4', '6', '2021-10-07'),
(15, 'James', 'Dominick', 'none', 'AMS151', '12345', '4', '6', '2021-10-07'),
(16, 'Ethel', 'Quin', 'none', 'AMS159', '12345', '4', '6', '2021-10-07'),
(17, 'Roland', 'Estrada', 'none', 'AMS161', '12345', '4', '6', '2021-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `tblterm`
--

CREATE TABLE `tblterm` (
  `Id` int(10) NOT NULL,
  `termName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblterm`
--

INSERT INTO `tblterm` (`Id`, `termName`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third');

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
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `email`, `companyName`, `file`, `password`, `cpassword`, `status`) VALUES
(0, 'Abena', ' Lulseged', 'abenrahel@gmail.com', 'abbar', 'test_result.txt', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 1);

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
-- Indexes for table `tblattendance`
--
ALTER TABLE `tblattendance`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblclassarms`
--
ALTER TABLE `tblclassarms`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblclassteacher`
--
ALTER TABLE `tblclassteacher`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `tblsessionterm`
--
ALTER TABLE `tblsessionterm`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblterm`
--
ALTER TABLE `tblterm`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbladmintype`
--
ALTER TABLE `tbladmintype`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblattendance`
--
ALTER TABLE `tblattendance`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblclassarms`
--
ALTER TABLE `tblclassarms`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblclassteacher`
--
ALTER TABLE `tblclassteacher`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblguard`
--
ALTER TABLE `tblguard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblhiring`
--
ALTER TABLE `tblhiring`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblsessionterm`
--
ALTER TABLE `tblsessionterm`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblterm`
--
ALTER TABLE `tblterm`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
