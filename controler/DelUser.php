<?php
/**
 * Created by PhpStorm.
 * User: foral
 * Date: 28/01/2018
 * Time: 15:57
 */

class DelUser
{
    public function __construct()
    {
    }

    public function delUser(){
        $UserManage = new UsersManage();

        $ID = $_POST['deleteID'];

        $UserManage->deleteUser($ID);

        require ('index.php?action=manageUsers');
    }
}