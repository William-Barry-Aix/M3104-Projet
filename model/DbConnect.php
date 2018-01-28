<?php
class DbConnect
{
    function __construct()
    {
    }
    protected function dbConnect()
    {
        try {
            $dbLink = new PDO('mysql:host=mysql-projetphpg3s3.alwaysdata.net;dbname=projetphpg3s3_translator', '150626', '1234');
            return $dbLink;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    protected function dbConnectMysqli()
    {
        $dbLink = mysqli_connect("mysql-projetphpg3s3.alwaysdata.net", "150626", "1234")
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
        mysqli_select_db($dbLink, 'projetphpg3s3_translator')
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
        return $dbLink;
    }
}