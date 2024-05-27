-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 26.Apr 2024, 08:05
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.0.28

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

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kniha`
--

CREATE TABLE `kniha` (
  `isbn` int(13) NOT NULL,
  `nazov` varchar(50) DEFAULT NULL,
  `autor` varchar(30) DEFAULT NULL,
  `rok_vydania` int(4) DEFAULT NULL,
  `zaner` varchar(20) DEFAULT NULL,
  `stav` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

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
-- Štruktúra tabuľky pre tabuľku `vypozicka`
--

CREATE TABLE `vypozicka` (
  `id` int(11) NOT NULL,
  `kniha` int(13) NOT NULL,
  `citatel_id` int(11) NOT NULL,
  `odhadovany_datum_vratenia` date DEFAULT NULL,
  `datum_vypozicky` date DEFAULT NULL,
  `datum_vratenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

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
-- Indexy pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vypozicka_id` (`vypozicka_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `vypozicka_ibfk_1` FOREIGN KEY (`kniha`) REFERENCES `kniha` (`isbn`),
  ADD CONSTRAINT `vypozicka_ibfk_2` FOREIGN KEY (`citatel_id`) REFERENCES `citatel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;