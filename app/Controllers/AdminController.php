<?php

namespace Climactions\Controllers;

use Climactions\Models\AdminModel;

class AdminController extends Controller
{
	public function home()
	{
		require $this->viewAdmin('home');
	}

	public function pageConnexionAdmin()
	{

		require $this->viewAdmin('adminInscription');
	}

	public function createAdmin($lastname, $firstname, $mail, $city, $password)
	{

		$adminManager = new \Climactions\Models\AdminModel();
		$admin = $adminManager->creatAdmin($lastname, $firstname, $mail, $city, $password);

		require $this->viewAdmin('adminInscription');
	}


	public function connexionAdmin()
	{
		require $this->viewAdmin('connexionAdmin');
	}

	public function connexion($mail, $password)
	{
		$adminManager = new \Climactions\Models\AdminModel();
		$connexAdm = $adminManager->collectPassword($mail, $password);
		$result = $connexAdm->fetch();
		if (!empty($result)) {
			$isPasswordCorrect = password_verify($password, $result['password']);

			$_SESSION['mail'] = $result['mail']; // transformation des variables recupérées en session
			$_SESSION['password'] = $result['password'];
			$_SESSION['id'] = $result['id'];
			$_SESSION['firstname'] = $result['firstname'];
			$_SESSION['lastname'] = $result['lastname'];

			if ($isPasswordCorrect) {

				require $this->viewAdmin('dashboard');
			} else {

				echo 'Vos identifiants sont incorrect';
			}
		}
	}

	public function pageAddArticle()
	{
		$articles = new AdminModel();
		$allArticles = $articles->getArticles();
		require $this->viewAdmin('pageAddArticle');
	}
	public function viewUpdateArticle($idArticle)
	{
		$article = new AdminModel();
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
		$article = new AdminModel();
		$deleteArticle = $article->deleteArticle($id);

		header('Location: indexAdmin.php?action=pageAddArticle');


	}
	public function updateArticle($idArticle, $title, $content)
	{
		$article = new AdminModel();
		$updateArticle = $article->updateArticle($idArticle, $title, $content);
		
		header('Location: indexAdmin.php?action=pageAddArticle');
	}
}
