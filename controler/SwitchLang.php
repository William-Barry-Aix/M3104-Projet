<?php
class SwitchLang
{
    public function __construct()
    {
    }
    // changement de langue
    public function swap(){
        session_start();
        if(isset($_GET['lang'])){
            $_SESSION['lang'] = $_GET['lang'];
        }
    }

    // renvoie sur la page precedente pour la metre a jour
    public function back(){
        if(isset($_GET['before'])){
            if ($_GET['before'] != ''){
                header("Location: index.php?action=".$_GET['before']);
                echo $_SESSION['lang'];
            }else{
                echo $_SESSION['lang'];
                header('Location: index.php');
            }

        }
    }
}