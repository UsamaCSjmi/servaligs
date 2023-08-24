-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2022 at 04:18 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servaligs`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int NOT NULL,
  `complaint` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_id` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `complaint`, `is_id`, `date`, `status`) VALUES
(1, 'Not Responding', 1, '2022-03-27', 'success'),
(2, 'WRGDHJRJ', 1, '2022-04-10', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `des_id` int NOT NULL,
  `designation` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`des_id`, `designation`) VALUES
(1, 'Student'),
(2, 'Provost'),
(3, 'Admin'),
(4, 'Electrician'),
(5, 'Gardener'),
(6, 'Plumber');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `hall_id` int NOT NULL,
  `hall_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`hall_id`, `hall_name`) VALUES
(4, 'SS Hall(North)'),
(5, 'Mohammad Habib Hall');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `is_id` int NOT NULL,
  `issue` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `from_id` int NOT NULL,
  `to_id` int NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`is_id`, `issue`, `date`, `from_id`, `to_id`, `status`) VALUES
(1, 'electricity problem', '2022-03-27', 7, 9, 'rejected'),
(3, 'werfsGsG', '2022-04-09', 12, 9, 'success'),
(4, 'werfsGsG', '2022-04-09', 12, 9, 'pending'),
(5, 'hf,mfh,fh,fu', '2022-04-09', 7, 9, 'pending'),
(6, 'rj', '2022-04-10', 7, 9, 'pending'),
(7, 'rj', '2022-04-10', 7, 9, 'success'),
(8, 'rj', '2022-04-10', 7, 9, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user_profile.png',
  `hall_id` int NOT NULL,
  `des_id` int NOT NULL,
  `total_tasks` int DEFAULT '0',
  `eno` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'EMPLOY',
  `room` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'EMP',
  `hostel` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'EMPLOYEE',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile`, `img`, `hall_id`, `des_id`, `total_tasks`, `eno`, `room`, `hostel`, `added_on`) VALUES
(6, 'Usama', 'b24331b1a138cde62aa1f679164fc62f', 'abs@abs.com', '8765432101', 'user_profile.png', 5, 1, 0, '', '', '', '2022-03-21 01:31:34'),
(7, 'Usama Husain', '70b4269b412a8af42b1f7b0d26eceff2', 'nhusain34@gmail.com', '9876543221', 'user_profile.png', 5, 1, 0, '', '', '', '2022-03-25 03:04:10'),
(8, 'Dr. Shahnawaz', '70b4269b412a8af42b1f7b0d26eceff2', 'abcd@abcd.com', '1234567890', 'user_profile.png', 5, 3, 0, 'EMPLOY', 'EMP', 'EMPLOYEE', '2022-03-11 03:30:12'),
(9, 'Mr. Shanu', '70b4269b412a8af42b1f7b0d26eceff2', 'shanu@gmail.com', '9876543210', 'user_profile.png', 5, 4, 1, 'EMPLOY', 'EMP', 'EMPLOYEE', '2022-03-27 03:32:57'),
(10, 'Mr. Genda Lal', 'dfssd', 'genda@gmail.com', '26387', 'user_profile.png', 4, 4, 2, 'EMPLOY', 'EMP', 'EMPLOYEE', '2022-03-27 05:13:26'),
(11, 'Dr Rafiuddin', '70b4269b412a8af42b1f7b0d26eceff2', 'provost@habib.com', '4444444444', 'user_profile.png', 5, 2, 0, 'EMPLOY', 'EMP', 'EMPLOYEE', '2022-04-05 00:05:15'),
(12, 'Usama Husain', '70b4269b412a8af42b1f7b0d26eceff2', 'usama@gmail.com', NULL, 'user_profile.png', 5, 1, 0, 'GL6127', '261', 'Haider Khan', '2022-04-09 01:11:03'),
(13, 'Raghiv', '70b4269b412a8af42b1f7b0d26eceff2', 'ragiv@gmail.com', '', 'user_profile.png', 5, 1, 0, 'GJ9970', 'sqd', 'hs', '2022-04-11 02:16:43'),
(14, 'gfgsfgnsgn', 'c3b71c08c73df4c65a10f5bc2c8b7019', 'df@sdf.com', '9876543210', 'user_profile.png', 5, 5, 0, '', '', 'NULL', '2022-04-11 02:55:21'),
(15, 'df', '0efadd9c18897eaaea577550d418478d', 'fgdfg@ssdf.com', '7887887654', 'user_profile.png', 5, 6, 0, 'EMPLOY', 'EMP', 'EMPLOYEE', '2022-04-11 02:58:17'),
(16, 'ss provost', '70b4269b412a8af42b1f7b0d26eceff2', 'ss@gmail.com', '3456789876', 'user_profile.png', 4, 2, 0, 'EMPLOY', 'EMP', 'EMPLOYEE', '2022-04-11 14:34:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `issue_id` (`is_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`des_id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`is_id`),
  ADD KEY `issue_from` (`from_id`),
  ADD KEY `issue_to` (`to_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_des` (`des_id`),
  ADD KEY `user_hall` (`hall_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `des_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `hall_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `is_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `issue_id` FOREIGN KEY (`is_id`) REFERENCES `issues` (`is_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issue_from` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_to` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_des` FOREIGN KEY (`des_id`) REFERENCES `designations` (`des_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_hall` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
