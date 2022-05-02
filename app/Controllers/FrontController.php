<?php
namespace Climactions\Controllers;

class FrontController extends Controller {
    public function home() {
        require $this->viewFrontend('home');
    
    }
}