-- Jeux de données

-- Categorie Salle
INSERT INTO `categorie_salle` (`libelle`) VALUES
('Réunion'),
('avec équipements'),
('Amphi');

-- Etat
INSERT INTO `etat` (`libelle`) VALUES
('Valide'),
('Provisoire'),
('Annule');

-- Permission
INSERT INTO `permissions` (`libelle_perm`) VALUES
('User'),
('Secretariat'),
('Responsable'),
('Admin');

-- Salle
INSERT INTO `salle` (`salle_nom`, `categorie`) VALUES
('Daum', 1),
('Corbin', 1),
('Baccarat', 1),
('Longwy', 1),
('Multimédia', 2),
('Amphithéâtre', 3),
('Lamour', 1),
('Grüber', 1),
('Majorelle', 1),
('Salle de restauration', 2),
('Galerie', 1),
('Salle informatique', 2),
("Hall d'accueil", 2),
('Gallé', 1);

-- Structure
INSERT INTO `structure` (`libelle`) VALUES
('Ligue'),
('Club sportif'),
('Comité départemental'),
('Association'),
('Lycée'),
('Collège'),
('Autres');

-- utilisateur
INSERT INTO `utilisateur` (`nom`, `prenom`, `structure_id`, `structure_nom`, `structure_adresse`, `mail`, `id_perm`, `mdp`) VALUES
('BANDILELLA', 'CLEMENT', 1, 'Ligue Volley Ball Lorraine', '30 rue Widric 1er 54600 Villers les Nancy', 'cbandilella@llgvolleyball.fr', 1, 'password'),
('BIACQUEL', 'VERONIQUE', 1, 'Ligue escrime Lorraine', '5 rue des trois épis 54600 Villers lès Nancy', 'biancquel.veronique23@llgescrime.fr', 3, 'password'),
('SILBERT', 'GILLES', 2, 'Sporting Club Ennery', '48 Rue Marcel Decker, 57365 Ennery', 'sportingclubennery589@gmail.com', 3, 'password'),
('TORTEMANN', 'PIERRE', 4, 'Association Sportive Nancy Lorraine (ASNL)', '30 rue Widric 1er 54600 Villers lès Nancy', 'contactASNL@laposte.fr', 2, 'password'),
('PERNOT', 'LEA', 5, 'Lycée public Frederic Chopin', '39 rue du Sergent Blandan 54000 Nancy', 'lea.pernot@ac-lorraine.fr', 4, 'password'),
('ZUEL', 'STEPHANIE', 7, 'Fives Nordon', '5 Pl. Aimé Morot 54000 Nancy', 'zuel.s@fivesnordon.ue', 1, 'password'),
('LIEVIN', 'NATHAN', 3, 'FFT- COMITE DEPARTEMENTAL DE TENNIS DE MOSELLE ', '42 rue de la commanderie 54840 Sexey les bois', 'lievinn@fft.fr', 1, 'password');

-- Periode
INSERT INTO `periode` (`libelle`) VALUES
('Matin'),
('Midi'),
('Soir');

-- Reservation
INSERT INTO `reservation` (`utilisateur_id`, `salle_id`, `date`, `id_periode`, `idEtat`) VALUES
(2, 6, '2023-06-06 00:00:00', 1, 2),
(6, 5, '2023-06-09 00:00:00', 2, 2),
(6, 10, '2023-06-09 00:00:00', 3, 2),
(7, 4, '2023-06-07 00:00:00', 2, 2),
(5, 4, '2026-03-01 00:00:00', 2, 2),
(2, 4, '2023-06-07 00:00:00', 2, 2),
(1, 4, '2012-05-10 00:00:00', 2, 2);

