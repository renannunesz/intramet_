<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbtisolicitacoesModel;
use App\Models\tbstatusModel;
use App\Models\tbusuariosModel;
use App\Models\titiposolicitacaoModel;
use PhpCsFixer\Finder;

class TI extends BaseController
{
    private $tisolicitacoesModel;
    private $statusModel;
    private $usuariosModel;
    private $tipoSolicitacaoModel;

    public function __construct()
    {
        $this->tisolicitacoesModel = new tbtisolicitacoesModel();
        $this->statusModel = new tbstatusModel();
        $this->usuariosModel = new tbusuariosModel();
        $this->tipoSolicitacaoModel = new titiposolicitacaoModel();
    }

    public function index()
    {
        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('tisolicitacoes', [
                    'chamados' => $this->tisolicitacoesModel->whereNotIn('codstatus', [1])->find(),
                    'status' => $this->statusModel->orderBy('nome','ASC')->find(),
                    'usuarios' => $this->usuariosModel->orderBy('nome','ASC')->find(),
                    'tiposolicitacao' => $this->tipoSolicitacaoModel->find()
                ]);
        }
    }

    public function novoChamado()
    {      

        $dataInicio = $this->request->getPost('inputDataInicio');
        $codTipo = $this->request->getPost('inputTipoChamado');
        $codSolicitante = $this->request->getPost('inputCodSolicitante');
        $descricaoChamado = $this->request->getPost('inputDescricao');
        $numeroOrdemPrioridade = $this->request->getPost('inputOrdemPrioridade');

        $dadosChamado = [
            'datainicio' => $dataInicio,
            'descricao' => $descricaoChamado,
            'codtipo' => $codTipo,
            'codsolicitante' => $codSolicitante,
            'codstatus' => 9,
            'codresponsavel' => 99,
            'ordemprioridade' => $numeroOrdemPrioridade
        ];

        $this->tisolicitacoesModel->save($dadosChamado);

        return redirect()->to(site_url('/TI/Solicitacoes'));
    }

    public function definirResponsavel()
    {                
        $codResponsavel = $this->request->getPost('inputResponsavel');
        $codChamado = $this->request->getPost('codChamado');

        $this->tisolicitacoesModel->set('codresponsavel', $codResponsavel)->where('cod', $codChamado)->update();

        return redirect()->to(site_url('TI/Solicitacoes'));
    }

    public function editarChamado()
    {                        
        $codChamado = $this->request->getPost('codChamado');
        $codTipo = $this->request->getPost('inputTipoChamado');
        $codSolicitante = $this->request->getPost('inputCodSolicitante');
        $descricaoChamado = $this->request->getPost('inputDescricao');

        $dadosChamado = [
            'codtipo' => $codTipo,
            'codsolicitante' => $codSolicitante,
            'descricao' => $descricaoChamado
        ];

        $this->tisolicitacoesModel->set($dadosChamado)->where('cod', $codChamado)->update();

        return redirect()->to(site_url('TI/Solicitacoes'));
    }

    public function deletarChamado($cod)
    {
        $this->tisolicitacoesModel->where('cod', $cod)->delete();
        return redirect()->to(site_url('TI/Solicitacoes'));
    }

    public function finalizarChamado($cod)
    {
        $this->tisolicitacoesModel->set('codstatus', 1)->where('cod', $cod)->update();
        return redirect()->to(site_url('TI/Solicitacoes'));
    }    

    public function chamadosFinalizados()
    {
        return view('tisolicitacoes_finalizados', [
            'chamados' => $this->tisolicitacoesModel->where('codstatus', 1)->find(),
            'status' => $this->statusModel->find(),
            'usuarios' => $this->usuariosModel->orderBy('nome','ASC')->find(),
            'tiposolicitacao' => $this->tipoSolicitacaoModel->find()
        ]);
    }

    public function mudarPrioridade()
    {
        $codChamado = $this->request->getPost('codChamado');
        $numeroOrdemPrioridade = $this->request->getPost('inputOrdemPrioridade');

        $this->tisolicitacoesModel->set('ordemprioridade', $numeroOrdemPrioridade)->where('cod', $codChamado)->update();

        return redirect()->to(site_url('TI/Solicitacoes'));
    }

    public function mudarStatus()
    {
        $codChamado = $this->request->getPost('codChamado');
        $codStatus = $this->request->getPost('inputCodStatus');

        $this->tisolicitacoesModel->set('codstatus', $codStatus)->where('cod', $codChamado)->update();

        return redirect()->to(site_url('TI/Solicitacoes'));
    }

    

}
