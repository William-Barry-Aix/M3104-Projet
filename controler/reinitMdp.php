<?php
/**
 * Created by PhpStorm.
 * User: jb
 * Date: 16/01/2018
 * Time: 18:24
 */

class reinitMdp
{
    function reinitMdp(){
        $randomMdp = rand(1000000,9999999);
        $email = $_SESSION['email'];

        $user = new UsersManage();
        $user->setRandMdp($email,$randomMdp);

        $message = 'Voici votre nouveau mot de passe :' . PHP_EOL;
        $message .= 'Mot de passe : ' . PHP_EOL . $randomMdp;
        $message .= 'Vous pouvez le changer dans la section Compte' . PHP_EOL;
        $message .= 'http://projetphpg3s3.alwaysdata.net/index.php?action=signin' . PHP_EOL;
        mail($email,"Reinitialisation du mot de passe",$message);

        require('view/frontend/mdpChangeView.php');
    }
}