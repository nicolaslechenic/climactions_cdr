<?php
namespace Climactions\Controllers;

class FrontController extends Controller {
    public function home() {
        return $this->viewFrontend('home');
        
    }
}