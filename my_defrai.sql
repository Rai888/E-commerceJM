-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mag 24, 2022 alle 08:26
-- Versione del server: 8.0.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_defrai`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE IF NOT EXISTS `articoli` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) NOT NULL,
  `marca` varchar(32) NOT NULL,
  `prezzo` float NOT NULL,
  `nDisponibili` int NOT NULL DEFAULT '0',
  `immagine` varchar(128) NOT NULL,
  `descrizione` varchar(256) NOT NULL,
  `stelle` int NOT NULL DEFAULT '0',
  `idCategoria` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkey_categoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id`, `nome`, `marca`, `prezzo`, `nDisponibili`, `immagine`, `descrizione`, `stelle`, `idCategoria`) VALUES
(1, 'Occhiali da sole', 'HAWKERS', 17.46, 20, 'https://m.media-amazon.com/images/I/61zB+A3beuL._AC_UX679_.jpg', 'Occhiali da sole da uomo/donna', 5, 1),
(2, 'JLab Go Air Pop Cuffie Bluetooth', 'JLab', 24.99, 20, 'https://m.media-amazon.com/images/I/61nAog2X2HL._AC_SX679_.jpg', 'Auricolari Wireless con custodia di ricarica USB, Auricolari Bluetooth con Suono Personalizzabile EQ3, Design Sottile Ottimo per', 3, 11),
(3, 'adidas Sq21 SW Hood', 'adidas', 76.6, 17, 'https://m.media-amazon.com/images/I/61yK4p-fuUL._AC_UX679_.jpg', 'Felpa da Uomo', 4, 1),
(11, 'Spontex Catch & Clean Set completo', 'Spontex', 20.81, 20, 'https://m.media-amazon.com/images/I/51Y8xxgrHmL._AC_SX679_.jpg', 'Set completo con Scopa in Gomma per interno, Manico e Paletta', 3, 2),
(12, 'TOP BRIGHT Cubo Multiattività Legno 5 in 1 ', 'TOP BRIGHT', 27.99, 20, 'https://m.media-amazon.com/images/I/71oxYvGT5nL._AC_SX522_.jpg', 'Cubo Interattivo - Giochi Bambini 1 Anno, 2 Anni – Gioco Incastri con Forme Legno per Lo Sviluppo Cognitivo', 3, 3),
(13, 'SPIDI GIACCA TRAVELER 3', 'SPIDI', 207.3, 20, 'https://m.media-amazon.com/images/I/61BikkH-FwL._AC_SX522_.jpg', 'Protezioni Warrior Lite rimovibili CE En1621-1 liv.1 spalle e gomiti\r\nPPE indumento di protezione uso motociclistico certificato EN 17092-3:2020 di classe AA\r\nDotata di membrana impermeabile e traspirante H2Out e fodera termica removibile con ovatta.', 5, 5),
(15, 'Spotify Premium', 'Spotify', 30, 20, 'https://m.media-amazon.com/images/I/41hh74FUmSL._AC_.jpg', 'Il Buono è riscattabile solo per mesi di abbonamento Premium singolo a prezzo pieno e non può essere riscattato per abbonamenti scontati o di gruppo\r\nPer riscattare il Buono, è necessario possedere o aprire un account Spotify nel paese in cui è stato acqui', 5, 7),
(16, 'Trucco Acqua Premium con Spugna', 'KING OF HALLOWEEN.DE', 7.99, 20, 'https://m.media-amazon.com/images/I/51u1TXU7f9S._AC_SX522_.jpg', 'Trucco Acqua Premium con Spugna per Feste per Bambini Feste a Tema Carnevale di Halloween Zombie vampiri Clown Nero', 1, 6),
(17, 'Portaoggetti da scrivania', 'Exerz', 14.44, 20, 'https://m.media-amazon.com/images/I/918OicFvn7L._AC_SX679_.jpg', 'Exerz Organizer da scrivania/Portaoggetti da scrivania/Organizzatore di cancelleria/Scrivania ordinata/Riordinatore di Penne/Porta Lettere/Multifunzionale/Portapenne da scrivania', 5, 8),
(18, 'Posate Berglander nero oro', 'Berglander', 35.99, 20, 'https://m.media-amazon.com/images/I/611HK3lfSdL._AC_SX679_.jpg', '30 pezzi Posate in titanio nero di posate, 30 pezzi, colore: Nero, set di posate da 30 pezzi in acciaio INOX argenteria set, servizio per 6, 30pcs (Nero lucido)', 3, 9),
(19, '5 Original Albums', 'Morgan Lee', 12.99, 20, 'https://m.media-amazon.com/images/I/71ALL0+sl8L._AC_SX679_.jpg', 'Album originali di Morgan Lee', 1, 10),
(20, 'KabelDirekt – 3 m – Cavo HDMI 4K', 'KabelDirekt', 7.97, 20, 'https://m.media-amazon.com/images/I/81Tt3+NBcSL._AC_SX679_.jpg', '4K@120 Hz e 4K@60 Hz per Una spettacolare Esperienza Ultra HD – High Speed con Ethernet, Compatibile con HDMI 2.0/1.4, Blu-ray/PS4/PS5/Xbox Series X/Switch, Nero', 2, 11),
(21, 'Parama 50pz Mascherine FFP2', 'Parama', 27.99, 20, 'https://m.media-amazon.com/images/I/61eOgHFzxeL._AC_UX679_.jpg', 'Made in Italy Certificate CE 0477 Ente Certificatore Italiano Anatomiche Elevato Comfort Colore Bianco Mod. Supernova', 3, 12),
(22, 'Harry Potter Collection', 'Warner Home Video', 22.2, 20, 'https://m.media-amazon.com/images/I/91hXrdv2jbL._AC_SX679_PIbundle-8,TopRight,0,0_SH20_.jpg', 'Harry Potter Collection (Standard Edition) (8 Blu-Ray)', 3, 13);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrelli`
--

CREATE TABLE IF NOT EXISTS `carrelli` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codUtente` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkey_carrelloUtente` (`codUtente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`id`, `data`, `codUtente`) VALUES
(1, '2022-05-03 22:00:00', 1),
(2, '2022-05-07 22:00:00', 3),
(7, '0000-00-00 00:00:00', 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id`, `tipo`) VALUES
(1, 'Abbigliamento'),
(2, 'Alimentari e cura della casa'),
(3, 'App e Giochi'),
(5, 'Auto e Moto - Parti e Accessori'),
(6, 'Bellezza'),
(7, 'Buoni Regalo'),
(8, 'Cancelleria e prodotti per ufficio'),
(9, 'Casa e cucina'),
(10, 'CD e Vinili'),
(11, 'Elettronica'),
(12, 'Fai da te'),
(13, 'Film e TV'),
(14, 'Giardino e giardinaggio'),
(15, 'Giochi e giocattoli'),
(16, 'Gioielli'),
(17, 'Grandi elettrodomestici'),
(18, 'Handmade'),
(19, 'Illuminazione'),
(20, 'Industria e Scienza'),
(21, 'Informatica'),
(22, 'Libri'),
(23, 'Musica Digitale'),
(24, 'Orologi'),
(25, 'Prima infanzia'),
(26, 'Prodotti per animali domestici'),
(27, 'Salute e cura della persona'),
(28, 'Scarpe e borse'),
(29, 'Software'),
(30, 'Sport e tempo libero'),
(31, 'Strumenti musicali e DJ'),
(32, 'Valigeria'),
(33, 'Videogiochi');

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE IF NOT EXISTS `commenti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `txt` varchar(256) NOT NULL,
  `stelle` int NOT NULL,
  `idArticolo` int NOT NULL,
  `idUtente` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkey_commentoUtente` (`idUtente`),
  KEY `fkey_commentoArticolo` (`idArticolo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dump dei dati per la tabella `commenti`
--

INSERT INTO `commenti` (`id`, `txt`, `stelle`, `idArticolo`, `idUtente`) VALUES
(1, 'gran bel prodotto', 3, 2, 1),
(2, 'che schifo', 1, 2, 3),
(3, 'tanta roba mamma mia ', 4, 2, 1),
(4, 'zitto', 2, 2, 1),
(5, 'miglior prodotto', 5, 2, 1),
(6, 'Mamma mia che occhiali', 5, 1, 1),
(7, 'mi si sono rotti, però belli', 4, 1, 1),
(8, 'bella bella', 4, 3, 1),
(9, 'fatta di plastica', 3, 3, 3),
(10, 'viene via subito', 1, 16, 1),
(11, 'peggior prodotto', 2, 16, 1),
(12, 'utilissimo', 5, 11, 1),
(13, 'scherzavo, si è rotto tutto', 2, 11, 1),
(14, 'proprio bello', 2, 11, 1),
(15, 'spacca', 5, 13, 3),
(16, 'non male', 4, 13, 3),
(17, 'fatte de gomma', 3, 18, 3),
(18, 'scivola il cibo', 2, 18, 3),
(19, 'utilissimo', 5, 17, 3),
(20, 'dopo anni ancora lo uso', 5, 17, 3),
(21, 'scarso', 1, 19, 3),
(22, 'mai sentito uno peggiore', 2, 19, 3),
(23, 'il covid non esiste', 1, 21, 3),
(24, 'mi dissocio', 5, 21, 3),
(25, 'dissociato due volte', 5, 21, 3),
(26, 'lo uso sempre ahahahah', 3, 12, 3),
(27, 'scherzo che schifo', 1, 12, 3),
(28, 'preferisco craccarlo', 5, 15, 3),
(29, 'ma scherzo', 4, 15, 3),
(30, 'che schifo harry potter', 3, 22, 3),
(31, 'bello hp', 5, 22, 3),
(32, 'normale', 2, 20, 3),
(33, 'simpatico', 3, 20, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE IF NOT EXISTS `contiene` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idCarrello` int NOT NULL,
  `idArticolo` int NOT NULL,
  `quantita` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkeyCarrello` (`idCarrello`),
  KEY `fkeyArticolo` (`idArticolo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dump dei dati per la tabella `contiene`
--

INSERT INTO `contiene` (`id`, `idCarrello`, `idArticolo`, `quantita`) VALUES
(21, 1, 1, 1),
(22, 1, 2, 2),
(23, 1, 3, 1),
(30, 2, 3, 1),
(31, 7, 3, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE IF NOT EXISTS `ordini` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prezzo` double NOT NULL,
  `idCarrello` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkey_ordineCarrello` (`idCarrello`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id`, `data`, `prezzo`, `idCarrello`) VALUES
(1, '2022-05-18 06:32:49', 24.99, 2),
(2, '2022-05-18 07:19:35', 76.6, 2),
(3, '2022-05-18 07:23:16', 153.2, 2),
(4, '2022-05-18 07:25:15', 76.6, 2),
(5, '2022-05-18 07:25:36', 76.6, 2),
(6, '2022-05-18 08:09:33', 76.6, 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `codFiscale` varchar(20) NOT NULL,
  `admin` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `cognome`, `username`, `password`, `codFiscale`, `admin`) VALUES
(1, 'Riccardo', 'Raimondi', 'rai11', 'b90a40fa2006a43f6844feab08f23b7b', 'RMNRCR03T06C933P', 1),
(3, 'Lorenzo', 'Raimondi', 'jollo7', '2acb4ffece0cdfe6167c83dc2ab56f30', 'RMNLNZ00D15C933V', 0),
(7, 'Brazorf', 'Ajeje', 'ajeje', 'aea8e439a058561b12d934e56b285e05', 'JJABZR80A01C933V', 0),
(8, 'Davide', 'Calabria', 'calabrone', '83227a721a3363d2c78381664c78657f', 'CLBDVD97T06C933S', 0);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articoli`
--
ALTER TABLE `articoli`
  ADD CONSTRAINT `fkey_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `fkey_carrelloUtente` FOREIGN KEY (`codUtente`) REFERENCES `utenti` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limiti per la tabella `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `fkey_commentoArticolo` FOREIGN KEY (`idArticolo`) REFERENCES `articoli` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey_commentoUtente` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`id`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `fkeyArticolo` FOREIGN KEY (`idArticolo`) REFERENCES `articoli` (`id`),
  ADD CONSTRAINT `fkeyCarrello` FOREIGN KEY (`idCarrello`) REFERENCES `carrelli` (`id`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `fkey_ordineCarrello` FOREIGN KEY (`idCarrello`) REFERENCES `carrelli` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
