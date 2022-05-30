<?php ob_start(); ?>

<h1>Bienvenue</h1>


<div class="table">
    <h3 class="table-title">Prénom</h3>
    <h3 class="table-title">email</h3>
    <h3 class="table-title">Rôle</h3>
    <h3 class="table-title">Action</h3>
</div>

<?php foreach($listAdmin as $admin) : ?>

<div class="table-results">

    <ul class="table-item2">
        <li><?= $admin['firstname'] ?></li>
        <li><?= $admin['email'] ?></li>
        <li><?= $admin['role'] ?></li>
        <li>
            <span class="btn"><a href="indexAdmin.php?action=readAdmin&id=<?= $admin['id'] ?>">Voir</a></span>
            <?php if(isset($admin['role']) && ($admin['role'] == "Administrateur")) : ?>
            <span class="btn"><a href="indexAdmin.php?action=deleteAdmin&id=<?= $admin['id'] ?>">Supprimer</a></span>
            <?php else : ?>
                <?php endif; ?>
        </li>
    </ul>
</div>

<?php endforeach ?>

<div>
    <a class="btn" href="indexAdmin.php?action=pageCreationAdmin">Créer</a>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/dashboard.php'; ?>