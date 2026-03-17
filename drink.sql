-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 mars 2026 kl 13:50
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `drink`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_drinks`
--

CREATE TABLE `tbl_drinks` (
  `id` int(11) NOT NULL,
  `drinkname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `recipe` text NOT NULL,
  `alcoholic` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_drinks`
--

INSERT INTO `tbl_drinks` (`id`, `drinkname`, `description`, `ingredients`, `recipe`, `alcoholic`) VALUES
(1, 'Bloody Mary', 'Almost a salad, eh?', '6 cl Vodka\r\n20 cl Tomato Juice\r\nSalt & pepper\r\nA dash of Tabasco sauce\r\nStalk of sellery for decoration', 'Pour Tomato juice in tall glass.\r\nAdd vodka.\r\nAdd salt, pepper and Tabasco after your own taste. \r\nGarnish with sellery. ', 1),
(2, 'Atheist revenge', 'Makes you unbelive', '10 cl Absinthe\r\n10 cl Vodka\r\n10 cl White rum\r\n10 cl Chocolate sauce\r\n4L Coca Cola\r\n', 'Mix everything, shake into a big bang.', 1),
(3, 'McDonalds', 'I&#039;m loving it!', '25 cl Coca cola\r\n3 chicken nuggets\r\nLime slice', 'Pour the cola in a tall glass.\r\nAdd the chicken nuggets.\r\nDecorate with the lime slice', 0),
(4, 'Pinki', 'J&auml;vligt god', 'Monin, grenaide\r\nmilk\r\n3cl vodka\r\n3cl rom\r\nLots of fucking ice\r\n', 'Blending every shit together', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `drinkID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_ratings`
--

INSERT INTO `tbl_ratings` (`id`, `rating`, `drinkID`, `userID`) VALUES
(2, 4, 1, 3),
(3, 1, 4, 3),
(4, 4, 3, 3),
(5, 5, 2, 3),
(7, 3, 0, 3),
(8, 5, 2, 7),
(9, 2, 1, 7);

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` int(11) NOT NULL DEFAULT 5,
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `realname` varchar(80) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `userlevel`, `lastlogin`, `realname`, `mail`, `created`) VALUES
(3, 'Ludvig', 'e99a18c428cb38d5f260853678922e03', 99900, '2026-03-05 12:58:35', 'Ludvig Norberg', 'ludnor23@utb.karlskoga.se', '2026-02-11 11:46:08'),
(6, 'stig', '73a7ef3cca107360e7707f0b28064de7', 5, '2026-02-27 10:55:51', 'Stig Bandoleras', 'stig@matic.com', '2026-02-27 10:55:51'),
(7, 'britt', 'e99a18c428cb38d5f260853678922e03', 10, '2026-03-13 10:16:59', 'Britt Ekland', 'britt.ekland@bondbrud.se', '2026-03-13 10:16:59');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tbl_drinks`
--
ALTER TABLE `tbl_drinks`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tbl_drinks`
--
ALTER TABLE `tbl_drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
