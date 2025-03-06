-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 06. bře 2025, 15:12
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `kocicky`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kastrati`
--

CREATE TABLE `kastrati` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `show_results` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `kastrati`
--

INSERT INTO `kastrati` (`id`, `name`, `birth_date`, `color`, `code`, `father_name`, `mother_name`, `show_results`) VALUES
(1, 'ZUCCHERO A LYNX STAR', '2018-08-19', 'černá stříbřitá mramorovaná s bílou', 'ns 09 22', 'Pillowtalk\'s Michigan', 'Katherine Kerry A Lynx Star', NULL),
(2, 'LOKI BLUE LAGUNA LEO', '2016-05-27', 'modrá s bílou', 'a 09', 'ICH (WCF) Flip-Flop\'s Focus', 'Marilyn Laguna Leo', NULL),
(3, 'LUKAS BACCARACOON', '2013-09-07', 'červená stříbřitá mramorovaná s bílou', 'ds 09 22', 'ICH Fuzzy, Lavender Love', 'Kalista Violet, Velvet Duckie', NULL),
(4, 'QUEENY BELLA A LYNX STAR', '2016-01-20', 'modrá mramorovaná s bílou', 'a 09 22', 'Marylin Hairy Majesty', 'Pillowtalk\'s Wannabe', NULL),
(5, 'ELLEN A LYNX STAR', '2011-10-04', 'černě želvovinová mramorovaná', 'f 22', 'Harmony Garfield\'s Baby', 'Centaur Garfield\'s Baby', NULL),
(6, 'REBEKA GARFIELD\'S BABY', '2012-01-06', 'černě želvovinová tečkovaná s bílou', 'f 09 24', 'CH Embee Garfield\'s Baby', 'CH Zeus Sante d\'Orsy', 'MVK Lysá nad Labem 24.11.2012 - V3'),
(7, 'MAUGLINA GARFIELD\'S BABY', '2011-07-23', 'černá s bílou', 'n 09', 'CH Embee Garfield\'s Baby', 'CH Alwaro King of Jewel', 'MVK Příbram 10.6.2012 - CAC');

-- --------------------------------------------------------

--
-- Struktura tabulky `kocky`
--

CREATE TABLE `kocky` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `show_results` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `kocky`
--

INSERT INTO `kocky` (`id`, `name`, `birth_date`, `color`, `code`, `father_name`, `mother_name`, `show_results`) VALUES
(1, 'ANGELA GARFIELD\'S BABY', '2019-11-22', 'černá stříbřitá tečkovaná bikolor', 'ns 03 24', 'Zuchero A Lynx Star', 'Kisha Garfield\'s Baby', NULL),
(2, 'QUELLA GARFIELD\'S BABY', '2019-03-14', 'černě želvovinová stříbřitá mramorovaná', 'fs 22', 'Lukas Baccaracoon', 'Mauglina Garfield\'s Baby', NULL),
(3, 'RACHEL GARFIELD\'S BABY', '2019-04-11', 'modře želvovinová stříbřitá mramorovaná s bílou', 'gs 09 22', 'Lukas Baccaracoon', 'Cassandra Garfield\'s Baby', NULL),
(4, 'HANY GARFIELD\'S BABY', '2018-07-05', 'černá s bílou', 'n 09', 'Loki Blue Laguna Leo', 'Happy Agostino', NULL),
(5, 'KATELYNN GARFIELD\'S BABY', '2018-08-18', 'černě želvovinová', 'f', 'Loki Blue Laguna Leo', 'Kamey Garfield\'s Baby', NULL),
(6, 'CASSANDRA GARFIELD\'S BABY', '2017-12-06', 'černě želvovinová mramorovaná', 'f 22', 'Loki Blue Laguna Leo', 'Kisha Garfield\'s Baby', NULL),
(7, 'DEBBIE GARFIELD\'S BABY', '2018-02-10', 'modrá mramorovaná', 'a 22', 'Loki Blue Laguna Leo', 'Queeny Bella A Lynx Star', NULL),
(8, 'KAMEY GARFIELD\'S BABY', '2016-01-05', 'černě želvovinová stříbřitá mramorovaná s bílou', 'fs 09 22', 'Lukas Baccaracoon', 'Rebeka Garfield\'s Baby', NULL),
(9, 'PADY GARFIELD\'S BABY', '2016-09-21', 'modrá stříbřitá mramorovaná s bílou', 'as 09 22', 'Chopper Garfield\'s Baby', 'Rebeka Garfield\'s Baby', NULL),
(10, 'HAPPY AGOSTINO', '2016-08-01', 'černě želvovinová mramorovaná s bílou', 'f 09 22', 'IC Alwaro Kent', 'IC Arnika of Pumelia Garden', NULL),
(11, 'KISHA GARFIELD\'S BABY', '2016-01-05', 'černě želvovinová stříbřitá tečkovaná s bílou', 'fs 09 24', 'Lukas Baccaracoon', 'Rebeka Garfield\'s Baby', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `kocouri`
--

CREATE TABLE `kocouri` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `show_results` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `kocouri`
--

INSERT INTO `kocouri` (`id`, `name`, `birth_date`, `color`, `code`, `father_name`, `mother_name`, `show_results`) VALUES
(1, 'KRISTIAN A LYNX STAR', '2023-08-27', 'černá stříbřitá mramorovaná s bílou', 'ns 09 22', 'Alwaro Safari Wind', 'Raffaella Noblesse', NULL),
(2, 'SAMURAI OXYMORON', '2021-03-01', 'bílá s modrýma očima', 'w 61', 'Poseidon Oxymoron', 'Mainelynx Fawnia', NULL),
(3, 'HOPE GARFIELD\'S BABY', '2020-08-08', 'červená stříbřitá mramorovaná s bílou', 'ds 09 22', 'Zuchero A Lynx Star', 'Happy Agostino', NULL),
(4, 'MARIO NOBLESSE A LYNX STAR', '2020-08-20', 'modrá mramorovaná s bílou', 'a 09 22', 'Pillowtalk\'s Michigan', 'Katherine Kerry A Lynx Star', NULL),
(5, 'HONEYDEVIL NECTARINE', '2019-06-26', 'červená stříbřitá ticked', 'ds 25', 'ICH Respectcoon Sunshine Grand', 'HoneyDevil Torry Red', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `kastrati`
--
ALTER TABLE `kastrati`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `kocky`
--
ALTER TABLE `kocky`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `kocouri`
--
ALTER TABLE `kocouri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kastrati`
--
ALTER TABLE `kastrati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `kocky`
--
ALTER TABLE `kocky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pro tabulku `kocouri`
--
ALTER TABLE `kocouri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
