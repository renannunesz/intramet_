<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbenvolvidosModel;
use App\Models\tbsetoresModel;

class Envolvidos extends BaseController
{
    private $envolvidosModel;

    private $setoresModel;

    public function __construct()
    {
        $this->envolvidosModel = new tbenvolvidosModel();

        $this->setoresModel = new tbsetoresModel();
    }

    public function index()
    {
        return view('envolvidos', [
            'envolvidos' => $this->envolvidosModel->find(),
            'setores' => $this->setoresModel->find(),
        ]);
    }
    
    public function salvar()
    {
        $this->envolvidosModel->save($this->request->getPost());

        echo view('envolvidos' , [
            'envolvidos' => $this->envolvidosModel->find(),
            'setores' => $this->setoresModel->find()
        ]);
    }

    public function apagar($cod)
    {
        $this->envolvidosModel->where('cod', $cod)->delete();
        echo view('envolvidos' , [
            'envolvidos' => $this->envolvidosModel->find(),
            'setores' => $this->setoresModel->find()
        ]);
    }

    public function editar($cod)
    {
        return view('envolvido', [
            'envolvido' => $this->envolvidosModel->find($cod),
            'setores' => $this->setoresModel->find(),
        ]);        
    }


    ######################### Funções em DESUSO #########################

    public function dadosEnvolvidos()
    {
        $db = db_connect();
        $builder = $db->table('tbenvolvidos e');
        $builder->select('e.cod, e.nome, s.descricao');
        $builder->join('tbsetores s', 's.cod = e.codsetor');
        $builder->orderBy('e.cod', 'ASC');
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

    public function setorEnvolvido($codEnvolvido) 
    {
        $nomeSetor = $this->setoresModel->where('cod', $codEnvolvido)->findColumn('descricao');

        return $nomeSetor;
    }

    public function cadastrar()
    {
        return view('cad_envolvido' , [
            'setores' => $this->dadosSetores()
        ]);
    }
    
}