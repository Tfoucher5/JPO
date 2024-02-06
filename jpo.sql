-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 fév. 2024 à 13:51
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

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

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mot_de_passe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `moyen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_connaissance`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id_etablissement` int NOT NULL AUTO_INCREMENT,
  `nom_etablissement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int NOT NULL,
  PRIMARY KEY (`id_etablissement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `alternance` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom`, `alternance`) VALUES
(1, 'BTS SIO SLAM', 0),
(2, 'BTS SIO SLAM', 1),
(3, 'BTS SIO SISR', 0),
(4, 'BTS SIO SISR', 1),
(6, 'LIC  SIO SLAM', 1),
(8, 'LIC  SIO SISR', 1),
(9, 'MASTER LEAD DEVELOPEUR', 1),
(10, 'MASTER MANAGER CYBERSECURITE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_etude`
--

DROP TABLE IF EXISTS `niveau_etude`;
CREATE TABLE IF NOT EXISTS `niveau_etude` (
  `id_niveau` int NOT NULL AUTO_INCREMENT,
  `RNCP` varchar(20) NOT NULL,
  `equivalent` varchar(10) NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `lien` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pdf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `id_planning` int NOT NULL AUTO_INCREMENT,
  `journee` date NOT NULL,
  `matin` tinyint(1) NOT NULL,
  `soir` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_planning`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prospect`
--

DROP TABLE IF EXISTS `prospect`;
CREATE TABLE IF NOT EXISTS `prospect` (
  `id_prospect` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `n°_de_téléphone` int NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `code_postal` int NOT NULL,
  `projet` text NOT NULL,
  `pre_inscrit` tinyint(1) NOT NULL,
  `niveau_etude` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `decouverte_IIA` int NOT NULL,
  `heure_enregistrement` datetime NOT NULL,
  PRIMARY KEY (`id_prospect`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prospect`
--

INSERT INTO `prospect` (`id_prospect`, `prenom`, `nom`, `email`, `n°_de_téléphone`, `adresse`, `Ville`, `code_postal`, `projet`, `pre_inscrit`, `niveau_etude`, `decouverte_IIA`, `heure_enregistrement`) VALUES
(2, 'Jeremy', 'Blanchard', 'jeremy.blanchard@gmail.com', 123456789, '1 boulevard de Saint Nazaire', 'Pornichet', 44380, 'Ne pas se retrouver dans la même classe que Claire', 0, '1', 0, '2024-02-06 14:24:43');

-- --------------------------------------------------------

--
-- Structure de la table `étudiant`
--

DROP TABLE IF EXISTS `étudiant`;
CREATE TABLE IF NOT EXISTS `étudiant` (
  `id_etudiant` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `formation` tinyint NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
