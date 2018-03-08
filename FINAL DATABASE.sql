-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 10:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincode`
--

CREATE TABLE `admincode` (
  `secretcode` varchar(12) NOT NULL,
  `admincode` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admincode`
--

INSERT INTO `admincode` (`secretcode`, `admincode`) VALUES
('@dM!N', 'cityadmin');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_Id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `internship_Id` int(11) NOT NULL,
  `firstName` varchar(120) NOT NULL,
  `lastName` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `cv` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_Id`, `applicant_id`, `internship_Id`, `firstName`, `lastName`, `email`, `level`, `cv`) VALUES
(98, 4, 10, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', '', ''),
(137, 6, 10, 'will', 'willy', 'wwilly@city.academic.gr', 'Level 1', ''),
(140, 6, 36, 'will', 'willy', 'wwilly@city.academic.gr', 'Level 1', 'BSc_Exam_Schedule_Sept_17-ANNOUNCEMENT.doc'),
(141, 6, 36, 'will', 'willy', 'wwilly@city.academic.gr', 'Level 1', 'BSc_Exam_Schedule_Sept_17-ANNOUNCEMENT.doc'),
(143, 8, 36, 'George', 'Papa', 'gPapa@city.academic.gr', 'Level 1', 'Computer Practical 1 Bibliography 4.docx'),
(145, 6, 37, 'William', 'Willy', 'wwilly@city.academic.gr', 'Level 1', 'Finding Princess Giraia.docx'),
(147, 21, 36, 'jim', 'jo', 'jJOcassidy@city.academic.gr', 'Level 1', '0'),
(148, 21, 37, 'jim', 'jo', 'jJOcassidy@city.academic.gr', 'Level 1', 'Ester chart.docx'),
(151, 9, 37, 'Anthony', 'Samual', 'sa@city.academic.gr', 'Level 1', 'Locate creature called.docx');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `internship_Id` int(11) NOT NULL COMMENT 'this identifies the individual listing',
  `poster_Id` int(11) NOT NULL COMMENT 'this is foreign key to a lecturer''s id',
  `title` varchar(120) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL,
  `date` date NOT NULL,
  `internship_Level` varchar(100) NOT NULL,
  `CV` tinyint(1) NOT NULL,
  `open_Positions` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `isarchived` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`internship_Id`, `poster_Id`, `title`, `description`, `datetime`, `date`, `internship_Level`, `CV`, `open_Positions`, `duration`, `isarchived`) VALUES
(10, 5, 'City Break Intern', 'Cashier/ Barista ', '2017-12-23 11:11:00', '2017-12-12', 'Level 2,', 0, 1, 8, 0),
(34, 4, 'Lab Assistant5', '           jashdjahsdjhsdjadhjsadhfgb', '2222-02-22 14:22:00', '2019-02-02', 'Level 1 Year 2,Level 2,', 0, 1, 12, 1),
(35, 4, 'Lab Assistant', '     jashdjahsdjhsdjadhjsadhfgb', '0000-00-00 00:00:00', '2018-02-10', 'level 1,Level 2,Level 3,Graduate,', 0, 1, 12, 1),
(36, 4, 'city college barista', '1 year experience', '0000-00-00 00:00:00', '2018-02-28', 'Level 1 Year 1,Level 2,', 1, 2, 8, 1),
(37, 4, 'IT tech', 'loral sum ipsum', '0000-00-00 00:00:00', '2018-03-12', 'Level 3,Graduate,', 1, 2, 4, 0),
(38, 4, 'latest tester', 'tester', '0000-00-00 00:00:00', '2019-02-22', 'Level 1,Level 3,', 1, 2, 8, 1),
(39, 4, 'level1 tester', ' tester', '0000-00-00 00:00:00', '2019-12-12', 'Level 1 Year 1,level 1,', 0, 2, 4, 1),
(41, 4, 'plz work', 'kekke', '0000-00-00 00:00:00', '2222-02-22', 'Level 1 Year 1,Level 1 Year 2,Level 1,Level 2,Level 3,Graduate,', 1, 2, 4, 0),
(42, 4, 'Linux admin', 'please help us', '0000-00-00 00:00:00', '2020-12-21', 'Level 3,Graduate,', 1, 1, 4, 0),
(43, 4, 'Python Developer Internship', 'practice python', '0000-00-00 00:00:00', '2018-12-22', 'Level 1,Level 2,', 1, 3, 4, 0),
(44, 4, 'Lecturer assistant ', ' web tech course', '0000-00-00 00:00:00', '2018-10-10', 'Level 2,', 0, 1, 4, 0),
(45, 4, 'Machine Learning Dev', 'practice your machine learning skills', '0000-00-00 00:00:00', '2020-12-12', 'Level 3,Graduate,', 1, 3, 12, 0),
(46, 4, '4monthtester', 'tets', '0000-00-00 00:00:00', '2222-02-22', 'Level 3,', 1, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `isLecturer` tinyint(1) NOT NULL DEFAULT '0',
  `level` varchar(120) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `firstName`, `lastName`, `email`, `password`, `isLecturer`, `level`, `isAdmin`) VALUES
(4, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', 'admin', 1, '', 0),
(5, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', 'admin', 1, 'level3', 0),
(6, 'William', 'Willy', 'wwilly@city.academic.gr', 'admin', 0, 'Level 1', 0),
(7, 'mak', 'mik', 'mikmak@city.academic.gr', 'admin', 0, NULL, 0),
(8, 'George', 'Papa', 'gPapa@city.academic.gr', 'admin', 0, NULL, 0),
(9, 'Scipio', 'Afracanus', 'sa@city.academic.gr', 'admin', 0, 'Level 1', 0),
(10, 'A', 's', 'as@city.academic.gr', 'admin', 0, NULL, 0),
(11, '22', '12', 'qcassidy@city.academic.gr', 'admin', 0, NULL, 0),
(12, 'ww', 'ew', 'wewecassidy@city.academic.gr', 'admin', 0, NULL, 0),
(13, 'Jim', 'LinK', 'jlink@city.academic.gr', 'admin', 1, 'level3', 0),
(14, 'w', 'qwq', 'eqcassidy@city.academic.gr', 'admin', 0, NULL, 0),
(15, 'sdq', 'asdsd', 'sdds@city.academic.gr', 'admin', 1, 'level2', 0),
(16, 'qwe', 'qe', 'weewwerfcassidy@city.academic.gr', 'admin', 0, NULL, 0),
(17, 'help', 'me', 'helpme@city.academic.gr', 'admin', 1, NULL, 0),
(18, 's', 'c', 'scassidy@city.academic.gr', 'admin', 1, NULL, 0),
(19, 'Frank', 'Cassidy', 'fcassidy@city.academic.gr', 'admin', 1, NULL, 0),
(20, 'er', 'reer', 'ererecassidy@city.academic.gr', 'admin', 1, NULL, 0),
(21, 'jim', 'jo', 'jJOcassidy@city.academic.gr', 'admin', 0, NULL, 0),
(22, 'Paul', 'Cassidy', 'pcassidy@city.academic.gr', 'admin', 1, NULL, 0),
(23, 'werer', 'werewer', 'wererwer@city.academic.gr', 'sjsjsjsj', 0, NULL, 0),
(24, 'Thank', 'you', 'tyou@city.academic.gr', 'thx', 1, NULL, 0),
(25, 'mradmin', 'adminny', 'mradmin@city.academic.gr', 'admin', 0, NULL, 1),
(26, 'Henry', 'Smith', 'hsmith@city.academic.gr', 'admin', 0, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_Id`),
  ADD KEY `internship_Id` (`internship_Id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`internship_Id`),
  ADD KEY `poster_Id` (`poster_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `internship_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this identifies the individual listing', AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`internship_Id`) REFERENCES `internships` (`internship_Id`) ON DELETE CASCADE;

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`poster_Id`) REFERENCES `users` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
