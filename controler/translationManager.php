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

    public function addTranslationRequest() {
        $translation = new TranslationManage();

        if(isset($_POST["TEXT_TRANSLATED"]) && isset($_POST["TO"]) && isset($_POST["FROM"]) && isset($_POST["TEXT_TO_TRANSLATE"])) {
            $to = $_POST["TO"];
            $textTranslated = $_POST["TEXT_TRANSLATED"];
            $textToTranslate = $_POST["TEXT_TO_TRANSLATE"];
            $from = $_POST["FROM"];

            $translation->requestComplete($to, $textTranslated, $textToTranslate, $from);

            $this->show();

        }
    }
}