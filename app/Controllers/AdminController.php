<?php

namespace Climactions\Controllers;

class AdminController extends Controller {
	public function home() {
		return $this->viewAdmin('home');
	}
}