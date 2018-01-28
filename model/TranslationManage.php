<?php
/**
 * Created by PhpStorm.
 * User: lpott
 * Date: 21/01/2018
 * Time: 07:20
 */
class TranslationManage extends dbConnect {
    function __construct()
    {
    }

    public function getTranslation($from, $to, $original) {

        $dbLink = $this->dbConnectMysqli();

        $query = "SELECT S1.TEXT AS text1, S2.TEXT AS text2"
            . " FROM Sentences AS S1, Sentences AS S2"
            . " WHERE S1.LANGUAGE = '$from' AND S2.LANGUAGE = '$to' AND S1.TEXT= \"$original\""
            . " AND S2.ID_Family = S1.ID_Family";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            return '';
        } else {
            $rep = mysqli_fetch_assoc($dbResult);
            $trad['text1'] = $original;
            $trad['text2'] = $rep['text2'];

            return $trad;
        }
    }
    public function getTranslations($lang = 'US'){
        $dbLink = $this->dbConnectMysqli();
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
        } else {
            $trads = array();
            while ($row = mysqli_fetch_assoc($dbResult)) {
                $trads[$row['text1']] = $row['text2'];
            }
            return $trads;
        }
    }

    /*public function sendTranslation($from, $to, $textToTranslate)
    {
        $dbLink = $this->dbConnectMysqli();
        $query = 'SELECT ID_FAMILY FROM Sentences WHERE TEXT = \'' . $textToTranslate . '\'';
        echo $query . "</br>";
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
            echo $query . "</br>";
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
        echo $query . "</br>";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $query = 'INSERT INTO Sentences (LANGUAGE, TEXT, ID_FAMILY) VALUES (\'' . $from . '\', \'' . $textToTranslate . '\', \'' . $id_family . '\'), (\'' . $to . '\', NULL , \'' . $id_family . '\')';
        echo $query . "</br>";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $query = 'INSERT INTO Translation (SOURCE_LANGUAGE, TRANSLATED_LANGUAGE, DATE, STATUS, ASKER, ID_FAMILY) VALUES (\'' . $from . '\', \'' . $to . '\', \'' . date('Y-m-d') . '\', \'' . 'WAITING' . '\', \'' . $_SESSION['id_user'] . '\', \'' . $id_family . '\')';
        echo $query . "</br>";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }*/

    public function addTranslation($from, $to, $textToTranslate, $userID)
    {
        $dbLink = $this->dbConnectMysqli();
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
            echo $query . "</br>";
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

            $query = "SELECT TEXT FROM Sentences WHERE ID_FAMILY = " . $id_family . " AND LANGUAGE  = '" . $to . "'";
            echo $query . "</br>";
            if (!($dbResult = mysqli_query($dbLink, $query))) {
                echo 'Erreur dans requête<br />';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $query . '<br/>';
                exit();
            } else {

                $rep = mysqli_fetch_assoc($dbResult);
                $sentence_exist_but_null = $rep['TEXT'];
            }
        }

        if (empty($sentence_exist_but_null)) {
            $query = "INSERT INTO Family (ID_FAMILY) VALUES ($id_family)";
            echo $query . "</br>";
            if (!($dbResult = mysqli_query($dbLink, $query))) {
                echo 'Erreur dans requête<br />';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $query . '<br/>';
                exit();
            }
        }

        $query = 'INSERT INTO Sentences (LANGUAGE, TEXT, ID_FAMILY) VALUES (\'' . $from . '\', "' . $textToTranslate . '", \'' . $id_family . '\'), (\'' . $to . '\', NULL , \'' . $id_family . '\')';
        echo $query . "</br>";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();

        }

        $query = 'INSERT INTO Translation (SOURCE_LANGUAGE, TRANSLATED_LANGUAGE, DATE, STATUS, ID_FAMILY, IDUSER) VALUES (\'' . $from . '\', \'' . $to . '\', \'' . date('Y-m-d') . '\', \'' . 'WAITING' . '\', \'' . $id_family . '\', \'' . $userID . '\')';
        echo $query;
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }

    public function getTranslationRequestList()
    {
        $list = array();

        $dbLink = $this->dbConnectMysqli();
        $query = "SELECT * FROM Translation WHERE STATUS = 'WAITING'";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        } else {

            while ($row = mysqli_fetch_assoc($dbResult)) {
                $query = "SELECT TEXT FROM Sentences WHERE ID_FAMILY = " . $row["ID_FAMILY"] . " AND LANGUAGE = '" . $row["SOURCE_LANGUAGE"] . "'";
                if (!($dbResult = mysqli_query($dbLink, $query))) {
                    echo 'Erreur dans requête<br />';
                    // Affiche le type d'erreur.
                    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                    // Affiche la requête envoyée.
                    echo 'Requête : ' . $query . '<br/>';
                    exit();
                } else {
                    $rep = mysqli_fetch_assoc($dbResult);
                    array_push($list, array($row["SOURCE_LANGUAGE"], $rep["TEXT"], $row["TRANSLATED_LANGUAGE"]));
                }
            }
        }
        return $list;
    }

    public function requestComplete($to, $text_translated, $textToTranslate, $from)
    {

        $dbLink = $this->dbConnectMysqli();

        $query = "SELECT ID_FAMILY FROM Sentences WHERE LANGUAGE = '$from' AND TEXT = \"$textToTranslate\"";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        } else {
            $rep = mysqli_fetch_assoc($dbResult);
            $id_family = $rep["ID_FAMILY"];

            $query = "UPDATE Sentences SET TEXT = \"$text_translated\" WHERE ID_FAMILY = '$id_family' AND LANGUAGE = '$to'";
            if (!($dbResult = mysqli_query($dbLink, $query))) {
                echo 'Erreur dans requête<br />';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $query . '<br/>';
                exit();
            } else {
                $query = "UPDATE Translation SET STATUS = 'DONE' WHERE ID_FAMILY = '$id_family' AND SOURCE_LANGUAGE = '$from' AND TRANSLATED_LANGUAGE = '$to'";
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
    }
}