-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 30 juil. 2020 à 07:33
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dgma`
--

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(55) DEFAULT NULL,
  `cp` varchar(6) DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id`, `nom`, `adresse`, `ville`, `cp`, `pays`, `url`) VALUES
(2, 'BOULANGER', 'chateaufarine (centre commercial)', 'Besançon', '25000', 'France', NULL),
(3, 'DARTY', 'chateaufarine (centre commercial)', 'Besançon', '25000', 'France', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Électroménager'),
(2, 'Bricolage'),
(3, 'TV-HIFI'),
(4, 'Voiture');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(55) NOT NULL,
  `mot_de_passe` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `pseudo`, `mot_de_passe`) VALUES
(1, 'admin', '*F757EE7C8726B3275D528FB21814A9A3743446FE'),
(3, 'Lisa', 'Vaneil');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `reference` varchar(45) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  `fin_garantie` date NOT NULL,
  `prix` float NOT NULL,
  `conseils_entretien` text NOT NULL,
  `facture` varchar(255) DEFAULT NULL,
  `manuel_utilisation` varchar(255) DEFAULT NULL,
  `boutique_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`),
  KEY `boutique_id` (`boutique_id`),
  KEY `e-commerce_id` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `reference`, `categorie_id`, `date_achat`, `fin_garantie`, `prix`, `conseils_entretien`, `facture`, `manuel_utilisation`, `boutique_id`, `site_id`) VALUES
(1, 'ROWENTA X-PERT 160', 'RH7221WO', 1, '2020-07-05', '2021-07-05', 170.42, 'nettoyer le filtre après chaque utilisation', 'facture/row-ticket.jpg', 'manuel/row-guide.pdf', 2, NULL),
(2, 'Refrigerateur americain', 'Lg GSJ470DIDV', 1, '2020-07-01', '2022-07-01', 1499, '-changer les filtres tous les 6 mois\r\n-nettoyer régulièrement', 'facture/frigoam-facture.jpg', NULL, 3, NULL),
(3, 'TV LED Samsung', 'UE50TU7125', 3, '2020-06-16', '2021-06-16', 449.99, 'dépoussierer\r\ndébrancher en cas d\'orage', 'facture/tv-facture.jpg', 'manuel/notice.pdf', 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`id`, `url`) VALUES
(1, 'www.cdiscount.com'),
(2, 'www.amazon.fr');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`boutique_id`) REFERENCES `boutique` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
