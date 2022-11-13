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
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }
}
