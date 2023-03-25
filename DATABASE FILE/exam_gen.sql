-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 11:50 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_gen`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `BranchID` int(11) NOT NULL,
  `BranchName` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `BranchName`) VALUES
(1, 'Mekanisa Campus'),
(2, 'Olympia Campus'),
(6, 'Megenagna Campus'),
(7, 'Kality Campus');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` int(11) NOT NULL,
  `CourseString` text NOT NULL,
  `Chapters` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `ProgramID` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseString`, `Chapters`, `DepartmentID`, `ProgramID`) VALUES
(1, 'Website Development', 8, 1, 1),
(2, 'Fundamentals of programming', 9, 1, 1),
(3, 'Compiler Design', 7, 1, 1),
(4, 'Simulation Modeling', 8, 1, 1),
(5, 'Digital Logic', 7, 1, 1),
(6, 'Website Development II', 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'Computer Science'),
(2, 'Business Management'),
(3, 'Accounting'),
(5, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `ExamID` int(11) NOT NULL,
  `ExamTitle` text NOT NULL,
  `CourseID` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) NOT NULL,
  `exam_flags` int(11) NOT NULL DEFAULT '0',
  `codes` int(11) DEFAULT '1',
  `mark` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examquestions`
--

CREATE TABLE IF NOT EXISTS `examquestions` (
  `ExamID` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_manual`
--

CREATE TABLE IF NOT EXISTS `exam_manual` (
  `ExamID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `ExamTitle` text CHARACTER SET utf8 NOT NULL,
  `ExamString` longtext CHARACTER SET utf8 NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_manual`
--

INSERT INTO `exam_manual` (`ExamID`, `CourseID`, `ExamTitle`, `ExamString`, `DateTime`, `UserID`) VALUES
(11, 2, 'Test 1 - 2018 Batch Regular', 'Test 1 - 2018 Batch Regular', '2022-07-09 17:27:46', 1),
(12, 1, 'Website class quiz - 2019', '', '2022-07-09 17:28:05', 1),
(13, 2, 'C++ Workout exam - 2', '', '2022-07-09 17:28:20', 1),
(14, 1, 'Webdev - PHP workout', '', '2022-07-09 17:28:44', 1),
(15, 1, 'HTML workout 3 - Class quize', '', '2022-07-09 17:29:00', 1),
(16, 1, 'Internet programming - 2019 - Semester final exam', '', '2022-07-09 17:42:19', 38),
(17, 2, 'Fundamentals of programming 2021 - Semester Final exam', '', '2022-07-09 17:42:54', 38),
(18, 1, 'Internet programming II - 2022 - Semester final exam', '', '2022-07-09 17:43:19', 38),
(21, 1, 'JS multiple choice class quiz', '', '2022-07-09 17:45:34', 1),
(22, 1, 'CSS workout lab test 1 - 2021 - 3rd year regular', '', '2022-07-09 17:46:30', 1),
(23, 1, 'HTTP/HTTPS multiple choice class quiz', '', '2022-07-09 17:46:55', 1),
(24, 1, 'test', '\n				asdf asdf asdf', '2022-07-22 20:13:20', 38),
(25, 4, 'Empty Doc 5', '', '2022-07-22 06:28:04', 38),
(26, 4, 'Test Doc', 'Test', '2022-07-23 02:34:36', 38);

-- --------------------------------------------------------

--
-- Stand-in structure for view `history_table`
--
CREATE TABLE IF NOT EXISTS `history_table` (
`ExamID` int(11)
,`QuestionID` int(11)
,`QuestionType` int(11)
,`QuestionString` text
,`CourseID` int(11)
,`Chapter` int(11)
,`Answer` text
,`q_flags` int(11)
,`time_poseted` timestamp
,`UserID` int(11)
,`ExamGenDate` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `multiplechoice`
--

CREATE TABLE IF NOT EXISTS `multiplechoice` (
  `MultipleChoiceID` int(11) NOT NULL,
  `MultipleChoiceString` text NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiplechoice`
--

INSERT INTO `multiplechoice` (`MultipleChoiceID`, `MultipleChoiceString`, `QuestionID`) VALUES
(15, '.cpp', 26),
(16, '.h', 26),
(17, '.header', 26),
(18, '.c++', 26),
(19, 'int arr[5]', 27),
(20, 'int arr[5.1]', 27),
(21, 'int arr{9}', 27),
(22, '[int array] 5', 27),
(23, 'p++', 28),
(24, '++n', 28),
(25, '--k', 28),
(26, 'k--', 28),
(27, 'begin()', 29),
(28, 'start()', 29),
(29, 'main()', 29),
(30, '_start', 29),
(31, 'All', 29),
(32, 'float', 30),
(33, 'double', 30),
(34, 'int', 30),
(35, 'bool', 30),
(36, 'A & B', 30),
(37, 'Dennis Ritchie', 46),
(38, 'Ken Thompson', 46),
(39, 'Brian Kernighan', 46),
(40, 'Bjarne Stroustrup', 46),
(41, 'Dennis Ritchie', 47),
(42, 'Brian Kernighan', 47),
(43, 'Ken Thompson', 47),
(44, 'Ken Thompson', 47),
(45, 'float', 48),
(46, 'int', 48),
(47, 'double', 48),
(48, 'bool', 48),
(49, 'class', 49),
(50, 'continue', 49),
(51, 'defualt', 49),
(52, 'all', 49),
(53, 'ISC', 50),
(54, 'VTC', 50),
(55, 'Text', 50),
(56, 'Binary', 50),
(57, '1.2', 51),
(58, '1.9e0', 51),
(59, '''hello''', 51),
(60, 'none', 51),
(61, 'true', 52),
(62, 'flase', 52),
(63, '"True"', 52),
(64, 'All', 52),
(65, '1.0', 53),
(66, '1.01', 53),
(67, '1.01', 53),
(68, '1.00000099000000000101', 53),
(69, '$', 54),
(70, '#', 54),
(71, '%', 54),
(72, '@', 54),
(73, '4_test', 55),
(74, 'test_r', 55),
(75, 'test_4', 55),
(76, 'test_4_t', 55),
(77, 'Inheritance', 56),
(78, 'Polymorphism', 56),
(79, 'Abstraction', 56),
(80, 'Encapsulation', 56),
(81, 'Bottom-Up', 57),
(82, 'Left-Right', 57),
(83, 'Right-left', 57),
(84, 'Top-Down', 57),
(85, 'Copy constructor', 58),
(86, 'Default constructor', 58),
(87, 'Assignment constructor', 58),
(88, 'All', 58),
(89, 'catch', 59),
(90, 'throw', 59),
(91, 'try', 59),
(92, 'finally', 59),
(93, 'call by object', 60),
(94, 'call by pointer', 60),
(95, 'call by value', 60),
(96, 'call by reference', 60);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `QuestionID` int(11) NOT NULL,
  `QuestionType` int(11) NOT NULL,
  `QuestionString` text NOT NULL,
  `CourseID` int(11) NOT NULL,
  `Chapter` int(11) NOT NULL,
  `Answer` text,
  `ImageData` longtext,
  `Comment` text,
  `RejectReason` text,
  `q_flags` int(11) NOT NULL DEFAULT '0',
  `time_poseted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `QuestionType`, `QuestionString`, `CourseID`, `Chapter`, `Answer`, `ImageData`, `Comment`, `RejectReason`, `q_flags`, `time_poseted`, `UserID`) VALUES
(21, 1, 'C++ is a subset of C Programming language.', 2, 1, '2', NULL, NULL, NULL, 1, '2022-07-11 17:40:24', 9),
(22, 1, 'Zero is used to represent false, and One is used to represent true.', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-11 17:40:24', 9),
(23, 1, 'A C++ program must have a main function.', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-11 17:40:24', 9),
(24, 1, 'The following is an example of a declaration statement: cout << â€œEnter a number: â€;', 2, 1, '2', NULL, NULL, NULL, 1, '2022-07-11 17:40:24', 9),
(25, 1, 'There is no limit on the size of the numbers that can be stored in the int data type.', 2, 1, '2', NULL, NULL, NULL, 1, '2022-07-11 17:40:24', 9),
(26, 2, 'Identify the correct extension of the user-defined header file in C++.', 2, 1, '2', NULL, NULL, NULL, 1, '2022-07-11 17:47:38', 9),
(27, 2, 'Identify the correct syntax for declaring arrays in C++.', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-11 17:47:39', 9),
(28, 2, 'Identify the correct example for a pre-increment operator.', 2, 1, '2', NULL, NULL, NULL, 1, '2022-07-11 17:47:39', 9),
(29, 2, 'Identify the correct function from which the execution of C++ program starts?', 2, 1, '3', NULL, NULL, NULL, 1, '2022-07-11 17:47:39', 9),
(30, 2, 'Using which of the following data type can 1.54 be represented?', 2, 1, '5', NULL, NULL, NULL, 1, '2022-07-11 17:47:39', 9),
(31, 4, 'C++ File extension', 2, 1, '.CPP', NULL, NULL, NULL, 1, '2022-07-11 17:51:50', 9),
(32, 4, 'G++', 2, 1, 'C++ Compiler', NULL, NULL, NULL, 1, '2022-07-11 17:51:50', 9),
(33, 4, 'main()', 2, 1, 'C++ Program starting Function', NULL, NULL, NULL, 1, '2022-07-11 17:51:50', 9),
(34, 4, '++N', 2, 1, 'pre-increment ', NULL, NULL, NULL, 1, '2022-07-11 17:51:50', 9),
(35, 4, 'N++', 2, 1, 'post-increment ', NULL, NULL, NULL, 1, '2022-07-11 17:51:50', 9),
(36, 5, 'The smallest individual unit in a program is known as a__________', 2, 1, 'token', NULL, NULL, NULL, 1, '2022-07-11 18:01:47', 9),
(37, 5, 'The data type used to share a memory location by two or more variables is__________', 2, 1, 'Union', NULL, NULL, NULL, 1, '2022-07-11 18:01:47', 9),
(38, 5, 'The operator__________is called the insertion or put-to operator.', 2, 1, '<<', NULL, NULL, NULL, 1, '2022-07-11 18:01:47', 9),
(39, 5, 'Operator__________returns the size of datatype in bytes', 2, 1, 'sizeof()', NULL, NULL, NULL, 1, '2022-07-11 18:01:48', 9),
(40, 5, 'The size of float datatype is__________bytes.', 2, 1, '4', NULL, NULL, NULL, 1, '2022-07-11 18:01:48', 9),
(41, 3, 'What is a class?', 2, 1, 'Class is a blue print which reflects the entities attributes and actions. Technically defining a class is designing an user defined data type.', NULL, NULL, NULL, 1, '2022-07-11 18:05:11', 9),
(42, 3, 'What is a namespace?', 2, 1, 'A namespace is the logical division of the code which can be used to resolve the name conflict of the identifiers by placing them under different name space.', NULL, NULL, NULL, 1, '2022-07-11 18:05:11', 9),
(43, 3, 'What are command line arguments?', 2, 1, 'The arguments/parameters which are sent to the main() function while executing from the command line/console are called so. All the arguments sent are the strings only.', NULL, NULL, NULL, 1, '2022-07-11 18:05:11', 9),
(44, 3, 'What is a class template?', 2, 1, 'A template class is a generic class. The keyword template can be used to define a class template.', NULL, NULL, NULL, 1, '2022-07-11 18:05:12', 9),
(45, 3, 'What is a preprocessor?', 2, 1, 'Preprocessor is a directive to the compiler to perform certain things before the actual compilation process begins.', NULL, NULL, NULL, 1, '2022-07-11 18:05:12', 9),
(46, 2, 'Who invented C++?', 2, 1, '4', NULL, NULL, NULL, 1, '2022-07-24 21:02:23', 9),
(47, 2, 'Who invented C++?', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:02:23', 9),
(48, 2, 'Which of the following type is provided by C++ but not C?', 2, 1, '4', NULL, NULL, NULL, 1, '2022-07-24 21:02:24', 9),
(49, 2, 'Which one of this is not c keyword', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:02:24', 9),
(50, 2, 'By default, all the files in C++ are opened in _________ mode.', 2, 1, '3', NULL, NULL, NULL, 1, '2022-07-24 21:02:24', 9),
(51, 2, 'which one of this cannot be represented in float', 2, 1, '3', NULL, NULL, NULL, 1, '2022-07-24 21:02:24', 9),
(52, 2, 'which one of this cannot represented in bool', 2, 1, '3', NULL, NULL, NULL, 1, '2022-07-24 21:02:24', 9),
(53, 2, 'compile time error', 2, 1, '4', NULL, 'The double had to truncate the approximation due to its limited memory, which resulted in a number that is not exactly 0.1.', NULL, 1, '2022-07-24 21:02:24', 9),
(54, 2, 'Which of the following symbol is used to declare the preprocessor directives in C++?', 2, 1, '2', NULL, NULL, NULL, 1, '2022-07-24 21:02:25', 9),
(55, 2, 'Which one of the following is not valid variable name', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:02:25', 9),
(56, 2, 'Which concept allows you to reuse the written code in C++?', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:02:25', 9),
(57, 2, 'Which of the following approach is used by C++?', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:02:25', 9),
(58, 2, 'Which of the following constructors are provided by the C++ compiler if not defined in a class?', 2, 1, '4', NULL, NULL, NULL, 1, '2022-07-24 21:02:25', 9),
(59, 2, 'The C++ code which causes abnormal termination/behaviour of a program should be written under _________ block.', 2, 1, '3', NULL, NULL, NULL, 1, '2022-07-24 21:02:25', 9),
(60, 2, 'Which is more effective while calling the C++ functions?', 2, 1, '4', NULL, 'In the call by reference, it will just passes the reference of the memory addresses of passed values rather than copying the value to new memories which reduces the overall time and memory use', NULL, 1, '2022-07-24 21:02:26', 9),
(62, 1, 'Super classes are also called Parent classes/Base classes.', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:49:57', 9),
(63, 1, 'Sub classes may also be called Child classes/Derived classes.', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:49:57', 9),
(64, 1, 'It is not possible to achieve inheritance of structures in c++?', 2, 1, '2', NULL, NULL, NULL, 1, '2022-07-24 21:49:57', 9),
(65, 1, 'It is not possible to add private members to struct.', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:49:57', 9),
(66, 1, 'A function may have any number of return statements each returning different values.', 2, 1, '1', NULL, NULL, NULL, 1, '2022-07-24 21:49:57', 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `question_history`
--
CREATE TABLE IF NOT EXISTS `question_history` (
`ExamID` int(11)
,`QuestionID` int(11)
,`QuestionType` int(11)
,`QuestionString` text
,`CourseID` int(11)
,`Chapter` int(11)
,`Answer` text
,`q_flags` int(11)
,`time_poseted` timestamp
,`UserID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL,
  `UserType` int(11) NOT NULL DEFAULT '1',
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Activated` tinyint(1) NOT NULL DEFAULT '0',
  `BranchID` int(11) DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserType`, `Username`, `Password`, `Name`, `Email`, `Activated`, `BranchID`, `DepartmentID`) VALUES
(1, 0, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Admino Tura', 'admin@thissite.com', 1, NULL, NULL),
(2, 1, 'Natty', '25d55ad283aa400af464c76d713c07ad', 'Natneal Tefera', 'naty208@gmail.com', 1, 1, 1),
(3, 1, 'desu_w', '25d55ad283aa400af464c76d713c07ad', 'Desalegn W', 'Desu58@gmail.com', 1, 1, 1),
(7, 1, 'hana_g', '25d55ad283aa400af464c76d713c07ad', 'Hana Gutema', 'hana_g@gmail.com', 1, 1, 1),
(9, 1, 'FikruT', '25d55ad283aa400af464c76d713c07ad', 'Fikru Tolera', 'FikruT@gmail.com', 1, 1, 1),
(38, 3, 'academic', '25d55ad283aa400af464c76d713c07ad', 'Beza Negash', 'academic@gmail.com', 1, 1, 1),
(39, 2, 'examc', '25d55ad283aa400af464c76d713c07ad', 'Eyoel Tadesse', 'examc@gmail.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure for view `history_table`
--
DROP TABLE IF EXISTS `history_table`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history_table` AS select `eqq`.`ExamID` AS `ExamID`,`eqq`.`QuestionID` AS `QuestionID`,`eqq`.`QuestionType` AS `QuestionType`,`eqq`.`QuestionString` AS `QuestionString`,`eqq`.`CourseID` AS `CourseID`,`eqq`.`Chapter` AS `Chapter`,`eqq`.`Answer` AS `Answer`,`eqq`.`q_flags` AS `q_flags`,`eqq`.`time_poseted` AS `time_poseted`,`eqq`.`UserID` AS `UserID`,`e`.`DateTime` AS `ExamGenDate` from (`question_history` `eqq` join `exam` `e` on((`e`.`ExamID` = `eqq`.`ExamID`)));

-- --------------------------------------------------------

--
-- Structure for view `question_history`
--
DROP TABLE IF EXISTS `question_history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `question_history` AS select `eq`.`ExamID` AS `ExamID`,`q`.`QuestionID` AS `QuestionID`,`q`.`QuestionType` AS `QuestionType`,`q`.`QuestionString` AS `QuestionString`,`q`.`CourseID` AS `CourseID`,`q`.`Chapter` AS `Chapter`,`q`.`Answer` AS `Answer`,`q`.`q_flags` AS `q_flags`,`q`.`time_poseted` AS `time_poseted`,`q`.`UserID` AS `UserID` from (`questions` `q` join `examquestions` `eq` on((`eq`.`QuestionID` = `q`.`QuestionID`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExamID`,`CourseID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `examquestions`
--
ALTER TABLE `examquestions`
  ADD PRIMARY KEY (`ExamID`,`QuestionID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `exam_manual`
--
ALTER TABLE `exam_manual`
  ADD PRIMARY KEY (`ExamID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD PRIMARY KEY (`MultipleChoiceID`,`QuestionID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`,`CourseID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Username_2` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `BranchID` (`BranchID`),
  ADD KEY `DepartmentID` (`DepartmentID`),
  ADD KEY `DepartmentID_2` (`DepartmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BranchID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exam_manual`
--
ALTER TABLE `exam_manual`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  MODIFY `MultipleChoiceID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `examquestions`
--
ALTER TABLE `examquestions`
  ADD CONSTRAINT `examquestions_ibfk_1` FOREIGN KEY (`ExamID`) REFERENCES `exam` (`ExamID`) ON DELETE CASCADE,
  ADD CONSTRAINT `examquestions_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE;

--
-- Constraints for table `exam_manual`
--
ALTER TABLE `exam_manual`
  ADD CONSTRAINT `exam_manual_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_manual_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;

--
-- Constraints for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD CONSTRAINT `multiplechoice_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE SET NULL;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
