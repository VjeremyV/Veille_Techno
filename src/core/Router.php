<?php

use VeilleTechno\classes\routing\Router; 

$router = new Router($_GET['url']);

$router->get('/post', function(){ echo 'tous les articles';});
$router->get('/post/:id', function($id){ echo 'Afficher l\'article '.$id;});
$router->get('/article/:slug-:id', function($slug, $id){ echo 'article '.$slug.": ".$id;});
$router->get('/articles/:id-:slug', function($id, $slug)use ($router){ echo $router->url('articles.show', ['id'=> 1, 'slug'=> 'salut-les-gens']);}, 'articles.show')->with('id', '[0-9]+')->with('slug','[a-z/-0-9]+');
$router->post('/post/:id', function($id){ echo 'poster l\'article '.$id;});
$router->run();