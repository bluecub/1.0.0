-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2021 at 08:05 AM
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
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postInfo`
--

CREATE TABLE `postInfo` (
  `post_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `text` varchar(500) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `videos` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userInfo`
--

CREATE TABLE `userInfo` (
  `user_ID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `gender` smallint(2) DEFAULT 2,
  `email` varchar(50) NOT NULL,
  `number` varchar(15) DEFAULT NULL,
  `profilePicture` varchar(50) DEFAULT NULL,
  `about` varchar(200) DEFAULT NULL,
  `joinedDate` date DEFAULT current_timestamp(),
  `lastActive` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastSeenVisible` tinyint(1) DEFAULT 1,
  `isPrivate` tinyint(1) DEFAULT 0,
  `isEnabled` tinyint(1) DEFAULT 1,
  `isVerified` tinyint(1) DEFAULT 0,
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userInfo`
--

INSERT INTO `userInfo` (`user_ID`, `userName`, `firstName`, `lastName`, `DOB`, `gender`, `email`, `number`, `profilePicture`, `about`, `joinedDate`, `lastActive`, `lastSeenVisible`, `isPrivate`, `isEnabled`, `isVerified`, `updatedAt`) VALUES
(9, 'vip3022', 'vipul', 'gupta', '2021-08-02', 2, 'itsmevipulgupta.2011@gmail.com', '9818633496', NULL, 'hello', '2021-08-20', '2021-08-20 13:10:57', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(10, 'anajal', 'anjali', 'gupta', '2021-08-11', 2, 'itsanjali@gmail.com', '9818633496', NULL, 'hello', '2021-08-20', '2021-08-20 13:31:31', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(11, 'kajalll', 'kajal', 'gupta', '2021-08-24', 2, 'kajal@gmail.com', '9818223311', NULL, 'hello', '2021-08-20', '2021-08-20 14:11:58', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(12, 'raman', 'raman', 'bansal', '2021-08-16', 2, 'raman1@gmail.com', '98811', NULL, 'hello', '2021-08-20', '2021-08-20 16:10:41', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(13, 'vipul', 'vipul', 'gupta', '2021-09-01', 2, 'bluecubinc@gmail.com', '9818633496', NULL, 'hello', '2021-08-20', '2021-08-20 18:47:27', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(21, 'mokshhhhh', 'moksh', 'babbar', '2001-03-02', 2, 'maksh@gmail.com', '', NULL, NULL, '2021-08-25', '2021-08-25 19:13:04', 1, 0, 1, 0, '2021-08-25 19:13:04'),
(22, 'kusummmm', 'kusum', 'ramola', '2008-03-02', 2, 'kusum@gmail.com', '77122231', NULL, NULL, '2021-08-25', '2021-08-25 19:18:36', 1, 0, 1, 0, '2021-08-25 19:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `userSecurityInfo`
--

CREATE TABLE `userSecurityInfo` (
  `user_ID` int(11) NOT NULL,
  `password` varchar(70) NOT NULL,
  `isVerified` tinyint(1) DEFAULT 0,
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userSecurityInfo`
--

INSERT INTO `userSecurityInfo` (`user_ID`, `password`, `isVerified`, `updatedAt`) VALUES
(9, '5c8f4004ad20122492dd53ee6f00274b', 0, '2021-08-21 14:59:47'),
(10, 'a30d40926a5918edd295214ca090c1bc', 0, '2021-08-21 14:59:47'),
(11, '13d73bb08593435c870453dd81016b00', 0, '2021-08-21 14:59:47'),
(12, '4dcd6b2314c2f9e88e1aea852fdbe465', 0, '2021-08-21 14:59:47'),
(13, 'b4c8d8a6718b3240cc8dcf8036db0426', 0, '2021-08-21 14:59:47'),
(21, '759517dba397334d2171e67a91d48bf7', 0, '2021-08-25 19:13:04'),
(22, '2fecd8b2ca8ee73dd7b598cd206fd3cb', 0, '2021-08-25 19:18:36');

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
-- Indexes for table `postInfo`
--
ALTER TABLE `postInfo`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `userInfo`
--
ALTER TABLE `userInfo`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userSecurityInfo`
--
ALTER TABLE `userSecurityInfo`
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postInfo`
--
ALTER TABLE `postInfo`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userInfo`
--
ALTER TABLE `userInfo`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `followInfo`
--
ALTER TABLE `followInfo`
  ADD CONSTRAINT `followInfo_ibfk_1` FOREIGN KEY (`follower_ID`) REFERENCES `userInfo` (`user_ID`),
  ADD CONSTRAINT `followInfo_ibfk_2` FOREIGN KEY (`following_ID`) REFERENCES `userInfo` (`user_ID`);

--
-- Constraints for table `postInfo`
--
ALTER TABLE `postInfo`
  ADD CONSTRAINT `postInfo_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `userInfo` (`user_ID`);

--
-- Constraints for table `userSecurityInfo`
--
ALTER TABLE `userSecurityInfo`
  ADD CONSTRAINT `userSecurityInfo_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `userInfo` (`user_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
