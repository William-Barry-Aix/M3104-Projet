<?php $title = 'Translator' ?>
<?php ob_start(); ?>
    <section id="description">
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid intro my-0 py-1 text-center">
                <div class="container">
                    <h1 class="display-4">Traduction website</h1>
                    <p class="lead">Here you can translate everything you need thanks to other members</p>
                </div>
            </div>
        </div>
    </section>
    <section id="users">
        <div class="container-fluid py-2">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col-3">Mail</th>
                    <th scope="col">Tel</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $row = '';
                foreach ($users as $user){?>
                    <form>
                        <tr>
                            <th scope="row">
                                <select class="form-control" id="type">
                                    <option value="1" <?php if($user['TYPECOMPTE'] == 1) echo 'selected' ?>>1</option>
                                    <option value="2" <?php if($user['TYPECOMPTE'] == 2) echo 'selected' ?>>2</option>
                                    <option value="3" <?php if($user['TYPECOMPTE'] == 3) echo 'selected' ?>>3</option>
                                </select>
                            </th>
                            <th scope="row"><?= $user['NOM'] ?></th>
                            <th scope="row"><?= $user['PRENOM'] ?></th>
                            <th scope="row"><?= $user['EMAIL'] ?></th>
                            <th scope="row"><?= $user['TELEPHONE'] ?></th>
                            <th scope="row">
                                <button type="submit" class="btn btn-primary" name="modify" value="<?= $user['ID']?>">Modify permission</button>
                                <button type="submit" class="btn btn-primary" name="delete" action="" value="<?= $user['ID']?>">Delete</button>
                            </th>
                        </tr>
                    </form>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');