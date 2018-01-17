<?php

/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 15/01/18
 * Time: 14:41
 */
class deconnexion
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