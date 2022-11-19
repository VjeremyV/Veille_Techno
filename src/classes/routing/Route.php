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

    public function getCallable()
    {
        return call_user_func_array($this->callable, $this->matches);
    }
    public function getPath()
    {
        return $this->path;
    }

    public function setPath(string $newPath){
        $this->path = $newPath;
    }

    public function setcallable(mixed $newCallable){
        $this->callable = $newCallable;
    }

    public function match(string $url){
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'param_match'], $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }
    public function with($param, $regex){
        $this->params[$param]= str_replace('(', '(?:', $regex);
        return $this;
    }

    private function param_match($match){
        if(isset($this->params[$match[1]])){
            return '('.$this->params[$match[1]].')';
        }
        return '([^/]+)';
    }

    public function getUrl(array $params){
        $path = $this->path;
        foreach($params as $key => $value){
            $path = str_replace(":$key", $value, $path);
        }
        return $path;
    }
}
