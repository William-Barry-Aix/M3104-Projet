<?php $title = "Translate" ?>
<?php ob_start(); ?>
    <div class="container"
    <form method="post"action="translation">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <div class="col">
                        <label for="exampleFormControlTextarea1"><?= _("Text to translate"); ?></label>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>

                <div class="offset-2 col">
                    <label for="exampleFormControlTextarea1"><?= _("Text translated"); ?></label>
                    <textarea class = "form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><?= _("Translate !") ?></button>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');