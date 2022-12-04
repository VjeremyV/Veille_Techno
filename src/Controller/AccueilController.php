<?php

namespace VeilleTechno\Controller;

use VeilleTechno\classes\Bdd;
use VeilleTechno\classes\form\Formchecker;
use VeilleTechno\classes\vues\Template;

class AccueilController{

    public function index(){
      $params= ['prout', 1 ,2];
      Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'], $params);
    }


    private function inscription(){
      // var_dump($_POST);
      $formchecker = new Formchecker();
      $checked = $formchecker->check_profil_data($_POST);
      if(isset($checked['nom'])){
           $stmt = Bdd::getInstance()->prepare('INSERT INTO users(pseudo_Users, nom_Users, prenom_Users, mdp_Users, mail_Users	) VALUES (:pseudo, :nom, :prenom, :mdp, :mail)');
          if($stmt->execute(['pseudo' => $checked['pseudo'], 'nom' => $checked['nom'], 'prenom' => $checked['prenom'], 'mdp' => $checked['pwd'], 'mail' => $checked['mail']])){
            $params = ['inscription' => 'ok'];
            Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'], $params);
          }else {
            $params = ['inscription' => 'pb bdd'];
            Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'], $params);
          }     
      } else {
        Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], ['test.js'], $checked);
      }
 }

    private function connexion(){}

  public function what_form(){
    if(count($_POST) > 2){
      $this->inscription();
    } else {
      $this->connexion();
    }
  }
}