<?php

namespace VeilleTechno\Controller;

use VeilleTechno\classes\authentification\Connection;
use VeilleTechno\classes\vues\Template;

class FilactuController {
    public function index(){
        $connection = new Connection();
        $connection->is_connected_redirection();
        Template::construct_page('Mon fil d\'actu', 'description de la page de la page fil d\'actu', 'fil_actu.php', ['https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css','app.css', 'common.css', 'actu.css'], ['app.js'=> 'head','test.js' => 'footer'], ['connexion' => 'fail_mdp'], [['before', 'user_nav.php', 'elements']]);

        echo'Bienvenue au prout d\'acutalités '.$_SESSION['pseudo'];
    }
}