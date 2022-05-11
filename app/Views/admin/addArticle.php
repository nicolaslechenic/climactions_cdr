<?php
require 'app/Views/frontend/layouts/header.php';
?>


<section id="container_formulaire_article">

    <h1>Création des articles</h1>


    <h2>Ajout d'un Livre</h2>
    <form id="form_admin" action="indexAdmin.php?action=addBook" method="post">

        <div>
            <label for="title">Nom Document :</label>
            <input type="text" name="title" id="title" placeholder="titre" required>
        </div>
        
        <div>
            <label for="content">Contenu</label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <div>
            <label for="content">Ademe</label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <div>
            <label for="content">Caution</label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <div>
            <label for="content">Catalogue</label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <div>
            <label for="content">Emplacement</label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <div>
            <label for="content"></label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <div>
            <label for="content"></label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

        <div>
            <label for="content">Contenu</label>
            <textarea required="required" name="content" id="content" cols="30" rows="8"></textarea>
        </div>

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
