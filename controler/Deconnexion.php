<?php
class Deconnexion
{
    public function __construct()
    {
    }

    public function disconect(){
        session_start();
        $_SESSION = array();
        session_destroy();
        session_register_shutdown();
        require('view/frontend/homeView.php');
    }
}