<?php
require('controler/frontend.php');
try{
     if (isset($_GET['action'])) {
         if ($_GET['action'] == 'signin') {
             signIn();
        }
         if ($_GET['action'] ==  'signinfinish') {
             signInFinish();
         }
        if ($_GET['action'] ==  'signUpRegister') {
             signUpRegister();
        }
         if ($_GET['action'] ==  'signup') {
             signUp();
         }
         if ($_GET['action'] ==  'deconnexion') {
             signUp();
         }

     }

     else {
         home();
     }
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}