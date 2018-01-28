<?php
class ReinitMdp
{
    public function __construct()
    {
    }

    // Met un mot de passe aleatoir a un utilisateur ayant perdu son mot de passe et lui envoie
    function reinitMdp(){
        $randomMdp = rand(1000000,9999999);
        $email = $_POST['emailreinit'];

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