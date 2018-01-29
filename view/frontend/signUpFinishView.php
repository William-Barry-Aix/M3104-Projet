<?php $title = SignUp;
$meta = "Page de confirmation d'incription";
?>
<?php ob_start(); ?>
    <h1><?= $_SESSION['tradList']["Thank you for your subscription!"] ?></h1>
    <p><?= $_SESSION['tradList']["A summary email of your account has been sent"] ?></p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
