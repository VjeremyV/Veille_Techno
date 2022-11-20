<?php

namespace VeilleTechno\classes\routing;

use Exception;

class RouterException extends Exception{

public static function get404(){
    echo'err 404';
}
}