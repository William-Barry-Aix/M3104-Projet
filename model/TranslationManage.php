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

        $query = 'SELECT TEXT FROM Sentences WHERE LANGUAGE = "' . $to . '" AND ID_FAMILY IN (SELECT ID_FAMILY FROM Sentences WHERE LANGUAGE = "' . $from . ' " AND TEXT = "' . $textToTranslate . '")';
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
            $_SESSION["textTranslated"] = $rep["TEXT"];
        }

    }
}