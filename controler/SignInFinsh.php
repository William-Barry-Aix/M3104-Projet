<?php
include ('model/UsersManage.php');

class SignInFinsh
{
    public function __construct()
    {

    }

    //recupere les infos de connection et connect l'utilisateurs avec getUser()
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