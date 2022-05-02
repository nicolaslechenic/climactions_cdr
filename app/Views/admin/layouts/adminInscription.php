<?php

require 'app/Views/frontend/layouts/header.php';
?>


<section id="container_inscription_admin">
    <h1>Création de l'administrateur</h1>
    
    
    <form id="form_admin" action="indexAdmin.php?action=creatAdmin" method="post">

        <div>
            <label for="lastname"> nom:</label>
            <input type="text" name="lastname" id="lastname" placeholder="Votre nom" require>
        </div>

        <div>
            <label for="firstname"> Prénom:</label>
            <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" require>
        </div>

        <div>
            <label for="mail"> email:</label>
            <input type="email" name="mail" id="mail" placeholder="Votre email" require>
        </div>
        <div>
            <label for="password"> Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" require>
        </div>
        <div>
            <label for="city"> ville:</label>
            <input type="text" name="city" id="city" placeholder="Votre ville" require>
        </div>
        <button type="submit">Soumettre</button>
    </form>
</section>


<?php
require 'app/Views/frontend/layouts/footer.php';
?>
