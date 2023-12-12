-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 21 juin 2022 à 11:14
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mdll`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_salle`
--

DROP TABLE IF EXISTS `categorie_salle`;
CREATE TABLE `categorie_salle` (
  `id` int(2) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `categorie_salle`:
--

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `salle_nom` varchar(32) NOT NULL,
  `categorie` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `salle`:
--   `categorie`
--       `categorie_salle` -> `id`
--

-- --------------------------------------------------------

DROP TABLE IF EXISTS `etat`;
CREATE TABLE `etat` (
  `idEtat` int(11) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `salle_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `periode` int(2) NOT NULL,
  `idEtat` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `reservation`:
--   `salle_id`
--       `salle` -> `id`
--   `utilisateur_id`
--       `utilisateur` -> `utilisateur_id`
--   `salle_id`
--       `salle` -> `id`
--   `utilisateur_id`
--       `utilisateur` -> `utilisateur_id`

--
-- Structure de la table `structure`
--

DROP TABLE IF EXISTS `structure`;
CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 
-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `prenom` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `structure_id` int(2) NOT NULL,
  `structure_nom` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `structure_adresse` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='utilisateurs ';


-- -------- CLE PRIMAIRE ----------


ALTER TABLE `categorie_salle`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrainteCategorieId` (`categorie`);


ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrainteUtilisateurId` (`utilisateur_id`),
  ADD KEY `contrainteSalleId` (`salle_id`);


ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD KEY `contrainteStructureId` (`structure_id`);


ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `etat`
  ADD PRIMARY KEY (`idEtat`);

-- ----- MODIFICATIONS -------

ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


-- ----- CLE ETRANGERE -------

ALTER TABLE `salle`
  ADD CONSTRAINT `contrainteCategorieId` FOREIGN KEY (`categorie`) REFERENCES `categorie_salle` (`id`);

ALTER TABLE `reservation`
  ADD CONSTRAINT `contrainteSalleId` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`id`),
  ADD CONSTRAINT `contrainteUtilisateurId` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `contrainteEtatId` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`idEtat`);

ALTER TABLE `utilisateur`
  ADD CONSTRAINT `contrainteStructureId` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`);
COMMIT;


