<?php ob_start(); ?>

<h1>Les emails</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>