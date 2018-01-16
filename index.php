<?php
include 'controler/Home.php';
include 'controler/compte.php';
include 'controler/deconnexion.php';
include 'controler/gestionSite.php';
include 'controler/signIn.php';
include 'controler/signInFinsh.php';
include 'controler/signUp.php';
include 'controler/translation.php';
include 'controler/mdpChange.php';

try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'signin') {
            $signin = new signin();
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
        }
        if ($_GET['action'] ==  'gererSite') {
            $GestionSite = new gestionSite();
        }
        if ($_GET['action'] ==  'translation') {
            $translation = new translation();
        }
        if ($_GET['action'] ==  'passwordChange') {
            $mdpChange = new mdpChange();
        }
        if ($_GET['action'] ==  'reinitMdp') {
            $reinitMdp = new reinitMdp();
        }
        if ($_GET['action'] ==  'goToFormReinit') {
            $goToFormReinit = new goToFormReinit();
        }

    }else {
        $home = new Home();
    }
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}