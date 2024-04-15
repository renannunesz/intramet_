<?php

namespace App\Controllers;

require 'vendor/autoload.php';

use DOMDocument;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use SimpleXMLElement;

helper('xml');

class Utilitarios extends BaseController
{
    public function index()
    {

        $arquivo = $this->request->getFile('arqcaminho');
        $caminhoPasta = ROOTPATH . 'assets\uploads';

        if (isset($arquivo)) {

            $arquivo->move(ROOTPATH . 'assets/uploads');
            $caminho_arquivo = $caminhoPasta . '/' . $arquivo->getName();

            return view('antaqbpm', [
                'dadosexcel' => $this->ler_excel($caminho_arquivo),
                'caminho_arquivo' => $caminho_arquivo
            ]);
        } else {
            return view('antaqbpm');
        }
    }

    public function ler_excel($caminho_arquivo)
    {
        // Caminho para o arquivo Excel
        //$caminho_arquivo = 'D:\Projetos\ANTAQ\assets\arquivos\Areia Branca 2021.xlsx';

        // Carregue o arquivo Excel
        $spreadsheet = IOFactory::load($caminho_arquivo);

        // Obtenha a planilha ativa (normalmente a primeira)
        $worksheet = $spreadsheet->getActiveSheet();

        $dadoCelula = $worksheet->toArray();

        return $dadoCelula;
    }

    public function exportaBPM()
    {

        $anoReferencia = $this->request->getPost('inputAno');
        $mesReferencia = $this->request->getPost('inputMes');
        $caminhoArquivo = $this->request->getPost('arqcaminho');
        $nomeArquivo = "BPM_CODERN_" . $anoReferencia . "_" . $mesReferencia .  ".xml";
        $arqExcel = $this->ler_excel($caminhoArquivo);
        $indiceCampo = 0;
        $arrayContasValores = [];
        $xml = new SimpleXMLElement('<EnvioDemonstracao/>');

        $xml->addChild('RazaoSocial', 'COMPANHIA DOCAS DO RIO GRANDE DO NORTE-CODERN');
        $xml->addChild('CNPJ', '34040345000190');
        $xml->addChild('AnoExercicio', $anoReferencia);
        $xml->addChild('MesReferencia', $mesReferencia);
        $contas = $xml->addChild('contas');

        foreach ($arqExcel as $dados) {
            if (strlen($dados[0]) <= 7) {
                $classConta = $dados[0];
                $valorConta = str_replace(",", "", $dados[2]);
                $conta = $contas->addChild('conta');
                $codigo = $conta->addChild('codigo', $classConta);
                $valor = $conta->addChild('valor', $valorConta);
                //$arrayContasValores[$indiceCampo] = [$classConta,$valorConta];
            }
            $indiceCampo++;
        }

        $reordenado = array_values($arrayContasValores);
        //dd($reordenado);       

        // Define o tipo de conteúdo da resposta como XML
        $this->response->setContentType('text/xml');

        // Envia o XML como resposta
        $this->response->setBody($xml->asXML());

        //echo $xml->asXML();

        // Define o cabeçalho Content-Disposition para fazer o navegador baixar o arquivo
        $this->response->setHeader('Content-Disposition', 'attachment; filename="' . $nomeArquivo . '"');

        // Retorna a resposta
        return $this->response;
    }
}
