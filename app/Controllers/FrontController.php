<?php

namespace Climactions\Controllers;

class FrontController extends Controller {
    public function home() {

        $articleManager = new \Climactions\Models\RessourcesModel();
        $lastArticles = $articleManager->lastArticles();
        require "app/Views/frontend/home.php";
    
    }


    // fonction afficher page des articles avec pagination 
    public function pageArticle()
    {
        $articleManager = new \Climactions\Models\RessourcesModel();
        $types = $articleManager->selectType();
        $ressources = $articleManager->selectResources();
        require "app/Views/frontend/pageArticle.php";
    }

    // fonction afficher un article grâce à l'id 
    public function article($id)
    {
        $articleManager = new \Climactions\Models\RessourcesModel();
        $article = $articleManager->afficherDetailArticle();

        require "app/Views/frontend/article.php";
    }


    // afficher page contact.php 
    public function contact()
    {
        require $this->viewFrontend('contact');
    }


    // fonction envoyer contact en bdd 
    public function contactPost($lastname, $firstname, $email, $phone, $object, $message)
    {
        $contactManager = new \Climactions\Models\ContactModel();
        

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $Mail = $contactManager->postMail($lastname, $firstname, $email, $phone, $object, $message);
            echo "Mail envoyé";
        } else {
            echo "échec";
        }
    }
}


