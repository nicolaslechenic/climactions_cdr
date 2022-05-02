<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/style.css">
    <title>Page d'Un Article</title>
</head>
<body>
<main>

<section class="article">
    <article>
        <h1>Titre : <?= $article['outil']; ?></h1>
        <div>
            <p><strong>Créé le : </strong><?= $article['appartenance']; ?></p>
            <p><strong>Contenu : </strong><?= $article['theme']; ?></p>
        </div>
    </article>
</section>

</main>

</body>
</html>