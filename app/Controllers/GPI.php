<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbgestaoprocessosModel;
use App\Models\tbsetoresModel;

class GPI extends BaseController
{

    private $gestaoProcessosArquivos;
    private $setoresModel;

    public function __construct() {
        $this->gestaoProcessosArquivos = new tbgestaoprocessosModel();
        $this->setoresModel = new tbsetoresModel();
    }

    public function gpiDocumentos()
    {
        $status = session()->get('Logado');

        if (is_null($status)) {
            return view('login');
        } else {
            return view('gpi_documentos', [
                    'gpidocumentos' => $this->gestaoProcessosArquivos->where('codtipodocumento', [1])->find(),
                    'setores' => $this->setoresModel->find()
                ]);
        }
    }

    public function addDocumento()
    {
        $codDocumento = intval($this->request->getPost('inputCodDocumento'));
        $codSetor = intval($this->request->getPost('inputSetor'));
        $descricaoDocumento = $this->request->getPost('inputDescricao');
        $codTipoDocumento = 1;        
        $revisaoDocumento = $this->request->getPost('inputRevisao');
        $versaoDocumento = intval($this->request->getPost('inputVersao'));
        $arquivo = $this->request->getFile('arqcaminho');
        $arquivo->move(ROOTPATH . 'assets/uploads/documentosgpi');
        $caminhoPasta = ROOTPATH . 'assets/uploads/documentosgpi';        
        $caminho_arquivo = $caminhoPasta . "/" . $arquivo->getName();  
        $nomeDocumento = $arquivo->getName();   

        $dadosDocumento = [
            'cod' => 1, //$codDocumento,
            'codsetor' => 1, //$codSetor,
            'descricao' => 'descicao aqui', //$descricaoDocumento,
            'codtipodocumento' => 1, //$codTipoDocumento,
            'nomearquivo' => 'nomeaqui', //$nomeDocumento,
            'revisao' =>  '2025-02-04', //$revisaoDocumento,
            'versao' => 1, //$versaoDocumento,
            'caminhoarquivo' => 'caminhoaqui' //$caminho_arquivo
        ];

        var_dump($dadosDocumento);

        $this->gestaoProcessosArquivos->insert($dadosDocumento);

        return redirect()->to(site_url('/GPI/Documentos/Arquivos'));
    }
}
