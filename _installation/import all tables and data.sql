-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2023 at 08:42 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20524981_wdt`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `sche_id` int(20) NOT NULL COMMENT 'unique schedule id',
  `user_id` int(11) NOT NULL COMMENT 'scheduled by user',
  `appoint_to` varchar(50) DEFAULT NULL COMMENT 'appointed to technician',
  `date1` date NOT NULL COMMENT 'date appointed',
  `date2` date DEFAULT NULL COMMENT 'date finished',
  `time1` time NOT NULL COMMENT 'time appointed',
  `time2` time DEFAULT NULL COMMENT 'time finished',
  `status` varchar(15) NOT NULL COMMENT 'status code',
  `tech_cmt` varchar(255) DEFAULT NULL COMMENT 'comments from technician',
  `cust_cmt` varchar(255) DEFAULT NULL COMMENT 'comments from customer',
  `symp_id` char(15) NOT NULL COMMENT 'symptom id',
  `is_deleted` binary(2) DEFAULT NULL COMMENT 'mark as deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symp_id` char(15) NOT NULL,
  `symp_name` varchar(255) NOT NULL,
  `symp_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symp_id`, `symp_name`, `symp_desc`) VALUES
('smwg01', 'Sumthing Wong', 'Sumthing had went Wong, what could it be????'),
('symp01', 'Sample Testing', 'Sample description testing 123456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) NOT NULL COMMENT 'user''s email, unique',
  `user_role` tinyint(4) NOT NULL COMMENT 'user''s role, default is customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_role`) VALUES
(100002, 'des', '$2y$10$y1DO14tACovk3FlezlRoHOs9LFnImSc8Mo6upy/9YP5XqkQG0W2FC', 'houyan.yong@wdt.apu', 0),
(100003, 'jeslyn', '$2y$10$4gDmGqMwLfEirZJooh4lju.kIpYzld.IKm0kX7NyL0RiFbTwV2X36', 'xinwen.koeh@wdt.apu', 0),
(100004, 'kenny', '$2y$10$6d0u9Ln9TMl7NDeIsrJPSuZiFFTd2KiP1k5z6uPK7nfMg9CE2e/T6', 'jiaheng.low@wdt.apu', 2),
(100005, 'flo', '$2y$10$gbPclwgDBX0KaaQ7JmewPuataeA7sPoarMaRlSjZsd27q2b5nz29C', 'xinyee.ku@wdt.apu', 2),
(100006, 'tai', '$2y$10$wL0yPMwdekhWG7mg3PB29.dwfGo4IMvlgG6Sx.Fj7HkUuAvVGCRa2', 'eason.tai@wdt.apu', 1),
(100007, 'vin1', '$2y$10$Frcd3PxT0BudV3KY9PWNe.nUE6wW4M7fztfLxvdel7Nzm./mvv.HK', 'vin_diesel@fast.x', 1),
(100008, 'flozz', '$2y$10$wNWAbskdq.adwXZfs8ttquN.Pbg/p2WKUdshxU9.h1i9TwNuy8RJy', 'florence123.kxy@gmail.com', 1),
(100009, 'Kenny123', '$2y$10$2FM.fobavEleY3qgbriBvOxzA581J1gDD2Qvx5Lblvu3Ou/KDBrp.', 'tp067072@mail.apu.edu.my', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`sche_id`),
  ADD KEY `symp_id` (`symp_id`),
  ADD KEY `appointments_ibfk_2` (`user_id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `sche_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'unique schedule id', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=100010;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`symp_id`) REFERENCES `symptoms` (`symp_id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
