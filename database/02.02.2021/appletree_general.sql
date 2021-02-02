-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2021 г., 17:51
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
-- База данных: `appletree_general`
--
CREATE DATABASE IF NOT EXISTS `appletree_general` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `appletree_general`;

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_file_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `img_file_name`) VALUES
(1, 'What a nice time to... study English, isn\'t it?', '     USE YOUR POWER!\r\nASDASD\r\nSSD\r\ndsad adsa a asd asd a da as ad ASFA ADSF SF A ADF SA FSAF SA SAF SDF SA FSA SD SF AS A FS FSA  sad a afsad asf we  a e r area ear ea var e ew w                                                                                                              f                                         f', 'card_img1.jpg'),
(2, 'Be careful! Coffee is not always the best way to energize before studying!', NULL, 'card_img2.jpg'),
(3, 'Why should YOU lay the joystick down and pick up English notebook?', NULL, 'card_img3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `carousel_imgs`
--

CREATE TABLE `carousel_imgs` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `img_file_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carousel_imgs`
--

INSERT INTO `carousel_imgs` (`id`, `img_file_name`) VALUES
(1, 'carousel_img1.png'),
(2, 'carousel_img2.jpg'),
(3, 'carousel_img3.png');

-- --------------------------------------------------------

--
-- Структура таблицы `faqs`
--

CREATE TABLE `faqs` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(650) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'Which days of week does AppleTree offer classes?', 'We offer classes 7 days a week with exceptions on state holidays.'),
(2, 'What is the maximum size of one group?', 'Maximum size reaches 6 students, but usually we have 3-4 students in one group.'),
(3, 'Do groups are gathered in small age range of students?', 'No, in AppleTree we see it more beneficial not to divide groups by ages because primary attribute for an entire group is a common language proficiency of learners.');

-- --------------------------------------------------------

--
-- Структура таблицы `form_tabs`
--

CREATE TABLE `form_tabs` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tab title',
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tab text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `form_tabs`
--

INSERT INTO `form_tabs` (`id`, `title`, `content`) VALUES
(1, 'Tab 1 title', 'Tab 1 text'),
(2, 'Tab 2 title', 'Tab 2 text'),
(3, 'Tab 3 title', 'Tab 3 text');

-- --------------------------------------------------------

--
-- Структура таблицы `price_list`
--

CREATE TABLE `price_list` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `card_header` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` mediumint(8) UNSIGNED NOT NULL COMMENT 'in tenge per lesson',
  `condition` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `price_list`
--

INSERT INTO `price_list` (`id`, `card_header`, `price`, `condition`, `note`) VALUES
(1, 'Group lessons', 2500, 'During weekday', 'Additional price may be assigned in special circumstances. The final price will be discussed after you apply.'),
(2, 'Private lessons', 3200, 'Any day', 'Additional price may be assigned in special circumstances. The final price will be discussed after you apply.'),
(3, 'Special cases lessons', 3000, 'During weekend', 'Additional price may be assigned in special circumstances. The final price will be discussed after you apply.');

-- --------------------------------------------------------

--
-- Структура таблицы `short_texts`
--

CREATE TABLE `short_texts` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used_for` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `short_texts`
--

INSERT INTO `short_texts` (`id`, `name`, `text`, `description`, `used_for`) VALUES
(1, 'welcoming_text', 'Welcoming text!', 'Welcoming text', 'index'),
(2, 'blockquote_text', 'Quote under welcoming!', 'Quote under welcoming', 'index'),
(3, 'blockquote_citation', 'Olzhas, The creator', 'Citation of the quote', 'index'),
(4, 'schedule_note', 'There may be difference on state holidays and during school holidays (summer and winter seasons)', 'Notes under time schedule', 'index'),
(5, 'pricing_note', 'Detailed prices per lesson and per month will be given on application page, since education level tariff tend to change!', 'Notes under pricing', 'index'),
(6, 'slogan_text', 'Example of slogan', 'Slogan placed at the bottom of the page (footer)', 'footer'),
(7, 'email_text', 'example_email@examp.le', 'Administrator\'s email address (footer)', 'footer'),
(8, 'phone_text', '+7(000)000-00-00', 'Administrator\'s phone number (footer)', 'footer');

-- --------------------------------------------------------

--
-- Структура таблицы `social_media`
--

CREATE TABLE `social_media` (
  `id` tinyint(4) NOT NULL,
  `description` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_file_name` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `social_media`
--

INSERT INTO `social_media` (`id`, `description`, `img_file_name`, `href`) VALUES
(1, 'Twitter link', 'twitter-logo.png', 'https://twitter.com/'),
(2, 'Facebook link', 'facebook-logo.png', 'https://facebook.com/'),
(3, 'Instagram link', 'instagram-logo.png', 'https://instagram.com/');

-- --------------------------------------------------------

--
-- Структура таблицы `work_schedule`
--

CREATE TABLE `work_schedule` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `day_of_week` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `work_schedule`
--

INSERT INTO `work_schedule` (`id`, `day_of_week`, `working_time`, `app_time`) VALUES
(1, 'Weekday', '9:00 - 19:00', '9:00 - 21:00'),
(2, 'Saturday', '10:00 - 16:00', '10:00 - 18:00'),
(3, 'Sunday', '10:00 - 16:00', '10:00 - 16:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carousel_imgs`
--
ALTER TABLE `carousel_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `form_tabs`
--
ALTER TABLE `form_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `carousel_imgs`
--
ALTER TABLE `carousel_imgs`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `form_tabs`
--
ALTER TABLE `form_tabs`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `work_schedule`
--
ALTER TABLE `work_schedule`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
