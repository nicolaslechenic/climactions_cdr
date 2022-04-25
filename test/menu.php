<head>
    <?php
    include('db_connect.php');
    ?>
</head>

</form>

<?php
include("db_connect.php");

$q = "select `type`, `ouitl` from `document`";

$result = mysqli_query($db, $q);

while ($row = $result->fetch_assoc()) {
    printf("%s (%s)\n", $row["type"], $row["ouitl"]);
}
?>






































<!--REDUIRE LA PAGE -->

<!-- <style type="text/css">
        table {
            position: absolute;
            border-collapse: collapse;

            width: 500px;
            height: 240px;
            text-align: center;
        }

        td,
        th {
            border: 1px solid black;
        }

        .listelivre {
            position: static;
            margin-left: 550px;
            margin-top: 40px;
        }

        .rectangle {
            position: absolute;
            opacity: 30%;
            margin-top: 120px;
            margin-left: 500px;
            border-radius: 10px;

        }

        .recfiltre {
            position: absolute;
            opacity: 30%;
            margin-top: 120px;
            margin-left: 230px;
            border-radius: 10px;
        }

        .filtre {
            position: absolute;
            margin-left: 280px;
            margin-top: 130px;
            /*Texte en gras + Taille du texte +  ajouter les differents filtres*/
        }

        .listefiltre {
            position: absolute;
            margin-left: 260px;
            margin-top: 40px;
        }
    </style> -->

<!-- <form action=" -->
<!-- <div class="listelivre">
    <table>
        <tr class="livre1" onclick="document.hrefdetaillivre.php">
            <th>Type</th>
            <th>Nom</th>
            <th>Genre</th>
        </tr>
        <tr>
            <td>Exposition</td>
            <td>Nom</td>
            <td>Affiche</td>
        </tr>
        <tr>
            <td>Multimédia</td>
            <td>Nom</td>
            <td>Dvd</td>
        <tr>
            <td>Multimédia</td>
            <td>Nom</td>
            <td>CD</td>
        </tr>
        <tr>
            <td>Jeux</td>
            <td>Nom</td>
            <td>Jeu</td>
        </tr>
        <tr>
            <td>Exposition</td>
            <td>Nom</td>
            <td>Exposition</td>
        </tr>
        <tr>
            <td><a href="detaillivre.html">Exposition</a></td>
            <td><a href="detaillivre.html">Nom</a></td>
            <td><a href="detaillivre.html">Exposition</a></td>
        </tr>
        <tr>
            <td><a href="detaillivre.php">Exposition</a></td>
            <td><a href="detaillivre.php">Exposition</a></td>
            <td><a href="loginadm.php">Exposition</a></td>
        </tr>
        <tr>
            <td>Jeu</td>
            <td>Nom</td>
            <td>...</td>
        </tr>

        </tr>
    </table>

</div>
<strong class=filtre>Filtre</strong>
<div>

    <ul class="listefiltre">
        <li>Theme</li>
        <li>Type</li>
        <li>Genre</li>
        <li>Outli</li>
        <li>Titre</li>
        <li>Auteur</li>
        <li>Appartenance</li>


    </ul>
</div> -->

<!-- <div class="rectangle" style=width:600px;height:300px;background:green;></div>
<div class="recfiltre" style=width:200px;height:300px;background:green;></div> -->