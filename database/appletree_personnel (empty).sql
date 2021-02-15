-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2021 at 10:16 AM
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
-- Database: `appletree_personnel`
--
CREATE DATABASE IF NOT EXISTS `appletree_personnel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `appletree_personnel`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `login` varchar(30) NOT NULL,
  `pswd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`login`, `pswd`) VALUES
('admin', '$2y$10$5Uh2BWQT/Hz1wkfRXCUqEOM4E8SgF9J0Q6LMSaTwTTQjSxi1z5TdG');

-- --------------------------------------------------------

--
-- Table structure for table `app_students`
--

CREATE TABLE `app_students` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name',
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Surname',
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sex',
  `birth_year` smallint(5) UNSIGNED NOT NULL COMMENT 'Birth year',
  `phone_number` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phone number',
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  `group_ls` tinyint(1) NOT NULL COMMENT 'Group or private?',
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Education level',
  `app_date` date NOT NULL COMMENT 'Application date',
  `opt_checkbox1` tinyint(1) NOT NULL COMMENT 'Student has WhatsApp registered to the provided phone number',
  `opt_checkbox2` tinyint(1) NOT NULL COMMENT 'Student would like to test own English level',
  `preferences` varchar(700) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Information about the desired timetable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_teachers`
--

CREATE TABLE `app_teachers` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name',
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Surname',
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sex',
  `birth_year` smallint(5) UNSIGNED NOT NULL COMMENT 'Birth year',
  `phone_number` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phone number',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  `exp` tinyint(2) UNSIGNED NOT NULL COMMENT 'Working experience',
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Education level',
  `app_date` date NOT NULL COMMENT 'Application date',
  `opt_radio1` tinyint(1) NOT NULL COMMENT 'Applicant has WhatsApp registered to the provided phone number',
  `opt_radio2` tinyint(1) NOT NULL COMMENT 'Applicant has an opportunity to work on Sundays',
  `opt_radio3` tinyint(1) NOT NULL COMMENT 'Applicant expresses a desire to use own methodic material',
  `summary` varchar(2500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Additional information'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Class shortcut (ID)',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Class name',
  `std_num` tinyint(3) UNSIGNED NOT NULL COMMENT 'Students number',
  `id_teacher` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'Teacher of the class',
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Teaching level'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_class` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Class shortcut (ID)',
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name',
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Surname',
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sex',
  `birth_year` smallint(5) UNSIGNED NOT NULL COMMENT 'Birth year',
  `phone_number` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phone number',
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  `group_ls` tinyint(1) NOT NULL COMMENT 'Group or private?',
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Education level',
  `set_date` date NOT NULL COMMENT 'Date of acception',
  `opt_checkbox1` tinyint(1) NOT NULL COMMENT 'Student has WhatsApp registered to the provided phone number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name',
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Surname',
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sex',
  `birth_year` smallint(5) UNSIGNED NOT NULL COMMENT 'Birth year',
  `phone_number` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phone number ',
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  `exp` tinyint(2) UNSIGNED NOT NULL COMMENT 'Working experience',
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Education level',
  `set_date` date NOT NULL COMMENT 'Acceptance date',
  `opt_radio1` tinyint(1) NOT NULL COMMENT 'Person has WhatsApp registered to the provided phone number ',
  `opt_radio2` tinyint(1) NOT NULL COMMENT 'Person has an opportunity to work on Sundays ',
  `opt_radio3` tinyint(1) NOT NULL COMMENT 'Person expresses a desire to use own methodic material '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`login`) USING BTREE;

--
-- Indexes for table `app_students`
--
ALTER TABLE `app_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_teachers`
--
ALTER TABLE `app_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_students`
--
ALTER TABLE `app_students`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT for table `app_teachers`
--
ALTER TABLE `app_teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
