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
use App\Models\tbusuariosModel;
use CodeIgniter\Commands\Utilities\Routes\FilterFinder;
use CodeIgniter\Database\BaseUtils;
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
    private $tbusuarios;

    public function __construct()
    {
        $this->tbprocessos = new TbprocessosModel();
        $this->tbempresas = new tbempresasModel();
        $this->tbclientes = new tbclientesModel();
        $this->tbprocessosservicos = new tbprocessosservicosModel();
        $this->tbenvolvidos = new tbenvolvidosModel();
        $this->tbstatus = new tbstatusModel();
        $this->tbprocessosdetalhes = new TbprocessosdetalhesModel();
        $this->tbusuarios = new tbusuariosModel();
    }

    public function processos()
    {
        $filtroStatus = ['1'];

        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('processos', [
                'processos'     => $this->tbprocessos->whereNotIn('codstatus', $filtroStatus)->find(),
                'empresas'      => $this->tbempresas->find(),
                'clientes'      => $this->tbclientes->orderBy('nome', 'ASC')->find(),
                'servicos'      => $this->tbprocessosservicos->orderBy('nome', 'ASC')->find(),
                'envolvidos'    => $this->tbenvolvidos->find(),
                'status'        => $this->tbstatus->find(),
                'processosdetalhes' => $this->tbprocessosdetalhes->OrderBy('cod', 'ASC')->find(),
                'usuarios' => $this->tbusuarios->find()
            ]);
        }
    }

    public function processosFinalizados()
    {

        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('processos_finalizados', [
                'processosFinalizados'  => $this->tbprocessos->where('codstatus', 1)->orderBy('datafim', 'DESC')->find(),
                'empresas'      => $this->tbempresas->find(),
                'clientes'      => $this->tbclientes->orderBy('nome', 'ASC')->find(),
                'servicos'      => $this->tbprocessosservicos->orderBy('nome', 'ASC')->find(),
                'envolvidos'    => $this->tbenvolvidos->find(),
                'status'        => $this->tbstatus->find()
            ]);
        }
    }

    public function processosDetalhes($cod)
    {

        return view('processosdetalhes', [
            'processo'      => $this->tbprocessos->where('cod', $cod)->first(),
            'empresas'      => $this->tbempresas->find(),
            'clientes'      => $this->tbclientes->orderBy('nome', 'ASC')->find(),
            'servicos'      => $this->tbprocessosservicos->orderBy('nome', 'ASC')->find(),
            'envolvidos'    => $this->tbenvolvidos->find(),
            'status'        => $this->tbstatus->find(),
            'processosdetalhes' => $this->tbprocessosdetalhes->where('codprocesso', $cod)->orderBy('cod', 'DESC')->find(),
            'usuarios'      => $this->tbusuarios->find()
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

        $arquivo = $this->request->getFile('arqcaminho');
        $caminhoPasta = ROOTPATH . 'assets\uploads';
        
        if ( $arquivo->getSize() > 0) {
            $arquivo->move(ROOTPATH . 'assets/uploads');
            $caminho_arquivo = 'assets/uploads/' . $arquivo->getName();
        } 

        $codProcesso = $this->request->getPost('codEditProcesso');
        $obsProcesso = $this->request->getPost('inputEditObservacao');
        $statusProcesso = $this->request->getPost('inputEditStatus');
        $numProcesso = $this->request->getPost('inputEditNProcesso');
        $codServico = $this->request->getPost('inputServico');
        $dataFimProcesso = date("Y-m-d");

        $this->tbprocessos->set('datafim', $dataFimProcesso);
        $this->tbprocessos->set('observacao', $obsProcesso);
        $this->tbprocessos->set('codstatus', $statusProcesso);
        $this->tbprocessos->set('numeroprocesso', $numProcesso);
        $this->tbprocessos->set('codservico', $codServico);
        $this->tbprocessos->set('caminhodocprocesso', $caminho_arquivo);
        $this->tbprocessos->set('nomedocprocesso', $arquivo->getName());
        $this->tbprocessos->where('cod', $codProcesso);
        $this->tbprocessos->update();

        //return redirect()->to(base_url('/Legalizacao/Processos'));
        return redirect()->to(base_url('Legalizacao/processosDetalhes') . '/' . $codProcesso);

    }

    public function editStatusProcesso()
    {

        $codProcesso = $this->request->getPost('codEditProcesso');
        $statusProcesso = $this->request->getPost('inputEditStatus');

        $this->tbprocessos->set('codstatus', $statusProcesso);
        $this->tbprocessos->where('cod', $codProcesso);
        $this->tbprocessos->update();

        return redirect()->to(base_url('Legalizacao/processosDetalhes') . '/' . $codProcesso);
    }

    public function delProcesso($cod)
    {
        $this->tbprocessos->where('cod', $cod)->delete();

        return redirect()->to(base_url('/Legalizacao/Processos'));
    }

    public function tempoDecorrido($data1, $data2)
    {
        $dtINI = new DateTime($data1);
        $dtFIM = new DateTime($data2);

        return $dtINI->diff($dtFIM);
    }

    public function addTramiteProcesso()
    {

        $codProcesso = $this->request->getPost('codProcesso');
        $tituloTramite = "Trâmite em: " . date("d/m/y");
        $dataTramite = date("y-m-d");
        $descTramite = $this->request->getPost('inputTramite');
        $codUsuario = $this->request->getPost('codUsuario');

        $dadosTramite = [
            'codprocesso'       => intval($codProcesso),
            'titulotramite'     => $tituloTramite,
            'datatramite'       => $dataTramite,
            'desctramite'       => $descTramite,
            'codusuariotramite' => $codUsuario
        ];

        //dd($dadosTramite);
        $this->tbprocessosdetalhes->save($dadosTramite);

        return redirect()->to(base_url('/Legalizacao/processosDetalhes/' . $codProcesso));
    }

    public function delTramiteProcesso($cod)
    {

        $codProcesso = $this->tbprocessosdetalhes->where('cod', $cod)->findColumn('codprocesso');

        $this->tbprocessosdetalhes->where('cod', $cod)->delete();

        return redirect()->to(base_url('/Legalizacao/processosDetalhes/' . $codProcesso[0]));
    }

    public function addDocProcesso()
    {

        $arquivo = $this->request->getFile('arqcaminho');
        $codProcesso = $this->request->getPost('codEditProcesso');
        //dd($arquivo,$codProcesso);
        $caminhoPasta = ROOTPATH . 'assets\uploads';
        
        if (isset($arquivo)) {

            $arquivo->move(ROOTPATH . 'assets/uploads');
            $caminho_arquivo = $caminhoPasta . '/' . $arquivo->getName();
        }     
        
        $this->tbprocessos->set('caminhodocprocesso', $caminho_arquivo);
        $this->tbprocessos->set('nomedocprocesso', $arquivo->getName());
        $this->tbprocessos->where('cod', $codProcesso);
        $this->tbprocessos->update();
        
        return redirect()->to(base_url('Legalizacao/processosDetalhes') . '/' . $codProcesso);
    }

    public function delArqProcesso($cod)
    {
        $this->tbprocessos->set('nomedocprocesso', '');
        $this->tbprocessos->set('caminhodocprocesso', '');
        $this->tbprocessos->where('cod', $cod);
        $this->tbprocessos->update();
        //return redirect()->to(base_url('/Legalizacao/Processos'));
        return redirect()->to(base_url('Legalizacao/processosDetalhes') . '/' . $cod);
    }
}
