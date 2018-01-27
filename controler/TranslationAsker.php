<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 23/01/2018
 * Time: 07:00
 */

include 'model/TranslationManage.php';

class TranslationAsker
{
    public function __construct()
    {

    }

    public function send() {
        $translation = new TranslationManage();

        $translation->sendTranslation($_SESSION['from'], $_SESSION['to'], $_SESSION['textToTranslate']);

        unset($_SESSION["textTranslated"]);
        unset($_SESSION["textToTranslate"]);
        unset($_SESSION["to"]);
        unset($_SESSION["from"]);

        require('index.php');
    }
}