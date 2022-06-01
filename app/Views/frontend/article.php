<?php 
$title = "Clim' Actions";
$description = "La page affichage d'un article";
require_once './app/Views/frontend/layouts/header.php'; 
ob_start(); ?>

    <article class="container-article">
        <h1 class="title">Titre de l'article</h1>
        <div class="article">

            <figure class="img-size">
                <img src="./Public/img/deplacement-une-affaire-de-choix.jpeg" alt="">
            </figure>

            <!-- faire des conditions -->
            <section class="info">
                <h2 class="title">Informations : </h2>
                <!-- pour les livres -->
                <p class="author">Auteur : </p>
                <p class="editor">Éditeur : </p>
                <p class="public">Public :</p>
                <!-- pour les films -->
                <p class="director">Réalisateur :</p>
                <p class="producer">Producteur :</p>
                <p class="public">Public :</p>
                <!-- pour les jeux -->
                <p class="creator">Créateur :</p>
                <p class="format">Format :</p>
                <!-- pour les flyers -->
                <p class="format">Format :</p>
                <!-- la caution -->
                <p class="format">Caution :</p>
            </section>

            <div class="content">
                <div class="line"></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem facilis,
                    dignissimos ratione
                    a
                    nemo explicabo corporis molestias aut delectus optio tempore est alias adipisci possimus,
                    eligendi
                    id ad
                    numquam perspiciatis.</p>
                <p class="created-at"><strong>Créé le : </strong>18/02/2022</p>
                </div>
            </div>
    </article>
    <a href="#" class="btn">Revenir sur tous les articles</a>
<?php 
require_once './app/Views/frontend/layouts/footer.php'; ?>