-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 06 jan 2020 om 16:25
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tea_rating_schema`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blends`
--

CREATE TABLE `blends` (
  `name` varchar(60) NOT NULL,
  `brand_name` varchar(40) NOT NULL,
  `purchase_location` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `origin` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `origin`) VALUES
(3, 'Kaneel', 'Sri Lanka.'),
(4, 'Cichoreiwortel', 'Mediterranean');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `quantities`
--

CREATE TABLE `quantities` (
  `id` bigint(20) NOT NULL,
  `tea_component_id` bigint(20) NOT NULL,
  `type` enum('%','ML','GRAM','THEE SPOONS','TO LIKES') NOT NULL,
  `amount` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `quantities`
--

INSERT INTO `quantities` (`id`, `tea_component_id`, `type`, `amount`) VALUES
(4, 1, '%', 888);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) NOT NULL,
  `tea_id` bigint(20) NOT NULL,
  `score` enum('one','two','three','four','five','six') NOT NULL DEFAULT 'one',
  `comment` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ratings`
--

INSERT INTO `ratings` (`id`, `tea_id`, `score`, `comment`) VALUES
(1, 1, 'two', 'to much of a singular taste');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teas`
--

CREATE TABLE `teas` (
  `id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `taste` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `teas`
--

INSERT INTO `teas` (`id`, `name`, `taste`) VALUES
(1, 'Morocco Mint & Spices', 'plain taste');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`tea_component_id`);

--
-- Indexen voor tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tea_id` (`tea_id`);

--
-- Indexen voor tabel `teas`
--
ALTER TABLE `teas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `quantities`
--
ALTER TABLE `quantities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `teas`
--
ALTER TABLE `teas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `quantities`
--
ALTER TABLE `quantities`
  ADD CONSTRAINT `quantities_ibfk_1` FOREIGN KEY (`tea_component_id`) REFERENCES `tea_components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `teas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
