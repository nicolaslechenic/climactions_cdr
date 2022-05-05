<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;



session_start();

// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

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
  
  //Server settings
  // $mail = new PHPMailer(true);
 
 
  // $mail -> SMTPDebug  =  SMTP :: DEBUG_SERVER ; 
  //   $mail -> SMTPDebug  =  2 ;    
  //   $mail -> isSendmail();  // dire à la classe d'utiliser SMTP
 
  //   $mail->Debugoutput = 'html';
  //   $mail->Host = "smtp.gmail.com";
  //   $mail->Port = 465;     //  587;
  //   $mail->SMTPSecure = 'tls';   
  //   $mail->SMTPAuth = true;
  //   $mail->Username = "josselincrenn@gmail.com";
  //   $mail->Password = "Bigben::35600";
  //   $mail->setFrom =('josselincrenn@gmail.com');    //, 'Your Name');
 
  //   $mail->addAddress('josselincrenn@gmail.com', 'alarme ****');
 
  //       //  echo "Stop en 34";   exit;     
 
  //   $mail->Subject = "Sujet : Test PHPMailer";
  //   $mail->Body = "Corps du Message d'essai "; echo "<br>"; echo "<br>"; 
 
  //   if (!$mail->send()) {
  //           echo "Mailer Error: ".$mail->ErrorInfo; echo "<br>"; echo "<br>";
  //   } else {
  //           echo "Message sent!";echo "<br>";echo "<br>";
  //   }
 
  

    $backController = new \Climactions\Controllers\AdminController();
    
    
    if (isset($_GET['action'])) {
        
        if($_GET['action'] == 'pageCreationAdmin') {
            
        $backController->pageConnexionAdmin();
    
        }

        elseif($_GET['action'] == 'creatAdmin') {

            $lastname   = htmlspecialchars($_POST['lastname']);
            $firstname  = htmlspecialchars($_POST['firstname']);
            $city       = htmlspecialchars($_POST['city']);
            $mail       = htmlspecialchars($_POST['mail']);
            $password   = $_POST['password'];

            $password   = password_hash($password, PASSWORD_DEFAULT);

            $backController->createAdmin($lastname, $firstname, $city, $mail, $password);
        }


        elseif($_GET['action'] == 'sendmail'){
          $backController->sendMail();
        }


        elseif($_GET['action'] == 'connexion') {
          $mail = htmlspecialchars($_POST['email']);
          $password = htmlspecialchars($_POST['password']);
          if (!empty($mail) && !empty($password)) {
            $backController->connexion($mail, $password); // on passe deux paramètre
          } else {
              throw new Exception('renseigner vos identifiants');
          }
        }
 

        elseif($_GET['action'] == 'pageAddArticle') {
            
          $backController->pageAddArticle();
      
          }

        elseif($_GET['action'] == 'addArticle') {

            $title             = htmlspecialchars($_POST['title']);
            $img               = htmlspecialchars($_POST['img']);
            $description       = htmlspecialchars($_POST['description']);
            
          $backController->addArticle($title, $img, $description);
        }
 
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
