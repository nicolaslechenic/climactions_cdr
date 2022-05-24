<?php
$title = "Clim' Actions";
$description = "La page d'accueil";
ob_start(); ?>

<section id="bar-search" class="container">
    <?php
    include_once "layouts/searchbar.php";
    ?>
    <?php
    if (isset($search) && !empty($search) && isset($_GET['search'])) :
    ?>

        <section>
            <h2>Votre recherche</h2>
            <div class="article-container" id="search">
                <?php foreach ($search as $article) {?>
                    <article class="article-container element-item  <?= $article['type'] ?>">
                        <div class="cadre_image">
                            <img src="<?= $article['image'] ?>">
                        </div>
                        <div class="date"><p><?=$article['date']?></p></div>
                        <h2 class="title"><?= $article['name'] ?></h2>
                        <div class="read-more"><a class="read-more" href="index.php?action=article&id=<?= $article['id'] ?>">Voir l'Article</a></div>
                    </article>
                <?php } ?>
            </div>
        </section>


    <?php else : ?>

        
    <h1 id="ressources_title" class="container">Les Articles</h1>
        <div class="button-group filters-button-group">
            <button class="button is-checked" data-filter="">Toutes les catégories</button>
            <?php foreach ($types as $type) { ?>
                <button class="button" data-filter=".<?= $type['type'] ?>"><?= $type['type'] ?></button>
            <?php } ?>
        </div>
        <section class="grid">
            <?php foreach ($ressources as $ressource) { ?>
                    <article class="article-container element-item all <?= $ressource['type'] ?>">
                        <div class="cadre_image">
                            <img src="<?= $ressource['image'] ?>">
                        </div>
                        <div class="date"><p><?=$ressource['date']?></p></div>
                        <h2 class="title"><?= $ressource['name'] ?></h2>
                        <div class="read-more"><a class="read-more" href="index.php?action=article&id=<?= $ressource['id'] ?>">Voir l'Article</a></div>
                    </article>
                </div>
            <?php } ?>
        </section>
    <?php endif ?>
</section>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="Public/scripts/isotope.js"></script>
<?php $content = ob_get_clean();
require "layouts/template.php";
