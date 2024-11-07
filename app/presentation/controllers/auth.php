<?php

namespace app\presentation\controllers;

use framework\utils\logs\logs;
use framework\presentation\views\view;

class auth
{
    // register
    public function register() {
        logs::info('User attempting to register');
        // return new view('pages/login');
        require './app/presentation/views/pages/login.php';

    }

}
