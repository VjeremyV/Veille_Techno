<?php

namespace VeilleTechno\classes\authentification;

class Connection
{

    public function is_connect():bool
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!empty($_SESSION['id'])) {
            return true;
        }
        session_destroy();
        return false;
    }

    public function is_connected_redirection():void{
        if(!$this->is_connect()){
            header('Location: /');
            exit();
        }
    }
    public function disconnect():void
    {
        if ($this->is_Connect()) {
            session_destroy();
        }
    }
    public function create_connection(array $profil):void{
        session_start();
        foreach($profil as $key => $element){
            if($key != 'mdp_Users'){
                $key_clean = explode('_', $key);
                $_SESSION[$key_clean[0]] = $element;
            }
        }
    }
}
