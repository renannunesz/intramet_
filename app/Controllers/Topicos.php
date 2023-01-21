<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbtopicosModel;

class Topicos extends BaseController
{
    private $topicosModel;   
    
    public function __construct()
    {
        $this->topicosModel = new tbtopicosModel();
    }

    public function dadosAtas()
    {
        $db = db_connect();
        $builder = $db->table('tbatas a');
        $builder->select('a.cod, a.data, a.descricao, st.descricao as descsetor');
        $builder->join('tbsetores st', 'st.cod = a.codsetor');
        $builder->orderBy('a.cod', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function dadosReuniao($codSetor)
    {
        $db = db_connect();
        $builder = $db->table('tbtopicos t');
        $builder->select('a.data, st.descricao as descsetor, t.cod as codt, t.assunto, t.providencia, e.nome, s.descricao as descstatus, t.diretoria, a.cod as coda, a.descricao as descata, a.participantes');
        $builder->join('tbenvolvidos e', 'e.cod = t.codresponsavel');
        $builder->join('tbstatus s', 's.cod = t.codstatus');
        $builder->join('tbatas a', 'a.cod = t.codata');
        $builder->join('tbsetores st', 'st.cod = a.codsetor');
        $builder->where('st.cod', $codSetor);
        $builder->orderBy('a.cod', 'ASC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function dadosEnvolvidos()
    {
        $db = db_connect();
        $builder = $db->table('tbenvolvidos e');
        $builder->select('e.cod, e.nome');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function dadosStatus()
    {
        $db = db_connect();
        $builder = $db->table('tbstatus st');
        $builder->select('st.cod, st.descricao ');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function index()
    {
        return view('topicos',[
            'topicos_atas' => $this->dadosAtas(),
            'envolvidos'   => $this->dadosEnvolvidos(),
            'status'       => $this->dadosStatus()
        ]);
    }

    public function topicosComercial()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(2)
        ]);

    }

    public function topicosAudiplanner()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(1)
        ]);
    }
    
    public function topicosDiretoriaFinanceiro()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(3)
        ]); 
    }    

    public function salvar()
    {
        $this->topicosModel->save($this->request->getPost());
        return view('topicos',[
            'topicos_atas' => $this->dadosAtas(),
            'envolvidos'   => $this->dadosEnvolvidos(),
            'status'       => $this->dadosStatus()
        ]);
    }

}