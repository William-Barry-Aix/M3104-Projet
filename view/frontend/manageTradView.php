<?php $title = "Translate" ?>
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
            for($ligne = 0; $ligne < sizeof($list); $ligne++) {
                echo '
                    <div class = row>
                         <form method="post" action="index.php?action=manage">
                            <div class="col">
                                <label>Source language : </label>
                                <input type="text" readonly class="form-control-plaintext" id="SOURCE_LANGUAGE" value="' . $list[$ligne][0] . '">
                            </div>
                            <div class="col">
                                <input type="text" readonly class="form-control-plaintext" id="TEXT_TO_TRANSLATE" value="' . $list[$ligne][1] . '">
                            </div>
                            <div class = col>
                                <input type="text" readonly class="form-control-plaintext" id="LANGUAGE_TRANSLATED" value="' . $list[$ligne][2] . '">
                            </div>
                            <div class="col">
                                 <input type="email" class="form-control" id="TEXT_TRANSLATED" placeholder="Your Translation">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" name="addTranslation" value="true">Add !</button>
                            </div>
                         </form>
                ';
            }
        ?>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');
