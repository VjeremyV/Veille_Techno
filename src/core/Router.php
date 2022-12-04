<?php

use VeilleTechno\classes\routing\Router;

$router = new Router($_GET['url']);
//Début block ajout de routes
//Déclarer les routes ici sous le format : 
//pour une url en method get : 
//$router->get('pathSouhaité', fonctionCallBack());
//$router->get('pathSouhaité', "NomController#NomMethode);
//pour une url en method post : 
//$router->post('pathSouhaité', fonctionCallBack());
//$router->post('pathSouhaité', "NomController#NomMethode);

$router->get('/', "Accueil#index");
$router->post('/', "Accueil#what_form");

// $router->get('/post', function(){ echo 'tous les articles';});
// $router->get('/post/:id', "Post#show");
// $router->get('/article/:slug-:id', function($slug, $id){ echo 'article '.$slug.": ".$id;});
// $router->get('/articles/:id-:slug', function($id, $slug) use ($router){ echo $router->url('articles.show', ['id'=> $id, 'slug'=> $slug]);}, 'articles.show')->with('id', '[0-9]+')->with('slug','[a-z/-0-9]+');

// fin block ajout de route
$router->run();
