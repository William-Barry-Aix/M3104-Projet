<?php $title = 'Translator';
?>
<?php ob_start(); ?>
    <p>Un nouveau mot de passe a été envoyé à votre adresse mail</p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');