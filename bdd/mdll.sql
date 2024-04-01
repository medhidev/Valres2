-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 déc. 2023 à 08:27
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `mdll`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_salle`
--

DROP DATABASE IF EXISTS `mdll`;
CREATE DATABASE IF NOT EXISTS `mdll`;

DROP TABLE IF EXISTS `categorie_salle`;
CREATE TABLE IF NOT EXISTS `categorie_salle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `idEtat` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(32) NOT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id_perm` int NOT NULL AUTO_INCREMENT,
  `libelle_perm` varchar(255) NOT NULL,
  PRIMARY KEY (`id_perm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `id_periode` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(32) NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int NOT NULL,
  `salle_id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_periode` int NOT NULL,
  `idEtat` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `contrainteUtilisateurId` (`utilisateur_id`),
  KEY `contrainteSalleId` (`salle_id`),
  KEY `contrainteEtatId` (`idEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=1;


--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `salle_nom` varchar(32) NOT NULL,
  `categorie` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contrainteCategorieId` (`categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `structure`
--

DROP TABLE IF EXISTS `structure`;
CREATE TABLE IF NOT EXISTS `structure` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `prenom` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `structure_id` int NOT NULL,
  `structure_nom` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `structure_adresse` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_perm` int DEFAULT NULL,
  `mdp` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`utilisateur_id`),
  KEY `contrainteStructureId` (`structure_id`),
  KEY `id_perm` (`id_perm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='utilisateurs' AUTO_INCREMENT=1;

--
-- Structure de la table `code`
--

DROP TABLE IF EXISTS `code`;
CREATE TABLE IF NOT EXISTS `code` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `digicode` int DEFAULT NULL,
  `wifi_key` varchar(16), -- Max Size WIFI KEY
  KEY `contrainteSalleId` (`id_salle`)
)ENGINE=InnoDB DEFAULT AUTO_INCREMENT=1;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `contrainteEtatId` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`idEtat`),
  ADD CONSTRAINT `contrainteSalleId` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`id`),
  ADD CONSTRAINT `contrainteUtilisateurId` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `contraintePeriode` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `contrainteCategorieId` FOREIGN KEY (`categorie`) REFERENCES `categorie_salle` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `contrainteStructureId` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_perm`) REFERENCES `permissions` (`id_perm`);
COMMIT;

--
-- Contraintes pour la table `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `contrainteSalleId` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id`);
