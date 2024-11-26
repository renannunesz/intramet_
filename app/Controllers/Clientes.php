<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbclientesModel;

class Clientes extends BaseController
{

    private $tbclientes;

    public function __construct()
    {
        $this->tbclientes = new tbclientesModel();
    }

    public function index()
    {
        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('clientes', [
                'clientes' => $this->tbclientes->find(),
            ]);
        }
    }

    public function addCliente()
    {
        $nomeCliente = $this->request->getPost('inputNomeCliente');
        $cpfcnpjCliente = $this->request->getPost('inputCPFCNPJCliente');

        $dadosCliente = [
            'nome'      => $nomeCliente,
            'cpfcnpj'   => $cpfcnpjCliente
        ];

        $this->tbclientes->save($dadosCliente);

        return redirect()->to(site_url('/Cadastros/Clientes'));
    }

    public function editCliente()
    {
        $codEditCliente = $this->request->getPost('codEditcliente');
        $nomeEditCliente = $this->request->getPost('inputEditNomeCliente');
        $cpfcnpjEditCliente = $this->request->getPost('inputEditCPFCNPJcliente');

        $this->tbclientes->set('nome', $nomeEditCliente);
        $this->tbclientes->set('cpfcnpj', $cpfcnpjEditCliente);
        $this->tbclientes->where('cod', $codEditCliente);
        $this->tbclientes->update();

        return redirect()->to(site_url('/Cadastros/Clientes'));
    }

    public function delCliente($cod)
    {
        $this->tbclientes->where('cod', $cod)->delete();

        return redirect()->to(site_url('/Cadastros/Clientes'));
    }
}
