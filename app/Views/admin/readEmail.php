<?php ob_start(); ?>

<h1>Les emails</h1>

<div class="table-read-email">  
    <h3 class="table-title">Contenu de l'email</h3>
</div>

<!-- TO DO : Récupérer l'email grace à son ID -->

<div class="table-results">

    <ul id="read-email">
        <li class="username"><?= $readEmail["firstname"] . " " . $readEmail["lastname"] ?></li>
        <li><?= $readEmail["object"]?></li>
        <li><?= $readEmail["message"]?></li>
        <li><strong><?= $readEmail["date"]?></strong></li>
        <li>
            <span class="btn"><a href="indexAdmin.php?action=emailAdmin">Revenir</a></span>
            <!-- TO DO : faire une méthode delete() -->
            <span class="btn"><a href="#">Supprimer</a></span>
        </li>

    </ul>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>