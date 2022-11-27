<?php

namespace VeilleTechno\Controller;
use VeilleTechno\classes\vues\Template;

class AccueilController{

    public function index(){
      Template::construct_page('Accueil', 'description de la page d\'accueil', 'accueil.php', ['accueil.css', 'common.css']);

    }
}