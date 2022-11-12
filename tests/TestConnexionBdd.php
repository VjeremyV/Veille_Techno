<?php
// Affichage des messages d'erreurs
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// Inclusion des paramètres de configuration
// require 'config.php';
// Inclusion de la classe MySQL
require __DIR__.'/../src/classes/Bdd.php';
use VeilleTechno\classes\Bdd;
// La requête est enregistrée dans une variable nommée $req (request)
$req = "SELECT * FROM articles WHERE id_Articles = 1";
// La requête est exécutée en faisant appel à l'instance de connexion à MySQL via $stmt (statement)
$stmt = Bdd::getInstance()->query($req);
// La variable $res (result) stocke un tableau contenant toutes les lignes de résultats
$res = $stmt->fetchAll();
// On affiche les résultats
var_dump($res);