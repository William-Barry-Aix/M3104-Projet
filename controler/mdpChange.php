<?php
/**
 * Created by PhpStorm.
 * User: jb
 * Date: 16/01/2018
 * Time: 17:52
 */

class mdpChange
{
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