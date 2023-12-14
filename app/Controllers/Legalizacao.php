<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbclientesModel;
use App\Models\tbempresasModel;
use App\Models\tbenvolvidosModel;
use App\Models\TbprocessosdetalhesModel;
use App\Models\TbprocessosModel;
use App\Models\tbprocessosservicosModel;
use App\Models\tbstatusModel;
use CodeIgniter\Commands\Utilities\Routes\FilterFinder;
use DateTime;

class Legalizacao extends BaseController
{
    private $tbprocessos;
    private $tbempresas;
    private $tbprocessosservicos;
    private $tbenvolvidos;
    private $tbstatus;
    private $tbclientes;
    private $tbprocessosdetalhes;

    public function __construct()
    {
        $this->tbprocessos = new TbprocessosModel();
        $this->tbempresas = new tbempresasModel();
        $this->tbclientes = new tbclientesModel();
        $this->tbprocessosservicos = new tbprocessosservicosModel();
        $this->tbenvolvidos = new tbenvolvidosModel();
        $this->tbstatus = new tbstatusModel();
        $this->tbprocessosdetalhes = new TbprocessosdetalhesModel();
    }

    public function processos()
    {
        $filtroStatus = ['1'];

        return view('processos', [
            'processos'     => $this->tbprocessos->whereNotIn('codstatus', $filtroStatus)->find(),
            'empresas'      => $this->tbempresas->find(),
            'clientes'      => $this->tbclientes->find(),
            'servicos'      => $this->tbprocessosservicos->orderBy('nome','ASC')->find(),
            'envolvidos'    => $this->tbenvolvidos->find(),
            'status'        => $this->tbstatus->find()
        ]);
    }

    public function processosDetalhes($cod)
    {    

        return view('processosdetalhes', [
            'processo'      => $this->tbprocessos->where('cod', $cod)->first(),
            'empresas'      => $this->tbempresas->find(),
            'clientes'      => $this->tbclientes->find(),
            'servicos'      => $this->tbprocessosservicos->orderBy('nome','ASC')->find(),
            'envolvidos'    => $this->tbenvolvidos->find(),
            'status'        => $this->tbstatus->find(),            
            'processosdetalhes' => $this->tbprocessosdetalhes->where('codprocesso', $cod)->find()            
        ]);
    }

    public function addProcesso()
    {

        $dataInicio = $this->request->getPost('inputDataInicio');
        $codServico = $this->request->getPost('inputServico');
        $codCliente = $this->request->getPost('inputCliente');
        $dadosContato = $this->request->getPost('inputContato');
        $dadosFone = $this->request->getPost('inputFone');
        $codResponsavel = $this->request->getPost('inputResponsavel');
        $dadosObs = $this->request->getPost('inputObservacao');
        $codStatus = "9";
        $codFiancneiro = "3";
        $numProcesso = 0;
        $tempoDecorrido = 0;
        $dataFim = '';
        $createAt = date("Y-m-d H:i:s");

        $dadosProcesso = [
            'datainicio' => $dataInicio,
            'codservico' => $codServico,
            'codempresa' => $codCliente,
            'codenvolvido' => $codResponsavel,
            'contato' => $dadosContato . " - " . $dadosFone, 
            'codstatus' => $codStatus,
            'observacao' => $dadosObs,
            'numeroprocesso' => $numProcesso,
            'financeiro' => $codFiancneiro,
            'datafim' => $dataFim,
            'tempodecorrido' => $tempoDecorrido,
            'created_at' => $createAt
        ];
        
        $this->tbprocessos->save($dadosProcesso);    

        return redirect()->to(base_url('/Legalizacao/Processos'));
    }

    public function editProcesso()
    {

        $codProcesso = $this->request->getPost('codEditProcesso');
        $obsProcesso = $this->request->getPost('inputEditObservacao');
        $statusProcesso = $this->request->getPost('inputEditStatus');
        $numProcesso = $this->request->getPost('inputEditNProcesso');
        $dataFimProcesso = date("Y-m-d");

        $this->tbprocessos->set('datafim', $dataFimProcesso);
        $this->tbprocessos->set('observacao', $obsProcesso);
        $this->tbprocessos->set('codstatus', $statusProcesso);
        $this->tbprocessos->set('numeroprocesso', $numProcesso);
        $this->tbprocessos->where('cod', $codProcesso);
        $this->tbprocessos->update();

        return redirect()->to(base_url('/Legalizacao/Processos'));

    }

    public function delProcesso($cod)
    {
        $this->tbprocessos->where('cod', $cod)->delete();

        return redirect()->to(base_url('/Legalizacao/Processos'));

    }

    public function tempoDecorrido($data1,$data2)
    {
        $dtINI = new DateTime($data1);
        $dtFIM = new DateTime($data2);

        return $dtINI->diff($dtFIM);
    }
}
