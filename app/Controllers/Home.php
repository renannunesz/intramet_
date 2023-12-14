<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        $status = session()->get('Logado');
        
        if (is_null($status)) {            
            return view('login');
        } else {
            return view('home');
        }
        
    }
}
