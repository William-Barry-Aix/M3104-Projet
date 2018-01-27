<?php
class dbConnect
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
}