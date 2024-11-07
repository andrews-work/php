<?php

namespace app\presentation\controllers;

use framework\presentation\views\view;
use framework\utils\logs\logs;

class guest
{    
    public function index()
    {
        // View is rendered automatically
        new view('pages/home');
        logs::info('home page');
    }

    public function about()
    {
        // View is rendered automatically
        new view('pages/about');
        logs::info('about page');
    }

    public function contact()
    {
        // View is rendered automatically
        new view('pages/contact');
        logs::info('contact page');
    }

    public function register()
    {
        // View is rendered automatically
        new view('pages/register');
        logs::info('register page');
    }

    public function login()
    {
        // View is rendered automatically
        new view('pages/login');
        logs::info('login page');
    }
}
