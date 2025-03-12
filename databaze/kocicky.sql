-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 12. bře 2025, 19:08
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
-- Struktura tabulky `castrates`
--

CREATE TABLE `castrates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `color_pattern` varchar(255) DEFAULT NULL,
  `breed_code` varchar(50) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `gallery_images` text DEFAULT NULL,
  `exhibitions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `castrates`
--

INSERT INTO `castrates` (`id`, `name`, `birth_date`, `color_pattern`, `breed_code`, `mother`, `father`, `main_image`, `gallery_images`, `exhibitions`) VALUES
(1, 'ZUCCHERO A LYNX STAR', '2018-08-19', 'černá stříbřitá mramorovaná s bílou', 'ns 09 22', 'Katherine Kerry A Lynx Star', 'Pillowtalk\'s Michigan', '../img/castrates/zucchero_01.jpg', '../img/castrates/zucchero_02.jpg,../img/castrates/zucchero_03.jpg,../img/castrates/zucchero_04.jpg,../img/castrates/zucchero_05.jpg', NULL),
(2, 'LOKI BLUE LAGUNA LEO', '2016-05-27', 'modrá s bílou', 'a 09', 'Marilyn Laguna Leo', 'ICH (WCF) Flip-Flop\'s Focus', '../img/castrates/loki_01.jpg', '../img/castrates/loki_02.jpg,../img/castrates/loki_03.jpg,../img/castrates/loki_04.jpg,../img/castrates/loki_05.jpg', NULL),
(3, 'LUKAS BACCARACOON', '2013-09-07', 'červená stříbřitá mramorovaná s bílou', 'ds 09 22', 'Kalista Violet, Velvet Duckie', 'ICH Fuzzy, Lavender Love', '../img/castrates/lukas_01.jpg', '../img/castrates/lukas_02.jpg,../img/castrates/lukas_03.jpg,../img/castrates/lukas_04.jpg,../img/castrates/lukas_05.jpg', NULL),
(4, 'QUEENY BELLA A LYNX STAR', '2016-01-20', 'modrá mramorovaná s bílou', 'a 09 22', 'Marylin Hairy Majesty', 'Pillowtalk\'s Wannabe', '../img/castrates/queeny_01.jpg', '../img/castrates/queeny_02.jpg,../img/castrates/queeny_03.jpg,../img/castrates/queeny_04.jpg,../img/castrates/queeny_05.jpg', NULL),
(5, 'ELLEN A LYNX STAR', '2011-10-04', 'černě želvovinová mramorovaná', 'f 22', 'Harmony Garfield\'s Baby', 'Centaur Garfield\'s Baby', '../img/castrates/ellen_01.jpg', '../img/castrates/ellen_02.jpg,../img/castrates/ellen_03.jpg,../img/castrates/ellen_04.jpg,../img/castrates/ellen_05.jpg', NULL),
(6, 'REBEKA GARFIELD\'S BABY', '2012-01-06', 'černě želvovinová tečkovaná s bílou', 'f 09 24', 'CH Embee Garfield\'s Baby', 'CH Zeus Sante d\'Orsy', '../img/castrates/rebeka_01.jpg', '../img/castrates/rebeka_02.jpg,../img/castrates/rebeka_03.jpg,../img/castrates/rebeka_04.jpg,../img/castrates/rebeka_05.jpg', '~ tř. 11 ~ <br> MVK Lysá nad Labem 24.11.2012 - V3'),
(7, 'MAUGLINA GARFIELD\'S BABY', '2011-07-23', 'černá s bílou', 'n 09', 'CH Embee Garfield\'s Baby', 'CH Alwaro King of Jewel', '../img/castrates/mauglina_01.jpg', '../img/castrates/mauglina_02.jpg,../img/castrates/mauglina_03.jpg,../img/castrates/mauglina_04.jpg,../img/castrates/mauglina_05.jpg', '~ tř. 9 ~ <br>MVK Příbram 10.6.2012 - CAC'),
(8, 'CHOPPER GARFIELD\'S BABY', '2015-09-14', 'černá stříbřitá mramorovaná s bílou', 'ns 09 22', 'Ornela Garfield\'s Baby', 'Lukas Baccaracoon', '../img/castrates/chopper_01.jpg', '../img/castrates/chopper_02.jpg,../img/castrates/chopper_03.jpg,../img/castrates/chopper_04.jpg,../img/castrates/chopper_05.jpg', NULL),
(9, 'CH EMPHATY GARFIELD\'S BABY', '2009-07-19', 'černě želvovinová tygrovaná', 'f 23', 'CH Iris of Pumelia Garden', 'CH Dynamite of Rainbow Valley', '../img/castrates/emphaty_01.jpg', '../img/castrates/emphaty_02.jpg,../img/castrates/emphaty_03.jpg,../img/castrates/emphaty_04.jpg,../img/castrates/emphaty_05.jpg', '~ tř. 11 ~ <br>MVK PYRAMIDA Praha 20.3.2010 - V1,<br> ~ tř. 9 ~<br>MVK Praha 31.7.2010 - CAC,<br> MVK Pardubice 14.11.2010 - V2,<br> MVK Praha 16.1.2011 - CAC, <br>nominace BIS,<br> MVK Praha 22.1.2012 - V1 CAC'),
(10, 'OSIRIS GARFIELD\'S BABY', '2011-08-01', 'černě želvovinová stříbřitá tečkovaná s bílou', 'fs 09 24', 'CH Empathy Garfield\'s Baby', 'CH Alwaro King of Jewel', '../img/castrates/osiris_01.jpg', '../img/castrates/osiris_02.jpg,../img/castrates/osiris_03.jpg,../img/castrates/osiris_04.jpg,../img/castrates/osiris_05.jpg', '~ tř. 9 ~ <br>MVK Příbram 10.6.2012 - V2'),
(11, 'ORNELA GARFIELD\'S BABY', '2011-08-01', 'černě želvovinová stříbřitá mramorovaná s bílou', 'fs 09 22', 'CH Empathy Garfield\'s Baby', 'CH Alwaro King of Jewel', '../img/castrates/ornela_01.jpg', '../img/castrates/ornela_02.jpg,../img/castrates/ornela_03.jpg,../img/castrates/ornela_04.jpg,../img/castrates/ornela_05.jpg', '~ tř. 9 ~ <br>MVK Praha 29.7.2012 - CAC'),
(12, 'SCHERY GARFIELD\'S BABY', '2016-12-30', 'černá stříbřitá tečkovaná', 'ns 24', 'CH Empathy Garfield\'s Baby', 'Chopper Garfield\'s Baby', '../img/castrates/schery_01.jpg', '../img/castrates/schery_02.jpg,../img/castrates/schery_03.jpg,../img/castrates/schery_04.jpg,../img/castrates/schery_05.jpg', NULL),
(13, 'ELIS GARFIELD\'S BABY', '2018-02-12', 'černá mramorovaná', 'n 22', 'Rebeka Garfield\'s Baby', 'Loki Blue Laguna Leo', '../img/castrates/elis_01.jpg', '../img/castrates/elis_02.jpg,../img/castrates/elis_03.jpg,../img/castrates/elis_04.jpg,../img/castrates/elis_05.jpg', NULL),
(14, 'ICH AJŠA GARFIELD\'S BABY', '2008-06-20', 'červená stříbřitá mramorovaná', 'ds 22', 'Amia Magic Magpie', 'CH Iris of Pumelia Garden', '../img/castrates/ajsa_01.jpg', '../img/castrates/ajsa_02.jpg,../img/castrates/ajsa_03.jpg,../img/castrates/ajsa_04.jpg,../img/castrates/ajsa_05.jpg', '~ tř. 9 ~<br> MVK STAR SHOW Praha 14.2.2010 - CAC, <br>MVK Manětín 28.2.2010 - V1 CAC, <br>MVK PYRAMIDA Praha 20.3.2010 - V1 CAC'),
(15, 'CLEO WILD ROSE', '2011-09-20', 'modrá', 'a', 'CH Felicie Snow Garden', 'CH Edgar North Beauty', '../img/castrates/cleo_01.jpg', '../img/castrates/cleo_02.jpg,../img/castrates/cleo_03.jpg,../img/castrates/cleo_04.jpg,../img/castrates/cleo_05.jpg', '~ tř. 9 ~ <br>MVK Praha 29.7.2012 - CAC BIV Nominace BIS,<br> MVK Lysá nad Labem 24.11.2012 - CAC BIV,<br> MVK Lysá nad Labem 25.11.2012 - CAC'),
(16, 'CH IRIS OF PUMELIA GARDEN', '2006-08-05', 'červený mramorovaný', 'd 22', 'Evening Sun of Pumelia Garden', 'CH Elliot de Axis Star', '../img/castrates/iris_01.jpg', '../img/castrates/iris_02.jpg,../img/castrates/iris_03.jpg,../img/castrates/iris_04.jpg,../img/castrates/iris_02.jpg', '~ tř. 11 ~<br> MVK Praha 18.2.2007 - V1 BIV Nom.,<br> ~ tř. 9 ~<br> MVK Ústí n/L 14.7.2007 - CAC, <br>MVK Liberec 29.9.2007 - V2,<br> MVK Praha 16.2.2008 - CAC,<br> MVK Praha 14.2.2009 - V2, <br>MVK Praha 22.3.2009 - CAC BIV Nom.'),
(17, 'CH DAVID GOLIATH OF PÁBENÍ', '2007-03-23', 'modrý mramorovaný', 'a 22', 'Patricie of Gentle Lions', 'IC Dragon Main Bastet', '../img/castrates/david_01.jpg', '../img/castrates/david_02.jpg,../img/castrates/david_03.jpg,../img/castrates/david_04.jpg,../img/castrates/david_02.jpg', '~ tř. 9 ~ <br>MVK Praha 16.2.2008 - CAC,<br> MVK Praha 14.2.2009 - V2,<br> MVK Praha 22.3.2009 - V2,<br> MVK Zdice 7.6.2009 - CAC,<br> MVK Ústí n/L 12.7.2009 - CAC'),
(18, 'CH ALWARO KING OF JEVEL', '2010-03-08', 'černý stříbřitý mramorovaný s bílou', 'ns 09 22', 'Alwaro Victoria', 'INT CH Wytopitlock H\'Bono Madox', '../img/castrates/king_01.jpg', '../img/castrates/king_02.jpg,../img/castrates/king_03.jpg,../img/castrates/king_02.jpg,../img/castrates/king_03.jpg', '~ tř. 11 ~ <br>MVK Praha 17.10.2010 - V1,<br> ~ tř. 9 ~<br> MVK Praha 15.1.2011 - CAC,<br> MVK Praha 16.1.2011 - CAC,<br> MVK Praha 12.2.2011 - CAC,<br> ~ champion ~<br> MVK Praha 13.2.2011 - CACIB,<br> MVK Bratislava 13.3.2011 - CACIB BIV'),
(19, 'MERLIN OF PUMELIA GARDEN', '2011-02-02', 'modrá mramorovaná s bílou', 'a 09 22', 'Christine Garfield\'s Baby', 'Zeus Sante d\'Orsy', '../img/castrates/merlin_01.jpg', '../img/castrates/merlin_02.jpg,../img/castrates/merlin_03.jpg,../img/castrates/merlin_04.jpg,../img/castrates/merlin_05.jpg', NULL),
(20, 'ARLETA GARFIELD\'S BABY', '2008-06-20', 'červená stříbřitá mramorovaná', 'ds 22', 'Amia Magic Magpie', 'CH Iris of Pumelia Garden', '../img/castrates/arleta_01.jpg', '../img/castrates/arleta_02.jpg,../img/castrates/arleta_03.jpg,../img/castrates/arleta_04.jpg,../img/castrates/arleta_05.jpg', '~ tř. 9 ~<br> MVK Praha 13.12.2009 - V2,<br> MVK Praha 1.8.2010 - V2'),
(21, 'AMIA MAGIC MAGPIE', '2006-10-18', 'červená stříbřitá mramorovaná bikolor', 'ds 03 22', 'Bianca Sante D\'Orsy', 'CH Kelvin Klein z Larku', '../img/castrates/amia_01.jpg', '../img/castrates/amia_02.jpg,../img/castrates/amia_03.jpg,../img/castrates/amia_04.jpg,../img/castrates/amia_05.jpg', '~ tř. 9 ~ <br>MVK Liberec 29.9.2007 - CAC,<br> MVK Praha 17.10.2009 - V2, <br>MVK Příbram 5.6.2010 - CAC'),
(22, 'CH ARKA GARFIELD\'S BABY', '2008-06-20', 'červená stříbřitá mramorovaná s bílou', 'ds 09 22', 'Amia Magic Magpie', 'CH Iris of Pumelia Garden', '../img/castrates/arka_01.jpg', '../img/castrates/arka_02.jpg,../img/castrates/arka_03.jpg,../img/castrates/arka_04.jpg,../img/castrates/arka_05.jpg', '~ tř. 9 ~ <br>MVK Most 17.5.2009 - CAC Nom.,<br> MVK Zdice 7.6.2009 - CAC,<br>MVK Ústí n/L 12.7.2009 - V2,<br> MVK Pardubice 15.11.2009 - CAC'),
(23, 'CH X-TREME Z MATRIXU', '2008-12-23', 'modře želvovinová mramorovaná', 'g 22', 'Penelope Hairy Majesty', 'CH Eomer of Blooming Tree', '../img/castrates/xtreme_01.jpg', '../img/castrates/xtreme_02.jpg,../img/castrates/xtreme_03.jpg,../img/castrates/xtreme_04.jpg,../img/castrates/xtreme_05.jpg', '~ tř. 9 ~ <br>MVK Pardubice 15.11.2009 - CAC,<br> MVK Praha 13.12.2009 - CAC BIV,<br> MVK Manětín 28.2.2010 - V2,<br> MVK Lysá nad Labem 26.11.2011 - V1 CAC'),
(24, 'AVALON OF MASSLCATS', '2013-12-23', 'černá stříbřitá mramorovaná', 'ns 22', 'IC Felis Admiranda Bastilla', 'CH Top Coon Ayron', '../img/castrates/avalon_01.jpg', '../img/castrates/avalon_02.jpg,../img/castrates/avalon_03.jpg,../img/castrates/avalon_04.jpg,../img/castrates/avalon_05.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `color_pattern` varchar(255) DEFAULT NULL,
  `breed_code` varchar(50) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `gallery_images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `cats`
--

INSERT INTO `cats` (`id`, `name`, `birth_date`, `color_pattern`, `breed_code`, `mother`, `father`, `main_image`, `gallery_images`) VALUES
(1, 'OMARION QUEEN OF DAN', '2021-11-06', 'černě želvovinová stříbřitá mramorovaná', 'fs 22', 'Solaris of CaDazz', 'Hope Queen of Dan', '../img/cats/omarion_01.jpg', '../img/cats/omarion_02.jpg,../img/cats/omarion_03.jpg,../img/cats/omarion_04.jpg,../img/cats/omarion_05.jpg'),
(2, 'OLIVIA GARFIELD\'S BABY', '2021-05-25', 'černě želvovinová stříbřitá tygrovaná', 'fs 23', 'Rebeka Garfield\'s Baby', 'HoneyDevil Nectarine', '../img/cats/olivia_01.jpg', '../img/cats/olivia_02.jpg,../img/cats/olivia_03.jpg,../img/cats/olivia_04.jpg,../img/cats/olivia_05.jpg'),
(3, 'ANGELA GARFIELD\'S BABY', '2019-11-22', 'černá stříbřitá tečkovaná bikolor', 'ns 03 24', 'Kisha Garfield\'s Baby', 'Zuchero A Lynx Star', '../img/cats/angela_01.jpg', '../img/cats/angela_02.jpg,../img/cats/angela_03.jpg,../img/cats/angela_04.jpg,../img/cats/angela_05.jpg'),
(4, 'QUELLA GARFIELD\'S BABY', '2019-03-14', 'černě želvovinová stříbřitá mramorovaná', 'fs 22', 'Mauglina Garfield\'s Baby', 'Lukas Baccaracoon', '../img/cats/quella_01.jpg', '../img/cats/quella_02.jpg,../img/cats/quella_03.jpg,../img/cats/quella_04.jpg,../img/cats/quella_05.jpg'),
(5, 'RACHEL GARFIELD\'S BABY', '2019-04-11', 'modře želvovinová stříbřitá mramorovaná s bílou', 'gs 09 22', 'Cassandra Garfield\'s Baby', 'Lukas Baccaracoon', '../img/cats/rachel_01.jpg', '../img/cats/rachel_02.jpg,../img/cats/rachel_03.jpg,../img/cats/rachel_04.jpg,../img/cats/rachel_05.jpg'),
(6, 'HANY GARFIELD\'S BABY', '2018-07-05', 'černá s bílou', 'n 09', 'Happy Agostino', 'Loki Blue Laguna Leo', '../img/cats/hany_01.jpg', '../img/cats/hany_02.jpg,../img/cats/hany_03.jpg,../img/cats/hany_04.jpg,../img/cats/hany_05.jpg'),
(7, 'KATELYNN GARFIELD\'S BABY', '2018-08-18', 'černě želvovinová', 'f', 'Kamey Garfield\'s Baby', 'Loki Blue Laguna Leo', '../img/cats/katelynn_01.jpg', '../img/cats/katelynn_02.jpg,../img/cats/katelynn_03.jpg,../img/cats/katelynn_04.jpg,../img/cats/katelynn_05.jpg'),
(8, 'CASSANDRA GARFIELD\'S BABY', '2017-12-06', 'černě želvovinová mramorovaná', 'f 22', 'Kisha Garfield\'s Baby', 'Loki Blue Laguna Leo', '../img/cats/cassandra_01.jpg', '../img/cats/cassandra_02.jpg,../img/cats/cassandra_03.jpg,../img/cats/cassandra_04.jpg,../img/cats/cassandra_05.jpg'),
(9, 'DEBBIE GARFIELD\'S BABY', '2018-02-10', 'modrá mramorovaná', 'a 22', 'Queeny Bella A Lynx Star', 'Loki Blue Laguna Leo', '../img/cats/debbie_01.jpg', '../img/cats/debbie_02.jpg,../img/cats/debbie_03.jpg,../img/cats/debbie_04.jpg,../img/cats/debbie_05.jpg'),
(10, 'KAMEY GARFIELD\'S BABY', '2016-01-05', 'černě želvovinová stříbřitá mramorovaná s bílou', 'fs 09 22', 'Rebeka Garfield\'s Baby', 'Lukas Baccaracoon', '../img/cats/kamey_01.jpg', '../img/cats/kamey_02.jpg,../img/cats/kamey_03.jpg,../img/cats/kamey_04.jpg,../img/cats/kamey_05.jpg'),
(11, 'PADY GARFIELD\'S BABY', '2016-09-21', 'modrá stříbřitá mramorovaná s bílou', 'as 09 22', 'Rebeka Garfield\'s Baby', 'Chopper Garfield\'s Baby', '../img/cats/pady_01.jpg', '../img/cats/pady_02.jpg,../img/cats/pady_03.jpg,../img/cats/pady_04.jpg,../img/cats/pady_05.jpg'),
(12, 'HAPPY AGOSTINO', '2016-08-01', 'černě želvovinová mramorovaná s bílou', 'f 09 22', 'IC Arnika of Pumelia Garden', 'IC Alwaro Kent', '../img/cats/happy_01.jpg', '../img/cats/happy_02.jpg,../img/cats/happy_03.jpg,../img/cats/happy_04.jpg,../img/cats/happy_05.jpg'),
(13, 'KISHA GARFIELD\'S BABY', '2016-01-05', 'černě želvovinová stříbřitá tečkovaná s bílou', 'fs 09 24', 'Rebeka Garfield\'s Baby', 'Lukas Baccaracoon', '../img/cats/kisha_01.jpg', '../img/cats/kisha_02.jpg,../img/cats/kisha_03.jpg,../img/cats/kisha_04.jpg,../img/cats/kisha_05.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `toms`
--

CREATE TABLE `toms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `color_pattern` varchar(255) DEFAULT NULL,
  `breed_code` varchar(50) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `gallery_images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `toms`
--

INSERT INTO `toms` (`id`, `name`, `birth_date`, `color_pattern`, `breed_code`, `mother`, `father`, `main_image`, `gallery_images`) VALUES
(1, 'KRISTIAN A LYNX STAR', '2023-08-27', 'černá stříbřitá mramorovaná s bílou', 'ns 09 22', 'Raffaella Noblesse', 'Alwaro Safari Wind', '../img/toms/kristian_01.jpg', '../img/toms/kristian_02.jpg,../img/toms/kristian_03.jpg,../img/toms/kristian_04.jpg,../img/toms/kristian_05.jpg'),
(2, 'SAMURAI OXYMORON', '2021-03-01', 'bílá s modrýma očima', 'w 61', 'Mainelynx Fawnia', 'Poseidon Oxymoron', '../img/toms/samurai_01.jpg', '../img/toms/samurai_02.jpg,../img/toms/samurai_03.jpg,../img/toms/samurai_04.jpg,../img/toms/samurai_05.jpg'),
(3, 'HOPE GARFIELD\'S BABY', '2020-08-08', 'červená stříbřitá mramorovaná s bílou', 'ds 09 22', 'Happy Agostino', 'Zuchero A Lynx Star', '../img/toms/hope_01.jpg', '../img/toms/hope_02.jpg,../img/toms/hope_03.jpg,../img/toms/hope_04.jpg,../img/toms/hope_05.jpg'),
(4, 'MARIO NOBLESSE A LYNX STAR', '2020-08-20', 'modrá mramorovaná s bílou', 'a 09 22', 'Katherine Kerry A Lynx Star', 'Pillowtalk\'s Michigan', '../img/toms/mario_01.jpg', '../img/toms/mario_02.jpg,../img/toms/mario_03.jpg,../img/toms/mario_04.jpg,../img/toms/mario_05.jpg'),
(5, 'HONEYDEVIL NECTARINE', '2019-06-26', 'červená stříbřitá ticked', 'ds 25', 'HoneyDevil Torry Red', 'ICH Respectcoon Sunshine Grand', '../img/toms/honeydevil_01.jpg', '../img/toms/honeydevil_02.jpg,../img/toms/honeydevil_03.jpg,../img/toms/honeydevil_04.jpg,../img/toms/honeydevil_05.jpg');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `castrates`
--
ALTER TABLE `castrates`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `toms`
--
ALTER TABLE `toms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `castrates`
--
ALTER TABLE `castrates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pro tabulku `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pro tabulku `toms`
--
ALTER TABLE `toms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
