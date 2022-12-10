<?php

namespace VeilleTechno\Controller;

use VeilleTechno\classes\authentification\Connection;

class FilactuController {
    public function index(){
        $connection = new Connection();
        $connection->is_connected_redirection();
        echo'Bienvenue au prout d\'acutalités '.$_SESSION['pseudo'];
    }
}