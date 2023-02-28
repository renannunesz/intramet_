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

    public function salvar()
    {
        $this->statusModel->save($this->request->getPost());

        return view('status', [
            'status' => $this->statusModel->findAll()
        ]);
    }

    public function apagar($cod)
    {
        $this->statusModel->where('cod', $cod)->delete();   

        return view('status', [
            'status' => $this->statusModel->findAll()
        ]);
    }

    public function editar($cod)
    {
        return view('state', [
            'status' => $this->statusModel->find($cod)
        ]); 
    }

    ######################### Funções em DESUSO #########################

    public function cadastrar()
    {
        return view('cad_status');
    }

}
