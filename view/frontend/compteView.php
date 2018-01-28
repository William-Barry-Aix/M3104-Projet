<?php $title = 'Translator';
?>
<?php ob_start(); ?>

<?php if ($_SESSION['changeMdpError'] == 'true'){
    ?> <p>Ancien mot de passe incorect ou verification du nouveau mot de passe incorrect</p> <?php
    $_SESSION['changeMdpError'] = 'false';
}

    ?>
    <p>Changer de mot de passe :</p>
    <form action="index.php?action=passwordChange" method="post">
        Mot de passe<input type="password" name="mdp"/><br/>
        Nouveau mot de passe<input type="password" name="newMdp"/><br/>
        Verifier le mdp<input type="password" name="verifNewMdp"/><br/>
        <div class="row">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-info" role="button">Enregistrer</a>
        </div>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');