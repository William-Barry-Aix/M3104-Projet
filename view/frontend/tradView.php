<?php $title = "Translate" ;
$meta = "Page de tradcution";?>
<?php ob_start(); ?>
    <section id="description">
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid intro my-0 mb-3 py-1 text-center">
                <div class="container">
                    <h1 class="display-4">Translation</h1>
                    <p class="lead">Here you can translate everything you need thanks to other members</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <form method="post" action="index.php?action=translationQuery">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6 col-ms-12 pb-2">
                        <select class="form-control form-control-sm w-25" id="lang1" name="lang1">
                            <option value="US">US</option> //mettre value
                            <option value="FR">FR</option>
                        </select>
                        <textarea class="form-control w-100" id="original" rows="3" name="original"><?= $trad['text1']?></textarea>

                    </div>

                    <div class="col-lg-6 col-ms-12 pb-2">
                        <select class="form-control form-control-sm w-25" id="lang2" name="lang2">
                            <option value="US">US</option> //mettre value
                            <option value="FR">FR</option>
                        </select>

                            <textarea class="form-control w-100" id="original" rows="3" name="translated" readonly><?= $trad['text2']?></textarea>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="translate" value="true"><?= _("Translate !") ?></button>
                <?php if(!$readable):?>
                <button type="submit" class="btn btn-primary float-right" name="suggest" value="true"><?= _("Make request") ?></button>
                <?php endif; ?>
            </div>
        </form>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');