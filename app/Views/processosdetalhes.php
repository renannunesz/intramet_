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
        
                    <!-- Dados Gerais -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h2 mb-0 text-dark"><strong>Processo Nº: <?php echo $processo['cod']; ?> </strong></h1>                        
                    </div>


                    <!-- Tab Cab Tramite -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listagem de Processos</h6>
                        </div>
                        <div class="card-body">
                            <h1>AQUIIII</h1>
                        </div>
                    </div>


                    <!--Tabela-->
                    <table class="table text-dark table-bordered table-light">
                        <tbody>
                            <tr>
                                <th scope="row">Cliente:</th>
                                <td colspan="5">
                                    <?php foreach ($clientes as $cliente) if ($cliente['cod'] == $processo['codempresa']) : echo $cliente['nome'];
                                    endif; ?>
                                </td>
                            </tr>
                            <tr>

                    <!-- Tab Processos -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listagem de Processos</h6>
                        </div>
                        <div class="card-body">

                            <div class="conteiner">
                                <div class="row mb-4">
                                    <div class="col">
                                        <span class="font-weight-bold">Cliente: </span>
                                        <?php foreach ($clientes as $cliente) if ($cliente['cod'] == $processo['codempresa']) : echo $cliente['nome'];
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col">
                                        <span class="font-weight-bold">Serviço: </span>
                                        <?php foreach ($servicos as $servico) if ($servico['cod'] == $processo['codservico']) : echo $servico['nome'];
                                        endif; ?>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">Origem da Demanda: </span>
                                        <?php foreach ($envolvidos as $envolvido) if ($envolvido['cod'] == $processo['codenvolvido']) : echo $envolvido['nome'];
                                        endif; ?>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">Contato: </span>
                                        <?php echo $processo['contato']; ?>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col">
                                        <span class="font-weight-bold">Financeiro: </span>
                                        <?php
                                        if ($processo['financeiro'] == 1) {
                                            echo "Faturado";
                                        } elseif ($processo['financeiro'] == 2) {
                                            echo "Bonificado";
                                        } else {
                                            echo "A Definir";
                                        } ?>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col">
                                        <span class="font-weight-bold">Status: </span>
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
                                                    <span class="alert alert-<?php echo $varCor; ?> mb-1" role="alert"><?php echo $stato['nome']; ?></span> 
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">Tempo Decorrido: </span>
                                        <?php echo tempoDecorrido($processo['datainicio'], date('Y-m-d')) . " Dia(s)"; ?>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">Data da Finalização: </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Trâmite do Processo-->
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#processoModal">
                        <i class="fas fa-plus"></i> Novo Trâmite
                    </button>

                    <a href='<?php echo base_url('Legalizacao/Processos'); ?>' class="btn btn-warning mb-4">
                        <i class="fas fa-reply"></i> Voltar
                    </a>

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

                                    <form action='<?php echo base_url('Legalizacao/addTramiteProcesso'); ?>' method="post">

                                        <input type="hidden" name="codProcesso" id="codProcesso" value='<?php echo $processo['cod']; ?>'>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="inputTramite">Trâmite</label>
                                                <textarea class="form-control" id="inputTramite" name="inputTramite" rows="3" placeholder="Descreva o novo trâmite."></textarea>
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

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h2 mb-1 text-dark"><strong>Trâmites: </strong></h1>
                    </div>

                    <!--Tabela dos trâmites executados-->
                    <?php foreach ($processosdetalhes as $processodetalhe) : ?>

                        <!-- Trâmites executados-->
                        <div class="mb-2">
                            <div class="card border-left-primary shadow h-100">
                                <div class="card-body">

                                    <table class="w-100">
                                        <thead>
                                            <th><?php echo $processodetalhe['titulotramite']; ?></th>
                                            <th class="text-right">
                                                <small class="text">Criado em <?php echo implode("/", array_reverse(explode("-", $processodetalhe['datatramite']))); ?></small>
                                                <a href='<?php echo base_url('Legalizacao/delTramiteProcesso') . '/' . $processodetalhe['cod']; ?>' class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </th>
                                        </thead>
                                        <tbody>
                                            <td colspan="2">
                                                <p class="card-text"><?php echo $processodetalhe['desctramite']; ?></p>
                                            </td>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>

            </div>
            <br>



        </div>
    </div>

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