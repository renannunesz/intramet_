<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbenvolvidosModel;

class Envolvidos extends BaseController
{
    private $envolvidosModel;

    public function __construct()
    {
        $this->envolvidosModel = new tbenvolvidosModel();
    }

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

    public function index()
    {
        return view('envolvidos', [
            'envolvidos' => $this->dadosEnvolvidos()
        ]);
    }
    
    public function cadastrar()
    {
        return view('cad_envolvido' , [
            'setores' => $this->dadosSetores()
        ]);
    }

    public function salvar()
    {
        $this->envolvidosModel->save($this->request->getPost());
        echo view('mensagens' , [
            'mensagem' => 'Envolvido Salvo com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Envolvidos'
        ]);
    }

    public function apagar($cod)
    {
        $this->envolvidosModel->where('cod', $cod)->delete();
        echo view('mensagens', [
            'mensagem' => 'Registro Excluído com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Envolvidos'
        ]);
    }

    public function editar($cod)
    {
        return view('cad_envolvido', [
            'envolvido' => $this->envolvidosModel->find($cod),
            'setores' => $this->dadosSetores()
        ]);        
    }

}