<?php $title = "Translate" ?>
<?php ob_start(); ?>
    <div class="container"
    <form method="post"action="translation">
        <div class="form-group">
            <div class="row">
                <div class="col-5">
                    <label for="exampleFormControlTextarea1"><?= _("Text to translate"); ?></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>
                <div class="col-2">
                </div>
                <div class="col-5">
                    <label for="exampleFormControlTextarea1"><?= _("Text translated"); ?></label>
                    <textarea class = "form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');