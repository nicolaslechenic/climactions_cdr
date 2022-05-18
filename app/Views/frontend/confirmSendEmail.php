<?php
$title = "Mail envoyé !";
$description = "page de confirmation d'envoi de mail";
ob_start();
?>

<section id="section-confirm-mail">

    <h1>Votre mail a été envoyé avec succès ! 👏</h1>

    <a href="index.php">Retourner à la page d'accueil</a>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';