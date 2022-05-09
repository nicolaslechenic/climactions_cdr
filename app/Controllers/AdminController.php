<?php

namespace Climactions\Controllers;

class AdminController extends Controller {
	
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

	}


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
				
        		echo 'Vos identifiants sont incorrects';
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