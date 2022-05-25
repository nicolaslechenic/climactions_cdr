<?php ob_start(); ?>

<h1>Carnet d'adresses</h1>

<div class="table">
    <h3 class="table-title">Prénom et Nom</h3>
    <h3 class="table-title">Email</h3>
    <h3 class="table-title">Numéro de téléphone</h3>
    <h3 class="table-title">Action</h3>
</div>

<div class="table-results">
<?php foreach ($infos as $info) { ?> 
    <ul class="table-item">
        <li><?= $info["firstname"] . " " . $info["lastname"] ?></li>
        <li><?= $info["email"]?></li>
        <li><?= $info["phone"]?></li>
        <li>
            <span class="btn"><a class="delete" href="indexAdmin.php?action=deleteInfo&id=<?= $info['id'] ?>">Supprimer</a></span>
        </li>
    </ul> 
<?php }; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>