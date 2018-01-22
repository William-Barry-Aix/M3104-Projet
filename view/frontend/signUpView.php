
<?php $title = 'SignUp' ?>
<?php
if (isset($_SESSION['mdpErreur'])){
    if ($_SESSION['mdpErreur']){
        echo('<p>Mot de passe different<p>');
        $_SESSION['mdpErreur']=false;
    }
}

if (isset($_SESSION['champsVide']) && $_SESSION['champsVide']){
    echo('<p>Veuillez remplir tout les champs<p>');
    $_SESSION['champsVide']=false;
}
ob_start();?>

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

