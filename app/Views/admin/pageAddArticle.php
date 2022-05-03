<?php
require 'app/Views/frontend/layouts/header.php';
?>


<section id="container_formulaire_article">

    <h1>Création des articles</h1>

    <form id="form_admin" action="indexAdmin.php?action=addArticle" method="post">

        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" placeholder="titre" required>
        </div>
        
        <!-- <div>
            <label for="img">Image :</label>
            <input type="file" name="img" id="img" placeholder="title">
        </div> -->

        <div>
            <label for="content">Contenu</label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <button type="submit">Créer un article</button>
    </form>
</section>


<?php
require 'app/Views/frontend/layouts/footer.php';
?>