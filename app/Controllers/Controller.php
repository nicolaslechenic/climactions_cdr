<?php

namespace Climactions\Controllers;

class Controller {
	public function viewFrontend($view): string	{
		return 'app/Views/frontend/' . $view . '.php';
	}

	public function viewErrors($view): string {
		return 'app/Views/errors/' . $view . '.php';
	}

	public function viewAdmin($view): string {
		return 'app/Views/admin/' . $view . '.php';
	}
}