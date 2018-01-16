<?php
/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 15/01/18
 * Time: 13:58
 */
class signUp
{
    public function __construct()
    {
    }

    public function signUp(){
        require ('view/frontend/signUpView.php');
    }
    public function signUpRegister(){
        $user = new UsersManage();

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['e_mail'];
        $password = $_POST['mdp'];
        $verifPassWord = $_POST['verifMdp'];
        $tel = $_POST['tel'];
        $today = date('Y-m-d');

        if ( $password != $verifPassWord){
            $_SESSION['mdpErreur'] = "true";
            require ('view/frontend/signUpView.php');
        }

        $user->addUser($nom,$prenom,$email,$password,$tel,$today);

        $message = 'Voici vos identifiants d\'inscription :' . PHP_EOL;
        $message .= 'Email : ' . $email . PHP_EOL;
        $message .= 'Mot de passe : ' . PHP_EOL . $password;
        mail($email,"Creation de votre compte",$message);
        require ('view/frontend/signUpFinishView.php');
    }
}