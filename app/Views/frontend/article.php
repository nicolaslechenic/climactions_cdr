<?php 
require_once './app/Views/frontend/layouts/header.php'; ?>

<main class="container container-article">

    <article>

        <h1 class="title">Titre de l'article</h1>

        <div class="article">

            <figure class="img-size">
                <img src="./Public/img/deplacement-une-affaire-de-choix.jpeg" alt="">
            </figure>

            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem facilis,
                    dignissimos ratione
                    a
                    nemo explicabo corporis molestias aut delectus optio tempore est alias adipisci possimus,
                    eligendi
                    id ad
                    numquam perspiciatis.</p>
                <p class="created-at"><strong>Créé le : </strong>18/02/2022</p>
                <div class="line"></div>
            </div>

            

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
            </section>

        </div>

    </article>
    <a href="#" class="btn">Revenir sur tous les articles</a>


</main>

<?php 
require_once './app/Views/frontend/layouts/footer.php'; ?>