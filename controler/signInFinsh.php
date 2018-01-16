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
    public function __construct()
    {

    }

    public function signInFinish(){
        $user = new UsersManage();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user->getUser($email, $password);
            header("Location: index.php");
        }
    }
}