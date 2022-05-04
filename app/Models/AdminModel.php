<?php

namespace Climactions\Models;

class AdminModel extends Manager
{

    public function creatAdmin($lastname, $firstname, $city, $mail,  $password)
    {
        $bdd = $this->connect();

        $req = $bdd->prepare('INSERT INTO adminnew (lastname, firstname, city, mail,  password) VALUE (?, ?, ?, ?, ?)');
        $req->execute(array($lastname, $firstname, $city, $mail,  $password));

        return $req;
    }


    public function collectPassword($mail, $password)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT mail,password,lastname,firstname,id FROM adminnew WHERE mail=?');
        $req->execute(array($mail));

        return $req;
    }

    // ------------------------------------------------------------------------------------------------------------------

    // afficher un article

    public function getArticles()
    {
       $bdd = $this->connect();
       $req = $bdd->query("SELECT id, title, content FROM article ORDER BY id DESC");
       $article = $req->fetchAll();
       return $article;
    }
    public function getArticle($idArticle)
    {
       $bdd = $this->connect();
       $req = $bdd->prepare("SELECT * FROM article WHERE id = ?");
       $req->execute(array($idArticle));
       return $req->fetch();
    }

    //   créer un article

    public function addArticle($title, $content)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO article (title, content) VALUE (?, ?)');
        $req->execute(array($title, $content));
        header('Location: indexAdmin.php?action=pageAddArticle');
    }
    // mettre à jour un article

    public function updateArticle($idArticle, $title, $content)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('UPDATE article SET title = :title , content = :content WHERE id = :id');
        $req->execute([
            'id' => $idArticle,
            'title' => $title,
            'content' => $content   
        ]);
        return $req;
        // header('Location: indexAdmin.php?action=pageAddArticle');
       
    }

    // supprimer un article

    public function deleteArticle($id)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('DELETE FROM article WHERE id = ?');
        $req->execute(array($id));
    }
}
