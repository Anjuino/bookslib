-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 14 2023 г., 03:46
-- Версия сервера: 5.7.24
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--
CREATE DATABASE IF NOT EXISTS `books` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `books`;

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `ID` int(11) NOT NULL,
  `FIO` varchar(100) NOT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `City` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`ID`, `FIO`, `Date_of_Birth`, `City`) VALUES
(1, 'Демьян Бедный', '1994-09-01', 'Barnaul'),
(2, 'Март', '1983-09-13', 'Нагорск'),
(3, 'Зубенко Михаил Петрович', '1994-10-07', 'Шумиловский городок'),
(9, 'Попова Елена', '2023-09-18', 'Барнаул');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Type` enum('digital edition','graphic edition','printed edition') NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Date_publish` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`ID`, `Name`, `Genre`, `Type`, `Author`, `Date_publish`) VALUES
(3, 'Эзоп', 'Наука', 'printed edition', 'Демьян Бедный', '2023-04-12'),
(15, 'Вселенская любовь', 'Poem', 'graphic edition', 'Попова Елена', '2023-09-12'),
(16, 'Космическая любовь', 'Роман', 'printed edition', 'Попова Елена', '2023-09-25'),
(20, 'Сома Посуди', 'Мистика', 'graphic edition', 'Зубенко Михаил Петрович', '2023-07-04'),
(21, 'Галактическая любовь', 'Роман', 'printed edition', 'Попова Елена', '2023-09-11'),
(22, 'JezalLuthar', 'Мистика', 'digital edition', 'Март', '2023-09-14'),
(23, 'Температура', 'Ужас', 'digital edition', 'Март', '2022-05-04');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`ID`, `Name`) VALUES
(69, 'Poem'),
(67, 'Война'),
(70, 'Мистика'),
(4, 'Наука'),
(71, 'Роман'),
(72, 'Ужас');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`FIO`) USING BTREE;

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `Author` (`Author`) USING BTREE,
  ADD KEY `Genre` (`Genre`) USING BTREE;

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`Author`) REFERENCES `author` (`FIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`Genre`) REFERENCES `genre` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
