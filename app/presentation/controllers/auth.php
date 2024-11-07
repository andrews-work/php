<?php

namespace app\presentation\controllers;

use framework\utils\logs\logs;
use framework\presentation\views\view;

class auth
{
    // register
    public function register() {

        logs::info('User attempting to register');
        
        new view('pages/login');
        return;
    }

}
