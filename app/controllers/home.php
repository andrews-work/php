<?php

namespace app\controllers;

class home
{
    public function index()
    {
        include __DIR__ . '/../views/pages/home.php';
    }

    public function about()
    {
        include __DIR__ . '/../views/pages/about.php';
    }
}
