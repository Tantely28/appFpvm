-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 11 mai 2019 à 15:50
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
  `id` int(11) NOT NULL,
  `mpiangona_id` int(11) DEFAULT NULL,
  `daty_nanefana` datetime NOT NULL,
  `volana` datetime NOT NULL,
  `vola` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adidy`
--

INSERT INTO `adidy` (`id`, `mpiangona_id`, `daty_nanefana`, `volana`, `vola`) VALUES
(1, 3, '2014-01-01 00:00:00', '2014-01-01 00:00:00', '300');

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
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190510190107', '2019-05-10 19:01:19');

-- --------------------------------------------------------

--
-- Structure de la table `mpiangona`
--

CREATE TABLE `mpiangona` (
  `id` int(11) NOT NULL,
  `sampana_id` int(11) DEFAULT NULL,
  `anarana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `adresy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mpandray` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mpiangona`
--

INSERT INTO `mpiangona` (`id`, `sampana_id`, `anarana`, `telephone`, `adresy`, `login`, `mdp`, `mpandray`) VALUES
(1, 1, 'test', 34444, 'ary eee', 'test', 'test mdp', 'non'),
(2, 1, 'Rakotobe Marco', 2147483647, 'Ankadifotsy', 'marco', 'marco mdp', 'oui'),
(3, 1, 'Andry', 324421167, 'Tsararano', 'andry', 'andry mdp', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `sampana`
--

CREATE TABLE `sampana` (
  `id` int(11) NOT NULL,
  `anarana` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sampana`
--

INSERT INTO `sampana` (`id`, `anarana`) VALUES
(1, 'CHORALE');

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE `temoignage` (
  `id` int(11) NOT NULL,
  `mpiangona_id` int(11) DEFAULT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `toriteny`
--

CREATE TABLE `toriteny` (
  `id_toriteny` int(11) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vaovao`
--

CREATE TABLE `vaovao` (
  `id_vaovao` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vaovao`
--

INSERT INTO `vaovao` (`id_vaovao`, `titre`, `contenu`) VALUES
(1, 'Fifalina', 'Le sage roi Salomon a ecrit : “ R ´ ejouis-toi, ´\r\njeune homme [ou jeune fille], dans ta jeunesse,\r\net que ton cœur te fasse du bien aux jours de ton\r\nadolescence, et marche dans les voies de ton\r\ncœur et dans les choses que voient tes yeux. ”\r\n(Ecclesiaste11:9). Quand on est jeune, la vie peut ´\r\netre vraiment int ˆ eressante et passionnante. Nous ´\r\nvous souhaitons sincerement d’en profiter. Que `\r\nce soit cependant d’une facon qui plaise ¸ a`\r\nJehovah Dieu ! N’oubliez pas qu’il voit ce que ´\r\nvous faites de votre vie et qu’il vous jugera en\r\ncons\r\nequence. D’o ´ u l’int ` er ´ et de suivre cet autre ˆ\r\nconseil de Salomon : “ Souviens-toi donc de ton\r\nGrand Createur aux jours de ton adolescence. ” ´');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B97A5E201BAA7B22` (`mpiangona_id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `mpiangona`
--
ALTER TABLE `mpiangona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3840AB68ED5A3FDC` (`sampana_id`);

--
-- Index pour la table `sampana`
--
ALTER TABLE `sampana`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BDADBC461BAA7B22` (`mpiangona_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mpiangona`
--
ALTER TABLE `mpiangona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sampana`
--
ALTER TABLE `sampana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `temoignage`
--
ALTER TABLE `temoignage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `toriteny`
--
ALTER TABLE `toriteny`
  MODIFY `id_toriteny` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vaovao`
--
ALTER TABLE `vaovao`
  MODIFY `id_vaovao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD CONSTRAINT `FK_B97A5E201BAA7B22` FOREIGN KEY (`mpiangona_id`) REFERENCES `mpiangona` (`id`);

--
-- Contraintes pour la table `mpiangona`
--
ALTER TABLE `mpiangona`
  ADD CONSTRAINT `FK_3840AB68ED5A3FDC` FOREIGN KEY (`sampana_id`) REFERENCES `sampana` (`id`);

--
-- Contraintes pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD CONSTRAINT `FK_BDADBC461BAA7B22` FOREIGN KEY (`mpiangona_id`) REFERENCES `mpiangona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
