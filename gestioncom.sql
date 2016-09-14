-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 14 Septembre 2016 à 18:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestioncom`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeclient` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `codeclient`, `nom`, `prenoms`, `datenaissance`, `email`, `ville`, `telephone`) VALUES
(27, 'DI', 'DOSSOU', 'IsraÃªl', '1996-02-19', 'isodoss@yahoo.com', 'akpakpa', 67686960),
(29, 'AG', 'AFFOGBOLO', 'Gio', '1998-05-19', 'ggito@yahoo.com', 'calavi', 95233686),
(30, 'BC', 'BIAOU', 'bebeto', '2016-09-12', 'bebeto@gmail.fr', 'akpakpa', 98979695),
(31, 'KL', 'KOUAKAN', 'Lory', '2000-01-29', 'kouak@yahoo.com', 'cotonou', 61002255),
(33, 'CCC', 'mme', 'noush', '2016-09-07', 'amir@ccc.com', 'ctn', 33333333),
(34, 'karthvodje', 'Sir', 'joey', '2016-08-30', 'jojo@k.fr', 'calavigodomey', 66666666),
(39, 'dernier', 'last', 'laster', '2016-09-13', 'last@last.com', 'lastville', 95956363);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeclient` varchar(255) NOT NULL,
  `refcommande` varchar(255) NOT NULL,
  `datecommande` date NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `codeclient`, `refcommande`, `datecommande`, `montant`) VALUES
(27, 'AG', '1', '2016-09-12', 1000),
(29, 'DI', 'di1', '2016-09-11', 12000),
(30, 'BC', 'bc01', '2016-09-13', 50000),
(31, 'YM', 'ym1', '2016-09-13', 1000050),
(33, 'KL', 'kl01', '2016-09-01', 12000),
(34, 'dernier', 'd1', '2016-09-13', 18500);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `password`) VALUES
(3, 'giovanni', '037c70dbc1c812f6b2091688804d7b17'),
(5, 'isodoss', 'a8ee44f0b9089014f16c792cc1b966d9'),
(6, 'isodoss', 'a8ee44f0b9089014f16c792cc1b966d9');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
