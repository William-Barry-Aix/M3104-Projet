<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 23/01/2018
 * Time: 07:00
 */
include_once ('model/TranslationManage.php');


class TranslationAsker
{
    public function __construct()
    {

    }

    public function send() {
        $translation = new TranslationManage();

        $translation->sendTranslation($_SESSION['from'], $_SESSION['to'], $_SESSION["textToTranslate"]);

    }
}