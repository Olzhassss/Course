-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2021 at 09:14 AM
-- Server version: 10.3.13-MariaDB-log
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appletree_schedule`
--
CREATE DATABASE IF NOT EXISTS `appletree_schedule` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `appletree_schedule`;

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

CREATE TABLE `friday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session3` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session4` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session5` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session6` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friday`
--

INSERT INTO `friday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'Room', '8:00 - 9:15', '9:20 - 10:35', '11:00 - 12:30', '14:00 - 15:30', '16:00 - 17:30', '18:00 - 19:30'),
(1, '1', 'GRI-1', 'GRI-2', 'PRE-1', NULL, NULL, NULL),
(2, '8B', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2', 'GRE-1', 'GRE-2', NULL, NULL, NULL, NULL),
(4, '3', 'PRI-1', '', 'GRI-3', NULL, NULL, NULL),
(5, '4', 'PRB-1', 'PRB-2', NULL, NULL, NULL, NULL),
(6, '5', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '6', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '7A', 'GRE-3', 'GRE-4', NULL, NULL, NULL, NULL),
(9, '7B', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '8A', 'PRI-2', 'PRI-3', 'PRE-2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE `monday` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session3` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session4` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session5` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session6` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monday`
--

INSERT INTO `monday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'Room', '8:00 - 9:15', '9:20 - 10:35', '11:00 - 12:30', '14:00 - 15:30', '16:00 - 17:30', '18:00 - 19:30'),
(1, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '8B', 'PRE-1', 'PRI-1', 'PRU-2', NULL, NULL, NULL),
(3, '2', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '3', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '4', 'GRU-3', 'GRU-4', 'GRU-4', NULL, NULL, NULL),
(6, '5', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '6', 'PRI-2', 'PRI-3', NULL, NULL, NULL, NULL),
(8, '7A', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '7B', 'PRI-2', 'PRI-3', NULL, NULL, NULL, NULL),
(10, '8A', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saturday`
--

CREATE TABLE `saturday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session3` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session4` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session5` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session6` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saturday`
--

INSERT INTO `saturday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'Room', '8:00 - 9:15', '9:20 - 10:35', '11:00 - 12:30', '14:00 - 15:30', '16:00 - 17:30', '18:00 - 19:30'),
(1, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '8B', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '3', NULL, NULL, 'GRE-4', NULL, NULL, NULL),
(5, '4', NULL, NULL, 'GRE-3', NULL, NULL, NULL),
(6, '5', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '6', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '7A', NULL, 'PRI-2', 'PRE-2', NULL, NULL, NULL),
(9, '7B', NULL, 'PRI-3', 'PRE-1', NULL, NULL, NULL),
(10, '8A', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE `sunday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session3` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session4` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session5` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session6` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sunday`
--

INSERT INTO `sunday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'Room', '8:00 - 9:15', '9:20 - 10:35', '11:00 - 12:30', '14:00 - 15:30', '16:00 - 17:30', '18:00 - 19:30'),
(1, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '8B', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '3', NULL, NULL, 'GRE-4', NULL, NULL, NULL),
(5, '4', NULL, NULL, 'GRE-3', NULL, NULL, NULL),
(6, '5', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '6', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '7A', NULL, 'PRI-2', 'PRE-2', NULL, NULL, NULL),
(9, '7B', NULL, 'PRI-3', 'PRE-1', NULL, NULL, NULL),
(10, '8A', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

CREATE TABLE `thursday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session3` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session4` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session5` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session6` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thursday`
--

INSERT INTO `thursday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'Room', '8:00 - 9:15', '9:20 - 10:35', '11:00 - 12:30', '14:00 - 15:30', '16:00 - 17:30', '18:00 - 19:30'),
(1, '1', 'GRE-1', 'GRI-3', NULL, NULL, NULL, NULL),
(2, '8B', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2', 'GRE-2', 'GRI-1', NULL, NULL, NULL, NULL),
(4, '3', 'GRE-3', 'GRI-2', NULL, NULL, NULL, NULL),
(5, '4', 'GRE-4', NULL, NULL, NULL, NULL, NULL),
(6, '5', 'PRI-1', 'PRI-3', NULL, NULL, NULL, NULL),
(7, '6', 'PRI-2', NULL, NULL, NULL, NULL, NULL),
(8, '7A', 'PRE-1', NULL, 'PRB-1', NULL, NULL, NULL),
(9, '7B', 'PRE-2', NULL, 'PRB-2', NULL, NULL, NULL),
(10, '8A', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

CREATE TABLE `tuesday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session3` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session4` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session5` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session6` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tuesday`
--

INSERT INTO `tuesday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'Room', '8:00 - 9:15', '9:20 - 10:35', '11:00 - 12:30', '14:00 - 15:30', '16:00 - 17:30', '18:00 - 19:30'),
(1, '1', 'GRM-1', 'GRM-1', NULL, NULL, NULL, NULL),
(2, '8B', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2', 'GRE-2', 'GRI-1', NULL, NULL, NULL, NULL),
(4, '3', 'GRE-3', 'GRI-2', NULL, NULL, NULL, NULL),
(5, '4', 'GRE-4', NULL, NULL, NULL, NULL, NULL),
(6, '5', 'PRI-1', 'PRI-3', NULL, NULL, NULL, NULL),
(7, '6', 'PRI-2', NULL, NULL, NULL, NULL, NULL),
(8, '7A', 'PRE-1', NULL, 'PRB-1', NULL, NULL, NULL),
(9, '7B', 'PRE-2', NULL, 'PRB-2', NULL, NULL, NULL),
(10, '8A', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE `wednesday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session3` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session4` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session5` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session6` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wednesday`
--

INSERT INTO `wednesday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'Room', '8:00 - 9:15', '9:20 - 10:35', '11:00 - 12:30', '14:00 - 15:30', '16:00 - 17:30', '18:00 - 19:30'),
(1, '1', 'GRI-1', 'GRI-2', 'GRU-4', NULL, NULL, NULL),
(2, '8B', NULL, NULL, NULL, 'PRU-2', 'PRU-2', NULL),
(3, '2', 'GRE-1', 'GRE-2', NULL, NULL, NULL, NULL),
(4, '3', 'PRI-1', NULL, 'GRI-3', NULL, NULL, NULL),
(5, '4', 'PRB-1', 'PRB-2', NULL, NULL, NULL, NULL),
(6, '5', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '6', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '7A', 'GRE-3', 'GRE-4', NULL, NULL, NULL, NULL),
(9, '7B', NULL, 'PRI-1', 'PRI-1', NULL, NULL, NULL),
(10, '8A', 'PRI-2', 'PRI-3', 'PRE-2', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friday`
--
ALTER TABLE `friday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saturday`
--
ALTER TABLE `saturday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sunday`
--
ALTER TABLE `sunday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thursday`
--
ALTER TABLE `thursday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuesday`
--
ALTER TABLE `tuesday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wednesday`
--
ALTER TABLE `wednesday`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friday`
--
ALTER TABLE `friday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `saturday`
--
ALTER TABLE `saturday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sunday`
--
ALTER TABLE `sunday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `thursday`
--
ALTER TABLE `thursday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
