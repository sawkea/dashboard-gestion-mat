-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 août 2020 à 08:13
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `pseudo`, `mot_de_passe`) VALUES
(5, 'sonia', 'sonia'),
(4, 'lisa', 'lisa'),
(6, 'admin', 'pass');

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
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(55) DEFAULT NULL,
  `cp` varchar(6) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `reference`, `categorie_id`, `date_achat`, `fin_garantie`, `prix`, `conseils_entretien`, `facture`, `manuel_utilisation`, `adresse`, `ville`, `cp`, `url`) VALUES
(1, 'ROWENTA X-PERT 160', 'RH7221WO', 1, '2020-07-05', '2021-07-05', 170.42, 'nettoyer le filtre après chaque utilisation', 'facture/row-ticket.jpg', 'manuel/row-guide.pdf', '', '', '', ''),
(3, 'TV LED Samsung', 'UE50TU7125', 3, '2020-06-16', '2021-06-16', 449.99, 'dépoussierer\r\ndébrancher en cas d\'orage', 'facture/tv-facture.jpg', 'manuel/notice.pdf', '', '', '', ''),
(6, 'Micro-onde Whirpool', 'LM826 BV', 1, '2020-08-17', '2020-08-18', 11, '-ne pas couvrir l\'aeration', '', '', '44 rue marmotte', 'Besançon', '25000', ''),
(11, 'TV LED Sony', 'UE50TU7125', 3, '2020-06-12', '2021-06-16', 1266.99, 'dépoussiererdébrancher en cas d\'orage', '', '', '44 rue marmotte', 'Besançon', '25000', ''),
(12, 'Tablette Sony', '120UE4659DJF0', 4, '2020-08-17', '2021-08-17', 350, 'attendre que la batterie soit vide avant de recharger', '', '', 'Boulanger chateaufarine', 'Besançon', '25000', ''),
(13, 'TV LED Samsung', 'UE50TU7125', 2, '2020-06-16', '2021-06-16', 449.99, 'dépoussierer débrancher en cas d\'orage', '', '', '', '', '', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
