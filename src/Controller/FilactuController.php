<?php

namespace VeilleTechno\Controller;

use VeilleTechno\classes\authentification\Connection;
use VeilleTechno\classes\form\Formchecker;
use VeilleTechno\classes\vues\Template;
use VeilleTechno\classes\Bdd;
use VeilleTechno\classes\form\UrlDecomposer;

class FilactuController
{
    public function index()
    {
        $connection = new Connection();
        $connection->is_connected_redirection();
        Template::construct_page_connected('Mon fil d\'actu', 'description de la page de la page fil d\'actu', 'fil_actu.php', ['common.css', 'actu.css'], ['test.js' => 'footer'], [], [], []);
    }

    public function what_form()
    {
        self::add_source();
    }

    private function add_source()
    {
        $connection = new Connection();
        $connection->is_connected_redirection();
        $checker = new Formchecker;
        if (isset($_POST['addSource'])) {
            if ($checker->is_valid_url($_POST['addSource'])) {
                $stmt = Bdd::getInstance()->prepare('INSERT INTO Bibliographie(nom_Bibliographie, site_Bibliographie, flux_rss_Bibliographie, id_Users) VALUES (:nom, :urlSite, :urlRss, :user)');
                $urlDecomposer = new UrlDecomposer;
                $host = $urlDecomposer->get_host($_POST['addSource']);
                if ($stmt->execute(['nom' => $host, 'urlSite' => '', 'urlRss' => $_POST['addSource'], 'user' => $_SESSION['id']])) {
                    Template::construct_page_connected('Mon fil d\'actu', 'description de la page de la page fil d\'actu', 'fil_actu.php', ['common.css', 'actu.css'], ['test.js' => 'footer'], ['addSuccess' => 'ok']);
                }
            } else {
                echo 'mauvaise url';
            }
        }
    }
}
