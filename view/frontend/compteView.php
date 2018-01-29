<?php $title = 'Translator';
$meta = "Page de gestion de compte";
?>
<?php ob_start(); ?>

<?php
if (isset($_SESSION['changeMdpError'])) {
    if ($_SESSION['changeMdpError'] == 'true') {
        ?> <p><?= $_SESSION['tradList']["Incorrect old password or incorrect new password verification"] ?></p> <?php
        $_SESSION['changeMdpError'] = 'false';
    }
}

    ?>
    <p><?= $_SESSION['tradList']["Change mdp"] ?></p>
    <form action="index.php?action=passwordChange" method="post">
        <?= $_SESSION['tradList']["Password"] ?><input type="password" name="mdp"/><br/>
        <?= $_SESSION['tradList']["New password"] ?><input type="password" name="newMdp"/><br/>
        <?= $_SESSION['tradList']["Check the password"] ?><input type="password" name="verifNewMdp"/><br/>
        <div class="row">
            <button type="submit" class="btn btn-primary"><?= $_SESSION['tradList']["Submit"] ?></button>

        </div>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');