<?php
class Home
{
    public function __construct()
    {
    }

    //Affichage de la page
    function show(){

        require('view/frontend/homeView.php');
    }
}