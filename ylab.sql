-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2018 г., 04:38
-- Версия сервера: 5.7.20-log
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ylab`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 2),
(19, '2018_12_22_142152_create_tasks_table', 3),
(20, '2018_12_22_142217_create_statuses_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `color`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'In progress', '#ff0000', 1, '2018-12-22 18:55:00', '2018-12-22 18:55:00'),
(2, 'Completed', '#00ff00', 2, '2018-12-22 18:55:14', '2018-12-22 18:55:14'),
(3, 'Ignored', '#0080ff', 3, '2018-12-22 18:55:37', '2018-12-22 18:55:37');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `end_date`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Wake up every day at 6:00', 'As the clocks go back and days get shorter, it can be hard to get out of bed. But, from dawn simulators to a regular wakeup time, here are 16 ways to start the day well\r\nDo you wake up to the sound of birdsong or an electronic ringtone? Perhaps you use a dawn simulator or an app that won’t stop beeping until you have walked at least 100 paces. It is increasingly unlikely that you groggily grope for the stop button on a traditional alarm clock. According to John Lewis, alarm clock sales are down 16% on 2017. Instead, many people are relying on phone alarms or dawn simulators, which claim to more gently rouse you from slumber. Now the clocks have gone back and the days are shortening, it may seem harder than ever to get out of bed. So, what is the best way to wake up?\r\n\r\nIs it a good idea to use your mobile phone as an alarm clock?\r\nThere is nothing wrong with using your phone alarm – unless its other functions are interfering with your sleep. Several studies have indicated that greater phone use, particularly in the run-up to bedtime, results in worse quality sleep. The main reason is the light from screens altering the timing of the brain’s master clock, a cluster of cells that dictates the timing of all the other biological clocks in the body. Exposure to bright or blue-enriched light at night shifts its timing later, which means we feel tired later and our bodies are still in sleep mode when it is time to get up in the morning. Light also has a direct alerting effect on the brain, which makes it harder to fall asleep.\r\n\r\nIf you do sleep with your phone, set it to night mode to filter out blue light and adjust the brightness setting to dim. Nick Littlehales, an elite sports sleep coach and the author of the book Sleep, says you should also switch it to silent and rest it on a soft surface to dampen any vibrations from incoming alerts.', '2019-01-31', 1, '2018-12-22 18:56:57', '2018-12-22 18:56:57'),
(2, 'Brush teeth 2 times every day', 'Brushing your teeth is an important part of your dental care routine. For a healthy mouth and smile the ADA recommends you:\r\n\r\nBrush your teeth twice a day with a soft-bristled brush. The size and shape of your brush should fit your mouth allowing you to reach all areas easily.\r\nReplace your toothbrush every three or four months, or sooner if the bristles are frayed. A worn toothbrush won’t do a good job of cleaning your teeth.\r\nMake sure to use an ADA-accepted fluoride toothpaste.\r\nThe proper brushing technique is to:\r\nPlace your toothbrush at a 45-degree angle to the gums. \r\nGently move the brush back and forth in short (tooth-wide) strokes. \r\nBrush the outer surfaces, the inner surfaces, and the chewing surfaces of the teeth.\r\nTo clean the inside surfaces of the front teeth, tilt the brush vertically and make several up-and-down strokes.', '2019-01-15', 1, '2018-12-22 18:58:21', '2018-12-22 18:58:21'),
(3, 'Hard work!!!', 'I believe that hard work is the key to success. To succeed in life one must endure the challenges life presents and work to overcome these challenges to be the best possible person that one can be. We must not only use hard work to impress those around us but also to achieve goals that we set for ourselves. If we as individuals do not work hard to succeed, then we do not receive the same satisfaction as we would if we put in hour upon hour or even year upon year of work to achieve our goals. I believe for one to be successful, he must be willing to work hard to succeed in any aspect of life.\r\n\r\nHours of hard work and training are the key to success. Michael Phelps, known as the greatest Olympian of all time is the epitome of hard work. Phelps started swimming at the age of seven. Every time Phelps competes his times drop and new world records are set. This is not just a coincidence but a result of hours of hard work and dedication. Phelps trains 365 days a year with two sessions on over forty percent of those days. When all other swimmers are in bed or packing up to go home, Phelps is still in the pool mastering the art of swimming. This kind of dedication and training is why Michael Phelps is not only the greatest swimmer but also the greatest Olympian of all time.', '2019-01-22', 3, '2018-12-22 18:59:16', '2018-12-22 18:59:16'),
(4, 'Driving Safety', 'Driving Safety\r\nThe best any adult can do to safeguard teenagers is to make safety a way of life and to instill in their sons and daughters respect for firearms, motor vehicles and other potential hazards. Then they have to trust them to go out into the world and observe the same standards practiced at home.', '2018-12-23', 2, '2018-12-22 19:00:03', '2018-12-22 19:00:03');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'admin@gmail.com', NULL, '$2y$10$bojoA5uMpDpzsT3oaCKQLeT0OvnRqSn7IG9yJgkYVxaWvR9t4dd8y', NULL, '2018-12-22 18:54:31', '2018-12-22 18:54:31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
