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
        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('page head')
                . view('navbar')
                . view('empresas', [
                    'empresas' => $this->tbEmpresas->find(),
                    'responsaveis' => $this->responsaveis->where('codsetor', 4)->find()
                ]);
        }
    }

    public function editar($cod)
    {

        return view('page head')
            . view('navbar')
            . view('empresa', [
                'empresa' => $this->tbEmpresas->where('cod', $cod)->first()
            ]);
    }

    public function salvar()
    {

        $cod = $this->request->getPost('empresaCod');

        $dados = [
            'chcontabil'        => $this->request->getPost('empresaCHContabil'),
            'chfiscal'          => $this->request->getPost('empresaCHFiscal'),
            'codresponsavel'    => $this->request->getPost('empresaResponsavel'),
            'curva'             => $this->request->getPost('empresaCurva')
        ];

        $this->tbEmpresas->where('cod', $cod)->set($dados)->update();

        return view('page head')
            . view('navbar')
            . view('empresas', [
                'empresas' => $this->tbEmpresas->find(),
                'responsaveis' => $this->responsaveis->find()
            ]);
    }

    public function pageSide()
    {
        return view('page head')
            . view('navbar')
            . view('m_empresas', [
                'empresas' => $this->tbEmpresas->find(),
                'responsaveis' => $this->responsaveis->find()
            ]);
    }
}
