-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Dic 14, 2017 alle 15:52
-- Versione del server: 5.7.20-0ubuntu0.16.04.1
-- Versione PHP: 7.0.26-2+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `fantacarrier`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `00_LEAGUES`
--

CREATE TABLE `00_LEAGUES` (
  `ID` int(11) NOT NULL,
  `ID_LEAGUE` int(11) DEFAULT NULL,
  `NAME` varchar(50) NOT NULL,
  `ID_CREATOR` int(11) DEFAULT NULL,
  `PARTS` int(11) DEFAULT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `00_LEAGUES`
--

INSERT INTO `00_LEAGUES` (`ID`, `ID_LEAGUE`, `NAME`, `ID_CREATOR`, `PARTS`, `DATE`) VALUES
(18, 1, 'Lega 4 Mori', 1, 16, '2017-11-24 14:39:08'),
(19, 2, 'Miuleague', 2, 12, '2017-11-24 15:11:21'),
(20, 3, 'MANLIOS_LEAGUE', 3, 16, '2017-12-11 15:41:37');

-- --------------------------------------------------------

--
-- Struttura della tabella `01_LEAGUES_DETAIL`
--

CREATE TABLE `01_LEAGUES_DETAIL` (
  `ID` int(11) NOT NULL,
  `ID_SERIES` int(11) DEFAULT NULL,
  `ID_PARENT` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `PARTS` varchar(500) NOT NULL,
  `LEVEL` int(11) DEFAULT NULL,
  `CODE_AN` varchar(50) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `01_LEAGUES_DETAIL`
--

INSERT INTO `01_LEAGUES_DETAIL` (`ID`, `ID_SERIES`, `ID_PARENT`, `NAME`, `PARTS`, `LEVEL`, `CODE_AN`, `DATE`) VALUES
(33, 1, 1, 'Serie A', '8', 1, 'LC001K2001', '2017-11-24 14:39:08'),
(34, 2, 1, 'Serie B', '8', 2, 'LC001S3001', '2017-11-24 14:39:08'),
(35, 3, 2, 'Miuleague', '12', 1, 'LC002M6001', '2017-11-24 15:11:21'),
(36, 1, 3, 'Manlietto', '16', 1, 'LC003M3001', '2017-12-11 15:41:37');

-- --------------------------------------------------------

--
-- Struttura della tabella `02_LEAGUES_USERS`
--

CREATE TABLE `02_LEAGUES_USERS` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ID_USER` int(11) NOT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  `ONLINE` datetime DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `SURNAME` varchar(50) DEFAULT NULL,
  `BIRTH` date DEFAULT NULL,
  `REGION` varchar(50) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `02_LEAGUES_USERS`
--

INSERT INTO `02_LEAGUES_USERS` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `ID_USER`, `ACTIVE`, `ONLINE`, `NAME`, `SURNAME`, `BIRTH`, `REGION`, `DATE`) VALUES
(9, 'ggg', '45337d0574af66591661d99d49b5012a51c2a5e5a9779a3c70400d5579c63312', 'giambattista.aresu@gmail.com', 1, 1, '2017-12-14 15:35:03', 'Giambattista', 'Aresu', '2017-01-19', 'Sardegna', '2017-11-23 11:23:08'),
(10, 'miumiu', '4b67eb9e246ec1b0c8df1e473d3506c2014c2acf03870233fad8e23ed9fb0945', 'miumiu@miumiu.miu', 2, 1, '2017-11-24 15:36:05', NULL, NULL, NULL, NULL, '2017-11-23 16:12:53'),
(11, 'manlio', '8e96bd02fbcb054cca11cf8deb031562b9aaedd83f83ff7abf7c3fa787ad9bbd', 'manlio@manlio.in', 3, 1, '2017-12-11 16:08:53', NULL, NULL, NULL, NULL, '2017-12-11 15:39:34');

-- --------------------------------------------------------

--
-- Struttura della tabella `03_LEAGUES_TEAMS`
--

CREATE TABLE `03_LEAGUES_TEAMS` (
  `ID` int(11) NOT NULL,
  `ID_TEAM` int(11) DEFAULT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `ID_LEAGUE` int(11) DEFAULT NULL,
  `ID_SERIES` int(11) DEFAULT NULL,
  `TEAM` varchar(100) DEFAULT NULL,
  `DEF_LGE` int(11) DEFAULT NULL,
  `USE_LGE` int(11) DEFAULT NULL,
  `ADMIN` int(11) DEFAULT NULL,
  `ROLE` varchar(100) DEFAULT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `03_LEAGUES_TEAMS`
--

INSERT INTO `03_LEAGUES_TEAMS` (`ID`, `ID_TEAM`, `ID_OWNER`, `ID_LEAGUE`, `ID_SERIES`, `TEAM`, `DEF_LGE`, `USE_LGE`, `ADMIN`, `ROLE`, `DATE`) VALUES
(7, 1, 1, 1, 1, 'Fluminense', 1, 1, 1, 'Presidente', '2017-11-24 14:39:08'),
(8, 2, 2, 2, 1, 'Miuteam', 1, 1, 1, 'Allenatore', '2017-11-24 15:11:21'),
(14, 3, 1, 2, 3, 'Prova_team', 0, 0, 0, 'Dirigente', '2017-12-11 15:36:15'),
(15, 4, 3, 3, 1, 'ManlioTeam', 1, 1, 1, NULL, '2017-12-11 15:41:37'),
(16, 5, 1, 3, 1, 'ProvaManlio', 0, 0, 0, 'Presidente-Allenatore', '2017-12-11 16:09:15');

-- --------------------------------------------------------

--
-- Struttura della tabella `04_LEAGUES_COMP`
--

CREATE TABLE `04_LEAGUES_COMP` (
  `ID` int(11) NOT NULL,
  `ID_COMP` int(11) DEFAULT NULL,
  `ID_LEAGUE` int(11) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `00_LEAGUES`
--
ALTER TABLE `00_LEAGUES`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `01_LEAGUES_DETAIL`
--
ALTER TABLE `01_LEAGUES_DETAIL`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `02_LEAGUES_USERS`
--
ALTER TABLE `02_LEAGUES_USERS`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `03_LEAGUES_TEAMS`
--
ALTER TABLE `03_LEAGUES_TEAMS`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `04_LEAGUES_COMP`
--
ALTER TABLE `04_LEAGUES_COMP`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `00_LEAGUES`
--
ALTER TABLE `00_LEAGUES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT per la tabella `01_LEAGUES_DETAIL`
--
ALTER TABLE `01_LEAGUES_DETAIL`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT per la tabella `02_LEAGUES_USERS`
--
ALTER TABLE `02_LEAGUES_USERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `03_LEAGUES_TEAMS`
--
ALTER TABLE `03_LEAGUES_TEAMS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT per la tabella `04_LEAGUES_COMP`
--
ALTER TABLE `04_LEAGUES_COMP`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
