-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 08 2020 г., 07:03
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
-- База данных: `appletree`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(2) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pswd_f` varchar(20) NOT NULL DEFAULT '123',
  `pswd_s` varchar(20) NOT NULL DEFAULT '321'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `pswd_f`, `pswd_s`) VALUES
(1, 'Admin', '123', '321'),
(2, 'Sol', '!1!1', '2@2@');

-- --------------------------------------------------------

--
-- Структура таблицы `app_students`
--

CREATE TABLE `app_students` (
  `id` int(2) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_date` date NOT NULL,
  `phone_number` tinyint(10) UNSIGNED NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_ls` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `app_teachers`
--

CREATE TABLE `app_teachers` (
  `id` int(2) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_date` date NOT NULL,
  `phone_number` tinyint(10) UNSIGNED NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ed_lvl` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`) VALUES
(1, 'What a nice time to... study English, isn\'t it?', NULL),
(2, 'Be careful! Coffee is not always the best way to energize before studying!', NULL),
(3, 'Why should YOU lay the joystick down and pick up English notebook?', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE `lessons` (
  `id` int(2) NOT NULL,
  `std_num` smallint(2) UNSIGNED NOT NULL COMMENT 'number of students',
  `id_teacher` int(2) DEFAULT NULL,
  `session` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` smallint(3) UNSIGNED NOT NULL,
  `date_temp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(2) UNSIGNED NOT NULL COMMENT 'An identification number for each student',
  `name` varchar(15) NOT NULL COMMENT 'The name of the student',
  `surname` varchar(15) NOT NULL COMMENT 'The surname of the student',
  `set_date` date NOT NULL COMMENT 'Date of registration in office for student',
  `id_lesson` int(2) UNSIGNED DEFAULT NULL COMMENT 'The code of lesson for particular (group of) student(s)',
  `ed_lvl` varchar(20) DEFAULT NULL COMMENT 'The level of knowledge of English due simple division',
  `payment` int(6) UNSIGNED DEFAULT NULL COMMENT 'The cost of particular English course'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `set_date`, `id_lesson`, `ed_lvl`, `payment`) VALUES
(1, 'Olzhas', 'Toltoltol', '2020-04-14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL DEFAULT 'Test',
  `surname` varchar(15) NOT NULL DEFAULT 'Test',
  `set_date` date DEFAULT NULL,
  `exp` tinyint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `set_date`, `exp`) VALUES
(1, 'Ramir', 'Cheburek', '2020-04-12', 1),
(4, 'Olzhas', 'Olzhasov', '2020-04-12', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AdmLogin` (`login`);

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
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD UNIQUE KEY `TeacherID` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `app_students`
--
ALTER TABLE `app_students`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `app_teachers`
--
ALTER TABLE `app_teachers`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'An identification number for each student', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
