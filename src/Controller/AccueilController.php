<?php

namespace VeilleTechno\Controller;
use VeilleTechno\classes\vues\Template;

class AccueilController{

    public function index(){
        Template::display_head('Accueil', 'bonjour c\'est l\'accueil', ['accueil.css', 'common.css']);
        Template::display_header();
        Template::display_main_content();
        Template::display_footer();
        Template::add_endhtml();

    }
}