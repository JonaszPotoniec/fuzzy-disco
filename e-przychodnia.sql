-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Kwi 2018, 11:16
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `e-przychodnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_logowania`
--

CREATE TABLE `dane_logowania` (
  `idDane_logowania` int(11) NOT NULL,
  `E-mail` varchar(100) DEFAULT NULL,
  `Nazwa_uzytkownika` varchar(100) DEFAULT NULL,
  `Haslo` varchar(100) DEFAULT NULL,
  `Pacjent` tinyint(1) DEFAULT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `dane_logowania`
--

INSERT INTO `dane_logowania` (`idDane_logowania`, `E-mail`, `Nazwa_uzytkownika`, `Haslo`, `Pacjent`, `ID`) VALUES
(4, 'kacper@2.pl', 'Kacper', '$2y$10$FKicS7VbWkjb4U08kV3LkeGNDmcASNBifNGo2u/SS7bWDx3Gxw/Zi', 1, 36),
(5, 'karolina@2.pl', 'Karolina', '$2y$10$oYbLT5fo5mVvvaklnj4nHeJeqP6FPO5ObC2Rm04Pz4m41xuN/5cvi', 1, 37),
(6, 'maciej@2.pl', 'Maciej', '$2y$10$QUvrOv93qT5gNEaUaggf8.7h3aZewWNwiMzUN518pnsbTYKTqcRBe', 1, 38);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarze`
--

CREATE TABLE `lekarze` (
  `idLekarze` int(11) NOT NULL,
  `Imie` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Pesel` varchar(45) DEFAULT NULL,
  `Nr Gabientu` decimal(4,0) DEFAULT NULL,
  `Ulica` varchar(45) DEFAULT NULL,
  `Kod pocztowy` varchar(45) DEFAULT NULL,
  `Miasto` varchar(45) DEFAULT NULL,
  `Specjalizacja` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `lekarze`
--

INSERT INTO `lekarze` (`idLekarze`, `Imie`, `Nazwisko`, `Pesel`, `Nr Gabientu`, `Ulica`, `Kod pocztowy`, `Miasto`, `Specjalizacja`) VALUES
(0, 'Damian', 'Stasiak', '99022548957', '13', 'Niska', '93-985', 'Łódź', 'Urolog'),
(1, 'Patryk', 'Teskowski', '99010412345', '5', 'Dolna', '98-456', 'Łódź', 'Seksuolog'),
(2, 'Jonasz', 'Potoniec', '99103190321', '1', 'Wysoka', '90-589', 'Łódź', 'Internista'),
(3, 'Hubert', 'Warchoł', '99092722391', '10', 'Jedwabnicza', '92-798', 'Łódź', 'Proktolog');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pacjenci`
--

CREATE TABLE `pacjenci` (
  `idPacjenci` int(11) NOT NULL,
  `Imie` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Pesel` decimal(11,0) DEFAULT NULL,
  `Data urodzenia` date DEFAULT NULL,
  `Plec` varchar(9) DEFAULT NULL,
  `Ulica` varchar(45) DEFAULT NULL,
  `Kod pocztowy` varchar(5) DEFAULT NULL,
  `Miasto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pacjenci`
--

INSERT INTO `pacjenci` (`idPacjenci`, `Imie`, `Nazwisko`, `Pesel`, `Data urodzenia`, `Plec`, `Ulica`, `Kod pocztowy`, `Miasto`) VALUES
(36, 'Kacper', 'Kurowski', '99080236548', '0000-00-00', 'MÄ™Å¼czyz', 'GÃ³rna', '91-85', 'ÅÃ³dÅº'),
(37, 'Karolina', 'Sawczyk', '99122929291', '0000-00-00', 'Kobieta', 'Kolorowa', '90-15', 'ÅÃ³dÅº'),
(38, 'Maciej', 'Bartczak', '99102478456', '0000-00-00', 'MÄ™Å¼czyz', 'Brzydka', '99-55', 'ÅÃ³dÅº');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyty`
--

CREATE TABLE `wizyty` (
  `idWizyty` int(11) NOT NULL,
  `Data` date DEFAULT NULL,
  `Godzina` time DEFAULT NULL,
  `idPacjent` int(11) DEFAULT NULL,
  `idLekarz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `wizyty`
--

INSERT INTO `wizyty` (`idWizyty`, `Data`, `Godzina`, `idPacjent`, `idLekarz`) VALUES
(0, '2018-05-23', '08:00:00', 35, 0),
(1, '2018-05-23', '08:00:00', 35, 0),
(2, '2018-04-27', '13:45:00', 38, 2),
(3, '2018-04-24', '09:15:00', 38, 1),
(4, '2018-04-22', '11:45:00', 36, 0),
(5, '2018-04-30', '12:30:00', 38, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD PRIMARY KEY (`idDane_logowania`);

--
-- Indeksy dla tabeli `lekarze`
--
ALTER TABLE `lekarze`
  ADD PRIMARY KEY (`idLekarze`);

--
-- Indeksy dla tabeli `pacjenci`
--
ALTER TABLE `pacjenci`
  ADD PRIMARY KEY (`idPacjenci`);

--
-- Indeksy dla tabeli `wizyty`
--
ALTER TABLE `wizyty`
  ADD PRIMARY KEY (`idWizyty`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  MODIFY `idDane_logowania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `pacjenci`
--
ALTER TABLE `pacjenci`
  MODIFY `idPacjenci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
