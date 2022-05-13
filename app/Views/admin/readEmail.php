<?php ob_start(); ?>

<h1>Les emails</h1>

<div class="table">
    <h3 class="table-title">Prénom et Nom</h3>
    <h3 class="table-title">Contenu de l'email</h3>
    <h3 class="table-title">Publié le</h3>
    <h3 class="table-title">Action</h3>
</div>

<!-- TO DO : Faire une boucle pour afficher les emails -->

<div class="table-results">

    <ul class="table-item">
        <li>Ali Gator</li>
        <!-- TO DO : faire une méthode getExcerpt -->
        <li>contenu de l'email</li>
        <li>date de création</li>
        <li>
            <span class="btn"><a href="indexAdmin.php?action=emailAdmin">Revenir</a></span>
            <span class="btn"><a href="#">Supprimer</a></span>
        </li>
    </ul>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>