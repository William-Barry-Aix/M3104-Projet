<?php
class DbConnect
{
    function __construct()
    {

    }

    protected function dbConnect()
    {
        try {
            $dbLink = new PDO('mysql-projetphpg3s3.alwaysdata.net', '150626', '1234');
            return $dbLink;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }
}