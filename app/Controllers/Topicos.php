<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbenvolvidosModel;
use App\Models\tbstatusModel;
use App\Models\TbtopicosModel;

class Topicos extends BaseController
{
    private $topicosModel;       
    
    private $responsavel;

    private $statusModel;

    public function __construct()
    {
        $this->topicosModel = new tbtopicosModel();

        $this->responsavel = new tbenvolvidosModel();

        $this->statusModel = new tbstatusModel();
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
        $builder->orderBy('t.cod', 'DESC');
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

    public function dadosSetor($codTopico)
    {
        $db = db_connect();
        $builder = $db->table('tbsetores s');
        $builder->select('s.descricao');
        $builder->join('tbatas a', 'a.codsetor = s.cod');
        $builder->join('tbtopicos t', 't.codata = a.cod');
        $builder->where('t.cod', $codTopico);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function corStatus($status)
    {
        switch ($status) {
            case 'Finalizado':
                echo 'has-background-success';
                break;

            case 'Em Andamento':
                echo 'has-background-warning';
                break;
                    
            case 'Diretoria':
                echo 'has-background-primary';
                break;

            case 'Informativo':
                echo 'has-background-info';
                break;                              
            
            default:
                echo 'has-background-danger';
                break;
        }
    }

    public function index()
    {
        //Pegando dados da URL, pois não existe formulario
        $url_anterior = $_SERVER['HTTP_REFERER'];
        $url_partes = explode('/', $url_anterior);
        $setor = substr($url_partes[6],7);        

        return view('topicos',[
            'topicos_atas' => $this->dadosAtas(),
            'envolvidos'   => $this->responsavel->find(),
            'status'       => $this->statusModel->find(),
            'setor'        => $setor            
        ]);
    }

    public function topicosAudiplanner()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(1),
            'setor' => 'Audiplanner',
            'cor' => 'FFC000'
        ]);
    }

    public function topicosComercial()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(2),
            'setor' => 'Comercial',
            'cor' => 'FF7C80'
        ]);
    }
    
    public function topicosDiretoriaFinanceiro()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(3),
            'setor' => 'Diretoria/Financeiro',
            'cor' => 'F4B084'
        ]); 
    }  
    
    public function topicosFiscon()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(4),
            'setor' => 'Fiscon',
            'cor' => '5B9BD5'
        ]);
    }

    public function topicosKronos()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(5),
            'setor' => 'Kronos',
            'cor' => '00B050'
        ]);
    }

    public function topicosLegalizacao()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(6),
            'setor' => 'Legalizacao',
            'cor' => 'F22816'
        ]);
    }

    public function topicosSetPessoal()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(7),
            'setor' => 'Setor Pessoal',
            'cor' => '7030A0'
        ]);
    }

    public function topicosStartBI()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(8),
            'setor' => 'Start BI',
            'cor' => 'F27F3D'
        ]);
    }

    public function topicosTecnologia()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(9),
            'setor' => 'Tecnologia',
            'cor' => '3805F2'
        ]);
    }

    public function topicosPublicidade()
    {
        return view('grid_reunioes',[
            'grid_reunioes' => $this->dadosReuniao(10),
            'setor' => 'Publicidade',
            'cor' => '694DE3'
        ]);
    }

    public function salvar()
    {

        //Pegando dados do input, pois existe formulario    
        //$request = \Config\Services::request();
        $setor = $this->request->getVar('inpSetor');        

        $this->topicosModel->save($this->request->getPost());

        echo view('mensagens', [
            'mensagem' => 'Tópico Salvo com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Topicos/topicos'.$setor.'/'
        ]);

    }

    public function apagar($cod)
    {
        //Pegando dados da QRY, pois não existe formulario        
        $setor = $this->dadosSetor($cod);

        $this->topicosModel->where('cod', $cod)->delete();

        echo view('mensagens', [
            'mensagem' => 'Registro Excluído com Sucesso',
            'tipoMensagem'  => 'is-success',
            'link' => 'public/Topicos/topicos'.str_replace("/", "", $setor[0]['descricao']).'/'
        ]);
    }

    public function editar($cod)
    {
        $setor = $this->dadosSetor($cod);
        $codResp =      $this->topicosModel->where('cod', $cod)->findColumn('codresponsavel');
        $codStatus =    $this->topicosModel->where('cod', $cod)->findColumn('codstatus');

        return view('topicos', [
            'dados_topicos' => $this->topicosModel->find($cod),
            'setor'         => str_replace("/", "", $setor[0]['descricao']),
            'responsavel'   => $this->responsavel->where('cod', $codResp)->findColumn('nome'),
            'status_atual'  => $this->statusModel->where('cod', $codStatus)->findColumn('descricao'),
            'status'        => $this->statusModel->find()
        ]);
    }
}