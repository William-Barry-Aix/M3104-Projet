<?php
require('controler/frontend.php');
try{
    home();
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}