<?php $title = 'Translator';
?>
<?php ob_start(); ?>

<?php if ($_SESSION['changeMdpError'] == 'true'){
    ?> <p><?= $tradList["Incorrect old password or incorrect new password verification"] ?></p> <?php
    $_SESSION['changeMdpError'] = 'false';
}

    ?>
    <p>Changer de mot de passe :</p>
    <form action="index.php?action=passwordChange" method="post">
        <?= $tradList["Password"] ?><input type="password" name="mdp"/><br/>
        <?= $tradList["New password"] ?>Nouveau mot de passe<input type="password" name="newMdp"/><br/>
        <?= $tradList["Check the password"] ?><input type="password" name="verifNewMdp"/><br/>
        <div class="row">
            <button type="submit" class="btn btn-primary"><?= $tradList["Submit"] ?>Submit</button>
            <a class="btn btn-info" role="button"><?= $tradList["Save"] ?></a>
        </div>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');