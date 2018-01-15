<?php

/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 15/01/18
 * Time: 14:41
 */
class deconnexion
{
    function disconect(){
        $_SESSION = array();
        require('view/frontend/homeView.php');
    }
}