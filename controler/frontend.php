
<?php
include 'model/UsersManage.php';
function home(){
    require('view/frontend/homeView.php');
}
function signUp(){
    require ('view/frontend/signUpView.php');
}
function signIn(){

    require ('view/frontend/authView.php');
}
function signInFinish(){

    require ('view/frontend/authFinishView.php');
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