<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 21/01/2018
 * Time: 07:20
 */

class TranslationManage extends dbConnect
{

    public function getTranslation($from, $to, $textToTranslate)
    {

        $dbLink = $this->dbConnect();

        $query = 'SELECT TEXT FROM Sentences WHERE LANGUAGE = "' . $to . '" AND ID_FAMILY IN (SELECT ID_FAMILY FROM Sentences WHERE LANGUAGE = "' . $from . ' " AND TEXT = "' . $textToTranslate . '")';
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        } else {


            $rep = mysqli_fetch_assoc($dbResult);
            $_SESSION["textTranslated"] = $rep["TEXT"];
        }

    }

    public function sendTranslation($from, $to, $textToTranslate)
    {
        $dbLink = $this->dbConnect();

        $query = 'SELECT ID_FAMILY FROM Sentences WHERE TEXT = \'' . $textToTranslate . '\'';
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
        }

        $query = 'INSERT INTO Family VALUES \'' . $id_family . '\'';
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