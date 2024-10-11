<?php

namespace app\controllers;

class guest
{
    public function index()
    {
        include __DIR__ . '/../views/pages/home.php';
    }

    public function about()
    {
        include __DIR__ . '/../views/pages/about.php';
    }

    public function contact()
    {
        include __DIR__ . '/../views/pages/contact.php';
    }

    public function register()
    {
        include __DIR__ . '/../views/pages/register.php';
    }

    public function login()
    {
        include __DIR__ . '/../views/pages/login.php';
    }
    
    # forgot
    
}
