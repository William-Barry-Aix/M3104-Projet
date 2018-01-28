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

    // Recupere toute les traduction et les affiche sur la page
    public function show() {
        $translation = new TranslationManage();
        $list = $translation->getTranslationRequestList();
        function cmp($a,$b){
            $a = $a['STATUS'];
            $b = $b['STATUS'];
            if($a == $b){
                return 0;
            }
            return ($a < $b) ? 1 : -1;
        }
        uasort($list, 'cmp');
        require('view/frontend/manageTradView.php');
    }

    // Confirme la traduction
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