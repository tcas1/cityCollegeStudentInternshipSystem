-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 11:17 AM
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
(3, 4, 'Java Developer Internship', 'dfhfahksdhjkajfgiqwgudwka,s,cuhzzd', '2017-10-31 23:59:59', 'Level 3', 1, 4, 4);

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
  `isLecturer` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `firstName`, `lastName`, `email`, `password`, `isLecturer`) VALUES
(4, 'Theodore', 'Cassidy', 'tcassidy@city.academic.gr', 'admin', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `internship_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this identifies the individual listing', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`poster_Id`) REFERENCES `users` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
