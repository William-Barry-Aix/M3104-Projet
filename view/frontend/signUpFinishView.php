<?php $title = SignUp;
?>
<?php ob_start(); ?>
    <h1>Merci pour votre souscription !</h1>
    <p>Un mail recapitulatif de votre compte a été envoyé</p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
