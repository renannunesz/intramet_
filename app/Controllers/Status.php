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

    public function cadastrar()
    {
        return view('cad_status');
    }

    public function salvar()
    {
        $this->statusModel->save($this->request->getPost());
        echo view('mensagens', [
            'mensagem' => 'Status Salvo com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Status'
        ]);
    }

    public function apagar($cod)
    {
        $this->statusModel->where('cod', $cod)->delete();   
        echo view('mensagens', [
            'mensagem' => 'Registro Excluído com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Status'
        ]);
    }

    public function editar($cod)
    {
        return view('cad_status', [
            'status' => $this->statusModel->find($cod)
        ]);
        
    }    
}
