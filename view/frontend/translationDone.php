<?php $title = "Translation Done"?>
<?php ob_start();?>

    <?php
    $textTranslated = $_SESSION["textTranslated"];
    if(!$textTranslated) {
    echo "Aucune traduction n'a été trouvée. Voulez vous en demandez une ? </br>";
    echo '
        <form method="post" action="index.php?action=askTrans">
             <button type="submit" class="btn btn-primary">Demander la traduction de "' . $_SESSION["textToTranslate"] . '"</button>
        </form>
    ';

    }else {
        echo "La traduction est : $textTranslated";
        unset($_SESSION["textTranslated"]);
        unset($_SESSION["textToTranslate"]);
        unset($_SESSION["to"]);
        unset($_SESSION["from"]);
    }?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
