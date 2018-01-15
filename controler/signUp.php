<?php
include 'model/UsersManage.php';
/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 15/01/18
 * Time: 13:58
 */
class signUp
{
    function signUp(){
        require ('view/frontend/signUpView.php');
    }
    function signUpRegister(){
        $user = new UsersManage();

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['e_mail'];
        $password = $_POST['mdp'];
        $tel = $_POST['tel'];
        $today = date('Y-m-d');

        $user->addUser($nom,$prenom,$email,$password,$tel,$today);

        $message = 'Voici vos identifiants d\'inscription :' . PHP_EOL;
        $message .= 'Email : ' . $email . PHP_EOL;
        $message .= 'Mot de passe : ' . PHP_EOL . $password;
        mail($email,"Tp2",$message);
        require ('view/frontend/signUpFinishView.php');
    }
}