<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbstatusModel;

class Status extends BaseController
{
    private $statusModel;

    public function __construct()
    {
        $this->statusModel = new tbstatusModel();
    }    
    
    public function index()
    {
        return view('status', [
            'status' => $this->statusModel->findAll()
        ]);
    }
}
