<?php

class Sesion{

    public function __construct(){
        session_start();
    }

    public function setUser($user){
        $_SESSION['us'] = $user;
    }

    public function getUser(){
        return $_SESSION['us'];
    }

    public function cerrasSesion(){
        session_unset();
        session_destroy();
    }
}

?>