<?php

namespace Climactions\Controllers;


class FrontController extends Controller
{
    public function home()
    {
        // affichage des 3 derniers articles (titre et genre) en fonction de l'id (TO DO : created_at)
        $articles = new \Climactions\Models\RessourcesModel();
        $allArticles = $articles->lastArticles();
        require "app/Views/frontend/home.php";
    }
}
