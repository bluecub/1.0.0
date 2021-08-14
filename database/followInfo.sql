-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2021 at 07:48 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blueCub`
--

-- --------------------------------------------------------

--
-- Table structure for table `followInfo`
--

CREATE TABLE `followInfo` (
  `follower_ID` int(11) NOT NULL,
  `following_ID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followInfo`
--
ALTER TABLE `followInfo`
  ADD KEY `follower_ID` (`follower_ID`),
  ADD KEY `following_ID` (`following_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `followInfo`
--
ALTER TABLE `followInfo`
  ADD CONSTRAINT `followInfo_ibfk_1` FOREIGN KEY (`follower_ID`) REFERENCES `userInfo` (`user_ID`),
  ADD CONSTRAINT `followInfo_ibfk_2` FOREIGN KEY (`following_ID`) REFERENCES `userInfo` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
