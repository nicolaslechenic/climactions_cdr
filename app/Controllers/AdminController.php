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