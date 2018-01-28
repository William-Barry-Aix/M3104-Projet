<?php $title = 'Translator';
$meta = "Page de gestion des utilisateurs";?>
<?php ob_start(); ?>
    <section id="description">
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid intro my-0 py-1 text-center">
                <div class="container">
                    <h1 class="display-4"><?= $tradList["Manage Users"] ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section id="users">
        <div class="container-fluid py-2">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><?= $tradList["Type"] ?></th>
                    <th scope="col"><?= $tradList["Name"] ?></th>
                    <th scope="col"><?= $tradList["First name"] ?></th>
                    <th scope="col-3"><?= $tradList["Mail"] ?></th>
                    <th scope="col"><?= $tradList["Phone"] ?></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $row = '';
                foreach ($users as $user){?>
                    <form method="post"action="index.php?action=modifyUser">
                        <tr>
                            <th scope="row">
                                <select class="form-control" id="type" name="typeC">
                                    <option value="0" <?php if($user['TYPECOMPTE'] == 0) echo 'selected' ?>><?= $tradList["Normal account"] ?></option>
                                    <option value="1" <?php if($user['TYPECOMPTE'] == 1) echo 'selected' ?>><?= $tradList["Premium account"] ?></option>
                                    <option value="2" <?php if($user['TYPECOMPTE'] == 2) echo 'selected' ?>><?= $tradList["Admin account"] ?></option>
                                    <option value="3" <?php if($user['TYPECOMPTE'] == 3) echo 'selected' ?>><?= $tradList["Translator account"] ?></option>
                                </select>
                            </th>
                            <th scope="row"><?= $user['NOM'] ?></th>
                            <th scope="row"><?= $user['PRENOM'] ?></th>
                            <th scope="row"><?= $user['EMAIL'] ?></th>
                            <th scope="row"><?= $user['TELEPHONE'] ?></th>
                            <th scope="row">
                                <button type="submit" class="btn btn-primary" name="delete" value="<?= $user['ID']?>"><?= $tradList["Delete"] ?></button>
                                <button type="submit" class="btn btn-primary" name="modify" value="<?= $user['ID']?>"><?= $tradList["Modify permission"] ?></button>
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