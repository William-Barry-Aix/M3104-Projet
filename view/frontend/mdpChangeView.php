<?php $title = 'Translator';
$meta = "Page de confirmation de réinitialisation de mot de passe";
?>
<?php ob_start(); ?>
    <p><?= $_SESSION['tradList']["A new password has been sent to your email address"] ?></p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');