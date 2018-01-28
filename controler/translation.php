<?php

/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 15/01/18
 * Time: 17:02
 */
class translation
{
    public function __construct()
    {

    }

    public function show(){
        $trad['text1'] = '';
        $trad['text2'] = '';
        $readable = 'readonly';
        if(isset($_GET['text1']) && isset($_GET['text2'])){
            $trad['text1'] = $_GET['text1'];
            $trad['text2'] = $_GET['text2'];
            $readable = '';
        }
        require ('view/frontend/tradView.php');
    }
    public function translate() {

        //if(isset($_SESSION['type'])) {

        $translation = new TranslationManage();

        if(isset($_POST["original"]) && isset($_POST["lang1"]) && isset($_POST["lang2"])) {
            $original = $_POST["original"];
            $from = $_POST["lang1"];
            $to = $_POST["lang2"];

            if($_POST["lang1"] ==  $_POST['lang2']) {
                header('Location: index.php?action=translation&text1='.$original
                    .'&text2=Please select different languages');
                return;
            }

            /*$result = $translation->getTranslation($from, $to, $textToTranslate);
            if($result) {
                $_SESSION["textTranslated"] = $result["reponseSQL"];
                $_SESSION["requeteSQL"] = $result["query"];
            }*/

            $translation = $translation->getTranslation($from, $to, $original);

            header('Location: index.php?action=translation&text1='.$translation['text1']
                .'&text2='.$translation['text2']);

        }
    }
    public function suggest(){
        $translation = new TranslationManage();
        if(isset($_POST["original"]) && isset($_POST["translated"]) && isset($_POST["lang1"]) && isset($_POST["lang2"])) {
            $original = $_POST["original"];
            $from = $_POST["lang1"];
            $to = $_POST["lang2"];

            if($_POST["lang1"] ==  $_POST['lang2']) {
                header('Location: index.php?action=translation&text1='.$original
                    .'&text2=Please select different languages');
                return;
            }
            //manque méthode de sugestion
            $translation = $translation->addTranslation($from, $to, $original);


            header('Location: index.php?action=translation&text1='.$original
                .'&text2=Request sent');

        }
    }
}