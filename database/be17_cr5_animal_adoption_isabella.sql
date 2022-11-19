-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Nov 2022 um 16:17
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be17_cr5_animal_adoption_isabella`
--
CREATE DATABASE IF NOT EXISTS `be17_cr5_animal_adoption_isabella` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be17_cr5_animal_adoption_isabella`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `located` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(4) NOT NULL,
  `vaccinated` enum('Yes','No') NOT NULL,
  `breed` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('Adopted','Available') NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`id`, `name`, `located`, `size`, `age`, `vaccinated`, `breed`, `description`, `status`, `picture`) VALUES
(1, 'Brutus', 'Hundegasse 15', 'small', 13, 'Yes', ' Chihuahua', '“These are not frail, yappy, ‘ankle biters’ who only like to sit on your lap,” says Kyle Potts. As president of the Chihuahua Club of America, she’s been around enough of these little charmers to know.', 'Available', 'chihuahua.png'),
(3, 'Steven', 'Turtlegasse 35', 'big', 213, 'No', 'Turtle', 'Scientists believe that Galápagos tortoises migrated from South America to the archipelago some two to three million years ago. By 1835, when Charles Darwin arrived for the expedition that would ultimately inspire his theory of natural selection, these to', 'Adopted', 'turtle.png'),
(4, 'Kitty', 'Catmansion 10', 'middle', 4, 'Yes', 'British Shorthair\r\n', 'The origins of the British Shorthair most likely date back to the first century AD, making it one of the most ancient identifiable cat breeds in the world.', 'Available', 'cat.png'),
(5, 'Tina', 'firststreet 1', 'big', 6, 'Yes', 'Alpaka', 'Related to the vicuña, llama and guanaco the alpaca is a rare and precious animal thought to be a cross between llamas and vicuñas some 6000 years ago.', 'Available', 'alpacka.png'),
(6, 'Sandy', 'hammerstreet 5', 'middle', 14, 'No', 'Blue Viper', 'This really is a ‘look but don’t touch’ situation, because as stunning as that blue viper is, it’s not the kind of creature you want to mess with.', 'Available', 'snake.png'),
(7, 'Franz', 'pigerystreet 34', 'big', 7, 'Yes', 'Pot-Bellied Pig\r\n', 'Franz was found on an abandoned farm. The farmer left his farm with all the animals alone and when they were found Franz was the only animal found alive.', 'Adopted', 'pig.png'),
(8, 'Spencer', 'longstreet 7', 'middle', 2, 'Yes', 'Tarantula', 'The bite of L. tarentula was once thought to cause a disease known as tarantism, in which the victim wept and skipped about before going into a wild dance (known as tarantella)', 'Adopted', 'spider.png'),
(9, 'Bryan', 'sambastreet 3', 'big', 6, 'Yes', 'Varanidae, Monitor Lizard', 'It is the largest extant species of lizard, growing to a maximum length of 3 meters. As a result of their size, Komodo dragons are apex predators, and dominate the ecosystems in which they live.', 'Available', 'komodo.png'),
(10, 'Bobby', 'kentstreet 78', 'small', 3, 'Yes', 'Chameleon', 'The chameleons (Greek: chamailéōn - \"earth lion\") are a family of iguana. Almost all chameleons are endangered in their natural habitat.', 'Adopted', 'chameleon.png'),
(11, 'Sissy', 'kaiserstreet 24', 'middle', 2, 'Yes', 'Saanen Goat', 'The Saanen is a Swiss breed of domestic goat. It is a highly productive dairy goat and is distributed in more than eighty countries worldwide. ', 'Available', 'goat.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_animal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` enum('adm','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `password`, `picture`, `status`) VALUES
(2, 'Isabella', 'Windhaber', 'isabella@gmail.com', 6645552136, '', 'da2da8e71c82b18aaec0e9dcf817ab09481a8b55061066f011b3e38188788f65', 'avatar.png', 'adm'),
(3, 'user', 'test', 'user@gmail.com', 65544512896, '', 'da2da8e71c82b18aaec0e9dcf817ab09481a8b55061066f011b3e38188788f65', 'avatar.png', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_animal` (`fk_animal`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`fk_animal`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
