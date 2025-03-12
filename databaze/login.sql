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
-- Databáze: `login`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'dani', '$2y$10$80FGv.LlDXnAzYdRnOBgGOMmnOtGsRnCOrh.Ari0OwsCo32AutE2e', 'admin'),
(2, 'danig', '$2y$10$WQgU3Bp.Vz8Xf7wmz28PqeL6DnGK5ZvLsdz9Ab1TwZnGea9T4flP.', 'user'),
(3, 'danigg', '$2y$10$YR.x.KsLkPozNF1RZjRkO.ZgAKQCRTtF9gnIDkOAuGWgReQeADWjG', 'user'),
(4, 'daniggggg', '$2y$10$4AdpETngUvlP6/lx9Lb5EeRlw10DYPc4IGTYEd85wNzWXNYf0l5qy', 'user'),
(5, 'ggg', '$2y$10$5NX.vBeliIUO0IsZeTJgBu/TSj4Jum7tPxWM0abY/dlCD0xbxmnFm', 'user'),
(6, 'ahoj', '$2y$10$MccOMCMBwJZkTJuMV5HB6.oH.qSIruvSwTvZBd/E5WuaZ2LEQKXcq', 'user'),
(7, 'asdasd', '$2y$10$wb.1PPDk95Kwm6o6i58xRO8yf92iM0pDovSI5eotHPcxOXNnAFkQ2', 'user'),
(8, 'radek', '$2y$10$t3crgtqUGrL2/x0AEwRNG.jQZ9izmypJwkOdSV3FO4ZVDOKIz9Ev2', 'user'),
(9, 'aaa', '$2y$10$MkhiTOZwS0kl.wCsh5QMs.OUMj3g.smG7KG35BEsNAF/ajsIEDTDC', 'user'),
(10, 'hhh', '$2y$10$zE1xYTEEm.BGsf5E2SLXBOacCAh.BspM2XBlMIdccr0ZzwRIAc48S', 'user'),
(11, 'gug', '$2y$10$1P0aoEsAB0OQbc4iiRegoeNp/TXablYP1Z8dbrc7aexKcaJoDsfua', 'user'),
(12, 'gugu', '$2y$10$6ZJbSjG8Kr0dqnyNL4GU2eM9E/hGqETPLefxBkbulcWQdw.SlDTz.', 'user'),
(13, 'ff', '$2y$10$ryMh2TAYJv00bI4Lxi1UWu9kWXZdJVCF93VwkByhp82FC37N3NqdO', 'user'),
(14, 'kkjljk', '$2y$10$Sk2M2i2Wi51PZ.1.WTLDJu.qWZWYhcTQlTAswiwsseCHP0.xmel0m', 'user'),
(15, 'dannn', '$2y$10$mfhAvzBYBJBRtYa9ne637O41MdAG3fhQZ9U7MGXAl/Ck9SMVxxicO', 'user'),
(16, 'dadadadada', '$2y$10$zsrDKzt.YjGgOj5x9MxflegKkZ9c7v/sDluF7pgYRuQ4ttNJeBvji', 'user'),
(17, 'ppp', '$2y$10$yZKbdBi8dRyImV1cGZmANeelaLiU5JWtQjjShBR50BwBvRviKQWs.', 'user'),
(18, 'filur', '$2y$10$lzE0E9QvggkXyDBC8vr48uzOAz/SG26Zh5wrPe3sVH6FQ1cX4nR62', 'user'),
(19, 'mmm', '$2y$10$WhrYi/pz/agE4fqRnGzAh.ujGyNj8uM3jZgUp1r17CMPAgMU65uaW', 'user'),
(20, 'negr', '$2y$10$Agl6StaTDsj71vM4TKWT4eVnskgxZSAas5W69V2gvdMLCphkpJ2XK', 'user'),
(21, 'danik', '$2y$10$MptCd3yNDYsBGCNOS/CRRekSz.N3SQH8/qcjqbxy53tGWUquxiIpy', 'user'),
(22, 'mimi', '$2y$10$NFdp05sFEzR/LEX5nCVmPupSnEaG2h13XCf1gBaTs.MSFbQ.MSebW', 'user'),
(23, 'mimiki', '$2y$10$86iZ1cLe7xYAKxuG4.ZS0uVvQT83uIUxsnUJrgeWqZyWtPJrq94SO', 'user'),
(24, 'havel', '$2y$10$tSUqk0PsnIjFXe9YZlDDTOHDZE95x15OSY7.r1WDp/TkboWbfW6kG', 'user'),
(25, 'zlamama', '$2y$10$3UOXKFk.91sq4FWIhY64XuE3qrkieu89Ds6NJ5GvJ1rbF7hiqOlDS', 'user'),
(26, 'ncncnc', '$2y$10$dkKhG6/zX6zTVMcGoGy4xuP.yEs6/H.142K.cSP.K9czxyOHGVoUa', 'user'),
(27, 'admin', '$2y$10$U1AEzCVwySUH/FyZfr83guDzBR4pWlC.hpiAGaMY5igiUFOgbRTXy', 'admin');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
