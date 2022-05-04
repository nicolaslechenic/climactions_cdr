<?php

namespace Climactions\Models;

class ContactModel extends Manager
{
    public function postMail($lastname, $firstname, $mail, $objet, $message)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO contact (lastname, firstname, mail, objet, message) VALUE(:lastname, :firstname, :mail, :objet, :message)');
        
        $req->execute(array(
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':mail' => $mail,
            ':objet' => $objet,
            ':message' => $message));
        return $req;
    }

}