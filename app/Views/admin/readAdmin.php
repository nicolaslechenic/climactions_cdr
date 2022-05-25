<?php ob_start(); ?>

<h1><?= $admin['firstname'] ." ". $admin['lastname'] ?></h1>

<div class="table">
    <h3 class="table-title">Prénom</h3>
    <h3 class="table-title">email</h3>
    <h3 class="table-title">Rôle</h3>
    <h3 class="table-title">Action</h3>
</div>

<!-- TO DO : Récupérer l'email grace à son ID -->

<div class="table-results">


    <ul id="table-item2">
        <li class="username"><?= $admin['firstname'] ?></li>
        <!-- TO DO : faire une méthode getExcerpt -->
        <li><?= $admin['email'] ?></li>
        <li><?= $admin['role'] ?></li>
        <li>
            <span class="btn"><a href="indexAdmin.php?action=homeAdmin">Revenir</a></span>
            <?php if(isset($admin['role']) && ($admin['role'] == "Administrateur")) : ?>
            <span class="btn"><a href="indexAdmin.php?action=deleteAdmin&id=<?= $admin['id'] ?>">Supprimer</a></span>
            <?php else : ?>
                <?php endif; ?>
        </li>

    </ul>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>