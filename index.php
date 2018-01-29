<?php
session_start();


include_once 'controler/Home.php';
include_once 'controler/Compte.php';
include_once 'controler/Deconnexion.php';
include_once 'controler/SignIn.php';
include_once 'controler/SignInFinsh.php';
include_once 'controler/SignUp.php';
include_once 'controler/Translation.php';
include_once 'controler/MdpChange.php';
include_once 'controler/GoToFormReinit.php';
include_once 'controler/ModifyUser.php';
include_once 'controler/ReinitMdp.php';
include_once 'controler/SwitchLang.php';
include_once 'controler/ManageUsers.php';
include_once 'model/TranslationManage.php';
include_once 'controler/translationManager.php';
include_once 'controler/VisuDemande.php';
include_once 'controler/LoadTrad.php';


try{
    $_SESSIONtradList = new LoadTrad();
    $_SESSIONtradList = $_SESSIONtradList->loadTradsSession();
     if (isset($_GET['action'])) {
         if ($_GET['action'] == 'signin') {
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
         if ($_GET['action'] == 'signup') {
             $signup = new SignUp();
             $signup->signUp();
         }
         if ($_GET['action'] == 'deconnexion') {
             $deconnexion = new Deconnexion();
             $deconnexion->disconect();
         }
         if ($_GET['action'] == 'compte') {
             $compte = new Compte();
             $compte->show();
         }
         if ($_GET['action'] == 'translation') {
             $translation = new Translation();
             $translation->show();
         }
         if ($_GET['action'] ==  'passwordChange') {
             $mdpChange = new MdpChange();
             $mdpChange->mdpChange();
         }
         if ($_GET['action'] == 'reinitMdp') {
             $reinitMdp = new ReinitMdp();
             $reinitMdp->reinitMdp();
         }
         if ($_GET['action'] ==  'goToFormReinit') {
             $goToFormReinit = new GoToFormReinit();
             $goToFormReinit->goToFormReinit();
         }
         if ($_GET['action'] == 'modifyUser') {
             $delUser = new ModifyUser();
             $delUser->modifyUser();
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
         if($_GET['action'] == 'manageTranslations') {
             $manager = new translationManager();
             $manager->show();
         }
         if($_GET['action'] == 'manage') {
             $translationRequest = new translationManager();
             if (isset($_POST['addTranslation'])) {
                 $translationRequest->addTranslationRequest();
             }
         }
         if ($_GET['action'] == 'manageUsers'){
             $manage = new ManageUsers();
             $manage->show();
         }
         if($_GET['action'] == 'visuDemandes') {
             $visuDemande = new VisuDemande();
             $visuDemande->show();
         }
     }else {
         $home = new Home();
         $home->show();
     }
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}