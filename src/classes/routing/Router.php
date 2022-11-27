<?php

namespace VeilleTechno\classes\routing;

use VeilleTechno\classes\routing\Route;
use VeilleTechno\classes\routing\RouterException;

class Router {
    private string $url;
    private array $routes = [];
    private array $namedRoutes;
     
    public function __construct($url)
    {
        $this->url = $url;
    }

    // créer une route en method GET
    public function get(string $path, mixed $callable, string $name = null){
       return $this->add($path, $callable, $name, 'GET');
    }

        // créer une route en method post
    public function post(string $path, mixed $callable,string $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    //Ajoute une route
    private function add(string $path, mixed $callable, mixed $name, string $method):Route{
        $route = new Route($path, $callable); // on construit une novuelle route
        $this->routes[$method][] = $route; // on ajoute la route dans le tableau des routes du router à l'index de sa method
        if(is_string($callable) && $name === null){ //si la route n'a pas de nom et que le callable n'est pas un callback mais une string
            $name = $callable; // on donne au nom de la route le nom du callable
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    // vérifie les matchs entre les routes enregistrées et celles appelées
    public function run(){     
     if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){//on vérifie que la methode existe dans notre tableau des routes
        throw new RouterException('REQUEST_METHOD does not exist');
     }
    //  print_r($this->namedRoutes);
    //  print_r($this->routes);
     foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){// on vérifie que la route existe dans le tableau de la method
        if($route->match($this->url)){
            return $route->getCallable(); //on retourne le callback
        }
     }
     throw new RouterException('No routes matches');
    //  RouterException::get404();
    }

// Retourne la liste des routes
    public function getRoutes(){
        return $this->routes;
    }

    //retourne l'url d'une route nommée
    public function url(string $name, array $params = []){
        if(!isset($this->namedRoutes[$name])){
            throw new RouterException('No route matches this name');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }
}
