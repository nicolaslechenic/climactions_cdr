<?php

namespace Climactions\Models;

class ContactModel extends Manager
{
    public function postMail($lastname, $firstname, $email, $object, $message)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO email (lastname, firstname, email, object, message) VALUES (:lastname, :firstname, :email, :object, :message)');
        
        $req->execute(array(
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':email' => $email,
            ':object' => $object,
            ':message' => $message));
        return $req;
    }

}