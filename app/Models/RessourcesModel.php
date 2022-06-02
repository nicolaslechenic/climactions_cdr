<?php

namespace Climactions\Models;

class RessourcesModel extends Manager
{

    public function afficherDetails($idRessources)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT * FROM ressources WHERE id = ?');
        $req->execute(array($idRessources));
        return $req;
    }


    // search an/several article 
    public function searchArticle($query)
    {
        $bdd = $this->connect();

        $req = $bdd->prepare("SELECT resource.id,resource.name AS resource,image,content,type_id,`type`.name AS type,DATE_FORMAT(modified_at, '%d/%m/%Y') AS `date` FROM resource,`type`  
        WHERE resource.name LIKE :query 
        OR content LIKE :query
        AND resource.type_id = `type`.id
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
        $req = $bdd->prepare("SELECT * FROM resource WHERE id = ?");
        $req->execute([$id]);

        return $req->fetch();
    }


    public function lastArticles()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT `id`, type_id, `name`, `image` FROM `resource` ORDER BY `id` DESC LIMIT 3");
        $req->execute(array());
        $articles = $req->fetchAll();
        return $articles;
    }

    public function selectType()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT id,`name` FROM type");
        $req->execute(array());
        $types = $req->fetchAll();
        return $types;
    }

    public function selectTheme()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT id,name FROM theme");
        $req->execute(array());
        $themes = $req->fetchAll();
        return $themes;
    }

    public function selectCondition()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT id,name FROM condition");
        $req->execute(array());
        $conditions = $req->fetchAll();
        return $conditions;
    }
    

    public function selectPublic()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT id,name FROM public");
        $req->execute(array());
        $publics = $req->fetchAll();
        return $publics;
    }

    public function selectResources(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT resource.id,resource.name,image,content,type_id,`type`.name AS type,DATE_FORMAT(created_at, '%d/%m/%Y') AS `date` FROM resource INNER JOIN `type` 
        ON resource.type_id = `type`.id
        ORDER BY resource.id DESC" );
        $req->execute(array());
        $articles = $req->fetchAll();
        // var_dump($articles);die;
        return $articles;
    }

    public function selectMovie(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,director.`name`,producer.`name`,public.`name` 
        FROM ressources,theme,location,`condition`,film,producer,director,public 
        WHERE ressources.id = film.ressources_id 
        AND condition_id = `condition`.id 
        AND ressources.location_id = location.id 
        AND ressources.theme_id = theme.id 
        AND film.producer_id = producer.id 
        AND film.director_id = director.id 
        AND film.public_id = public.id; ");
        $req->execute(array());
        $movie = $req->fetchAll();
        return $movie;
    }

    public function selectOneMovie($idRessources){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,director.`name`,producer.`name`,public.`name` 
        FROM ressources,theme,location,`condition`,film,producer,director,public 
        WHERE ressources.id = ?
        AND ressources.id = film.ressources_id 
        AND condition_id = `condition`.id 
        AND ressources.location_id = location.id 
        AND ressources.theme_id = theme.id 
        AND film.producer_id = producer.id 
        AND film.director_id = director.id 
        AND film.public_id = public.id; ");
        $req->execute(array($idRessources));
        $movie = $req->fetch();
        return $movie;
    }

    public function updateMovie($idRessources,$name,$image,$content,$quantite,$ademe,$caution,$catalogue,$condition,$theme,$location,$is_validated,$producer_id,$director_id,$public){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE ressources,film
        SET name = :name,image = :image,content = :content ,quantite = :quantite ,ademe = :ademe ,caution = :caution,catalogue = :catalogue, condition_id = :condition ,theme_id = :theme_id ,location_id = :location_id ,is_validated = :is_validated ,producer_id = :producer_id, director_id = :director_id ,public_id = :public_id 
        WHERE ressources.id = :ressources_id
        AND ressources.id = film.ressource_id");

        $data = [
            ":name" => $name,
            ":image" => $image,
            ":content" => $content,
            ":quantite" => $quantite,
            ":ademe" => $ademe,
            ":caution" => $caution,
            ":catalogue" => $catalogue,
            ":condition_id" => $condition,
            ":theme_id" => $theme,
            ":location_id" => $location,
            ":is_validated" => $is_validated,
            ":producer_id" => $producer_id,
            ":director_id" => $director_id,
            ":public_id" => $public,
            ":ressources_id" => $idRessources
        ];

        $req->execute($data);
    }

    public function insertGames($name,$image,$content,$quantite,$ademe,$caution,$catalogue,$type,$condition,$theme,$location,$is_validated,$format,$creator,$public)
    {
        $bdd = $this->connect();
        $req1 = $bdd->prepare("INSERT INTO ressources (name,image,content,quantite,ademe,caution,catalogue,type_id,condition_id,theme_id,location_id,is_validated) 
        VALUES (:name,:image,:content,:quantite,:ademe,:caution,:catalogue,:type_id,:condition_id,:theme_id,:location_id,:is_validated)");
        $req2 = $bdd->prepare("INSERT INTO games (format,creator_id,public_id,ressources_id) 
        VALUES (:format,:creator_id,:public_id,:ressources_id)");
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

    public function selectGames(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,creator.`name`,public.`name` 
        FROM ressources,theme,location,`condition`,games,public,creator 
        WHERE ressources.id = games.ressources_id 
        AND ressources.condition_id = `condition`.id 
        AND ressources.location_id = location.id 
        AND ressources.theme_id = theme.id 
        AND games.creator_id = creator.id 
        AND games.public_id = public.id; ");
        $req->execute(array());
        $game = $req->fetchAll();
        return $game;
    }

    public function selectOneGame($idRessources){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,creator.`name`,public.`name` 
        FROM ressources,theme,location,`condition`,games,public,creator 
        WHERE ressources.id = ?
        AND ressources.id = games.ressources_id 
        AND ressources.condition_id = `condition`.id 
        AND ressources.location_id = location.id 
        AND ressources.theme_id = theme.id 
        AND games.creator_id = creator.id 
        AND games.public_id = public.id; ");
        $req->execute(array($idRessources));
        $game = $req->fetch();
        return $game;
    }

    public function updateGame($idRessources,$name,$image,$content,$quantite,$ademe,$caution,$catalogue,$condition,$theme,$location,$is_validated,$creator_id,$format,$public){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE ressources,film
        SET name = :name,image = :image,content = :content ,quantite = :quantite ,ademe = :ademe ,caution = :caution,catalogue = :catalogue, condition_id = :condition ,theme_id = :theme_id ,location_id = :location_id ,is_validated = :is_validated ,creator_id = :creator_id format = :format ,public_id = :public_id 
        WHERE ressources.id = :ressources_id
        AND ressources.id = games.ressource_id");

        $data = [
            ":name" => $name,
            ":image" => $image,
            ":content" => $content,
            ":quantite" => $quantite,
            ":ademe" => $ademe,
            ":caution" => $caution,
            ":catalogue" => $catalogue,
            ":condition_id" => $condition,
            ":theme_id" => $theme,
            ":location_id" => $location,
            ":is_validated" => $is_validated,
            ":creator_id" => $creator_id,
            ":format" => $format,
            ":public_id" => $public,
            ":ressources_id" => $idRessources
        ];

        $req->execute($data);
    }

    public function insertFlyers($name,$image,$content,$quantite,$ademe,$caution,$catalogue,$type,$condition,$theme,$location,$is_validated,$format)
    {
        $bdd = $this->connect();
        $req1 = $bdd->prepare("INSERT INTO ressources (name,image,content,quantite,ademe,caution,catalogue,type_id,condition_id,theme_id,location_id,is_validated) 
        VALUES (:name,:image,:content,:quantite,:ademe,:caution,:catalogue,:type_id,:condition_id,:theme_id,:location_id,:is_validated)");
        $req2 = $bdd->prepare("INSERT INTO flyers (format,ressources_id) 
        VALUES (:format,:ressources_id)");
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

    public function selectFlyer(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,flyers.`format` 
        FROM ressources,theme,location,`condition`,flyers 
        WHERE ressources.id = flyers.ressources_id 
        AND condition_id = `condition`.id 
        AND ressources.location_id = location.id 
        AND ressources.theme_id = theme.id;");
        $req->execute(array());
        $movie = $req->fetchAll();
        return $movie;
    }

    public function selectOneFlyer($idRessources){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT ressources.`name`,theme.`name`,ressources.image,ressources.quantite,ressources.ademe,ressources.caution,ressources.catalogue,ressources.created_at,ressources.is_validated,
        `condition`.`condition`,location.location,flyers.`format` 
        FROM ressources,theme,location,`condition`,flyers 
        WHERE ressources.id = ?
        AND ressources.id = flyers.ressources_id 
        AND condition_id = `condition`.id 
        AND ressources.location_id = location.id 
        AND ressources.theme_id = theme.id;");
        $req->execute(array($idRessources));
        $movie = $req->fetch();
        return $movie;
    }

    public function updateFlyer($idRessources,$name,$image,$content,$quantite,$ademe,$caution,$catalogue,$condition,$theme,$location,$is_validated,$format,$public){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE ressources,film
        SET name = :name,image = :image,content = :content ,quantite = :quantite ,ademe = :ademe ,caution = :caution,catalogue = :catalogue, condition_id = :condition ,theme_id = :theme_id ,location_id = :location_id ,is_validated = :is_validated ,format = :format ,public_id = :public_id 
        WHERE ressources.id = :ressources_id
        AND ressources.id = flyers.ressource_id");

        $data = [
            ":name" => $name,
            ":image" => $image,
            ":content" => $content,
            ":quantite" => $quantite,
            ":ademe" => $ademe,
            ":caution" => $caution,
            ":catalogue" => $catalogue,
            ":condition_id" => $condition,
            ":theme_id" => $theme,
            ":location_id" => $location,
            ":is_validated" => $is_validated,
            ":format" => $format,
            ":public_id" => $public,
            ":ressources_id" => $idRessources
        ];

        $req->execute($data);
    }

    public function deleteRessource($idRessources){
        $bdd = $this->connect();
        $req = $bdd->prepare("DELETE FROM ressources WHERE ressources.id = ?");
        $delete = $req->execute(array($idRessources));
    }
}

