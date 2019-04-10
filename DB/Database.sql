CREATE TABLE IF NOT EXISTS `category` (
`idCategory` int(11) NOT NULL,
  `category` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `forimages` (
`idLogs` int(11) NOT NULL,
  `idImg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `forkeywords` (
`idLogs` int(11) NOT NULL,
  `idKw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `images` (
`idImg` int(11) NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `keywords` (
`idKw` int(11) NOT NULL,
  `keyword` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `logs` (
`idLogs` int(11) NOT NULL,
  `title` varchar(42) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` text,
  `idversion` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `versions` (
`idVersion` int(11) NOT NULL,
  `version` float DEFAULT NULL,
  `idlogs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--

ALTER TABLE `category`
 ADD PRIMARY KEY (`idCategory`);

--

ALTER TABLE `forimages`
 ADD PRIMARY KEY (`idLogs`,`idImg`), ADD KEY `FK_ForImages_idImg` (`idImg`);

--

ALTER TABLE `forkeywords`
 ADD PRIMARY KEY (`idLogs`,`idKw`), ADD KEY `FK_ForKeyWords_idKw` (`idKw`);

--

ALTER TABLE `images`
 ADD PRIMARY KEY (`idImg`);

--

ALTER TABLE `keywords`
 ADD PRIMARY KEY (`idKw`);

--

ALTER TABLE `logs`
 ADD PRIMARY KEY (`idLogs`), ADD KEY `FK_Logs_idversion` (`idversion`), ADD KEY `FK_Logs_idcategory` (`idcategory`);

--
ALTER TABLE `versions`
 ADD PRIMARY KEY (`idVersion`), ADD KEY `FK_Versions_idlogs` (`idlogs`);

--
--

ALTER TABLE `category`
MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `forimages`
MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `forkeywords`
MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `images`
MODIFY `idImg` int(11) NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `keywords`
MODIFY `idKw` int(11) NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `logs`
MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `versions`
MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT;


--
--

ALTER TABLE `forimages`
ADD CONSTRAINT `FK_ForImages_idImg` FOREIGN KEY (`idImg`) REFERENCES `images` (`idImg`),
ADD CONSTRAINT `FK_ForImages_idLogs` FOREIGN KEY (`idLogs`) REFERENCES `logs` (`idLogs`);

--

ALTER TABLE `forkeywords`
ADD CONSTRAINT `FK_ForKeyWords_idKw` FOREIGN KEY (`idKw`) REFERENCES `keywords` (`idKw`),
ADD CONSTRAINT `FK_ForKeyWords_idLogs` FOREIGN KEY (`idLogs`) REFERENCES `logs` (`idLogs`);

--

ALTER TABLE `logs`
ADD CONSTRAINT `FK_Logs_idcategory` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idCategory`),
ADD CONSTRAINT `FK_Logs_idversion` FOREIGN KEY (`idversion`) REFERENCES `versions` (`idVersion`);

--

ALTER TABLE `versions`
ADD CONSTRAINT `FK_Versions_idlogs` FOREIGN KEY (`idlogs`) REFERENCES `logs` (`idLogs`);