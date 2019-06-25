-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Cze 2019, 15:26
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `podatki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tab_loginow`
--

CREATE TABLE `tab_loginow` (
  `USER_ID` int(12) NOT NULL,
  `e-mail` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `haslo` varchar(24) COLLATE utf16_polish_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf16_polish_ci NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Zrzut danych tabeli `tab_loginow`
--

INSERT INTO `tab_loginow` (`USER_ID`, `e-mail`, `haslo`, `pesel`, `admin`) VALUES
(2, 'kamil@kamil.pl', 'kamil2', '67898764567', 0),
(3, 'kamil2@kamil.pl', 'kamil2', '92123213213', 0),
(4, 'pwsz@pwsz.pl', 'ws130256', '01010112345', 1),
(7, 'kamil3@kamil.pl', 'kamil2', '12345678921', 0),
(8, 'kamil4@kamil.pl', 'kamil2', '12345678981', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tab_podatkow`
--

CREATE TABLE `tab_podatkow` (
  `ID` int(11) NOT NULL,
  `podstawa_opodatkowania` decimal(20,2) NOT NULL,
  `przychod` decimal(20,2) NOT NULL,
  `koszty_uzyskania_przychodu` decimal(20,2) NOT NULL,
  `dochod` decimal(20,2) NOT NULL,
  `skladki_spoleczne` decimal(20,2) NOT NULL,
  `podatek_wedlug_skali` decimal(20,2) NOT NULL,
  `skladki_zdrowotne` decimal(20,2) NOT NULL,
  `podatek_nalezny` decimal(20,2) NOT NULL,
  `rok_obrachunkowy` varchar(4) COLLATE utf16_polish_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf16_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Zrzut danych tabeli `tab_podatkow`
--

INSERT INTO `tab_podatkow` (`ID`, `podstawa_opodatkowania`, `przychod`, `koszty_uzyskania_przychodu`, `dochod`, `skladki_spoleczne`, `podatek_wedlug_skali`, `skladki_zdrowotne`, `podatek_nalezny`, `rok_obrachunkowy`, `pesel`) VALUES
(22, '4455.00', '4567.00', '67.00', '4500.00', '45.00', '0.00', '0.00', '0.00', '2018', '67898764567'),
(24, '30766.00', '34567.00', '3456.00', '31111.00', '345.00', '4981.86', '448.37', '4533.49', '2018', '92123213213'),
(27, '230655.00', '234567.00', '456.00', '234111.00', '3456.00', '61835.68', '5565.21', '56270.47', '2019', '67898764567'),
(28, '199544.00', '234567.00', '34567.00', '200000.00', '456.00', '51880.16', '4669.21', '47210.95', '2017', '12345678921'),
(31, '31033.00', '34567.00', '3213.00', '31354.00', '321.00', '5029.92', '452.69', '4577.23', '2017', '12345678981'),
(32, '0.00', '31.00', '28.00', '3.00', '3.00', '0.00', '0.00', '0.00', '2018', '12345678981');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tab_podstawowa`
--

CREATE TABLE `tab_podstawowa` (
  `pesel` varchar(11) COLLATE utf16_polish_ci NOT NULL,
  `imie` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf16_polish_ci DEFAULT NULL,
  `e-mail` varchar(50) COLLATE utf16_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Zrzut danych tabeli `tab_podstawowa`
--

INSERT INTO `tab_podstawowa` (`pesel`, `imie`, `nazwisko`, `telefon`, `e-mail`) VALUES
('01010112345', 'StanisÅ‚aw', 'Wszelak', '2222222222', 'pwsz@pwsz.pl'),
('12345678921', 'kamil', 'kamil', '123456789', 'kamil3@kamil.pl'),
('12345678981', 'kamil', 'kamilek', '987654321', 'kamil4@kamil.pl'),
('67898764567', 'fghjk', 'ghjk', '5675656', 'kamil@kamil.pl'),
('92123213213', 'Kamil', 'Weclewski', '123456789', 'kamil2@kamil.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `tab_loginow`
--
ALTER TABLE `tab_loginow`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `pesel` (`pesel`);

--
-- Indeksy dla tabeli `tab_podatkow`
--
ALTER TABLE `tab_podatkow`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pesel` (`pesel`);

--
-- Indeksy dla tabeli `tab_podstawowa`
--
ALTER TABLE `tab_podstawowa`
  ADD PRIMARY KEY (`pesel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `tab_loginow`
--
ALTER TABLE `tab_loginow`
  MODIFY `USER_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `tab_podatkow`
--
ALTER TABLE `tab_podatkow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `tab_loginow`
--
ALTER TABLE `tab_loginow`
  ADD CONSTRAINT `tab_loginow_ibfk_1` FOREIGN KEY (`pesel`) REFERENCES `tab_podstawowa` (`pesel`);

--
-- Ograniczenia dla tabeli `tab_podatkow`
--
ALTER TABLE `tab_podatkow`
  ADD CONSTRAINT `pesel` FOREIGN KEY (`pesel`) REFERENCES `tab_podstawowa` (`pesel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
