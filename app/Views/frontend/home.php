<h1>Centre de ressourses</h1>

<!-- affichage des 3 derniers articles (titre et genre) -->
<?php foreach ($allArticles as $article) { ?> 
    <h2><?= $article['outil'] ?></h2>
    <p> <?= $article['genre'] ?></p>
<?php } ?>