-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 29.Máj 2024, 16:29
-- Verzia serveru: 10.4.27-MariaDB
-- Verzia PHP: 8.0.25

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
(1, 'Marek', 'Baňas', '0944507621', '2006-08-30', 'Horný Vadičov'),
(2, 'Jaro', 'Bugr', '+421907444444', '2006-05-05', 'zilina');

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
(9784456728019, 'Harry Potter', 'J. K.', 2006, 'Mysteriozny', 0),
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
(1, 'Darlene Schamberger', 'babshire@example.net', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6ai2Zfm4ek', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(2, 'Mrs. Clementina Kshlerin', 'jmurray@example.org', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r5An5oeJl2', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(3, 'Noemy Crooks', 'ugleason@example.org', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HWR42dzN3f', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(4, 'Jerald Nader', 'ydietrich@example.org', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0GNeyJt8e9', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(5, 'Ulises Schaden', 'morar.payton@example.com', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '43Aeg37Ot3', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(6, 'Saige Bayer', 'emerald37@example.com', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'G4NzGTUtK7', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(7, 'Nels Konopelski', 'ezemlak@example.net', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ua9J9lubDO', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(8, 'Ariane Green', 'skuhlman@example.net', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yyfGJpCTu9', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(9, 'Prof. Antone Miller Jr.', 'pouros.nicholas@example.net', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'f7lbjYOCVC', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(10, 'Carmella Bernhard', 'fadel.timothy@example.org', '2024-05-26 14:01:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FJnYpPSz4a', '2024-05-26 14:01:46', '2024-05-26 14:01:46'),
(11, 'Test User', 'test@example.com', '2024-05-26 14:01:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'c6drxzmaQ045WNszjtcF2doZyLmQ3hfnStzk17ne4sg55CQCBmbQGSNzoALv', '2024-05-26 14:01:46', '2024-05-26 14:01:46');

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
(1, 9785432167890, 1, '2024-06-17', '2024-05-27', '2024-05-28'),
(2, 1111111111111, 1, '2024-06-18', '2024-05-28', '2024-05-28');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
