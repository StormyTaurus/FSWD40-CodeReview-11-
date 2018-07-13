-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 13. Jul 2018 um 21:06
-- Server-Version: 5.6.38
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_mario_schantel_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_brand` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_year` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `car_daily_price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `fk_office_id` int(11) NOT NULL,
  `car_status` enum('available','unavailable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car`
--

INSERT INTO `car` (`car_id`, `car_brand`, `car_model`, `car_year`, `seats`, `car_daily_price`, `image`, `fk_office_id`, `car_status`) VALUES
(1, 'Infiniti', 'Q', 1993, 7, 50, 'infiniti_q.jpg', 1, 'available'),
(2, 'Mercury', 'Cougar', 1967, 2, 50, 'mercury.jpg', 1, 'available'),
(3, 'Pontiac', 'Aztek', 2005, 5, 50, 'aztek.jpg', 1, 'available'),
(4, 'Hyundai', 'Sonata', 1995, 2, 50, 'sonata.jpg', 1, 'available'),
(5, 'Lincoln', 'Navigator L', 2011, 7, 50, 'navigator.jpg', 1, 'available'),
(6, 'Cadillac', 'SRX', 2011, 3, 50, 'srx.jpg', 2, 'available'),
(7, 'Ford', 'E250', 2012, 6, 50, 'e250.jpg', 2, 'available'),
(8, 'Volkswagen', 'Passat', 1987, 6, 50, 'passat.jpg', 2, 'available'),
(9, 'Nissan', 'Xterra', 2009, 6, 50, 'xterra.jpg', 2, 'available'),
(10, 'Bentley', 'Azure', 2010, 6, 50, 'azure.jpg', 2, 'available'),
(11, 'Buick', 'Regal', 2001, 4, 100, 'regal.jpg', 3, 'available'),
(12, 'MINI', 'Clubman', 2012, 3, 100, 'clubman.jpg', 3, 'available'),
(13, 'Mercury', 'Cougar', 1994, 2, 100, 'cougar.jpg', 3, 'available'),
(14, 'BMW', '7 Series', 1999, 2, 100, '7series.jpg', 3, 'available'),
(15, 'Ford', 'Tempo', 1985, 5, 100, 'tempo.jpg', 3, 'available'),
(16, 'Cadillac', 'CTS', 2009, 5, 100, 'cts.jpg', 4, 'available'),
(17, 'Lexus', 'ES', 1993, 3, 100, 'es.jpg', 4, 'available'),
(18, 'Mazda', 'Mazda6 5-Door', 2006, 5, 100, 'mazda6.jpg', 4, 'available'),
(19, 'Maserati', 'Quattroporte', 2011, 2, 100, 'quattroporte.jpg', 4, 'available'),
(20, 'Aston Martin', 'Vantage', 2008, 6, 100, 'vantage.jpg', 4, 'available'),
(21, 'Toyota', '4Runner', 2012, 2, 150, '4runner.jpg', 1, 'available'),
(22, 'Audi', '80', 1989, 3, 150, '80.jpg', 1, 'available'),
(23, 'Nissan', 'Sentra', 1997, 2, 150, 'sentra.jpg', 1, 'available'),
(24, 'Infiniti', 'I', 1999, 5, 150, 'infiniti.jpg', 1, 'available'),
(25, 'Infiniti', 'G35', 2007, 6, 150, 'g35.jpg', 1, 'available'),
(26, 'Chrysler', 'Sebring', 2006, 5, 150, 'sebring.jpg', 2, 'available'),
(27, 'BMW', 'X5', 2001, 3, 150, 'x5.jpg', 2, 'available'),
(28, 'Chevrolet', 'Lumina', 1996, 7, 150, 'lumina.jpg', 2, 'available'),
(29, 'Dodge', 'Dakota Club', 2000, 3, 150, 'dakota.jpg', 2, 'available'),
(30, 'Ford', 'E-Series', 2012, 2, 150, 'eseries.jpg', 2, 'available');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `insurance`
--

CREATE TABLE `insurance` (
  `insurance_id` int(11) NOT NULL,
  `insurance_type` enum('basic','special','advanced') NOT NULL,
  `insurance_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `insurance`
--

INSERT INTO `insurance` (`insurance_id`, `insurance_type`, `insurance_price`) VALUES
(1, 'basic', 10),
(2, 'special', 20),
(3, 'advanced', 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `lat` decimal(25,6) DEFAULT NULL,
  `lng` decimal(25,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `office`
--

INSERT INTO `office` (`office_id`, `office_name`, `address`, `lat`, `lng`) VALUES
(1, 'Office 1', 'Millenium City', '48.240637', '16.386872'),
(2, 'Office 2', 'Donauzentrum', '48.242694', '16.435849'),
(3, 'Office 3', 'G3', '48.342408', '16.467288'),
(4, 'Office 4', 'SCS', '48.108219', '16.318077');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fk_insurance_id` int(11) NOT NULL,
  `fk_car_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_pickup_office_id` int(11) NOT NULL,
  `fk_return_office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'mario', 'schantel', 'mario@mario.at', 'd70a02385efd5aed9a06921924c23f4467da827d03513530f2'),
(2, 'Mario', 'Mario', 'mario1@mario.at', 'd70a02385efd5aed9a06921924c23f4467da827d03513530f2'),
(3, 'Mario', 'Schantel', 'mario2@mario.at', '0eee8fef72bb413599a92544e2a28e2e8612860717b4eab5d602344083676e93'),
(4, 'Mario', 'Schantel', 'mario@mail.com', 'd70a02385efd5aed9a06921924c23f4467da827d03513530f2ab1daf40cd69dd'),
(5, 'Mario', 'Schantel', 'mario@mario.info', 'd70a02385efd5aed9a06921924c23f4467da827d03513530f2ab1daf40cd69dd'),
(6, 'Mario', 'Schantel', 'marioschantel@gmx.at', 'd70a02385efd5aed9a06921924c23f4467da827d03513530f2ab1daf40cd69dd');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_office_id` (`fk_office_id`);

--
-- Indizes für die Tabelle `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indizes für die Tabelle `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indizes für die Tabelle `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_insurance_id` (`fk_insurance_id`),
  ADD KEY `fk_car_id` (`fk_car_id`),
  ADD KEY `fk_customer_id` (`fk_user_id`),
  ADD KEY `fk_pickup_office_id` (`fk_pickup_office_id`),
  ADD KEY `fk_return_office_id` (`fk_return_office_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`fk_office_id`) REFERENCES `office` (`office_id`);

--
-- Constraints der Tabelle `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`fk_car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`fk_insurance_id`) REFERENCES `insurance` (`insurance_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
