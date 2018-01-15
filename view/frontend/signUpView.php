
<?php $title = SignUp ?>
<?php ob_start();
if ($_SESSION['mdpErreur'] == 'true'){
    ?><p>Mot de passe different<p>
    <?php
    $_SESSION = array();
}
?>

<form action="index.php?action=signUpRegister" method="post">
    Nom<input type="text" name="nom"/><br/>
    Prenom<input type="text" name="prenom"/><br/>
    E-Mail<input type="text" name="e_mail"/><br/>
    Telephone<input type="number" name="tel"/><br/>
    Mot de passe<input type="password" name="mdp"/><br/>
    Verifier le mdp<input type="password" name="verifMdp"/><br/>
    <input type="submit" name="Envoyer" value="register"/><br/>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');

