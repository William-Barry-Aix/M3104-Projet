<?php $title = "Sign in" ?>
<?php ob_start(); ?>
    <div class="container justify-content-center" >
        <form method="post"action="index.php?action=signinfinish" class="col-6 my-10 mx-auto" style="margin-top: 25%">
            <div class="row">
                <div class="form-group d-block">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php?action=reinitMdp" class="btn btn-info" role="button">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');


