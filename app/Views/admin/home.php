<?php ob_start(); ?>

<h1>Bienvenue</h1>

<h2>Liste des administrateurs :</h2>

<?php foreach($listAdmin as $admin) : ?>


<?php endforeach ?>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>