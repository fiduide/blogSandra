-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 13 juin 2020 à 13:06
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(100) NOT NULL,
  `titre_livre` varchar(55) NOT NULL,
  `auteur_livre` varchar(55) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `p1` text,
  `p2` text,
  `p3` text,
  `p4` text,
  `p5` text,
  `auteur` varchar(25) NOT NULL,
  `date_ajout` date NOT NULL,
  `nom_img` varchar(55) DEFAULT NULL,
  `nb_commentaires` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `sujet`, `titre_livre`, `auteur_livre`, `categorie`, `p1`, `p2`, `p3`, `p4`, `p5`, `auteur`, `date_ajout`, `nom_img`, `nb_commentaires`) VALUES
(26, 'Petite test de réel article', 'Il était une fois', 'Robert Pattingson', 'Fantastique', 'Il était une fois, l\'histoire d\'un test sans prétention, et pourtant, nous n\'avions pas de moyen afin de découvrir, si cela marchait réellement.', '', '', '', '', 'Dorian', '2020-06-12', 'Il était une fois&Robert Pattingson', 0),
(28, 'sqdqsdqs', 'sqdqsd', 'qsdqs', 'Fantastique', 'Ceci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un testCeci était un test', '', '', '', '', 'Dorian', '2020-06-12', NULL, 0),
(30, 'TEST', 'Test', 'Test', 'Romantique', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu aliquet magna. Morbi placerat ipsum tellus, nec efficitur neque dapibus sed. Integer at risus eu justo auctor malesuada. Phasellus eget purus at est commodo vehicula. Nulla eleifend non massa ut hendrerit. Cras sed dictum neque. Sed semper neque diam, vitae varius erat aliquet quis. Ut nec dictum libero. Suspendisse eu maximus urna, ut convallis risus. Mauris eget venenatis lorem. Ut finibus nec ante ut facilisis. Nullam sed lacus interdum, vestibulum lacus vel, dignissim eros. Nam lobortis, justo id dictum placerat, nunc justo faucibus dui, non rhoncus velit tortor et augue. Morbi non tincidunt nibh, hendrerit rhoncus ipsum. Nulla facilisi. Vivamus hendrerit sollicitudin nunc, ac rhoncus lectus hendrerit nec. Phasellus dictum ut mauris eu rutrum. Mauris accumsan ultrices velit, non tempor sem blandit non. Pellentesque interdum dolor dolor. Vestibulum aliquet, nunc et fermentum placerat, metus justo pharetra nulla, quis bibendum sem metus quis libero. Curabitur bibendum hendrerit condimentum. Integer enim eros, luctus vitae bibendum ut, interdum in risus. Nam ac nulla varius, eleifend ex vitae, dignissim augue. Morbi volutpat purus ac auctor varius. Phasellus at ipsum vel felis efficitur sagittis et nec mauris. Duis rutrum sit amet augue non tincidunt. Phasellus eu eros hendrerit ex consectetur ullamcorper. Cras tempor risus nec massa cursus, sit amet pharetra velit fringilla. Pellentesque quis dolor aliquam, eleifend magna sed, dignissim elit. Aliquam diam elit, placerat nec ex eget, laoreet facilisis lacus. Ut pharetra dui quis augue fringilla, id aliquam dolor ullamcorper. Duis vehicula augue sit amet urna porta, vel pellentesque eros scelerisque. Proin maximus, augue et accumsan imperdiet, dolor est posuere eros, eget posuere tortor purus nec ante. Suspendisse potenti. Suspendisse tempus tristique lorem, sed convallis lectus hendrerit a. Nam posuere venenatis sem, nec faucibus metus ornare eu. Pellentesque laoreet dictum tortor, et luctus quam. Nulla commodo aliquet luctus. Maecenas dui augue, sodales et eleifend in, maximus sed quam. Proin rhoncus eros a dui pellentesque consequat. Cras finibus mattis dignissim. Vestibulum at varius mi. Donec in aliquam purus. Duis ipsum neque, mollis at justo eget, luctus ultrices leo. Vestibulum tristique dolor a felis vestibulum consectetur. Vestibulum rutrum dui vitae feugiat convallis. Suspendisse eu erat mollis, auctor lorem sit amet, laoreet odio. Curabitur lacinia, quam sit amet venenatis tempor, nibh sem ullamcorper enim, fringilla placerat erat turpis non felis. Vestibulum in ipsum in tellus tincidunt bibendum. Cras at erat vitae diam sodales varius.', '', '', '', '', 'Dorian', '2020-06-12', 'Test&Test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date_ajout` date NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `fk_articlesCom` (`id_article`),
  KEY `fk_utilisateurCom` (`id_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_com`, `id_article`, `id_membre`, `commentaire`, `date_ajout`) VALUES
(14, 16, 2, 'HELLO j\'adore continu comme ça ! ', '2020-06-12'),
(15, 30, 14, 'lkjhkglhjghjhlghjg', '2020-06-12');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'membre',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
(14, 'Guillet', 'Sandra', 'sandra.glt18@gmail.com', '18.11.2000', 'admin'),
(2, 'Cappe', 'Dorian', 'dorian161100@hotmail.fr', '12', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
