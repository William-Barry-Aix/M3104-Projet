<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 21/01/2018
 * Time: 07:20
 */

class TranslationManage extends dbConnect {
    public function getTranslation($from, $to, $original) {

        $dbLink = $this->dbConnect();

        $query = "SELECT S1.TEXT AS text1, S2.TEXT AS text2"
                ." FROM Sentences AS S1, Sentences AS S2"
                ." WHERE S1.LANGUAGE = '$from' AND S2.LANGUAGE = '$to' AND S1.TEXT= '$original'"
                ." AND S2.ID_Family = S1.ID_Family";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            return '';
        }
        else{
            $rep = mysqli_fetch_assoc($dbResult);
            $trad['text1'] = $original;
            $trad['text2'] = $rep['text2'];

            return $trad;
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
        $query = "SELECT ID_FAMILY FROM Sentences WHERE TEXT = '" . $textToTranslate . "'";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        } else {

            $rep = mysqli_fetch_assoc($dbResult);
            $family_exist = $rep['ID_FAMILY'];
        }

        $id_family = NULL;

        if (!$family_exist) {

            $query = 'SELECT COUNT(*) FROM Family';
            if (!($dbResult = mysqli_query($dbLink, $query))) {
                echo 'Erreur dans requête<br />';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $query . '<br/>';
                exit();
            } else {

                $rep = mysqli_fetch_assoc($dbResult);
                $id_family = $rep["COUNT(*)"] + 1;
            }
        } else {
            $id_family = $family_exist;

            $query = "SELECT TEXT FROM Sentences WHERE ID_FAMILY = " . $id_family . "AND L";
            if (!($dbResult = mysqli_query($dbLink, $query))) {
                echo 'Erreur dans requête<br />';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $query . '<br/>';
                exit();
            } else {

                $rep = mysqli_fetch_assoc($dbResult);
                $family_exist = $rep['ID_FAMILY'];
            }
        }

        $query = "INSERT INTO Family (ID_FAMILY) VALUES ($id_family)";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

        $query = 'INSERT INTO Sentences (LANGUAGE, TEXT, ID_FAMILY) VALUES (\'' . $from . '\', \'' . $textToTranslate . '\', \'' . $id_family . '\'), (\'' . $to . '\', NULL , \'' . $id_family . '\')';
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

        $query = 'INSERT INTO Translation (SOURCE_LANGUAGE, TRANSLATED_LANGUAGE, DATE, STATUS, ASKER, ID_FAMILY) VALUES (\'' . $from . '\', \'' . $to . '\', \'' . date('Y-m-d') . '\', \'' . 'WAITING' . '\', \'' . $_SESSION['id_user'] . '\', \'' . $id_family . '\')';

        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
}