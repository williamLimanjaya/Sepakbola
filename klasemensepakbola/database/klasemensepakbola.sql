-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 15, 2024 at 11:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klasemensepakbola`
--

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `idklub` int(11) NOT NULL,
  `namaklub` varchar(255) NOT NULL,
  `kotaklub` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`idklub`, `namaklub`, `kotaklub`) VALUES
(20, 'Manchester United', 'Manchester'),
(21, 'Manchester City', 'Manchester'),
(22, 'Liverpool', 'Liverpool'),
(23, 'Arsenal', 'London'),
(24, 'Chelsea', 'London'),
(25, 'Aston Villa', 'Birmingham'),
(26, 'Newcastle', 'Newcastle'),
(27, 'Brentford', 'Brentford'),
(35, 'West Ham', 'London'),
(38, 'Burnley', 'Burnley');

-- --------------------------------------------------------

--
-- Table structure for table `skor`
--

CREATE TABLE `skor` (
  `idskor` int(11) NOT NULL,
  `kode` char(14) NOT NULL,
  `idklub_a` int(11) NOT NULL,
  `score_a` varchar(5) NOT NULL,
  `idklub_b` int(11) NOT NULL,
  `score_b` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skor`
--

INSERT INTO `skor` (`idskor`, `kode`, `idklub_a`, `score_a`, `idklub_b`, `score_b`) VALUES
(3, '20240215044205', 20, '1', 21, '3'),
(8, '20240215044416', 20, '4', 26, '4'),
(9, '20240215044416', 22, '3', 21, '2'),
(10, '20240215044416', 21, '5', 22, '1'),
(11, '20240215044416', 27, '1', 25, '1'),
(12, '20240215044416', 24, '0', 23, '1'),
(13, '20240215044416', 22, '2', 24, '1'),
(14, '20240215044440', 23, '2', 27, '1'),
(15, '20240215044508', 25, '3', 26, '1'),
(16, '20240215045815', 35, '0', 27, '3'),
(17, '20240215050410', 21, '4', 35, '1'),
(18, '20240215050806', 38, '2', 26, '1'),
(19, '20240215050825', 25, '2', 38, '2'),
(20, '20240215050825', 26, '1', 23, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`idklub`);

--
-- Indexes for table `skor`
--
ALTER TABLE `skor`
  ADD PRIMARY KEY (`idskor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `idklub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `skor`
--
ALTER TABLE `skor`
  MODIFY `idskor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
