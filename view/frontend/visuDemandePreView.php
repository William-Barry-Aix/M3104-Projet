<?php $title = "Translate" ;
$meta = "Page de visualisation des demandes des utilisateurs premium";
?>
<?php ob_start(); ?>

    <section id="description">
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid intro my-0 mb-3 py-1 text-center">
                <div class="container">
                    <h1 class="display-4">Translation requests </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="form-group">
            <?php
            foreach ($list as $request) { ?>
                        <div class="form-group mb-2">
                            <?= $request['STATUS'] ?>

                            <?= $request['LANGUAGE'] ?>

                            <?= $request['TEXT'] ?>
                        </div>
            <?php }
            ?>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');