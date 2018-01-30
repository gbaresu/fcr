-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 28, 2017 alle 13:55
-- Versione del server: 5.7.18-0ubuntu0.16.04.1
-- Versione PHP: 7.0.20-2~ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `my_lega4mori`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `00_LEAGUES`
--

CREATE TABLE `00_LEAGUES` (
  `ID` int(11) NOT NULL,
  `ID_LGE` int(11) DEFAULT NULL,
  `NAME` varchar(50) NOT NULL,
  `ID_CREATOR` int(11) DEFAULT NULL,
  `PARTS` int(11) DEFAULT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `00_LEAGUES`
--

INSERT INTO `00_LEAGUES` (`ID`, `ID_LGE`, `NAME`, `ID_CREATOR`, `PARTS`, `DATE`) VALUES
(18, 1, 'Lega 4 Mori', 1, 16, '2017-11-24 14:39:08'),
(19, 2, 'Miuleague', 2, 12, '2017-11-24 15:11:21');

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
(35, 1, 2, 'Miuleague', '12', 1, 'LC002M6001', '2017-11-24 15:11:21');

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
  `DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `02_LEAGUES_USERS`
--

INSERT INTO `02_LEAGUES_USERS` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `ID_USER`, `ACTIVE`, `ONLINE`, `DATE`) VALUES
(9, 'ggg', '45337d0574af66591661d99d49b5012a51c2a5e5a9779a3c70400d5579c63312', 'giambattista.aresu@gmail.com', 1, 1, '2017-11-28 13:44:57', '2017-11-23 11:23:08'),
(10, 'miumiu', '4b67eb9e246ec1b0c8df1e473d3506c2014c2acf03870233fad8e23ed9fb0945', 'miumiu@miumiu.miu', 2, 1, '2017-11-24 15:36:05', '2017-11-23 16:12:53');

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
(7, 1, 1, 1, 1, 'Fluminense', 1, 1, 1, NULL, '2017-11-24 14:39:08'),
(8, 2, 2, 2, 1, 'Miuteam', 1, 1, 1, NULL, '2017-11-24 15:11:21');

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
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `00_LEAGUES`
--
ALTER TABLE `00_LEAGUES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT per la tabella `01_LEAGUES_DETAIL`
--
ALTER TABLE `01_LEAGUES_DETAIL`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT per la tabella `02_LEAGUES_USERS`
--
ALTER TABLE `02_LEAGUES_USERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT per la tabella `03_LEAGUES_TEAMS`
--
ALTER TABLE `03_LEAGUES_TEAMS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
