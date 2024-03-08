-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 mars 2024 à 14:46
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jpo`
--
CREATE DATABASE IF NOT EXISTS `jpo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jpo`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_utilisateur`, `mot_de_passe`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `connaissance`
--

DROP TABLE IF EXISTS `connaissance`;
CREATE TABLE IF NOT EXISTS `connaissance` (
  `id_connaissance` int NOT NULL AUTO_INCREMENT,
  `moyen` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_connaissance`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `connaissance`
--

INSERT INTO `connaissance` (`id_connaissance`, `moyen`) VALUES
(1, 'Recherche en ligne'),
(2, 'Publicité en ligne'),
(3, 'Réseaux sociaux'),
(4, 'Salons'),
(5, 'Bouche à oreille'),
(6, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `option_formation` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alternance` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom`, `option_formation`, `alternance`) VALUES
(2, 'BTS SIO', 'SLAM', 0),
(3, 'BTS SIO', 'SLAM', 1),
(4, 'BTS SIO', 'SISR', 0),
(6, 'BTS SIO', 'SISR', 1),
(8, 'LIC SIO', 'SLAM', 1),
(19, 'LIC SIO', 'SISR', 1),
(18, 'MASTER', 'Lead developpeur', 1),
(20, 'MASTER', 'cybersécurité', 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_etude`
--

DROP TABLE IF EXISTS `niveau_etude`;
CREATE TABLE IF NOT EXISTS `niveau_etude` (
  `id_niveau` int NOT NULL AUTO_INCREMENT,
  `RNCP` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `equivalent` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau_etude`
--

INSERT INTO `niveau_etude` (`id_niveau`, `RNCP`, `equivalent`) VALUES
(1, 'I', 'master'),
(2, 'II', 'licence'),
(3, 'III', 'bac +2'),
(4, 'IV', 'bac'),
(5, 'V', 'CAP');

-- --------------------------------------------------------

--
-- Structure de la table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `id_pdf` int NOT NULL AUTO_INCREMENT,
  `date_export` datetime NOT NULL,
  `lien` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pdf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prospect`
--

DROP TABLE IF EXISTS `prospect`;
CREATE TABLE IF NOT EXISTS `prospect` (
  `id_prospect` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_postal` int NOT NULL,
  `formation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `formation_option` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `formation_alternance` int NOT NULL,
  `projet` text COLLATE utf8mb4_general_ci NOT NULL,
  `note_prive` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pre_inscrit` tinyint(1) NOT NULL,
  `niveau_etude` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `decouverte_IIA` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `heure_enregistrement` datetime NOT NULL,
  PRIMARY KEY (`id_prospect`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prospect`
--

INSERT INTO `prospect` (`id_prospect`, `prenom`, `nom`, `email`, `tel`, `adresse`, `ville`, `code_postal`, `formation`, `formation_option`, `formation_alternance`, `projet`, `note_prive`, `pre_inscrit`, `niveau_etude`, `decouverte_IIA`, `heure_enregistrement`) VALUES
(74, 'dfx', 'xdfxd', 'xfxf', 'xdfxdf', '', '', 0, 'BTS SIO', 'SLAM', 1, '', '', 0, 'master', 'Recherche en ligne', '2024-03-08 15:27:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
