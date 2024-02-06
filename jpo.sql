-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 fév. 2024 à 12:51
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
  `nom d'utilisateur` varchar(50) NOT NULL,
  `mot de passe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `connaissance`
--

DROP TABLE IF EXISTS `connaissance`;
CREATE TABLE IF NOT EXISTS `connaissance` (
  `id_connaissance` int NOT NULL AUTO_INCREMENT,
  `moyen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_connaissance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id_etablissement` int NOT NULL AUTO_INCREMENT,
  `nom etablissement` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code postal` int NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau etude`
--

DROP TABLE IF EXISTS `niveau etude`;
CREATE TABLE IF NOT EXISTS `niveau etude` (
  `id_niveau` int NOT NULL AUTO_INCREMENT,
  `RNCP` varchar(20) NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `id_pdf` int NOT NULL AUTO_INCREMENT,
  `date d'export` date NOT NULL,
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
  `journée` date NOT NULL,
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
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `N° de téléphone` int NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Code postal` int NOT NULL,
  `projet` text NOT NULL,
  `pre_inscrit` tinyint(1) NOT NULL,
  `niveau etude` varchar(20) NOT NULL,
  `heure d'enregistrement` date NOT NULL,
  PRIMARY KEY (`id_prospect`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `étudiant`
--

DROP TABLE IF EXISTS `étudiant`;
CREATE TABLE IF NOT EXISTS `étudiant` (
  `id_etudiant` int NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `formation` tinyint NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
