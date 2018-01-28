<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 28/01/2018
 * Time: 05:01
 */

class translationManager
{
    public function __construct()
    {

    }

    public function show() {
        $translation = new TranslationManage();
        $list = $translation->getTranslationRequestList();

        require('view/frontend/manageTradView.php');


    }
}