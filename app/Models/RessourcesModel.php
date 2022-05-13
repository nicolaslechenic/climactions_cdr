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

    // search an/several article 
    public function searchArticle($query)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT * FROM document 
        WHERE outil LIKE :query 
        OR appartenance LIKE :query
        OR theme LIKE :query 
        ORDER BY id 
        DESC LIMIT 6");
        $req->execute([':query' => '%'.$query.'%']);
    
        $search = $req->fetchAll();
        return $search;
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


    public function lastArticles()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT `id`, `outil`, `genre` FROM `document` ORDER BY `id` DESC LIMIT 3");
        $req->execute(array());
        $articles = $req->fetchAll();
        return $articles;
    }

    public function selectType()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT type FROM type");
        $req->execute(array());
        $types = $req->fetchAll();
        return $types;
    }

    public function selectTheme()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT name FROM theme");
        $req->execute(array());
        $themes = $req->fetchAll();
        return $themes;
    }
    public function selectCondition()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT condition FROM condition");
        $req->execute(array());
        $conditions = $req->fetchAll();
        return $conditions;
    }
    public function selectLocation()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT location FROM location");
        $req->execute(array());
        $locations = $req->fetchAll();
        return $locations;
    }
    public function selectEditor()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT name FROM editor");
        $req->execute(array());
        $editors = $req->fetchAll();
        return $editors;
    }
    public function selectAuthor()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT name FROM author");
        $req->execute(array());
        $authors = $req->fetchAll();
        return $authors;
    }

    public function selectProductor()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT name FROM productor");
        $req->execute(array());
        $productors = $req->fetchAll();
        return $productors;
    }

    public function selectRealisator()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT name FROM realisator");
        $req->execute(array());
        $realisators = $req->fetchAll();
        return $realisators;
    }

    public function selectCreator()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT name FROM creator");
        $req->execute(array());
        $creators = $req->fetchAll();
        return $creators;
    }

    public function selectPublic()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT name FROM public");
        $req->execute(array());
        $publics = $req->fetchAll();
        return $publics;
    }

    public function insertGames($name,$image,$content,$quantite,$ademe,$caution,$catalogue,$type,$condition,$theme,$location,$is_validated,$format,$creator,$public)
    {
        $bdd = $this->connect();
        $req1 = $bdd->prepare("INSERT INTO ressources (name,image,content,quantite,ademe,caution,catalogue,type_id,condition_id,theme_id,location_id,is_validated) VALUES (:name,:image,:content,:quantite,:ademe,:caution,:catalogue,:type_id,:condition_id,:theme_id,:location_id,:is_validated)");
        $req2 = $bdd->prepare("INSERT INTO games (format,creator_id,public_id,ressources_id) VALUES (:format,:creator_id,:public_id,:ressources_id)");
        $data1 = [
            ":name" => $name,
            ":image" => $image,
            ":content" => $content,
            ":quantite" => $quantite,
            ":ademe" => $ademe,
            ":caution" => $caution,
            ":catalogue" => $catalogue,
            ":type_id" => $type,
            ":condition_id" => $condition,
            ":theme_id" => $theme,
            ":location_id" => $location,
            ":is_validated" => $is_validated
        ];

        $data2 = [
            ":format" => $format,
            ":creator_id" => $creator,
            ":public_id" => $public,
            ":ressources_id" => $req1->lastInsertId()
        ];
  
        $req1->execute($data1);
        $req2->execute($data2);
    }

    public function insertBook($name,$image,$content,$quantite,$ademe,$caution,$catalogue,$type,$condition,$theme,$location,$is_validated,$editor,$author,$public)
    {
        $bdd = $this->connect();
        $req1 = $bdd->prepare("INSERT INTO ressources (name,image,content,quantite,ademe,caution,catalogue,type_id,condition_id,theme_id,location_id,is_validated) VALUES (:name,:image,:content,:quantite,:ademe,:caution,:catalogue,:type_id,:condition_id,:theme_id,:location_id,:is_validated)");
        $req2= $bdd->prepare("INSERT INTO livre (editor_id,author_id,public_id,ressource_id) VALUES (:editor_id,:author_id,:public_id,:ressource_id)");
        $data1 = [
            ":name" => $name,
            ":image" => $image,
            ":content" => $content,
            ":quantite" => $quantite,
            ":ademe" => $ademe,
            ":caution" => $caution,
            ":catalogue" => $catalogue,
            ":type_id" => $type,
            ":condition_id" => $condition,
            ":theme_id" => $theme,
            ":location_id" => $location,
            ":is_validated" => $is_validated
        ];

        $data2 = [
            ":editor" => $editor,
            ":author" => $author,
            ":public_id" => $public,
            ":ressource_id" => $req1->lastInsertId()
        ];
  
        $req1->execute($data1);
        $req2->execute($data2);
    }

    public function insertMovie($name,$image,$content,$quantite,$ademe,$caution,$catalogue,$type,$condition,$theme,$location,$is_validated,$productor,$realisator,$public)
    {
        $bdd = $this->connect();
        $req1 = $bdd->prepare("INSERT INTO ressources (name,image,content,quantite,ademe,caution,catalogue,type_id,condition_id,theme_id,location_id,is_validated) VALUES (:name,:image,:content,:quantite,:ademe,:caution,:catalogue,:type_id,:condition_id,:theme_id,:location_id,:is_validated)");
        $req2 = $bdd->prepare("INSERT INTO film (productor_id,realisator_id,public_id,ressources_id) VALUES (:productor_id,:realisator_id,_public_id,:ressources_id)");
        $data1 = [
            ":name" => $name,
            ":image" => $image,
            ":content" => $content,
            ":quantite" => $quantite,
            ":ademe" => $ademe,
            ":caution" => $caution,
            ":catalogue" => $catalogue,
            ":type_id" => $type,
            ":condition_id" => $condition,
            ":theme_id" => $theme,
            ":location_id" => $location,
            ":is_validated" => $is_validated
        ];

        $data2 = [
            ":productor_id" => $productor,
            ":realisator_id" => $realisator,
            ":public_id" => $public,
            ":ressources_id" => $req1->lastInsertId()
        ];
  
        $req1->execute($data1);
        $req2->execute($data2);
    }

    public function insertFlyers($name,$image,$content,$quantite,$ademe,$caution,$catalogue,$type,$condition,$theme,$location,$is_validated,$format)
    {
        $bdd = $this->connect();
        $req1 = $bdd->prepare("INSERT INTO ressources (name,image,content,quantite,ademe,caution,catalogue,type_id,condition_id,theme_id,location_id,is_validated) VALUES (:name,:image,:content,:quantite,:ademe,:caution,:catalogue,:type_id,:condition_id,:theme_id,:location_id,:is_validated)");
        $req2 = $bdd->prepare("INSERT INTO flyers (format,ressources_id) VALUES (:format,:ressources_id)");
        $data1 = [
            ":name" => $name,
            ":image" => $image,
            ":content" => $content,
            ":quantite" => $quantite,
            ":ademe" => $ademe,
            ":caution" => $caution,
            ":catalogue" => $catalogue,
            ":type_id" => $type,
            ":condition_id" => $condition,
            ":theme_id" => $theme,
            ":location_id" => $location,
            ":is_validated" => $is_validated
        ];

        $data2 = [
            ":format" => $format,
            ":ressources_id" => $req1->lastInsertId()
        ];
  
        $req1->execute($data1);
        $req2->execute($data2);
    }

    public function selectBook(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,ressources.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,editor.`name`,author.`name`,public.`name` FROM ressources,theme,location,`condition`,livre,editor,author,public WHERE 
        ressources.id = livre.ressource_id AND ressources.condition_id = `condition`.id AND ressources.location_id = location.id AND ressources.theme_id = theme.id AND livre.editor_id = editor.id AND 
        livre.author_id = author.id AND livre.public_id = public.id");
        $req->execute(array());
        $livre = $req->fetchAll();
        return $livre;
    }

    public function selectMovie(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,director.`name`,producer.`name`,public.`name` FROM ressources,theme,location,`condition`,film,producer,director,public WHERE 
        ressources.id = film.ressources_id AND condition_id = `condition`.id AND ressources.location_id = location.id AND ressources.theme_id = theme.id AND film.producer_id = producer.id AND 
        film.director_id = director.id AND film.public_id = public.id; ");
        $req->execute(array());
        $movie = $req->fetchAll();
        return $movie;
    }

    public function selectGames(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,creator.`name`,public.`name` FROM ressources,theme,location,`condition`,games,public,creator WHERE 
        ressources.id = games.ressources_id AND ressources.condition_id = `condition`.id AND ressources.location_id = location.id AND ressources.theme_id = theme.id AND games.creator_id = creator.id AND games.public_id = public.id; ");
        $req->execute(array());
        $game = $req->fetchAll();
        return $game;
    }

    public function selectFlyer(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,flyers.`format` FROM ressources,theme,location,`condition`,flyers WHERE 
        ressources.id = flyers.ressources_id AND condition_id = `condition`.id AND ressources.location_id = location.id AND ressources.theme_id = theme.id;");
        $req->execute(array());
        $movie = $req->fetchAll();
        return $movie;
    }

    

}

