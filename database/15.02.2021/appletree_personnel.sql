-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2021 at 09:13 AM
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

--
-- Dumping data for table `app_students`
--

INSERT INTO `app_students` (`id`, `name`, `surname`, `sex`, `birth_year`, `phone_number`, `email`, `group_ls`, `ed_lvl`, `app_date`, `opt_checkbox1`, `opt_checkbox2`, `preferences`) VALUES
(14, 'Baha', 'Student', 'Male', 2000, '+7 (123) 456-45-46', 'teacher@gmail.com', 0, 'Undetermined', '2021-02-12', 0, 1, 'Chosen days of week: Any 2 days. Chosen lessons time: Any time.'),
(15, 'Bahac', 'Studentc', 'Male', 2000, '+7 (123) 456-45-46', 'teacher@gmail.com', 0, 'Undetermined', '2021-02-12', 0, 1, 'Chosen days of week: Any 2 days. Chosen lessons time: Any time.');

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
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
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

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `std_num`, `id_teacher`, `ed_lvl`) VALUES
('GRM-1', 'Assassin\'s Creed', 2, 4, 'Mixed'),
('GRU-4', 'GRU-4', 2, 7, 'Upper-intermediate'),
('PRE-1', 'The incredibles', 1, 5, 'Elementary'),
('PRI-1', 'CACA', 1, 6, 'Intermediate'),
('PRU-2', 'PRU-2', 1, 5, 'Upper-intermediate'),
('SPM-010', 'ASTANA', 0, NULL, 'Mixed');

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_class`, `id`, `name`, `surname`, `sex`, `birth_year`, `phone_number`, `email`, `group_ls`, `ed_lvl`, `set_date`, `opt_checkbox1`) VALUES
('PRU-2', 2, 'Namee', 'Surname', 'Male', 1920, '+7 (123) 456-78-90', 'email@address.com', 0, 'Upper-intermediate', '2021-01-12', 0),
('GRU-4', 6, 'Olzhas', 'Olzhas', 'Male', 1991, '+7 (777) 777-77-78', 'asd@asdas.asd', 0, 'Upper-intermediate', '2021-01-21', 1),
('GRU-4', 7, 'Tolegen', 'Tolegen', 'Male', 2002, '+7 (777) 123-00-00', 'tolegen123@gmail.com', 1, 'Upper-intermediate', '2021-01-25', 0),
('PRI-1', 8, 'Raim', 'Raim', 'Male', 2002, '+7 (777) 123-00-00', 'tolegen123@gmail.com', 1, 'Intermediate', '2021-01-25', 1),
('PRE-1', 9, 'Aisha', 'Aisha', 'Female', 2000, '+7 (777) 777-77-77', 'ey@eb.yn', 0, 'Elementary', '2021-01-25', 0),
('GRM-1', 10, 'Olzhas', 'T', 'Male', 2002, '+7 (777) 888-88-88', 'olzhas@mail.ru', 1, 'Mixed', '2021-02-02', 0),
('GRM-1', 11, 'Olzhas', 'Tt', 'Male', 2000, '+7 (987) 879-87-87', 'olzhass@mail.ru', 0, 'Mixed', '2021-02-02', 0),
(NULL, 12, 'Olzhas', 'Aas', 'Male', 2000, '+7 (121) 231-31-23', 'teacher@gmail.com', 0, 'Elementary', '2021-02-12', 0);

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
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `sex`, `birth_year`, `phone_number`, `email`, `exp`, `ed_lvl`, `set_date`, `opt_radio1`, `opt_radio2`, `opt_radio3`) VALUES
(4, 'Arman', 'Arman', 'Male', 2000, '+7 (777) 111-11-11', 'arman_arman@mail.ru', 18, 'Any', '2021-01-23', 1, 1, 1),
(5, 'Oneq', 'Oneq', 'Female', 2000, '+7 (111) 111-11-12', 'oneq@gmail.com', 1, 'Any', '2021-01-23', 0, 0, 0),
(6, 'Onew', 'Onew', 'Male', 2000, '+7 (111) 111-11-13', 'onew@gmail.com', 1, 'Any', '2021-01-23', 0, 0, 0),
(7, 'Onee', 'Onee', 'Male', 2000, '+7 (111) 111-11-14', 'onee@gmail.com', 1, 'Any', '2021-01-23', 0, 0, 0);

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
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `app_teachers`
--
ALTER TABLE `app_teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=9;

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
