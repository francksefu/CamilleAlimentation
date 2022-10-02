-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 fév. 2022 à 16:02
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `controleentreprise`
--

-- --------------------------------------------------------

--
-- Structure de la table `bonusperte`
--

CREATE TABLE `bonusperte` (
  `idBonusPerte` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `QuantitePerdu` int(11) NOT NULL,
  `QuantiteGagne` int(11) NOT NULL,
  `DatesD` date NOT NULL,
  `Motif` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bonusperte`
--

INSERT INTO `bonusperte` (`idBonusPerte`, `idProduit`, `QuantitePerdu`, `QuantiteGagne`, `DatesD`, `Motif`) VALUES
(1, 18, 1, 0, '2022-01-27', 'motif: moisie');

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE `caisse` (
  `idCaisse` int(11) NOT NULL,
  `DatesCourant` date NOT NULL,
  `DatesPrecedent` date NOT NULL,
  `ArgentHier` float NOT NULL,
  `CaisseReel` float NOT NULL,
  `DetteClientRembourse` float NOT NULL,
  `RembourseDetteEntreprise` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`idCaisse`, `DatesCourant`, `DatesPrecedent`, `ArgentHier`, `CaisseReel`, `DetteClientRembourse`, `RembourseDetteEntreprise`) VALUES
(1, '2022-01-27', '2022-01-26', 0, 283500, 51500, 0),
(2, '2022-01-28', '2022-01-27', 0, 149500, 40000, 0),
(3, '2022-01-29', '2022-01-28', 0, 252600, 0, 0),
(4, '2022-01-30', '2022-01-29', 0, 229700, 11700, 0),
(5, '2022-01-31', '2022-01-30', 0, 82600, 17800, 0),
(6, '2022-02-01', '2022-01-31', 0, 215150, 5000, 0),
(7, '2022-02-02', '2022-02-01', 0, 266500, 30500, 0),
(8, '2022-02-03', '2022-02-02', 0, 89500, 0, 12000),
(9, '2022-02-04', '2022-02-03', 0, 193200, 0, 0),
(10, '2022-02-05', '2022-02-04', 0, 184000, 4000, 0),
(11, '2022-02-06', '2022-02-05', 0, 250500, 64800, 12000),
(12, '2022-02-07', '2022-02-06', 0, 117000, 0, 0),
(13, '2022-02-08', '2022-02-07', 0, 145750, 4000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `NomClient` varchar(20) NOT NULL,
  `Telephone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `NomClient`, `Telephone`) VALUES
(1, 'Maman ', ''),
(2, 'Vieux Bertin', ''),
(3, 'Salama', ''),
(4, 'Gracia Sf', ''),
(5, 'Patient Sf', ''),
(6, 'Tony', ''),
(7, 'Vieux Airtel', ''),
(8, '(De gros chiens)', ''),
(9, 'Franck Sf', ''),
(10, 'Maman Juvenale', ''),
(11, 'Vieux Kanduki', ''),
(12, 'Oncle Sine', ''),
(13, '(mauvais billet de 2', ''),
(14, 'Maman Nicole', ''),
(15, '(Client fidel)', ''),
(16, 'Cedric 2', ''),
(17, 'Aurelie', ''),
(18, 'Dada Sf', ''),
(19, 'Victoire', ''),
(20, 'Joel', ''),
(21, 'Maman Michaela', ''),
(22, 'Maman Emiliene', ''),
(23, 'Vieux Nabintu', ''),
(24, 'Papa', ''),
(25, '(De ULPGL)', ''),
(26, '(Belle soeur a Katin', ''),
(27, 'Savina', ''),
(28, 'Maman Charline', ''),
(29, 'Vieux Tolin', ''),
(30, '(Avec maman)', ''),
(31, 'DA Annette', ''),
(32, 'Vieux Deo', ''),
(33, 'Alain changeur', ''),
(34, 'Grace', ''),
(35, 'Jams Kadodobe', ''),
(36, 'Pappy (ami de Sine)', ''),
(37, 'Vieux Jado', ''),
(38, '(Motard fidel)', ''),
(39, '(Facture non payee)', ''),
(40, '(Avec Patient Sf)', '');

-- --------------------------------------------------------

--
-- Structure de la table `commandant`
--

CREATE TABLE `commandant` (
  `idCommande` int(11) NOT NULL,
  `email` varchar(15) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandant`
--

INSERT INTO `commandant` (`idCommande`, `email`, `code`) VALUES
(1, 'franck', 'franck'),
(2, 'camille', 'camille');

-- --------------------------------------------------------

--
-- Structure de la table `detteclient`
--

CREATE TABLE `detteclient` (
  `idDette` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `ValeurDette` float NOT NULL,
  `MontantPaye` float NOT NULL,
  `Reste` float NOT NULL,
  `il_pris_quoi` varchar(100) NOT NULL,
  `DatesD` date NOT NULL DEFAULT current_timestamp(),
  `DatesRNew` date DEFAULT NULL,
  `MontantPayeHold` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `detteclient`
--

INSERT INTO `detteclient` (`idDette`, `idClient`, `ValeurDette`, `MontantPaye`, `Reste`, `il_pris_quoi`, `DatesD`, `DatesRNew`, `MontantPayeHold`) VALUES
(1, 1, 10000, 0, 10000, 'il a pris:', '2022-01-27', '0000-00-00', NULL),
(2, 2, 6000, 0, 6000, 'il a pris:2simba', '2022-01-27', NULL, NULL),
(3, 3, 10800, 10800, 0, 'il a pris: 3club, 1 afia jus', '2022-01-27', '2022-01-31', 0),
(4, 4, 1800, 0, 1800, 'il a pris: 1 afia jus ', '2022-01-28', NULL, NULL),
(5, 5, 16000, 0, 16000, 'il a pris: 1 chamdor', '2022-01-28', NULL, NULL),
(6, 6, 20500, 0, 20500, 'il a pris: reste sur facture', '2022-01-28', NULL, NULL),
(7, 7, 3000, 0, 3000, 'il a pris: 1 simba', '2022-01-28', NULL, NULL),
(8, 3, 1000, 1000, 0, 'il a pris: 1 fanta pt', '2022-01-28', '2022-01-31', 0),
(9, 8, 44000, 40000, 4000, 'il a pris:', '2022-01-10', '2022-01-28', 40000),
(10, 1, 6000, 0, 6000, 'il a pris: 2 club', '2022-01-28', NULL, NULL),
(11, 9, 2000, 0, 2000, 'il a pris: 2 Novida pt', '2022-01-29', NULL, NULL),
(12, 1, 9000, 0, 9000, 'il a pris: 3 club', '2022-01-29', NULL, NULL),
(13, 5, 13000, 0, 13000, 'il a pris: 3 primus grand, 2 primus pt', '2022-01-29', NULL, NULL),
(14, 10, 13200, 0, 13200, 'il a pris: 2 club, 4 castel', '2022-01-29', NULL, NULL),
(15, 11, 1500, 0, 1500, 'il a pris: 1 lavie grand', '2022-01-29', NULL, NULL),
(16, 12, 24600, 0, 24600, 'il a pris: reste sur facture, 2 club', '2022-01-29', '0000-00-00', NULL),
(17, 13, 15600, 0, 15600, 'il a pris: 2 doppel, 2 simba, 2 castel', '2022-01-29', NULL, NULL),
(18, 14, 5000, 0, 5000, 'il a pris: 2 Beaufort', '2022-01-30', NULL, NULL),
(19, 15, 6000, 6000, 0, 'il a pris: 2 simba', '2022-01-30', '2022-01-31', 0),
(20, 1, 7400, 0, 7400, 'il a pris: 2 club, 2 lavie pt', '2022-01-30', NULL, NULL),
(21, 7, 500, 0, 500, 'il a pris: Reste sur facture', '2022-01-30', NULL, NULL),
(22, 4, 4000, 0, 4000, 'il a pris: 1 kingfisher', '2022-01-30', NULL, NULL),
(23, 16, 8000, 0, 8000, 'il a pris: 2 club, 1 vitalo, 1 club', '2022-01-30', NULL, NULL),
(24, 12, 9000, 0, 9000, 'il a pris: 1 jus maracuja, 1 simba, 2 beaufort, et 1 saucisson de 2500', '2022-01-30', NULL, NULL),
(25, 17, 6000, 3000, 3000, 'il a pris:', '2022-01-15', '2022-01-30', 0),
(26, 9, 7800, 4700, 3100, 'il a pris:', '2022-01-24', '2022-01-30', 0),
(27, 18, 8000, 4000, 4000, 'il a pris: reste sur facture', '2022-01-16', '2022-01-30', 0),
(28, 19, 8500, 5000, 3500, 'il a pris: 2 beaufort, 1 amestel', '2022-01-30', '2022-02-01', 0),
(29, 20, 9000, 0, 9000, 'il a pris: 1energy drin, 1 primus pt, 2 simba, ', '2022-01-31', NULL, NULL),
(31, 21, 3500, 0, 3500, 'il a pris: 1 class, 1 fanta pt', '2022-01-31', NULL, NULL),
(33, 1, 3000, 0, 3000, 'il a pris: 1 club', '2022-01-31', NULL, NULL),
(34, 22, 3500, 0, 3500, 'il a pris: 1 Amestel', '2022-01-31', NULL, NULL),
(35, 12, 11500, 9800, 1700, 'il a pris:', '2022-02-01', '2022-02-06', 0),
(36, 23, 11700, 0, 11700, 'il a pris: 1 primus pt, 2 simba, 1 primus gr, 1 lavie pt', '2022-02-01', NULL, NULL),
(37, 24, 3000, 0, 3000, 'il a pris: 1 simba', '2022-02-01', NULL, NULL),
(38, 25, 22000, 22000, 0, 'il a pris: reste sur facture', '2022-02-01', '2022-02-02', 0),
(39, 15, 8500, 8500, 0, 'il a pris: 1club, 1 simba, 1 class', '2022-02-01', '2022-02-02', 0),
(40, 26, 3000, 0, 3000, 'il a pris: 1 Simba', '2022-02-01', NULL, NULL),
(41, 27, 11000, 0, 11000, 'il a pris: Reste sur facture', '2022-02-02', NULL, NULL),
(43, 28, 11000, 0, 11000, 'il a pris: 2class, 2 primus gr', '2022-02-02', NULL, NULL),
(44, 24, 33300, 0, 33300, 'il a pris: 1  Afia jus, 2 beaufort, 1 primus gr, 1 turbo, 6 catel, 2 simba, 1 tembo', '2022-02-02', NULL, NULL),
(45, 30, 11600, 0, 11600, 'il a pris: Reste sur facture', '2022-02-03', NULL, NULL),
(46, 9, 3000, 0, 3000, 'il a pris: 1 Novida, 1 Energy, 1 mirinda', '2022-02-03', NULL, NULL),
(47, 29, 2000, 0, 2000, 'il a pris: 1 castel', '2022-02-03', NULL, NULL),
(49, 1, 17700, 0, 17700, 'il a pris: 4 heinken, 1 club, 1 lavie', '2022-02-03', NULL, NULL),
(50, 31, 12000, 0, 12000, 'il a pris: 4 primus gr (2 turbo gr)', '2022-02-03', NULL, NULL),
(51, 1, 6000, 0, 6000, 'il a pris: 2 club', '2022-02-04', NULL, NULL),
(52, 24, 30700, 0, 30700, 'il a pris: facture', '2022-02-04', NULL, NULL),
(53, 12, 11200, 11200, 0, 'il a pris:', '2022-02-04', '2022-02-06', 0),
(55, 19, 10500, 0, 10500, 'il a pris: 3 amestel', '2022-02-04', NULL, NULL),
(57, 8, 8000, 0, 8000, 'il a pris: 2 guiness', '2022-02-05', NULL, NULL),
(58, 1, 12200, 0, 12200, 'il a pris: 3 club, 1 lavie pt, 1 class', '2022-02-05', NULL, NULL),
(59, 24, 40200, 0, 40200, 'il a pris: 2 primus gr, 4 afia jus, 1 vitalo, 3 club, 16000 pour le chantier', '2022-02-05', NULL, NULL),
(60, 32, 18000, 0, 18000, 'il a pris: 2 33 export, 2 club, 2 beaufort', '2022-02-05', NULL, NULL),
(62, 33, 4000, 4000, 0, 'il a pris:', '2022-01-06', '2022-02-05', 0),
(63, 34, 3800, 3800, 0, 'il a pris: 1 afia jus, 1 vitalo', '2022-02-05', '2022-02-06', 0),
(64, 12, 30000, 30000, 0, 'il a pris:', '2022-02-05', '2022-02-06', 0),
(65, 1, 3000, 0, 3000, 'il a pris: 1 club', '2022-02-06', NULL, NULL),
(66, 35, 9000, 0, 9000, 'il a pris: 1 turbo pt, 2 simba', '2022-02-06', NULL, NULL),
(67, 34, 8000, 0, 8000, 'il a pris: 4 turbo pt', '2022-02-06', NULL, NULL),
(68, 13, 2500, 0, 2500, 'il a pris: 1 bishop pt', '2022-02-06', NULL, NULL),
(69, 36, 10000, 10000, 0, 'il a pris:', '2022-01-25', '2022-02-06', 0),
(70, 24, 26500, 0, 26500, 'il a pris: 2 33 export, 2 castel, 1 simba, 1 club, 2 beaufort, 4000fc... 1 biscuit FN', '2022-02-07', NULL, NULL),
(71, 37, 21300, 0, 21300, 'il a pris: Reste sur facture', '2022-02-07', NULL, NULL),
(72, 7, 10500, 0, 10500, 'il a pris: 3 simba', '2022-02-07', NULL, NULL),
(73, 38, 4000, 4000, 0, 'il a pris: 2 primus pt', '2022-02-07', '2022-02-08', 0),
(74, 1, 6500, 0, 6500, 'il a pris: 1 club, 1 simba', '2022-02-07', NULL, NULL),
(75, 39, 7500, 0, 7500, 'il a pris: 1 33 export, 2 turbo', '2022-02-07', NULL, NULL),
(76, 1, 9000, 0, 9000, 'il a pris: 3 club', '2022-02-08', NULL, NULL),
(77, 5, 3500, 0, 3500, 'il a pris: Reste sur facture', '2022-02-08', NULL, NULL),
(78, 40, 8500, 0, 8500, 'il a pris: 1 fanta y.m, 1 Doppel, 1 primus gr', '2022-02-08', NULL, NULL),
(79, 33, 700, 0, 700, 'il a pris: 1 lavie pt', '2022-02-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `detteentreprise`
--

CREATE TABLE `detteentreprise` (
  `idDette` int(11) NOT NULL,
  `TypeD` varchar(30) NOT NULL,
  `ValeurDette` float NOT NULL,
  `MontantPaye` float NOT NULL,
  `Reste` float NOT NULL,
  `il_pris_quoi` varchar(150) DEFAULT NULL,
  `DatesD` date NOT NULL DEFAULT current_timestamp(),
  `DatesRNew` date DEFAULT NULL,
  `MontantPayeHold` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `detteentreprise`
--

INSERT INTO `detteentreprise` (`idDette`, `TypeD`, `ValeurDette`, `MontantPaye`, `Reste`, `il_pris_quoi`, `DatesD`, `DatesRNew`, `MontantPayeHold`) VALUES
(1, 'Argent', 5400, 5400, 0, 'il a pris:', '2022-01-21', '2022-01-27', 0),
(2, 'Consignation', 3000, 0, 3000, 'motif: 1 simba consignee par Maman IDA', '2022-02-01', NULL, 0),
(3, 'Consignation', 12000, 12000, 0, 'il a pris: 3 smba de maman  Ida', '2022-02-02', '2022-02-03', 0),
(4, 'Consignation', 3000, 0, 3000, 'motif: 1 simba consignee par IDA', '2022-02-02', NULL, 0),
(5, 'Consignation', 8000, 0, 8000, 'motif: 2 Heineken consignees par client', '2022-02-03', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `dimiinution`
--

CREATE TABLE `dimiinution` (
  `idDiminution` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `NewQuantity` int(11) NOT NULL,
  `HoldQuantity` int(11) NOT NULL,
  `Differenced` int(11) NOT NULL,
  `DatesD` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dimiinution`
--

INSERT INTO `dimiinution` (`idDiminution`, `idProduit`, `NewQuantity`, `HoldQuantity`, `Differenced`, `DatesD`) VALUES
(2, 2, 15, 16, 1, '2022-01-27'),
(3, 3, 16, 17, 1, '2022-01-27'),
(4, 8, 6, 12, 6, '2022-01-27'),
(5, 9, 28, 30, 2, '2022-01-27'),
(6, 11, 1, 2, 1, '2022-01-27'),
(7, 12, 13, 14, 1, '2022-01-27'),
(8, 14, 19, 33, 14, '2022-01-27'),
(9, 16, 9, 12, 3, '2022-01-27'),
(10, 17, 14, 22, 8, '2022-01-27'),
(11, 18, 9, 25, 16, '2022-01-27'),
(12, 21, 18, 21, 3, '2022-01-27'),
(13, 24, 14, 18, 4, '2022-01-27'),
(14, 25, 19, 23, 4, '2022-01-27'),
(15, 28, 9, 10, 1, '2022-01-27'),
(16, 26, 12, 15, 3, '2022-01-27'),
(17, 27, 9, 11, 2, '2022-01-27'),
(18, 32, 16, 17, 1, '2022-01-27'),
(19, 33, 10, 11, 1, '2022-01-27'),
(20, 37, 12, 13, 1, '2022-01-27'),
(21, 38, 24, 25, 1, '2022-01-27'),
(22, 47, 11, 12, 1, '2022-01-27'),
(23, 48, 13, 21, 8, '2022-01-27'),
(24, 51, 3, 4, 1, '2022-01-27'),
(25, 54, 24, 43, 19, '2022-01-27'),
(26, 57, 1, 2, 1, '2022-01-27'),
(27, 58, 6, 13, 7, '2022-01-27'),
(28, 61, 26, 28, 2, '2022-01-27'),
(29, 2, 23, 27, 4, '2022-01-28'),
(30, 3, 10, 16, 6, '2022-01-28'),
(31, 7, 11, 13, 2, '2022-01-28'),
(32, 9, 27, 28, 1, '2022-01-28'),
(33, 14, 32, 43, 11, '2022-01-28'),
(34, 15, 1, 2, 1, '2022-01-28'),
(35, 17, 15, 24, 9, '2022-01-28'),
(36, 18, 15, 18, 3, '2022-01-28'),
(37, 21, 15, 18, 3, '2022-01-28'),
(38, 24, 10, 14, 4, '2022-01-28'),
(39, 25, 16, 19, 3, '2022-01-28'),
(40, 29, 4, 5, 1, '2022-01-28'),
(41, 30, 7, 8, 1, '2022-01-28'),
(42, 32, 15, 16, 1, '2022-01-28'),
(43, 33, 9, 10, 1, '2022-01-28'),
(44, 38, 22, 24, 2, '2022-01-28'),
(45, 48, 19, 23, 4, '2022-01-28'),
(46, 54, 31, 36, 5, '2022-01-28'),
(47, 58, 10, 12, 2, '2022-01-28'),
(48, 59, 9, 10, 1, '2022-01-28'),
(49, 61, 26, 26, 0, '2022-01-28'),
(50, 65, 13, 16, 3, '2022-01-28'),
(51, 2, 19, 23, 4, '2022-01-29'),
(52, 3, 5, 10, 5, '2022-01-29'),
(53, 7, 10, 11, 1, '2022-01-29'),
(54, 9, 8, 27, 19, '2022-01-29'),
(55, 12, 9, 13, 4, '2022-01-29'),
(56, 14, 30, 32, 2, '2022-01-29'),
(57, 17, 12, 25, 13, '2022-01-29'),
(58, 18, 10, 25, 15, '2022-01-29'),
(59, 21, 4, 15, 11, '2022-01-29'),
(60, 24, 2, 10, 8, '2022-01-29'),
(61, 25, 9, 16, 7, '2022-01-29'),
(62, 26, 7, 12, 5, '2022-01-29'),
(63, 31, 10, 11, 1, '2022-01-29'),
(64, 32, 34, 39, 5, '2022-01-29'),
(65, 33, 8, 9, 1, '2022-01-29'),
(66, 37, 8, 12, 4, '2022-01-29'),
(67, 38, 17, 22, 5, '2022-01-29'),
(68, 43, 10, 12, 2, '2022-01-29'),
(69, 47, 2, 17, 15, '2022-01-29'),
(70, 48, 18, 29, 11, '2022-01-29'),
(71, 54, 28, 31, 3, '2022-01-29'),
(72, 59, 8, 9, 1, '2022-01-29'),
(73, 61, 14, 26, 12, '2022-01-29'),
(74, 65, 9, 13, 4, '2022-01-29'),
(75, 46, 9, 12, 3, '2022-01-29'),
(76, 2, 16, 19, 3, '2022-01-30'),
(77, 3, 7, 17, 10, '2022-01-30'),
(78, 7, 8, 10, 2, '2022-01-30'),
(79, 8, 9, 12, 3, '2022-01-30'),
(80, 9, 26, 32, 6, '2022-01-30'),
(81, 14, 22, 30, 8, '2022-01-30'),
(82, 12, 3, 9, 6, '2022-01-30'),
(83, 16, 8, 9, 1, '2022-01-30'),
(84, 17, 20, 22, 2, '2022-01-30'),
(85, 18, 15, 20, 5, '2022-01-30'),
(86, 21, 4, 10, 6, '2022-01-30'),
(87, 24, 3, 14, 11, '2022-01-30'),
(88, 25, 15, 21, 6, '2022-01-30'),
(89, 26, 12, 17, 5, '2022-01-30'),
(90, 29, 2, 4, 2, '2022-01-30'),
(91, 32, 26, 34, 8, '2022-01-30'),
(92, 33, 6, 8, 2, '2022-01-30'),
(93, 36, 5, 6, 1, '2022-01-30'),
(94, 37, 6, 8, 2, '2022-01-30'),
(95, 38, 13, 17, 4, '2022-01-30'),
(96, 39, 8, 10, 2, '2022-01-30'),
(97, 43, 9, 10, 1, '2022-01-30'),
(98, 47, 4, 8, 4, '2022-01-30'),
(99, 54, 26, 40, 14, '2022-01-30'),
(100, 56, 8, 10, 2, '2022-01-30'),
(101, 58, 7, 10, 3, '2022-01-30'),
(102, 59, 6, 8, 2, '2022-01-30'),
(103, 61, 11, 14, 3, '2022-01-30'),
(104, 65, 2, 9, 7, '2022-01-30'),
(105, 2, 10, 16, 6, '2022-01-31'),
(106, 7, 7, 8, 1, '2022-01-31'),
(107, 9, 16, 26, 10, '2022-01-31'),
(108, 11, 5, 7, 2, '2022-01-31'),
(109, 13, 5, 6, 1, '2022-01-31'),
(110, 14, 18, 22, 4, '2022-01-31'),
(111, 17, 15, 20, 5, '2022-01-31'),
(112, 24, 12, 15, 3, '2022-01-31'),
(113, 25, 14, 15, 1, '2022-01-31'),
(114, 32, 22, 26, 4, '2022-01-31'),
(115, 33, 4, 6, 2, '2022-01-31'),
(116, 37, 6, 6, 0, '2022-01-31'),
(117, 38, 9, 13, 4, '2022-01-31'),
(118, 47, 9, 10, 1, '2022-01-31'),
(119, 53, 6, 7, 1, '2022-01-31'),
(120, 54, 35, 38, 3, '2022-01-31'),
(121, 58, 13, 13, 0, '2022-01-31'),
(122, 48, 31, 38, 7, '2022-01-31'),
(123, 18, 24, 25, 1, '2022-01-31'),
(124, 36, 4, 5, 1, '2022-01-31'),
(125, 2, 4, 10, 6, '2022-02-01'),
(126, 3, 8, 13, 5, '2022-02-01'),
(127, 9, 7, 28, 21, '2022-02-01'),
(128, 11, 2, 5, 3, '2022-02-01'),
(129, 12, 0, 3, 3, '2022-02-01'),
(130, 70, 32, 42, 10, '2022-02-01'),
(131, 16, 7, 8, 1, '2022-02-01'),
(132, 18, 14, 24, 10, '2022-02-01'),
(133, 21, 9, 12, 3, '2022-02-01'),
(134, 24, 8, 12, 4, '2022-02-01'),
(135, 26, 11, 12, 1, '2022-02-01'),
(136, 27, 8, 9, 1, '2022-02-01'),
(137, 29, 7, 8, 1, '2022-02-01'),
(138, 30, 6, 7, 1, '2022-02-01'),
(139, 32, 20, 22, 2, '2022-02-01'),
(140, 37, 4, 6, 2, '2022-02-01'),
(141, 38, 8, 9, 1, '2022-02-01'),
(142, 39, 6, 8, 2, '2022-02-01'),
(143, 46, 5, 9, 4, '2022-02-01'),
(144, 47, 5, 9, 4, '2022-02-01'),
(145, 48, 29, 31, 2, '2022-02-01'),
(146, 53, 2, 6, 4, '2022-02-01'),
(147, 54, 22, 35, 13, '2022-02-01'),
(148, 56, 6, 8, 2, '2022-02-01'),
(149, 59, 5, 6, 1, '2022-02-01'),
(150, 65, 8, 12, 4, '2022-02-01'),
(151, 17, 14, 15, 1, '2022-02-01'),
(152, 2, 9, 16, 7, '2022-02-02'),
(153, 3, 12, 14, 2, '2022-02-02'),
(154, 7, 5, 7, 2, '2022-02-02'),
(155, 8, 7, 9, 2, '2022-02-02'),
(156, 9, 27, 31, 4, '2022-02-02'),
(157, 11, 0, 2, 2, '2022-02-02'),
(158, 70, 20, 44, 24, '2022-02-02'),
(159, 16, 6, 7, 1, '2022-02-02'),
(160, 17, 5, 14, 9, '2022-02-02'),
(161, 21, 6, 9, 3, '2022-02-02'),
(162, 24, 13, 20, 7, '2022-02-02'),
(163, 25, 11, 14, 3, '2022-02-02'),
(164, 26, 8, 11, 3, '2022-02-02'),
(165, 29, 6, 7, 1, '2022-02-02'),
(166, 31, 9, 10, 1, '2022-02-02'),
(167, 33, 2, 4, 2, '2022-02-02'),
(168, 36, 1, 4, 3, '2022-02-02'),
(169, 38, 26, 32, 6, '2022-02-02'),
(170, 39, 2, 6, 4, '2022-02-02'),
(171, 47, 2, 11, 9, '2022-02-02'),
(172, 48, 24, 29, 5, '2022-02-02'),
(173, 54, 13, 22, 9, '2022-02-02'),
(174, 57, 0, 1, 1, '2022-02-02'),
(175, 58, 7, 13, 6, '2022-02-02'),
(176, 59, 2, 5, 3, '2022-02-02'),
(177, 61, 17, 21, 4, '2022-02-02'),
(178, 65, 4, 8, 4, '2022-02-02'),
(179, 3, 6, 12, 6, '2022-02-03'),
(180, 7, 10, 11, 1, '2022-02-03'),
(181, 70, 37, 43, 6, '2022-02-03'),
(182, 16, 4, 6, 2, '2022-02-03'),
(183, 17, 24, 25, 1, '2022-02-03'),
(184, 18, 19, 24, 5, '2022-02-03'),
(185, 21, 14, 18, 4, '2022-02-03'),
(186, 25, 20, 23, 3, '2022-02-03'),
(187, 27, 6, 8, 2, '2022-02-03'),
(188, 32, 18, 20, 2, '2022-02-03'),
(189, 33, 1, 2, 1, '2022-02-03'),
(190, 38, 22, 26, 4, '2022-02-03'),
(191, 46, 4, 5, 1, '2022-02-03'),
(192, 47, 7, 14, 7, '2022-02-03'),
(193, 48, 15, 24, 9, '2022-02-03'),
(194, 54, 42, 49, 7, '2022-02-03'),
(195, 56, 4, 6, 2, '2022-02-03'),
(196, 59, 1, 2, 1, '2022-02-03'),
(197, 61, 10, 17, 7, '2022-02-03'),
(198, 65, 13, 14, 1, '2022-02-03'),
(199, 24, 9, 13, 4, '2022-02-03'),
(200, 28, 12, 19, 7, '2022-02-03'),
(201, 9, 26, 27, 1, '2022-02-03'),
(202, 67, 4, 9, 5, '2022-02-04'),
(203, 3, 10, 12, 2, '2022-02-04'),
(204, 7, 3, 10, 7, '2022-02-04'),
(205, 68, 13, 26, 13, '2022-02-04'),
(206, 11, 5, 6, 1, '2022-02-04'),
(207, 70, 29, 37, 8, '2022-02-04'),
(208, 17, 21, 24, 3, '2022-02-04'),
(209, 18, 14, 29, 15, '2022-02-04'),
(210, 71, 8, 14, 6, '2022-02-04'),
(211, 24, 11, 21, 10, '2022-02-04'),
(212, 25, 19, 20, 1, '2022-02-04'),
(213, 26, 14, 18, 4, '2022-02-04'),
(214, 27, 4, 6, 2, '2022-02-04'),
(215, 72, 14, 15, 1, '2022-02-04'),
(216, 31, 7, 9, 2, '2022-02-04'),
(217, 31, 7, 7, 0, '2022-02-04'),
(218, 32, 16, 18, 2, '2022-02-04'),
(219, 33, 0, 1, 1, '2022-02-04'),
(220, 38, 18, 22, 4, '2022-02-04'),
(221, 43, 5, 9, 4, '2022-02-04'),
(222, 46, 3, 4, 1, '2022-02-04'),
(223, 47, 3, 7, 4, '2022-02-04'),
(225, 73, 31, 42, 11, '2022-02-04'),
(226, 56, 2, 4, 2, '2022-02-04'),
(227, 74, 18, 19, 1, '2022-02-04'),
(228, 59, 8, 13, 5, '2022-02-04'),
(229, 61, 16, 20, 4, '2022-02-04'),
(230, 65, 9, 13, 4, '2022-02-04'),
(231, 67, 7, 16, 9, '2022-02-05'),
(232, 3, 15, 28, 13, '2022-02-05'),
(233, 7, 7, 9, 2, '2022-02-05'),
(234, 68, 10, 25, 15, '2022-02-05'),
(235, 13, 4, 5, 1, '2022-02-05'),
(236, 70, 24, 29, 5, '2022-02-05'),
(237, 16, 2, 4, 2, '2022-02-05'),
(238, 17, 8, 21, 13, '2022-02-05'),
(239, 18, 18, 24, 6, '2022-02-05'),
(240, 71, 9, 14, 5, '2022-02-05'),
(241, 24, 19, 23, 4, '2022-02-05'),
(242, 25, 18, 19, 1, '2022-02-05'),
(243, 26, 9, 14, 5, '2022-02-05'),
(244, 27, 0, 4, 4, '2022-02-05'),
(245, 29, 5, 6, 1, '2022-02-05'),
(246, 32, 15, 16, 1, '2022-02-05'),
(247, 36, 5, 7, 2, '2022-02-05'),
(248, 38, 13, 18, 5, '2022-02-05'),
(249, 39, 7, 10, 3, '2022-02-05'),
(250, 43, 9, 11, 2, '2022-02-05'),
(251, 46, 2, 3, 1, '2022-02-05'),
(252, 47, 5, 9, 4, '2022-02-05'),
(253, 48, 20, 26, 6, '2022-02-05'),
(254, 73, 25, 31, 6, '2022-02-05'),
(255, 56, 7, 8, 1, '2022-02-05'),
(256, 59, 11, 14, 3, '2022-02-05'),
(257, 61, 15, 16, 1, '2022-02-05'),
(258, 65, 3, 9, 6, '2022-02-05'),
(259, 67, 5, 7, 2, '2022-02-06'),
(260, 3, 16, 21, 5, '2022-02-06'),
(261, 68, 14, 22, 8, '2022-02-06'),
(262, 11, 2, 5, 3, '2022-02-06'),
(263, 8, 5, 7, 2, '2022-02-06'),
(264, 70, 17, 24, 7, '2022-02-06'),
(265, 17, 13, 18, 5, '2022-02-06'),
(266, 18, 11, 18, 7, '2022-02-06'),
(267, 71, 13, 15, 2, '2022-02-06'),
(268, 24, 13, 19, 6, '2022-02-06'),
(269, 25, 17, 18, 1, '2022-02-06'),
(270, 26, 15, 19, 4, '2022-02-06'),
(271, 72, 13, 14, 1, '2022-02-06'),
(272, 29, 4, 5, 1, '2022-02-06'),
(273, 35, 11, 12, 1, '2022-02-06'),
(274, 37, 14, 16, 2, '2022-02-06'),
(275, 38, 6, 13, 7, '2022-02-06'),
(276, 47, 10, 11, 1, '2022-02-06'),
(277, 48, 19, 20, 1, '2022-02-06'),
(278, 73, 14, 25, 11, '2022-02-06'),
(279, 56, 6, 7, 1, '2022-02-06'),
(280, 74, 16, 18, 2, '2022-02-06'),
(281, 59, 10, 11, 1, '2022-02-06'),
(282, 61, 8, 15, 7, '2022-02-06'),
(283, 65, 2, 13, 11, '2022-02-06'),
(284, 67, 3, 17, 14, '2022-02-07'),
(285, 3, 21, 22, 1, '2022-02-07'),
(286, 7, 4, 7, 3, '2022-02-07'),
(287, 8, 3, 5, 2, '2022-02-07'),
(288, 68, 21, 26, 5, '2022-02-07'),
(289, 70, 21, 29, 8, '2022-02-07'),
(290, 17, 12, 23, 11, '2022-02-07'),
(291, 18, 19, 21, 2, '2022-02-07'),
(292, 24, 12, 13, 1, '2022-02-07'),
(293, 26, 12, 15, 3, '2022-02-07'),
(294, 32, 37, 39, 2, '2022-02-07'),
(295, 33, 11, 12, 1, '2022-02-07'),
(296, 37, 10, 14, 4, '2022-02-07'),
(297, 38, 25, 30, 5, '2022-02-07'),
(298, 46, 1, 2, 1, '2022-02-07'),
(299, 47, 9, 10, 1, '2022-02-07'),
(300, 48, 7, 19, 12, '2022-02-07'),
(301, 73, 18, 26, 8, '2022-02-07'),
(302, 56, 5, 6, 1, '2022-02-07'),
(303, 59, 6, 10, 4, '2022-02-07'),
(304, 61, 14, 18, 4, '2022-02-07'),
(305, 65, 11, 12, 1, '2022-02-07'),
(306, 67, 3, 9, 6, '2022-02-08'),
(307, 3, 20, 21, 1, '2022-02-08'),
(308, 7, 9, 10, 1, '2022-02-08'),
(309, 70, 22, 23, 1, '2022-02-08'),
(310, 16, 22, 26, 4, '2022-02-08'),
(311, 17, 16, 22, 6, '2022-02-08'),
(312, 18, 9, 19, 10, '2022-02-08'),
(313, 71, 12, 14, 2, '2022-02-08'),
(314, 22, 4, 5, 1, '2022-02-08'),
(315, 24, 10, 12, 2, '2022-02-08'),
(316, 25, 16, 17, 1, '2022-02-08'),
(317, 26, 16, 22, 6, '2022-02-08'),
(318, 72, 9, 13, 4, '2022-02-08'),
(319, 29, 2, 4, 2, '2022-02-08'),
(320, 32, 35, 37, 2, '2022-02-08'),
(321, 37, 8, 10, 2, '2022-02-08'),
(322, 38, 19, 25, 6, '2022-02-08'),
(323, 43, 8, 9, 1, '2022-02-08'),
(324, 47, 6, 15, 9, '2022-02-08'),
(326, 73, 26, 30, 4, '2022-02-08'),
(327, 74, 14, 16, 2, '2022-02-08'),
(328, 59, 4, 6, 2, '2022-02-08'),
(329, 61, 22, 24, 2, '2022-02-08'),
(330, 10, 2, 3, 1, '2022-02-08'),
(331, 11, 7, 8, 1, '2022-02-08');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `PrixAchat` float DEFAULT NULL,
  `PrixVente` float DEFAULT NULL,
  `QuantiteStock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `Nom`, `PrixAchat`, `PrixVente`, `QuantiteStock`) VALUES
(1, '8 PM', 0, 16000, 1),
(2, '33\'export', 2366.66, 3000, 9),
(3, 'Afia jus', 1333.33, 1800, 20),
(4, 'Agasha', 0, 0, 0),
(5, 'Amarula grand', 18000, 24000, 2),
(6, 'Amarula petit', 9000, 14000, 3),
(7, 'Amestel', 1583.33, 3500, 9),
(8, 'Bavaria', 2666.66, 4000, 3),
(9, 'Beaufort', 1708.33, 2500, 26),
(10, 'Bishops grand', 3666.66, 5000, 2),
(11, 'Bishops moyen', 1833.33, 2500, 7),
(12, 'Booster', 1300, 2000, 0),
(13, 'Capitaine petit', 1833.33, 2500, 4),
(14, 'Castel', 1275, 1800, 20),
(15, 'chamdor', 10000, 16000, 1),
(16, 'Citronelle', 1166.66, 2000, 22),
(17, 'Class', 1665, 2500, 16),
(18, 'Club', 2500, 3000, 9),
(19, 'Danof Vodka', 0, 16000, 0),
(20, 'Don Simon', 0, 0, 0),
(21, 'Doppel', 2366.66, 3000, 14),
(22, 'Drosdy petit', 4666.66, 10000, 4),
(23, 'Drosdy grand', 10000, 16000, 1),
(24, 'Energy drink', 666.66, 1000, 10),
(25, 'Fanta petit', 833.33, 1000, 16),
(26, 'Fanta y.m', 1225, 2000, 16),
(27, 'Guiness', 2666.66, 4000, 0),
(28, 'Heineken', 2500, 3500, 12),
(29, 'Inyange', 3666.66, 4000, 2),
(30, 'Jus coca petit', 750, 1000, 6),
(31, 'Jus fanta petit', 750, 1000, 7),
(32, 'Jus maracuja', 666.66, 1000, 35),
(33, 'Jus mirinda petit', 750, 1000, 11),
(34, 'Jus mirinda grand', 750, 1500, 0),
(35, 'Kazire', 750, 1000, 11),
(36, 'Kingfisher', 3000, 4000, 5),
(37, 'Lavie grand', 916.66, 1500, 8),
(38, 'Lavie petit', 458.33, 700, 19),
(39, 'Leffe', 3000, 4000, 7),
(40, 'Legende ', 0, 0, 0),
(41, 'Martini', 16000, 20000, 3),
(42, 'May', 0, 16000, 0),
(43, 'Miitzig', 2250, 3000, 8),
(44, 'Muscador', 10000, 16000, 2),
(45, 'Novida grand', 0, 1500, 0),
(46, 'Novida petit', 750, 1000, 1),
(47, 'Primus grand ', 2250, 3000, 6),
(48, 'Primus petit', 1600, 2000, 18),
(49, 'Red bull', 0, 0, 0),
(50, 'Red label grand', 2333.33, 30000, 1),
(51, 'Red label petit', 7333.33, 10000, 3),
(52, 'Royale', 3200, 4000, 16),
(53, 'Savana', 2666.66, 4000, 8),
(54, 'Simba', 2366.66, 3000, 42),
(55, 'Simirinof', 0, 0, 0),
(56, 'Stoney grand', 1083.33, 1500, 5),
(57, 'Stoney petit', 750, 1000, 0),
(58, 'Tembo', 2450, 3500, 19),
(59, 'Tonic grand', 1083.33, 1500, 4),
(60, 'Tonic petit', 750, 1000, 0),
(61, 'Turbo petit', 1665, 2000, 22),
(62, 'Turbo grand', 0, 3000, 0),
(63, 'Uganda waragi', 4000, 6000, 2),
(64, 'Vin de messe', 16000, 20000, 1),
(65, 'vitalo', 1250, 2000, 11),
(66, 'Vodka', 0, 0, 0),
(67, '33 export 2', 2575, 3500, 3),
(68, 'Beaufort 2', 1800, 2500, 21),
(69, 'Booster 2', 1358.33, 2000, 0),
(70, 'Castel 2', 1383.33, 2000, 22),
(71, 'Doppel 2', 2575, 3500, 12),
(72, 'Heineken 2 ', 2750, 4000, 9),
(73, 'Simba 2', 2575, 3500, 26),
(74, 'Tembo 2 ', 2658.33, 4000, 14);

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE `sortie` (
  `idSortie` int(11) NOT NULL,
  `TypeD` varchar(20) NOT NULL,
  `Montant` float NOT NULL,
  `il_pris_quoi` varchar(100) NOT NULL,
  `DatesD` date NOT NULL DEFAULT current_timestamp(),
  `DatesP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`idSortie`, `TypeD`, `Montant`, `il_pris_quoi`, `DatesD`, `DatesP`) VALUES
(1, 'Dette', 5000, 'motif:franc', '2022-01-27', NULL),
(2, 'Charge', 2500, 'motif:maman', '2022-01-27', NULL),
(3, 'Charge', 1200, 'motif:stilo et tire bouchon', '2022-01-27', NULL),
(4, 'Charge', 1500, 'motif:papier servette', '2022-01-27', NULL),
(5, 'Charge', 3000, 'motif: Achat du pain', '2022-01-28', NULL),
(6, 'Charge', 1000, 'motif: achat unite', '2022-01-29', NULL),
(8, 'Charge', 2700, 'motif: achat du pain', '2022-01-29', NULL),
(9, 'Charge', 3000, 'motif: achat de 1 panier', '2022-01-29', NULL),
(10, 'Dette', 2000, 'motif: Arsene', '2022-01-29', NULL),
(11, 'Dette', 4000, 'motif: Franck', '2022-01-29', NULL),
(12, 'Charge', 13000, 'motif: Maman', '2022-01-30', NULL),
(13, 'Charge', 3000, 'motif: Achat du pain', '2022-01-30', NULL),
(14, 'Charge', 2000, 'motif: transport pour achat', '2022-01-31', NULL),
(15, 'Charge', 1000, 'motif: Maman', '2022-01-31', NULL),
(16, 'Dette', 1000, 'motif: Bjeanne', '2022-01-31', NULL),
(17, 'Depense', 6000, 'motif: Achat de 2 bouteilles de doppel', '2022-01-31', NULL),
(18, 'Aucun', 1500, 'motif: achat papier serviette', '2022-01-31', NULL),
(19, 'Charge', 1000, 'motif: achat de 1 tire bouchon', '2022-02-01', NULL),
(20, 'Charge', 200, 'motif: achat de 1 stylo', '2022-02-01', NULL),
(21, 'Charge', 3000, 'motif: achat du pain', '2022-02-01', NULL),
(23, 'Charge', 1500, 'motif: achat de 1 papier serviette', '2022-02-01', NULL),
(24, 'Charge', 2500, 'motif: achat du pain', '2022-02-02', NULL),
(25, 'Charge', 2000, 'motif: Transport pour achat', '2022-02-02', NULL),
(26, 'Aucun', 500, 'motif: ajout pour achat de beaufort', '2022-02-02', NULL),
(27, 'Depense', 16700, 'motif: Achat de 1/2 caisse de castel', '2022-02-02', NULL),
(28, 'Charge', 2000, 'motif: transport pour achat', '2022-02-03', NULL),
(29, 'Aucun', 3000, 'motif: achat du pain', '2022-02-03', NULL),
(30, 'Dette', 4000, 'motif: pret a Vieux Tolin', '2022-02-03', NULL),
(31, 'Depense', 8000, 'motif: Achat de 2 bouteilles de Leffe', '2022-02-03', NULL),
(32, 'Depense', 33000, 'motif: Achat de 1/2 heineken', '2022-02-03', NULL),
(34, 'Charge', 5000, 'motif: Maman', '2022-02-04', NULL),
(35, 'Depense', 25000, 'motif: achat de 1/2 caisse de club', '2022-02-04', NULL),
(36, 'Charge', 2700, 'motif: achat du pain', '2022-02-04', NULL),
(37, 'Dette', 3500, 'motif: consignation consommee: 1 Amestel', '2022-02-04', NULL),
(38, 'Charge', 500, 'motif: maman', '2022-02-04', NULL),
(39, 'Depense', 2000, 'motif: achat de 1 bouteille de primus pt', '2022-02-04', NULL),
(40, 'Charge', 1000, 'motif: achat unites', '2022-02-05', NULL),
(41, 'Depense', 7500, 'motif: pour la reception de la ristourne', '2022-02-05', NULL),
(42, 'Charge', 2000, 'motif: transport pour achat', '2022-02-05', NULL),
(43, 'Charge', 5000, 'motif: maman', '2022-02-05', NULL),
(44, 'Charge', 2700, 'motif: achat du pain ', '2022-02-05', NULL),
(45, 'Charge', 3000, 'motif: Achat du pain', '2022-02-06', NULL),
(46, 'Dette', 12000, 'motif: consignation: 3 castel consommee', '2022-02-06', NULL),
(47, 'Charge', 3000, 'motif: Achat du pain', '2022-02-07', NULL),
(48, 'Depense', 16600, 'motif: Achat de 1/2 caisse de castel', '2022-02-07', NULL),
(49, 'Depense', 3500, 'motif: Achat de 1 bouteille de doppel', '2022-02-07', NULL),
(50, 'Charge', 3000, 'motif: Achat du pain', '2022-02-08', NULL),
(51, 'Depense', 3500, 'motif: consignation consommee: 1 amestel', '2022-02-08', NULL),
(52, 'Depense', 2000, 'motif: Achat de 1 primus pt', '2022-02-08', NULL),
(53, 'Depense', 13500, 'motif: achat de 1/2 caisse de primus gr', '2022-02-08', NULL),
(54, 'Depense', 12300, 'motif: achat de 1/2 caisse de fanta y.m', '2022-02-08', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bonusperte`
--
ALTER TABLE `bonusperte`
  ADD PRIMARY KEY (`idBonusPerte`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`idCaisse`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `commandant`
--
ALTER TABLE `commandant`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `detteclient`
--
ALTER TABLE `detteclient`
  ADD PRIMARY KEY (`idDette`),
  ADD KEY `DetteClient_ibfk_1` (`idClient`);

--
-- Index pour la table `detteentreprise`
--
ALTER TABLE `detteentreprise`
  ADD PRIMARY KEY (`idDette`);

--
-- Index pour la table `dimiinution`
--
ALTER TABLE `dimiinution`
  ADD PRIMARY KEY (`idDiminution`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`idSortie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bonusperte`
--
ALTER TABLE `bonusperte`
  MODIFY `idBonusPerte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `idCaisse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `commandant`
--
ALTER TABLE `commandant`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `detteclient`
--
ALTER TABLE `detteclient`
  MODIFY `idDette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `detteentreprise`
--
ALTER TABLE `detteentreprise`
  MODIFY `idDette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `dimiinution`
--
ALTER TABLE `dimiinution`
  MODIFY `idDiminution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `sortie`
--
ALTER TABLE `sortie`
  MODIFY `idSortie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bonusperte`
--
ALTER TABLE `bonusperte`
  ADD CONSTRAINT `bonusperte_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detteclient`
--
ALTER TABLE `detteclient`
  ADD CONSTRAINT `detteclient_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `dimiinution`
--
ALTER TABLE `dimiinution`
  ADD CONSTRAINT `dimiinution_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
