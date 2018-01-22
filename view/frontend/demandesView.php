
<?php ob_start(); ?>
        <div class="container-fluid" action="">
                <div class="container">
                    <h1 class="display-4">Traduction website</h1>
                    <p class="lead">Here you can translate everything you need thanks to other members</p>
                </div>
            </div>
            <?= $welcome ?>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
