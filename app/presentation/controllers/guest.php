<?php

namespace app\presentation\controllers;

use framework\utils\logs\logs;

class guest
{    
    public function index()
    {
        include __DIR__ . '/../views/pages/home.php';
        logs::info('home page');
    }

    public function about()
    {
        include __DIR__ . '/../views/pages/about.php';
        logs::info('about page');
    }

    public function contact()
    {
        include __DIR__ . '/../views/pages/contact.php';
        logs::info('contact page');
    }

    public function register()
    {
        include __DIR__ . '/../views/pages/register.php';
        logs::info('register page');
    }

    public function login()
    {
        include __DIR__ . '/../views/pages/login.php';
        logs::info('login page');
    }
}
