<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbsetoresModel;

class Setores extends BaseController
{
    private $setoresModel;

    public function __construct()
    {
        $this->setoresModel = new tbsetoresModel();
    }

    public function index()
    {
        return view('setores', [
            'setores' => $this->setoresModel->findAll()
        ]);
    }

    public function cadastrar()
    {
        return view('cad_setor');
    }

    public function salvar()
    {
        $this->setoresModel->save($this->request->getPost());
        return view('setores', [
            'setores' => $this->setoresModel->findAll()
        ]);
    }
}
