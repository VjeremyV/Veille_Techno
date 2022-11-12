Titre : TechnoV
Objet : Outil de veille technologique
Cadre : Personnel
Début du projet : 11/11/22

Objectifs :
 - pouvoir créer son propre fil d'actualité personnalisé en utilisant la technologie des flux RSS
 - pouvoir répertorier les articles et les archiver en catégories
 - avoir une liste de sites références
 - pouvoir créer ses propres fiches de veille technologique avec possibilité d'ajout de fichiers externes
 - une fonction de partage 
 
 Contraintes : 
 - Langage backend PHP 8.1 
 - Base de données : MySQl Version : 5.7.36
 - pas de frameworks
 - tests unitaires aveec phpUnit
 
 ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 11/11/22
- Mise en place du cadre de travail :
  - création du repository git
  - initialisation avec composer
  - ajout des dépendances 
  - conception du MCD et installation de la base de données
  
 ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 12/11/22
- Revision du Modèle conceptuel de données :
  - ajout des tables 'users' et 'partage'
- Création de la class de connexion à la base de données sur le modèle Singleton
  - Configuration de la connexion entre l'application et la bdd
  - Réalisation des tests de connexions simples
