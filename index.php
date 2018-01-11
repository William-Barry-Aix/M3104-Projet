<?php
require('controler/frontend.php');
try{
     if (isset($_GET['action'])) {
         if ($_GET['action'] == 'signin') {
             signin();
        }
        if ($_GET['action'] ==  'signUpRegister') {
             signUpRegister();
        }
         if ($_GET['action'] ==  'signup') {
             signup();
         }
     }

     else {
         home();
     }
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}