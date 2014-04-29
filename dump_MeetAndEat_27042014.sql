-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Apr 2014 um 12:15
-- Server Version: 5.5.32
-- PHP-Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `meet-and-eat`
--
CREATE DATABASE IF NOT EXISTS `meet-and-eat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `meet-and-eat`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '3', NULL, 'N;'),
('author', '1', NULL, 'N;'),
('author', '2', NULL, 'N;'),
('author', '4', NULL, 'N;');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;'),
('author', 2, '', NULL, 'N;'),
('createEvent', 0, 'create a Event', NULL, 'N;'),
('createRecipe', 0, 'create a Recipe', NULL, 'N;'),
('createUser', 0, 'create a User', NULL, 'N;'),
('deleteEvent', 0, 'delete a Event', NULL, 'N;'),
('deleteOwnEvent', 1, 'delete a Event by author himself', 'return Yii::app()->user->id==$params["events"]->USER_idUser;', 'N;'),
('deleteOwnRecipe', 1, 'delete a Recipe by author himself', 'return Yii::app()->user->id==$params["recipe"]->USER_idUser;', 'N;'),
('deleteOwnUser', 1, 'delete own User profile', 'return Yii::app()->user->id==$params["user"]->idUser;', 'N;'),
('deleteRecipe', 0, 'delete a Recipe', NULL, 'N;'),
('deleteUser', 0, 'delete a User', NULL, 'N;'),
('manageEvent', 0, 'manage a Event', NULL, 'N;'),
('manageRecipe', 0, 'manage a Recipe', NULL, 'N;'),
('manageUser', 0, 'manage a User', NULL, 'N;'),
('reader', 2, '', NULL, 'N;'),
('readEvent', 0, 'read a Event', NULL, 'N;'),
('readOwnUser', 1, 'read own User profile', 'return Yii::app()->user->id==$params["user"]->idUser;', 'N;'),
('readRecipe', 0, 'read a Recipe', NULL, 'N;'),
('readUser', 0, 'read a User', NULL, 'N;'),
('updateEvent', 0, 'update a Event', NULL, 'N;'),
('updateOwnEvent', 1, 'update a Event by author himself', 'return Yii::app()->user->id==$params["events"]->USER_idUser;', 'N;'),
('updateOwnRecipe', 1, 'update a Recipe by author himself', 'return Yii::app()->user->id==$params["recipe"]->USER_idUser;', 'N;'),
('updateOwnUser', 1, 'update own User profile', 'return Yii::app()->user->id==$params["user"]->idUser;', 'N;'),
('updateRecipe', 0, 'update a Recipe', NULL, 'N;'),
('updateUser', 0, 'update a User', NULL, 'N;');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('admin', 'author'),
('author', 'createEvent'),
('author', 'createRecipe'),
('admin', 'createUser'),
('reader', 'createUser'),
('admin', 'deleteEvent'),
('deleteOwnEvent', 'deleteEvent'),
('author', 'deleteOwnEvent'),
('author', 'deleteOwnRecipe'),
('author', 'deleteOwnUser'),
('admin', 'deleteRecipe'),
('deleteOwnRecipe', 'deleteRecipe'),
('admin', 'deleteUser'),
('deleteOwnUser', 'deleteUser'),
('admin', 'manageEvent'),
('admin', 'manageRecipe'),
('admin', 'manageUser'),
('author', 'reader'),
('reader', 'readEvent'),
('author', 'readOwnUser'),
('reader', 'readRecipe'),
('admin', 'readUser'),
('readOwnUser', 'readUser'),
('admin', 'updateEvent'),
('updateOwnEvent', 'updateEvent'),
('author', 'updateOwnEvent'),
('author', 'updateOwnRecipe'),
('author', 'updateOwnUser'),
('admin', 'updateRecipe'),
('updateOwnRecipe', 'updateRecipe'),
('admin', 'updateUser'),
('updateOwnUser', 'updateUser');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `idCOURSES` int(11) NOT NULL AUTO_INCREMENT,
  `course_number` varchar(45) DEFAULT NULL,
  `EVENTS_idEVENTS` int(11) NOT NULL,
  `RECIPE_idRECIPE` int(11) NOT NULL,
  PRIMARY KEY (`idCOURSES`),
  UNIQUE KEY `idCOURSES_UNIQUE` (`idCOURSES`),
  KEY `fk_COURSES_EVENTS1_idx` (`EVENTS_idEVENTS`),
  KEY `fk_COURSES_RECIPE1_idx` (`RECIPE_idRECIPE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Daten für Tabelle `courses`
--

INSERT INTO `courses` (`idCOURSES`, `course_number`, `EVENTS_idEVENTS`, `RECIPE_idRECIPE`) VALUES
(29, '1', 19, 27),
(30, '2', 19, 24),
(31, '3', 19, 26),
(32, '1', 20, 28),
(33, '2', 20, 25),
(34, '3', 20, 29),
(35, '1', 21, 29),
(36, '1', 22, 25),
(37, '2', 22, 29);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `idDOCUMENTS` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `RECIPE_idRECIPE` int(11) NOT NULL,
  PRIMARY KEY (`idDOCUMENTS`),
  UNIQUE KEY `idDOCUMENTS_UNIQUE` (`idDOCUMENTS`),
  KEY `fk_DOCUMENTS_RECIPE1_idx` (`RECIPE_idRECIPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `idEVENTS` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `USER_idUser` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `max_guests` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEVENTS`),
  UNIQUE KEY `idEVENTS_UNIQUE` (`idEVENTS`),
  KEY `fk_EVENTS_USER1_idx` (`USER_idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`idEVENTS`, `date`, `USER_idUser`, `description`, `max_guests`) VALUES
(19, '2005-05-20 14:00:00', 1, 'Lade euch herzlich auf meine Dinnerparty ein. Für Essen und Getränke ist gesorgt', 5),
(20, '2012-05-20 14:00:00', 1, 'Große Fussballrunde im Garten', 6),
(21, '2005-06-20 14:00:00', 1, 'Einweihungspart mit Snacks', 6),
(22, '2030-06-20 14:00:00', 1, 'Finalspiel Vollyball', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guests`
--

CREATE TABLE IF NOT EXISTS `guests` (
  `idGUESTS` int(11) NOT NULL AUTO_INCREMENT,
  `EVENTS_idEVENTS` int(11) NOT NULL,
  `USER_idUser` int(11) NOT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idGUESTS`),
  UNIQUE KEY `idGUESTS_UNIQUE` (`idGUESTS`),
  KEY `fk_GUESTS_EVENTS1_idx` (`EVENTS_idEVENTS`),
  KEY `fk_GUESTS_USER1_idx` (`USER_idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Daten für Tabelle `guests`
--

INSERT INTO `guests` (`idGUESTS`, `EVENTS_idEVENTS`, `USER_idUser`, `approved`) VALUES
(16, 21, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredents`
--

CREATE TABLE IF NOT EXISTS `ingredents` (
  `idingredents` int(11) NOT NULL AUTO_INCREMENT,
  `RECIPE_idRECIPE` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `amount` double NOT NULL,
  `amount_description` varchar(45) NOT NULL,
  PRIMARY KEY (`idingredents`),
  UNIQUE KEY `idingredents_UNIQUE` (`idingredents`),
  KEY `fk_ingredents_RECIPE1_idx` (`RECIPE_idRECIPE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Daten für Tabelle `ingredents`
--

INSERT INTO `ingredents` (`idingredents`, `RECIPE_idRECIPE`, `name`, `amount`, `amount_description`) VALUES
(1, 1, 'Penne Rigatoni', 500, 'g'),
(2, 1, 'Kochschinken', 200, 'g'),
(3, 1, 'Maggi Fix Nudelaufflauf', 1, 'Tüte'),
(5, 1, 'testzutat ', 4, 'g'),
(6, 2, 'test9', 499, 'gramm'),
(7, 2, '10', 10, 'g'),
(8, 1, '12', 12, '12'),
(9, 8, '15', 15, '15'),
(11, 10, '11', 11, '111'),
(12, 1, 'aaa', 22, 'aaa'),
(13, 14, 'vvv', 222, 'vvv'),
(14, 16, 'qq', 11, 'qq'),
(16, 17, 'ttt', 499, 'ttt'),
(17, 19, 'yyy', 2, 'yyy'),
(18, 20, 'name', 333, 'f'),
(19, 21, 'kartoffeln', 200, 'g'),
(20, 23, 'nudeln', 200, 'g'),
(21, 24, 'Lachsfilet', 400, 'g'),
(22, 24, 'Nudeln', 500, 'g'),
(23, 24, 'Spinat', 400, 'g'),
(24, 24, 'Gemüsebrühe', 2, 'Teelöffel'),
(25, 25, 'Ganzes, ausgenommenes Hähnchen', 1, 'Stück'),
(26, 25, 'Bier', 1, 'Dose (0,5l)'),
(27, 26, 'Puddingpulver', 1, 'Tüte'),
(28, 26, 'Milch', 1, 'l'),
(29, 27, 'Salat', 1, 'Kopf'),
(30, 27, 'Käse', 200, 'g'),
(31, 27, 'Schinken', 200, 'g'),
(32, 27, 'Joghurt-Dressing', 1, 'Becher'),
(33, 27, 'Crutons', 100, 'g'),
(34, 28, 'Weißkraut', 1, 'Kopf'),
(35, 29, 'Tortenboden', 1, 'Stück'),
(36, 29, 'Erdbeeren', 500, 'g'),
(37, 29, 'Erdbeerjoghurt', 1, 'Becher'),
(38, 29, 'Geliermasse', 1, 'Tüte'),
(39, 30, 'test', 200, 'g');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures_recipe`
--

CREATE TABLE IF NOT EXISTS `pictures_recipe` (
  `idPICTURES_RECIPE` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `RECIPE_idRECIPE` int(11) NOT NULL,
  PRIMARY KEY (`idPICTURES_RECIPE`),
  UNIQUE KEY `idPICTURES_RECIPE_UNIQUE` (`idPICTURES_RECIPE`),
  KEY `fk_PICTURES_RECIPE_RECIPE1_idx` (`RECIPE_idRECIPE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `pictures_recipe`
--

INSERT INTO `pictures_recipe` (`idPICTURES_RECIPE`, `file_name`, `RECIPE_idRECIPE`) VALUES
(1, 'Chrysanthemum.jpg', 22),
(2, 'Lighthouse.jpg', 23),
(3, 'Chrysanthemum.jpg', 24),
(4, 'Desert.jpg', 25),
(5, 'Penguins.jpg', 26),
(6, 'Jellyfish.jpg', 27),
(7, 'Desert.jpg', 28),
(8, 'Hydrangeas.jpg', 29),
(9, 'Desert.jpg', 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures_user`
--

CREATE TABLE IF NOT EXISTS `pictures_user` (
  `idPICTURES_USER` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `USER_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idPICTURES_USER`),
  UNIQUE KEY `idPICTURES_USER_UNIQUE` (`idPICTURES_USER`),
  KEY `fk_PICTURES_USER_USER1_idx` (`USER_idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `idRECIPE` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `USER_idUser` int(11) NOT NULL,
  `manual` varchar(10000) NOT NULL,
  `number_of_persons` int(11) NOT NULL,
  PRIMARY KEY (`idRECIPE`),
  UNIQUE KEY `idRECIPE_UNIQUE` (`idRECIPE`),
  KEY `fk_RECIPE_USER1_idx` (`USER_idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `recipe`
--

INSERT INTO `recipe` (`idRECIPE`, `name`, `USER_idUser`, `manual`, `number_of_persons`) VALUES
(1, 'Nudelauflauf', 1, 'Haus zusammen und packs in Ofen', 3),
(2, 'Schweinebraten', 1, 'Braten bei 180 grad 2h in den ofen mindestens', 5),
(3, 'Hachfleischsuppe', 1, 'egal', 3),
(4, 'Gemüsesuppe', 1, 'Gemüse schneiden und ab in den Topf', 8),
(5, 'testessen', 1, 'test', 4),
(6, 'Test6', 1, 'test6', 6),
(7, '10', 1, '10', 10),
(8, '12', 1, '12', 12),
(9, '15', 1, '15', 15),
(10, '16', 1, '16', 16),
(11, 'aa', 1, 'aa', 1),
(12, 'xxx', 1, 'xxx', 999),
(13, 'aaa', 1, 'aaa', 10),
(14, 'aaa', 1, 'aaa', 2),
(15, 'vvv', 1, 'vvv', 2),
(16, 'eee', 1, 'eee', 2),
(17, 'qqq', 1, 'qqq', 10),
(18, 'ttt', 1, 'ttt', 4),
(19, 'yyy', 1, 'yyy', 2),
(20, 'test4', 1, 'eee', 2),
(21, 'Kartoffelauflauf2', 1, 'kartoffeln', 2),
(22, 'auflauf', 1, 'test', 2),
(23, 'auflauf', 1, 'test', 2),
(24, 'Lachsauflauf', 1, 'Nudeln vorkochen. Hälfte der Nudeln in einer Auflaufform verteilen. Den Spinat drüber geben. Andere Hälfte der Nudeln nun Draufgeben. Lachs und Schmandmischung draufgeben. Mit Käse Überstreuen und bei 180Grad ca. 35 Min. (Umluft) garen.', 4),
(25, 'Bierhändl', 1, 'Huhn nach Geschmack würzen und marinieren. Bierbüchse öffnen und ca. 1 drittel abgießen. Huhn über Bierbüchse stülpen und bei 180Grad ca. 1h in den Ofen geben. ', 2),
(26, 'Pudding', 1, 'Pudding nach Anleitung auf der Verpackung zubereiten', 6),
(27, 'Cesar-Salat', 1, 'Salat waschen und schneiden. Alle anderen Zutaten klein schneiden und gut mit dem Salat vermischen. Dresseng als letztes in kleinen Mengen drübergießen. Bei Bedarf mit frischen Grutons garnieren', 6),
(28, 'Krautsalat', 1, 'Kraut schneiden. Danach mit Essig, Öl und salz nach belieben würzen.', 6),
(29, 'Erdbeertorte', 1, 'Boden mit Erdbeerjoghurt leicht bestreichen. Erdbeeren waschen und auf dem Kuchen verteilen. Geliermasse vorbereiten und auf den Erdbeeren verteilen. Kuchen für ca. 1h in den Kühlschrank stellen', 8),
(30, 'test', 1, 'test', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `idSCORE` int(11) NOT NULL AUTO_INCREMENT,
  `USER_idUser` int(11) NOT NULL,
  `user_id_target` varchar(45) NOT NULL,
  `user_id_source` varchar(45) NOT NULL,
  `score` int(11) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idSCORE`),
  UNIQUE KEY `idSCORE_UNIQUE` (`idSCORE`),
  KEY `fk_SCORE_USER_idx` (`USER_idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spec_names`
--

CREATE TABLE IF NOT EXISTS `spec_names` (
  `idSPEC_NAMES` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSPEC_NAMES`),
  UNIQUE KEY `idSPEC_NAMES_UNIQUE` (`idSPEC_NAMES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `specialties`
--

CREATE TABLE IF NOT EXISTS `specialties` (
  `idtable1` int(11) NOT NULL AUTO_INCREMENT,
  `RECIPE_idRECIPE` int(11) NOT NULL,
  `SPEC_NAMES_idSPEC_NAMES` int(11) NOT NULL,
  `EVENTS_idEVENTS` int(11) NOT NULL,
  PRIMARY KEY (`idtable1`),
  KEY `fk_table1_RECIPE1_idx` (`RECIPE_idRECIPE`),
  KEY `fk_SPECIALTIES_SPEC_NAMES1_idx` (`SPEC_NAMES_idSPEC_NAMES`),
  KEY `fk_SPECIALTIES_EVENTS1_idx` (`EVENTS_idEVENTS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `EMail` varchar(45) NOT NULL,
  `year_of_birth` year(4) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `house_number` varchar(10) DEFAULT NULL,
  `postcode` varchar(5) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `personal_description` varchar(1000) DEFAULT NULL,
  `signup_date` date NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `score_counter` int(11) NOT NULL DEFAULT '0',
  `password` varchar(45) NOT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idUser_UNIQUE` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`idUser`, `Username`, `first_name`, `last_name`, `EMail`, `year_of_birth`, `street`, `house_number`, `postcode`, `city`, `personal_description`, `signup_date`, `score`, `score_counter`, `password`, `role`) VALUES
(1, 'stefan', 'stefan', 'dreher', 'dreher.stefan@live.de', 1993, 'Musterweg ', '22', '97797', 'Dessau', 'Hallo ich bin Stefan und koche sehr gern, am liebsten für eine sehr gesellige Runde', '2014-01-07', 0, 0, 'stefan', 0),
(2, 'Tobias', 'Tobias', 'Mauritz', 'tobias@mauritz.de', 1992, 'Bahnhofstraße', '68', '55296', 'Harxheim', 'Ich bin Tobi.', '2014-04-20', 0, 0, 'tobias', NULL),
(3, 'admin', 'admin', 'admin', 'admin@admin.de', 1992, 'admin', '1', '12345', 'admin', 'admin', '2014-04-27', 0, 0, 'admin', NULL),
(4, 'author', 'author', 'author', 'author@author.de', 0000, 'author', '11', '03432', 'author', 'author', '2011-11-20', 0, 0, 'author', 0);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_COURSES_EVENTS1` FOREIGN KEY (`EVENTS_idEVENTS`) REFERENCES `events` (`idEVENTS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_COURSES_RECIPE1` FOREIGN KEY (`RECIPE_idRECIPE`) REFERENCES `recipe` (`idRECIPE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_DOCUMENTS_RECIPE1` FOREIGN KEY (`RECIPE_idRECIPE`) REFERENCES `recipe` (`idRECIPE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_EVENTS_USER1` FOREIGN KEY (`USER_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `fk_GUESTS_EVENTS1` FOREIGN KEY (`EVENTS_idEVENTS`) REFERENCES `events` (`idEVENTS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_GUESTS_USER1` FOREIGN KEY (`USER_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `ingredents`
--
ALTER TABLE `ingredents`
  ADD CONSTRAINT `fk_ingredents_RECIPE1` FOREIGN KEY (`RECIPE_idRECIPE`) REFERENCES `recipe` (`idRECIPE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `pictures_recipe`
--
ALTER TABLE `pictures_recipe`
  ADD CONSTRAINT `fk_PICTURES_RECIPE_RECIPE1` FOREIGN KEY (`RECIPE_idRECIPE`) REFERENCES `recipe` (`idRECIPE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `pictures_user`
--
ALTER TABLE `pictures_user`
  ADD CONSTRAINT `fk_PICTURES_USER_USER1` FOREIGN KEY (`USER_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_RECIPE_USER1` FOREIGN KEY (`USER_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `fk_SCORE_USER` FOREIGN KEY (`USER_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `specialties`
--
ALTER TABLE `specialties`
  ADD CONSTRAINT `fk_SPECIALTIES_EVENTS1` FOREIGN KEY (`EVENTS_idEVENTS`) REFERENCES `events` (`idEVENTS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SPECIALTIES_SPEC_NAMES1` FOREIGN KEY (`SPEC_NAMES_idSPEC_NAMES`) REFERENCES `spec_names` (`idSPEC_NAMES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_RECIPE1` FOREIGN KEY (`RECIPE_idRECIPE`) REFERENCES `recipe` (`idRECIPE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
