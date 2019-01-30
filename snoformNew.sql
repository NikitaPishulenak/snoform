-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2019 г., 14:20
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `snoformNew`
--

-- --------------------------------------------------------

--
-- Структура таблицы `academicRanks`
--

CREATE TABLE `academicRanks` (
  `id_academicRanks` int(10) NOT NULL,
  `name_academicRanks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `academicRanks`
--

INSERT INTO `academicRanks` (`id_academicRanks`, `name_academicRanks`) VALUES
(1, 'Академик'),
(2, 'Член-корреспондент'),
(3, 'Профессор'),
(4, 'Доцент'),
(5, 'Главный научный сотрудник'),
(6, 'Ведущий научный сотрудник'),
(7, 'Старший научный сотрудник'),
(8, 'Научный сотрудник'),
(9, 'Младший научный сотрудник'),
(10, 'Academician'),
(11, 'Corresponding member'),
(12, 'Professor'),
(13, 'Associate Professor'),
(14, 'Chief Researcher'),
(15, 'Leading Researcher'),
(16, 'Senior Researcher'),
(17, 'Researcher'),
(18, 'Junior Researcher'),
(19, 'Отсутствует');

-- --------------------------------------------------------

--
-- Структура таблицы `contentsReport`
--

CREATE TABLE `contentsReport` (
  `id_contentsReport` int(10) NOT NULL,
  `name_contentsReport` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contentsReport`
--

INSERT INTO `contentsReport` (`id_contentsReport`, `name_contentsReport`) VALUES
(1, 'Содержит собственные результаты исследования'),
(2, 'Реферативный доклад');

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id_course` int(10) NOT NULL,
  `name_course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id_course`, `name_course`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, 'Не студент (Not Student)');

-- --------------------------------------------------------

--
-- Структура таблицы `faculties`
--

CREATE TABLE `faculties` (
  `id_faculti` int(10) NOT NULL,
  `name_faculti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faculties`
--

INSERT INTO `faculties` (`id_faculti`, `name_faculti`) VALUES
(1, 'Лечебный (General Medicine)'),
(2, 'Педиатрический (Pediatrics)'),
(3, 'Стоматологический (Dentisty)'),
(4, 'Медико-профилактический (Preventive Medicine)'),
(5, 'Военно-медицинский (Military Medicine)'),
(6, 'Фармацевтический (Pharmacy)'),
(7, 'Медицинский факультет иностранных учащихся (Medical Faculty for International Students)'),
(8, '-Нет/No-');

-- --------------------------------------------------------

--
-- Структура таблицы `formParticipation`
--

CREATE TABLE `formParticipation` (
  `id_formParticipation` int(10) NOT NULL,
  `name_formParticipation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `formParticipation`
--

INSERT INTO `formParticipation` (`id_formParticipation`, `name_formParticipation`) VALUES
(1, 'Устный доклад + публикация тезисов'),
(2, 'Мультимедия  + публикация тезисов'),
(3, 'Публикация тезисов');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id_language` int(5) NOT NULL,
  `name_language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id_language`, `name_language`) VALUES
(1, 'русский'),
(2, 'English');

-- --------------------------------------------------------

--
-- Структура таблицы `positionSupervisor`
--

CREATE TABLE `positionSupervisor` (
  `id_positionSupervisor` int(10) NOT NULL,
  `name_positionSupervisor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `positionSupervisor`
--

INSERT INTO `positionSupervisor` (`id_positionSupervisor`, `name_positionSupervisor`) VALUES
(1, 'Заведующий кафедрой'),
(2, 'Профессор'),
(3, 'Доцент'),
(4, 'Старший преподаватель'),
(5, 'Преподаватель'),
(6, 'Ассистент'),
(7, 'Аспирант'),
(8, 'Главный научный сотрудник'),
(9, 'Ведущий научный сотрудник'),
(10, 'Старший научный сотрудник'),
(11, 'Научный сотрудник'),
(12, 'Младший научный сотрудник'),
(13, 'Врач'),
(14, 'Главный врач'),
(15, 'Заведующий отделением'),
(16, 'Заведующий лабораторией'),
(17, 'Заведующий отделом'),
(18, 'Ректор'),
(19, 'Проректор'),
(20, 'Заведующий НИЛ'),
(21, 'Директор'),
(22, 'Декан'),
(23, 'Заместитель директора'),
(24, 'Ведущий специалист'),
(25, 'Ординатор');

-- --------------------------------------------------------

--
-- Структура таблицы `reports`
--

CREATE TABLE `reports` (
  `id_report` int(10) NOT NULL,
  `title_report` text NOT NULL,
  `reportFilePDF` varchar(150) NOT NULL,
  `reportFileDOC` varchar(150) NOT NULL,
  `id_sections` int(2) NOT NULL,
  `id_formParticipation` int(1) NOT NULL,
  `id_contentReport` int(1) NOT NULL,
  `fio1` varchar(150) NOT NULL,
  `universityName1` varchar(150) NOT NULL,
  `abbreviatureUniver1` varchar(150) NOT NULL,
  `statusAuthor1` int(2) NOT NULL,
  `facultyName1` int(1) NOT NULL,
  `courseAuthor1` int(1) NOT NULL,
  `emailAuthor1` varchar(50) NOT NULL,
  `telAuthor1` varchar(25) NOT NULL,
  `haveSecondAuthor` int(1) NOT NULL,
  `fio2` varchar(150) DEFAULT NULL,
  `universityName2` varchar(150) DEFAULT NULL,
  `abbreviatureUniver2` varchar(150) DEFAULT NULL,
  `statusAuthor2` int(2) DEFAULT NULL,
  `facultyName2` int(1) DEFAULT NULL,
  `courseAuthor2` int(1) DEFAULT NULL,
  `emailAuthor2` varchar(50) DEFAULT NULL,
  `telAuthor2` varchar(50) DEFAULT NULL,
  `fioSupervisor1` varchar(150) NOT NULL,
  `scientificDegree1` int(2) NOT NULL,
  `academicRanks1` int(2) NOT NULL,
  `positionSupervisor1` int(2) NOT NULL,
  `universityNameSupervisor1` varchar(150) NOT NULL,
  `departmentSupervisor1` varchar(150) NOT NULL,
  `telSupervisor1` varchar(25) DEFAULT NULL,
  `haveSecondSup` int(1) NOT NULL,
  `fioSupervisor2` varchar(150) DEFAULT NULL,
  `scientificDegree2` int(2) DEFAULT NULL,
  `academicRanks2` int(2) DEFAULT NULL,
  `positionSupervisor2` int(2) DEFAULT NULL,
  `universityNameSupervisor2` varchar(150) DEFAULT NULL,
  `departmentSupervisor2` varchar(150) DEFAULT NULL,
  `telSupervisor2` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reports`
--

INSERT INTO `reports` (`id_report`, `title_report`, `reportFilePDF`, `reportFileDOC`, `id_sections`, `id_formParticipation`, `id_contentReport`, `fio1`, `universityName1`, `abbreviatureUniver1`, `statusAuthor1`, `facultyName1`, `courseAuthor1`, `emailAuthor1`, `telAuthor1`, `haveSecondAuthor`, `fio2`, `universityName2`, `abbreviatureUniver2`, `statusAuthor2`, `facultyName2`, `courseAuthor2`, `emailAuthor2`, `telAuthor2`, `fioSupervisor1`, `scientificDegree1`, `academicRanks1`, `positionSupervisor1`, `universityNameSupervisor1`, `departmentSupervisor1`, `telSupervisor1`, `haveSecondSup`, `fioSupervisor2`, `scientificDegree2`, `academicRanks2`, `positionSupervisor2`, `universityNameSupervisor2`, `departmentSupervisor2`, `telSupervisor2`) VALUES
(1, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'fdvf', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'fdvf', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'fdvf', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'fdvf', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'fdvf', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'fdvf', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'asxasx', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'asxasx', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'qwqweq', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'qwqweq', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'цув', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'цув', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'цув', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'цув', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'цув', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'ывсывс', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'ывсывс', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'ывсывс', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'ывсывс', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'ывсывс', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'фычфыч', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'ывсывс', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'qwqweq', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'qwqweq', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'qwqweq', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'вамвам', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'sdcsdc', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'йцыйцы', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'йцыйцы', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'йцыйцы', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'йцыйцы', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'йцыйцы', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'ывасыв', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `scientificDegree`
--

CREATE TABLE `scientificDegree` (
  `id_scientificDegree` int(10) NOT NULL,
  `name_scientificDegree` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `scientificDegree`
--

INSERT INTO `scientificDegree` (`id_scientificDegree`, `name_scientificDegree`) VALUES
(1, 'Кандидат медицинских наук'),
(2, 'PhD'),
(3, 'Доктор медицинских наук'),
(4, 'MD'),
(5, 'Кандидат биологических наук'),
(6, 'Доктор биологических наук'),
(7, 'Кандидат химических наук'),
(8, 'Доктор химических наук'),
(9, 'Кандидат фармацевтических наук'),
(10, 'Доктор фармацевтических наук'),
(11, 'Кандидат технических наук'),
(12, 'Доктор технических наук'),
(13, 'Кандидат филологических наук'),
(14, 'Доктор филологических наук'),
(15, 'Кандидат физико-математических наук'),
(16, 'Доктор физико-математических наук'),
(17, 'Кандидат педагогических наук'),
(18, 'Доктор педагогических наук'),
(19, 'Кандидат исторических наук'),
(20, 'Доктор исторических наук'),
(21, 'Кандидат политических наук'),
(22, 'Доктор политических наук'),
(23, 'Кандидат социологических наук'),
(24, 'Доктор социологических наук'),
(25, 'Кандидат ветеринарных наук'),
(26, 'Доктор ветеринарных наук'),
(27, 'Кандидат философских наук'),
(28, 'Доктор философских наук'),
(29, 'Кандидат юридических наук'),
(30, 'Доктор юридических наук'),
(31, 'Кандидат экономических наук'),
(32, 'Доктор экономических наук'),
(33, 'Кандидат сельскохозяйственных наук'),
(34, 'Доктор сельскохозяйственных наук'),
(35, 'Кандидат военных наук'),
(36, 'Доктор военных наук'),
(37, 'Кандидат психологических наук'),
(38, 'Доктор психологических наук'),
(39, 'Отсутствует');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id_section` int(10) NOT NULL,
  `name_section` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id_section`, `name_section`) VALUES
(1, 'Акушерство и гинекология(Obstetrics and Gynecology)'),
(2, 'Анатомия человека(Human anatomy)'),
(3, 'Анестезиология и реаниматология/Anesthesiology and Reanimatology  '),
(4, 'Биологическая химия/Biological Chemistry'),
(5, 'Биоорганическая химия/Bioorganic Chemistry'),
(6, 'Биотехнологии/Biotechnology'),
(7, 'Болезни уха, горла, носа/Otorhinolaryngology'),
(8, 'Внутренние болезни/Internal Diseases'),
(9, 'Военная эпидемиология и военная гигиена/Military Epidemiology and military hygiene'),
(10, 'Военно-полевая терапия/Military field therapy'),
(11, 'Военно-полевая хирургия/Military surgery'),
(12, 'Гематология/Hematology'),
(13, 'Гигиена детей и подростков/Health of children and teenagers'),
(14, 'Гигиена труда/Occupational health'),
(15, 'Гистология, цитология, эмбриология/Histology, Cytology and Embryology'),
(16, 'Глазные болезни/Ophthalmology'),
(17, 'Дерматовенерология/Dermatology'),
(18, 'Детская хирургия/Pediatric Surgery'),
(19, 'Детские инфекционные болезни/Children’s infectious diseases'),
(20, 'Иностранные языки/Foreign languages'),
(21, 'Инфекционные болезни/Infectious diseases'),
(22, 'История медицины/History of Medicine'),
(23, 'Кардиология/Cardiology'),
(24, 'Клиническая иммунология/Clinical immunology'),
(25, 'Клиническая фармакология/Clinical pharmacology'),
(26, 'Коммунальная стоматология/Communal dentistry'),
(27, 'Латинский язык/Latin'),
(28, 'Лучевая диагностика и лучевая терапия/Radiation diagnostics and radiotherapy'),
(29, 'Медицинская биология и общая генетика/Medical Biology and General Genetics'),
(30, 'Медицинская и биологическая физика/Medical and Biological Physics'),
(31, 'Медицинская реабилитация и физиотерапия/Medical rehabilitation and physiotherapy'),
(32, 'Микробиология, вирусология и иммунология/Microbiology, Virology and Immunology'),
(33, 'Морфология человека/Human Morphology'),
(34, 'Нанобиология/Nanobiology'),
(35, 'Неврология и нейрохирургия/Neurology and Neurosurgery'),
(36, 'Нормальная физиология/Normal Physiology'),
(37, 'Общая гигиена/General hygiene'),
(38, 'Общая стоматология/General Dentistry'),
(39, 'Общая химия и вычислительная биология/General chemistry and computational '),
(40, 'Общая хирургия/General Surgery'),
(41, 'Общественное здоровье и здравоохранение/Public Health and Health Care'),
(42, 'Онкология/Oncology'),
(43, 'Организация медицинского обеспечения войск и экстремальная медицина/Organisation of medical support and  extreme medicine'),
(44, 'Оперативная хирургия и топографическая анатомия/Operative surgery and topographic anatomy'),
(45, 'Организация фармации/Organization of Pharmacy'),
(46, 'Ортодонтия/Orthodontics'),
(47, 'Ортопедическая стоматология/Orthopedic dentistry'),
(48, 'Патологическая анатомия/Pathoanatomy'),
(49, 'Патологическая физиология/Pathological physiology'),
(50, 'Педиатрия/Pediatrics'),
(51, 'Поликлиническая терапия/Outpatient therapy'),
(52, 'Пропедевтика внутренних болезней/Propaedeutics of Internal Diseases'),
(53, 'Пропедевтика детских болезней/Propaedeutics of childhood diseases'),
(54, 'Психиатрия и медицинская психология/Psychiatry and Medical  Psychology'),
(55, 'Радиационная медицина и экология/Radiation Medicine and Ecology'),
(56, 'Сердечно-сосудистая хирургия/Cardiovascular Surgery'),
(57, 'Спортивная медицина/Sports medicine'),
(58, 'Стволовые клетки/Steam Cells'),
(59, 'Стоматология детского возраста/ Pediatric dentistry'),
(60, 'Судебная медицина/Forensic Medicine'),
(61, 'Терапевтическая стоматология/Therapeutic Dentistry'),
(62, 'Травматология и ортопедия/Traumatology and Orthopedics'),
(63, 'Трансплантология/Transplantation'),
(64, 'Урология/Urology'),
(65, 'Фармакология/Pharmacology'),
(66, 'Фармацевтическая ботаника/Pharmaceutical botany'),
(67, 'Фармацевтическая технология и химия/Pharmaceutical Technology and Chemistry'),
(68, 'Филология/Philology'),
(69, 'Философия, политология, социология, биоэтика и история Беларуси/Philosophy, political science, sociology, bioethics and history of Belarus'),
(70, 'Фтизиопульмонология/Phtisiopneumology'),
(71, 'Хирургическая стоматология/Surgical dentistry'),
(72, 'Хирургические болезни/Surgery'),
(73, 'Челюстно-лицевая хирургия/Maxillofacial Surgery'),
(74, 'Эндокринология/Endocrinology'),
(75, 'Эпидемиология/Epidemiology');

-- --------------------------------------------------------

--
-- Структура таблицы `sectionsName`
--

CREATE TABLE `sectionsName` (
  `id_sectionName` int(10) NOT NULL,
  `name_sectionName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sectionsName`
--

INSERT INTO `sectionsName` (`id_sectionName`, `name_sectionName`) VALUES
(1, 'Obstetrics and Gynecology'),
(2, 'Human anatomy'),
(3, 'Anesthesiology and Reanimatology'),
(4, 'Biological Chemistry'),
(5, 'Bioorganic Chemistry'),
(6, 'Biotechnology'),
(7, 'Otorhinolaryngology'),
(8, 'Internal Diseases'),
(9, 'Military Epidemiology and military hygiene'),
(10, 'Military field therapy'),
(11, 'Military surgery'),
(12, 'Hematology'),
(13, 'Health of children and teenagers'),
(14, 'Occupational health'),
(15, 'Histology, Cytology and Embryology'),
(16, 'Ophthalmology'),
(17, 'Dermatology'),
(18, 'Pediatric Surgery'),
(19, 'Childrens infectious diseases'),
(20, 'Foreign languages'),
(21, 'Infectious diseases'),
(22, 'History of Medicine'),
(23, 'Cardiology'),
(24, 'Clinical immunology'),
(25, 'Clinical pharmacology'),
(26, 'Communal dentistry'),
(27, 'Latin'),
(28, 'Radiation diagnostics and radiotherapy'),
(29, 'Medical Biology and General Genetics'),
(30, 'Medical and Biological Physics'),
(31, 'Medical rehabilitation and physiotherapy'),
(32, 'Microbiology, Virology and Immunology'),
(33, 'Human Morphology'),
(34, 'Nanobiology'),
(35, 'Neurology and Neurosurgery'),
(36, 'Normal Physiology'),
(37, 'General hygiene'),
(38, 'General Dentistry'),
(39, 'General chemistry and computational biology'),
(40, 'General Surgery'),
(41, 'Public Health and Health Care'),
(42, 'Oncology'),
(43, 'Organisation of medical support and  extreme medicine'),
(44, 'Operative surgery and topographic anatomy'),
(45, 'Organization of Pharmacy'),
(46, 'Orthodontics'),
(47, 'Orthopedic dentistry'),
(48, 'Pathoanatomy'),
(49, 'Pathological physiology'),
(50, 'Pediatrics'),
(51, 'Outpatient therapy'),
(52, 'Propaedeutics of Internal Diseases'),
(53, 'Propaedeutics of childhood diseases'),
(54, 'Psychiatry and Medical  Psychology'),
(55, 'Radiation Medicine and Ecology'),
(56, 'Cardiovascular Surgery'),
(57, 'Sports medicine'),
(58, 'Steam Cells'),
(59, 'Pediatric dentistry'),
(60, 'Forensic Medicine'),
(61, 'Therapeutic Dentistry'),
(62, 'Traumatology and Orthopedics'),
(63, 'Transplantation'),
(64, 'Urology'),
(65, 'Pharmacology'),
(66, 'Pharmaceutical botany'),
(67, 'Pharmaceutical Technology and Chemistry'),
(68, 'Philology'),
(69, 'Philosophy, political science, sociology, bioethics and history of Belarus'),
(70, 'Phtisiopneumology'),
(71, 'Surgical dentistry'),
(72, 'Surgery'),
(73, 'Maxillofacial Surgery'),
(74, 'Endocrinology'),
(75, 'Epidemiology');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id_status` int(10) NOT NULL,
  `name_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id_status`, `name_status`) VALUES
(1, 'Студент (Student)'),
(2, 'Интерн (Intern)'),
(3, 'Клинический ординатор (Clinical resident)'),
(4, 'Магистрант (Masster)'),
(5, 'Аспирант (Postgraduate)'),
(6, 'Докторант (Doctoral Student)'),
(7, 'Ассистент (Assistant)'),
(8, 'Младший научный сотрудник (Junior Researcher)'),
(9, 'Научный сотрудник (Researcher)'),
(10, 'Старший научный сотрудник (Senior Researcher)'),
(11, 'Ведущий научный сотрудник (Leading Researcher)'),
(12, 'Главный научный сотрудник (Chief Researcher)'),
(13, 'Доцент (PhD)'),
(14, 'Профессор (Professor)'),
(15, 'Старший преподаватель (Senior Lecturer)'),
(16, 'Преподаватель (Lecturer)');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dtReg` datetime NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `dtReg`, `role`) VALUES
(3, 'alex@mail.com', '111111', '0000-00-00 00:00:00', ''),
(4, 'b', '96e79218965eb72c92a549dd5a330112', '0000-00-00 00:00:00', 'admin'),
(5, 'serg@mail.com', '111111', '0000-00-00 00:00:00', ''),
(6, 'niki1995-11@mail.ru', '96e79218965eb72c92a549dd5a330112', '0000-00-00 00:00:00', 'admin'),
(7, 'anapi@mail.ru', '96e79218965eb72c92a549dd5a330112', '0000-00-00 00:00:00', ''),
(8, 'niki1995111@mail.ru', 'e3ceb5881a0a1fdaad01296d7554868d', '2019-01-28 15:08:08', ''),
(9, 'niki19-11@mail.ru', 'e2668ad11caaac738b0d4ff66041037e', '2019-01-28 15:41:50', ''),
(10, 'niki11@mail.ru', '149deb1e69382ffe10cc9b98f626642a', '2019-01-28 15:47:33', ''),
(11, 'niki1995-11@mail.ru4', 'd370e1ba9b9dd59c694bd12907e59552', '2019-01-28 16:19:25', ''),
(12, 'niki1995-11@mail.ru1', '96e79218965eb72c92a549dd5a330112', '2019-01-28 16:20:14', ''),
(13, 'alex@mail.ru', '96e79218965eb72c92a549dd5a330112', '2019-01-28 16:39:06', ''),
(14, 'alex1@mail.ru', '96e79218965eb72c92a549dd5a330112', '2019-01-28 16:40:16', ''),
(15, 'a@a.a', '96e79218965eb72c92a549dd5a330112', '2019-01-28 16:45:00', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `academicRanks`
--
ALTER TABLE `academicRanks`
  ADD PRIMARY KEY (`id_academicRanks`);

--
-- Индексы таблицы `contentsReport`
--
ALTER TABLE `contentsReport`
  ADD PRIMARY KEY (`id_contentsReport`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Индексы таблицы `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id_faculti`);

--
-- Индексы таблицы `formParticipation`
--
ALTER TABLE `formParticipation`
  ADD PRIMARY KEY (`id_formParticipation`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id_language`);

--
-- Индексы таблицы `positionSupervisor`
--
ALTER TABLE `positionSupervisor`
  ADD PRIMARY KEY (`id_positionSupervisor`);

--
-- Индексы таблицы `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `id_contentReport` (`id_contentReport`),
  ADD KEY `id_formParticipation` (`id_formParticipation`),
  ADD KEY `id_sections` (`id_sections`);

--
-- Индексы таблицы `scientificDegree`
--
ALTER TABLE `scientificDegree`
  ADD PRIMARY KEY (`id_scientificDegree`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id_section`);

--
-- Индексы таблицы `sectionsName`
--
ALTER TABLE `sectionsName`
  ADD PRIMARY KEY (`id_sectionName`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `academicRanks`
--
ALTER TABLE `academicRanks`
  MODIFY `id_academicRanks` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `contentsReport`
--
ALTER TABLE `contentsReport`
  MODIFY `id_contentsReport` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id_faculti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `formParticipation`
--
ALTER TABLE `formParticipation`
  MODIFY `id_formParticipation` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id_language` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `positionSupervisor`
--
ALTER TABLE `positionSupervisor`
  MODIFY `id_positionSupervisor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT для таблицы `scientificDegree`
--
ALTER TABLE `scientificDegree`
  MODIFY `id_scientificDegree` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id_section` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `sectionsName`
--
ALTER TABLE `sectionsName`
  MODIFY `id_sectionName` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
