<?php
/**
 * Created by PhpStorm.
 * User: foral
 * Date: 28/01/2018
 * Time: 15:57
 */

include_once ('controler/ManageUsers.php');

class ModifyUser
{
    public function __construct()
    {
    }

    public function modifyUser(){
        $UserManage = new UsersManage();

        $IDD = $_POST['delete'];
        $IDM = $_POST['modify'];
        $typeC = $_POST['typeC'];

        if ($IDD != NULL){
            $UserManage->deleteUser($IDD);
        }
        else if ($IDM != NULL){
            $UserManage->changeRight($IDM,$typeC);
        }

        $manageUser = new ManageUsers();
        $manageUser->show();
    }
}