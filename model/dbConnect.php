<?php
class dbConnect
{
    function __construct()
    {

    }

    protected function dbConnect()
    {
        $dbLink = mysqli_connect("mysql-projetphpg3s3.alwaysdata.net", "150626", "1234")
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
        mysqli_select_db($dbLink, 'projetphpg3s3_translator')
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
        return $dbLink;
    }

}