<?php
class Deconnexion
{
    public function __construct()
    {
    }
    //Deconnection de l'utilisateur
    public function disconect(){
        $_SESSION = array();
        session_destroy();
        session_register_shutdown();
        require('view/frontend/homeView.php');
    }
}