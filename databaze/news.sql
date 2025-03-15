-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 15. bře 2025, 05:02
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
-- Databáze: `news`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` date DEFAULT curdate(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `image`) VALUES
(1, 'Máme nová koťátka - vrh \"X\" a vrh \"Y\"', '22.11. 2024 se nám narodili 2 holky a 3 kluci ze spojení Angela Garfield\'s Baby a Kristian A Lynx Star. \r\n28.11. 2024 se nám narodila holka a 3 kluci ze spojení Katelynn Garfield\'s Baby a Kristian A Lynx Star.', '2025-01-10', NULL),
(2, 'Máme nová koťátka - vrh \"V\" a vrh \"W\"', '21.10. 2024 se nám narodila holka a 3 kluci ze spojení Hany Garfield\'s Baby a Kristian A Lynx Star. \r\n25.10. 2024 se nám narodila holka a 3 kluci ze spojení Quella Garfield\'s Baby a Kristian A Lynx Star.', '2025-01-10', NULL),
(3, 'Máme nová koťátka - vrh \"U\"', '12.9. 2024 se nám narodili 2 holky a kluk ze spojení Cassandra Garfield\'s Baby a Kristian A Lynx Star.', '2024-11-09', NULL),
(4, 'Kristian a Lynx Star - nový krycí kocour', 'V sekci Kocouři představujeme nového krycího kocoura. Najdete zde jeho profilové fotografie včetně rodokmenu.', '2024-11-09', NULL),
(5, 'Tari a Tazen Garfield\'s Baby - poslední volná kočička a kocourek z vrhu T', 'Podívejte se na nové fotografie posledních volných koťátek z vrhu T.', '2024-10-02', NULL),
(6, 'Safi Garfield\'s Baby - poslední volný kocourek z vrhu S ihned k odběru', 'Poslední volný kocourek z vrhu S ihned k odběru. Podívejte se na nové fotografie.', '2024-08-27', NULL),
(7, 'Máme nová koťátka - vrh \"T\"', '31.5. 2024 se nám narodili 3 kluci a 3 holky ze spojení Katelynn Garfield\'s Baby a Yogurt Marelax Pride.', '2024-08-27', NULL),
(8, 'Máme nová koťátka - vrh \"R\" a vrh \"S\"', '21.4. 2024 se nám narodili 2 kluci ze spojení Happy Agostino a Yogurt Marelax Pride. \r\n25.4. 2024 se nám narodili 3 holky a 4 kluci ze spojení Olivia Garfield\'s Baby a Yogurt Marelax Pride.', '2024-06-10', NULL),
(9, 'Máme nová koťátka - vrh \"Q\"', '8.12. 2023 se nám narodili 4 holky a 2 kluci ze spojení Hany Garfield\'s Baby a Yogurt Marelax Pride.', '2024-03-18', NULL),
(10, 'Máme nová koťátka - vrh \"O\" a vrh \"P\"', '13.10. 2023 se nám narodil kluk ze spojení Happy Agostino a Yogurt Marelax Pride. \r\n23.10. 2023 se nám narodili 3 holky a 6 kluků ze spojení Quella Garfield\'s Baby a Yogurt Marelax Pride.', '2024-01-17', NULL),
(11, 'Poslední volná kočička z vrhu L ihned k odběru!', 'Lenny Garfield\'s Baby - Poslední volná kočička z vrhu L (spojení Omarion Queen of Dan a HoneyDevil Nectarine) ihned k odběru.', '2023-11-15', NULL),
(12, 'Máme nová koťátka - vrh \"N\"', '2.8. 2023 se nám narodili 4 holky a kluk ze spojení Pady Garfield\'s Baby a Yogurt Marelax Pride.', '2023-08-02', NULL),
(13, 'Kristian a Lynx Star - nový krycí kocour', 'V sekci Kocouři představujeme nového krycího kocoura. Najdete zde jeho profilové fotografie včetně rodokmenu.', '2023-09-07', NULL),
(14, 'Máme nová koťátka - vrh \"L\" a vrh \"M\"', '7.6. 2023 se nám narodilo 6 holek a 3 kluci ze spojení Omarion Queen of Dan a HoneyDevil Nectarine. \r\n7.7. 2023 se nám narodili 4 holky a kluk ze spojení Angela Garfield\'s Baby a HoneyDevil Nectarine.', '2023-09-07', NULL),
(15, 'Poslední volný kocourek z vrhu J ihned k odběru!', 'Jerry Garfield\'s Baby - Poslední volný kocourek z vrhu J (spojení Quella Garfield\'s Baby a Hope Garfield\'s Baby) ihned k odběru.', '2023-07-18', NULL),
(16, 'Máme nová koťátka - vrh \"I\" a vrh \"J\"', '23.3. 2023 se nám narodila holka a 5 kluků ze spojení Debbie Garfield\'s Baby a Hope Garfield\'s Baby. \r\n27.3. 2023 se nám narodilo 5 holek a 3 kluci ze spojení Quella Garfield\'s Baby a Hope Garfield\'s Baby.', '2023-06-07', NULL),
(17, 'Máme nová koťátka - vrh \"CH\", \"I\" a \"J\"', '24.2. 2023 se nám narodilo 6 kluků ze spojení Katelynn Garfield\'s Baby a Samurai Oxymoron. \r\n23.3. 2023 se nám narodila 6 koťátek ze spojení Debbie Garfield\'s Baby a Hope Garfield\'s Baby. \r\n27.3. 2023 se nám narodilo 8 koťátek ze spojení Quella Garfield\'s Baby a Hope Garfield\'s Baby.', '2023-04-25', NULL),
(18, 'Máme nové koťátko - vrh \"H\"', '12. 1. 2023 se nám narodila holka ze spojení Rachel Garfield\'s Baby a Samurai Oxymoron.', '2023-03-21', NULL),
(19, 'Máme nová koťátka - vrh \"F\" a vrh \"G\"', '20. 10. 2022 se nám narodili 4 holky a 4 kluci ze spojení Omarion Queen of Dan a Hope Garfield\'s Baby. \r\n21. 10. 2022 se nám narodili 2 holky a 2 kluci ze spojení Quella Garfield\'s Baby a Hope Garfield\'s Baby.', '2023-12-20', NULL),
(20, 'Máme nové koťátko - vrh \"E\"', '25. 8. 2022 se nám narodila holka ze spojení Kamey Garfield\'s Baby a HoneyDevil Nectarine.', '2022-12-02', NULL),
(21, 'Nová chovná kočka - Omarion Queen of Dan', 'V sekci Kočky představujeme novou chovnou kočku. Najdete zde její profilové fotografie včetně rodokmenu.', '2022-09-16', NULL),
(22, 'Máme nová koťátka - vrh \"D\"', '30. 6. 2022 se nám narodily 3 holky ze spojení Pady Garfield\'s Baby a HoneyDevil Nectarine.', '2022-09-16', NULL),
(23, 'Máme nová koťátka - vrh \"C\" - poslední dva volní kluci', 'Nové fotografie všech koťátek z vrhu C.', '2022-08-12', NULL),
(24, 'Máme nová koťátka - vrh \"A\" a vrh \"B\"', '20. 4. 2022 se nám narodili 3 holky a 3 kluci ze spojení Kisha Garfield\'s Baby a HoneyDevil Nectarine.\r\n16. 5. 2022 se nám narodila holka a 3 kluci ze spojení Cassandra Garfield\'s Baby a HoneyDevil Nectarine.', '2022-08-12', NULL),
(25, 'Nový krycí kocour - Samurai Oxymoron', 'V sekci Kocouři představujeme nového krycího kocoura. Najdete zde jeho profilové fotografie včetně rodokmenu.', '2022-08-12', NULL),
(26, 'Yves - poslední volný kocourek z vrhu Y', 'Máme posledního volného kocourka z vrhu Y. Podívejte se na nové fotografie.', '2022-07-19', NULL),
(27, 'Máme nová koťátka - vrh \"Z\"', '13. 4. 2022 se nám narodili 2 holky a 5 kluků ze spojení Angela Garfield\'s Baby a HoneyDevil Nectarine.', '2022-07-19', NULL),
(28, 'Nová chovná kočička - Olivia Garfield\'s Baby', 'V sekci Kočky představujeme novou chovnou kočičku. Najdete zde její profilové fotografie včetně rodokmenu.', '2022-06-23', NULL),
(29, 'Fotografie nových koťátek - vrh \"Y\"', '1. 3. 2022 se nám narodila holka a 2 kluci ze spojení Kamey Garfield\'s Baby a HoneyDevil Nectarine.', '2022-06-21', NULL),
(30, 'Máme nová koťátka - více informací na telefonu 603 285 744', 'Podívejte se na naše nové koťátka. Více informací najdete na telefonu 603 285 744.', '2022-04-25', NULL),
(31, 'Máme nová koťátka - vrh \"W\" a vrh \"X\"', '16. 12. 2021 se nám narodili 2 holky a 3 kluci ze spojení Debbie Garfield\'s Baby a Hope Garfield\'s Baby. \r\n2. 1. 2022 se nám narodili 2 holky a 4 kluci ze spojení Rachel Garfield\'s Baby a Hope Garfield\'s Baby.', '2022-03-10', NULL),
(32, 'Máme nová koťátka - vrh \"V\"', '2. 12. 2021 se nám narodila holka a 3 kluci ze spojení Pady Garfield\'s Baby a Hope Garfield\'s Baby.', '2022-01-28', NULL),
(33, 'Máme nová koťátka - vrh \"T\" a vrh \"U\"', '9. 9. 2021 se nám narodili 2 holky a 5 kluků ze spojení Quella Garfield\'s Baby a Hope Garfield\'s Baby. \r\n24. 9. 2021 se nám narodili 4 holky a 2 kluci ze spojení Hany Garfield\'s Baby a Mario Noblesse A Lynx Star.', '2021-12-08', NULL),
(34, 'Máme nová koťátka - vrh \"R\" a vrh \"S\"', '27. 7. 2021 se nám narodila holka a 3 kluci ze spojení Rachel Garfield\'s Baby a Mario Noblesse A Lynx Star. \r\n1. 8. 2021 se nám narodili 3 holky a 3 kluci ze spojení Katelynn Garfield\'s Baby a Mario Noblesse A Lynx Star.', '2021-10-20', NULL),
(35, 'Máme nová koťátka - vrh \"Q\"', '12. 6. 2021 se nám narodili 2 holky a 3 kluci ze spojení Angela Garfield\'s Baby a HoneyDevil Nectarine.', '2021-10-13', NULL),
(36, 'Představujeme novou chovnou kočičku - Angela Garfield\'s Baby', 'Aktuální fotografie Angely včetně rodokmenu najdete v sekci Kočky.', '2021-08-09', NULL),
(37, 'Máme nová koťátka - vrh \"N\" a vrh \"O\"', '24. 5. 2021 se nám narodili 2 holky a kluk ze spojení Pady Garfield\'s Baby a HoneyDevil Nectarine. \r\n25. 5. 2021 se nám narodila holka a 4 kluci ze spojení Rebeka Garfield\'s Baby a HoneyDevil Nectarine.', '2021-08-09', NULL),
(38, 'Máme nová koťátka - vrh \"P\"', '10. 6. 2021 se nám narodili 3 holky a kluk ze spojení Happy Agostino a HoneyDevil Nectarine.', '2021-06-14', NULL),
(39, 'Máme nová koťátka - vrh \"L\" a vrh \"M\"', '26. 1. 2021 se nám narodili 2 holky a 4 kluci ze spojení Ellen A Lynx Star a HoneyDevil Nectarine. \r\n1. 2. 2021 se nám narodili 2 holky a 5 kluků ze spojení Quella Garfield\'s Baby a HoneyDevil Nectarine.', '2021-05-14', NULL),
(40, 'Máme nová koťátka - vrh \"K\"', '16. 12. 2020 se nám narodilo 5 holek a 2 kluci ze spojení Rachel Garfield\'s Baby a HoneyDevil Nectarine.', '2021-03-03', NULL),
(41, 'Máme nová koťátka - vrh \"I\" a vrh \"J\"', '26. 8. 2020 se nám narodili 3 holky a 3 kluci ze spojení Cassandra Garfield\'s Baby a Zucchero A Lynx Star. \r\n23. 9. 2020 se nám narodil kluk ze spojení Quella Garfield\'s Baby a HoneyDevil Nectarine.', '2021-02-03', NULL),
(42, 'Máme nová koťátka - vrh \"H\"', '8. 8. 2020 se nám narodila holka a 3 kluci ze spojení Happy Agostino a Zucchero A Lynx Star.', '2020-10-20', NULL),
(43, 'Máme nová koťátka - vrh \"CH\"', '10. 8. 2020 se nám narodilo 5 holek a 4 kluci ze spojení Kisha Garfield\'s Baby a Zucchero A Lynx Star.', '2020-10-20', NULL),
(44, 'Máme nová koťátka - vrh \"F\"', '24. 6. 2020 se nám narodili 3 holky a 3 kluci ze spojení Debbie Garfield\'s Baby a Zucchero A Lynx Star.', '2020-10-05', NULL),
(45, 'Máme nová koťátka - vrh \"G\"', '25. 6. 2020 se nám narodil kocourek Gabro ze spojení Hany Garfield\'s Baby a Zucchero A Lynx Star.', '2020-10-05', NULL),
(46, 'Nová chovná kočička - Hany Garfield\'s Baby', 'V sekci Kočky představujeme novou chovnou kočičku. Najdete zde její profilové fotografie včetně rodokmenu.', '2020-10-05', NULL),
(47, 'Máme nová koťátka - vrh \"D\"', '17. 4. 2020 se nám narodila holka a 4 kluci ze spojení Katelynn Garfield\'s Baby a Zucchero A Lynx Star.', '2020-06-26', NULL),
(48, 'Máme nová koťátka - vrh \"E\"', '3. 5. 2020 se nám narodili 4 holky a 3 kluci ze spojení Rebeka Garfield\'s Baby a Zucchero A Lynx Star.', '2020-06-26', NULL),
(49, 'Nová chovná kočička - Katelynn Garfield\'s Baby', 'V sekci Kočky představujeme novou chovnou kočičku. Najdete zde její profilové fotografie včetně rodokmenu.', '2020-06-26', NULL),
(50, 'Máme nová koťátka - vrh \"C\"', '3. 3. 2020 se nám narodili 2 holky a 3 kluci ze spojení Kamey Garfield\'s Baby a Zucchero A Lynx Star.', '2020-05-05', NULL),
(51, 'Nové fotografie koťátek z vrhu \"B\"', 'Do sekce Odchovy jsme přesunuli koťátka z vrhu B a doplnili jejich aktuální fotografie.', '2020-03-25', NULL),
(52, 'Máme nová koťátka - vrh \"B\"', '9. 2. 2020 se nám narodili 2 holky a 3 kluci ze spojení Pady Garfield\'s Baby a Zucchero A Lynx Star.', '2020-03-02', NULL),
(53, 'Zora Garfield\'s Baby - poslední volná kočička z vrhu \"Z\"', 'Máme nová koťátka - vrh \"Z\". 20. 11. 2019 se nám narodili 4 holky a 2 kluci ze spojení Mauglina Garfield\'s Baby a Zucchero A Lynx Star.', '2020-03-02', NULL),
(54, 'Máme nová koťátka - vrh \"A\"', '22. 11. 2019 se nám narodili 4 holky a kluk ze spojení Kisha Garfield\'s Baby a Zucchero A Lynx Star.', '2020-03-02', NULL),
(55, 'Máme nová koťátka - vrh \"Y\"', '4. listopadu 2019 se nám narodili 2 holčičky a 2 kluci ze spojení Ellen A Lynx Star a Zucchero A Lynx Star.', '2020-01-31', NULL),
(56, 'Máme nová koťátka - vrh \"X\"', '27. října 2019 se nám narodili 2 holčičky a 2 kluci ze spojení Queeny Bella A Lynx Star a Loki Blue Laguna Leo.', '2020-01-16', NULL),
(57, 'Máme nová koťátka - vrh \"W\"', '22. října 2019 se nám narodili 3 holčičky a 2 kluci ze spojení Elis Garfield\'s Baby a Zucchero A Lynx Star.', '2019-12-16', NULL),
(58, 'Máme nová koťátka - vrh \"V\"', '23. září 2019 se nám narodila holčička a 3 kluci ze spojení Cassandra Garfield\'s Baby a Zucchero A Lynx Star.', '2019-11-04', NULL),
(59, 'Máme nová koťátka - vrh \"U\"', '23. července 2019 se nám narodila holčička a kluk ze spojení Rebeka Garfield\'s Baby a Zucchero A Lynx Star.', '2019-10-24', NULL),
(60, 'Máme nová koťátka - vrh \"T\"', '30. dubna 2019 se nám narodili tři holčičky a dva kluci ze spojení Ornela Garfield\'s Baby a Lukas Baccarcoon.', '2019-09-17', NULL),
(61, 'Nový krycí kocour - Zucchero A Lynx Star', 'Do sekce Kocouři jsme přidali nového krycího kocoura. Najdete zde jeho profilové fotografie včetně rodokmenu.', '2019-06-19', NULL),
(62, 'Máme nová koťátka - vrh \"R\"', '11. dubna 2019 se nám narodili dvě holčičky a dva kluci ze spojení Cassandra Garfield\'s Baby a Lukas Baccarcoon.', '2019-06-19', NULL),
(63, 'Máme nová koťátka - vrh \"S\"', '15. dubna 2019 se nám narodili dvě holky a dva kluci ze spojení Debbie Garfield\'s Baby a Lukas Baccarcoon.', '2019-06-19', NULL),
(64, 'Nová chovná kočička - Cassandra Garfield\'s Baby', 'Do sekce Kočky jsme přidali Cassandru Garfield\'s Baby.', '2019-06-19', NULL),
(65, 'Máme nová koťátka - vrh \"Q\"', '14. 3. 2019 se nám narodili 3 holčičky a 2 kluci ze spojení Mauglina Garfield\'s Baby a Lukas Baccarcoon.', '2019-05-16', NULL),
(66, 'Máme nová koťátka - vrh \"P\"', '2. 2. 2019 se nám narodila holčička a kluk ze spojení Happy Agostino a Lukas Baccarcoon.', '2019-04-03', NULL),
(67, 'Představujeme dvě nové chovné kočičky', 'Jejich aktuální fotografie najdete v sekci Kočky.', '2019-02-03', NULL),
(68, 'Máme nová koťátka - vrh \"O\"', '10. 12. 2018 se nám narodila holčička a 2 kluci ze spojení Schery Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-12-10', NULL),
(69, 'Máme nová koťátka - vrhy \"M\" a \"N\"', 'VRH \"M\" 21. 10. 2018 se nám narodili 3 holky a 4 kluci ze spojení Rebeka Garfield\'s Baby a Lukas Baccaracoon. VRH \"N\" 10. 11. 2018 se nám narodili 2 holky a 3 kluci ze spojení Ellen A Lynx Star a Lukas Baccarcoon.', '2018-12-06', NULL),
(70, 'Joana Garfield\'s Baby - ihned k odběru!', 'Poslední volná kočička z vrhu J ihned k odběru. Podívejte se na její aktuální fotografie.', '2018-12-06', NULL),
(71, 'Máme nová koťátka - vrhy \"K\" a \"L\"', 'VRH \"K\" 18. 8. 2018 se nám narodili 2 holky a 3 kluci ze spojení Kamey Garfield\'s Baby a Loki Blue Laguna Leo. VRH \"L\" 30. 8. 2018 se nám narodili 4 holky a 2 kluci ze spojení Pady Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-11-08', NULL),
(72, 'Máme nová koťátka - vrhy \"I\" a \"J\"', 'VRH \"I\" 13. 8. 2018 se nám narodili 3 kluci ze spojení Mauglina Garfield\'s Baby a Jason Agostino. VRH \"J\" 17. 8. 2018 se nám narodili 2 holčičky a kluk ze spojení Osiris Garfield\'s Baby a Jason Agostino.', '2018-09-07', NULL),
(73, 'Nová chovná kočička - Kamey Garfield\'s Baby', 'Profilové fotografie naleznete v sekci Kočky.', '2018-09-07', NULL),
(74, 'Máme nová koťátka - vrh \"H\"', '5. 7. 2018 se nám narodila holčička a 4 kluci ze spojení Happy Agostino a Loki Blue Laguna Leo.', '2018-07-05', NULL),
(75, 'Máme nová koťátka - vrh \"CH\"', '18. 7. 2018 se nám narodili 2 holčičky a 4 kluci ze spojení CH Emphaty Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-07-18', NULL),
(76, 'Máme nová koťátka - vrh \"F\"', '9. 4. 2018 se nám narodily dvě holčičky a tři kluci ze spojení Kisha Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-04-09', NULL),
(77, 'Máme nová koťátka - vrh \"G\"', '16. 4. 2018 se nám narodili dva kluci ze spojení Schery Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-04-16', NULL),
(78, 'Nová chovná kočička - Schery Garfield\'s Baby', 'Do sekce Kočky jsme přidali Schery Garfield\'s Baby.', '2018-04-16', NULL),
(79, 'Nové fotografie koťátek z vrhu \"D\" a \"E\" - 12 týdnů', '12. 5. 2018.', '2018-05-16', NULL),
(80, 'Nové fotografie koťátek z vrhu \"D\" a \"E\" - 8 týdnů', '13. 4. 2018.', '2018-04-13', NULL),
(81, 'Máme nová koťátka - vrh \"D\"', '10. 2. 2018 se nám narodila holčička a pět kluků ze spojení Queeny Bella A Lynx Star a Loki Blue Laguna Leo.', '2018-03-23', NULL),
(82, 'Máme nová koťátka - vrh \"E\"', '12. 2. 2018 se nám narodila holčička a kluk ze spojení Rebeka Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-03-23', NULL),
(83, 'Máme nová koťátka - vrh \"C\"', '6. 12. 2017 se nám narodila holčička a kluk ze spojení Kisha Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-03-13', NULL),
(84, 'Máme nová koťátka - vrh \"B\"', '18. 11. 2017 se nám narodili čtyři holčičky ze spojení Mauglina Garfield\'s Baby a Loki Blue Laguna Leo.', '2018-01-31', NULL),
(85, 'Máme nová koťátka - vrh \"A\"', '29. 10. 2017 se nám narodili tři holčičky a kluk ze spojení Happy Agostino a Chopper Garfield\'s Baby.', '2018-01-17', NULL),
(86, 'Máme nová koťátka - vrh \"Z\"', '9. 10. 2017 se nám narodili 2 kočičky a 2 kocourci ze spojení Queeny Bella A Lynx Star a Chopper Garfield\'s Baby.', '2018-01-10', NULL),
(87, 'Máme nová koťátka - vrh \"Y\"', '3. září 2017 se nám narodili 3 kočičky a 4 kocourci ze spojení CH Emphaty Garfield\'s Baby a Chopper Garfield\'s Baby. Více informací jako vždy v sekci Koťátka', '2017-11-03', NULL),
(88, 'Představujeme dvě nové chovné kočičky', 'V sekci Kočky najdete dvě nové chovné kočičky, jejich aktuální fotografie i rodokmeny.', '2017-10-30', NULL),
(89, 'Představujeme nová koťátka - vrh \"X\"', '12. června 2017 se nám narodili 2 kočičky a kocourek ze spojení Osiris Garfield\'s Baby a Chopper Garfield\'s Baby.', '2017-09-05', NULL),
(90, 'Máme nová koťátka - vrhy \"V\" a \"W\"', 'Představujeme nová koťátka z obou aktuálních vrhů V a W. Podívejte se první fotografie jako vždy v sekci Koťátka.', '2017-06-30', NULL),
(91, 'Profilové fotky krycího kocoura Lokiho', 'Profilové fotky krycího kocoura Lokiho včetně rodokmenu v sekci Kocouři.', '2017-06-30', NULL),
(92, 'Rachel Garfield\'s Baby - ihned k odběru!', 'Poslední volná kočička z vrhu R ihned k odběru. Podívejte se na její aktuální fotografie v sekci Odchovy.', '2017-05-11', NULL),
(93, 'Máme nová koťátka - vrhy \"T\" a \"U\"', 'Představujeme nová koťátka z obou aktuálních vrhů T a U. Podívejte se první fotografie jako vždy v sekci Koťátka.', '2017-05-11', NULL),
(94, 'Máme nová koťátka - Vrh S', 'Představujeme nový vrh koťátek - vrh S. Tři kluci a čtyři holky se narodili 30. prosince 2016 ze spojení CH Emphaty Garfield\'s Baby a Chopper Garfield\'s Baby. Podívejte se na jejich první fotografie.', '2017-03-10', NULL),
(95, 'Představujeme nové chovné kočičky', 'Do sekce Kočky jsme přidali dvě nové chovné kočičky. Najdete zde jejich aktuální fotografie včetně rodokmenu.', '2017-03-03', NULL),
(96, 'Máme nová koťátka - Vrh R', 'Představujeme nový vrh koťátka - vrh R. Tři kluci a jedna holka se narodili 20. prosince 2016 ze spojení Ornela Garfield\'s Baby a Mainefield\'s Harvey. Podívejte se na jejich první fotografie.', '2017-02-14', NULL),
(97, 'Vrh Q - nové fotografie a poslední volná kočička', 'Máme poslední volnou kočičku Quadis z vrhu Q. Podívejte se na aktuální fotografie do sekce Koťátka.', '2017-02-10', NULL),
(98, 'Vyhledávač koťátek :)', 'Zajímá vás jak vypadají koťátka konkrétní barvy? Vyzkoušejte náš vyhledávač koťátek :) Stačí zadat kód barvy a hned se Vám zobrazí veškeré informace o všech našich koťátkách v této barvě.', '2017-01-30', NULL),
(99, 'Máme nová koťátka - vrh Q', '11. listopadu 2016 se nám narodili 2 kočičky a 3 kocourci ze spojení Ellen A Lynx Star a Lukas Baccaracoon. Podívejte se na jejich první fotografie.', '2017-01-17', NULL),
(100, 'Představujeme nové krycí kocoury', 'Vítáme Choppera a Lokiho do naší kočičí rodiny a představujeme jejich první fotografie.', '2016-11-28', NULL),
(101, 'Máme nová koťátka - vrh P', '21. září 2016 se nám narodilo 5 kočiček a 4 kocourci ze spojení Rebeka Garfield\'s Baby a Chopper Garfield\'s Baby. Podívejte se na jejich první fotografie.', '2016-11-21', NULL),
(102, 'Těšte se na první fotografie nového vrhu P - již příští týden', 'Koťátka z vrhu \"N\" byly přesunuty do Odchovů.', '2016-11-11', NULL),
(103, 'Máme nová koťátka - vrh O', '31. srpna 2016 se nám narodili 2 kočičky a kocourek ze spojení CH Arka Garfield\'s Baby a Lukas Baccaracoon. Podívejte se na jejich první fotografie.', '2016-10-21', NULL),
(104, 'Koťátka - vrh N - ihned k odběru!', 'Poslední dvě volné kočičky z vrhu N jsou ihned k odběru.', '2016-10-21', NULL),
(105, 'Máme nová koťátka - vrh N', '18. července 2016 se nám narodili 2 kočičky a 5 kocourků. Podívejte se na jejich první fotografie.', '2016-09-20', NULL),
(106, 'Představujeme koťátka z vrhů L a M', '', '2016-08-19', NULL),
(107, 'Nové fotografie koťátek z obou aktuálních vrhů J a K', '', '2016-03-15', NULL),
(108, 'Kde všude jsou naše koťátka?', 'Do sekce \"O nás\" jsme přidali mapku zemí, ve kterých už jsou naše koťátka a doufáme, že jí budeme s Vaší pomocí nadále rozšiřovat :)', '2016-02-23', NULL),
(109, 'Máme nová koťátka ... - vrh J', 'Představujeme nová koťátka z vrhu J. 2 holčičky a 2 kluci se narodili 21.12.2015 ze spojení CH Arka Garfield\'s Baby a Lukas Baccaracoon.', '2016-02-15', NULL),
(110, '... a hned dva vrhy :) - vrh K', 'Představujeme nová koťátka z vrhu K. Narodila se o dva týdny déle než jejich kamarádi z vrhu J a je jim tedy 6 týdnů :)', '2016-02-15', NULL),
(111, 'DĚKUJEME VÁM ZA PŘÍZEŇ V UPLYNULÉM ROCE A PŘEJEM VŠE NEJLEPŠÍ A SPOUSTU KRÁSNÝCH ZÁŽITKŮ S VAŠIMI MAZLÍČKY V ROCE 2016! :O)', '', '2016-01-09', NULL),
(112, 'Nové fotografie koťátek z vrhu CH', 'Podívejte se jak rostou :o) Už je jim 11 týdnů za nedlouho se vydají do svých nových domovů...', '2015-12-04', NULL),
(113, 'Máme nová koťátka :) - vrh I', 'Představujeme nová koťátka z vrhu I. 3 holčičky a 2 kluci se narodili 24.10.2015 ze spojení Osiris Garfield\'s Baby a Lukas Baccaracoon.', '2015-12-04', NULL),
(114, 'Nové fotografie koťátek z vrhu CH', 'A je to tu :) Nové fotografie koťátek z vrhu CH najdete v sekci Koťátka.', '2015-11-20', NULL),
(115, 'Koťátka - vrh CH', 'Těšte se na nové fotografie koťátek z vrhu CH, již brzy na našich stránkách :) Vrh H přesunut do Odchovů.', '2015-11-04', NULL),
(116, 'Hurricane - poslední volný kocourek z vrhu H', 'Máme posledního volného kocourka z vrhu H. Podívejte se na nové fotografie.', '2015-10-19', NULL),
(117, 'Máme nová koťátka - vrh CH', 'Představujeme nová koťátka z vrhu CH. Tři kluci Chicco, Chopper a Chuck se narodili 14. září a už se na Vás těší :)', '2015-09-30', NULL),
(118, 'Nové fotografie koťátek z vrhu H', 'Vrh G přesunut do Odchovů.', '2015-08-21', NULL),
(119, 'Máme dva nové vrhy G a H', 'Goldie, kočička z vrhu G se narodila 24. 5. 2015. Henk, Huckleberry a Hurricane, 3 kluci z vrhu H, se narodili 25. 7. 2015.', '2015-08-21', NULL),
(120, 'Eminem - poslední volný kocourek z vrhu E', 'Máme posledního volného kocourka z vrhu E. Podívejte se na jeho 15-týdenní fotografie v sekci Koťátka', '2015-07-14', NULL),
(121, 'Máme nové koťátko - Fantasy - vrh F', 'První fotografie Fantasy najdete v sekci Koťátka', '2015-07-14', NULL),
(122, 'Nové fotografie koťátek- vrh E', 'Podívejte se na nové fotografie našich 10-týdenních koťátek z vrhu E.\\nKoťátka z vrhu D přesunuta do Odchovů.', '2015-06-05', NULL),
(124, 'Máme nová koťátka - vrh E', 'Prohlédněte si první fotografie našich nových koťátek', '2015-05-07', NULL),
(125, 'Nové fotografie koťátek z vrhu D', 'Prohlédněte si nové fotografie 6-týdenních koťátek z vrhu D', '2015-04-02', NULL),
(126, 'Máme nová koťátka - vrh D', 'Představujeme první fotografie našich 3-týdenních koťátek z vrhu D. Brzy se těšte na další :)\\nKoťátka z vrhů B a C byla přesunuta do Odchovů.', '2015-03-17', NULL),
(128, 'Opět přinášíme nové fotografie koťátek z obou aktuálních vrhů', '', '2015-01-08', NULL),
(129, 'Nové fotografie koťátek z obou aktuálních vrhů', '', '2014-12-29', NULL),
(130, 'Máme nová koťátka', 'Máme nová koťátka ze dvou vrhů B a C. Více informací naleznete v sekci Koťátka.', '2014-12-29', NULL),
(131, 'Poslední volná koťátka z vrhu \"Z\" ihned k odběru', 'Zoly byla na operaci s ouškem, proto má jednu stranu hlavy vyholenou, ale vše dopadlo dobře a Zoly je v pořádku.', '2013-11-09', NULL),
(132, 'Nové fotografie koťátek z vrhů \"Z\" a \"A\"', 'Více podrobností o koťátkách naleznete jako vždy v sekci Koťátka.', '2013-09-10', NULL),
(133, 'Aktuální fotografie z obou vrhů \"Z\" a \"A\".', '', '2013-08-03', NULL),
(134, 'Představujeme nová koťátka z vrhu \"Z\" a \"A\"', 'Protože jsme u konce abecedy, začínáme znovu od písmene \"A\" :)', '2013-07-18', NULL),
(135, 'Nové fotografie koťátek z vrhu \"Y\"', 'Dne 14. 3. 2013 se nám narodili 3 kluci a 2 holčičky ze spojení Ornela Garfield\'s Baby a CH Cleo Wild Rose.', '2013-06-13', NULL),
(136, 'První fotografie koťátek z vrhu \"Y\"', 'Dne 14. 3. 2013 se nám narodili 3 kluci a 2 holčičky ze spojení Ornela Garfield\'s Baby a CH Cleo Wild Rose.', '2013-05-16', NULL),
(137, 'Nové fotografie koťátek z vrhů \"W\" a \"X\"', '', '2013-04-15', NULL),
(142, 'Shakira Garfield\'s Baby se stala supreme šampionkou!', 'Děkujeme chovatelské stanici Marman\'s maine coon za fotografii ze soutěže a přejem mnoho úspěchů Vám i dalším chovatelům našich koťátek :)', '2016-08-19', NULL),
(143, 'Nové fotografie koťátek - vrh I', 'Podívejte se na nové fotografie koťátek z vrhu I, už je jim 10 týdnů :o)\r\nVrh CH přesunut do Odchovů', '2016-01-09', NULL),
(144, 'Máme nová koťátka - vrh \"Y\"', 'Dne 14.3. se císařským řezem narodili 3 kluci a 2 holky ze spojení Ornela Garfield\'s Baby a CH Cleo Wild Rose. Ornela se o miminka odmítla starat a veškerou péči přenechala s naprostou důvěrou své chovatelce, která již 4 týdny o miminka pečuje. Zatím úspěšně.', '2013-04-15', NULL),
(145, 'Aktualizována sekce Plán\r\n\r\nDo sekce Kočky byla přidána Rebeka Garfield\'s Baby.', '', '2013-04-15', NULL),
(146, 'Nové fotografie koťátek z vrhů \"W\" a \"X\"', '', '2013-03-22', NULL),
(147, 'Představujeme koťátka z vrhu \"W\" a \"X\"', '', '2013-03-22', NULL),
(148, 'Nové fotografie koťátek - vrh \"U\" a \"V\".', '', '2013-01-30', NULL),
(149, 'Máme nová koťátka - vrh \"U\" a \"V\". Podívejte se na jejich první fotografie.', '', '2013-01-04', NULL),
(150, 'Koťátkům z vrhu \"S\" a \"T\" je už 13 týdnů. Podívejte se na jejich fotografie.', '', '2012-10-27', NULL),
(151, 'Přidány nové fotografie koťátek z vrhu \"S\" a \"T\".', '', '2012-09-28', NULL),
(152, 'Představujeme koťátka z vrhu \"S\" a \"T\"', 'Při tragické události během mé nepřítomnosti jsme přišli o 6 koťátek :-(', '2012-09-12', NULL),
(153, 'MÁME NOVÁ KOŤÁTKA - VRH \"S\" a \"T\" - první fotografie již brzy na našich stránkách!', '', '2012-07-31', NULL),
(154, 'Očekáváme nová koťátka! Více informací v sekci Plán.', 'Děkujeme chovatelské stanici Pumelia Garden za nakrytí našich kočiček kocourem Zeusem.', '2012-06-08', NULL),
(155, 'Představujeme odrostlé chovné kočičky Mauglinu, Osiris a Ornelu a nového chovného kocoura Clea.', 'Více informací v sekci Kocouři a Kočky.', '2012-06-08', NULL),
(156, 'Nově vytvořená sekce Kastráti.', '', '2012-06-08', NULL),
(157, 'Vrh Q přesunutý do odchovů.', '', '2012-06-08', NULL),
(158, 'Do odchovů přidán vrh R.', '', '2012-06-08', NULL),
(159, 'Queen - poslední volná kočička z vrhu Q', 'Poslední volné kočičce z vrhu Q je 17 týdnů. Její aktuální fotografie najdete jako vždy v sekci Koťátka.', '2012-03-05', NULL),
(160, 'Dvě volné kočičky z vrhu Q', 'Koťátkům z vrhu Q je právě 14 týdnů.', '2012-02-13', NULL),
(161, 'Přidány nové fotografie koťátek obou aktuálních vrhů \"P\" a \"Q\".', '', '2012-01-20', NULL),
(162, 'Nové fotografie našich obou aktuálních vrhů \"P\" a \"Q\" v sekci Koťátka', '', '2011-12-28', NULL),
(163, 'MÁME NOVÁ KOŤÁTKA', 'Dva nové vrhy koťátek \"P\" a \"Q\" a jejich první fotografie v sekci Koťátka', '2011-12-07', NULL),
(164, 'Naggi Garfield\'s Baby - poslední volná kočička z vrhu \"N\"', 'Už jen jedna volná kočička z vrhu N. Její aktuální fotografie najdete v sekci Koťátka.', '2011-11-15', NULL),
(165, 'Nové fotografie všech tří volných koťátek v sekci Koťátka.', '', '2011-10-29', NULL),
(166, 'Přidány nové fotografie koťátek z vrhu \"M\" a \"O\".', '', '2011-10-17', NULL),
(167, 'Nové fotografie koťátek z vrhu \"N\" v sekci Koťátka.', '', '2011-10-09', NULL),
(168, 'Po dvou týdnech přišlo na řadu opět focení koťátek z vrhu \"M\" a \"O\".', 'Jejich současné fotografie nejdete v sekci Koťátka.', '2011-10-04', NULL),
(169, 'Opět přidáváme nové fotografie koťátek z vrhu N.', '', '2011-09-26', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
