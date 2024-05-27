<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbempresasModel;
use App\Models\TbenvolvidosModel;
use App\Models\TbusuariosModel;

class Empresas extends BaseController
{

    private $tbEmpresas;
    private $responsaveis;
    private $tbUsuarios;

    public function __construct()
    {
        $this->tbEmpresas = new tbempresasModel();
        $this->responsaveis = new TbenvolvidosModel();
        $this->tbUsuarios = new TbusuariosModel();

    }

    public function index()
    {

        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('empresas', [
                'empresas' => $this->tbEmpresas->find(),
                'usuarios' => $this->tbUsuarios->find()
            ]);
        }
    }

    public function editEmpresa()
    {

        $codEmpresa = $this->request->getPost('codEditEmpresa');
        $codAthenasEmpresa = $this->request->getPost('inputCodAthenasEmpresa');
        $cnpjEmpresa = $this->request->getPost('inputEditCNPJEmpresa');
        $nomeEmpresa = $this->request->getPost('inputEditNomeEmpresa');
        $curvaEmpresa = $this->request->getPost('inputEditCurvaEmpresa');
        $codRespCTBEmpresa = $this->request->getPost('inputRespCTB');
        $codRespFSCEmpresa = $this->request->getPost('inputRespFSC');
        $CHCTBEmpresa = $this->request->getPost('inputEditCHContabilEmpresa');
        $CHFSCEmpresa = $this->request->getPost('inputEditCHFiscalEmpresa');
        
        //dd($codEmpresa,$codAthenasEmpresa,$cnpjEmpresa,$nomeEmpresa,(int)$codRespCTBEmpresa,(int)$codRespFSCEmpresa,$CHCTBEmpresa,$CHFSCEmpresa);    

        $this->tbEmpresas->set('codathenas ', $codAthenasEmpresa);
        $this->tbEmpresas->set('cnpj', $cnpjEmpresa);
        $this->tbEmpresas->set('nome', $nomeEmpresa);
        $this->tbEmpresas->set('curva', $curvaEmpresa);
        $this->tbEmpresas->set('codresponsavelctb', (int)$codRespCTBEmpresa);
        $this->tbEmpresas->set('codresponsavelfsc', (int)$codRespFSCEmpresa);
        $this->tbEmpresas->set('chcontabil', $CHCTBEmpresa);
        $this->tbEmpresas->set('chfiscal', $CHFSCEmpresa);
        
        $this->tbEmpresas->where('cod', $codEmpresa);
        $this->tbEmpresas->update();

        return redirect()->to(base_url('/Fiscon/Empresas'));

    }

    public function addEmpresa()
    {

        $codAthenasEmpresa = $this->request->getPost('inputCodAthenasEmpresa');
        $cnpjEmpresa = $this->request->getPost('inputaddCNPJEmpresa');
        $nomeEmpresa = $this->request->getPost('inputaddNomeEmpresa');
        $curvaEmpresa = $this->request->getPost('inputaddCurvaEmpresa');
        $codRespCTBEmpresa = $this->request->getPost('inputRespCTB');
        $codRespFSCEmpresa = $this->request->getPost('inputRespFSC');
        $CHCTBEmpresa = $this->request->getPost('inputaddCHContabilEmpresa');
        $CHFSCEmpresa = $this->request->getPost('inputaddCHFiscalEmpresa');
        
        //dd($codAthenasEmpresa,$cnpjEmpresa,$nomeEmpresa,$curvaEmpresa,(int)$codRespCTBEmpresa,(int)$codRespFSCEmpresa,$CHCTBEmpresa,$CHFSCEmpresa);    

        $dadosEmpresa = [
            'codathenas' => $codAthenasEmpresa,
            'cnpj' => $cnpjEmpresa,
            'nome' => $nomeEmpresa,
            'curva' => $curvaEmpresa,
            'codresponsavelctb' => (int)$codRespCTBEmpresa,
            'codresponsavelfsc' => (int)$codRespFSCEmpresa,
            'chcontabil' => $CHCTBEmpresa,
            'chfiscal' => $CHFSCEmpresa,
        ];

        $this->tbEmpresas->save($dadosEmpresa);

        return redirect()->to(base_url('/Fiscon/Empresas'));

    }

    public function salvar()
    {

        $cod = $this->request->getPost('empresaCod');

        $dados = [
            'chcontabil'        => $this->request->getPost('empresaCHContabil'),
            'chfiscal'          => $this->request->getPost('empresaCHFiscal'),
            'codresponsavel'    => $this->request->getPost('empresaResponsavel'),
            'curva'             => $this->request->getPost('empresaCurva')
        ];

        $this->tbEmpresas->where('cod', $cod)->set($dados)->update();

        return view('page head')
            . view('navbar')
            . view('empresas', [
                'empresas' => $this->tbEmpresas->find(),
                'responsaveis' => $this->responsaveis->find()
            ]);
    }

    public function pageSide()
    {
        return view('page head')
            . view('navbar')
            . view('m_empresas', [
                'empresas' => $this->tbEmpresas->find(),
                'responsaveis' => $this->responsaveis->find()
            ]);
    }
}
