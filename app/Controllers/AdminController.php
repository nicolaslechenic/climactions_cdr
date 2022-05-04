<?php

namespace Climactions\Controllers;

class AdminController extends Controller {
	public function home() {
		require $this->viewAdmin('home');
	}

	public function pageConnexionAdmin() {
		
		require $this->viewAdmin('adminInscription');
	}
	
	public function createAdmin($lastname, $firstname, $mail, $city, $password) {
		
		$adminManager = new \Climactions\Models\AdminModel();
		$admin = $adminManager->creatAdmin($lastname, $firstname, $mail, $city, $password);
		
		require $this->viewAdmin('adminInscription');
	}


	public function sendMail()
	{
		require $this->viewAdmin('sendmail');


	public function connexionAdmin() {
		require $this->viewAdmin('connexionAdmin');
	}

	public function connexion($mail,$password){
		$adminManager = new \Climactions\Models\AdminModel();
		$connexAdm = $adminManager->collectPassword($mail,$password);
		$result = $connexAdm->fetch();
		if(!empty($result)){
			$isPasswordCorrect = password_verify($password,$result['password']);

			$_SESSION['mail'] = $result['mail']; // transformation des variables recupérées en session
			$_SESSION['password'] = $result['password'];
			$_SESSION['id'] = $result['id'];
			$_SESSION['firstname'] = $result['firstname'];
			$_SESSION['lastname'] = $result['lastname'];

			if ($isPasswordCorrect) {

				require $this->viewAdmin('dashboard');
			}else{
				
        		echo 'Vos identifiants sont incorrect';
			}
		}
	}

	public function pageAddArticle() {

		require $this->viewAdmin('pageAddArticle');

	}

	public function addArticle($title, $img, $description)
	{
		$adminManager = new \Climactions\Models\AdminModel();
		$admin = $adminManager->addArticle($title, $img, $description);
		
		require $this->viewAdmin('pageAddArticle');


	}
}