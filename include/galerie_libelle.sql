-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. Mrz 2015 um 21:34
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `galerie_libelle`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `artikelnummer` int(11) NOT NULL AUTO_INCREMENT,
  `titel` text NOT NULL,
  `preis` text NOT NULL,
  `bild` text NOT NULL,
  `bestand` int(11) NOT NULL,
  `min-bestand` int(11) NOT NULL,
  `beschreibung` text NOT NULL,
  `kategorienummer` int(11) NOT NULL,
  `masse` text NOT NULL,
  `farbe` text,
  `sonstiges` text,
  PRIMARY KEY (`artikelnummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1025031 ;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`artikelnummer`, `titel`, `preis`, `bild`, `bestand`, `min-bestand`, `beschreibung`, `kategorienummer`, `masse`, `farbe`, `sonstiges`) VALUES
(1025025, 'Motivtasse', '15,50', 'img/exponate/1025025_produktbild.jpg', 0, 5, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,', 1, '9cm x 7,6cm x 0,4cm', 'weiß', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,'),
(1025026, 'Handyhüllen iPhone 4 und 4s', '25,84', 'img/exponate/1025026_produktbild.jpg', 5, 5, 'Handyhüllen mit verschiedensten Motiven.', 4, 'Passend für iPhone 4 und 4s', '', NULL),
(1025027, 'Motivleinwand: Musik', '50,00', 'img/exponate/1025027_produktbild.jpg', 3, 2, 'Bild in hochwertige Ausführung.', 3, '40cm x 80cm', 'braun', NULL),
(1025028, 'Fotoleinwand: Wüste', '50,00', 'img/exponate/1025028_produktbild.jpg', 4, 2, 'Bild in hochwertige Ausführung.', 3, '30cm x 40cm', 'grau', NULL),
(1025029, 'Kalender', '10,40', 'img/exponate/1025029_produktbild.jpg', 2, 1, 'wadfyswedfc', 2, 'A3 (29,7cm x 42cm)', NULL, NULL),
(1025030, 'Motivtasse', '15,50', 'img/exponate/1025025_produktbild.jpg', 0, 5, 'ewrfergzrtzhgrthrftgf', 1, '', 'weiß', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftrag`
--

CREATE TABLE IF NOT EXISTS `auftrag` (
  `auftragsnummer` int(11) NOT NULL AUTO_INCREMENT,
  `auftragsdatum` date NOT NULL,
  `kundennummer` int(11) NOT NULL,
  PRIMARY KEY (`auftragsnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftragspos`
--

CREATE TABLE IF NOT EXISTS `auftragspos` (
  `auftragsnummer` int(11) NOT NULL,
  `artikelnummer` int(11) NOT NULL,
  `bestellmenge` int(11) NOT NULL,
  `bestellpreis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `kategorienummer` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriename` text NOT NULL,
  PRIMARY KEY (`kategorienummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`kategorienummer`, `kategoriename`) VALUES
(1, 'Tassen'),
(2, 'Kalender'),
(4, 'Leinwand'),
(5, 'sonstiges');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE IF NOT EXISTS `kunden` (
  `kundennummer` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `vorname` text NOT NULL,
  `nachname` text NOT NULL,
  `adresse` text NOT NULL,
  `plz` int(11) NOT NULL,
  `fon` text,
  `fax` text,
  `mail` text NOT NULL,
  PRIMARY KEY (`kundennummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`kundennummer`, `username`, `password`, `vorname`, `nachname`, `adresse`, `plz`, `fon`, `fax`, `mail`) VALUES
(1, 'admin', 'admin', 'Dirk', 'Buddenbrock', 'Erzbischof-Buddenbrock-Straße 35', 0, '02360-329', '02360-104371', 'dirk-bu@arcor.de'),
(2, 'user', 'user', 'Max', 'Mustermann', 'Erzbischof-Buddenbrock-Straße 35', 0, '02360-329', '', 'max@mustermann.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE IF NOT EXISTS `ort` (
  `plz` int(11) NOT NULL,
  `ort` text NOT NULL,
  PRIMARY KEY (`plz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
