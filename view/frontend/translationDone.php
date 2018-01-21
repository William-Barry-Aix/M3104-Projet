<?php $title = "Translation Done"?>
<?php ob_start(); ?>

<p> La traduction est : <?= $_SESSION["textTranslated"]?></p>


<?php $content = ob_get_clean(); ?>
<?php require('template.php');
