-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 20. bře 2025, 21:28
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
-- Databáze: `odchovy`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kotata`
--

CREATE TABLE `kotata` (
  `id` int(11) NOT NULL,
  `litter_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `color_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `kotata`
--

INSERT INTO `kotata` (`id`, `litter_id`, `name`, `description`, `color_code`) VALUES
(1, 2, 'Boris Garfield\'s Baby', 'červený mramorovaný se stříbrem a bílou', 'ds 09 22'),
(2, 2, 'Baring Garfield\'s Baby', 'červený mramorovaný se stříbrem', 'ds 22'),
(3, 2, 'Baltazar Garfield\'s Baby', 'červený mramorovaný s bílou', 'd 09 22'),
(4, 2, 'Barley Garfield\'s Baby', 'červený mramorovaný', 'd 22'),
(5, 2, 'Bina Garfield\'s Baby', 'červená mramorovaná se stříbrem a s bílou', 'ds 09 22'),
(6, 2, 'Barra Garfield\'s Baby', 'červená mramorovaná s bílou', 'd 09 22'),
(7, 2, 'Bonnie Garfield\'s Baby', 'červená mramorovaná', 'd 22'),
(8, 3, 'Cevin Garfield\'s Baby', 'černý s bílou', 'n 09'),
(9, 3, 'Calipso Garfield\'s Baby', 'černý tygrovaný s bílou', 'n 09 23'),
(10, 3, 'Centaur Garfield\'s Baby', 'černý mramorovaný s bílou', 'n 09 22'),
(11, 3, 'Ceroky Garfield\'s Baby', 'červený tygrovaný', 'd 23'),
(12, 3, 'Corzar Garfield\'s Baby', 'červený tygrovaný s bílou', 'd 09 23'),
(13, 3, 'Christine Garfield\'s Baby', 'černě želvovinová mramorovaná', 'f 22'),
(14, 3, 'Cookie Garfield\'s Baby', 'černá mramorovaná s bílou', 'n 09 22'),
(15, 4, 'Denis Garfield\'s Baby', 'červený mramorovaný s bílou a se stříbrem', 'ds 09 22'),
(16, 4, 'Daylight Garfield\'s Baby', 'červená mramorovaná s bílou', 'd 09 22'),
(17, 4, 'Dag Garfield\'s Baby', 'červený mramorovaný', 'd 22'),
(18, 4, 'Dandelion Garfield\'s Baby', 'červená mramorovaná', 'd 22'),
(19, 4, 'Daisy Garfield\'s Baby', 'červená mramorovaná s bílou a se stříbrem', 'ds 09 22'),
(20, 5, 'Empathy Garfield\'s Baby', 'černá želvovinová tygrovaná', 'f 23'),
(21, 5, 'Embee Garfield\'s Baby', 'černá želvovinová tygrovaná', 'f 23'),
(22, 5, 'Equador Garfield\'s Baby', 'červený mramorovaný s bílou', 'd 09 22'),
(23, 5, 'Einar Garfield\'s Baby', 'červený tygrovaný', 'd 23'),
(24, 5, 'Edrik Garfield\'s Baby', 'červený tygrovaný', 'd 23'),
(25, 5, 'Eldred Garfield\'s Baby', 'červený tygrovaný', 'd 23'),
(26, 5, 'Eddie Garfield\'s Baby', 'černý mramorovaný', 'n 22');

-- --------------------------------------------------------

--
-- Struktura tabulky `kotata_obrazky`
--

CREATE TABLE `kotata_obrazky` (
  `id` int(11) NOT NULL,
  `kitten_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `kotata_obrazky`
--

INSERT INTO `kotata_obrazky` (`id`, `kitten_id`, `image_url`) VALUES
(1, 1, '../img/odchovy/kotata/1b/boris_01.jpg'),
(2, 1, '../img/odchovy/kotata/1b/boris_02.jpg'),
(3, 1, '../img/odchovy/kotata/1b/boris_03.jpg'),
(4, 1, '../img/odchovy/kotata/1b/boris_04.jpg'),
(5, 1, '../img/odchovy/kotata/1b/boris_05.jpg'),
(6, 2, '../img/odchovy/kotata/1b/baring_01.jpg'),
(7, 2, '../img/odchovy/kotata/1b/baring_02.jpg'),
(8, 2, '../img/odchovy/kotata/1b/baring_03.jpg'),
(9, 2, '../img/odchovy/kotata/1b/baring_04.jpg'),
(10, 2, '../img/odchovy/kotata/1b/baring_05.jpg'),
(11, 3, '../img/odchovy/kotata/1b/baltazar_01.jpg'),
(12, 3, '../img/odchovy/kotata/1b/baltazar_02.jpg'),
(13, 3, '../img/odchovy/kotata/1b/baltazar_03.jpg'),
(14, 3, '../img/odchovy/kotata/1b/baltazar_04.jpg'),
(15, 3, '../img/odchovy/kotata/1b/baltazar_05.jpg'),
(16, 4, '../img/odchovy/kotata/1b/barley_01.jpg'),
(17, 4, ''),
(18, 4, ''),
(19, 4, ''),
(20, 4, ''),
(21, 5, '../img/odchovy/kotata/1b/bina_01.jpg'),
(22, 5, '../img/odchovy/kotata/1b/bina_02.jpg'),
(23, 5, '../img/odchovy/kotata/1b/bina_03.jpg'),
(24, 5, '../img/odchovy/kotata/1b/bina_04.jpg'),
(25, 5, '../img/odchovy/kotata/1b/bina_05.jpg'),
(26, 6, '../img/odchovy/kotata/1b/barra_01.jpg'),
(27, 6, '../img/odchovy/kotata/1b/barra_02.jpg'),
(28, 6, '../img/odchovy/kotata/1b/barra_03.jpg'),
(29, 6, '../img/odchovy/kotata/1b/barra_04.jpg'),
(30, 6, '../img/odchovy/kotata/1b/barra_05.jpg'),
(31, 7, '../img/odchovy/kotata/1b/bonnie_01.jpg'),
(32, 7, '../img/odchovy/kotata/1b/bonnie_02.jpg'),
(33, 7, '../img/odchovy/kotata/1b/bonnie_03.jpg'),
(34, 7, '../img/odchovy/kotata/1b/bonnie_04.jpg'),
(35, 7, '../img/odchovy/kotata/1b/bonnie_05.jpg'),
(36, 8, '../img/odchovy/kotata/1c/cevin_01.jpg'),
(37, 8, '../img/odchovy/kotata/1c/cevin_02.jpg'),
(38, 8, '../img/odchovy/kotata/1c/cevin_03.jpg'),
(39, 8, '../img/odchovy/kotata/1c/cevin_04.jpg'),
(40, 8, '../img/odchovy/kotata/1c/cevin_05.jpg'),
(41, 9, '../img/odchovy/kotata/1c/calipso_01.jpg'),
(42, 9, '../img/odchovy/kotata/1c/calipso_02.jpg'),
(43, 9, '../img/odchovy/kotata/1c/calipso_03.jpg'),
(44, 9, '../img/odchovy/kotata/1c/calipso_04.jpg'),
(45, 9, '../img/odchovy/kotata/1c/calipso_05.jpg'),
(46, 10, '../img/odchovy/kotata/1c/centaur_01.jpg'),
(47, 10, '../img/odchovy/kotata/1c/centaur_02.jpg'),
(48, 10, '../img/odchovy/kotata/1c/centaur_03.jpg'),
(49, 10, '../img/odchovy/kotata/1c/centaur_04.jpg'),
(50, 10, '../img/odchovy/kotata/1c/centaur_05.jpg'),
(51, 11, '../img/odchovy/kotata/1c/ceroky_01.jpg'),
(52, 11, '../img/odchovy/kotata/1c/ceroky_02.jpg'),
(53, 11, '../img/odchovy/kotata/1c/ceroky_03.jpg'),
(54, 11, '../img/odchovy/kotata/1c/ceroky_04.jpg'),
(55, 11, '../img/odchovy/kotata/1c/ceroky_05.jpg'),
(56, 12, '../img/odchovy/kotata/1c/corzar_01.jpg'),
(57, 12, '../img/odchovy/kotata/1c/corzar_02.jpg'),
(58, 12, '../img/odchovy/kotata/1c/corzar_03.jpg'),
(59, 12, '../img/odchovy/kotata/1c/corzar_04.jpg'),
(60, 12, '../img/odchovy/kotata/1c/corzar_05.jpg'),
(61, 13, '../img/odchovy/kotata/1c/christine_01.jpg'),
(62, 13, '../img/odchovy/kotata/1c/christine_02.jpg'),
(63, 13, '../img/odchovy/kotata/1c/christine_03.jpg'),
(64, 13, ''),
(65, 13, ''),
(66, 14, '../img/odchovy/kotata/1c/cookie_01.jpg'),
(67, 14, '../img/odchovy/kotata/1c/cookie_02.jpg'),
(68, 14, '../img/odchovy/kotata/1c/cookie_03.jpg'),
(69, 14, '../img/odchovy/kotata/1c/cookie_04.jpg'),
(70, 14, ''),
(71, 15, '../img/odchovy/kotata/1d/denis_01.jpg'),
(72, 15, '../img/odchovy/kotata/1d/denis_02.jpg'),
(73, 15, '../img/odchovy/kotata/1d/denis_03.jpg'),
(74, 15, '../img/odchovy/kotata/1d/denis_04.jpg'),
(75, 15, '../img/odchovy/kotata/1d/denis_05.jpg'),
(76, 16, '../img/odchovy/kotata/1d/daylight_01.jpg'),
(77, 16, '../img/odchovy/kotata/1d/daylight_02.jpg'),
(78, 16, '../img/odchovy/kotata/1d/daylight_03.jpg'),
(79, 16, '../img/odchovy/kotata/1d/daylight_04.jpg'),
(80, 16, '../img/odchovy/kotata/1d/daylight_05.jpg'),
(81, 17, '../img/odchovy/kotata/1d/dag_01.jpg'),
(82, 17, '../img/odchovy/kotata/1d/dag_02.jpg'),
(83, 17, '../img/odchovy/kotata/1d/dag_03.jpg'),
(84, 17, '../img/odchovy/kotata/1d/dag_04.jpg'),
(85, 17, '../img/odchovy/kotata/1d/dag_05.jpg'),
(86, 18, '../img/odchovy/kotata/1d/dandelion_01.jpg'),
(87, 18, '../img/odchovy/kotata/1d/dandelion_02.jpg'),
(88, 18, '../img/odchovy/kotata/1d/dandelion_03.jpg'),
(89, 18, '../img/odchovy/kotata/1d/dandelion_04.jpg'),
(90, 18, '../img/odchovy/kotata/1d/dandelion_05.jpg'),
(91, 19, '../img/odchovy/kotata/1d/daisy_01.jpg'),
(92, 19, '../img/odchovy/kotata/1d/daisy_02.jpg'),
(93, 19, '../img/odchovy/kotata/1d/daisy_03.jpg'),
(94, 19, '../img/odchovy/kotata/1d/daisy_04.jpg'),
(95, 19, '../img/odchovy/kotata/1d/daisy_05.jpg'),
(96, 20, '../img/odchovy/kotata/1e/empathy_01.jpg'),
(97, 20, '../img/odchovy/kotata/1e/empathy_02.jpg'),
(98, 20, '../img/odchovy/kotata/1e/empathy_03.jpg'),
(99, 20, '../img/odchovy/kotata/1e/empathy_04.jpg'),
(100, 20, '../img/odchovy/kotata/1e/empathy_05.jpg'),
(101, 21, '../img/odchovy/kotata/1e/embee_01.jpg'),
(102, 21, '../img/odchovy/kotata/1e/embee_02.jpg'),
(103, 21, '../img/odchovy/kotata/1e/embee_03.jpg'),
(104, 21, '../img/odchovy/kotata/1e/embee_04.jpg'),
(105, 21, '../img/odchovy/kotata/1e/embee_05.jpg'),
(106, 22, '../img/odchovy/kotata/1e/equador_01.jpg'),
(107, 22, '../img/odchovy/kotata/1e/equador_02.jpg'),
(108, 22, '../img/odchovy/kotata/1e/equador_03.jpg'),
(109, 22, '../img/odchovy/kotata/1e/equador_04.jpg'),
(110, 22, '../img/odchovy/kotata/1e/equador_05.jpg'),
(111, 23, '../img/odchovy/kotata/1e/einar_01.jpg'),
(112, 23, '../img/odchovy/kotata/1e/einar_02.jpg'),
(113, 23, '../img/odchovy/kotata/1e/einar_03.jpg'),
(114, 23, '../img/odchovy/kotata/1e/einar_04.jpg'),
(115, 23, '../img/odchovy/kotata/1e/einar_05.jpg'),
(116, 24, '../img/odchovy/kotata/1e/edrik_01.jpg'),
(117, 24, '../img/odchovy/kotata/1e/edrik_02.jpg'),
(118, 24, '../img/odchovy/kotata/1e/edrik_03.jpg'),
(119, 24, '../img/odchovy/kotata/1e/edrik_04.jpg'),
(120, 24, '../img/odchovy/kotata/1e/edrik_05.jpg'),
(121, 25, '../img/odchovy/kotata/1e/eldred_01.jpg'),
(122, 25, '../img/odchovy/kotata/1e/eldred_02.jpg'),
(123, 25, '../img/odchovy/kotata/1e/eldred_03.jpg'),
(124, 25, '../img/odchovy/kotata/1e/eldred_04.jpg'),
(125, 25, '../img/odchovy/kotata/1e/eldred_05.jpg'),
(126, 26, '../img/odchovy/kotata/1e/eddie_01.jpg'),
(127, 26, '../img/odchovy/kotata/1e/eddie_02.jpg'),
(128, 26, '../img/odchovy/kotata/1e/eddie_03.jpg'),
(129, 26, '../img/odchovy/kotata/1e/eddie_04.jpg'),
(130, 26, '../img/odchovy/kotata/1e/eddie_05.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `litters`
--

CREATE TABLE `litters` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `batch_number` int(11) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `litters`
--

INSERT INTO `litters` (`id`, `name`, `batch_number`, `image_url`, `mother_name`, `father_name`) VALUES
(2, 'vrh B', 1, '../img/odchovy/vrh_b_odchovy.jpg', 'Amia Magic Magpie', 'CH Iris of Pumelia Garden'),
(3, 'vrh C', 1, '../img/odchovy/vrhc_c_odchovy.jpg', 'CH Dynamite of Rainbow Valley', 'David Goliath of Pábení'),
(4, 'vrh D', 1, '../img/odchovy/vrh_d_odchovy.jpg', 'Amia Magic Magpie', 'CH Iris of Pumelia Garden'),
(5, 'vrh E', 1, '../img/odchovy/vrh_e_9232.jpg', 'CH Dynamite of Rainbow Valley', 'CH Iris of Pumelia Garden'),
(6, 'vrh F', 1, '../img/odchovy/vrh_f_12mm.jpg', 'Amia Magic Magpie', 'CH Iris of Pumelia Garden'),
(7, 'vrh G', 1, '../img/odchovy/vrh_g_11mm.jpg', 'Arleta Garfield\'s Baby', 'CH David Goliath of Pábení'),
(8, 'vrh H', 1, '../img/odchovy/vrh_h_12mm.jpg', 'X-Treme z Matrixu', 'CH Iris of Pumelia Garden'),
(9, 'vrh CH', 1, '../img/odchovy/vrh_ch_13mm.jpg', 'CH Arka Garfield\'s Baby', 'CH David Goliath of Pábení'),
(10, 'vrh I', 1, '../img/odchovy/vrh_i_13mm.jpg', NULL, NULL),
(11, 'vrh J', 1, '../img/odchovy/jesica16mm.jpg', NULL, NULL),
(12, 'vrh K', 1, '../img/odchovy/vrh_k_12mm.jpg', NULL, NULL),
(13, 'vrh L', 1, '../img/odchovy/vrh_l_10mm.jpg', NULL, NULL),
(14, 'vrh M', 1, '../img/odchovy/vrh_m_12mm.jpg', NULL, NULL),
(15, 'vrh N', 1, '../img/odchovy/vrh_n_10mm.jpg', NULL, NULL),
(16, 'vrh O', 1, '../img/odchovy/vrh_o_11mm.jpg', NULL, NULL),
(17, 'vrh P', 1, '../img/odchovy/vrh_p_12mm.jpg', NULL, NULL),
(18, 'vrh Q', 1, '../img/odchovy/vrh_q_14mm.jpg', NULL, NULL),
(19, 'vrh R', 1, '../img/odchovy/vrh_r_01mm.jpg', NULL, NULL),
(20, 'vrh S', 1, '../img/odchovy/vrh_s_13mm.jpg', NULL, NULL),
(21, 'vrh T', 1, '../img/odchovy/vrh_t_13mm.jpg', NULL, NULL),
(22, 'vrh U', 1, '../img/odchovy/vrh_u_13mm.jpg', NULL, NULL),
(23, 'vrh V', 1, '../img/odchovy/vrh_v_13mm.jpg', NULL, NULL),
(24, 'vrh W', 1, '../img/odchovy/vrh_w_11mm.jpg', NULL, NULL),
(25, 'vrh X', 1, '../img/odchovy/xaraya19mm.jpg', NULL, NULL),
(26, 'vrh Y', 1, '../img/odchovy/vrh_y_12mm.jpg', NULL, NULL),
(27, 'vrh Z', 1, '../img/odchovy/vrh_z_08mm.jpg', NULL, NULL),
(28, 'vrh A', 2, '../img/odchovy/vrh_a_13mm.jpg', NULL, NULL),
(29, 'vrh B', 2, '../img/odchovy/vrh_b_10mm.jpg', NULL, NULL),
(30, 'vrh C', 2, '../img/odchovy/vrh_c_09mm.jpg', NULL, NULL),
(31, 'vrh D', 2, '../img/odchovy/vrh_d_11mm.jpg', NULL, NULL),
(32, 'vrh E', 2, '../img/odchovy/vrh_e_10mm.jpg', NULL, NULL),
(33, 'vrh F', 2, '../img/odchovy/fantasy13mm.jpg', NULL, NULL),
(34, 'vrh G', 2, '../img/odchovy/goldie13mm.jpg', NULL, NULL),
(35, 'vrh H', 2, '../img/odchovy/vrh_h_12mm.jpg', NULL, NULL),
(36, 'vrh CH', 2, '../img/odchovy/vrh_ch_11mmm.jpg', NULL, NULL),
(37, 'vrh I', 2, '../img/odchovy/vrh_i_10mm.jpg', NULL, NULL),
(38, 'vrh J', 2, '../img/odchovy/vrh_j_10mm.jpg', NULL, NULL),
(39, 'vrh K', 2, '../img/odchovy/vrh_k_08mm.jpg', NULL, NULL),
(40, 'vrh L', 2, '../img/odchovy/vrh_l_08mm.jpg', NULL, NULL),
(41, 'vrh M', 2, '../img/odchovy/vrh_m_06mm.jpg', NULL, NULL),
(42, 'vrh N', 2, '../img/odchovy/vrh_n_08mm.jpg', NULL, NULL),
(43, 'vrh O', 2, '../img/odchovy/vrh_o_10mm.jpg', NULL, NULL),
(44, 'vrh P', 2, '../img/odchovy/vrh_p_07mm.jpg', NULL, NULL),
(45, 'vrh Q', 2, '../img/odchovy/vrh_q_12mm.jpg', NULL, NULL),
(46, 'vrh R', 2, '../img/odchovy/vrh_r_06mm.jpg', NULL, NULL),
(47, 'vrh S', 2, '../img/odchovy/vrh_s_09mm.jpg', NULL, NULL),
(48, 'vrh T', 2, '../img/odchovy/vrh_t_07mm.jpg', NULL, NULL),
(49, 'vrh U', 2, '../img/odchovy/vrh_u_06mm.jpg', NULL, NULL),
(50, 'vrh V', 2, '../img/odchovy/vrh_v_13mm.jpg', NULL, NULL),
(51, 'vrh W', 2, '../img/odchovy/vrh_w_13mm.jpg', NULL, NULL),
(52, 'vrh X', 2, '../img/odchovy/vrh_x_12mm.jpg', NULL, NULL),
(53, 'vrh Y', 2, '../img/odchovy/vrh_y_08mm.jpg', NULL, NULL),
(54, 'vrh Z', 2, '../img/odchovy/vrh_z_11mm.jpg', NULL, NULL),
(55, 'vrh A', 3, '../img/odchovy/vrh_a_11mm.jpg', NULL, NULL),
(56, 'vrh B', 3, '../img/odchovy/vrh_b_13mm.jpg', NULL, NULL),
(57, 'vrh C', 3, '../img/odchovy/vrh_c_12mm.jpg', NULL, NULL),
(58, 'vrh D', 3, '../img/odchovy/vrh_d_12mm.jpg', NULL, NULL),
(59, 'vrh E', 3, '../img/odchovy/vrh_e_12mm.jpg', NULL, NULL),
(60, 'vrh F', 3, '../img/odchovy/vrh_f_09mm.jpg', NULL, NULL),
(61, 'vrh G', 3, '../img/odchovy/vrh_g_08mm.jpg', NULL, NULL),
(62, 'vrh H', 3, '../img/odchovy/vrh_h_13mm.jpg', NULL, NULL),
(63, 'vrh CH', 3, '../img/odchovy/vrh_ch_12mm.jpg', NULL, NULL),
(64, 'vrh I', 3, '../img/odchovy/vrh_i_11mm.jpg', NULL, NULL),
(65, 'vrh J', 3, '../img/odchovy/vrh_j_11mm.jpg', NULL, NULL),
(66, 'vrh K', 3, '../img/odchovy/vrh_k_13mm.jpg', NULL, NULL),
(67, 'vrh L', 3, '../img/odchovy/vrh_l_13mm.jpg', NULL, NULL),
(68, 'vrh M', 3, '../img/odchovy/vrh_m_11mm.jpg', NULL, NULL),
(69, 'vrh N', 3, '../img/odchovy/vrh_n_14mm.jpg', NULL, NULL),
(70, 'vrh O', 3, '../img/odchovy/vrh_o_14mm.jpg', NULL, NULL),
(71, 'vrh P', 3, '../img/odchovy/vrh_p_13mm.jpg', NULL, NULL),
(72, 'vrh Q', 3, '../img/odchovy/vrh_q_11mm.jpg', NULL, NULL),
(73, 'vrh R', 3, '../img/odchovy/vrh_r_07mm.jpg', NULL, NULL),
(74, 'vrh S', 3, '../img/odchovy/vrh_s_07mm.jpg', NULL, NULL),
(75, 'vrh T', 3, '../img/odchovy/vrh_t_14mm.jpg', NULL, NULL),
(76, 'vrh U', 3, '../img/odchovy/vrh_u_12mm.jpg', NULL, NULL),
(77, 'vrh V', 3, '../img/odchovy/vrh_v_10mm.jpg', NULL, NULL),
(78, 'vrh W', 3, '../img/odchovy/vrh_w_12mm.jpg', NULL, NULL),
(79, 'vrh X', 3, '../img/odchovy/vrh_x_11mm.jpg', NULL, NULL),
(80, 'vrh Y', 3, '../img/odchovy/vrh_y_11mm.jpg', NULL, NULL),
(81, 'vrh Z', 3, '../img/odchovy/vrh_z_13mm.jpg', NULL, NULL),
(82, 'vrh A', 4, '../img/odchovy/vrh_a_13mm.jpg', NULL, NULL),
(83, 'vrh B', 4, '../img/odchovy/vrh_b_10mm.jpg', NULL, NULL),
(84, 'vrh C', 4, '../img/odchovy/vrh_c_07mm.jpg', NULL, NULL),
(85, 'vrh D', 4, '../img/odchovy/vrh_d_09mm.jpg', NULL, NULL),
(86, 'vrh E', 4, '../img/odchovy/vrh_e_06mm.jpg', NULL, NULL),
(87, 'vrh F', 4, '../img/odchovy/vrh_f_14mm.jpg', NULL, NULL),
(88, 'vrh G', 4, '../img/odchovy/gabro14mm.jpg', NULL, NULL),
(89, 'vrh H', 4, '../img/odchovy/vrh_h_09mm.jpg', NULL, NULL),
(90, 'vrh CH', 4, '../img/odchovy/vrh_ch_09mm.jpg', NULL, NULL),
(91, 'vrh I', 4, '../img/odchovy/vrh_i_07mm.jpg', NULL, NULL),
(92, 'vrh J', 4, '../img/odchovy/jantar15mm.jpg', NULL, NULL),
(93, 'vrh K', 4, '../img/odchovy/vrh_k_11mm.jpg', NULL, NULL),
(94, 'vrh L', 4, '../img/odchovy/vrh_l_13mm.jpg', NULL, NULL),
(95, 'vrh M', 4, '../img/odchovy/vrh_m_12mm.jpg', NULL, NULL),
(96, 'vrh N', 4, '../img/odchovy/vrh_n_09mm.jpg', NULL, NULL),
(97, 'vrh O', 4, '../img/odchovy/vrh_o_09mm.jpg', NULL, NULL),
(98, 'vrh P', 4, '../img/odchovy/vrh_p_07mm.jpg', NULL, NULL),
(99, 'vrh Q', 4, '../img/odchovy/vrh_q_07mm.jpg', NULL, NULL),
(100, 'vrh R', 4, '../img/odchovy/vrh_r_12mm.jpg', NULL, NULL),
(101, 'vrh S', 4, '../img/odchovy/vrh_s_11mm.jpg', NULL, NULL),
(102, 'vrh T', 4, '../img/odchovy/vrh_t_11mm.jpg', NULL, NULL),
(103, 'vrh U', 4, '../img/odchovy/vrh_u_09mm.jpg', NULL, NULL),
(104, 'vrh V', 4, '../img/odchovy/vrh_v_12mm.jpg', NULL, NULL),
(105, 'vrh W', 4, '../img/odchovy/vrh_w_10mm.jpg', NULL, NULL),
(106, 'vrh X', 4, '../img/odchovy/vrh_x_08mm.jpg', NULL, NULL),
(107, 'vrh Y', 4, '../img/odchovy/vrh_y_15mm.jpg', NULL, NULL),
(108, 'vrh Z', 4, '../img/odchovy/vrh_z_12mm.jpg', NULL, NULL),
(109, 'vrh A', 5, '../img/odchovy/vrh_a_11mm.jpg', NULL, NULL),
(110, 'vrh B', 5, '../img/odchovy/vrh_b_12mm.jpg', NULL, NULL),
(111, 'vrh C', 5, '../img/odchovy/vrh_c_07mm.jpg', NULL, NULL),
(112, 'vrh D', 5, '../img/odchovy/vrh_d_09mm.jpg', NULL, NULL),
(113, 'vrh E', 5, '../img/odchovy/erika11mm.jpg', NULL, NULL),
(114, 'vrh F', 5, '../img/odchovy/vrh_f_07mm.jpg', NULL, NULL),
(115, 'vrh G', 5, '../img/odchovy/vrh_g_07mm.jpg', NULL, NULL),
(116, 'vrh H', 5, '../img/odchovy/hima13mm.jpg', NULL, NULL),
(117, 'vrh CH', 5, '../img/odchovy/vrh_ch_07.jpg', NULL, NULL),
(118, 'vrh I', 5, '../img/odchovy/vrh_i_09mm.jpg', NULL, NULL),
(119, 'vrh J', 5, '../img/odchovy/vrh_j_08mm.jpg', NULL, NULL),
(120, 'vrh K', 5, '../img/odchovy/vrh_k_09mm.jpg', NULL, NULL),
(121, 'vrh L', 5, '../img/odchovy/vrh_l_11mm.jpg', NULL, NULL),
(122, 'vrh M', 5, '../img/odchovy/vrh_m_07mm.jpg', NULL, NULL),
(123, 'vrh N', 5, '../img/odchovy/vrh_n_12mm.jpg', NULL, NULL),
(124, 'vrh O', 5, '../img/odchovy/oliver12mm.jpg', NULL, NULL),
(125, 'vrh P', 5, '../img/odchovy/vrh_p_10mm.jpg', NULL, NULL),
(126, 'vrh Q', 5, '../img/odchovy/vrh_q_13mm.jpg', NULL, NULL),
(127, 'vrh R', 5, '../img/odchovy/vrh_r_06mm.jpg', NULL, NULL),
(128, 'vrh S', 5, '../img/odchovy/vrh_s_05mm.jpg', NULL, NULL),
(129, 'vrh T', 5, '../img/odchovy/vrh_t_11mm.jpg', NULL, NULL),
(130, 'vrh U', 5, '../img/odchovy/vrh_u_12mm.jpg', NULL, NULL),
(131, 'vrh V', 5, '../img/odchovy/vrh_v_10mm.jpg', NULL, NULL),
(132, 'vrh W', 5, '../img/odchovy/vrh_w_10mm.jpg', NULL, NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `kotata`
--
ALTER TABLE `kotata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `litter_id` (`litter_id`);

--
-- Indexy pro tabulku `kotata_obrazky`
--
ALTER TABLE `kotata_obrazky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitten_id` (`kitten_id`);

--
-- Indexy pro tabulku `litters`
--
ALTER TABLE `litters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kotata`
--
ALTER TABLE `kotata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pro tabulku `kotata_obrazky`
--
ALTER TABLE `kotata_obrazky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT pro tabulku `litters`
--
ALTER TABLE `litters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `kotata`
--
ALTER TABLE `kotata`
  ADD CONSTRAINT `kotata_ibfk_1` FOREIGN KEY (`litter_id`) REFERENCES `litters` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `kotata_obrazky`
--
ALTER TABLE `kotata_obrazky`
  ADD CONSTRAINT `kotata_obrazky_ibfk_1` FOREIGN KEY (`kitten_id`) REFERENCES `kotata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
