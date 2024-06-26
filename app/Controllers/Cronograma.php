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
    private $tbEnvolvidos;
    private $setores;
    private $tbUsuarios;

    public function __construct()
    {
        $this->tbfscncronogramaModel = new tbfscncronogramaModel();
        $this->tbEmpresas = new tbempresasModel();
        $this->tbEnvolvidos = new tbenvolvidosModel();
        $this->setores = new tbsetoresModel();
        $this->tbUsuarios = new tbusuariosModel();
    }

    public function empresasPendentesContabil($codResponsavel, $dataCompetencia)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'statusexecucao' => 0,
            'contabilcompetenciaexecutar <>' => 0,
            'competencia' => $dataCompetencia
        ];

        return $this->tbfscncronogramaModel->where($filtros)->find();
    }

    public function empresasFinalizadasContabil($codResponsavel, $dataCompetencia)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'statusexecucao' => 1,
            'contabilcompetenciaexecutar <>' => 0,
            'competencia' => $dataCompetencia
        ];

        return $this->tbfscncronogramaModel->where($filtros)->find();
    }

    public function empresasFinalizadasFiscal($codResponsavel, $dataCompetencia)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'statusexecucao' => 0,
            //'contabilcompetenciaexecutar <>' => 0,
            'competencia' => $dataCompetencia,
            'tipo' => "FSC"
        ];

        return $this->tbfscncronogramaModel->where($filtros)->find();
    }    

    public function empresasPendentesFiscal($codResponsavel, $dataCompetencia)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'statusexecucao' => 1,
            //'contabilcompetenciaexecutar <>' => 0,
            'competencia' => $dataCompetencia,
            'tipo' => "FSC"
        ];

        return $this->tbfscncronogramaModel->where($filtros)->find();
    }        

    public function getEmpresasCronograma($codResponsavel)
    {
        $filtros = [
            'codresponsavel' => $codResponsavel,
            'tipo' => "FSC"
        ];

        return $this->tbfscncronogramaModel->where($filtros)->find();;
    }

    function validaDivisao($numerator, $denominator) {
        if ($denominator == 0) {
            return 0;
        } else {
            return round($numerator / $denominator, 2);
        }
    }

    public function index()
    {

        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {

            $codUserLogado = $this->tbEnvolvidos->where('nome', session()->get('user'))->findColumn('cod');

            $this->request->getGet('competencia') == null ? $competenciaFiltro = [] : $competenciaFiltro = ['competencia' => $this->request->getGet('competencia')];

            $filtros = array_merge($competenciaFiltro, $this->getEmpresasCronograma($codUserLogado));

            return view('page head')
                . view('navbar')
                . view('cronograma', [
                    'cronogramas'   => $this->tbfscncronogramaModel->where($filtros)->find(),
                    'empresas'      => $this->tbEmpresas->find(),
                    'responsaveis'  => $this->tbEnvolvidos->find(),
                    'setores'       => $this->setores->find(),
                    'competencia'   => $this->request->getGet('competencia'),
                    'empPendentesContabil'      => $this->empresasPendentesContabil($codUserLogado, $this->request->getGet('competencia')),
                    'empFinalizadasContabil'    => $this->empresasFinalizadasContabil($codUserLogado, $this->request->getGet('competencia'))
                ]);
        }
    }

    public function cronoFiscal()
    {

        $status = session()->get('Logado');
        $compCronoRet = session()->getFlashdata('compExecCrono');
        $competenciaCronoFiscal = $this->request->getGet('competenciaCronoFiscal');

        if (is_null($status)) {
            return view('login');
        } else {

            $codUserLogado = ['codresponsavel' => $this->tbUsuarios->where('nome', session()->get('nome'))->findColumn('cod')];  
            $competenciaCronoFiscal == null ? $competenciaFiltro = ['competencia' => $compCronoRet] : $competenciaFiltro = ['competencia' => $this->request->getGet('competenciaCronoFiscal')];
            $tipoCronoFiltro = ['tipo' => 'FSC'];

            $filtros = array_merge(
                $codUserLogado,
                $competenciaFiltro,
                $tipoCronoFiltro
            );           

            return view('cronogramafsc', [
                    'cronogramasfsc'   => $this->tbfscncronogramaModel->where($filtros)->find(),
                    'empresas'      => $this->tbEmpresas->find(),
                    'usuarios'  => $this->tbUsuarios->find(),
                    'setores'       => $this->setores->find(),
                    'competencia'   => $this->request->getGet('competenciaCronoFiscal') == null ? $compCronoRet : $this->request->getGet('competenciaCronoFiscal'),
                    'empPendentes'      => count($this->empresasPendentesFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])),
                    'empFinalizadas'    => count($this->empresasFinalizadasFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])),
                    'percentualFinalizadas' => $this->validaDivisao(count($this->empresasFinalizadasFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])), (count($this->empresasFinalizadasFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])) + count($this->empresasPendentesFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])))) * 100,
                    'percentualPendentes' => $this->validaDivisao(count($this->empresasPendentesFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])), (count($this->empresasFinalizadasFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])) + count($this->empresasPendentesFiscal($codUserLogado['codresponsavel'], $competenciaFiltro["competencia"])))) * 100,
                ]);
        }
    }

    public function acompCronoFiscal()
    {
        $db = db_connect();
        $status = session()->get('Logado');
        $competenciaFiltro = $this->request->getGet('competenciaCronoFiscal');
        $equipeFiltro = $this->request->getGet('equipeCronoFiscal');
        $responsavelFiltro = $this->request->getGet('responsavelCronoFiscal');                     

        if (is_null($status)) {
            return view('login');
        } else {

            $competenciaFiltro == null ? $competenciaCronoFiscalQry = "" : $competenciaCronoFiscalQry = ' and c.competencia = "'.$competenciaFiltro.'"';            
            $equipeFiltro      == null ? $equipeCronoFiscalQry = ""      : $equipeCronoFiscalQry = ' and e.equipe = "'.$equipeFiltro.'"';
            $responsavelFiltro == null ? $responsavelCronoFiscalQry = "" : $responsavelCronoFiscalQry = ' and c.codresponsavel = "'.$responsavelFiltro.'"';
                    
            $empresasCrono = $db->query(
                'SELECT * FROM tbfscncronograma c 
                LEFT JOIN tbempresas e on e.codathenas = c.codempresa 
                where c.tipo = "FSC" ' . $competenciaCronoFiscalQry . $responsavelCronoFiscalQry . $equipeCronoFiscalQry  
            )->getResult('array'); //Retorna Valores com um Array

            $empresasCronoFinalizadas = $db->query(
                'SELECT * FROM tbfscncronograma c 
                LEFT JOIN tbempresas e on e.codathenas = c.codempresa 
                where c.tipo = "FSC" and c.statusexecucao = 0 ' . $competenciaCronoFiscalQry . $responsavelCronoFiscalQry . $equipeCronoFiscalQry  
            )->getNumRows(); //Retorna Quantidade de Linhas

            $empresasCronoFinalizadasServico = $db->query(
                'SELECT * FROM tbfscncronograma c 
                LEFT JOIN tbempresas e on e.codathenas = c.codempresa 
                where c.tipo = "FSC" and c.statusexecucao = 0 and e.equipe = "S"' . $competenciaCronoFiscalQry . $responsavelCronoFiscalQry
            )->getNumRows();            

            $empresasCronoFinalizadasComercio = $db->query(
                'SELECT * FROM tbfscncronograma c 
                LEFT JOIN tbempresas e on e.codathenas = c.codempresa 
                where c.tipo = "FSC" and c.statusexecucao = 0 and e.equipe = "C"' . $competenciaCronoFiscalQry . $responsavelCronoFiscalQry
            )->getNumRows();           

            $empresasCronoPendentes = $db->query(
                'SELECT * FROM tbfscncronograma c 
                LEFT JOIN tbempresas e on e.codathenas = c.codempresa 
                where c.tipo = "FSC" and c.statusexecucao = 1 ' . $competenciaCronoFiscalQry . $responsavelCronoFiscalQry . $equipeCronoFiscalQry  
            )->getNumRows();   
            
            $empresasCronoPendentesServico = $db->query(
                'SELECT * FROM tbfscncronograma c 
                LEFT JOIN tbempresas e on e.codathenas = c.codempresa 
                where c.tipo = "FSC" and c.statusexecucao = 1 and e.equipe = "S"' . $competenciaCronoFiscalQry . $responsavelCronoFiscalQry
            )->getNumRows();            

            $empresasCronoPendentesComercio = $db->query(
                'SELECT * FROM tbfscncronograma c 
                LEFT JOIN tbempresas e on e.codathenas = c.codempresa 
                where c.tipo = "FSC" and c.statusexecucao = 1 and e.equipe = "C"' . $competenciaCronoFiscalQry . $responsavelCronoFiscalQry
            )->getNumRows();

            return view('acompcronogramafsc', [
                    'cronogramasfsc'                => $empresasCrono,
                    'empresas'                      => $this->tbEmpresas->find(),
                    'setores'                       => $this->setores->find(),
                    'usuarios'                      => $this->tbUsuarios->find(),//$this->tbEnvolvidos->where('codsetor', 4)->find(),                    
                    'competencia'                   => $this->request->getGet('competenciaCronoFiscal'),
                    'empFinalizadas'                => $empresasCronoFinalizadas,
                    'empFinalizadasServico'         => $empresasCronoFinalizadasServico,
                    'empFinalizadasComercio'        => $empresasCronoFinalizadasComercio,
                    'empPendentes'                  => $empresasCronoPendentes,
                    'empPendentesServico'           => $empresasCronoPendentesServico,
                    'empPendentesComercio'          => $empresasCronoPendentesComercio,
                    'percentualFinalizadas'         => $this->validaDivisao($empresasCronoFinalizadas, ($empresasCronoFinalizadas + $empresasCronoPendentes)) * 100,
                    'percentualFinalizadasServico'  => $this->validaDivisao($empresasCronoFinalizadasServico, ($empresasCronoFinalizadas + $empresasCronoPendentes)) * 100,
                    'percentualFinalizadasComercio' => $this->validaDivisao($empresasCronoFinalizadasComercio, ($empresasCronoFinalizadas + $empresasCronoPendentes)) * 100,
                    'percentualPendentes'           =>   $this->validaDivisao($empresasCronoPendentes, ($empresasCronoFinalizadas + $empresasCronoPendentes)) * 100,
                    'percentualPendentesServico'    =>   $this->validaDivisao($empresasCronoPendentesServico, ($empresasCronoFinalizadas + $empresasCronoPendentes)) * 100,
                    'percentualPendentesComercio'   =>   $this->validaDivisao($empresasCronoPendentesComercio, ($empresasCronoFinalizadas + $empresasCronoPendentes)) * 100,
                ]);
        }
    }    

    public function setExecCronoFiscal()
    {
        $codRegistroCronograma = $this->request->getPost('setExecCronoFiscal');
        session()->setFlashdata('compExecCrono', $this->request->getPost('compCrono'));

        $this->tbfscncronogramaModel->where('cod', $codRegistroCronograma)->set('statusexecucao', 0)->update();

        return redirect()->to(base_url('Fiscon/CronoFiscal'));
    }

    public function unsetExecCronoFiscal()
    {
        $codRegistroCronograma = $this->request->getPost('unsetExecCronoFiscal');
        session()->setFlashdata('compExecCrono', $this->request->getPost('compCrono'));

        $this->tbfscncronogramaModel->where('cod', $codRegistroCronograma)->set('statusexecucao', 1)->update();

        return redirect()->to(base_url('Fiscon/CronoFiscal'));
    }    

    public function salvaExecucao()
    {
        $dadosRegCronograma = $this->request->getVar();

        $this->tbfscncronogramaModel->where('cod', $dadosRegCronograma['codregistro'])->set('statusexecucao', 1)->update();
        $this->tbEmpresas->where('codathenas', $dadosRegCronograma['codEmpresaAthenas'])->set('atualizacaocontabil', $dadosRegCronograma['atualizacaoContabil'])->update();

        $codUserLogado = $this->tbUsuarios->where('nome', session()->get('user'))->findColumn('cod');

        $this->request->getGet('competencia') == null ? $competenciaFiltro = [] : $competenciaFiltro = ['competencia' => $this->request->getGet('competencia')];

        $filtros = array_merge($competenciaFiltro, $this->getEmpresasCronograma($codUserLogado));

        return view('page head')
            . view('navbar')
            . view('cronograma', [
                'cronogramas'   => $this->tbfscncronogramaModel->where($filtros)->find(),
                'empresas'      => $this->tbEmpresas->find(),
                'responsaveis'  => $this->tbUsuarios->find(),
                'setores'       => $this->setores->find(),
                'competencia'   => $this->request->getGet('competencia'),
                'empPendentesContabil'      => $this->empresasPendentesContabil($codUserLogado, $this->request->getGet('competencia')),
                'empFinalizadasContabil'    => $this->empresasFinalizadasContabil($codUserLogado, $this->request->getGet('competencia'))
            ]);
    }

    public function acompanhamentoCronograma()
    {
        return view('page head')
            . view('navbar')
            . view('cronoacompanhamento', [
                'cronogramas'   => $this->tbfscncronogramaModel->orderBy('updated_at')->find(),
                'empresas'      => $this->tbEmpresas->orderBy('nome', 'asc')->find(),
                'responsaveis'  => $this->tbUsuarios->find(),
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
                'responsaveis'  => $this->tbUsuarios->find(),
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

        $this->tbfscncronogramaModel->update($cod, $dados);

        return $this->acompanhamentoCronograma();
    }
}
