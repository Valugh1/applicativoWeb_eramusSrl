-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 02, 2023 alle 05:35
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
-- Database: `gestionale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `nome_prodotto` varchar(255) NOT NULL,
  `descrizione` varchar(10000) DEFAULT NULL,
  `data_inserimento` date NOT NULL DEFAULT curdate(),
  `tipo_prodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `nome_prodotto`, `descrizione`, `data_inserimento`, `tipo_prodotto`) VALUES
(1, 'fogli a4', 'risma per fotocopiatrice.', '2023-02-27', 1),
(2, 'myBag', 'buste in tessuto.', '2023-02-27', 2),
(3, 'HP W1106A', 'Toner HP per stampanti.', '2023-02-27', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_prodotto`
--

CREATE TABLE `tipo_prodotto` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tipo_prodotto`
--

INSERT INTO `tipo_prodotto` (`id`, `tipo`) VALUES
(1, 'carta'),
(2, 'buste'),
(3, 'toner');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `cognome` varchar(500) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `nome`, `cognome`, `dob`) VALUES
(1, 'Laura_rossi123', '$2y$10$A1x2.AdgyIqPCjzo8tQiPeYRb6kIQDVGL3xEqkdMhyAz.uJMudLs2', 'Laura', 'Rossi', '1994-02-09'),
(2, 'Andrea', '$2y$10$pPri9ChwZZ7d2MAxxwgQpORjMtwbjqcwo7KkVP.Lc1Yd1WNmKolRK', 'Andrea', 'Andrea', '2023-02-22'),
(3, 'mauro_verdi', '$2y$10$qsEGWtEDn1vRh5aWQmAsTOqLvNYwRD.KASO5ihurV3M3/FrecHDTK', 'Mauro', 'Verdi', '1986-05-15');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `tipo_prodotto`
--
ALTER TABLE `tipo_prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
