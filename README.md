# Valres2

### Presentation du projet
Ce projet est une continuité du projet valres de base qui permet la gestion des reservations des clients M2L.
Pour ce faire nous avons mit en place un site internet où les utilisateurs en fonction de leur statut auront des accès variés.

__Les grades:__
* **Administrateur** : personne chargée de maintenir à jour les informations relatives aux
utilisateurs et pouvant consulter à tout moment l’état des salles.
* **Secrétariat** : personne chargée de valider les réservations et pouvant réserver une salle et
consulter l’état des salles à tout moment.
* **Responsable** : personne effectuant les réservations des salles (état provisoire) et pouvant
consulter à tout moment l’état des salles.
* **Utilisateur** : personne pouvant consulter à tout moment les réservations des salles.

### Architecture MVC 
Pour la réalisation de ce projet avec mon camarade, nous avons utilisé la méthode MVC qui permet de structurer de la façon la plus conventionnel possible notre projet.

* Model → Contient les script Permet la liaison entre la site et la BDD
* View → Permet de gérer tout la partie Front *(Affichage du site web)*
* Controller → Comme son nom l'indique controle / vérifier que les *datas* entrées peuvent correctement être exploitées

__source :__
* [MVC en 5min](https://www.youtube.com/watch?v=gs-61l4Z32M&pp=ygUDTVZD)
* [MVC plus détailler](https://www.youtube.com/watch?v=HxhwAc7zzgE&pp=ygUDTVZD)

### Repartition du travail
__Partie Administration (Tduki) :__
* Gérer les accès : ajouter, supprimer, modifier l’accès pour une personne (Administrateur,
secrétariat...)
* Gérer la connexion et déconnexion des utilisateurs.
* Consulter les réservations.
* Générer le fichier xml des utilisateurs de début d’année.

__Partie Réservation (Medhi) :__
* Gérer les réservations : ajouter, supprimer une réservation.
* Confirmer ou annuler les réservations. (Passage de l’état « Provisoire » à « Confirmé » ou
« Annulé »)
* Consulter les salles disponibles.
* Générer le fichier xml des réservations validées d’une semaine.

### Base de projet
* Interface basé sur la structure du projet de Tduki en stage → [image](https://media.discordapp.net/attachments/1063192422907138138/1174631522502967336/image.png?ex=65684bda&is=6555d6da&hm=c79b93343463558d07d9b8ae99f4539c96d6b31ec2d031ff9c74618a76a312fd&=&width=1042&height=662)