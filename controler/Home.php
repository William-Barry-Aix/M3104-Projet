<?php

include 'model/UsersManage.php';
/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 15/01/18
 * Time: 13:53
 */
class Home
{
    function home(){
        if (isset($_SESSION['type']))

        require('view/frontend/homeView.php');
    }
}