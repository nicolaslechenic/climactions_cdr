<!-- <?php

        include('db_connect.php');

        if (isset($_GET["s"]) and $_GET["s"] == "Rechercher") {
            $_GET["terme"] = htmlspecialchars($_GET["terme"]);
            $terme = $_GET["terme"];
            $terme = trim($terme);
            $terme = strip_tags($terme);
        }

        if (isset($terme)) {
            $terme = strtolower($terme);
            $select_terme = $bdd->prepare("SELECT genre, caution FROM document WHERE genre LIKE ? OR caution LIKE ?");
            $select_terme->execute(array("%" . $terme . "%", "%" . $terme . "%"));
        } else {
            $message = "Vous devez entrer votre requete dans la barre de recherche";
        }

        ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Les résultats de recherche</title>
</head>

<body>
    <?php
    while ($terme_trouve = $select_terme->fetch()) {
        echo "<div><h2>" . $terme_trouve['titre'] . "</h2><p> " . $terme_trouve['contenu'] . "</p>";
    }
    $select_terme->closeCursor();
    ?>
</body>

</html> -->




<?php

$alldoc = "select `outil` from `document` order by id desc";

$result = mysqli_query($db, $alldoc);

if ($row_cnt = $result->num_rows) {
    printf("Le centre de ressources contient  %d ocument.\n", $row_cnt);
    while ($user = $alldoc->fetch()) {
?>
        <p><?= $user['pseudo']; ?></p>
    <?php
    }
} else {
    ?>
    <p>aucun utilistateur trouvé</p>
<?php
}

?>