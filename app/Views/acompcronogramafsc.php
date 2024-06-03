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
                            <li class="breadcrumb-item active" aria-current="page"> FisCon </li>
                            <li class="breadcrumb-item active" aria-current="page"> Acompanhamentos </li>
                            <li class="breadcrumb-item"> Cronograma Fiscal </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Acompanhamentos - Cronograma Fiscal </h1>


                    <!-- Basic Card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                        </div>
                        <div class="card-body">

                            <form action='<?php echo base_url('/Fiscon/Acompanhamentos/CronoFiscal'); ?>' method="get" enctype="multipart/form-data">

                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label for="competenciaCronoFiscal">Competência:</label>
                                        <input type="text" class="form-control" id="competenciaCronoFiscal" name="competenciaCronoFiscal" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>

                            </form>

                        </div>
                    </div>

                    <?php if ($competencia <> null) :  ?>

                        <!-- Basic Card -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Cronograma Fiscal: " . $competencia . " | Empresas: " . count($cronogramasfsc); ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                            Finalizadas</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php echo $empFinalizadas; ?>
                                                        </div>
                                                        <div class="text-xs font-weight-bold text-body text-uppercase mb-1">
                                                            Serviço: <?php echo $empFinalizadasServico['qtdEmpresas']; ?> | Comércio: <?php echo $empFinalizadasComercio['qtdEmpresas']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-check fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Finalizadas (%)
                                                        </div>
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-auto">
                                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                    <?php echo $percentualFinalizadas . "%"; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="progress progress-sm mr-2">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentualFinalizadas; ?>%" aria-valuenow="<?php echo $percentualFinalizadas; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="text-xs font-weight-bold text-body text-uppercase mb-1">
                                                                    Serviço: <?php echo $percentualFinalizadasServico . "%"; ?> | Comércio: <?php echo $percentualFinalizadasComercio . "%"; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-check-double fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-warning shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                            Pendentes</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php echo $empPendentes; ?>
                                                        </div>
                                                        <div class="text-xs font-weight-bold text-body text-uppercase mb-1">
                                                            Serviço: <?php echo $empPendentesServico['qtdEmpresas']; ?> | Comércio: <?php echo $empPendentesComercio['qtdEmpresas']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-exclamation fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-warning shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendentes (%)
                                                        </div>
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-auto">
                                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                    <?php echo $percentualPendentes . "%"; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="progress progress-sm mr-2">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percentualPendentes; ?>%" aria-valuenow="<?php echo $percentualPendentes; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="text-xs font-weight-bold text-body text-uppercase mb-1">
                                                                    Serviço: <?php echo $percentualPendentesServico . "%"; ?> | Comércio: <?php echo $percentualPendentesComercio . "%"; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab CronoFiscals -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> Cronograma de Execução Fiscal </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Cod.</th>
                                                <th>Empresa</th>
                                                <th>Equipe</th>
                                                <th>Curva</th>
                                                <th>Tempo Execução</th>
                                                <th>Responsável</th>
                                                <th>Competência</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Cod.</th>
                                                <th>Empresa</th>
                                                <th>Equipe</th>
                                                <th>Curva</th>
                                                <th>Tempo Execução</th>
                                                <th>Responsável</th>
                                                <th>Competência</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($cronogramasfsc as $registro) : ?>
                                                <tr class="align-middle text-center">
                                                    <td><?php echo $registro['codempresa']; ?></td>
                                                    <td><?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo $empresa['nome'];
                                                        endif; ?></td>
                                                    <td><?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo $empresa['equipe'] == "C" ? "Comércio" : "Serviço";
                                                        endif; ?></td>
                                                    <td><?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo $empresa['curva'];
                                                        endif; ?></td>
                                                    <td><?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo $empresa['chfiscal'];
                                                        endif; ?></td>
                                                    <td><?php foreach ($usuarios as $usuario) if ($usuario['cod'] == $registro['codresponsavel']) : echo $usuario['nome'];
                                                        endif; ?></td>
                                                    <td><?php echo $registro['competencia']; ?></td>
                                                    <?php switch ($registro['statusexecucao']) {
                                                        case 0:
                                                            $varCor = "success";
                                                            $desStatus = "Finalizado";
                                                            break;
                                                        case 1:
                                                            $varCor = "warning";
                                                            $desStatus = "Pendente";
                                                            break;
                                                    } ?>
                                                    <td class="table-<?php echo $varCor; ?>">
                                                        <?php echo $desStatus; ?>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

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