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

    public function addStatus()
    {
        $novoStatus = $this->request->getPost('inputStatus');
        
        $dados = [
            'nome' => $novoStatus,
        ];

        $this->statusModel->save($dados);

        return redirect()->to(base_url('/Cadastros/Status'));
    }

    public function delStatus($cod)
    {
        $this->statusModel->where('cod', $cod)->delete();   

        return redirect()->to(base_url('/Cadastros/Status'));
    }

    public function editStatus()
    {

        $codEditStatus = $this->request->getPost('codEditStatus');
        $nomeEditStatus = $this->request->getPost('inputEditStatus');            

        $this->statusModel->set('nome', $nomeEditStatus);
        $this->statusModel->where('cod', $codEditStatus);
        $this->statusModel->update();
        
        return redirect()->to(base_url('/Cadastros/Status'));
    }

    ######################### Funções em DESUSO #########################

    public function cadastrar()
    {
        return view('cad_status');
    }

}
