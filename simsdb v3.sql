-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 02:47 PM
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
  `internship_Id` int(11) NOT NULL,
  `firstName` varchar(120) NOT NULL,
  `lastName` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_Id`, `internship_Id`, `firstName`, `lastName`, `email`, `level`) VALUES
(90, 2, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', ''),
(91, 1, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(92, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(93, 3, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(94, 6, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(95, 8, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(96, 9, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(97, 13, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(98, 10, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', ''),
(99, 1, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(102, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(103, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(104, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(108, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(109, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(110, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', ''),
(111, 2, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', 'level3'),
(112, 6, 'Doug', 'Cassidy', 'dcassidy@city.academic.gr', 'level2'),
(113, 2, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', 'Level 3');

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
  `internship_Level` varchar(100) NOT NULL,
  `CV` tinyint(1) NOT NULL,
  `open_Positions` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`internship_Id`, `poster_Id`, `title`, `description`, `datetime`, `internship_Level`, `CV`, `open_Positions`, `duration`) VALUES
(1, 4, 'System Admin Internship', 'Lorel sum ipsum dolor sit amet, consectetur adipiscing elit. Nulla a egestas massa. Donec aliquet id erat non finibus. Morbi elementum accumsan pretium.', '2017-10-13 23:59:59', 'Graduate', 1, 2, 8),
(2, 4, 'Lab Assistant', 'jashdjahsdjhsdjadhjsadhfgb', '2018-04-04 17:29:27', 'Level 1', 0, 1, 12),
(3, 4, 'Java Developer Internship', 'dfhfahksdhjkajfgiqwgudwka,s,cuhzzd', '2017-10-31 23:59:59', 'Level 3', 1, 4, 4),
(6, 4, 'hello', 'hkkkk', '2017-12-08 11:11:00', 'level1,level2,', 0, 2, 8),
(7, 4, 'it admin', 'help us', '2017-12-30 12:30:00', 'BScLevel1year1,', 0, 8, 4),
(8, 4, 'mik', 'eee', '2017-12-08 23:11:00', 'Level 1,Level 2,', 0, 4, 8),
(9, 4, 'woo', 'weee', '2017-12-08 23:11:00', 'Level 2,Level 3,', 0, 4, 8),
(10, 5, 'City Break Intern', 'Cashier/ Barista ', '2017-12-23 11:11:00', 'Level 2,', 0, 1, 8),
(13, 4, 'Linux Admin Intern', 'help us plz', '2018-01-30 23:59:00', 'Level 3,Graduate,', 1, 2, 4);

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
(4, 'Ester', 'Cassidy', 'ecassidy@city.academic.gr', 'admin', 1, 'level2'),
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
(17, 'help', 'me', 'helpme@city.academic.gr', 'admin', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_Id`),
  ADD KEY `internship_Id` (`internship_Id`);

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
  MODIFY `application_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `internship_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this identifies the individual listing', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`internship_Id`) REFERENCES `internships` (`internship_Id`);

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`poster_Id`) REFERENCES `users` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
