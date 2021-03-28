-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 26 2021 г., 12:37
-- Версия сервера: 5.6.47
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `quizbot`
--

-- --------------------------------------------------------

--
-- Структура таблицы `quizbot`
--

CREATE TABLE `quizbot` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quiz` text NOT NULL,
  `trueanswer` varchar(1) NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `quizbot`
--

INSERT INTO `quizbot` (`id`, `description`, `quiz`, `trueanswer`, `A`, `B`, `C`, `D`) VALUES
(1, 'Geografiyadan testlar.', 'Mariana chuqurligi.', 'D', '4500 m', '3200m', '7800m', '11000m');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `quizbot`
--
ALTER TABLE `quizbot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `quizbot`
--
ALTER TABLE `quizbot`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
