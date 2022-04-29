<?php

namespace Climactions\Controllers;

class Controller {
	public function viewFrontend($view){
		require 'app/Views/frontend/' . $view . '.php';
	}

	public function viewErrors($view){
		require 'app/Views/errors/' . $view . '.php';
	}

	public function viewAdmin($view){
		require 'app/Views/admin/' . $view . '.php';
	}
}