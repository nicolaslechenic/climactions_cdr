<?php
namespace Climactions\Controllers;

class FrontController
{

    public function home()
    {
        require('app/Views/frontend/home.php');
    }
}