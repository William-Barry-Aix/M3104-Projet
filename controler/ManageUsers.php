<?php
include_once 'model/UsersManage.php';

class ManageUsers
{
    public function __construct()
    {
    }
    public function show(){
        $pdo = new UsersManage();
        $users = $pdo->getUsers();
        require('view/frontend/manageUsers.php');
    }
}