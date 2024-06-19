<?php
// Helpers
include 'app/Helpers/legalizacao_helper.php';
?>

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
                            <li class="breadcrumb-item active" aria-current="page"> Legalização </li>
                            <li class="breadcrumb-item"> Processos </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Processos </h1>


                    <!-- Basic Card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                        </div>
                        <div class="card-body">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#processoModal">
                                Novo Processo
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="processoModal" tabindex="-1" role="dialog" aria-labelledby="processoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="processoModalLabel">Incluir Processo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="<?php echo base_url('Legalizacao/addProcesso') ?>" method="post">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDataInicio">Data Inicio</label>
                                                        <input type="date" class="form-control" id="inputDataInicio" name="inputDataInicio" placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputServico">Serviço</label>
                                                        <select id="inputServico" name="inputServico" class="form-control" required>
                                                            <option value="">Selecione...</option>
                                                            <?php foreach ($servicos as $servico) : ?>
                                                                <option value='<?php echo (int)$servico['cod']; ?>'><?php echo $servico['nome']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputCliente">Cliente</label>
                                                    <select id="inputCliente" name="inputCliente" class="form-control" required>
                                                        <option value="">Selecione...</option>
                                                        <?php foreach ($clientes as $cliente) : ?>
                                                            <option value='<?php echo $cliente['cod']; ?>'><?php echo $cliente['nome']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputContato">Contato</label>
                                                        <input type="text" class="form-control" id="inputContato" name="inputContato" placeholder="Nome">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputFone">Fone</label>
                                                        <input type="text" class="form-control" id="inputFone" name="inputFone" placeholder="Nº Telefone">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputResponsavel">Origem Demanda</label>
                                                        <select id="inputResponsavel" name="inputResponsavel" class="form-control">
                                                            <option selected>Selecione...</option>
                                                            <?php foreach ($envolvidos as $envolvido) : ?>
                                                                <option value='<?php echo $envolvido['cod']; ?>'><?php echo $envolvido['nome']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!--
                                                <div class="form-group">
                                                    <label for="inputObservacao">Trâmite</label>
                                                    <textarea class="form-control" id="inputObservacao" name="inputObservacao" rows="3" placeholder="Descrever observação."></textarea>
                                                </div>
                                                -->

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Tab Processos -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listagem de Processos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Data Inicio</th>
                                            <th>Cliente</th>
                                            <th>Serviço</th>
                                            <th>Origem Demanda</th>
                                            <th>Contato (Nome/Fone)</th>
                                            <th>Status</th>
                                            <th>Ult. Trâmite</th>
                                            <th>Financeiro</th>
                                            <th>Nº Processo</th>
                                            <th>Tempo Decorrido</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Data Inicio</th>
                                            <th>Cliente</th>
                                            <th>Serviço</th>
                                            <th>Origem Demanda</th>
                                            <th>Contato (Nome/Fone)</th>
                                            <th>Status</th>
                                            <th>Ult. Trâmite</th>
                                            <th>Financeiro</th>
                                            <th>Nº Processo</th>
                                            <th>Tempo Decorrido</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($processos as $processo) : ?>
                                            <tr>
                                                <td><?php echo $processo['cod']; ?></td>
                                                <td><?php echo implode("/", array_reverse(explode("-", $processo['datainicio']))); ?></td>
                                                <td><?php foreach ($clientes as $cliente) if ($cliente['cod'] == $processo['codempresa']) : echo $cliente['nome'];
                                                    endif; ?></td>
                                                <td><?php foreach ($servicos as $servico) if ($servico['cod'] == $processo['codservico']) : echo $servico['nome'];
                                                    endif; ?></td>
                                                <td><?php foreach ($envolvidos as $envolvido) if ($envolvido['cod'] == $processo['codenvolvido']) : echo $envolvido['nome'];
                                                    endif; ?></td>
                                                <td><?php echo $processo['contato']; ?></td>
                                                <td>
                                                    <?php foreach ($status as $stato) : ?>
                                                        <?php if ($stato['cod'] == $processo['codstatus']) : ?>
                                                            <?php switch ($stato['nome']) {
                                                                case "Novo":
                                                                    $varCor = "light";
                                                                    break;
                                                                case "Em Andamento":
                                                                    $varCor = "warning";
                                                                    break;
                                                                case "Pendente com Cliente":
                                                                    $varCor = "danger";
                                                                    break;
                                                                case "Finalizado":
                                                                    $varCor = "success";
                                                                    break;
                                                                case "Tramitando no Órgão":
                                                                    $varCor = "primary";
                                                                    break;
                                                            } ?>
                                                            <div class="alert alert-<?php echo $varCor; ?>" role="alert">
                                                                <?php echo $stato['nome']; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $ultTramite = array();
                                                    foreach ($processosdetalhes as $processosdetalhe)
                                                        if ($processosdetalhe['codprocesso'] == $processo['cod']) :
                                                            array_push($ultTramite, $processosdetalhe['datatramite'] . '|' . $processosdetalhe['codusuariotramite'] . '|' . $processosdetalhe['desctramite']);
                                                        endif;
                                                    $dadosTramite = explode('|', end($ultTramite));
                                                    if (count($dadosTramite) > 1) :
                                                        $dataFormatada = implode('/', array_reverse(explode('-', $dadosTramite[0])));
                                                        foreach ($usuarios as $usuario)
                                                            if ($usuario['cod'] == $dadosTramite[1]) :
                                                                echo  $dataFormatada . " | " . $usuario['nome'] . " | " . $dadosTramite[2];
                                                            endif;
                                                    endif;
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($processo['financeiro'] == 1) {
                                                        echo "Faturado";
                                                    } elseif ($processo['financeiro'] == 2) {
                                                        echo "Bonificado";
                                                    } else {
                                                        echo "A Definir";
                                                    } ?></td>
                                                <td><?php echo $processo['numeroprocesso']; ?></td>
                                                <td><?php echo tempoDecorrido($processo['datainicio'], date('Y-m-d')) . " Dia(s)"; ?></td>
                                                <td>

                                                    <!--<a data-toggle="modal" data-target="#editProcessoModal-<?php echo $processo['cod']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-pen"></i>
                                                    </a> -->

                                                    <a href='<?php echo base_url('Legalizacao/processosDetalhes') . '/' . $processo['cod']; ?>' class="btn btn-primary btn-circle btn-sm">
                                                        <i class="fas fa-search"></i>
                                                    </a>

                                                    <!-- <a data-toggle="modal" data-target="#docsProcessoModal-<?php echo $processo['cod']; ?>" class="btn btn-info btn-circle btn-sm">
                                                        <i class="fas fa-file-alt"></i>
                                                    </a> -->

                                                    <?php if (session()->get('nivel') <> 3) :  ?>
                                                        <a href='<?php echo base_url('Legalizacao/delProcesso') . '/' . $processo['cod']; ?>' class="btn btn-danger btn-circle btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (strlen($processo['nomedocprocesso']) > 0) : ?>
                                                        <a href='<?php echo base_url('#') . '/' . $processo['cod']; ?>' class="btn btn-secondary btn-circle btn-sm">
                                                            <i class="fas fa-file-alt"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                </td>

                                                <div class="modal fade" id="editProcessoModal-<?php echo $processo['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProcessoModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo base_url('Legalizacao/editProcesso') . '/' . $processo['cod']; ?>' method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="codEditProcesso" id="codEditProcesso" value='<?php echo $processo['cod']; ?>'>

                                                                    <div class="">

                                                                        <div class="form-group">
                                                                            <label for="inputEditStatus">Status</label>
                                                                            <select id="inputEditStatus" name="inputEditStatus" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <option value="2">Em Andamento</option>
                                                                                <option value="12">Pendente com Cliente</option>
                                                                                <option value="1">Finalizado</option>
                                                                                <option value="13">Tramitando no Órgão</option>
                                                                                <option value="14">Cliente Não deu Retorno</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputEditNProcesso">Nº Processo</label>
                                                                            <input type="text" class="form-control" id="inputEditNProcesso" name="inputEditNProcesso" value="<?php echo $processo['numeroprocesso']; ?>">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputServico">Serviço</label>
                                                                            <select id="inputServico" name="inputServico" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($servicos as $servico) : ?>
                                                                                    <option value='<?php echo (int)$servico['cod']; ?>'><?php echo $servico['nome']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">Caminho do arquivo:</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="customFile" name="arqcaminho">
                                                                                <label class="custom-file-label" for="customFile" data-browse="Procurar">Selecione o Arquivo</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="docsProcessoModal-<?php echo $processo['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="docsProcessoModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for=""><strong>Arquivo Nome:</strong></label>
                                                                            <p>
                                                                                <?php echo $processo['nomedocprocesso']; ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for=""><strong>Opções:</strong></label>
                                                                            <p>
                                                                                <a href='<?php echo base_url() . '/' . $processo['caminhodocprocesso']; ?>' class="btn btn-info btn-circle btn-sm">
                                                                                    <i class="fas fa-download"></i>
                                                                                </a>

                                                                                <a href='<?php echo base_url('Legalizacao/delArqProcesso') . '/' . $processo['cod']; ?>' class="btn btn-danger btn-circle btn-sm">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() . "/assets/theme/vendor/jquery/jquery.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "/assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"; ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() . "/assets/theme/vendor/jquery-easing/jquery.easing.min.js"; ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() . "/assets/theme/js/sb-admin-2.min.js"; ?>"></script>

    <!-- Page level plugins-->
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
    });
</script>