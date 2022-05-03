<?php

require 'app/Views/frontend/layouts/header.php';
?>


<section id="container_formulaire_article">
    <h1>Création des articles</h1>
    
    
    <form id="form_admin" action="indexAdmin.php?action=addArticle" method="post">

        <div>
            <label for="title"> titre:</label>
            <input type="text" name="title" id="title" placeholder="title" required>
        </div>

        <div>
            <label for="img"> Image:</label>
            <input type="text" name="img" id="img" placeholder="url image" required>
        </div>

        <div>
            <label for="description"> description:</label>
            <input type="text" name="description" id="description" placeholder="description" required>
        </div>
        
        <button type="submit">Soumettre</button>
    </form>
</section>


<?php
require 'app/Views/frontend/layouts/footer.php';
?>
