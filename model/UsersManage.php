<?php
include 'dbConnect.php';
/**
 * Created by PhpStorm.
 * User: p16009763
 * Date: 11/01/18
 * Time: 15:10
 */
class UsersManage extends DbConnect
{

    function __construct()
    {

    }

    public function addUser($nom,$prenom,$email,$password,$tel,$today)
    {
        $dbLink = $this->dbConnect();

        $query = 'INSERT INTO `Users` (`NOM` , `PRENOM`, `TELEPHONE`, `EMAIL`, `MDP`, `DATE`) VALUES (\'' . $nom . '\', \''
            . $prenom . '\', \'' . $tel . '\' , \'' . $email . '\', \'' . $password . '\', \'' . $today . '\')';

        if (!($dbResult = mysqli_query($dbLink, $query))) {
            var_dump($_POST);
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
}