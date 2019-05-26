-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 22 Mai 2019 à 02:24
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ulogs`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `category` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`idCategory`, `category`) VALUES
(1, 'A faire'),
(2, 'En cours'),
(3, 'Fini');

-- --------------------------------------------------------

--
-- Structure de la table `forkeywords`
--

CREATE TABLE `forkeywords` (
  `idLogs` int(11) NOT NULL,
  `idKw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `keywords`
--

CREATE TABLE `keywords` (
  `idKw` int(11) NOT NULL,
  `keyword` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `keywords`
--

INSERT INTO `keywords` (`idKw`, `keyword`) VALUES
(1, 'bugs'),
(2, 'bug'),
(3, 'linux'),
(4, 'server'),
(5, 'users'),
(6, 'debian'),
(7, 'alpine'),
(8, 'plugin'),
(9, 'error'),
(10, 'warning'),
(11, 'maintenance'),
(12, 'attack'),
(13, 'ddos'),
(14, 'errors'),
(15, 'developper'),
(16, 'programmer'),
(17, 'design');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `idLogs` int(11) NOT NULL,
  `title` varchar(42) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` text,
  `idversion` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logs`
--

INSERT INTO `logs` (`idLogs`, `title`, `date`, `content`, `idversion`, `idcategory`, `image`) VALUES
(1, 'Hello World', '2019-05-22 02:21:22', 'Ceci est un test.', 1, 1, '3459395235ce496027e2369.49527947.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `email`) VALUES
(1, 'Benjamin', 'test', 'benjamin@udesk.com'),
(2, 'Cedric', 'test', 'cedric@udesk.com'),
(3, 'Cedric', 'test', 'cedric@udesk.com'),
(4, 'Cedric', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'cedric@udesk.com'),
(5, 'Test', '$2y$10$EATVVNYldWolHbYw/4UOV.ejKPwT2F1zkuNnAPAZAze0POBSN7N3u', 'test@est.fr');

-- --------------------------------------------------------

--
-- Structure de la table `versions`
--

CREATE TABLE `versions` (
  `idVersion` int(11) NOT NULL,
  `version` float DEFAULT NULL,
  `idlogs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `versions`
--

INSERT INTO `versions` (`idVersion`, `version`, `idlogs`) VALUES
(1, 1, NULL),
(2, 1.2, NULL),
(3, 1.3, NULL),
(4, 1.4, NULL),
(5, 1.5, NULL),
(6, 1.6, NULL),
(7, 1.7, NULL),
(8, 1.8, NULL),
(9, 1.9, NULL),
(10, 2, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `forkeywords`
--
ALTER TABLE `forkeywords`
  ADD PRIMARY KEY (`idLogs`,`idKw`),
  ADD KEY `FK_ForKeyWords_idKw` (`idKw`);

--
-- Index pour la table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`idKw`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idLogs`),
  ADD KEY `FK_Logs_idversion` (`idversion`),
  ADD KEY `FK_Logs_idcategory` (`idcategory`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`idVersion`),
  ADD KEY `FK_Versions_idlogs` (`idlogs`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `forkeywords`
--
ALTER TABLE `forkeywords`
  MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `idKw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `versions`
--
ALTER TABLE `versions`
  MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `forkeywords`
--
ALTER TABLE `forkeywords`
  ADD CONSTRAINT `FK_ForKeyWords_idKw` FOREIGN KEY (`idKw`) REFERENCES `keywords` (`idKw`),
  ADD CONSTRAINT `FK_ForKeyWords_idLogs` FOREIGN KEY (`idLogs`) REFERENCES `logs` (`idLogs`);

--
-- Contraintes pour la table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `FK_Logs_idcategory` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idCategory`),
  ADD CONSTRAINT `FK_Logs_idversion` FOREIGN KEY (`idversion`) REFERENCES `versions` (`idVersion`);

--
-- Contraintes pour la table `versions`
--
ALTER TABLE `versions`
  ADD CONSTRAINT `FK_Versions_idlogs` FOREIGN KEY (`idlogs`) REFERENCES `logs` (`idLogs`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
