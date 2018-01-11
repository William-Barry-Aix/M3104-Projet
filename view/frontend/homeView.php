<?php $title = 'Translator'; ?>
<?php ob_start(); ?>
    <section id="description">
        <h1>Translator</h1>
        <p>Here is our translator website</p>
    </section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
