<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// function errorHandler($errno, $errstr) {
//   throw new Exception($errno, $errstr);
// }

// set_error_handler('errorHandler');

function eCatcher($e)
{
  if ($_ENV["APP_ENV"] == "dev") {
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

    if ($_GET['action'] == 'pageCreationAdmin') {

      $backController->pageConnexionAdmin();
    } elseif ($_GET['action'] == 'creatAdmin') {

      $lastname   = htmlspecialchars($_POST['lastname']);
      $firstname  = htmlspecialchars($_POST['firstname']);
      $city       = htmlspecialchars($_POST['city']);
      $mail       = htmlspecialchars($_POST['mail']);
      $password   = $_POST['password'];

      $password   = password_hash($password, PASSWORD_DEFAULT);

      $backController->createAdmin($lastname, $firstname, $city, $mail, $password);
    } elseif ($_GET['action'] == 'connexion') {

      $mail = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);
      if (!empty($mail) && !empty($password)) {
        $backController->connexion($mail, $password); // on passe deux paramètre

      } else {

        throw new Exception('renseigner vos identifiants');
      }
    } elseif ($_GET['action'] == 'pageAddArticle') {

      $backController->pageAddArticle();
    } elseif ($_GET['action'] == 'viewUpdateArticle') {
      $idArticle = $_GET['id'];
      $backController->viewUpdateArticle($idArticle);

    } elseif ($_GET['action'] == 'deleteArticle') {

      $id = $_GET['id'];
      $backController->deleteArticle($id);
    } elseif ($_GET['action'] == 'addArticle') {

      $title = htmlspecialchars($_POST['title']);
      $content = htmlspecialchars($_POST['content']);
      $backController->addArticle($title, $content);
      
    } elseif ($_GET['action'] == 'updateArticle') {
      $idArticle = $_GET['id'];    
      $title = htmlspecialchars($_POST['title']);
      $content = htmlspecialchars($_POST['content']);
      $backController->updateArticle($idArticle, $title, $content);
      
    }
  } else {
    $backController->connexionAdmin();
  }
} catch (Exception $e) {
  eCatcher($e);
  if ($e->getCode === 404) {
    die('Erreur : ' . $e->getMessage());
  } else {
    header("app/Views/errors/error.php");
  }
} catch (Error $e) {
  eCatcher($e);
  header("location: app/Views/errors/error.php");
}
