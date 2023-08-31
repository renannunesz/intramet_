<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbprocessosservicosModel;

class Servicos extends BaseController
{
    private $tbservicos;

    public function __construct()
    {
        $this->tbservicos = new TbprocessosservicosModel();
    }


    public function index()
    {
        return view('processosservicos',[
            'servicos' => $this->tbservicos->orderBy('nome', 'ASC')->find(),
        ]);
    }

    public function addServico()
    {
        $nomeServico = $this->request->getPost('inputServico');

        $dadosServico = [
            'nome' => $nomeServico,        
        ];

        $this->tbservicos->save($dadosServico);

        return redirect()->to(base_url('/Cadastros/Servicos'));
    }

    public function editServico($cod) 
    {
        $nomeServico = $this->request->getPost('inputEditServico');
        
        $this->tbservicos->set('nome', $nomeServico)->where('cod', $cod)->update();

        return redirect()->to(base_url('/Cadastros/Servicos'));
    }

    public function delServico($cod)
    {
        $this->tbservicos->where('cod', $cod)->delete();

        return redirect()->to(base_url('/Cadastros/Servicos'));
    }
}
