-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 22 Lut 2023, 15:12
-- Wersja serwera: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- Wersja PHP: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `nk_metamorfoza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `godz_otwarcia`
--

CREATE TABLE `godz_otwarcia` (
  `id` int(1) NOT NULL,
  `dzien` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_polish_ci NOT NULL,
  `otwarcie` varchar(5) NOT NULL,
  `zamkniecie` varchar(5) NOT NULL,
  `czy_zamkniete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `godz_otwarcia`
--

INSERT INTO `godz_otwarcia` (`id`, `dzien`, `otwarcie`, `zamkniecie`, `czy_zamkniete`) VALUES
(1, 'poniedziałek', '09:00', '19:00', 0),
(2, 'wtorek', '09:00', '19:00', 0),
(3, 'środa', '09:00', '19:00', 0),
(4, 'czwartek', '09:00', '19:00', 0),
(5, 'piątek', '09:00', '19:00', 0),
(6, 'sobota', '08:00', '16:00', 0),
(7, 'niedziela', '00:00', '00:00', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(2) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'fryzjer');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int(3) NOT NULL,
  `nazwa` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_polish_ci NOT NULL,
  `kategoria` int(2) NOT NULL,
  `cena` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uslugi`
--

INSERT INTO `uslugi` (`id`, `nazwa`, `kategoria`, `cena`) VALUES
(1, 'strzyżenie damskie - włosy krótkie', 1, 60),
(2, 'strzyżenie damskie - włosy półdługie', 1, 80),
(3, 'strzyżenie damskie - włosy długie', 1, 90);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `godz_otwarcia`
--
ALTER TABLE `godz_otwarcia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `godz_otwarcia`
--
ALTER TABLE `godz_otwarcia`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
