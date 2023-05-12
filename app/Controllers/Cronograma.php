<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbempresasModel;
use App\Models\tbenvolvidosModel;
use App\Models\tbfscncronogramaModel;
use App\Models\tbsetoresModel;
use App\Models\tbusuariosModel;

class Cronograma extends BaseController
{

    private $tbfscncronogramaModel;
    private $tbEmpresas;
    private $responsaveis;
    private $setores;
    private $usuarios;

    public function __construct()
    {
        $this->tbfscncronogramaModel = new tbfscncronogramaModel();
        $this->tbEmpresas = new tbempresasModel();
        $this->responsaveis = new tbenvolvidosModel();
        $this->setores = new tbsetoresModel();
        $this->usuarios = new tbusuariosModel();
    }

    public function empresasPendentesContabil($codResponsavel)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'statusexecucao' => 0,
            'contabilcompetenciaexecutar <>' => 0
        ];

        return $this->tbfscncronogramaModel->where($filtros)->find();
    }

    public function empresasFinalizadasContabil($codResponsavel)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'statusexecucao' => 1,
            'contabilcompetenciaexecutar <>' => 0
        ];

        return $this->tbfscncronogramaModel->where($filtros)->find();
    }

    public function getEmpresasCronograma($codResponsavel)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'statusexecucao' => 0
        ];

        return $filtros;
    }

    public function index()
    {

        $codUserLogado = $this->responsaveis->where('nome', session()->get('user'))->findColumn('cod');

        $this->request->getGet('competencia') == null ? $competenciaFiltro = [] : $competenciaFiltro = ['competencia' => $this->request->getGet('competencia')];

        $filtros = array_merge($competenciaFiltro, $this->getEmpresasCronograma($codUserLogado));

        return view('page head')
            . view('navbar')
            . view('cronograma', [
                'cronogramas'   => $this->tbfscncronogramaModel->where($filtros)->find(),
                'empresas'      => $this->tbEmpresas->find(),
                'responsaveis'  => $this->responsaveis->find(),
                'setores'       => $this->setores->find(),
                'competencia'   => $this->request->getGet('competencia'),
                'empPendentesContabil'      => $this->empresasPendentesContabil($codUserLogado),
                'empFinalizadasContabil'    => $this->empresasFinalizadasContabil($codUserLogado)
            ]);
    }

    public function salvaExecucao()
    {
        $dadosRegCronograma = $this->request->getVar();

        $this->tbfscncronogramaModel->where('cod', $dadosRegCronograma['codregistro'])->set('statusexecucao', 1)->update();
        $this->tbEmpresas->where('codathenas', $dadosRegCronograma['codEmpresaAthenas'])->set('atualizacaocontabil', $dadosRegCronograma['atualizacaoContabil'])->update();

        $codUserLogado = $this->responsaveis->where('nome', session()->get('user'))->findColumn('cod');

        $this->request->getGet('competencia') == null ? $competenciaFiltro = [] : $competenciaFiltro = ['competencia' => $this->request->getGet('competencia')];

        $filtros = array_merge($competenciaFiltro, $this->getEmpresasCronograma($codUserLogado));

        return view('page head')
            . view('navbar')
            . view('cronograma', [
                'cronogramas'   => $this->tbfscncronogramaModel->where($filtros)->find(),
                'empresas'      => $this->tbEmpresas->find(),
                'responsaveis'  => $this->responsaveis->find(),
                'setores'       => $this->setores->find(),
                'competencia'   => $this->request->getGet('competencia'),
                'empPendentesContabil'      => $this->empresasPendentesContabil($codUserLogado),
                'empFinalizadasContabil'    => $this->empresasFinalizadasContabil($codUserLogado)
            ]);
    }

    public function acompanhamentoCronograma()
    {
        return view('page head')
            . view('navbar')
            . view('cronoacompanhamento', [
                'cronogramas'   => $this->tbfscncronogramaModel->orderBy('updated_at')->find(),
                'empresas'      => $this->tbEmpresas->orderBy('nome', 'asc')->find(),
                'responsaveis'  => $this->responsaveis->find(),
                'setores'       => $this->setores->find(),
                'finalizadas'   => $this->tbfscncronogramaModel->where('statusexecucao', '1')->findAll(),
                'abertas'       => $this->tbfscncronogramaModel->where('statusexecucao', '0')->findAll(),               
            ]);
    }

    public function desfazExecucao()
    {
        $codRegistro = $this->request->getPost('codregistro');

        $this->tbfscncronogramaModel->where('cod', $codRegistro)->set('statusexecucao', 0)->update();

        return view('page head')
            . view('navbar')
            . view('cronoacompanhamento', [
                'cronogramas'   => $this->tbfscncronogramaModel->find(),
                'empresas'      => $this->tbEmpresas->find(),
                'responsaveis'  => $this->responsaveis->find(),
                'setores'       => $this->setores->find()
            ]);
    }

    public function novaCompetencia()
    {
        $cronoAnterior = $this->tbfscncronogramaModel->where('competencia', '03/2023')->find();

        foreach ($cronoAnterior as $crono) {
            print_r($crono);
        }

        return count($cronoAnterior);
    }

    public function apagar($cod)
    {
        $this->tbfscncronogramaModel->delete($cod);

        return $this->acompanhamentoCronograma();
    }

    public function salvar()
    {        

        $cod = $this->request->getPost('codregistro');

        $dados = [
            'md_codresponsavel'                => $this->request->getPost('codresponsavel'),
            'md_codsetor'                      => $this->request->getPost('codsetor'),
            'md_contabilcompetenciaexecutar'   => $this->request->getPost('contabilcompetenciaexecutar'),
        ];

        $this->tbfscncronogramaModel->update($cod,$dados);

        return $this->acompanhamentoCronograma();
    }

}
