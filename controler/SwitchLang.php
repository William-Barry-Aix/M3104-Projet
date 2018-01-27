<?php
class SwitchLang
{
    public function __construct()
    {
    }

    public function swap(){
        session_start();
        if(isset($_GET['lang'])){
            $_SESSION['lang'] = $_GET['lang'];
        }
    }
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