-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 08, 2017 alle 16:12
-- Versione del server: 5.7.18-0ubuntu0.16.04.1
-- Versione PHP: 7.0.20-2~ubuntu16.04.1+deb.sury.org+1

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
  `NAME` varchar(50) NOT NULL,
  `CAMP_TYPE` varchar(50) DEFAULT NULL,
  `WHICH_COMP` varchar(500) DEFAULT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `00_LEAGUES`
--

INSERT INTO `00_LEAGUES` (`ID`, `NAME`, `CAMP_TYPE`, `WHICH_COMP`, `DATE`) VALUES
(1, 'l4m', 'B&32&4', 'CAM%Campionato&CLX%Coppe di Ogni Lega&CHL%Champions League&ELG%Europa League&B11%Best 11&R4M%DEF&SLX%DEF', '2017-10-09 00:00:00'),
(2, 'home', 'A&8&1', 'CAM%Campionato&CLX%Coppe di Ogni Lega&CHL%Champions League&ELG%Europa League&B11%Best 11&R4M%DEF&SLX%DEF', '2017-11-07 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `01_LEAGUES_DETAIL`
--

CREATE TABLE `01_LEAGUES_DETAIL` (
  `ID` int(11) NOT NULL,
  `ID_PARENT` int(11) NOT NULL,
  `NAMES` varchar(500) NOT NULL,
  `PARTS` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `01_LEAGUES_DETAIL`
--

INSERT INTO `01_LEAGUES_DETAIL` (`ID`, `ID_PARENT`, `NAMES`, `PARTS`) VALUES
(1, 1, 'Serie A&Serie B&Serie C1a&Serie C1b', '8&8&8&8'),
(2, 2, 'Campionato', '8');

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
(1, 'ggg', '45337d0574af66591661d99d49b5012a51c2a5e5a9779a3c70400d5579c63312', 'giambattista.aresu@gmail.com', 1, 1, '2017-11-08 16:09:13', '2017-10-16 00:00:00'),
(2, 'andrea', '88d9f967c7421235b3b095fef04d6f7905f470405860d4d27dcc4f0f33bc30f9', 'giambattista.aresu@gmail.com', 2, 1, NULL, '2017-11-08 10:21:15');

-- --------------------------------------------------------

--
-- Struttura della tabella `03_LEAGUES_TEAMS`
--

CREATE TABLE `03_LEAGUES_TEAMS` (
  `ID` int(11) NOT NULL,
  `ID_PARENT` int(11) DEFAULT NULL,
  `ID_LEAGUE` int(11) DEFAULT NULL,
  `TEAM` varchar(100) DEFAULT NULL,
  `DEF_LGE` int(11) DEFAULT NULL,
  `USE_LGE` int(11) DEFAULT NULL,
  `ROLE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `03_LEAGUES_TEAMS`
--

INSERT INTO `03_LEAGUES_TEAMS` (`ID`, `ID_PARENT`, `ID_LEAGUE`, `TEAM`, `DEF_LGE`, `USE_LGE`, `ROLE`) VALUES
(1, 1, 1, 'Fluminense', 1, 1, 'Allenatore'),
(2, 1, 2, 'Science', 0, 0, 'Allenatore'),
(3, 2, 1, 'Sexlargius', 1, 1, 'Allenatore');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `01_LEAGUES_DETAIL`
--
ALTER TABLE `01_LEAGUES_DETAIL`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `02_LEAGUES_USERS`
--
ALTER TABLE `02_LEAGUES_USERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `03_LEAGUES_TEAMS`
--
ALTER TABLE `03_LEAGUES_TEAMS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
