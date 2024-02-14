-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 14 fév. 2024 à 08:59
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
-- Structure de la table `prospect`
--

DROP TABLE IF EXISTS `prospect`;
CREATE TABLE IF NOT EXISTS `prospect` (
  `id_prospect` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` text NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code_postal` int NOT NULL,
  `formation` varchar(50) NOT NULL,
  `projet` text NOT NULL,
  `note prive` text NOT NULL,
  `pre_inscrit` tinyint(1) NOT NULL,
  `niveau_etude` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `decouverte_IIA` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `heure_enregistrement` datetime NOT NULL,
  PRIMARY KEY (`id_prospect`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prospect`
--

INSERT INTO `prospect` (`id_prospect`, `prenom`, `nom`, `email`, `tel`, `adresse`, `ville`, `code_postal`, `formation`, `projet`, `note prive`, `pre_inscrit`, `niveau_etude`, `decouverte_IIA`, `heure_enregistrement`) VALUES
(2, 'Jeremy', 'Blanchard', 'jeremy.blanchard@gmail.com', '123456789', '1 boulevard de Saint Nazaire', 'Pornichet', 44380, '', 'Ne pas se retrouver dans la même classe que Claire', '', 0, '1', '0', '2024-02-06 14:24:43'),
(39, 'Rayan', 'Mars', 'rayan.mars@gmail.com', '620084692', 'sans domicile fixe', 'Saint Nazaire', 44600, '', 'je veux etudier wallah', '', 1, '3', '0', '2024-02-06 16:00:24'),
(45, 'Theo', 'Foucher', 'theonicolas.foucher@gmail.com', '771944433', '77B route de Tréfféac', 'Trignac', 44570, '', 'je veux etudier wallah', '', 1, '3', '1', '2024-02-06 16:34:43'),
(51, 'Teo', 'Foucher', 'theonicolas.foucher@gmail.com', '0771944433', '77B route de Tr&eacute;ff&eacute;ac', 'Trignac', 0, '', 'j\'ai a manger dans mon ', '', 1, '3', '3', '2024-02-07 11:56:23'),
(52, 'Merlet', 'Arya', 'arya.merlet@gmail.com', '0786373449', '3 rue du Docteur Zamenhof', 'Nantes', 44200, '', 'c\'est pas clair', '', 1, '4', '4', '2024-02-12 09:27:35'),
(53, 'Merlet', 'Arya', 'arya.merlet@gmail.com', '0786373449', '3 rue du Docteur Zamenhof', 'Nantes', 44200, '', 'c\'est pas clair', '', 1, '4', '4', '2024-02-12 09:28:33'),
(57, 'Aria', 'Merlet', 'arya.merlet@gmail.com', '0786373449', '3 rue du Docteur Zamenhof', 'Nantes', 0, '', 'c\'est pas clair', '', 1, '3', '1', '2024-02-12 10:47:44'),
(58, 'Aria', 'Merlet', 'arya.merlet@gmail.com', '786373449', '3 rue du Docteur Zamenhof', 'Nantes', 0, '', 'c\'est pas clair', '', 1, '3', '4', '2024-02-12 13:24:05'),
(59, 'Arya', 'Fran&ccedil;ois', 'arya.merlet@gmail.com', '0786373449', '3 rue du Docteur Zamenhof', 'Nantes', 44200, '', 'erer', '', 1, '5', '1', '2024-02-12 14:37:37'),
(60, 'Arya', 'Bonnet', 'arya.merlet@gmail.com', '48768758758757', '3 rue du Docteur Zamenhof', 'Nantes', 44200, '', 'olujuj', '', 1, '5', '1', '2024-02-12 14:38:09'),
(61, 'Teo', 'Bonnet', 'arya.merlet@gmail.com', '475875757', '3 rue du Docteur Zamenhof', 'Nantes', 44200, '', '^p&ugrave;p', '', 1, '5', '1', '2024-02-12 14:38:58'),
(62, 'Claude', 'Bonnet', 't.merlet1996@gmail.com', '535463543', '3 rue du Docteur Zamenhof', 'Nantes', 44200, '', 'esserser', '', 1, '5', '1', '2024-02-12 14:43:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
