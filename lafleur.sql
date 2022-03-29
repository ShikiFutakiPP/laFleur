-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 mars 2022 à 15:46
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lafleur`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `code_categorie` varchar(4) NOT NULL,
  `libelle_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`code_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`code_categorie`, `libelle_categorie`) VALUES
('bul', 'Bulbes'),
('mas', 'Plantes &agrave; massif'),
('ros', 'Rosiers');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `code_commandes` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_livraison` varchar(3) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`code_commandes`),
  KEY `Commandes_UTILISATEUR_FK` (`adresse_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `code_produit` varchar(4) NOT NULL,
  `code_commandes` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`code_produit`,`code_commandes`),
  KEY `contient_Commandes0_FK` (`code_commandes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `code_panier` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`code_panier`),
  UNIQUE KEY `PANIER_UTILISATEUR_AK` (`adresse_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `code_produit` varchar(4) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `en_stock` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `code_categorie` varchar(4) NOT NULL,
  PRIMARY KEY (`code_produit`),
  KEY `PRODUIT_CATEGORIE_FK` (`code_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`code_produit`, `nom_produit`, `prix`, `en_stock`, `image`, `code_categorie`) VALUES
('b01', '3 bulbes de b&eacute;gonias', 5, 125, 'bulbes_begonia', 'bul'),
('b02', '10 bulbes de dahlias', 12, 100, 'bulbes_dahlia', 'bul'),
('b03', '50 gla&iuml;euls', 9, 98, 'bulbes_glaieul', 'bul'),
('m01', 'Lot de 3 marguerites', 5, 52, 'massif_marguerite', 'mas'),
('m02', 'Pour un bouquet de 6 pens&eacute;es', 6, 45, 'massif_pensee', 'mas'),
('m03', 'M&eacute;lange vari&eacute; de 10 plantes &agrave', 15, 21, 'massif_melange', 'mas'),
('r01', '1 pied sp&eacute;cial grandes fleurs', 20, 35, 'rosiers_gdefleur', 'ros'),
('r02', 'Une vari&eacute;t&eacute; s&eacute;lectionn&eacute', 9, 78, 'rosiers_parfum', 'ros'),
('r03', 'Rosier arbuste', 8, 29, 'rosiers_arbuste', 'ros');

-- --------------------------------------------------------

--
-- Structure de la table `selectionner`
--

DROP TABLE IF EXISTS `selectionner`;
CREATE TABLE IF NOT EXISTS `selectionner` (
  `code_panier` int(11) NOT NULL,
  `code_produit` varchar(4) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`code_panier`,`code_produit`),
  KEY `selectionner_PRODUIT0_FK` (`code_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `adresse_mail` varchar(50) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`adresse_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `Commandes_UTILISATEUR_FK` FOREIGN KEY (`adresse_mail`) REFERENCES `utilisateur` (`adresse_mail`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_Commandes0_FK` FOREIGN KEY (`code_commandes`) REFERENCES `commandes` (`code_commandes`),
  ADD CONSTRAINT `contient_PRODUIT_FK` FOREIGN KEY (`code_produit`) REFERENCES `produit` (`code_produit`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `PANIER_UTILISATEUR_FK` FOREIGN KEY (`adresse_mail`) REFERENCES `utilisateur` (`adresse_mail`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `PRODUIT_CATEGORIE_FK` FOREIGN KEY (`code_categorie`) REFERENCES `categorie` (`code_categorie`);

--
-- Contraintes pour la table `selectionner`
--
ALTER TABLE `selectionner`
  ADD CONSTRAINT `selectionner_PANIER_FK` FOREIGN KEY (`code_panier`) REFERENCES `panier` (`code_panier`),
  ADD CONSTRAINT `selectionner_PRODUIT0_FK` FOREIGN KEY (`code_produit`) REFERENCES `produit` (`code_produit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
