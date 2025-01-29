<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Métodos - Intranet</title>
    <link rel="icon" type="image/x-icon" href='<?php echo base_url('assets/img/favicon.ico') ?>'>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() . "/assets/theme/vendor/fontawesome-free/css/all.min.css"; ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() . "/assets/theme/css/sb-admin-2.min.css" ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() . "/assets/theme/vendor/datatables/dataTables.bootstrap4.min.css"; ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'navbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <nav aria-label="Page breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"> Utilitários </li>
                            <li class="breadcrumb-item"> Leitor XML </li>
                            <li class="breadcrumb-item"> Notas de Serviço </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Leitor XML - Notas Serviço </h1>

                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCardExample">
                            <div class="card-body">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#processoModal">
                                    Carregar Arquivos
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="processoModal" tabindex="-1" role="dialog" aria-labelledby="processoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="processoModalLabel">Arquivos XML - Notas Serviço</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action='<?php echo site_url('/Utilitarios/leitorXMLServico') ?>' method="post" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="">Caminho dos arquivos:</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile" name="arquivo[]" multiple>
                                                            <label class="custom-file-label" for="customFile" data-browse="Procurar">Selecione os arquivos.</label>
                                                        </div>
                                                        <small id="helpId" class="form-text text-muted"> Selecione os arquivos ".xml" das notas de comécio. </small>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary">Carregar</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dados - XML Serviço</h6>
                        </div>
                        <div class="card-body">

                            <?php if (isset($pastaXML)) : ?>
                                <div class="mb-1">

                                    <form action='<?php echo site_url('Utilitarios/expXMLServico'); ?>' method="post">
                                        <input type="hidden" name="pastaXML" id="pastaXML" value='<?php echo $pastaXML; ?>'>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-file-excel"></i> Salvar ".xls"
                                        </button>
                                    </form>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Nº Nota</th>
                                                <th>Razão Social Prestador</th>
                                                <th>Razão Social Tomador</th>
                                                <th>CNPJ/CPF Tomador</th>
                                                <th>Cod. Municipio</th>
                                                <th>UF</th>
                                                <th>Cod. Serviço</th>
                                                <th>Discriminação</th>
                                                <th>Vlr Total</th>
                                                <th>Vlr Deduções</th>
                                                <th>Base de Cálculo</th>
                                                <th>Aliquota%</th>
                                                <th>Vlr ISS</th>
                                                <th>Vlr INSS</th>
                                                <th>Vlr IR</th>
                                                <th>Vlr CSLL</th>
                                                <th>Vlr COFINS</th>
                                                <th>Vlr PIS</th>
                                                <th>ISS Ret.</th>
                                                <th>Vlr Outras Retenções</th>
                                                <th>Hora Emissao</th>
                                                <th>Data Prestação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach (glob($pastaXML) as $arquivo) : ?>
                                                <?php $notaXML = simplexml_load_file($arquivo); ?>
                                                <?php foreach ($notaXML->Nfse->InfNfse->Servico as $nfItens) : ?>
                                                    <tr>
                                                        <td><?php echo isset($notaXML->NfseCancelamento) ? 'CANCELADA' : 'ATIVA'; ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->Numero; ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->PrestadorServico->NomeFantasia; ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->TomadorServico->RazaoSocial; ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cnpj . $notaXML->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cpf; ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->Servico->CodigoMunicipio; ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->TomadorServico->Endereco->Uf; ?></td>                                                        
                                                        <td><?php echo $notaXML->Nfse->InfNfse->Servico->ItemListaServico; ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->Servico->Discriminacao; ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorServicos, 2, ',', '');?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorDeducoes, 2, ',', ''); ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->BaseCalculo, 2, ',', '');?></td>
                                                        <td><?php echo (((float) $notaXML->Nfse->InfNfse->Servico->Valores->Aliquota) * 100); ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorIss, 2, ',', ''); ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorInss, 2, ',', ''); ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorIr, 2, ',', ''); ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorCsll, 2, ',', ''); ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorCofins, 2, ',', ''); ?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->ValorPis, 2, ',', ''); ?></td>
                                                        <td><?php echo $notaXML->Nfse->InfNfse->Servico->Valores->IssRetido = 1 ? "Sim" : "Não" ;?></td>
                                                        <td><?php echo number_format((float) $notaXML->Nfse->InfNfse->Servico->Valores->OutrasRetencoes, 2, ',', ''); ?></td>
                                                        <td><?php echo date('d/m/Y H:i:s', strtotime($notaXML->Nfse->InfNfse->DataEmissao)); ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($notaXML->Nfse->InfNfse->Competencia)); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() . "/assets/theme/vendor/jquery/jquery.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "/assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"; ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() . "/assets/theme/vendor/jquery-easing/jquery.easing.min.js"; ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() . "/assets/theme/js/sb-admin-2.min.js"; ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() . "/assets/theme/vendor/datatables/jquery.dataTables.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "/assets/theme/vendor/datatables/dataTables.bootstrap4.min.js"; ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() . "/assets/theme/js/demo/datatables-demo.js"; ?>"></script>

</body>

</html>
<script>
    $('#customFile').on('change', function() {
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>