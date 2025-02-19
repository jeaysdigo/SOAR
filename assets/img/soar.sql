-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 06:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soar`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `reservation_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`, `email`, `picture`, `account_type`, `reservation_count`) VALUES
(1, 'admin', 'admin', 'admin@soar.com', NULL, 'admin', 0),
(2, '2020103475', '123', 'jeaysmie.digo.m@bulsu.edu.ph', 'assets/img/profilejeays id picture bsu.jpg', 'student', 0),
(3, '1234', '1234', 'digo.jeaysmie.m.3475@gmail.com', NULL, 'student', 0),
(4, '123', '123', '123@gmail.com', NULL, 'student', 0),
(5, 'nosection', '123', 'nosection@ga.com', NULL, 'student', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `rfid_no` varchar(50) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `rfid_no`, `first_name`, `last_name`, `account_id`) VALUES
(1, NULL, 'fname', 'lname', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_code` varchar(50) NOT NULL,
  `college_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_code`, `college_name`) VALUES
('CICT', 'College of Information and Communications Technology');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `college_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_name`, `college_code`) VALUES
('BSIT', 'Bachelor of Science in Information Technology', 'CICT');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occupy`
--

CREATE TABLE `occupy` (
  `occupy_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `seat_number` varchar(50) DEFAULT NULL,
  `data_surface` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_number`, `data_surface`, `status`) VALUES
(1, '1', '221 2 495 496 497 0.513 0.203 0.284\r\n', '1'),
(2, '2', '220 3 7 10 9 0.179 0.274 0.547', '0'),
(3, '3', '219 3 11 10 12 0.125 0.438 0.437', '0'),
(4, '4', '218 1 823 824 826 0.428 0.044 0.528\r\n', '0'),
(5, '5', '222 1 437 438 478 0.134 0.069 0.796', '0');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `reservation` tinyint(1) DEFAULT NULL,
  `minDuration` int(11) DEFAULT NULL,
  `maxDuration` int(11) DEFAULT NULL,
  `reservePerDay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `reservation`, `minDuration`, `maxDuration`, `reservePerDay`) VALUES
(1, 0, 1, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `rfid_no` varchar(50) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `yearsec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `rfid_no`, `first_name`, `last_name`, `account_id`, `course_code`, `yearsec_id`) VALUES
(0, NULL, 'nosection', 'nosection', 5, NULL, NULL),
(123, NULL, 'noCourse', 'noCourse', 4, NULL, 9),
(1234, NULL, 'JEAYSMIE', 'DIGO', 3, 'BSIT', 9),
(2020103475, '123', 'Jeaysmie', 'Digo', 2, 'BSIT', 9),
(2023000001, NULL, 'admin', 'admin', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearsec`
--

CREATE TABLE `yearsec` (
  `yearsec_id` int(11) NOT NULL,
  `year_level` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `section_group` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yearsec`
--

INSERT INTO `yearsec` (`yearsec_id`, `year_level`, `section`, `section_group`) VALUES
(1, 3, 'A', '1'),
(2, 3, 'A', '2'),
(3, 3, 'B', '1'),
(4, 3, 'B', '2'),
(5, 3, 'C', '1'),
(6, 3, 'C', '2'),
(7, 3, 'D', '1'),
(8, 3, 'D', '2'),
(9, 3, 'E', '1'),
(10, 3, 'E', '2'),
(11, 3, 'F', '1'),
(12, 3, 'F', '2'),
(13, 3, 'G', '1'),
(14, 3, 'G', '2'),
(15, 3, 'H', '1'),
(16, 3, 'H', '2'),
(17, 3, 'I', '1'),
(18, 3, 'I', '2'),
(19, 3, 'J', '1'),
(20, 3, 'J', '2'),
(21, 3, 'K', '1'),
(22, 3, 'K', '2'),
(23, 3, 'L', '1'),
(24, 3, 'L', '2'),
(25, 3, 'M', '1'),
(26, 3, 'M', '2'),
(27, 3, 'N', '1'),
(28, 3, 'N', '2'),
(29, 3, 'O', '1'),
(30, 3, 'O', '2'),
(31, 3, 'P', '1'),
(32, 3, 'P', '2'),
(33, 3, 'Q', '1'),
(34, 3, 'Q', '2'),
(35, 3, 'R', '1'),
(36, 3, 'R', '2'),
(37, 3, 'S', '1'),
(38, 3, 'S', '2'),
(39, 3, 'T', '1'),
(40, 3, 'T', '2'),
(41, 3, 'U', '1'),
(42, 3, 'U', '2'),
(43, 3, 'V', '1'),
(44, 3, 'V', '2'),
(45, 3, 'W', '1'),
(46, 3, 'W', '2'),
(47, 3, 'X', '1'),
(48, 3, 'X', '2'),
(49, 3, 'Y', '1'),
(50, 3, 'Y', '2'),
(51, 3, 'Z', '1'),
(52, 3, 'Z', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_code`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `college_code` (`college_code`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `occupy`
--
ALTER TABLE `occupy`
  ADD PRIMARY KEY (`occupy_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `yearsec_id` (`yearsec_id`);

--
-- Indexes for table `yearsec`
--
ALTER TABLE `yearsec`
  ADD PRIMARY KEY (`yearsec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `occupy`
--
ALTER TABLE `occupy`
  MODIFY `occupy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `occupy`
--
ALTER TABLE `occupy`
  ADD CONSTRAINT `occupy_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `occupy_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `occupy_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`yearsec_id`) REFERENCES `yearsec` (`yearsec_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
