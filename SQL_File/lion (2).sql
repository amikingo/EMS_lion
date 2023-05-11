-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 01:39 AM
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
(4, 'kingo', 'admin', 123456789, 'kingo@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-05-11 08:50:28', 1),
(5, 'ami', 'hr', 12345678, 'ami@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-05-11 10:01:25', 2),
(32, 'abene', 'store', 123456789, 'abene@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-05-08 09:55:41', 3),
(33, 'yabu', 'tr', 123456789, 'yabu@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-05-08 09:56:16', 4);

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
  `expiration_interval` int(255) NOT NULL,
  `expir_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblguard`
--

INSERT INTO `tblguard` (`ID`, `Profilepic`, `Name`, `MobileNumber`, `Address`, `IDtype`, `IDnumber`, `RegistrationDate`, `isAssigned`, `UniformAssigned`, `isTrainer`, `companyName`, `remark`, `expiration_interval`, `expir_date`) VALUES
(14, '8bb5178436e4853a900761615e13cccf1683543715.jpg', 'poul', 911121314, 'adiss abeba', NULL, '1112', '2023-05-08 11:01:55', 1, 1, 0, '', 'finished', 2, '2023-06-12'),
(15, 'd16c4c07b251666dfcac4fd038941d5b1683545857.jpg', 'kaleab', 912313233, 'addis ababa', NULL, '1113', '2023-05-08 11:37:37', 1, 1, 0, 'admas', 'fineshed', 0, '2023-06-12');

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
(15, '628618808', 'ami', 'aaa', 'amikingo@gmail.com', 1234567, 'adsd;e', 2, NULL, 'Both', '2023-05-08 11:48:59', 'Accepted', 'hello', 'kaleab', 'admas', '2023-05-11 23:27:36');

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
(35, 'abena', ' kin', 'amikingo@gmail.com', 'my', 'worksheet for core competency (1).pdf', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 2, '2023-05-11 13:25:40'),
(37, 'ami', ' kin', 'amikingo1@gmail.com', 'admas', 'History Assignment-2 (1).pdf', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 2, '2023-05-11 13:38:01');

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbladmintype`
--
ALTER TABLE `tbladmintype`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblguard`
--
ALTER TABLE `tblguard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblhiring`
--
ALTER TABLE `tblhiring`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
