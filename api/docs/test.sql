-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 07 mars 2022 à 13:26
-- Version du serveur :  10.3.25-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `building`
--

INSERT INTO `building` (`id`, `name`, `zipcode`, `organisation_id`) VALUES
(1, 'Bat A', 59000, 1),
(2, 'Bat B', 59000, 1),
(3, 'Bat C', 59000, 1),
(4, 'Bat D', 59000, 2),
(5, 'Bat E', 59000, 2),
(6, 'Bat F', 59000, 2);

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `organisation`
--

INSERT INTO `organisation` (`id`, `name`) VALUES
(1, 'Euratech'),
(2, 'Sogeti');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `people_inside` mediumint(9) DEFAULT 0,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `name`, `people_inside`, `building_id`) VALUES
(1, 'Salle 1', 10, 1),
(2, 'Salle 2', 15, 1),
(3, 'Salle 3', 2, 2),
(4, 'Salle 4', 40, 2),
(5, 'Salle 5 ', 0, 3),
(6, 'Salle 6 ', 8, 3),
(7, 'Salle 7 ', 18, 4),
(8, 'Salle 8 ', 25, 4),
(9, 'Salle 9', 13, 5),
(10, 'Salle 10', 3, 5),
(11, 'Salle 11', 5, 6),
(12, 'Salle 12', 17, 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisation_id` (`organisation_id`);

--
-- Index pour la table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
