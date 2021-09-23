-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 22 2021 г., 12:08
-- Версия сервера: 5.6.51
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `karma_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_count`, `prod_id`, `date`, `status_id`) VALUES
(70, 17, 1, 20, '2021-09-20 19:28:53', 2),
(74, 17, 1, 21, '2021-09-20 19:36:41', 4),
(75, 17, 2, 20, '2021-09-21 10:36:15', 4),
(76, 17, 1, 21, '2021-09-21 13:10:14', 4),
(77, 17, 1, 21, '2021-09-21 13:10:14', 4),
(78, 17, 2, 22, '2021-09-21 13:16:25', 4),
(79, 17, 2, 22, '2021-09-22 11:52:36', 4),
(80, 17, 10, 20, '2021-09-22 11:52:36', 4),
(81, 17, 4, 21, '2021-09-22 11:52:36', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_top` int(1) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `coming_soon` int(1) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `Weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `is_top`, `description`, `image`, `coming_soon`, `width`, `height`, `depth`, `Weight`) VALUES
(20, 'prod 5', 123, 1, 'dsv xcdVDFZ ', '_img_614232cc9d588.png', 1, 145, 14, 19, 0),
(21, 'prod 1', 123, 1, 'dsv xcdVDFZ ', '_img_614232cc9d588.png', 1, 145, 14, 19, 0),
(22, 'prod 3', 150, 1, 'ujex vorakov mayka shoqin beamt hov, crtin brsamt taq, veshni ketot u modni qrqrac', '_img_61433aca538e5.jpg', 0, 1516, 162, 16, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'deleted'),
(2, 'sent'),
(3, 'delivered'),
(4, 'in process');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `country`) VALUES
(17, 'User1', '$2y$10$pVoxLaUnQdQ4wBfn2komBOeUrqW0OElbeUfE3Fg5/XlP2k6HYVXY2', 'USA'),
(19, 'Root', '$2y$10$pj4fpf69uxG83trMrhuGxOCBA3.9oYXUVf54jcLIcVVQHwz.htjdm', ''),
(21, 'User2', '$2y$10$NVzqSh7SJ7xtGYu8f5MYfeW7HLLjHaQO5L.t2Xs5ZwZLJkZ4DlB4m', 'USA');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
