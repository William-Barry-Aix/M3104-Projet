<?php
include 'model/UsersManage.php';
class ManageUsers
{
    public function __construct()
    {
    }
    public function show(){
        $pdo = new UsersManage();
        $users = $pdo->getUsers();
        //var_dump($users);
        require('view/frontend/manageUsers.php');
    }
}