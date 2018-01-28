<?php $title = SignUp;
$meta = "Page de création de comtpe";
?>
<?php ob_start(); ?>
    <form method="post" action="index.php?action=reinitMdp" method="post">
        <?= $tradList["Email"] ?><input type="text" name="emailreinit"/><br/>
        <input type="submit" name="Envoyer" value="register"/><br/>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');