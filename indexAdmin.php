<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Create an instance; passing `true` enables exceptions

// function errorHandler($errno, $errstr) {
  //   throw new Exception($errno, $errstr);
  // }

// set_error_handler('errorHandler');

function eCatcher($e) {
  if($_ENV["APP_ENV"] == "dev") {
    $whoops = new \Whoops\Run;
    $whoops->allowQuit(false);
    $whoops->writeToOutput(false);
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $html = $whoops->handleException($e);
    
    require 'app/Views/errors/error.php';
  }
}

try {

    $backController = new \Climactions\Controllers\AdminController();
    
    
    if (isset($_GET['action'])) {
        
        if($_GET['action'] == 'pageCreationAdmin') {
            
        $backController->pageConnexionAdmin();
    
        }

        elseif($_GET['action'] == 'creatAdmin') {

            $lastname   = htmlspecialchars($_POST['lastname']);
            $firstname  = htmlspecialchars($_POST['firstname']);
            $email       = htmlspecialchars($_POST['email']);
            $pass   = htmlspecialchars($_POST['password']);

            $password   = password_hash($pass, PASSWORD_DEFAULT);

            $backController->createAdmin($lastname, $firstname, $email, $password);
        }


        elseif($_GET['action'] == 'connexion') {
          $email = htmlspecialchars($_POST['email']);
          $password = htmlspecialchars($_POST['password']);
          if (!empty($email) && !empty($password)) {
            $backController->connexion($email, $password); // on passe deux paramètre
          } else {
              throw new Exception('renseigner vos identifiants');
          }
        }


        
        
        // go to page forgot_password
        elseif($_GET['action'] == 'forgot_password'){
          $backController->forgot_password();
        }

        elseif($_GET['action'] == 'emailPost'){
          $backController->changePassword();
        }

        
        elseif ($_GET['action'] == 'pageAddArticle') {
          
          $backController->pageAddArticle();
        } 
        
        elseif ($_GET['action'] == 'viewUpdateArticle') {
          $idArticle = $_GET['id'];
          $backController->viewUpdateArticle($idArticle);
        } 
        
        elseif ($_GET['action'] == 'deleteArticle') {
          
          $id = $_GET['id'];
          $backController->deleteArticle($id);
        } 
        
        elseif ($_GET['action'] == 'addArticle') {
          
          $title = htmlspecialchars($_POST['title']);
          $content = htmlspecialchars($_POST['content']);
          $backController->addArticle($title, $content);
          
        } elseif ($_GET['action'] == 'updateArticle') {
          $idArticle = $_GET['id'];    
          $title = htmlspecialchars($_POST['title']);
          $content = htmlspecialchars($_POST['content']);
          $backController->updateArticle($idArticle, $title, $content);
          
        }
        
        // go to page home admin 
        elseif($_GET['action'] == 'homeAdmin'){
          $backController->homeAdmin();
        }

        elseif($_GET['action'] == 'emailAdmin'){
          $backController->emailAdmin();
        }
        elseif($_GET['action'] == 'accountAdmin'){
          $backController->accountAdmin();
        }
        elseif($_GET['action'] == 'resourceAdmin'){
          $backController->resourceAdmin();
        }
        elseif($_GET['action'] == 'addressBookAdmin'){
          $backController->addressBookAdmin();
        }
        elseif($_GET['action'] == 'opinionAdmin'){
          $backController->opinionAdmin();
        }
        elseif($_GET['action'] == 'createResource'){
          $backController->createResource();
        }
        // elseif($_GET['action'] == 'updateResource'){
        //   $backController->updateResource();
        // }
        // elseif($_GET['action'] == 'deleteResource'){
        //   $backController->deleteResource();
        // }
        
  }else{
   $backController->connexionAdmin();

 }
        
} catch (Exception $e) {
  eCatcher($e);
  if($e->getCode === 404) {
    die('Erreur : ' .$e->getMessage());
  } else {
    header("app/Views/errors/error.php");
  } 
  
} catch (Error $e) {
  eCatcher($e);
  header("location: app/Views/errors/error.php");
}
