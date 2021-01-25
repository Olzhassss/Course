-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 25 2021 г., 20:02
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `appletree_personnel`
--
CREATE DATABASE IF NOT EXISTS `appletree_personnel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `appletree_personnel`;

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `login` varchar(30) NOT NULL,
  `pswd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`login`, `pswd`) VALUES
('admin', '$2y$10$5Uh2BWQT/Hz1wkfRXCUqEOM4E8SgF9J0Q6LMSaTwTTQjSxi1z5TdG');

-- --------------------------------------------------------

--
-- Структура таблицы `app_students`
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
-- Структура таблицы `app_teachers`
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

--
-- Дамп данных таблицы `app_teachers`
--

INSERT INTO `app_teachers` (`id`, `name`, `surname`, `sex`, `birth_year`, `phone_number`, `email`, `exp`, `ed_lvl`, `app_date`, `opt_radio1`, `opt_radio2`, `opt_radio3`, `summary`) VALUES
(16, 'Teacher', 'Teacher', 'Male', 2000, '+7 (123) 231-31-23', 'tea@ch.er', 0, 'Any', '2021-01-24', 0, 0, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\nWhy do we use it?\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\nWhere does it come from?\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections');

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

CREATE TABLE `classes` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name (id) of the class',
  `std_num` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Number of students in the class',
  `id_teacher` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'Teacher of the class',
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Language teaching level'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`id`, `std_num`, `id_teacher`, `ed_lvl`) VALUES
('GRA-1', 0, 4, 'Undetermined'),
('GRA-2', 15, 4, 'Advanced'),
('PRA-1', 1, 5, 'Advanced'),
('PRI-1', 1, 6, 'Intermediate');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_class` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Class',
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
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id_class`, `id`, `name`, `surname`, `sex`, `birth_year`, `phone_number`, `email`, `group_ls`, `ed_lvl`, `set_date`, `opt_checkbox1`) VALUES
(NULL, 2, 'Name', 'Surname', 'Male', 1920, '+7 (123) 456-78-90', 'email@address.com', 0, 'Undetermined', '2021-01-12', 0),
(NULL, 6, 'Olzhas', 'Olzhas', 'Male', 1991, '+7 (777) 777-77-77', 'asd@asdas.asd', 0, 'Undetermined', '2021-01-21', 1),
(NULL, 7, 'Tolegen', 'Tolegen', 'Male', 2002, '+7 (777) 123-00-00', 'tolegen123@gmail.com', 1, 'Undetermined', '2021-01-25', 0),
(NULL, 8, 'Raim', 'Raim', 'Male', 2002, '+7 (777) 123-00-00', 'tolegen123@gmail.com', 1, 'Undetermined', '2021-01-25', 0),
(NULL, 9, 'Eyebyn', 'Eyebyn', 'Male', 2000, '+7 (777) 777-77-77', 'ey@eb.yn', 0, 'Undetermined', '2021-01-25', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
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
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `sex`, `birth_year`, `phone_number`, `email`, `exp`, `ed_lvl`, `set_date`, `opt_radio1`, `opt_radio2`, `opt_radio3`) VALUES
(4, 'Arman', 'Armanisssssssssssimo', 'Male', 2000, '+7 (777) 111-11-11', 'arman_arman@mail.ru', 18, 'Any', '2021-01-23', 1, 1, 1),
(5, 'Oneq', 'Oneq', 'Male', 2000, '+7 (111) 111-11-12', 'oneq@gmail.com', 1, 'Any', '2021-01-23', 0, 0, 0),
(6, 'Onew', 'Onew', 'Male', 2000, '+7 (111) 111-11-13', 'onew@gmail.com', 1, 'Any', '2021-01-23', 0, 0, 0),
(7, 'Onee', 'Onee', 'Male', 2000, '+7 (111) 111-11-14', 'onee@gmail.com', 1, 'Any', '2021-01-23', 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`login`) USING BTREE;

--
-- Индексы таблицы `app_students`
--
ALTER TABLE `app_students`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `app_teachers`
--
ALTER TABLE `app_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `app_students`
--
ALTER TABLE `app_students`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `app_teachers`
--
ALTER TABLE `app_teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
