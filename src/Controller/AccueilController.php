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
      var_dump($_POST);
      $formchecker = new Formchecker();
      if($formchecker->is_unique('michel', 'Users', 'pseudo_Users')){
        echo 'unique';
      } else {
        echo 'pas unique';
      };
        // $stmt = Bdd::getInstance()->prepare('INSERT INTO users(pseudo_Users, nom_Users, prenom_Users, mdp_Users, mail_Users	) VALUES (:pseudo, :nom, :prenom, :mdp, :mail)');
        // $stmt->execute(['pseudo' => $_POST['pseudo'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'mdp' => $_POST['pwd'], 'mail' => $_POST['mail']]);  
      
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