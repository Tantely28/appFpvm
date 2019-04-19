-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 19 avr. 2019 à 15:10
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_fpvm`
--

-- --------------------------------------------------------

--
-- Structure de la table `adidy`
--

CREATE TABLE `adidy` (
  `id_adidy` int(11) NOT NULL,
  `id_mpiangona` int(11) NOT NULL,
  `daty_nanefana` datetime DEFAULT NULL,
  `volana` date DEFAULT NULL,
  `vola` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'fpvm', 'fpvm mdp');

-- --------------------------------------------------------

--
-- Structure de la table `mpiangona`
--

CREATE TABLE `mpiangona` (
  `id_mpiangona` int(11) NOT NULL,
  `id_sampana` int(11) DEFAULT NULL,
  `anaarana` varchar(255) NOT NULL,
  `tel` int(15) DEFAULT NULL,
  `adresy` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mpandray` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sampana`
--

CREATE TABLE `sampana` (
  `id_sampana` int(11) NOT NULL,
  `anarana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE `temoignage` (
  `id_temoignage` int(11) NOT NULL,
  `id_mpiangona` int(11) DEFAULT NULL,
  `contenue` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `toriteny`
--

CREATE TABLE `toriteny` (
  `id_toriteny` int(11) NOT NULL,
  `contenu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vaovao`
--

CREATE TABLE `vaovao` (
  `id_vaovao` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD PRIMARY KEY (`id_adidy`),
  ADD KEY `id_mpiangona` (`id_mpiangona`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mpiangona`
--
ALTER TABLE `mpiangona`
  ADD PRIMARY KEY (`id_mpiangona`),
  ADD KEY `id_sampana` (`id_sampana`);

--
-- Index pour la table `sampana`
--
ALTER TABLE `sampana`
  ADD PRIMARY KEY (`id_sampana`);

--
-- Index pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD PRIMARY KEY (`id_temoignage`),
  ADD KEY `id_mpiangona` (`id_mpiangona`);

--
-- Index pour la table `toriteny`
--
ALTER TABLE `toriteny`
  ADD PRIMARY KEY (`id_toriteny`);

--
-- Index pour la table `vaovao`
--
ALTER TABLE `vaovao`
  ADD PRIMARY KEY (`id_vaovao`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adidy`
--
ALTER TABLE `adidy`
  MODIFY `id_adidy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mpiangona`
--
ALTER TABLE `mpiangona`
  MODIFY `id_mpiangona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sampana`
--
ALTER TABLE `sampana`
  MODIFY `id_sampana` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `temoignage`
--
ALTER TABLE `temoignage`
  MODIFY `id_temoignage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `toriteny`
--
ALTER TABLE `toriteny`
  MODIFY `id_toriteny` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vaovao`
--
ALTER TABLE `vaovao`
  MODIFY `id_vaovao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD CONSTRAINT `adidy_ibfk_1` FOREIGN KEY (`id_mpiangona`) REFERENCES `mpiangona` (`id_mpiangona`);

--
-- Contraintes pour la table `mpiangona`
--
ALTER TABLE `mpiangona`
  ADD CONSTRAINT `mpiangona_ibfk_1` FOREIGN KEY (`id_sampana`) REFERENCES `sampana` (`id_sampana`);

--
-- Contraintes pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD CONSTRAINT `temoignage_ibfk_1` FOREIGN KEY (`id_mpiangona`) REFERENCES `mpiangona` (`id_mpiangona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
