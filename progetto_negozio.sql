-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 21, 2023 alle 17:26
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto_negozio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `nome_oggetto` varchar(255) NOT NULL,
  `descrizione` varchar(10000) DEFAULT NULL,
  `data_inserimento` date NOT NULL DEFAULT curdate(),
  `tipo_prodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_prodotto`
--

CREATE TABLE `tipo_prodotto` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `Id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `cognome` varchar(500) NOT NULL,
  `data_di_nascita` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Id`, `username`, `password`, `nome`, `cognome`, `data_di_nascita`) VALUES
(1, 'andreapedrollo', '$2y$10$28eFW56Lwba1NHEB5Xt9mOIrjDeb/DHbr2kcO.kLawUBgiUwP4QfW', 'a', 'p', ''),
(2, 'francescoTotti', '$2y$10$a22f8b15JjtiR9TmAyqjt.RkHmjBCZgVaLeGl7lZrLNIeb3dNH.ie', 'erika', 'sapienzi', ''),
(3, 'baldo', '$2y$10$5SS9KLtoCS./fIFAmvnOR.akiu3l.17lgIMMG27CUX3OPWyIR9rIK', 'q', 'w', ''),
(4, 'manupedro', '$2y$10$qikAm.PCYkXzOHPScCoLL.khgbSlupdqTLvsmIUfy4lDgcnphqJIi', 'm', 'a', ''),
(16, 'crebtrw', '$2y$10$s/gPNa9CupP5cZSsfU.XsemePQl7Qc3VdXaU/KtLIdNfdR4pYTmSa', 'c', 'c', ''),
(17, 'ANDREAPEDROLLO', '$2y$10$e2x6FFTv5MQC8T1ACSaiPe.VbUlXRE9xNmmVoDcXCXg7ETOeVI4vy', 'Aa', 'aA', ''),
(19, 'qwerty', 'fb23ceb5b78c68623ec52c801670fe0e', 'qwerty', 'qwerty', ''),
(20, 'QWERTY', '$argon2i$v=19$m=65536,t=4,p=1$ZTZ6bWdoSlNnRjRFbVIzbQ$NIzOAGOHiKpkU44rqA6ssOMu5LbzbrTyszZq0yQ1/NM', 'QWERTY', 'QWERTY', ''),
(21, 'Qqwert1!', '$argon2i$v=19$m=65536,t=4,p=1$U2hWcnN3Zk4yMElVMC9Gdg$wHptvS6XxssryhyyWJ3tptuVppyUBhyL5Bm9mXlOv4o', 'Qqwert1!', 'Qqwert1!', '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `tipo_prodotto` (`tipo_prodotto`);

--
-- Indici per le tabelle `tipo_prodotto`
--
ALTER TABLE `tipo_prodotto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tipo_prodotto`
--
ALTER TABLE `tipo_prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`tipo_prodotto`) REFERENCES `tipo_prodotto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
