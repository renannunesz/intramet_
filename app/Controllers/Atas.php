<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbatasModel;
use App\Models\TbenvolvidosModel;
use App\Models\tbtopicosModel;

class Atas extends BaseController
{
    private $atasModel;
    private $envolvidosModel;
    private $topicosModel;

    public function __construct()
    {
        $this->atasModel = new tbatasModel();
        $this->envolvidosModel = new TbenvolvidosModel();
        $this->topicosModel = new tbtopicosModel();
    }

    public function index()
    {

        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('atas', [
                'atas'          => $this->atasModel->find(),
                'envolvidos'    => $this->envolvidosModel->find(),
                'topicos'       => $this->topicosModel->find()
            ]);
        }
    }

    public function salvar()
    {

        foreach ($this->request->getPost('codenvolvidos') as $codigo) {
            $cod[] = $codigo;
        }

        $dadosAta = [
            'data' => $this->request->getPost('data'),
            'descricao' => $this->request->getPost('descricao'),
            'codenvolvidos' => implode(",", $cod),
        ];

        $this->atasModel->save($dadosAta);

        return view('atas', [
            'atas'          => $this->atasModel->find(),
            'envolvidos'    => $this->envolvidosModel->find(),
            'topicos'       => $this->topicosModel->find()
        ]);
    }

    public function editar($cod)
    {
        return view('ata', [
            'atas'          => $this->atasModel->find($cod),
        ]);
    }

    public function apagar($cod)
    {
        $qtdAtasTopicos = count($this->topicosModel->where('codata', $cod)->find());

        $this->atasModel->where('cod', $cod)->delete();

        return view('atas', [
            'atas' => $this->atasModel->find(),
            'envolvidos' => $this->envolvidosModel->find(),
            'topicos'       => $this->topicosModel->find()
        ]);
    }

    ######################### Funções em DESUSO #########################

    public function cadastrar()
    {
        return view('cad_ata');
    }
}
