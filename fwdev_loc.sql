-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 25 2017 г., 15:44
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fwdev_loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `short_name` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `name`, `time`, `content`, `publish_date`, `short_name`, `meta`, `category`) VALUES
(1, 'Русский «большой рывок»: стопами потомков самураев', '2017-11-17 18:40:50', '15 ноября 2017 года, 18:12, Москва, Ленинградский вокзал. До отправления скоростной электрички «Ласточка» на Тверь остается еще целых 20 минут, а все места в ней уже заняты. Появление этих красивых и скоростных поездов буквально за несколько лет сильно изменило жизнь целых городов и районов Подмосковья. А по-другому и быть не могло.\r\n\r\nКлин — Москва и обратно: экономика должна быть экономной\r\n\r\nНачну я свой рассказ с петиции. Жители городов Клина и Солнечногорска Московской области требуют увеличить число скоростных электричек. Они готовы платить за комфорт, лишь бы власти обеспечили им возможность ездить регулярно в Москву…', '2017-11-20 18:20:00', '', '', 'news'),
(2, 'Здесь инки не приставали', '2017-11-20 18:51:43', 'Остров Пасхи, или Рапануи, — один из самых уединенных участков суши на планете. Трудно найти на карте более глухое место — больше трех с половиной тысяч километров до американского континента и две с лишним тысячи километров до ближайшей обитаемой суши, крошечного островка Питкерн, населенного потомками горемычных мятежников с «Баунти».\r\n\r\nСегодня остров Пасхи принадлежит Республике Чили и 40% его населения — чилийцы, но 60% — коренные островитяне, рапануйцы, предки которых жили на острове еще с доколумбовых времен.', '2017-11-15 07:21:00', 'Здесь инки не приставали', 'Здесь инки не приставали', 'news');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
