<?php
try{
     if (isset($_GET['action'])) {
         if ($_GET['action'] == 'signin') {
             $signin = new signin();
             $signin->signIn();
        }
         if ($_GET['action'] ==  'signinfinish') {
             $signinFinish = new signInFinsh();
             $signinFinish->signInFinish();
         }
        if ($_GET['action'] ==  'signUpRegister') {
             $signup = new signUp();
             $signup->signUpRegister();
        }
         if ($_GET['action'] ==  'signup') {
             $signup = new signUp();
             $signup->signUp();
         }
         if ($_GET['action'] ==  'deconnexion') {
             $deconnexion = new deconnexion();
             $deconnexion->disconect();
         }
         if ($_GET['action'] ==  'compte') {
             $compte = new compte();
             $compte->compte();
         }
         if ($_GET['action'] ==  'gererSite') {
             $GestionSite = new gestionSite();
             $GestionSite->gestionSite();
         }
         if ($_GET['action'] ==  'translation') {
             $GestionSite = new gestionSite();
             $GestionSite->gestionSite();
         }
         if ($_GET['action'] == 'translation') {
             translation();
         }

     }

     else {
         home();
     }
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}