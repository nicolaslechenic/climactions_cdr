<?php ob_start(); ?>

<h1>Votre compte</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>