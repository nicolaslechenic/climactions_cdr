<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
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
            <h2>Votre recherche</h1>
                <div class="article-container">

                    <?php foreach ($search as $article) {
                        ?>
                    <article>
                        <div>
                            <h2><?=$article['name']?></h2>
                            <img src="<?=$article['image']?>">
                            <p><?= $article['content']; ?></p>
                            <!-- <p><?= $article['theme']; ?></p> -->
                        </div>
                        <a href="index.php?action=article&id=<?=$article['id']?>&type=<?=$article['type_id']?>">Voir l'Article</a>
                    </article>
                    <?php }; ?>
                </div>
        </section>


        <?php else :?>

        <h1>Les Articles</h1>

        <div class="button-group filters-button-group">
            <button class="button is-checked" data-filter="">Toutes les catégories</button>
            
            <!-- TO DO : faire une boucle sur les boutons pour afficher les catégories --> 
            <?php foreach ($types as $type) { ?>
                <button class="button" data-filter=".<?= $type['type']?>"><?= $type['type']?></button>
                <!-- <button class="button" data-filter=".movie">Films</button>
                <button class="button" data-filter=".book">Livres</button> -->
           <?php }?>
        </div>
        <section class="grid">
            <?php foreach ($ressources as $ressource) {?>
            <div >
                <article class="article-container element-item all <?= $ressource['type']?>">
                    <h2 class="title"><?= $ressource['name'] ?></h2>
                    <img src="<?= $ressource['image']?>">
                    <p class="content"><?= $ressource['content'] ?></p>
                    <p class="read-more"><a class="read-more"
                            href="index.php?action=article&id=<?= $ressource['id']?>">Voir l'Article</a></p>
                </article>
            </div>
            <?php } ?>
        </section>
            
        <?php endif ?>

        <footer>

        </footer>
        <script src="Public/scripts/isotope.js"></script>
    </body>
</html>

