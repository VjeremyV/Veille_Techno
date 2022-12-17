<?php

namespace VeilleTechno\Controller;

use PDO;
use VeilleTechno\classes\authentification\Connection;
use VeilleTechno\classes\Bdd;
use VeilleTechno\classes\form\Formchecker;
use VeilleTechno\classes\vues\Template;

class AccueilController{

  /**
   * fonction index de la route '/' en GET
   *
   * @return void
   */
    public function index(){
      $params= ['prout', 1 ,2];
      Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'=> 'footer'], $params);
    }

/**
 * renvoie l'affichage adequat lors de la soumission d'un formulaire d'inscriptions
 *
 * @return void
 */
    private function inscription(){
      $formchecker = new Formchecker();
      $checked = $formchecker->check_profil_data($_POST);
      if(isset($checked['nom'])){
           $stmt = Bdd::getInstance()->prepare('INSERT INTO users(pseudo_Users, nom_Users, prenom_Users, mdp_Users, mail_Users	) VALUES (:pseudo, :nom, :prenom, :mdp, :mail)');
          if($stmt->execute(['pseudo' => $checked['pseudo'], 'nom' => $checked['nom'], 'prenom' => $checked['prenom'], 'mdp' => $checked['pwd'], 'mail' => $checked['mail']])){
            $params = ['inscription' => 'ok'];
            Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'=> 'footer'], $params);
          }else {
            $params = ['inscription' => 'pb bdd'];
            Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'=> 'footer'], $params);
          }     
      } else {
        Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'=> 'footer'], $checked);
      }
 }

 /**
  * renvoie l'affichage adequat lors de la soumission d'un formulaire de connexion
  *
  * @return void
  */
    private function connexion(){
      $formchecker = new Formchecker();
      $checked = $formchecker->check_connection_data($_POST);
      if(isset($checked['pseudo_connection'])){
        $stmt = Bdd::getInstance()->prepare('SELECT * FROM Users WHERE pseudo_Users = :pseudo');
        if($stmt->execute(['pseudo' => $checked['pseudo_connection']]) > 0){
          $result = $stmt->fetchAll($fetchMode = PDO::FETCH_NAMED);
          if(count($result) > 0 ){
            if(password_verify($checked['pwd_connection'], $result[0]['mdp_Users'])){
              $connexion = new Connection();
              $connexion->create_connection($result[0]);
              header('Location: /mon-actu');            
            } else {

              Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js' => 'footer'], ['connexion' => 'fail_mdp']);
            }
          } else {
            //pseudo érroné
            $params = ['connexion' => 'fail_pseudo'];
            Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'=> 'footer'], $params);
          }
        }
      } else {
        //pseudo non renseigné
        Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'=> 'footer'], $checked);

      }


    }

    /**
     * Permet d'indentifier quel formulaire choisir lors de l'appelle de la route '/' avec la méthode Post
     *
     * @return void
     */
  public function what_form(){
    if(count($_POST) > 2){
      $this->inscription();
    } else {
      $this->connexion();
    }
  }
}