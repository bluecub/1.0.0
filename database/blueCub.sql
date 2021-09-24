-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2021 at 09:53 PM
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
-- Table structure for table `activityOnActivity`
--

CREATE TABLE `activityOnActivity` (
  `AOA_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `activity_ID` int(11) NOT NULL,
  `activityType` tinyint(4) NOT NULL,
  `commentText` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activityOnActivity`
--

INSERT INTO `activityOnActivity` (`AOA_ID`, `user_ID`, `activity_ID`, `activityType`, `commentText`, `createdAt`, `updatedAt`) VALUES
(9, 12, 175, 0, NULL, '2021-09-24 20:16:03', '2021-09-24 20:16:03'),
(15, 12, 176, 0, NULL, '2021-09-24 20:26:51', '2021-09-24 20:26:51'),
(16, 12, 167, 0, NULL, '2021-09-24 20:28:23', '2021-09-24 20:28:23'),
(17, 9, 167, 0, NULL, '2021-09-24 20:28:39', '2021-09-24 20:28:39'),
(18, 9, 125, 0, NULL, '2021-09-24 20:31:49', '2021-09-24 20:31:49'),
(19, 12, 165, 0, NULL, '2021-09-24 20:32:56', '2021-09-24 20:32:56'),
(20, 12, 182, 0, NULL, '2021-09-24 20:38:59', '2021-09-24 20:38:59'),
(21, 12, 151, 0, NULL, '2021-09-24 20:55:10', '2021-09-24 20:55:10'),
(22, 27, 182, 0, NULL, '2021-09-24 21:03:28', '2021-09-24 21:03:28'),
(24, 27, 184, 0, NULL, '2021-09-24 21:04:43', '2021-09-24 21:04:43'),
(25, 27, 185, 0, NULL, '2021-09-24 21:07:34', '2021-09-24 21:07:34'),
(26, 9, 184, 0, NULL, '2021-09-24 21:34:30', '2021-09-24 21:34:30'),
(27, 27, 139, 0, NULL, '2021-09-25 00:14:55', '2021-09-25 00:14:55'),
(28, 9, 155, 0, NULL, '2021-09-25 01:05:58', '2021-09-25 01:05:58');

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
-- Table structure for table `postActivity`
--

CREATE TABLE `postActivity` (
  `activity_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `activityType` smallint(3) NOT NULL,
  `commentText` varchar(255) DEFAULT NULL,
  `totalLikes` int(11) DEFAULT 0,
  `totalComments` int(11) DEFAULT 0,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postActivity`
--

INSERT INTO `postActivity` (`activity_ID`, `user_ID`, `post_ID`, `activityType`, `commentText`, `totalLikes`, `totalComments`, `createdAt`, `updatedAt`) VALUES
(116, 9, 33, 1, 'hi nice post', 0, 0, '2021-09-23 01:38:00', '2021-09-23 01:38:00'),
(117, 9, 33, 0, NULL, 0, 0, '2021-09-23 01:38:01', '2021-09-23 01:38:01'),
(119, 9, 32, 1, 'funny', 0, 0, '2021-09-23 01:38:10', '2021-09-23 01:38:10'),
(120, 9, 36, 0, NULL, 0, 0, '2021-09-23 01:38:16', '2021-09-23 01:38:16'),
(121, 9, 36, 1, 'hello there', 0, 0, '2021-09-23 01:38:21', '2021-09-23 01:38:21'),
(122, 9, 36, 1, 'interesting', 0, 0, '2021-09-23 01:38:28', '2021-09-23 01:38:28'),
(123, 9, 37, 0, NULL, 0, 0, '2021-09-23 01:38:31', '2021-09-23 01:38:31'),
(124, 9, 37, 1, 'lol', 0, 0, '2021-09-23 01:38:36', '2021-09-23 01:38:36'),
(125, 9, 32, 1, 'hmmm', 1, 0, '2021-09-23 01:38:51', '2021-09-24 20:31:49'),
(126, 9, 32, 1, 'nice', 0, 0, '2021-09-23 01:38:59', '2021-09-23 01:38:59'),
(127, 9, 31, 0, NULL, 0, 0, '2021-09-23 01:39:09', '2021-09-23 01:39:09'),
(128, 9, 34, 0, NULL, 0, 0, '2021-09-23 01:39:11', '2021-09-23 01:39:11'),
(129, 9, 27, 0, NULL, 0, 0, '2021-09-23 01:39:12', '2021-09-23 01:39:12'),
(130, 9, 26, 0, NULL, 0, 0, '2021-09-23 01:39:14', '2021-09-23 01:39:14'),
(131, 9, 24, 0, NULL, 0, 0, '2021-09-23 01:39:15', '2021-09-23 01:39:15'),
(132, 9, 26, 1, 'good', 0, 0, '2021-09-23 01:39:21', '2021-09-23 01:39:21'),
(133, 9, 25, 0, NULL, 0, 0, '2021-09-23 01:39:49', '2021-09-23 01:39:49'),
(134, 9, 28, 1, 'nice bro', 0, 0, '2021-09-23 01:40:07', '2021-09-23 01:40:07'),
(135, 9, 28, 0, NULL, 0, 0, '2021-09-23 01:40:08', '2021-09-23 01:40:08'),
(136, 12, 28, 1, 'ha ha', 0, 0, '2021-09-23 01:40:27', '2021-09-23 01:40:27'),
(137, 12, 28, 0, NULL, 0, 0, '2021-09-23 01:40:29', '2021-09-23 01:40:29'),
(138, 12, 26, 0, NULL, 0, 0, '2021-09-23 01:40:37', '2021-09-23 01:40:37'),
(139, 12, 26, 1, 'nice', 1, 0, '2021-09-23 01:40:39', '2021-09-25 00:14:55'),
(140, 12, 25, 0, NULL, 0, 0, '2021-09-23 01:40:43', '2021-09-23 01:40:43'),
(141, 12, 27, 0, NULL, 0, 0, '2021-09-23 01:40:49', '2021-09-23 01:40:49'),
(142, 12, 27, 1, 'bravo!!!', 0, 0, '2021-09-23 01:40:52', '2021-09-23 01:40:52'),
(143, 12, 34, 0, NULL, 0, 0, '2021-09-23 01:40:59', '2021-09-23 01:40:59'),
(144, 12, 34, 1, 'ha ha!!!', 0, 0, '2021-09-23 01:41:00', '2021-09-23 01:41:00'),
(146, 9, 38, 1, 'nice shoes!!', 0, 0, '2021-09-23 01:48:10', '2021-09-23 01:48:10'),
(148, 9, 38, 0, NULL, 0, 0, '2021-09-23 01:48:47', '2021-09-23 01:48:47'),
(149, 9, 19, 0, NULL, 0, 0, '2021-09-23 01:54:45', '2021-09-23 01:54:45'),
(150, 9, 19, 1, 'wow!!!!!', 0, 0, '2021-09-23 01:54:50', '2021-09-23 01:54:50'),
(151, 9, 32, 1, 'Ha ha!! Lol', 1, 0, '2021-09-23 02:03:12', '2021-09-24 20:55:10'),
(152, 12, 32, 1, 'lol!!!\r\nha', 0, 0, '2021-09-23 02:10:21', '2021-09-23 02:10:21'),
(153, 12, 19, 1, 'nice!!!', 0, 0, '2021-09-23 02:10:53', '2021-09-23 02:10:53'),
(154, 9, 41, 0, NULL, 0, 0, '2021-09-23 12:52:13', '2021-09-23 12:52:13'),
(155, 9, 41, 1, 'looking nice', 1, 0, '2021-09-23 12:52:19', '2021-09-25 01:05:58'),
(156, 9, 40, 0, NULL, 0, 0, '2021-09-23 12:52:21', '2021-09-23 12:52:21'),
(159, 9, 40, 1, 'nice', 0, 0, '2021-09-23 22:23:28', '2021-09-23 22:23:28'),
(165, 12, 42, 1, 'ha ha nice!!', 1, 0, '2021-09-23 22:50:40', '2021-09-24 20:32:56'),
(166, 12, 40, 1, 'lol', 0, 0, '2021-09-23 22:50:46', '2021-09-23 22:50:46'),
(167, 12, 32, 1, 'lol\r\n', 2, 0, '2021-09-23 22:50:56', '2021-09-24 20:28:39'),
(168, 12, 32, 1, 'nice', 0, 0, '2021-09-23 22:51:05', '2021-09-23 22:51:05'),
(175, 12, 32, 1, 'ha ha!!', 1, 0, '2021-09-24 19:55:12', '2021-09-24 20:16:03'),
(176, 12, 32, 1, 'hmmmm interesting!!', 1, 0, '2021-09-24 19:56:32', '2021-09-24 20:26:51'),
(179, 9, 32, 0, NULL, 0, 0, '2021-09-24 20:32:27', '2021-09-24 20:32:27'),
(180, 12, 32, 0, NULL, 0, 0, '2021-09-24 20:32:46', '2021-09-24 20:32:46'),
(181, 12, 42, 1, 'ha ha lol!!', 0, 0, '2021-09-24 20:32:55', '2021-09-24 20:32:55'),
(182, 12, 32, 1, 'lo;', 2, 0, '2021-09-24 20:38:33', '2021-09-24 21:03:28'),
(183, 27, 32, 0, NULL, 0, 0, '2021-09-24 21:03:26', '2021-09-24 21:03:26'),
(184, 27, 32, 1, 'intersting!!', 2, 0, '2021-09-24 21:04:03', '2021-09-24 21:34:30'),
(185, 27, 42, 1, 'ha ha', 1, 0, '2021-09-24 21:05:00', '2021-09-24 21:07:34'),
(186, 27, 42, 1, 'lolll', 0, 0, '2021-09-24 21:10:02', '2021-09-24 21:10:02'),
(187, 27, 42, 1, 'lolll', 0, 0, '2021-09-24 21:22:41', '2021-09-24 21:24:54'),
(188, 27, 41, 0, NULL, 0, 0, '2021-09-25 00:16:49', '2021-09-25 00:16:49'),
(189, 9, 42, 0, NULL, 0, 0, '2021-09-25 01:06:12', '2021-09-25 01:06:12'),
(190, 9, 32, 1, 'publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. ', 0, 0, '2021-09-25 01:10:04', '2021-09-25 01:10:04'),
(191, 9, 43, 0, NULL, 0, 0, '2021-09-25 01:19:05', '2021-09-25 01:19:05'),
(192, 9, 44, 0, NULL, 0, 0, '2021-09-25 01:19:35', '2021-09-25 01:19:35'),
(193, 9, 44, 1, 'lol!!', 0, 0, '2021-09-25 01:19:40', '2021-09-25 01:19:40'),
(194, 9, 43, 1, 'good one !!', 0, 0, '2021-09-25 01:20:06', '2021-09-25 01:20:06'),
(195, 9, 45, 0, NULL, 0, 0, '2021-09-25 01:22:48', '2021-09-25 01:22:48');

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
  `type` tinyint(4) NOT NULL,
  `visibility` tinyint(4) DEFAULT 0,
  `totalLikes` int(11) DEFAULT 0,
  `totalComments` int(11) DEFAULT 0,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postInfo`
--

INSERT INTO `postInfo` (`post_ID`, `user_ID`, `text`, `images`, `videos`, `type`, `visibility`, `totalLikes`, `totalComments`, `createdAt`, `updatedAt`) VALUES
(12, 9, 'my new post', '9_1631902698_0.jpeg', NULL, 0, 0, 0, 0, '2021-09-17 23:48:18', '2021-09-17 18:18:18'),
(16, 9, 'new one', '', '9_1631915569_0.mp4', 0, 0, 0, 0, '2021-09-18 03:22:49', '2021-09-17 21:52:49'),
(17, 9, 'new one 2', '9_1631915595_0.jpeg', '', 0, 0, 0, 0, '2021-09-18 03:23:15', '2021-09-17 21:53:15'),
(18, 9, 'new one 2', '9_1631915617_0.jpeg', '', 0, 1, 0, 0, '2021-09-18 03:23:37', '2021-09-17 21:53:37'),
(19, 12, 'helo ', '12_1631916289_0.jpg', '', 0, 0, 1, 2, '2021-09-18 03:34:49', '2021-09-22 20:40:53'),
(21, 9, 'hello', '9_1631962558_0.jpeg', '', 0, 0, 0, 0, '2021-09-18 16:25:58', '2021-09-18 10:55:58'),
(22, 9, 'Helloo', '9_1631962626_0.jpg', '', 0, 0, 0, 0, '2021-09-18 16:27:06', '2021-09-18 10:57:06'),
(24, 9, 'yes\n', '', '9_1631973120_0.mp4', 0, 0, 1, 0, '2021-09-18 19:22:00', '2021-09-22 20:09:15'),
(25, 9, 'yes\n', '', '', 0, 0, 2, 0, '2021-09-18 19:22:34', '2021-09-22 20:10:43'),
(26, 9, 'from vipul\n', '', '', 0, 0, 2, 2, '2021-09-18 19:24:23', '2021-09-22 20:10:39'),
(27, 9, 'from vipul\n', '9_1631973279_0.jpeg', '', 0, 0, 2, 1, '2021-09-18 19:24:39', '2021-09-22 20:10:52'),
(28, 9, 'from vipul\n', '9_1631973299_0.jpeg,9_1631973299_1.jpeg,9_1631973299_2.jpeg', '', 0, 0, 2, 2, '2021-09-18 19:24:59', '2021-09-22 20:10:29'),
(29, 9, 'from vipul\n', '9_1631973331_0.jpeg,9_1631973331_1.jpeg', '', 0, 0, 0, 0, '2021-09-18 19:25:31', '2021-09-22 20:07:04'),
(31, 9, 'done', '9_1632116834_0.jpeg', '', 0, 0, 1, 0, '2021-09-20 11:17:14', '2021-09-22 20:09:09'),
(32, 9, 'done', '9_1632116858_0.jpg,9_1632116858_1.jpeg', '', 0, 0, 3, 12, '2021-09-20 11:17:38', '2021-09-24 19:40:04'),
(33, 9, 'vid and img', '9_1632116941_0.jpeg', '9_1632116941_1.mp4', 0, 0, 1, 1, '2021-09-20 11:19:01', '2021-09-22 20:08:01'),
(34, 9, 'neeeeeeee', '9_1632117726_0.jpeg', '9_1632117726_1.mp4', 0, 0, 2, 1, '2021-09-20 11:32:06', '2021-09-22 20:11:00'),
(36, 9, ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum dicta impedit beatae sequi consequuntur labore quam suscipit repellendus mollitia exercitationem non dolorum, odit incidunt minus sapiente vitae aperiam, nemo dolorem. Lorem ipsum dolor si', '', '', 0, 0, 1, 2, '2021-09-20 19:38:51', '2021-09-22 20:08:28'),
(37, 9, 'this is with \' this and &quot;', '9_1632213212_0.jpeg', '', 0, 0, 1, 1, '2021-09-21 14:03:32', '2021-09-22 20:08:36'),
(38, 9, NULL, '9_1632341732_0.jpeg', '', 0, 0, 1, 1, '2021-09-23 01:45:32', '2021-09-22 20:18:47'),
(39, 9, 'new new', '9_1632381480_0.jpeg', '', 0, 0, 0, 0, '2021-09-23 12:48:00', '2021-09-23 07:18:00'),
(40, 9, 'iron Man !!!!', '9_1632381526_0.jpg', '', 0, 0, 1, 2, '2021-09-23 12:48:46', '2021-09-23 17:20:46'),
(41, 9, NULL, '9_1632381546_0.jpeg', '', 0, 0, 2, 1, '2021-09-23 12:49:06', '2021-09-24 18:46:49'),
(42, 9, 'hmmm', '9_1632382038_0.jpeg', '', 0, 0, 1, 5, '2021-09-23 12:57:18', '2021-09-24 19:36:12'),
(43, 9, 'ha ha !', '9_1632512925_0.gif', '', 0, 0, 1, 1, '2021-09-25 01:18:45', '2021-09-24 19:50:06'),
(44, 9, NULL, '9_1632512968_0.gif', '', 0, 0, 1, 1, '2021-09-25 01:19:28', '2021-09-24 19:49:40'),
(45, 9, NULL, '9_1632513164_0.gif', '', 0, 0, 1, 0, '2021-09-25 01:22:44', '2021-09-24 19:52:48');

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
  `joinedDate` datetime DEFAULT current_timestamp(),
  `lastActive` datetime DEFAULT current_timestamp(),
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
(9, 'vip3022', 'vipul', 'gupta', '2021-08-02', 2, 'itsmevipulgupta.2011@gmail.com', '', '', 'hello', '2021-08-20 00:00:00', '2021-09-24 21:53:54', 1, 0, 1, 0, '2021-09-06 09:25:56'),
(10, 'anajal', 'anjali', 'gupta', '2021-08-11', 2, 'itsanjali@gmail.com', '', NULL, 'hello', '2021-08-20 00:00:00', '2021-08-20 13:31:31', 1, 0, 1, 0, '2021-09-06 09:26:14'),
(11, 'kajalll', 'kajal', 'gupta', '2021-08-24', 2, 'kajal@gmail.com', '9818223311', NULL, 'hello', '2021-08-20 00:00:00', '2021-08-20 14:11:58', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(12, 'raman', 'raman', 'bansal', '2021-08-16', 2, 'raman1@gmail.com', '98811', '', 'hello', '2021-08-20 00:00:00', '2021-09-24 17:31:43', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(13, 'vipul', 'vipul', 'gupta', '2021-09-01', 2, 'bluecubinc@gmail.com', '9818633496', NULL, 'hello', '2021-08-20 00:00:00', '2021-08-20 18:47:27', 1, 0, 1, 0, '2021-08-21 14:58:32'),
(21, 'mokshhhhh', 'moksh', 'babbar', '2001-03-02', 2, 'maksh@gmail.com', '', NULL, NULL, '2021-08-25 00:00:00', '2021-08-25 19:13:04', 1, 0, 1, 0, '2021-08-25 19:13:04'),
(22, 'kusummmm', 'kusum', 'ramola', '2008-03-02', 2, 'kusum@gmail.com', '77122231', NULL, NULL, '2021-08-25 00:00:00', '2021-08-25 19:18:36', 1, 0, 1, 0, '2021-08-25 19:18:36'),
(26, 'helo', 'hello', 'world', '2016-06-09', 2, 'hello@gmail.com', '', NULL, NULL, '2021-08-27 00:00:00', '2021-08-27 14:38:20', 1, 0, 1, 0, '2021-09-06 09:26:05'),
(27, 'parth', 'parth', 'pathal', '2001-04-21', 2, 'parth@gmail.co', '', '', '', '2021-09-24 21:02:55', '2021-09-24 21:17:07', 1, 0, 1, 0, '2021-09-24 21:02:55');

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
(22, '2fecd8b2ca8ee73dd7b598cd206fd3cb', 0, '2021-08-25 19:18:36'),
(26, '89a5563a8016b82b3a89d38023e9b416', 0, '2021-08-27 14:38:20'),
(27, '54a4bf3368c2bb5b931833da12111265', 0, '2021-09-24 21:02:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activityOnActivity`
--
ALTER TABLE `activityOnActivity`
  ADD PRIMARY KEY (`AOA_ID`),
  ADD KEY `activity_ID` (`activity_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `followInfo`
--
ALTER TABLE `followInfo`
  ADD KEY `follower_ID` (`follower_ID`),
  ADD KEY `following_ID` (`following_ID`);

--
-- Indexes for table `postActivity`
--
ALTER TABLE `postActivity`
  ADD PRIMARY KEY (`activity_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `post_ID` (`post_ID`);

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
-- AUTO_INCREMENT for table `activityOnActivity`
--
ALTER TABLE `activityOnActivity`
  MODIFY `AOA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `postActivity`
--
ALTER TABLE `postActivity`
  MODIFY `activity_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `postInfo`
--
ALTER TABLE `postInfo`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `userInfo`
--
ALTER TABLE `userInfo`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activityOnActivity`
--
ALTER TABLE `activityOnActivity`
  ADD CONSTRAINT `activityOnActivity_ibfk_1` FOREIGN KEY (`activity_ID`) REFERENCES `postActivity` (`activity_ID`),
  ADD CONSTRAINT `activityOnActivity_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `userInfo` (`user_ID`);

--
-- Constraints for table `followInfo`
--
ALTER TABLE `followInfo`
  ADD CONSTRAINT `followInfo_ibfk_1` FOREIGN KEY (`follower_ID`) REFERENCES `userInfo` (`user_ID`),
  ADD CONSTRAINT `followInfo_ibfk_2` FOREIGN KEY (`following_ID`) REFERENCES `userInfo` (`user_ID`);

--
-- Constraints for table `postActivity`
--
ALTER TABLE `postActivity`
  ADD CONSTRAINT `postActivity_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `userInfo` (`user_ID`),
  ADD CONSTRAINT `postActivity_ibfk_2` FOREIGN KEY (`post_ID`) REFERENCES `postInfo` (`post_ID`);

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
