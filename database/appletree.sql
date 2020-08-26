-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 09 2020 г., 12:52
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
  `id` smallint(5) UNSIGNED NOT NULL,
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
  `id` smallint(5) UNSIGNED NOT NULL,
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
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_file_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `img_file_name`) VALUES
(1, 'What a nice time to... study English, isn\'t it?', NULL, 'card_img1.jpg'),
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
  `id` smallint(5) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(611) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'What days of week does AppleTree offer classes?', 'We offer classes 7 days a week with exceptions on state holidays.'),
(2, 'What is the maximum size of one group?', 'Maximum size reaches 6 students, but usually we have 3-4 students in one group.'),
(3, 'Do groups are gathered in small age range of students?', 'No, in AppleTree we see it more beneficial not to divide groups by ages, because primary attribute for entire group is a common language level of learners.');

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
(1, ' Group lesson fee ', 2000, 'During weekday', 'Additional price assigned according to education level'),
(2, ' Private lesson fee ', 3200, 'Every day', 'Additional price assigned according to education level'),
(3, ' Group lesson fee ', 2500, 'During weekend', 'Additional price assigned according to education level');

-- --------------------------------------------------------

--
-- Структура таблицы `short_texts`
--

CREATE TABLE `short_texts` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `short_texts`
--

INSERT INTO `short_texts` (`id`, `name`, `text`, `description`) VALUES
(1, 'welcoming_text', 'Welcome to AppleTree website!', 'Welcoming text'),
(2, 'blockquote_text', 'Lorem ipsum', 'Quote under welcoming'),
(3, 'blockquote_citation', 'Creator, Olzhas', 'Citation of the quote'),
(4, 'schedule_note', 'There may be difference on state holidays and during school holidays (summer and winter seasons)', 'Notes under time schedule'),
(5, 'pricing_note', 'Detailed prices per lesson and per month will be given on application page, since education level tariff tend to change!', 'Notes under pricing'),
(6, 'slogan_text', 'Example of slogan', 'Slogan placed at the bottom of the page'),
(7, 'email_text', 'example_email@examp.le', 'Administrator\'s email address (contacts section)'),
(8, 'phone_text', '+7(000)000-00-00', 'Administrator\'s phone number (contacts section)');

-- --------------------------------------------------------

--
-- Структура таблицы `social_media`
--

CREATE TABLE `social_media` (
  `id` tinyint(4) NOT NULL,
  `alt` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `social_media`
--

INSERT INTO `social_media` (`id`, `alt`, `img_file_name`, `href`) VALUES
(1, 'twitter', 'twitter-logo.png', 'https://twitter.com/'),
(2, 'facebook', 'facebook-logo.png', 'https://facebook.com/'),
(3, 'instagram', 'instagram-logo.png', 'https://instagram.com/');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'An identification number for each student',
  `name` varchar(15) NOT NULL COMMENT 'The name of the student',
  `surname` varchar(15) NOT NULL COMMENT 'The surname of the student',
  `set_date` date NOT NULL COMMENT 'Date of registration in office for student',
  `id_lesson` int(2) UNSIGNED DEFAULT NULL COMMENT 'The code of lesson for particular (group of) student(s)',
  `ed_lvl` varchar(20) DEFAULT NULL COMMENT 'The level of knowledge of English due simple division',
  `payment` int(6) UNSIGNED DEFAULT NULL COMMENT 'The cost of particular English course'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` smallint(5) UNSIGNED NOT NULL,
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

-- --------------------------------------------------------

--
-- Структура таблицы `work_schedule`
--

CREATE TABLE `work_schedule` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `day_of_week` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Индексы таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `short_texts`
--
ALTER TABLE `short_texts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_media`
--
ALTER TABLE `social_media`
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
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `app_students`
--
ALTER TABLE `app_students`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `app_teachers`
--
ALTER TABLE `app_teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `short_texts`
--
ALTER TABLE `short_texts`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'An identification number for each student', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `work_schedule`
--
ALTER TABLE `work_schedule`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;