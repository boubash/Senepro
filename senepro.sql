-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 12 Septembre 2013 à 20:20
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `senepro`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE  `client` (
  `ID_client` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(35) NOT NULL,
  `Prenom` varchar(35) NOT NULL,
  `adresse` varchar(35) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

/*INSERT INTO `client` (`ID_client`, `Nom`, `Prenom`, `adresse`, `telephone`) VALUES
(12, 'aidara', 'lamine', 'hlm grand yoff', '77 320 38 39'),
(13, 'seck', ' niania', 'scat urbam', '77 123 45 67'),
(17, 'diop', 'malick', 'thies', '77 125 76 34'),
(21, 'hanne', 'aly', 'almadie', '77 329 47 50'),
(25, 'dieng', 'seydou', 'thies', '77 633 16 68'),
(26, 'diagne', 'ablaye', 'arafat', '77 345 67 89'),
(27, 'messi', 'lionel', 'argentine', '00221771405031');*/

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--
/*
CREATE TABLE  `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` datetime NOT NULL,
  `date_livraison` datetime NOT NULL,
  `avance` varchar(12) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;
*/
--
-- Contenu de la table `commande`
--

-- INSERT INTO `commande` (`id_commande`, `date_commande`, `date_livraison`, `avance`, `id_client`) VALUES
-- (19, '2013-09-01 00:00:00', '2013-09-06 00:00:00', '14567', 12),
-- (25, '2013-09-04 00:00:00', '0000-00-00 00:00:00', '3000', 13),
-- (26, '2013-09-03 00:00:00', '2013-09-11 00:00:00', '1287', 13),
-- (28, '2013-09-12 00:00:00', '2013-08-29 00:00:00', '34568', 13),
-- (29, '2013-08-30 00:00:00', '2013-10-06 00:00:00', '2000', 12),
-- (30, '2013-09-12 00:00:00', '2013-09-17 00:00:00', '1000', 25),
-- (31, '2013-09-12 00:00:00', '2013-09-17 00:00:00', '2500', 27),
-- (32, '2013-09-13 00:00:00', '2013-09-20 00:00:00', '2700', 21);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_de_commande`
--

CREATE TABLE  `ligne_de_commande` (
  `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL,
  `id_materiel` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_ligne_commande`),
  KEY `id_materiel` (`id_materiel`),
  KEY `id_commande` (`id_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `ligne_de_commande`
--

-- INSERT INTO `ligne_de_commande` (`id_ligne_commande`, `nombre`, `id_materiel`, `id_commande`) VALUES
-- (4, 0, 9, 19),
-- (16, 3, 10, 19),
-- (17, 3, 10, 19),
-- (18, 78, 23, 19),
-- (19, 1, 11, 19),
-- (20, 4, 13, 19),
-- (21, 6, 17, 19);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE  `materiel` (
  `id_materiel` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(35) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id_materiel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `materiel`
--

-- 


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`ID_client`);

--
-- Contraintes pour la table `ligne_de_commande`
--
ALTER TABLE `ligne_de_commande`
  ADD CONSTRAINT `ligne_de_commande_ibfk_1` FOREIGN KEY (`id_materiel`) REFERENCES `materiel` (`id_materiel`),
  ADD CONSTRAINT `ligne_de_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
