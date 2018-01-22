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
    public function getUser($email,$password)
    {
        $dbLink = $this->dbConnect();

        $request = $dbLink->prepare('SELECT TYPECOMPTE,PRENOM,EMAIL 
                                               FROM Users
                                               WHERE EMAIL = :email AND MDP = :password');
        $request->bindValue(':email', $email, PDO::PARAM_STR);
        $request->bindValue(':password', $password, PDO::PARAM_STR);
        try {
            $request->execute();
            if ($request->rowCount()) {
                $request->setFetchMode(PDO::FETCH_OBJ);
                $result = $request->fetch();
                session_start();
                $_SESSION['type'] = $result->TYPECOMPTE;
                $_SESSION['prenom'] = $result->PRENOM;
                $_SESSION['email'] = $result->EMAIL;
            }
        }
        catch (PDOException $e){
            echo 'Erreur : ' , $e->getMessage(), PHP_EOL;
            exit();
        }
    }

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

    public function setRandMdp($email,$newpassword){
        $dbLink = $this->dbConnect();

        $request = $dbLink->prepare('UPDATE Users
                                               SET MDP = :password
                                               WHERE EMAIL = :email');
        $request->bindValue(':password', $newpassword , PDO::PARAM_STR);
        $request->bindValue(':email', $email , PDO::PARAM_STR);

    }
}
