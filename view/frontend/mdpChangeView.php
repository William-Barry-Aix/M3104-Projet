<?php $title = 'Translator';
?>
<?php ob_start(); ?>
    <p><?= $tradList["A new password has been sent to your email address"] ?></p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');