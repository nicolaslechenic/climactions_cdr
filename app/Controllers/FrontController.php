<?php

namespace Climactions\Controllers;

 clim-8-inscription+hasher-clim-26/1
class FrontController extends Controller {
    public function home() {
        require $this->viewFrontend('home');
    

    }



    // fonction afficher page des articles avec pagination 
    public function pageArticle($currentPage)
    {
        $articleManager = new \Climactions\Models\RessourcesModel();
        $nbarticles = $articleManager->countArticles();

        // nb article par page 
        $parPage = 8;

        // calcul nb pages total 
        $pages = ceil($nbarticles / $parPage);
        
        $premierArticle = ($currentPage * $parPage) - $parPage;
        $articles = $articleManager->perPageArticle($premierArticle, $parPage);
    
        require "app/Views/frontend/pageArticle.php";
    }

    // fonction afficher un article grâce à l'id 
    public function article($id)
    {
        $articleManager = new \Climactions\Models\RessourcesModel();
        $article = $articleManager->afficherDetailArticle();

        require "app/Views/frontend/article.php";
    }
}

}

