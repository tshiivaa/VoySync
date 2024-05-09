-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 10:50 AM
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
(10, 'Montreal', 'berda', 'Canada'),
(11, 'Nabeul', 'tfarhid', 'Tunis'),
(12, 'Lyon', 'desc', 'France');

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `IDlogement` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Capacite` int(11) DEFAULT NULL CHECK (`Capacite` >= 1 and `Capacite` <= 20),
  `Evaluation` tinyint(1) DEFAULT NULL CHECK (`Evaluation` >= 0 and `Evaluation` <= 5),
  `Disponibilite` varchar(20) NOT NULL,
  `IDvol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`IDlogement`, `Nom`, `Type`, `Adresse`, `Prix`, `Description`, `Capacite`, `Evaluation`, `Disponibilite`, `IDvol`) VALUES
(1, 'HOTEL ABOUKIR', 'Hotel', 'Paris', 820.00, 'Lit Simple dans Dortoir pour Femmes', 2, 4, 'dispo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `vol_id` int(11) DEFAULT NULL,
  `logement_id` int(11) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_reservation` date DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `guests` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Trains', 'France', 'Italy', 'Lyon', 'Rome', '00:23:00.000000', '00:23:00.000000', 260),
(2, 'Bus', 'France', 'Italy', 'Paris', 'Rome', '00:24:00.000000', '00:24:00.000000', 60),
(3, 'vol', 'Tunis', 'Italy', 'Tunis', 'Rome', '00:24:00.000000', '00:24:00.000000', 250),
(4, 'Trains', 'Tunis', 'Tunis', 'Tunis', 'Nabeul', '22:16:00.000000', '22:16:00.000000', 5),
(5, 'Trains', 'France', 'Italy', 'Paris', 'Rome', '00:25:00.000000', '00:25:00.000000', 120),
(6, 'vol', 'Tunis', 'Canada', 'Tunis', 'Montreal', '00:26:00.000000', '00:26:00.000000', 1200),
(7, 'vol', 'Tunis', 'France', 'Tunis', 'Paris', '20:04:00.000000', '20:04:00.000000', 265);

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

CREATE TABLE `vol` (
  `IDvol` int(11) NOT NULL,
  `Compagnie` varchar(100) NOT NULL,
  `Num_vol` int(11) NOT NULL,
  `Depart` varchar(100) NOT NULL,
  `Arrive` varchar(100) NOT NULL,
  `DateDepart` date NOT NULL,
  `DateArrive` date NOT NULL,
  `DureeOffre` date NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `Classe` varchar(50) NOT NULL,
  `Evaluation` tinyint(1) DEFAULT NULL CHECK (`Evaluation` >= 0 and `Evaluation` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`IDvol`, `Compagnie`, `Num_vol`, `Depart`, `Arrive`, `DateDepart`, `DateArrive`, `DureeOffre`, `Prix`, `Classe`, `Evaluation`) VALUES
(1, 'Tunisair', 87348, 'Tunis', 'Paris', '2024-05-09', '2024-05-09', '2024-06-09', 350.00, 'Economique', 2),
(4, 'Airfrance', 826543, 'Paris', 'Marseille', '2024-05-12', '2024-05-12', '2024-06-09', 99.00, 'Economique', 3),
(5, 'Airfrance', 56688, 'Paris', 'Tunis', '2024-05-09', '2024-05-09', '2024-06-09', 350.00, 'Economique', 3);

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
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`IDlogement`),
  ADD KEY `fk_vol` (`IDvol`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vol_id` (`vol_id`),
  ADD KEY `logement_id` (`logement_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- Indexes for table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`IDvol`);

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
  MODIFY `id_destination` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `IDlogement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vol`
--
ALTER TABLE `vol`
  MODIFY `IDvol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `fk_vol` FOREIGN KEY (`IDvol`) REFERENCES `vol` (`IDvol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`vol_id`) REFERENCES `vol` (`IDvol`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`IDlogement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
