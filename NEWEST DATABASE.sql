-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 05:52 AM
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
  `secretcode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admincode`
--

INSERT INTO `admincode` (`secretcode`) VALUES
('@dM!N');

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
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_Id`, `applicant_id`, `internship_Id`, `firstName`, `lastName`, `email`, `level`) VALUES
(90, 4, 2, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', ''),
(91, 5, 1, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(92, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(93, 5, 3, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(94, 5, 6, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(95, 5, 8, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(96, 5, 9, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(98, 4, 10, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', ''),
(99, 5, 1, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(102, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(103, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(104, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(108, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(109, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(110, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(111, 5, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', 'level3'),
(112, 5, 6, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', 'level2'),
(113, 4, 2, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', 'Level 3'),
(114, 6, 1, 'will', 'willy', 'wwilly@city.academic.gr', 'Level 1'),
(115, 6, 3, 'will', 'willy', 'wwilly@city.academic.gr', 'Level 1'),
(125, 21, 3, 'jim', 'jo', 'jJOcassidy@city.academic.gr', 'Level 1'),
(128, 7, 1, 'mak', 'mik', 'mikmak@city.academic.gr', 'Level 1'),
(130, 7, 28, 'mak', 'mik', 'mikmak@city.academic.gr', 'Level 1'),
(133, 7, 9, 'mak', 'mik', 'mikmak@city.academic.gr', 'Level 1'),
(137, 6, 10, 'will', 'willy', 'wwilly@city.academic.gr', 'Level 1');

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
(1, 4, 'System Admin Internship', 'Lorel sum ipsum dolor sit amet, consectetur adipiscing elit. Nulla a egestas massa. Donec aliquet id erat non finibus. Morbi elementum accumsan pretium.', '2017-10-13 23:59:59', '2019-08-07', 'Graduate', 1, 2, 8, 1),
(2, 4, 'Lab Assistant', 'jashdjahsdjhsdjadhjsadhfgb', '2018-04-04 17:29:27', '2018-02-10', 'Level 1', 0, 1, 12, 1),
(3, 4, 'Java Developer Internship', 'dfhfahksdhjkajfgiqwgudwka,s,cuhzzd', '2017-10-31 23:59:59', '2015-07-12', 'Level 3', 1, 4, 4, 1),
(6, 4, 'hello', 'hkkkk', '2017-12-08 11:11:00', '2020-09-02', 'level1,level2,', 0, 2, 8, 1),
(8, 4, 'mik', 'eee', '2017-12-08 23:11:00', '2017-05-15', 'Level 1,Level 2,', 0, 4, 8, 1),
(9, 4, 'woo', 'weee', '2017-12-08 23:11:00', '2017-12-08', 'Level 2,Level 3,', 0, 4, 8, 1),
(10, 5, 'City Break Intern', 'Cashier/ Barista ', '2017-12-23 11:11:00', '2017-12-12', 'Level 2,', 0, 1, 8, 0),
(28, 4, 'Lab Assistant', ' jashdjahsdjhsdjadhjsadhfgb', '2999-02-02 00:30:00', '2999-02-02', 'Level 2,Level 3,', 0, 1, 12, 1),
(33, 4, 'Lab Assistant', '  jashdjahsdjhsdjadhjsadhfgb', '2111-12-21 02:22:00', '2222-02-22', 'Array', 0, 122, 12, 1),
(34, 4, 'Lab Assistant5', '           jashdjahsdjhsdjadhjsadhfgb', '2222-02-22 14:22:00', '2019-02-02', 'Level 1 Year 2,Level 2,', 0, 1, 12, 0),
(35, 4, 'Lab Assistant', ' jashdjahsdjhsdjadhjsadhfgb', '0000-00-00 00:00:00', '2018-02-10', 'Level 1 Year 1,Level 1,Graduate,', 0, 1, 12, 0);

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
  `level` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `firstName`, `lastName`, `email`, `password`, `isLecturer`, `level`) VALUES
(4, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', 'admin', 1, ''),
(5, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', 'admin', 1, 'level3'),
(6, 'will', 'willy', 'wwilly@city.academic.gr', 'admin', 0, NULL),
(7, 'mak', 'mik', 'mikmak@city.academic.gr', 'admin', 0, NULL),
(8, 'George', 'Papa', 'gPapa@city.academic.gr', 'admin', 0, NULL),
(9, 'a', 's', 'sa@city.academic.gr', 'admin', 0, NULL),
(10, 'A', 's', 'as@city.academic.gr', 'admin', 0, NULL),
(11, '22', '12', 'qcassidy@city.academic.gr', 'admin', 0, NULL),
(12, 'ww', 'ew', 'wewecassidy@city.academic.gr', 'admin', 0, NULL),
(13, 'Jim', 'LinK', 'jlink@city.academic.gr', 'admin', 1, 'level3'),
(14, 'w', 'qwq', 'eqcassidy@city.academic.gr', 'admin', 0, NULL),
(15, 'sdq', 'asdsd', 'sdds@city.academic.gr', 'admin', 1, 'level2'),
(16, 'qwe', 'qe', 'weewwerfcassidy@city.academic.gr', 'admin', 0, NULL),
(17, 'help', 'me', 'helpme@city.academic.gr', 'admin', 1, NULL),
(18, 's', 'c', 'scassidy@city.academic.gr', 'admin', 1, NULL),
(19, 'Frank', 'Cassidy', 'fcassidy@city.academic.gr', 'admin', 1, NULL),
(20, 'er', 'reer', 'ererecassidy@city.academic.gr', 'admin', 1, NULL),
(21, 'jim', 'jo', 'jJOcassidy@city.academic.gr', 'admin', 0, NULL),
(22, 'Paul', 'Cassidy', 'pcassidy@city.academic.gr', 'admin', 1, NULL);

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
  MODIFY `application_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `internship_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this identifies the individual listing', AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
