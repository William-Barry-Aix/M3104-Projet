<?php $title = "Translate" ?>
<?php ob_start(); ?>
    <div class="container"
    <form method="post"action="index.php?action=translationQuery">
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
                    <div class="w-100"></div>
                    <div class="col">
                        <label for="exampleFormControlSelect2">Translation ?</label>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <select multiple class="form-control" id="exampleFormControlSelect2">
                            <option>English => French</option>
                            <option>French => English</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><?= _("Translate !") ?></button>
    </form>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');