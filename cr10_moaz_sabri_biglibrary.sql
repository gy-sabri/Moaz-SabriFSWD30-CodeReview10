-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Feb 2018 um 16:03
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr10_moaz_sabri_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `author_id` smallint(5) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`author_id`, `first_name`, `last_name`, `birth_date`) VALUES
(1, 'Bob ', 'Dylan', '1960-12-05'),
(2, 'Charlie ', 'Chaplin', '1967-10-15'),
(3, 'T.E', 'Lawrence', '1980-05-08'),
(4, 'Sade', '', '1880-06-02'),
(5, 'Katja ', 'Brandis', '1970-02-14'),
(6, 'Isaac ', 'Asimov', '1975-05-21'),
(7, 'Neil ', 'Gaiman', '1978-05-25'),
(8, 'Peter ', 'O''Donnell', '1984-06-02');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `media_id` smallint(5) NOT NULL,
  `fk_publisher_id` smallint(5) DEFAULT NULL,
  `fk_author_id` smallint(5) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `short_description` varchar(50) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `media_status` enum('available','reserved') DEFAULT NULL,
  `midea_type` enum('Book','CD','DVD') DEFAULT NULL,
  `url_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`media_id`, `fk_publisher_id`, `fk_author_id`, `title`, `short_description`, `ISBN`, `media_status`, `midea_type`, `url_img`) VALUES
(1, 4, 1, 'Dylan', 'des', 256489, 'available', 'CD', 'https://lh6.googleusercontent.com/o9wBLZBFOvGfvgQ3JlU-MUJMlBU0I-GgbqEzmm9-Icg1rZWR91LtnNAGtLW3BoFOGJllYpcl7R3kOaTIpFS-Vdy5B-lXSPBQBVJb7oPZZnN8VtN6infy2yYVdPZqn9SD2KbPVQIU'),
(2, 6, 2, ' City lights', 'Des', 15321, 'available', 'DVD', 'https://lh5.googleusercontent.com/NcceU_0L067O97K94W_G-5R1uUc8NVli1M3Ai4I50V7olCPjHx9-HHA2cJWpDjKSVREgQYcqXGLaJuaHFv1cI90avFBcoX0tHK6MAU5umkTKLT5tupm3TFd9bx8iFYlN68UYTdJ2'),
(3, 5, 3, 'Lawrence of Arabia', 'Des', 341564, 'reserved', 'DVD', 'https://lh3.googleusercontent.com/-dRuOH2GzS_RpKdqY1cK0qQZbifOlsRtkJsMVOBxMGUSNPiqtDPAsCTdR19SL0zp14oJ-yG9B8QkASLpFGnAPDXBUx7PUEp3hSnr3-GG6ionE9nB-S-b7x4l2nO24GcOxTzLeU0P'),
(4, 2, 4, 'Diamond Life', 'Des', 231575, 'available', 'CD', 'https://lh4.googleusercontent.com/-QEpPd7P3zI8NQXN7TYzx8g2GuTU5PAFH_FSKewOG9fOjNYb21Rfh4eMEDQNLCto8uupzJ_kN21a5XprX0dFLcrnHNq5fpig2TKBOLOSb9bXe0a3fK1cqJs9vBPTLqAtm7Mo46lv'),
(5, 3, 5, 'Woodwalkers', 'Des', 354164, 'reserved', 'DVD', 'https://images-na.ssl-images-amazon.com/images/I/51szaJXvM5L._SX351_BO1,204,203,200_.jpg'),
(6, 4, 6, 'Foundation', 'Des', 2135, 'available', 'Book', 'https://lh5.googleusercontent.com/MRtLzl9A37yMb1TvoG-5SBVMwqS26t_q8k1eww7Qusd2_PH5rK3PvA5eWfgORAfcF2gwEdsyL171V6IBIQFJ637FFHg1B3ibC8WIcA5Ii6deGlFuS_GHNmdUWYvwfJkcIL5pfv7A'),
(7, 3, 7, 'The Sandman', 'Des', 302463, 'available', 'Book', 'https://lh4.googleusercontent.com/8jUP24FFaHpyyxOtrOLaw03wsFi9GtPMPMc-PnYGBEF7KNTQAHAavQUb8eCvGAqkzdamsG-_3r50OxlfGohZgZd3FAPbMfXqe-nnFOoG4KKwap2SDLhapYapo_okEPi1cSDYHTBf'),
(8, 5, 8, 'Modesty Blaise', 'Des', 3546065, 'reserved', 'Book', 'https://lh6.googleusercontent.com/DGBSQtjtIPnGVopFGTl9yITpH9qoV_fS1gi2islbeWCLDyiySSgvaull9Aw-CKzKm4b5xmF98i_rtDUxZnyWKhpjDArzyM2JNjT_6CRsgI-oJpsnPvaL1Ytxx5FVPQacJRvIB9ar'),
(9, 6, 6, 'Sterne wie Staub', 'Des', 21562, 'available', 'DVD', 'https://meine.literatur-couch.de/covers/60/3442230160_l.jpg'),
(10, 2, 1, 'The Nobel Lecture', 'Des', 15341563, 'available', 'CD', 'https://cdn.smehost.net/bobdylancom-uscolumbiaprod/wp-content/uploads/2017/10/nobellecture-217x300.jpg'),
(11, 3, 1, 'The Cutting Edge 1965-1966', 'Des', 24152, 'reserved', 'CD', 'https://images-na.ssl-images-amazon.com/images/I/81f3SLo0dqL._SY450_.jpg'),
(12, 5, 3, 'DER SPIEGEL 4/1970', 'Als er 1935 starb, würdigte ihn die Stadt.', 1246, 'available', 'Book', 'https://magazin.spiegel.de/EpubDelivery/image/title/SP/1970/4/300'),
(13, 4, 7, 'Der Sternwanderer', 'Des', 2415241, 'reserved', 'DVD', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjkyMTE1OTYwNF5BMl5BanBnXkFtZTcwMDIxODYzMw@@._V1_SY1000_CR0,0,674,1000_AL_.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` smallint(6) NOT NULL,
  `publisher_name` varchar(20) NOT NULL,
  `publisher_address` varchar(50) NOT NULL,
  `publisher_size` enum('big','medium','small') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `publisher_size`) VALUES
(2, 'Altstadt', 'Ebner-Rofen Wien 1010', 'big'),
(3, 'Uni', 'Leopold Museum 1070 Wien ', 'medium'),
(4, 'Relax Guide', 'Florianigasse 51, 1080 Wien', 'medium'),
(5, 'Peter Lang GmbH ', 'Lenaugasse 9, 1080 Wien', 'small'),
(6, 'Österreichischer', 'Wickenburggasse 3, 1080 Wien', 'big');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` smallint(5) NOT NULL,
  `UserName` varchar(10) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `UserName`, `first_name`, `last_name`, `userPass`, `userEmail`, `birth_date`, `reg_date`) VALUES
(3, 'Sab', 'Moaz', 'Sabri', '12345678', 'sabri@hot.at', '1994-01-01', '0000-00-00 00:00:00'),
(4, 'Ninja', 'Ninja', 'Mart', '12345678', 'ninja@hot.at', '1987-05-12', '0000-00-00 00:00:00'),
(5, 'Darky', 'Ahmad', 'Arkan', '12345678', 'darky@hot.at', '1995-02-04', '0000-00-00 00:00:00'),
(6, 'Tanja', 'Tanja', 'Koc', '12345678', 'tanja@hot.at', '1990-04-06', '0000-00-00 00:00:00'),
(7, 'Khaled', 'Ahmad', 'Khaled', '12345678', 'khaled@hot.at', '1991-06-10', '0000-00-00 00:00:00'),
(33, 'text', 'text', 'text', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'text@t.t', '1975-12-31', '2018-02-10 01:44:50'),
(34, 'sabrii', 'moaz', 'sabri', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'test@t.tt', '1999-12-29', '2018-02-10 01:46:24'),
(35, 'sabrii', 'moaz', 'sabri', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'sabrii@sa.bri', '1988-05-10', '2018-02-10 14:31:31');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`),
  ADD KEY `fk_publisher_id` (`fk_publisher_id`),
  ADD KEY `fk_author_id` (`fk_author_id`);

--
-- Indizes für die Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `author_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `media`
--
ALTER TABLE `media`
  MODIFY `media_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT für Tabelle `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publisher` (`publisher_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`author_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
