<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 21/01/2018
 * Time: 08:25
 */

class translationQuery
{
    public function translate() {
       header("Location : translationDone.php");
    }

    public function addTranslationToSession() {
        if(session_status() ==  PHP_SESSION_ACTIVE) {

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

            $result = $translation->getTranslation($from, $to, $textToTranslate);
            if($result) {
                $_SESSION["textTranslated"] = $result;
            }

        }
    }
}