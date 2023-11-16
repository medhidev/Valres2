#
# MySQL MRBS Intranet M2L : création base et login associé
#
# Notes:
# (1) Le nom de base, le login et mot de passe doivent être identiques à ceux 
#     précisés dans le fichier config.inc.php :
#           $db_database = "MDLL";
#           $db_login = "MDLL";
#           $db_password = "MDLL-intra";

# création de la base de données
DROP DATABASE IF EXISTS `MDLL`;
CREATE DATABASE IF NOT EXISTS `MDLL`
  CHARACTER SET utf8 COLLATE utf8_general_ci;

# création d'un login ayant tous les droits sur la base mrbs et
# affectation à ce login de tous les droits sur la base de données

CREATE USER mdll@'localhost' IDENTIFIED BY 'mdll-intra';
GRANT ALL ON MDLL.* TO mdll@'localhost' ;
