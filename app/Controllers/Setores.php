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

        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('page head')
                . view('navbar')
                . view('setores', [
                    'setores' => $this->setoresModel->findAll()
                ]);
        }
    }

    public function salvar()
    {
        $this->setoresModel->save($this->request->getPost());

        return view('setores', [
            'setores' => $this->setoresModel->findAll()
        ]);
    }

    public function apagar($cod)
    {
        $this->setoresModel->where('cod', $cod)->delete();

        return view('setores', [
            'setores' => $this->setoresModel->findAll()
        ]);
    }

    public function editar($cod)
    {
        return view('setor', [
            'setor' => $this->setoresModel->find($cod)
        ]);
    }

    ######################### Funções em DESUSO #########################

    public function cadastrar()
    {
        return view('cad_setor');
    }

    public function testevalid()
    {
        return view('setores_teste', [
            'setores' => $this->setoresModel->find()
        ]);
    }
}
