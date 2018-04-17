-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 09:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-przychodnia`
--

-- --------------------------------------------------------

--
-- Table structure for table `dane_logowania`
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
-- Dumping data for table `dane_logowania`
--

INSERT INTO `dane_logowania` (`idDane_logowania`, `E-mail`, `Nazwa_uzytkownika`, `Haslo`, `Pacjent`, `ID`) VALUES
(3, 'qwe@qwe.qwe', 'Jan', '$2y$10$fsdQcnzqAdlBFSgVJfcULONPO3fKAEczMiCxEsprS.z7gil53b2E2', 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `lekarze`
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
  `Specjalizacja` varchar(45) DEFAULT NULL,
  `Wizyty_idWizyty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pacjenci`
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
  `Miasto` varchar(45) DEFAULT NULL,
  `Wizyty_idWizyty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pacjenci`
--

INSERT INTO `pacjenci` (`idPacjenci`, `Imie`, `Nazwisko`, `Pesel`, `Data urodzenia`, `Plec`, `Ulica`, `Kod pocztowy`, `Miasto`, `Wizyty_idWizyty`) VALUES
(35, 'qwe', 'qwe', '234', '0000-00-00', 'helikopte', 'asd', 'asddd', 'asd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wizyty`
--

CREATE TABLE `wizyty` (
  `idWizyty` int(11) NOT NULL,
  `Data` date DEFAULT NULL,
  `Godzina` datetime DEFAULT NULL,
  `idPacjent` int(11) DEFAULT NULL,
  `idLekarz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD PRIMARY KEY (`idDane_logowania`);

--
-- Indexes for table `lekarze`
--
ALTER TABLE `lekarze`
  ADD PRIMARY KEY (`idLekarze`,`Wizyty_idWizyty`),
  ADD KEY `fk_Lekarze_Wizyty_idx` (`Wizyty_idWizyty`);

--
-- Indexes for table `pacjenci`
--
ALTER TABLE `pacjenci`
  ADD PRIMARY KEY (`idPacjenci`),
  ADD KEY `fk_Pacjenci_Wizyty1_idx` (`Wizyty_idWizyty`);

--
-- Indexes for table `wizyty`
--
ALTER TABLE `wizyty`
  ADD PRIMARY KEY (`idWizyty`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dane_logowania`
--
ALTER TABLE `dane_logowania`
  MODIFY `idDane_logowania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pacjenci`
--
ALTER TABLE `pacjenci`
  MODIFY `idPacjenci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lekarze`
--
ALTER TABLE `lekarze`
  ADD CONSTRAINT `fk_Lekarze_Wizyty` FOREIGN KEY (`Wizyty_idWizyty`) REFERENCES `wizyty` (`idWizyty`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pacjenci`
--
ALTER TABLE `pacjenci`
  ADD CONSTRAINT `fk_Pacjenci_Wizyty1` FOREIGN KEY (`Wizyty_idWizyty`) REFERENCES `wizyty` (`idWizyty`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
