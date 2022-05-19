<?php 
$title = "Clim' Actions";
ob_start(); ?>


<main id="contenu">
    <h1>
        Votre centre de ressources
    </h1>

    <section id="articles">
        <div class="container">
            <h2>Nos nouveautés <img src="./Public/img/feuille-articles.svg" alt="image-feuille"> </h2>

<!-- affichage des 3 derniers articles (titre et genre) -->
<?php foreach ($lastArticles as $article) { ?> 
    <article id="article">
    <h3 title="<?= $article['name'] ?>"><?= $article['name'] ?></h3>
    <img src="<?= $article['image'] ?>" alt="Déplacement une affaire de choix">
    <a href="index.php?action=article&id=<?= $article['id'] ?>" class="bouton-article">En voir plus</a>
    </article>
<?php } ?>

        <a href="#" id="bouton-ressources">Découvrir les autres ressources</a>
        </div>
    </section>

    <section id="agenda">
        <div class="container">
            <h2>Agenda <img src="./Public/img/feuille-agenda.svg" alt="image-feuille"></h2>
            <div class="slider">
                <div class="evenement active">
                    <img src="./Public/img/icon-facebook.svg" alt="Déplacement une affaire de choix">
                    <p>1</p>
                </div>
                <div class="evenement">
                    <img src="./Public/img/icon-twitter.svg" alt="">
                    <p>2</p>
                </div>
                <div class="evenement">
                <img src="./Public/img/icon-linkedin.svg">
                <p>3</p>
                </div>
            </div>

            <div class="cont-btn">
                <div class="btn-nav left"> <p><</p> </div>
                <div class="btn-nav right"> <p>></p> </div>
            </div>
        </div>
    </section>
</main>

<?php $content = ob_get_clean();
require "layouts/template.php";