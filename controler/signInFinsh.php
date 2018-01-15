<?php
/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 15/01/18
 * Time: 14:02
 */
include ('model/UsersManage.php');
class signInFinsh
{
    function signInFinish(){
        $this->signInSQL();
        $home = new Home();
        $home->home();
    }
    function signInSQL(){
        $user = new UsersManage();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user->getUser($email,$password);
    }
}