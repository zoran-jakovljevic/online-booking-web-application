-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 02:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turisticka_agencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `sifra_hotela` varchar(20) NOT NULL,
  `naziv_hotela` varchar(20) DEFAULT NULL,
  `grad` varchar(20) DEFAULT NULL,
  `adresa_hotela` varchar(50) DEFAULT NULL,
  `kontakt` int(15) DEFAULT NULL,
  `ocena` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`sifra_hotela`, `naziv_hotela`, `grad`, `adresa_hotela`, `kontakt`, `ocena`) VALUES
('20', 'Hotel Berlin Luxe', 'BERLIN', 'Kreuzberg 28', 2147483647, 5),
('19', 'Hotel Firenze Luxury', 'FIRENCA', 'Ponte Vecchio 5', 2147483647, 5),
('18', 'Hotel Vienna Classic', 'BEC', 'Praterstrasse 7', 431234569, 5),
('17', 'Hotel Roma Elegance', 'RIM', 'Corso 22', 2147483647, 4),
('16', 'Hotel Budapest Elite', 'BUDIMPESTA', 'Buda Castle 16', 361234568, 5),
('15', 'Hotel Istanbul Grand', 'ISTANBUL', 'Sultanahmet 33', 2147483647, 4),
('14', 'Hotel Paris View', 'PARIZ', 'Montmartre 12', 2147483647, 5),
('13', 'Hotel Barcelona Beac', 'BARSELONA', 'Barceloneta 45', 2147483647, 4),
('12', 'Hotel Berlin East', 'BERLIN', 'Alexanderplatz 30', 2147483647, 5),
('11', 'Hotel Firenze Centro', 'FIRENCA', 'Piazza del Duomo 10', 2147483647, 4),
('10', 'Hotel Vienna Deluxe', 'BEC', 'Ringstrasse 15', 431234568, 5),
('9', 'Hotel Roma Palace', 'RIM', 'Piazza Navona 3', 2147483647, 4),
('8', 'Hotel Budapest', 'BUDIMPESTA', 'Andrassy Avenue 22', 361234567, 5),
('7', 'Hotel Istanbul', 'ISTANBUL', 'Istiklal Caddesi 13', 2147483647, 5),
('6', 'Hotel Paris', 'PARIZ', 'Champs-Élysées 8', 2147483647, 5),
('5', 'Hotel Barcelona', 'BARSELONA', 'La Rambla 20', 2147483647, 4),
('4', 'Hotel Berlin', 'BERLIN', 'Unter den Linden 5', 2147483647, 5),
('3', 'Hotel Firenze', 'FIRENCA', 'Via del Corso 14', 2147483647, 4),
('2', 'Hotel Vienna', 'BEC', 'Stephansplatz 2', 431234567, 5),
('1', 'Hotel Roma', 'RIM', 'Via Veneto 1', 2147483647, 5);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `sifra_kataloga` varchar(20) NOT NULL,
  `sifra_hotela` varchar(20) DEFAULT NULL,
  `sifra_sobe` varchar(20) DEFAULT NULL,
  `datum_polaska` date DEFAULT NULL,
  `datum_dolaska` date DEFAULT NULL,
  `cena` int(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`sifra_kataloga`, `sifra_hotela`, `sifra_sobe`, `datum_polaska`, `datum_dolaska`, `cena`) VALUES
('20', '20', '1002', '2024-12-26', '2024-12-30', 700),
('4', '4', '202', '2024-12-01', '2024-12-08', 700),
('1', '1', '101', '2024-12-01', '2024-12-05', 500),
('2', '2', '102', '2024-12-10', '2024-12-15', 450),
('19', '19', '1001', '2024-12-20', '2024-12-25', 600),
('18', '18', '902', '2024-12-15', '2024-12-18', 750),
('17', '17', '901', '2024-12-10', '2024-12-14', 850),
('16', '16', '802', '2024-12-05', '2024-12-09', 500),
('15', '15', '801', '2024-12-01', '2024-12-04', 550),
('14', '14', '702', '2024-12-12', '2024-12-17', 650),
('13', '13', '701', '2024-12-02', '2024-12-07', 700),
('12', '12', '602', '2024-12-07', '2024-12-11', 450),
('11', '11', '601', '2024-12-01', '2024-12-06', 850),
('10', '10', '502', '2024-12-11', '2024-12-14', 600),
('9', '9', '501', '2024-12-05', '2024-12-10', 750),
('8', '8', '402', '2024-11-10', '2024-11-15', 500),
('7', '7', '401', '2024-12-01', '2024-12-05', 800),
('6', '6', '302', '2024-12-07', '2024-12-12', 550),
('5', '5', '301', '2024-12-02', '2024-12-06', 650);

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

CREATE TABLE `klijent` (
  `JMBG` varchar(20) NOT NULL,
  `ime_klijenta` varchar(20) DEFAULT NULL,
  `prezime_klijenta` varchar(20) DEFAULT NULL,
  `adresa_klijenta` varchar(50) DEFAULT NULL,
  `broj_telefona` int(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lozinka` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`JMBG`, `ime_klijenta`, `prezime_klijenta`, `adresa_klijenta`, `broj_telefona`, `email`, `lozinka`) VALUES
('0909990901234', 'Dragana', 'Dragić', 'Kragujevac, Kralja Aleksandra 19', 2147483647, 'dragana@example.com', 'dragana456'),
('0808990890123', 'Nikola', 'Nikolić', 'Niš, Episkopska 9', 2147483647, 'nikola@example.com', 'nikola123'),
('0707990789012', 'Ivana', 'Ivić', 'Novi Sad, Dunavska 22', 2147483647, 'ivana@example.com', 'ivana789'),
('0303990345678', 'Ivan', 'Ivić', 'Niš, Obrenovićeva 10', 2147483647, 'ivan@example.com', 'password789'),
('0404990456789', 'Petar', 'Petrović', 'Kragujevac, Daniciceva 15', 2147483647, 'petar@example.com', 'pass1234'),
('0505990567890', 'Jelena', 'Jelić', 'Subotica, Trg Slobode 8', 2147483647, 'jelena@example.com', 'pass5678'),
('0606990678901', 'Milan', 'Milić', 'Beograd, Ulica Kneza Miloša 25', 2147483647, 'milan@example.com', 'milpass123'),
('2010992012345', 'Filip', 'Filipović', 'Subotica, Trg Republike 6', 2147483647, 'filip@example.com', 'filippass'),
('1909991901234', 'Teodora', 'Teodorić', 'Kragujevac, Kneza Pavla 8', 2147483647, 'teodora@example.com', 'teopass'),
('1808991890123', 'Bojan', 'Bojović', 'Niš, Kralja Stefana 3', 2147483647, 'bojan@example.com', 'bojan123'),
('1707991789012', 'Tijana', 'Tijanić', 'Novi Sad, Cara Lazara 15', 2147483647, 'tijana@example.com', 'tijanapass'),
('1606991678901', 'Anđela', 'Andrić', 'Beograd, Krunska 10', 2147483647, 'andjela@example.com', 'andjepass'),
('1505991567890', 'Miloš', 'Milošević', 'Subotica, Senćanska 2', 2147483647, 'milos@example.com', 'milospass'),
('1404991456789', 'Sara', 'Sarić', 'Kragujevac, Knez Mihailova 18', 2147483647, 'sara@example.com', 'sarapass'),
('1303991345678', 'Lazar', 'Lazarević', 'Niš, Pantelejska 4', 2147483647, 'lazar@example.com', 'lazar123'),
('1212991234567', 'Milica', 'Milićević', 'Novi Sad, Limanska 7', 2147483647, 'milica@example.com', 'milicapass'),
('1111991123456', 'Stefan', 'Stefanović', 'Beograd, Balkanska 6', 2147483647, 'stefan@example.com', 'stefpass'),
('1010991012345', 'Maja', 'Majstorović', 'Subotica, Matije Gupca 3', 2147483647, 'maja@example.com', 'majapass'),
('0101990123456', 'Marko', 'Marković', 'Beograd, Kneza Mihaila 5', 2147483647, 'marko@example.com', 'password123'),
('0202990234567', 'Ana', 'Anić', 'Novi Sad, Zmaj Jovina 7', 2147483647, 'ana@example.com', 'password456');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `sifra_rezervacije` varchar(20) NOT NULL,
  `JMBG` varchar(20) DEFAULT NULL,
  `sifra_kataloga` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`sifra_rezervacije`, `JMBG`, `sifra_kataloga`) VALUES
('672f5d296a7cd', '1709007752220', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`sifra_hotela`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`sifra_kataloga`);

--
-- Indexes for table `klijent`
--
ALTER TABLE `klijent`
  ADD PRIMARY KEY (`JMBG`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`sifra_rezervacije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
