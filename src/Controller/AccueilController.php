<?php

namespace VeilleTechno\Controller;
use VeilleTechno\classes\vues\Template;

class AccueilController{

    public function index(){
      $params= ['prout', 1 ,2];
      Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css'], $params);
    }


}