<?php $title = SignUp;
?>
<?php ob_start(); ?>
    <form method="post" action="index.php?action=reinitMdp" method="post">
        Email<input type="text" name="email"/><br/>
        <input type="submit" name="Envoyer" value="register"/><br/>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');