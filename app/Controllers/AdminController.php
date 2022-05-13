<?php

namespace Climactions\Controllers;

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;

require_once "vendor/phpmailer/phpmailer/src/Exception.php";
require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
require_once "vendor/phpmailer/phpmailer/src/SMTP.php";


class AdminController extends Controller {
	
	public function pageConnexionAdmin() {
		
		require $this->viewAdmin('adminInscription');
	}
	
	public function createAdmin($lastname, $firstname, $email, $password) {
		
		$adminManager = new \Climactions\Models\AdminModel();
		$admin = $adminManager->creatAdmin($lastname, $firstname, $email, $password);
		
		require $this->viewAdmin('adminInscription');
	}


	public function accountAdmin()
	{
		require $this->viewAdmin('account');
	}
	public function homeAdmin()
	{
		require $this->viewAdmin('home');
	}
	public function emailAdmin()
	{
		require $this->viewAdmin('email');
	}

	public function resourceAdmin()
	{
		require $this->viewAdmin('resource');
	}
	public function opinionAdmin()
	{
		require $this->viewAdmin('opinions');
	}
	public function addressBookAdmin()
	{
		require $this->viewAdmin('addressBook');
	}



	public function connexionAdmin() {
		require $this->viewAdmin('connexionAdmin');
	}

	public function connexion($email,$password){
		$adminManager = new \Climactions\Models\AdminModel();
		$connexAdm = $adminManager->collectPassword($email,$password);
		$result = $connexAdm->fetch();
		if(!empty($result)){
			$isPasswordCorrect = password_verify($password,$result['password']);

			$_SESSION['email'] = $result['email']; // transformation des variables recupérées en session
			$_SESSION['password'] = $result['password'];
			$_SESSION['id'] = $result['id'];
			$_SESSION['firstname'] = $result['firstname'];
			$_SESSION['lastname'] = $result['lastname'];

			if ($isPasswordCorrect) {

				require $this->viewAdmin('home');
			}else{
				
        		echo 'Vos identifiants sont incorrects';
			}
		}
	}


	// go to page forgot_password 
	public function forgot_password()
	{
		require $this->viewAdmin('forgot_password');
	}

	// change password 
	public function changePassword()
	{
		$adminManager = new \Climactions\Models\AdminModel();
		$adminController = new \Climactions\Controllers\AdminController();
		if(isset($_POST['email']))
		{
			$mail = new PHPMailer(true);
		try{
			// configuration pour voir les bugs
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
		  
			// on configure le SMTP 
			$mail->isSMTP();
			$mail->Host = 'localhost';
			$mail->Port = 1025; //port mailhog 
		  
			// charset 
			$mail->CharSet = 'utf-8';
		  
			// destinataires 
			$mail->addAddress($_POST['email']);
			
		  
			// expéditeur 
			$mail->setFrom('no-reply@site.fr');
		  
			// contenu 
			$mail->isHTML();
			$mail->Subject = "Nouveau mot de passe";
			$password = uniqid();
			$mail->Body = "Bonjour ".$_POST['email']. "Votre nouveau mot de passe: ".$password;
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$changePassword = $adminManager->getNewPassword($hashedPassword);
			
	
			// on envoie 
			$mail->send();
			echo "Message envoyé";
			
		  
		} 
		catch (Exception)
		{
			echo "Message non envoyé. Erreur: {$mail->ErrorInfo}";
		}
		}

		header('Location: indexAdmin.php');
	}

	// page create new password 
	public function pageNewPassword()
	{
		require $this->viewAdmin('pageNewPassword');
	}

	// confirm new passsword 
	public function createNewPassword($id, $oldPassword, $newPassword)
	{

		extract($_POST);
		$validation = true;
		$erreur = [];

		if(empty($oldPassword) || empty($newPassword) || empty($passwordConfirm)){
			$validation = false;
			$erreur[] = "Tous les champs sont requis!";
		}

		if ($newPassword){
			$adminManager = new \Climactions\Models\AdminModel();
			$getPassword = $adminManager->newPasswordAdmin($id);

			$verifPassword = $getPassword->fetch();
			$isPasswordCorrect = password_verify($oldPassword, $verifPassword['password']);

			if(!$isPasswordCorrect){
				$validation = false;
				$erreur[] = "le mot de passe actuel est erroné";
			}

			if ($newPassword != $passwordConfirm){
				$validation = false;
				$erreur[] = 'Vos mots de passe ne sont pas identiques';
			}
			
			if($isPasswordCorrect && $newPassword === $passwordConfirm){
				$newPass = password_hash($newPassword, PASSWORD_DEFAULT);
				$changePassword = $adminManager->createNewPassword($id, $newPass);

				require $this->viewAdmin('account');
			} else{
				require $this->viewAdmin('pageNewPassword');
				return $erreur;
			}
		}
	}

	public function pageAddArticle()
	{
		$articles = new \Climactions\Models\AdminModel();
		$allArticles = $articles->getArticles();
		require $this->viewAdmin('pageAddArticle');
	}
	public function viewUpdateArticle($idArticle)
	{
		$article = new \Climactions\Models\AdminModel();
		$oneArticle = $article->getArticle($idArticle);
		require $this->viewAdmin('updateArticle');
	}

	public function addArticle($title, $content)
	{
		$adminManager = new \Climactions\Models\AdminModel();
		$admin = $adminManager->addArticle($title, $content);
		require $this->viewAdmin('pageAddArticle');

	}

	public function deleteArticle($id) {
		$article = new \Climactions\Models\AdminModel();
		$deleteArticle = $article->deleteArticle($id);

		header('Location: indexAdmin.php?action=pageAddArticle');


	}
	public function updateArticle($idArticle, $title, $content)
	{
		$article = new \Climactions\Models\AdminModel();
		$updateArticle = $article->updateArticle($idArticle, $title, $content);
		
		header('Location: indexAdmin.php?action=pageAddArticle');
	}

	
}