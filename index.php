<?php

use VeilleTechno\core\Router;

require 'vendor/autoload.php';
require 'src/core/Router.php';

$router = new Router($_GET['url']);

$router->get('/post', function(){ echo 'tous les articles';});
$router->get('/post/:id', function($id){ echo 'Afficher l\'article '.$id;});
$router->post('/post/:id', function($id){ echo 'poster l\'article '.$id;});
$router->run();
// die(var_dump($router->getRoutes()));
