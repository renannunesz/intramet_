<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbempresasModel;
use App\Models\TbenvolvidosModel;

class Empresas extends BaseController
{

    private $tbEmpresas;
    private $responsaveis;

    public function __construct()
    {
        $this->tbEmpresas = new tbempresasModel();
        $this->responsaveis = new TbenvolvidosModel();
    }

    public function index()
    {
        return view('page head')
            . view('navbar')            
            .view('empresas', [
                'empresas' => $this->tbEmpresas->find(),
                'responsaveis' => $this->responsaveis->find()
            ]);
    }
}
