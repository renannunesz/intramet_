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

    public function arqAntaqMensais()
    {

        $arquivo = $this->request->getFile('arqcaminho');
        $caminhoPasta = ROOTPATH . "assets" . "/" . "uploads";

        if (isset($arquivo)) {

            $arquivo->move(ROOTPATH . 'assets/uploads');
            $caminho_arquivo = $caminhoPasta . "/" . $arquivo->getName();

            return view('antaqmensais', [
                'dadosexcel' => $this->ler_excel($caminho_arquivo),
                'caminho_arquivo' => $caminho_arquivo
            ]);
        } else {

            return view('antaqmensais');
        }
    }

    public function expAntaqMensais()
    {

        $anoReferencia = $this->request->getPost('inputAno');
        $mesReferencia = $this->request->getPost('inputMes');
        $caminhoArquivo = $this->request->getPost('arqcaminho');
        $nomeArquivo = "ARQ_CODERN_" . $anoReferencia . "_" . $mesReferencia .  ".xml";
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
            if (strlen($dados[0]) <= 15) {
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

    public function arqAntaqAnuais()
    {

        $arquivo = $this->request->getFile('arqcaminho');
        $caminhoPasta = ROOTPATH . "assets" . "/" . "uploads";

        if (isset($arquivo)) {

            $arquivo->move(ROOTPATH . 'assets/uploads');
            $caminho_arquivo = $caminhoPasta . "/" . $arquivo->getName();

            return view('antaqanuais', [
                'dadosexcel' => $this->ler_excel($caminho_arquivo),
                'caminho_arquivo' => $caminho_arquivo
            ]);
        } else {

            return view('antaqanuais');
        }
    }

    public function expAntaqAnuais()
    {

        $anoReferencia = $this->request->getPost('inputAno');
        //$mesReferencia = $this->request->getPost('inputMes');
        $caminhoArquivo = $this->request->getPost('arqcaminho');
        $nomeArquivo = "BPA_CODERN_" . $anoReferencia . ".xml";
        $arqExcel = $this->ler_excel($caminhoArquivo);
        $indiceCampo = 0;
        $arrayContasValores = [];
        $xml = new SimpleXMLElement('<EnvioDemonstracao/>');

        $xml->addChild('RazaoSocial', 'COMPANHIA DOCAS DO RIO GRANDE DO NORTE-CODERN');
        $xml->addChild('CNPJ', '34040345000190');
        $xml->addChild('AnoExercicio', $anoReferencia);
        //$xml->addChild('MesReferencia', $mesReferencia);
        $contas = $xml->addChild('contas');

        foreach ($arqExcel as $dados) {
            if (strlen($dados[0]) <= 15) {
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

    public function leitorXMLComercio()
    {

        $arquivosXML = $this->request->getFiles('arquivo');

        if (empty($arquivosXML)) {

            return view('leitorxmlcomercio');

        } else {            

            foreach ($arquivosXML['arquivo'] as $arquivo) {

                $arquivo->move(ROOTPATH . 'assets/uploads/xmlcomercio/' . date("YmdHis"));
            }

            return view('leitorxmlcomercio', [

                'pastaXML' => ROOTPATH . 'assets/uploads/xmlcomercio/' . date("YmdHis") . "/*.xml",

            ]);
        }
    }

    public function expXMLComercio()
    {

        $pastaXML = $this->request->getPost('pastaXML');
        $i = 2;

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Status');
        $sheet->setCellValue('B1', 'Nº Nota');
        $sheet->setCellValue('C1', 'Emissão');
        $sheet->setCellValue('D1', 'Fornecedor CNPJ');
        $sheet->setCellValue('E1', 'Fornecedor');
        $sheet->setCellValue('F1', 'Cliente CNPJ');
        $sheet->setCellValue('G1', 'Cliente');
        $sheet->setCellValue('H1', 'Produto');
        $sheet->setCellValue('I1', 'CFOP');
        $sheet->setCellValue('J1', 'NCM');
        $sheet->setCellValue('K1', 'Quantidade');
        $sheet->setCellValue('L1', 'Valor UND');
        $sheet->setCellValue('M1', 'Valor Total');

        $sheet->getStyle('A1:M1')->getFont()->setBold(true);

        foreach (glob($pastaXML) as $arquivo) {
            $notaXML = simplexml_load_file($arquivo);
            foreach ($notaXML->NFe->infNFe->det as $nfItens) {

                $sheet->setCellValue('A'.$i, "Normal" );
                $sheet->setCellValue('B'.$i, $notaXML->NFe->infNFe->ide->nNF);
                $sheet->setCellValue('C'.$i, $notaXML->NFe->infNFe->ide->dhEmi);
                $sheet->setCellValue('D'.$i, $notaXML->NFe->infNFe->emit->CNPJ);
                $sheet->setCellValue('E'.$i, $notaXML->NFe->infNFe->emit->xNome);
                $sheet->setCellValue('F'.$i, $notaXML->NFe->infNFe->dest->CNPJ);
                $sheet->setCellValue('G'.$i, $notaXML->NFe->infNFe->dest->xNome);
                $sheet->setCellValue('H'.$i, $nfItens->prod->xProd);
                $sheet->setCellValue('I'.$i, $nfItens->prod->CFOP);
                $sheet->setCellValue('J'.$i, $nfItens->prod->NCM);
                $sheet->setCellValue('K'.$i, $nfItens->prod->qCom);                
                $sheet->setCellValue('L'.$i, (float)$nfItens->prod->vUnCom);              
                $sheet->setCellValue('M'.$i, (float)$nfItens->prod->vProd);
                $i++;

            }
        }

        // Rename worksheet
        $sheet->setTitle('dados_nfe');

        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="dados_nfe.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');

    }

    public function leitorXMLServico()
    {

        $arquivosXML = $this->request->getFiles('arquivo');

        if (empty($arquivosXML)) {

            return view('leitorxmlservico');

        } else {

            foreach ($arquivosXML['arquivo'] as $arquivo) {

                $arquivo->move(ROOTPATH . 'assets/uploads/xmlservico/' . date("YmdHis"));
            }

            return view('leitorxmlservico', [
                'pastaXML' => ROOTPATH . 'assets/uploads/xmlservico/' . date("YmdHis") . "/*.xml",
            ]);
        }
    }

    public function expXMLServico()
    {

        $pastaXML = $this->request->getPost('pastaXML');
        $i = 2;

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Status');
        $sheet->setCellValue('B1', 'Nº Nota');
        $sheet->setCellValue('C1', 'Razão Social Prestador');
        $sheet->setCellValue('D1', 'Razão Social Tomador');
        $sheet->setCellValue('E1', 'CNPJ/CPF Tomador');
        $sheet->setCellValue('F1', 'Cod. Municipio');
        $sheet->setCellValue('G1', 'UF');
        $sheet->setCellValue('H1', 'Cod. Serviço');
        $sheet->setCellValue('I1', 'Discriminação');
        $sheet->setCellValue('J1', 'Vlr Total');
        $sheet->setCellValue('K1', 'Vlr Deduções');
        $sheet->setCellValue('L1', 'Base de Cálculo');
        $sheet->setCellValue('M1', 'Aliquota %');
        $sheet->setCellValue('N1', 'Vlr ISS');
        $sheet->setCellValue('O1', 'Vlr INSS');
        $sheet->setCellValue('P1', 'Vlr IR');
        $sheet->setCellValue('Q1', 'Vlr CSLL');
        $sheet->setCellValue('R1', 'Vlr COFINS');
        $sheet->setCellValue('S1', 'Vlr PIS');
        $sheet->setCellValue('T1', 'ISS Ret.');
        $sheet->setCellValue('U1', 'Vlr Outras Retenções');
        $sheet->setCellValue('V1', 'Hora Emissao');
        $sheet->setCellValue('w1', 'Data Prestação');

        $sheet->getStyle('A1:W1')->getFont()->setBold(true);

        foreach (glob($pastaXML) as $arquivo) {
            $notaXML = simplexml_load_file($arquivo);
            foreach ($notaXML->Nfse->InfNfse->Servico as $nfItens) {

                $sheet->setCellValue('A'.$i, isset($notaXML->NfseCancelamento) ? 'CANCELADA' : 'ATIVA' );
                $sheet->setCellValue('B'.$i, $notaXML->Nfse->InfNfse->Numero);
                $sheet->setCellValue('C'.$i, $notaXML->Nfse->InfNfse->PrestadorServico->NomeFantasia);
                $sheet->setCellValue('D'.$i, $notaXML->Nfse->InfNfse->TomadorServico->RazaoSocial);
                $sheet->setCellValue('E'.$i, (string) $notaXML->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cnpj . $notaXML->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cpf);
                $sheet->setCellValue('F'.$i, $notaXML->Nfse->InfNfse->Servico->CodigoMunicipio);
                $sheet->setCellValue('G'.$i, $notaXML->Nfse->InfNfse->TomadorServico->Endereco->Uf);
                $sheet->setCellValue('H'.$i, $notaXML->Nfse->InfNfse->Servico->ItemListaServico);
                $sheet->setCellValue('I'.$i, $notaXML->Nfse->InfNfse->Servico->Discriminacao);
                $sheet->setCellValue('J'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorServicos);
                $sheet->setCellValue('K'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorDeducoes);  
                $sheet->setCellValue('L'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->BaseCalculo);              
                $sheet->setCellValue('M'.$i, (((float) $notaXML->Nfse->InfNfse->Servico->Valores->Aliquota) * 100));
                $sheet->setCellValue('N'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorIss);
                $sheet->setCellValue('O'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorInss);
                $sheet->setCellValue('P'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorIr);
                $sheet->setCellValue('Q'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorCsll);
                $sheet->setCellValue('R'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorCofins);
                $sheet->setCellValue('S'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorPis);
                $sheet->setCellValue('T'.$i, $notaXML->Nfse->InfNfse->Servico->Valores->IssRetido = 1 ? "Sim" : "Não");
                $sheet->setCellValue('U'.$i, (float) $notaXML->Nfse->InfNfse->Servico->Valores->OutrasRetencoes);
                $sheet->setCellValue('V'.$i, date('d/m/Y H:i:s', strtotime($notaXML->Nfse->InfNfse->DataEmissao)));
                $sheet->setCellValue('W'.$i, date('d/m/Y', strtotime($notaXML->Nfse->InfNfse->Competencia)));
                $i++;

            }
        }

        // Rename worksheet
        $sheet->setTitle('dados_nfse');

        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="dados_nfe.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');

    }    
}
