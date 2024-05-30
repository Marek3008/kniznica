-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 30.Máj 2024, 20:52
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `kniznica`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `citatel`
--

CREATE TABLE `citatel` (
  `id` int(11) NOT NULL,
  `meno` varchar(15) DEFAULT NULL,
  `priezvisko` varchar(15) DEFAULT NULL,
  `telefonne_cislo` varchar(18) DEFAULT NULL,
  `datum_narodenia` date DEFAULT NULL,
  `adresa` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `citatel`
--

INSERT INTO `citatel` (`id`, `meno`, `priezvisko`, `telefonne_cislo`, `datum_narodenia`, `adresa`) VALUES
(2, 'Jaro', 'Bugr', '+421907444444', '2006-05-05', 'zilina'),
(3, 'Timko', 'Dolník', '0907111111111', '2005-11-17', 'Kunderland'),
(4, 'Adam', 'Ladňák', '+421222222222', '2006-04-25', 'krasno');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kniha`
--

CREATE TABLE `kniha` (
  `isbn` bigint(20) NOT NULL,
  `nazov` varchar(50) DEFAULT NULL,
  `autor` varchar(30) DEFAULT NULL,
  `rok_vydania` int(4) DEFAULT NULL,
  `zaner` varchar(20) DEFAULT NULL,
  `stav` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `kniha`
--

INSERT INTO `kniha` (`isbn`, `nazov`, `autor`, `rok_vydania`, `zaner`, `stav`) VALUES
(1111111111111, 'Six of Crows', 'Leigh Bardugo', 2016, 'Fantasy', 1),
(9784456728019, 'Harry Potter', 'J. K.', 2006, 'Mysteriozny', 1),
(9785432167890, 'Vojna a mier', 'Tolstoj', 1950, 'historicky', 1),
(9789988776654, 'Som Baťa', 'Jozef Banáš', 2023, 'autobiografia', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `pokuta`
--

CREATE TABLE `pokuta` (
  `id` int(11) NOT NULL,
  `vypozicka_id` int(11) NOT NULL,
  `ciastka` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Test User', 'test@example.com', '2024-05-26 14:01:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lllOq253LWaySSosuNs2R75JplAhdyxJkXv8e4i0rmjfda0xZeOjurIewRIv', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(12, 'Marek Baňas', 'banasmre@gmail.com', NULL, '$2y$10$1jjlq6RfLO.EmOE6Haf3uuHoRek5IGR2EYXH6Lo2pHzQrb9EH5kDW', NULL, '2024-05-29 13:01:56', '2024-05-29 13:01:56');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `vypozicka`
--

CREATE TABLE `vypozicka` (
  `id` int(11) NOT NULL,
  `kniha` bigint(20) NOT NULL,
  `citatel_id` int(11) NOT NULL,
  `odhadovany_datum_vratenia` date DEFAULT NULL,
  `datum_vypozicky` date DEFAULT NULL,
  `datum_vratenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `vypozicka`
--

INSERT INTO `vypozicka` (`id`, `kniha`, `citatel_id`, `odhadovany_datum_vratenia`, `datum_vypozicky`, `datum_vratenia`) VALUES
(3, 1111111111111, 2, '2024-06-19', '2024-05-29', '2024-05-29'),
(12, 9784456728019, 3, '2024-06-20', '2024-05-30', '2024-05-30'),
(13, 9785432167890, 4, '2024-06-20', '2024-05-30', '2024-05-30');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `citatel`
--
ALTER TABLE `citatel`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `kniha`
--
ALTER TABLE `kniha`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexy pre tabuľku `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vypozicka_id` (`vypozicka_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexy pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kniha` (`kniha`),
  ADD KEY `citatel_id` (`citatel_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `citatel`
--
ALTER TABLE `citatel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  ADD CONSTRAINT `pokuta_ibfk_1` FOREIGN KEY (`vypozicka_id`) REFERENCES `vypozicka` (`id`);

--
-- Obmedzenie pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  ADD CONSTRAINT `vypozicka_ibfk_2` FOREIGN KEY (`citatel_id`) REFERENCES `citatel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
