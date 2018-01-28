<?php $title = 'Translator';
$meta = "Page de d'accueil";
?>
<?php $welcome = "";
if (isset($_SESSION['nom']))
{
    $welcome = '<h1>Welcome ' . $_SESSION['nom']. '</h1>';
}?>
<?php ob_start(); ?>
    <section id="description">
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid intro my-0 py-1 text-center">
                <div class="container">
                    <h1 class="display-4"><?= $tradList["Translation website"] ?></h1>
                    <p class="lead"><?= $tradList["Here you can translate everything you need thanks to other members"] ?></p>
                </div>
            </div>
        <?= $welcome ?>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
