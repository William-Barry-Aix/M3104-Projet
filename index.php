<?php
session_start();


include_once 'controler/Home.php';
include_once 'controler/Compte.php';
include_once 'controler/Deconnexion.php';
include_once 'controler/GestionSite.php';
include_once 'controler/SignIn.php';
include_once 'controler/SignInFinsh.php';
include_once 'controler/SignUp.php';
include_once 'controler/Translation.php';
include_once 'controler/MdpChange.php';
include_once 'controler/GoToFormReinit.php';
include_once 'controler/ReinitMdp.php';
include_once 'controler/SwitchLang.php';
include_once 'controler/ManageUsers.php';
include_once 'model/TranslationManage.php';

try{
     if (isset($_GET['action'])) {
         if ($_GET['action'] == 'SignIn') {
             $signin = new SignIn();
             $signin->show();
         }
         if ($_GET['action'] ==  'signinfinish') {
             $signinFinish = new SignInFinsh();
             $signinFinish->signInFinish();
         }
        if ($_GET['action'] ==  'signUpRegister') {
             $signup = new SignUp();
             $signup->signUpRegister();
        }
         if ($_GET['action'] == 'SignUp') {
             $signup = new SignUp();
             $signup->signUp();
         }
         if ($_GET['action'] == 'Deconnexion') {
             $deconnexion = new Deconnexion();
             $deconnexion->disconect();
         }
         if ($_GET['action'] == 'Compte') {
             $compte = new Compte();
             $compte->show();
         }
         if ($_GET['action'] ==  'gererSite') {
             $gestionSite = new GestionSite();
             $gestionSite->show();
         }
         if ($_GET['action'] == 'Translation') {
             $translation = new Translation();
             $translation->show();
         }
         if ($_GET['action'] ==  'passwordChange') {
             $mdpChange = new MdpChange();
             $mdpChange->mdpChange();
         }
         if ($_GET['action'] == 'ReinitMdp') {
             $reinitMdp = new ReinitMdp();
             $reinitMdp->reinitMdp();
         }
         if ($_GET['action'] ==  'goToFormReinit') {
             $goToFormReinit = new goToFormReinit();
         }
         if ($_GET['action'] == 'translationQuery') {
             $onGoingTranslation = new Translation();
             if (isset($_POST['translate'])) {
                 $onGoingTranslation->translate();
             }elseif (isset($_POST['suggest'])) {
                 $onGoingTranslation->suggest();
             }
         }
         if ($_GET['action'] == 'swap'){
             $swap = new SwitchLang();
             $swap->swap();
             $swap->back();
         }
         if ($_GET['action'] == 'manageUsers'){
             $manage = new ManageUsers();
             $manage->show();
         }
     }else {
         $home = new Home();
         $home->show();
     }
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}