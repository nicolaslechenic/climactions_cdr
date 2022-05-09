<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <title>Page des Articles</title>
</head>
<body>
    


<h1>article exemple pagination</h1>

<section id="bar-search">
<?php
    include_once "layouts/searchbar.php";
    ?>
    <?php 
        if (isset($search) && !empty($search) && isset($_GET['search'])) :
    ?>

<section>
    <h1>Votre recherche</h1>
    <div class="article-container">
       
        <?php foreach ($search as $article){
        ?>
        <article>
            <div>
                <h2><?= $article['title']; ?></h2>
                <p><?= $article['content']; ?></p>
                <!-- <p><?= $article['theme']; ?></p> -->
            </div>
            <a href="index.php?action=article&id=<?= $article['id']; ?>">Voir l'Article</a>
        </article>
        <?php }; ?>
    </div>
</section>


<?php
else :
?>
<section>
    <h1>Les Articles</h1>
    <div class="article-container">
       
        <?php foreach ($articles as $article){
        ?>
        <article>
            <div>
                <h2><?= $article['title']; ?></h2>
                <p><?= $article['content']; ?></p>
                <!-- <p><?= $article['theme']; ?></p> -->
            </div>
            <a href="index.php?action=article&id=<?= $article['id']; ?>">Voir l'Article</a>
        </article>
        <?php }; ?>
    </div>
</section>
</section>



<nav id="nav-pagination">
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "hidden" : "" ?>">
            <a href="index.php?action=pageArticle&page=<?= htmlspecialchars($currentPage - 1) ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
            <a href="index.php?action=pageArticle&page=<?= $page ?>" class="page-link"><?= $page ?></a>
        </li>
        <?php endfor ?>
        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <li class="page-item <?= ($currentPage == $pages) ? "hidden" : "" ?>">
            <a href="index.php?action=pageArticle&page=<?= htmlspecialchars($currentPage + 1) ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
<?php
endif
?>

<footer>

</footer>
</body>
</html>