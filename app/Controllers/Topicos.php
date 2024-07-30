<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbatasModel;
use App\Models\tbenvolvidosModel;
use App\Models\tbsetoresModel;
use App\Models\tbstatusModel;
use App\Models\tbtopicosdetalhesModel;
use App\Models\TbtopicosModel;

class Topicos extends BaseController
{
    private $topicosModel;

    private $responsavel;

    private $statusModel;

    private $setorModel;

    private $atasModel;

    private $topicosDetalhesModel;

    public function __construct()
    {
        $this->topicosModel = new tbtopicosModel();

        $this->responsavel = new tbenvolvidosModel();

        $this->statusModel = new tbstatusModel();

        $this->setorModel = new tbsetoresModel();

        $this->atasModel = new tbatasModel();

        $this->topicosDetalhesModel = new tbtopicosdetalhesModel();
    }

    public function index()
    {
        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('topicos', [
                'topicos'           => $this->topicosModel->find(),
                'topicosdetalhes'   => $this->topicosDetalhesModel->find(),
                'atas'              => $this->atasModel->orderBy('cod', 'desc')->find(),
                'envolvidos'        => $this->responsavel->find(),
                'status'            => $this->statusModel->find(),
                'setores'           => $this->setorModel->find()
            ]);
        }
    }

    public function salvar()
    {
        $this->topicosModel->save($this->request->getPost());

        return view('topicos', [
            'topicos'       => $this->topicosModel->find(),
            'topicosdetalhes'   => $this->topicosDetalhesModel->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function salvarDetalhes()
    {

        //$this->topicosModel->save($this->request->getPost('codstatus'));
        //$this->topicosModel->where('cod', $cod)->set(['codstatus' => $this->request->getPost('codstatus')])->update();
        $codTopico = $this->request->getPost('codtopico');
        $this->topicosDetalhesModel->save($this->request->getPost());

        //var_dump(count($this->topicosDetalhesModel->where('codtopico', $codTopico)->find()));

        if (count($this->topicosDetalhesModel->where('codtopico', $codTopico)->find()) >= 1) {
            $this->topicosModel->where('cod', $codTopico)->set('codstatus', 2)->update();
        }

        return view('topico', [
            'topicos'           => $this->topicosModel->find($codTopico),
            'topicosdetalhes'   => $this->topicosDetalhesModel->find(),
            'atas'              => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'        => $this->responsavel->find(),
            'status'            => $this->statusModel->find(),
            'setores'           => $this->setorModel->find()
        ]);
    }

    public function apagar($cod)
    {
        $this->topicosModel->where('cod', $cod)->delete();

        return view('topicos', [
            'topicos'       => $this->topicosModel->find(),
            'topicosdetalhes'   => $this->topicosDetalhesModel->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function apagarDetalhes($cod)
    {
        $codTopico = $this->topicosDetalhesModel->where('cod', $cod)->findColumn('codtopico');

        $this->topicosDetalhesModel->where('cod', $cod)->delete();

        return view('topico', [
            'topicos'           => $this->topicosModel->find($codTopico[0]),
            'topicosdetalhes'   => $this->topicosDetalhesModel->find(),
            'atas'              => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'        => $this->responsavel->find(),
            'status'            => $this->statusModel->find(),
            'setores'           => $this->setorModel->find()
        ]);
    }

    public function editar($cod)
    {
        //$codResp =      $this->topicosModel->where('cod', $cod)->findColumn('codresponsavel');
        //$codStatus =    $this->topicosModel->where('cod', $cod)->findColumn('codstatus');

        return view('topico', [
            'topicos'           => $this->topicosModel->find($cod),
            'topicosdetalhes'   => $this->topicosDetalhesModel->find(),
            'atas'              => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'        => $this->responsavel->find(),
            'status'            => $this->statusModel->find(),
            'setores'           => $this->setorModel->find()
        ]);
    }

    public function finalizar($cod)
    {

        //$this->topicosModel->where('cod', $cod)->set('codstatus', 1)->update();
        var_dump($this->topicosModel->where('cod', $cod)->set('codstatus', 1)->update());

        return view('topicos', [
            'topicos'       => $this->topicosModel->find(),
            'topicosdetalhes'   => $this->topicosDetalhesModel->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosAudiplanner()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 1)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosComercial()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 2)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosDiretoriaFinanceiro()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 3)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosFiscon()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 4)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosKronos()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 5)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosLegalizacao()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 6)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosSetPessoal()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 7)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosStartBI()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 8)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosTecnologia()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 9)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    public function topicosPublicidade()
    {
        return view('topicos', [
            'topicos'       => $this->topicosModel->where('codset_origem', 10)->find(),
            'atas'          => $this->atasModel->orderBy('cod', 'desc')->find(),
            'envolvidos'    => $this->responsavel->find(),
            'status'        => $this->statusModel->find(),
            'setores'       => $this->setorModel->find()
        ]);
    }

    /*
    1 - Responder
    2 - Finalizar
    3 - Aguardando Resposta
    */

    ######################### Funções em DESUSO #########################

    public function dadosTopicos()
    {
        $db = db_connect();
        $builder = $db->table('tbtopicos t');
        $builder->select('t.cod as codtopico , t.codata , t.assunto , t.descricao as desctopico , 
        t.codset_origem, (select so.descricao from tbsetores so WHERE so.cod = t.codset_origem) as dessetorigem,
        t.codset_destino, (select sd.descricao from tbsetores sd WHERE sd.cod = t.codset_destino) as dessetdestino,
        t.codstatus, (select ss.descricao from tbstatus ss WHERE ss.cod = t.codstatus) as descstatus,
        t.participantes , a.data , a.descricao as descata');
        $builder->join('tbatas a', 'a.cod = t.codata');
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
}
