<?php
require 'app/Views/frontend/layouts/header.php';
?>



<section>

<h2>Mes articles</h2>

<?php foreach($allArticles as $article) : ?>
    <h3><?= $article['title'] ?></h3>
    <p><?= $article['content'] ?></p>
    <a title="Modifier" href="indexAdmin.php?action=viewUpdateArticle&id=<?= $article['id'] ?>">Modifier</a>
    <a title="Supprimer" href="indexAdmin.php?action=deleteArticle&id=<?= $article['id'] ?>">Supprimer</a> 
<?php endforeach ?>


</section>


<?php
require 'app/Views/frontend/layouts/footer.php';
?>