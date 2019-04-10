/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `unilogsdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`idCategory` int(11) NOT NULL,
  `category` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forimages`
--

CREATE TABLE IF NOT EXISTS `forimages` (
`idLogs` int(11) NOT NULL,
  `idImg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forkeywords`
--

CREATE TABLE IF NOT EXISTS `forkeywords` (
`idLogs` int(11) NOT NULL,
  `idKw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`idImg` int(11) NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
`idKw` int(11) NOT NULL,
  `keyword` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`idLogs` int(11) NOT NULL,
  `title` varchar(42) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` text,
  `idversion` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `versions`
--

CREATE TABLE IF NOT EXISTS `versions` (
`idVersion` int(11) NOT NULL,
  `version` float DEFAULT NULL,
  `idlogs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `forimages`
--
ALTER TABLE `forimages`
 ADD PRIMARY KEY (`idLogs`,`idImg`), ADD KEY `FK_ForImages_idImg` (`idImg`);

--
-- Index pour la table `forkeywords`
--
ALTER TABLE `forkeywords`
 ADD PRIMARY KEY (`idLogs`,`idKw`), ADD KEY `FK_ForKeyWords_idKw` (`idKw`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`idImg`);

--
-- Index pour la table `keywords`
--
ALTER TABLE `keywords`
 ADD PRIMARY KEY (`idKw`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`idLogs`), ADD KEY `FK_Logs_idversion` (`idversion`), ADD KEY `FK_Logs_idcategory` (`idcategory`);

--
-- Index pour la table `versions`
--
ALTER TABLE `versions`
 ADD PRIMARY KEY (`idVersion`), ADD KEY `FK_Versions_idlogs` (`idlogs`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forimages`
--
ALTER TABLE `forimages`
MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forkeywords`
--
ALTER TABLE `forkeywords`
MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
MODIFY `idImg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `keywords`
--
ALTER TABLE `keywords`
MODIFY `idKw` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `versions`
--
ALTER TABLE `versions`
MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `forimages`
--
ALTER TABLE `forimages`
ADD CONSTRAINT `FK_ForImages_idImg` FOREIGN KEY (`idImg`) REFERENCES `images` (`idImg`),
ADD CONSTRAINT `FK_ForImages_idLogs` FOREIGN KEY (`idLogs`) REFERENCES `logs` (`idLogs`);

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
