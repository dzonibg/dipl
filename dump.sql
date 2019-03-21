-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2018 at 02:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dipl`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `catid` int(11) NOT NULL,
  `catname` text CHARACTER SET latin1 NOT NULL,
  `spec1name` text CHARACTER SET latin1 NOT NULL,
  `spec2name` text CHARACTER SET latin1 NOT NULL,
  `spec3name` text CHARACTER SET latin1 NOT NULL,
  `spec4name` text CHARACTER SET latin1 NOT NULL,
  `spec5name` text CHARACTER SET latin1 NOT NULL,
  `spec6name` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`catid`, `catname`, `spec1name`, `spec2name`, `spec3name`, `spec4name`, `spec5name`, `spec6name`) VALUES
(1, 'Procesori', 'Socket', 'Broj jezgara', 'Frekvencija', 'Turbo', 'Kes', 'Arhitektura'),
(2, 'Hladnjaci', 'Tip', 'Broj ventilatora', 'Velicina ventilatora', 'Brzina ventilatora', 'Podrzana podnozja', 'TDP'),
(3, 'Maticne ploce', 'Socket', 'Format', 'Cipset', 'Podrzana memorija', 'Broj RAM slotova', 'USB prikljucci'),
(4, 'RAM Memorija', 'Tip', 'Format', 'Kolicina memorije', 'Frekvencija', 'Tajming', 'Sifra'),
(5, 'SSD', 'Kapacitet', 'Brzina citanja', 'Brzina pisanja', 'Povezivanje', 'Masa', 'Ostalo'),
(6, 'HDD', 'Kapacitet', 'Tip', 'Cache memorija', 'Brzina', 'Format', 'Konekcija'),
(7, 'Graficke karte', 'Tip memorije', 'Kolicina memorije', 'Frekvencija', 'Konektori', 'Hladjenje', 'Slot'),
(8, 'Napajanja', 'Snaga', 'Konektori', 'Ventilator', 'PFC', 'Modularno', 'Efikasnost'),
(9, 'Kucista', 'Max visina kulera', 'Max duzina graficke', 'Hladjenje', 'Front panel', 'Materijal', 'Format maticnih ploca'),
(10, 'Tastature', 'Povezivanje', 'Tip tastera', 'Slova', 'Osvetljenje', 'Dimenzije', 'Ostalo'),
(11, 'Misevi', 'Povezivanje', 'Rezolucija', 'Broj dugmadi', 'Senzor', 'Osvetljenje', 'Ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `cartid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `prid` int(11) NOT NULL,
  `filed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`cartid`, `uid`, `prid`, `filed`) VALUES
(40, 2, 4, 1),
(41, 2, 3, 1),
(42, 2, 2, 1),
(43, 2, 2, 1),
(44, 2, 8, 1),
(45, 2, 10, 1),
(47, 2, 3, 1),
(48, 2, 10, 1),
(49, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

CREATE TABLE `porudzbine` (
  `id_porudzbine` int(11) NOT NULL,
  `id_kor` int(11) NOT NULL,
  `datum` text COLLATE utf8_unicode_ci NOT NULL,
  `obradjena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porudzbine`
--

INSERT INTO `porudzbine` (`id_porudzbine`, `id_kor`, `datum`, `obradjena`) VALUES
(19, 2, 'Sep 24 16:14:20', 1),
(20, 2, 'Sep 26 1:09:21', 1),
(21, 2, 'Sep 27 12:26:40', 1),
(22, 2, 'Sep 27 15:39:34', 0),
(23, 2, 'Oct 4 5:37:43', 0),
(24, 2, 'Oct 4 5:44:53', 1),
(25, 2, 'Oct 4 5:44:56', 1),
(26, 2, 'Nov 1 7:33:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine_proizvodi`
--

CREATE TABLE `porudzbine_proizvodi` (
  `idai` int(11) NOT NULL,
  `idporudzbine` int(11) NOT NULL,
  `idproizvoda` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porudzbine_proizvodi`
--

INSERT INTO `porudzbine_proizvodi` (`idai`, `idporudzbine`, `idproizvoda`, `cena`, `uid`) VALUES
(310, 19, 4, 21500, 2),
(311, 19, 3, 6990, 2),
(313, 20, 2, 5400, 2),
(314, 20, 2, 5400, 2),
(316, 21, 8, 17000, 2),
(317, 22, 10, 24600, 2),
(318, 23, 3, 6990, 2),
(319, 26, 10, 24600, 2),
(320, 26, 2, 5400, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `imgpath` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `proizvodjac` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `model` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `spec1val` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `spec2val` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `spec3val` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `spec4val` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `spec5val` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `spec6val` mediumtext COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `catid`, `imgpath`, `proizvodjac`, `model`, `cena`, `spec1val`, `spec2val`, `spec3val`, `spec4val`, `spec5val`, `spec6val`) VALUES
(1, 2, '1', 'Noctua', 'NH-D15', 12000, 'Vazdusno dual-tower hladjenje', '2', '140mm', '900-1400RPM', 'AMD, Intel', '220W'),
(2, 2, '2', 'Cooler Master', 'Hyper Evo 212 LED', 5400, 'Vazdusno hladjenje', '1', '120mm', '500-1600RPM', 'Intel, AMD', '181W'),
(3, 2, '', 'Cooler Master', 'MasterAir Pro 4', 6990, 'Vazdusno hladjenje', '1', '120mm', '650-2000RPM', 'Intel, AMD', '160W'),
(4, 1, '', 'Intel', 'i5-4460', 21500, 'LGA1510', '4', '3.2GHz', '3.4GHz', '6MB L3', '22nm'),
(5, 6, '', 'Seagate', 'Barracuda ST1000DX002', 9500, '1TB', 'Interni', '64MB', '7200RPM', '3.5\"', 'SATA3'),
(6, 1, '', 'AMD', 'FX8320E', 14900, 'AM3+', '8', '3.2GHz', '4.0GHz', '8MB L3, 4x2MB L2', '32nm'),
(7, 1, '', 'AMD', 'FX8350', 15900, 'AM3+', '8', '4.0GHz', '4.2GHz', '8MB L3, 4x2MB L2', '32nm'),
(8, 1, '', 'AMD', 'FX8370E', 17000, 'AM3+', '8', '3.3GHz', '4.2GHz', '8MB L3, 4x2MB L2', '32nm, 95W'),
(9, 1, '', 'Intel', '6600K', 29300, 'LGA1151', '4', '3.5GHz', '3.9GHz', '6MB L3', '12nm, bez hladnjaka'),
(10, 1, '', 'AMD', 'Ryzen 1600', 24600, 'AM4', '6 jezgara/12 threadova', '3.4GHz', '3.6GHz', '19nm, 65W', '14nm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ime` text COLLATE utf8_croatian_ci NOT NULL,
  `prezime` text COLLATE utf8_croatian_ci NOT NULL,
  `tel` text CHARACTER SET latin1 NOT NULL,
  `adresa` text COLLATE utf8_croatian_ci NOT NULL,
  `grad` text COLLATE utf8_croatian_ci NOT NULL,
  `mail` text CHARACTER SET latin1 NOT NULL,
  `pass` text CHARACTER SET latin1 NOT NULL,
  `code` text CHARACTER SET latin1 NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `prezime`, `tel`, `adresa`, `grad`, `mail`, `pass`, `code`, `active`) VALUES
(2, 'Nikola', 'Stojisavljevic', '0643286657', '27. Marta 39', 'Beograd', 'nidza.bg@gmail.com', 'b025b6efc43d02fb831068a620ee9e7b', '456048afb7253926e1fbb7486e699180', 1),
(3, 'Test', 'Nalog', '0640000000', 'Testiranje adrese 1', 'Beograd', 'test1@nidza.eu.org', 'b025b6efc43d02fb831068a620ee9e7b', '8460637fc1f901bbf7aef374050e836d', 1),
(5, 'Drago', 'Stojisavljevic', '0640000000', '27. Marta 39', 'Beograd', 'sdrago@sbb.rs', 'b025b6efc43d02fb831068a620ee9e7b', '67ad4113ae200c56e74d7177b37d9469', 0),
(6, 'Shomei', 'van Karl', '0800 100 100', 'Beogradska 31', 'Roterdam', 'shmbgd@gmail.com', '4f35bdb46c8b8e2e2090f1c76296df5f', 'c4ede56bbd98819ae6112b20ac6bf145', 1),
(7, 'Petar', 'Markovic', '064000000', 'Izmisljena 12', 'Beograd', 'petar@petar.petar', 'izmisljenasifra', 'generisanikod', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `id` int(11) NOT NULL,
  `date` text CHARACTER SET latin1 NOT NULL,
  `title` text CHARACTER SET latin1 NOT NULL,
  `text` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`id`, `date`, `title`, `text`) VALUES
(4, '11/22/2016', 'Radovi na sajtu!', 'I dalje traju radovi na web sajtu.'),
(10, '03/09/2017', 'Sajt je i dalje u izradi!', 'Napredujemo sa izradom sajta!'),
(11, '03/09/2017', 'Osnovne funkcije web sajta su aktivne!', 'Od ovog trenutka moÅ¾ete u potpunosti kontrolisati web aplikaciju!'),
(12, '27/09/2017', 'Web aplikacija je zavrÅ¡ena.', 'PoÅ¡tovani,\r\n\r\nOd ovog trenutka, web aplikacija \"Web PC Shop\" je u potpunosti zavrÅ¡ena. Slobodno poÄnite sa kupovinom, a naÅ¡i aÅ¾urni administratori Ä‡e se potruditi da sve VaÅ¡e porudÅ¾bine budu obraÄ‘ene u Å¡to kraÄ‡em roku!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD PRIMARY KEY (`id_porudzbine`);

--
-- Indexes for table `porudzbine_proizvodi`
--
ALTER TABLE `porudzbine_proizvodi`
  ADD PRIMARY KEY (`idai`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `porudzbine`
--
ALTER TABLE `porudzbine`
  MODIFY `id_porudzbine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `porudzbine_proizvodi`
--
ALTER TABLE `porudzbine_proizvodi`
  MODIFY `idai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
