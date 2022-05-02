<?php

namespace Climactions\Models;

class RessourcesModel extends Manager
{

    public function filtreFilm()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "film_multimedia%"');
        $req->execute(array());
        return $req;
    }

    public function filtreLivre()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "livre%"');
        $req->execute(array());
        return $req;
    }

    public function filtreJeu()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "jeu%"');
        $req->execute(array());
        return $req;
    }

    public function filtreOutil()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "expositions%"');
        $req->execute(array());
        return $req;
    }

    public function afficherRessources()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document');
        $req->execute(array());
        return $req;
    }

    public function afficherDetails($idRessources)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE id = ?');
        $req->execute(array($idRessources));
        return $req;
    }
    public function lastArticles()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT `id`, `outil`, `genre` FROM `document` ORDER BY `id` DESC LIMIT 3");
        $req->execute(array());
        $articles = $req->fetchAll();
        return $articles;
    }
}
