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
    function show(){
        $translation = new TranslationManage();
        $list = $translation->getTranslationRequestListPre();


        require('view/frontend/visuDemandePreView.php');
    }
}