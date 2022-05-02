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
}