<?php
/**
 * Created by PhpStorm.
 * User: foral
 * Date: 28/01/2018
 * Time: 20:58
 */

class VisuDemande
{
    public function __construct()
    {
    }

    // Recuperer toutes les demandes d'un utilisateurs premium puis les affiches sur la page des demandes
    function show(){
        $translation = new TranslationManage();
        $list = $translation->getTranslationRequestListPre();


        require('view/frontend/visuDemandePreView.php');
    }
}