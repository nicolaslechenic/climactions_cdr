<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="./Public/styles/style.css">
    <title><?= $title ?></title>
</head>

<body>

    <header id="bandeau">
        <nav id="navigation-bandeau"  class="container">

            <a href="/"><img src="./Public/img/logo_clim_action.png" alt="Logo"></a>

            <ul id="menu" class="hidden">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?action=pageArticle">Ressources</a></li>
                <li><a href="#">évènements</a></li>
                <li><a href="index.php?action=contact">Contact</a></li>
                <li><a href="https://climactions-bretagnesud.bzh/">Retourner sur le site</a></li>
            </ul>

            <img id="burger" src="./Public/img/burger.png" alt="burger">

        </nav>
    </header>