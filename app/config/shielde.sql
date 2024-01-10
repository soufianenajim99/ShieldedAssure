-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 12:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shielde`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ID_Article` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Contenu` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `ID_Assureur` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assureur`
--

CREATE TABLE `assureur` (
  `ID_Assureur` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assureur`
--

INSERT INTO `assureur` (`ID_Assureur`, `Nom`, `Adresse`) VALUES
(1, 'loly', 'sdd'),
(2, 'dfv', 'mklml'),
(12, 'opi', 'opli'),
(16, 'koko', 'koko');

-- --------------------------------------------------------

--
-- Table structure for table `assureurclients`
--

CREATE TABLE `assureurclients` (
  `ID_Assureur` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assureurclients`
--

INSERT INTO `assureurclients` (`ID_Assureur`, `ID_Client`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `ID_Claim` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `MontantPrim` float NOT NULL,
  `DatePrim` date NOT NULL,
  `ID_Article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID_Client` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_Client`, `Nom`, `Prenom`, `Adresse`, `username`, `password`) VALUES
(1, 'marco', 'van basten', 'adresse', 'marco26', 'po123'),
(2, 'ville', 'quartier', 'rue', 'codePostal', 'email');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID_Article`),
  ADD KEY `assur_art` (`ID_Assureur`),
  ADD KEY `client_art` (`ID_Client`);

--
-- Indexes for table `assureur`
--
ALTER TABLE `assureur`
  ADD PRIMARY KEY (`ID_Assureur`);

--
-- Indexes for table `assureurclients`
--
ALTER TABLE `assureurclients`
  ADD KEY `assurcli` (`ID_Assureur`),
  ADD KEY `cliassur` (`ID_Client`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`ID_Claim`),
  ADD KEY `claim_art` (`ID_Article`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_Client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ID_Article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assureur`
--
ALTER TABLE `assureur`
  MODIFY `ID_Assureur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `ID_Claim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `assur_art` FOREIGN KEY (`ID_Assureur`) REFERENCES `assureur` (`ID_Assureur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_art` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assureurclients`
--
ALTER TABLE `assureurclients`
  ADD CONSTRAINT `assurcli` FOREIGN KEY (`ID_Assureur`) REFERENCES `assureur` (`ID_Assureur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliassur` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `claim`
--
ALTER TABLE `claim`
  ADD CONSTRAINT `claim_art` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID_Article`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
