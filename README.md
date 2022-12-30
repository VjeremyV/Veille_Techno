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
 
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 11/11/22
- Mise en place du cadre de travail :
  - création du repository git
  - initialisation avec composer
  - ajout des dépendances 
  - conception du MCD et installation de la base de données
  
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 12/11/22
- Revision du Modèle conceptuel de données :
  - ajout des tables 'users' et 'partage'
- Création de la class de connexion à la base de données sur le modèle Singleton
  - Configuration de la connexion entre l'application et la bdd
  - Réalisation des tests de connexions simples
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 13/11/22
- Mise en place du routeur :
  - création des classes Router, Route, RouterException
  - Création et configuration du htaccess pour les redirections
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
19/11/22
- Modification système de router :
  - deplacement de la class Router
  - ajout des fonctions pour la gestion de routes complexes
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
20/11/22
 - Finalisation système de routing
 - création du système de controller + premier controller
 - Correction MCD + BDD
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
26/11/22 
 - Création de la classe Template pour gérer le vues dynamiquement
   - création des méthodes : display_head, display_header, display_footer, display_main_content, add_endhtml
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
27/11/22
- modification de la classe Template
- création de la maquette fonctionnelle
- reflexion sur modification de la BDD
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
04/12/22
 - correction de la fonction et du template d'affichage des bas de page
 - Ajout du formulaire d'inscritpion + ajout de la route '/' dans le tableau des méthodes 'POST'
 - création de la classe FormChecker + création des première méthodes de vérifications des formulaires + création de la fonction validant le formalaire d'inscriptions
 - modification de la méthode Accueil#inscription
 - système inscription ok
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
10/12/22
- ajout du système de connexion et d'authentification
 - création de la classe authentification/Connection 
 - ajout des méthodes de vérification du formulaire dans la class Formchecker
 - ajout du formulaire de connexion + messages d'erreurs
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
17/12/22
- ajout du tableau de bord dans la page fil d'actualité
 - ajout du template bootstrap
 - modification de la class Template pour intégrer les cdn de bootstrap
 - modification de la class Template pour intégrer des morceaaux de templates indpendants du contenu principal
 - modification des fichiers head.php et end_html.php pour intégrer les ressources js et css de façon plus flexibl
 - modification des controllers accueil et fil d'actu pour qu'ils répondent aux nouveaux besoins de la class Template
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
27/12/22
- Ajout de la class UrlDecomposer.php
- Ajout de la methode construct_page_connected() dans la class Template
- Correction des templates elements/user_footer.php et elements/user_nav.fr
- ajout des methodes add_source() et what_form() dans le FilactuController
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
30/12/22
- Correction du template head.php
- correction du mvc et de la bdd pour les configurations d'affichage des flux
- Correction de la methode is_valid_url qui vérifie la validité d'une url RSS
- Correction du formulaire d'ajout d'url RSS pour qu'il n'accpetee qu'une seule version d'une même url pour chaque utilisateur
- Ajout de la class Rss.php
