-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2023 г., 20:46
-- Версия сервера: 10.3.34-MariaDB
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dionis_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `fullname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `actor`
--

INSERT INTO `actor` (`id`, `fullname`, `image`, `description`) VALUES
(1, 'Сидорова Виктория Сергеевна', 'actor_1.png', 'Для современного мира укрепление и развитие внутренней структуры не даёт нам иного выбора, кроме определения существующих финансовых и административных условий.'),
(2, 'Суханова Ксения Фёдоровна', 'actor_2.png', 'Прежде всего, реализация намеченных плановых заданий выявляет срочную потребность укрепления моральных ценностей.'),
(3, 'Орлова Кристина Ивановна', 'actor_3.png', 'Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности, а также свежий взгляд на привычные вещи — безусловно открывает новые горизонты для вывода текущих активов.'),
(4, 'Назарова Елизавета Матвеевна', 'actor_4.png', 'Равным образом, экономическая повестка сегодняшнего дня играет определяющее значение для новых предложений.'),
(5, 'Быков Даниил Адамович', 'actor_5.png', 'Сложно сказать, почему действия представителей оппозиции представлены в исключительно положительном свете.'),
(6, 'Зотова Арина Дмитриевна', 'actor_6.png', 'Каждый из нас понимает очевидную вещь: глубокий уровень погружения однозначно фиксирует необходимость анализа существующих паттернов поведения.'),
(7, 'Мещеряков Фёдор Демидович', 'actor_7.png', 'Каждый из нас понимает очевидную вещь: начало повседневной работы по формированию позиции однозначно фиксирует необходимость позиций, занимаемых участниками в отношении поставленных задач!'),
(8, 'Щукина Вера Романовна', 'actor_8.png', 'Каждый из нас понимает очевидную вещь: убеждённость некоторых оппонентов требует от нас анализа направлений прогрессивного развития.');

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`id`, `event_id`, `actor_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 3, 7),
(10, 3, 3),
(11, 4, 6),
(12, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `age`
--

CREATE TABLE `age` (
  `id` int(11) NOT NULL,
  `age` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `age`
--

INSERT INTO `age` (`id`, `age`) VALUES
(1, '0+'),
(2, '6+'),
(3, '12+'),
(4, '16+'),
(5, '18+');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_id` int(11) NOT NULL,
  `duration` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idea` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp(),
  `style_id` int(11) NOT NULL,
  `count_of_tickets` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `author`, `director`, `age_id`, `duration`, `idea`, `street`, `start`, `style_id`, `count_of_tickets`, `price`) VALUES
(1, 'Вдох-выдох', '﻿﻿﻿﻿﻿﻿«Привет! Меня зовут Лиза! Я обычная девчонка из города Черноморска, подписывайтесь на мой канал... Если вам интересно, то ставьте на 720 hd и поехали!»\n\nЧто они там говорят наши дети?!  Чем живут?! Какими крутыми идеями одержимы?! А может, «они сами строят свою планету.  Но опыта у них мало. И они всё запутывают…»\nКак часто мы, взрослые, глядя на подростков, увешанных гаджетами и не слышащими нас, обижаемся на них и не понимаем.\nНо мы должны быть с ними рядом, пока не стало поздно… ', '1v7a7374.jpg', 'Юлия Тупикина', 'Денис Хуснияров', 1, '1 час 10 мин.', 'Юлия Тупикина', 'Дворец культуры машиностроителей, К. Маркса, 70', '2023-12-07 08:00:00', 1, 144, 499),
(2, 'Экскурсия Театр и закулисье', 'Если вы хотите услышать замечательную историю о нашем театре и попутешествовать в храме Мельпомены, заглянуть в гримёрные артистов и в театральные цеха, мы ждём вас на экскурсию «Театр и закулисье».', '5nnyda9hnii.jpg', 'Татьяна Масленникова', 'Татьяна Масленникова', 1, '40 мин.', 'Татьяна Масленникова', 'ул. Гоголя, 58', '2023-12-07 10:00:00', 2, 144, 699),
(3, 'Щелкунчик', 'Таким образом, высококачественный прототип будущего проекта говорит о возможностях глубокомысленных рассуждений. С другой стороны, консультация с широким активом создаёт предпосылки для первоочередных требований. Значимость этих проблем настолько очевидна, что высокотехнологичная концепция общественного уклада создаёт предпосылки для существующих финансовых и административных условий.\r\n\r\nЛишь диаграммы связей и по сей день остаются уделом либералов, которые жаждут быть заблокированы в рамках своих собственных рациональных ограничений. Равным образом, базовый вектор развития требует анализа глубокомысленных рассуждений. И нет сомнений, что многие известные личности призваны к ответу. Лишь некоторые особенности внутренней политики преданы социально-демократической анафеме. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности, а также свежий взгляд на привычные вещи — безусловно открывает новые горизонты для анализа существующих паттернов поведения. Безусловно, высокое качество позиционных исследований является качественно новой ступенью экспериментов, поражающих по своей масштабности и грандиозности.\r\n\r\nВнезапно, реплицированные с зарубежных источников, современные исследования призывают нас к новым свершениям, которые, в свою очередь, должны быть объявлены нарушающими общечеловеческие нормы этики и морали. В частности, перспективное планирование, а также свежий взгляд на привычные вещи — безусловно открывает новые горизонты для системы массового участия. В частности, новая модель организационной деятельности не оставляет шанса для переосмысления внешнеэкономических политик. Разнообразный и богатый опыт говорит нам, что высокотехнологичная концепция общественного уклада не оставляет шанса для дальнейших направлений развития. Не следует, однако, забывать, что убеждённость некоторых оппонентов способствует повышению качества дальнейших направлений развития.', 'ab79cfo_j24_0.jpg', 'Ситникова Алисия Евгеньевна', 'Копылова Ева Артёмовна', 1, '0 час 45 мин.', 'Васильева Екатерина Дмитриевна', '0', '2023-12-16 13:00:00', 1, 144, 200),
(4, 'Щелкунчик', 'А ещё непосредственные участники технического прогресса формируют глобальную экономическую сеть и при этом — функционально разнесены на независимые элементы. Сложно сказать, почему сторонники тоталитаризма в науке неоднозначны и будут разоблачены. Имеется спорная точка зрения, гласящая примерно следующее: тщательные исследования конкурентов освещают чрезвычайно интересные особенности картины в целом, однако конкретные выводы, разумеется, объединены в целые кластеры себе подобных. Равным образом, современная методология разработки не оставляет шанса для модели развития.\r\n\r\nИдейные соображения высшего порядка, а также экономическая повестка сегодняшнего дня является качественно новой ступенью новых предложений. Не следует, однако, забывать, что разбавленное изрядной долей эмпатии, рациональное мышление прекрасно подходит для реализации поэтапного и последовательного развития общества. Современные технологии достигли такого уровня, что новая модель организационной деятельности однозначно определяет каждого участника как способного принимать собственные решения касаемо приоретизации разума над эмоциями. А ещё ключевые особенности структуры проекта формируют глобальную экономическую сеть и при этом — рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок.\r\n\r\nПовседневная практика показывает, что разбавленное изрядной долей эмпатии, рациональное мышление обеспечивает актуальность экспериментов, поражающих по своей масштабности и грандиозности. Безусловно, высококачественный прототип будущего проекта играет определяющее значение для приоретизации разума над эмоциями.', '1v7a7336.jpg', 'Ситникова Алисия Евгеньевна', 'Копылова Ева Артёмовна', 4, '0 час 45 мин.', 'Васильева Екатерина Дмитриевна', '0', '2023-12-16 13:00:00', 1, 144, 200);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `event_id`, `image`, `author`) VALUES
(1, 1, '1v7a7336.jpg', 'Постовалова Ирина Павловна'),
(2, 1, '1v7a7380.jpg', 'Постовалова Ирина Павловна'),
(3, 1, '1v7a7404.jpg', 'Постовалова Ирина Павловна'),
(4, 1, '1v7a7511.jpg', 'Постовалова Ирина Павловна'),
(5, 1, '1v7a7587.jpg', 'Постовалова Ирина Павловна'),
(6, 3, '1v7a7511.jpg', 'Постовалова Ирина Павловна'),
(8, 4, '5rlmdR3qsNw.jpg', 'Постовалова Ирина Павловна'),
(9, 4, '8RXEODB4o7I.jpg', 'Постовалова Ирина Павловна'),
(10, 4, '5rlmdR3qsNw.jpg', 'Постовалова Ирина Павловна'),
(12, 4, 'V7VR-1Ap7tw.jpg', 'Постовалова Ирина Павловна');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `message`, `sender`, `recipient`) VALUES
(1, 'text', 'dvs54pqttg41knagh2k0jfk1kbccsgji', 'sk8pdrtn4b3sfpfhv99ntbj5qt0a2pkd'),
(2, 'hello', 'sk8pdrtn4b3sfpfhv99ntbj5qt0a2pkd', 'dvs54pqttg41knagh2k0jfk1kbccsgji'),
(3, 'test', 'doe3hehn3rp7m90v4ppij0oe163ba6kc', 'doe3hehn3rp7m90v4ppij0oe163ba6kc'),
(4, '123', 'doe3hehn3rp7m90v4ppij0oe163ba6kc', 'doe3hehn3rp7m90v4ppij0oe163ba6kc');

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `name`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5'),
(6, 'A6'),
(7, 'B1'),
(8, 'B2'),
(9, 'B3'),
(10, 'B4'),
(11, 'B5'),
(12, 'B6'),
(13, 'C1'),
(14, 'C2'),
(15, 'C3'),
(16, 'C4'),
(17, 'C5'),
(18, 'C6'),
(19, 'D1'),
(20, 'D2'),
(21, 'D3'),
(22, 'D4'),
(23, 'D5'),
(24, 'D6'),
(25, 'E1'),
(26, 'E2'),
(27, 'E3'),
(28, 'E4'),
(29, 'E5'),
(30, 'E6'),
(31, 'F1'),
(32, 'F2'),
(33, 'F3'),
(34, 'F4'),
(35, 'F5'),
(36, 'F6'),
(37, 'G1'),
(38, 'G2'),
(39, 'G3'),
(40, 'G4'),
(41, 'G5'),
(42, 'G6'),
(43, 'H1'),
(44, 'H2'),
(45, 'H3'),
(46, 'H4'),
(47, 'H5'),
(48, 'H6'),
(49, 'A7'),
(50, 'A8'),
(51, 'A9'),
(52, 'A10'),
(53, 'A11'),
(54, 'A12'),
(55, 'B7'),
(56, 'B8'),
(57, 'B9'),
(58, 'B10'),
(59, 'B11'),
(60, 'B12'),
(61, 'C7'),
(62, 'C8'),
(63, 'C9'),
(64, 'C10'),
(65, 'C11'),
(66, 'C12'),
(67, 'D7'),
(68, 'D8'),
(69, 'D9'),
(70, 'D10'),
(71, 'D11'),
(72, 'D12'),
(73, 'E7'),
(74, 'E8'),
(75, 'E9'),
(76, 'E10'),
(77, 'E11'),
(78, 'E12'),
(79, 'F7'),
(80, 'F8'),
(81, 'F9'),
(82, 'F10'),
(83, 'F11'),
(84, 'F12'),
(85, 'G7'),
(86, 'G8'),
(87, 'G9'),
(88, 'G10'),
(89, 'G11'),
(90, 'G12'),
(91, 'H7'),
(92, 'H8'),
(93, 'H9'),
(94, 'H10'),
(95, 'H11'),
(96, 'H12'),
(97, 'A13'),
(98, 'A14'),
(99, 'A15'),
(100, 'A16'),
(101, 'A17'),
(102, 'A18'),
(103, 'B13'),
(104, 'B14'),
(105, 'B15'),
(106, 'B16'),
(107, 'B17'),
(108, 'B18'),
(109, 'C13'),
(110, 'C14'),
(111, 'C15'),
(112, 'C16'),
(113, 'C17'),
(114, 'C18'),
(115, 'D13'),
(116, 'D14'),
(117, 'D15'),
(118, 'D16'),
(119, 'D17'),
(120, 'D18'),
(121, 'E13'),
(122, 'E14'),
(123, 'E15'),
(124, 'E16'),
(125, 'E17'),
(126, 'E18'),
(127, 'F13'),
(128, 'F14'),
(129, 'F15'),
(130, 'F16'),
(131, 'F17'),
(132, 'F18'),
(133, 'G13'),
(134, 'G14'),
(135, 'G15'),
(136, 'G16'),
(137, 'G17'),
(138, 'G18'),
(139, 'H13'),
(140, 'H14'),
(141, 'H15'),
(142, 'H16'),
(143, 'H17'),
(144, 'H18');

-- --------------------------------------------------------

--
-- Структура таблицы `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `style`
--

INSERT INTO `style` (`id`, `name`) VALUES
(1, 'Драма'),
(2, 'Комедия');

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `begin` timestamp NULL DEFAULT NULL,
  `place_id` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `phone_number` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `event_id`, `begin`, `place_id`, `price`, `phone_number`) VALUES
(18, 1, '2023-12-07 08:00:00', '4,5,6', 1497, '+7 (919) 591-88-71');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) DEFAULT 1,
  `ban` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `full_name`, `email`, `phone_number`, `password`, `role`, `ban`) VALUES
(5, 'admin', 'Александр Николаев Евгеньевич', 'sasanikolaev392@gmail.com', '+7 (919) 591-88-71', '$2y$13$Nin2ggjQMbxH.BhqePsZyO2GhaiyK705wPKAKiWCyltFGrlLEfDAy', 2, 0),
(8, 'admin_1', 'none', '', '+7 (919) 584-21-65', '$2y$13$n/xs6ktffPpi9OKw4wdTAecH1tElmPZx4VvI1ag3hYHAPdfyoOHgS', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Индексы таблицы `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `style_id` (`style_id`),
  ADD KEY `age_id` (`age_id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `age`
--
ALTER TABLE `age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT для таблицы `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `actors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`age_id`) REFERENCES `age` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
