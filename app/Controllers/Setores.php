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
        echo view('mensagens', [
            'mensagem' => 'Setor Salvo com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Setores'
        ]);    
    }

    public function apagar($cod)
    {
        $this->setoresModel->where('cod', $cod)->delete();   
        echo view('mensagens', [
            'mensagem' => 'Registro Excluído com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Setores'
        ]);
    }

    public function editar($cod)
    {
        return view('cad_setor', [
            'setor' => $this->setoresModel->find($cod)
        ]);        
    }
}
