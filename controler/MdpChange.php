<?php
class MdpChange
{
    public function __construct()
    {
    }

    // Changement de mot de passe
    function mdpChange (){
        $mdp = $_POST['mdp'];
        $newMdp = $_POST['newMdp'];
        $newMdpVerif = $_POST['verifNewMdp'];
        $email = $_SESSION['email'];

        if ( $newMdp == $newMdpVerif){
            $user = new UsersManage();

            $user->changeMdp($email,$newMdp,$mdp);

            require ('index.php');
        }
        else {
            $_SESSION['changeMdpError'] = 'true' ;
            require ('view/frontend/compteView.php');
        }
    }
}