<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 21/01/2018
 * Time: 07:20
 */

class TranslationManage extends dbConnect {
    public function getTranslation($from, $to, $textToTranslate) {

        $dbLink = $this->dbConnect();

        $query = 'SELECT ' . $to . ' FROM Translation WHERE ' . $from . ' = "'. $textToTranslate .'"';
        echo $query;
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        else{
            $rep = mysqli_fetch_assoc($dbResult);
            $_SESSION["textTranslated"] = $rep[$to];
            $_SESSION["requeteSQL"] = $query;
        }
    }
    public function getTranslations($lang = 'US'){
        $dbLink = $this->dbConnect();
        $query ="SELECT S1.TEXT AS text1, S2.TEXT AS text2"
                ." FROM Sentences AS S1, Sentences AS S2"
                ." WHERE S1.LANGUAGE = 'US' AND S2.LANGUAGE = '$lang' AND S2.ID_Family = S1.ID_Family;";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        else{
            $trads = array();
            while ($row = mysqli_fetch_assoc($dbResult)){
                $trads[$row['text1']] = $row['text2'];
            }
            return $trads;
        }
    }
    public function addTranslation($from, $to, $textToTranslate){
        $dbLink = $this->dbConnect();
    }
}