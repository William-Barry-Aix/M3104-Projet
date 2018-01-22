<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 21/01/2018
 * Time: 08:25
 */
include 'model/TranslationManage.php';

class translationQuery
{
    public function __construct()
    {

    }


    public function addTranslationToSession() {

        //if(isset($_SESSION['type'])) {

            $translation = new TranslationManage();

            $textToTranslate = $_POST["textToTranslate"];
            $to = "";
            $from = "";

            if($_POST["fromAndTo"] ==  "usToFr") {
                $from = "US";
                $to = "FR";
            }
            else if($_POST["fromAndTo"] == "frToUs") {
                $from = "FR";
                $to = "US";
            }

            /*$result = $translation->getTranslation($from, $to, $textToTranslate);
            if($result) {
                $_SESSION["textTranslated"] = $result["reponseSQL"];
                $_SESSION["requeteSQL"] = $result["query"];
            }*/

            $translation->getTranslation($from, $to, $textToTranslate);
            require('view/frontend/translationDone.php');

        //}
    }
}