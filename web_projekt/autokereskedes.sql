-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 08:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autokereskedes`
--

-- --------------------------------------------------------

--
-- Table structure for table `kocsik`
--

CREATE TABLE `kocsik` (
  `marka` char(8) NOT NULL,
  `model` char(8) DEFAULT NULL,
  `allapot` char(8) DEFAULT NULL,
  `tulajdonos_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kocsik`
--

INSERT INTO `kocsik` (`marka`, `model`, `allapot`, `tulajdonos_id`) VALUES
('Audi', 'a5', 'elhanyag', 2),
('Mercedes', 'glc', 'kivalo', 1),
('opel', 'astra', 'kiválo', 1),
('Toyota', 'hilux', 'uj', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tulajdonos`
--

CREATE TABLE `tulajdonos` (
  `id` int(11) NOT NULL,
  `nev` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tulajdonos`
--

INSERT INTO `tulajdonos` (`id`, `nev`) VALUES
(1, 'Kis Ferenc'),
(2, 'Nagy Jozsi'),
(3, 'Pál Albert'),
(4, 'Nagy Elek'),
(5, 'Nagy Eniko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kocsik`
--
ALTER TABLE `kocsik`
  ADD PRIMARY KEY (`marka`),
  ADD KEY `tulajdonos_id` (`tulajdonos_id`);

--
-- Indexes for table `tulajdonos`
--
ALTER TABLE `tulajdonos`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kocsik`
--
ALTER TABLE `kocsik`
  ADD CONSTRAINT `kocsik_ibfk_1` FOREIGN KEY (`tulajdonos_id`) REFERENCES `tulajdonos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
