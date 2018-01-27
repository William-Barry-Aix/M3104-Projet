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
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
    public function getUser($email,$password)
    {
        $dbLink = $this->dbConnect();


        $query = 'SELECT `TYPECOMPTE`,`PRENOM` FROM `Users` WHERE EMAIL = "'. $email .'" AND MDP = "'.$password.'"';
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
            session_start();
            $_SESSION['id_user'] = $rep['ID'];
            $_SESSION['type'] = $rep['TYPECOMPTE'];
            $_SESSION['prenom'] = $rep['PRENOM'];
            $_SESSION['email'] = $email;
        }
    }
    public function changeMdp($email,$newpassword,$password)
    {
        $dbLink = $this->dbConnect();
        $query = $sql = "UPDATE Users SET MDP='$newpassword' WHERE EMAIL = '$email' AND MDP = '$password'";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
    public function setRandMdp($email,$newpassword){
        $dbLink = $this->dbConnect();
        $query = $sql = "UPDATE Users SET MDP='$newpassword' WHERE EMAIL = '$email'";
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
