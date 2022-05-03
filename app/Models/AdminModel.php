<?php
namespace Climactions\Models;

class AdminModel extends Manager {
       
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

    public function addArticle($title, $content)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO article (title, content) VALUE (?, ?)');
        $req->execute(array($title, $content));

    }

    public function updateArticle($id, $title, $content){
        $bdd = $this->connect();
        $req = $bdd->prepare('UPDATE article SET title = :title , content = :content WHERE id = :id');
        $req->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content
    ]);
    return $req;
   }

   public function deleteArticle($id)
   {
        $bdd= $this->connect();
        $req =$bdd->prepare('DELETE FROM article WHERE id = ?');
        $req->execute(array($id));
   }
    
}