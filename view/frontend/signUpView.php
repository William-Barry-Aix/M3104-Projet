<?php $title = 'SignUp' ;
$meta = "Page de création de compte";
?>
<?php
if (isset($_SESSION['mdpErreur'])){
    if ($_SESSION['mdpErreur'] == 'true'){
        echo('<p>'. $tradList["A summary email of your account has been sent"].'<p>');
        $_SESSION = array();
        }
    }
ob_start();?>

<form action="index.php?action=signUpRegister" method="post">
    <?= $tradList["Name"] ?><input type="text" name="nom"/><br/>
    <?= $tradList["First name"] ?><input type="text" name="prenom"/><br/>
    <?= $tradList["E-Mail"] ?><input type="text" name="e_mail"/><br/>
    <?= $tradList["Phone"] ?><input type="number" name="tel"/><br/>
    <?= $tradList["Password"] ?><input type="password" name="mdp"/><br/>
    <?= $tradList["Check the password"] ?><input type="password" name="verifMdp"/><br/>
    <input type="submit" name="Envoyer" value="register"/><br/>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');

