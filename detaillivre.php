<?php
include('db_connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="livre.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <title>Détail du document</title>
    <?php include("db_connect.php") ?>

    <script src="js\bootstrap.min.js"></script>
</head>

<body>

    <!--
faire un cadre a gauche avec photo et note

faire un cadre a droite avec Outil (Nom) en haut, theme, Type, Genre, appartenance, etat, quantité, caution.

cadre en dessous pour les avis et pour poster un commentaire RESERVER



-->
    <div class="bloc1">
        <div class="boxgalerie">
            <div class="rectangle">


            </div>
            <!-- <a href="#" class="boxgalerie" id="mur">
                <img src="images\document\deplacement une affaire de choix.jpeg" alt>
                <span class="legende">Déplacements, une affaire de choix</span>
            </a> -->

        </div>

        <!-- 
        <div class='restaurant_choix'>
            Noter: Le Parisien
            <div id="r1" class="rate_widget">
                <div class="star_1 ratings_stars"></div>
                <div class="star_2 ratings_stars"></div>
                <div class="star_3 ratings_stars"></div>
                <div class="star_4 ratings_stars"></div>
                <div class="star_5 ratings_stars"></div>
                <div class="total_votes">votes</div>
            </div>
        </div>

        <div class='restaurant_choix'>
            Noter: Le Lyonnais
            <div id="r2" class="rate_widget">
                <div class="star_1 ratings_stars"></div>
                <div class="star_2 ratings_stars"></div>
                <div class="star_3 ratings_stars"></div>
                <div class="star_4 ratings_stars"></div>
                <div class="star_5 ratings_stars"></div>
                <div class="total_votes">votes</div>
            </div>
        </div> -->



    </div>

    <div class="bloc2">


        <h2 class="titre"> Details du Document </h2>


        <img id="content" style="float: right;">

        <div id="div2">
            <table class="titredoc">
                <?php

                while ($rows = mysqli_fetch_array($resulta)) {
                ?>


                    <tr>
                        <th>Titre </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['outil']; ?> </td>
                    </tr>


                <?php
                }
                ?>
            </table>



            <table class="tab1">



                <?php

                while ($rows = mysqli_fetch_array($result)) {
                ?>



                    <tr>
                        <th>Theme </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['theme']; ?> </td>
                    </tr>

                    <tr>
                        <th>Type </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['type']; ?> </td>
                    </tr>

                    <tr>
                        <th>Genre </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['genre']; ?> </td>
                    </tr>

                    <tr>
                        <th>Appartenance </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['appartenance']; ?> </td>
                    </tr>

                    <tr>
                        <th>Etat </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['etat']; ?> </td>
                    </tr>

                    <tr>
                        <th>Quantité </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['quantite']; ?> </td>
                    </tr>

                    <tr>
                        <th>Caution </th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['caution'];  ?> </td>
                    </tr>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>



    </div>

    <div class="bloc3">

        <p class="p1">Si vous souhaitez réserver ce document, nous avons besoin de votre nom, prénom, adresse mail ainsi <br /> que votre numéro de téléphone afin de pouvoir vous contacter.<br />
            Vous pouvez trouver l'adresse du centre de ressources accompagné d'un plan en bas de page.
        </p>

        <!-- <p class="p2">
            Cliquez sur le bouton pour


        </p> -->
        <form action="" method="post">
            <!-- <input class="value_1" type="checkbox" name="value_1" value="1"> -->
            <input class="envoie" type="submit" name="m" value="Reserver" onClick="javascript:alert('Vous avez bien reservé ce document')" ;>
            <!-- <script>
                var m = prompt("Bonjour, merci de rensegner votre nom, prénom, adresse mail ainsi que votre numéro", "");
                alert(m);
            </script> -->
        </form>

        <!-- <div class="img5"> <img src="images\flechereservation.jpg"> -->

        <fieldset class=" legende">
            <legend class="legend">Donnez votre avis :)</legend><br>



            <textarea id="message" placeholder="Laissez un commentaire à 'Déplacements, une affaire de choix'"></textarea>

            <div class="button">
                <button id="btn" type="submit"><strong>Envoyer le message</strong></button>
            </div>


        </fieldset>
    </div>
    <div class="mapgoogle">
        <p class="adresse">
            Adresse: Fabrique du climat, 39 bis rue Albert 1er 56000 Vannes
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5375.621637989071!2d-2.7644159000000146!3d47.64924299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1647271038912!5m2!1sfr!2sfr" width="400" height="330" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</body>


</html>