<?php
include_once 'model/UsersManage.php';

class ManageUsers
{
    public function __construct()
    {
    }
    //Affichage de la page et connection a la base de données pour recuperer les utilisateurs
    public function show(){
        $pdo = new UsersManage();
        $users = $pdo->getUsers();
        require('view/frontend/manageUsers.php');
    }
}