<?php
namespace Climactions\Models;

class RessourcesModel extends Manager {
    
    public function filtreFilm() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "film_multimedia%"');
        $req->execute(array());
        return $req;
    }

    public function filtreLivre() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "livre%"');
        $req->execute(array());
        return $req;
    }

    public function filtreJeu() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "jeu%"');
        $req->execute(array());
        return $req;
    }

    public function filtreOutil() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM document WHERE `type` LIKE "expositions%"');
        $req->execute(array());
        return $req;
    }

    // public function afficherRessources() {
    //     $bdd = $this->connect();
    //     $req = $bdd->prepare('SELECT * FROM document');
    //     $req->execute(array());
    //     return $req;
    // }

    // public function afficherDetails($idRessources) {
    //     $bdd = $this->connect();
    //     $req = $bdd->prepare('SELECT * FROM document WHERE id = ?');
    //     $req->execute(array($idRessources));
    //     return $req;
    // }


    // compte le nombre d'articles 
    public function countArticles()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT COUNT(id) AS nb_articles FROM document");
        $req->execute();
        $result = $req->fetch();
        $nbArticles = $result['nb_articles'];
        
        return $nbArticles;
    }


    // afficher les articles par page 
    public function perPageArticle($premierArticle, $parPage)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT * 
        FROM document
        ORDER BY id
        DESC LIMIT :premierarticle, :parpage");
        $req->bindValue(':premierarticle', $premierArticle, \PDO::PARAM_INT);
        $req->bindValue(':parpage', $parPage, \PDO::PARAM_INT);
        $req->execute();
        $articles = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }


    // afficher un article en fonction de l'id 
    public function afficherDetailArticle()
    {
        $bdd = $this->connect();
        $id = $_GET['id'];
        $req = $bdd->prepare("SELECT * FROM document WHERE id = ?");
        $req->execute([$id]);

        return $req->fetch();
    }
}