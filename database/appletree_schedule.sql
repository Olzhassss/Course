-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 03 2020 г., 11:32
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
-- База данных: `appletree_schedule`
--

-- --------------------------------------------------------

--
-- Структура таблицы `monday`
--

CREATE TABLE `monday` (
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
-- Дамп данных таблицы `monday`
--

INSERT INTO `monday` (`id`, `room`, `session1`, `session2`, `session3`, `session4`, `session5`, `session6`) VALUES
(0, 'room', '9:00 - 10:30', '11:00 - 12:30', '14:00 - 15:30', NULL, NULL, NULL),
(1, '101A', 'GRA-1', 'PRA-1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tuesday`
--

CREATE TABLE `tuesday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `9:00 - 10:30` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `11:00 - 12:30` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `14:00 - 15:30` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `wednesday`
--

CREATE TABLE `wednesday` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `room` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `9:00 - 10:30` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `11:00 - 12:30` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `14:00 - 15:30` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tuesday`
--
ALTER TABLE `tuesday`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wednesday`
--
ALTER TABLE `wednesday`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `monday`
--
ALTER TABLE `monday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
