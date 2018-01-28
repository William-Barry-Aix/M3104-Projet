<?php
class Compte
{
    public function __construct()
    {
    }

    //Affichage de la page
    public function show()
    {
        require('view/frontend/compteView.php');
    }
}