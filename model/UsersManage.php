<?php
include 'DbConnect.php';
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


    // Ajotue un utilisateur a la BD
    public function addUser($nom,$prenom,$email,$password,$tel,$today)
    {
        $dbLink = $this->dbConnect();

        $request = $dbLink->prepare("INSERT INTO Users (NOM,PRENOM,TELEPHONE,EMAIL,MDP,DATE) 
                                              VALUES(:nom,:prenom,:tel,:email,:password,:today)");
        $request->bindValue(':nom', $nom, PDO::PARAM_STR);
        $request->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $request->bindValue(':tel', $tel, PDO::PARAM_INT);
        $request->bindValue(':email', $email, PDO::PARAM_STR);
        $request->bindValue(':password', $password, PDO::PARAM_STR);
        $request->bindValue(':today', $today, PDO::PARAM_STR);
        if (!$request->execute()) {
            echo 'Erreur : ' , $request->errorInfo(), PHP_EOL;
            exit();
        }

    }

    // Connect un utilisateur sur le site
    public function getUser($email,$password)
    {
        $dbLink = $this->dbConnect();

        $request = $dbLink->prepare('SELECT TYPECOMPTE,PRENOM,ID 
                                               FROM Users
                                               WHERE EMAIL = :email AND MDP = :password');
        $request->bindValue(':email', $email, PDO::PARAM_STR);
        $request->bindValue(':password', $password, PDO::PARAM_STR);
        try {
            $request->execute();
            if ($request->rowCount()) {
                $request->setFetchMode(PDO::FETCH_OBJ);
                $result = $request->fetch();

                $_SESSION['type'] = $result->TYPECOMPTE;
                $_SESSION['prenom'] = $result->PRENOM;
                $_SESSION['email'] = $email;
                $_SESSION['userID'] = $result->ID;
            }
        }
        catch (PDOException $e){
            echo 'Erreur : ' , $e->getMessage(), PHP_EOL;
            exit();
        }
    }
    public function getUsers(){
        $dbLink = $this->dbConnect();
        try {
            $users = $dbLink->query('SELECT * FROM Users')->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
        catch (PDOException $e){
            echo 'Erreur : ' , $e->getMessage(), PHP_EOL;
            return array();
        }
    }

    // Change le mot de passe d'un utilisateur
    public function changeMdp($email,$newpassword,$password)
    {
        $dbLink = $this->dbConnect();
        $request = $dbLink->prepare('UPDATE Users 
                                               SET MDP = :newpassword 
                                               WHERE EMAIL = :email AND MDP = :password');

        $request->bindValue(':newpassword' , $newpassword , PDO::PARAM_STR);
        $request->bindValue(':email' , $email , PDO::PARAM_STR);
        $request->bindValue(':password', $password , PDO::PARAM_STR);


        if (!$request->execute()) {
            echo 'Erreur : ' , $request->errorInfo(), PHP_EOL;
            exit();
        }
    }

    // Modifie le mot de passe avec un mdp aleatoir d'un utilisateur depuis sont adresse mail si il a utiliser mot de passe oublier
    public function setRandMdp($email,$newpassword){
        $dbLink = $this->dbConnect();

        $request = $dbLink->prepare('UPDATE Users
                                               SET MDP = :password
                                               WHERE EMAIL = :email');
        $request->bindValue(':password', $newpassword , PDO::PARAM_STR);
        $request->bindValue(':email', $email , PDO::PARAM_STR);

        if (!$request->execute()) {
            echo 'Erreur : ' , $request->errorInfo(), PHP_EOL;
            exit();
        }
    }

    //supprime un utilisateur
    public function deleteUser($ID){
        $dbLink = $this->dbConnect();

        $request = $dbLink->prepare('DELETE FROM Users
                                               WHERE ID = :id');
        $request->bindValue(':id',$ID);
        if (!$request->execute()) {
            echo 'Erreur : ' , $request->errorInfo(), PHP_EOL;
            exit();
        }
    }

    // Change le type de compte d'un utilisateur
    Public function changeRight($ID,$typeC){
        $dbLink = $this->dbConnect();
        $request = $dbLink->prepare('UPDATE Users 
                                               SET TYPECOMPTE = :typeC
                                               WHERE ID = :ID ');
        $request->bindValue(':typeC', $typeC);
        $request->bindValue(':ID', $ID);

        if (!$request->execute()) {
            echo 'Erreur : ' , $request->errorInfo(), PHP_EOL;
            exit();
        }
    }
}