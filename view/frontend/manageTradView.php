<?php $title = "Translate";
$meta = "Page de gestion de demande de tracduction";
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
            foreach ($list as $request){?>
            <form class="form-inline" method="post" action="index.php?action=manage">
                <div class="form-group mb-2">
                    <input type="text" readonly class="form-control" name="FROM" value="<?=$request['SOURCE_LANGUAGE']?>">
                 </div>
                <div class="form-group mx-sm-3 mb-2">
                     <input type="text" readonly class="form-control" name="TEXT_TO_TRANSLATE" value="<?=$request['TEXT']?>">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                     <input type="text" readonly class="form-control" name="TO" value="<?=$request['TRANSLATED_LANGUAGE']?>">
                </div>
                <?php if($request['STATUS'] == 'WAITING'):?>
                <div class="form-group mx-sm-3 mb-2">
                     <input type="text"  class="form-control" name="TEXT_TRANSLATED" placeholder="Your Translation">
                </div>
                <button type="submit" name="addTranslation" value="true" class="btn btn-primary mb-2">Add !</button>
                <button type="submit" name="deleteTranslation" value="true" class="btn btn-primary mb-2">Delete this</button>
                <?php endif; ?>
            </form>
            <?php }
            ?>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');
