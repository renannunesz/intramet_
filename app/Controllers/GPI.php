<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbgestaoprocessosModel;

class GPI extends BaseController
{

    private $gestaoProcessosDocumentos;

    public function __construct() {
        $this->gestaoProcessosDocumentos = new tbgestaoprocessosModel();
    }

    public function index()
    {
        //
    }

    public function gpiDocsFiscon()
    {
        return view('gpifiscon',[
            'docsFiscon' => $this->gestaoProcessosDocumentos->where('codsetor', 4)->find()
        ]);
    }

    public function addDocumento()
    {
        $codSetor = intval($this->request->getPost('codSetorFiscon'));
        $codTipoDocumento = 1;
        $nomeDocumento = $this->request->getPost('inputNomeDocumento');
        $arquivo = $this->request->getFile('arqcaminho');
        $caminhoPasta = ROOTPATH . "assets" . "/" . "uploads";
        $arquivo->move(ROOTPATH . 'assets/uploads');
        $caminho_arquivo = $caminhoPasta . "/" . $arquivo->getName();  
        $nomeArquivo = $arquivo->getName();

        $dadosDocumento = [
            'codsetor' => $codSetor,
            'nomedocumento' => $nomeDocumento,
            'codtipodocumento' => $codTipoDocumento,
            'nomearquivo' => $nomeArquivo
        ];

        $this->gestaoProcessosDocumentos->save($dadosDocumento);

        return redirect()->to(site_url('/GPI/Documentos/Fiscon'));
    }
}
