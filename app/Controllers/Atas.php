<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbatasModel;
use App\Models\tbsetoresModel;

class Atas extends BaseController
{
    private $atasModel;
    private $setoresModel;

    public function __construct()
    {
        $this->atasModel = new tbatasModel();
        $this->setoresModel = new tbsetoresModel();
    }

    public function dadosAtas()
    {
        $db = db_connect();
        $builder = $db->table('tbatas a');
        $builder->select('a.cod, a.data, a.descricao, s.descricao as descsetor, a.participantes ');
        $builder->join('tbsetores s', 's.cod = a.codsetor');
        $builder->orderBy('a.cod', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function dadosSetores()
    {
        $db = db_connect();
        $builder = $db->table('tbsetores s');
        $builder->select('s.cod, s.descricao ');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function listarAtas()
    {
        return view('grid_atas', [
            'atas' => $this->dadosAtas()
        ]);
    }

    public function index()
    {
        return view('grid_atas', [
            'atas' => $this->dadosAtas()
        ]);
    }

    public function cadastrar()
    {
        return view('ata', [
            'setores' => $this->dadosSetores()
        ]);
    }

    public function salvar() 
    {
        $this->atasModel->save($this->request->getPost());        
        echo view('mensagens', [
            'mensagem' => 'Usuário Salvo com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Atas'
        ]);
    }

    public function apagar($cod)
    {
        $this->atasModel->where('cod', $cod)->delete();
        echo view('mensagens', [
            'mensagem' => 'Registro Excluído com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Atas'
        ]);
    }

    public function editar($cod)
    {
        $codSetor = $this->atasModel->where('cod', $cod)->findColumn('codsetor');

        return view('ata', [
            'dados_ata' => $this->atasModel->find($cod),
            'setores'   => $this->setoresModel->where('cod', $codSetor )->findColumn('descricao')
        ]);        
    }
}
