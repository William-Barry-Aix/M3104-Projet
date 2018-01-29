<?php
class SignIn
{
    public function __construct()
    {
    }

    //Affichage de la page
    function show (){

        require ('view/frontend/authView.php');
    }
}