<?php $title = 'Translator'; ?>
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
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
