-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 10:45 PM
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
-- Database: `voysync`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin@'),
(2, 'admin', '$2y$10$TOl.VEdRyAGfn0Iu3iUz7elu8pJgUrqE16XNOBO4OH5GRWP0Qk2EK'),
(3, 'admin', '$2y$10$ml45KHlFQ2sg6ttp.I.ToecfUgEcMVWKhxZtqhtaTU9zHbcjjxzQe');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id_destination` int(100) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pays` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id_destination`, `nom`, `description`, `pays`) VALUES
(1, 'Tunis', 'Le bled', 'Tunis'),
(2, 'Paris', 'Magique', 'France'),
(4, 'Rome', 'Harga', 'Italy'),
(10, 'Montreal', 'berda', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id_transport` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `pays_depart` varchar(100) NOT NULL,
  `pays_arrivee` varchar(100) NOT NULL,
  `lieux_depart` varchar(100) NOT NULL,
  `lieux_arrivee` varchar(100) NOT NULL,
  `temps_depart` time(6) NOT NULL,
  `temps_arrivee` time(6) NOT NULL,
  `prix` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id_transport`, `type`, `pays_depart`, `pays_arrivee`, `lieux_depart`, `lieux_arrivee`, `temps_depart`, `temps_arrivee`, `prix`) VALUES
(1, 'Trains', 'Paris', 'Rome', 'Gare de Lyon', 'Termini', '18:17:00.000000', '09:25:00.000000', 301),
(2, 'Bus', 'Paris', 'Rome', 'Quai de Bercy', 'Autostazione Tiburtina', '11:55:00.000000', '07:34:00.000000', 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id_destination`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id_destination` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
