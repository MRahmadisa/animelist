<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';

        // echo view('auth/login');
        echo view('template/header');
        echo view('template/dashboard');
        echo view('template/sidebar');
        echo view('template/footer');
        
    }
}
