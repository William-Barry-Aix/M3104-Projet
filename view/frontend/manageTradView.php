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
            for ($ligne = 0; $ligne < sizeof($list); ++$ligne) {
                echo '
                    <form class="form-inline" method="post" action="index.php?action=manage">
                        <div class="form-group mb-2">
                            <input type="text" readonly class="form-control" name="FROM" value="' . $list[$ligne][0] . '">
                         </div>
                        <div class="form-group mx-sm-3 mb-2">
                             <input type="text" readonly class="form-control" name="TEXT_TO_TRANSLATE" value="' . $list[$ligne][1] . '">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                             <input type="text" readonly class="form-control" name="TO" value="' . $list[$ligne][2] . '">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                             <input type="text"  class="form-control" name="TEXT_TRANSLATED" placeholder="Your Translation">
                        </div>
                        <button type="submit" name="addTranslation" value="true" class="btn btn-primary mb-2">Add !</button>
                    </form>
                ';
            }
            ?>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');
