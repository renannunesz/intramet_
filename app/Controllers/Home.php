<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('page head')
            . view('navbar')
            . view('home');
    }
}
