<?php

namespace VeilleTechno\classes\routing;

class Route
{

    private string $path;
    private mixed $callable;
    private array $matches;
    private array $params;

    public function __construct(string $path, mixed $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    //récupère et execute la fonction callback d'une route
    public function getCallable()
    {
        if(is_string($this->callable)){
            $params = explode('#', $this->callable);
            $controller = "VeilleTechno\\Controller\\".$params[0]."Controller";
            $controller = new $controller(); 
            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    // Vérifie que le pattern de la route match
      public function match(string $url){
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'param_match'], $this->path);
        $regex = "#^$path$#i";//on construit notre regex
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    //intègre des regex aux tableau de paramètres de la route
    public function with($param, $regex){
        $this->params[$param]= str_replace('(', '(?:', $regex);
        return $this;
    }

    // vérifie si un pattern correspond dans la liste des regex de la route
    private function param_match($match){
        if(isset($this->params[$match[1]])){
            return '('.$this->params[$match[1]].')';
        }
        return '([^/]+)';
    }

    // Renvoie l'url de la route
    public function getUrl(array $params){
        $path = $this->path;
        foreach($params as $key => $value){
            $path = str_replace(":$key", $value, $path);
        }
        return $path;
    }
}
