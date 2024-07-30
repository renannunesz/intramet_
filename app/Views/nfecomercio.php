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
                            <li class="breadcrumb-item active" aria-current="page"> Leitor XML/NF </li>
                            <li class="breadcrumb-item"> NFe Comércio </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> NFe Comércio </h1>


                    <!-- Basic Card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                        </div>
                        <div class="card-body">

                            <!-- Button trigger  -->
                            <button type="button" class="btn btn-primary">
                                Exportar
                            </button>

                        </div>
                    </div>

                    <!-- Tab NFe -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listagem de NFe</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Data Inicio</th>
                                            <th>Tipo</th>
                                            <th>Descrição</th>
                                            <th>Solicitante</th>
                                            <th>Responsável</th>
                                            <th>Status</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Data Inicio</th>
                                            <th>Tipo</th>
                                            <th>Descrição</th>
                                            <th>Solicitante</th>
                                            <th>Responsável</th>
                                            <th>Status</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($chamados as $chamado) : ?>
                                            <?php switch ($chamado['codstatus']) {
                                                case 1:
                                                    $bgtx = "bg-success text-white";
                                                    break;
                                                case 2:
                                                    $bgtx = "bg-warning text-dark";
                                                    break;
                                                case 9:
                                                    $bgtx = "bg-primary text-white";
                                                    break;
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $chamado['cod']; ?></td>
                                                <td><?php echo implode('/', array_reverse(explode('-', $chamado['datainicio']))); ?></td>
                                                <td><?php foreach ($tiposolicitacao as $tipo) if ($tipo['cod'] == $chamado['codtipo']) : echo $tipo['nome'];
                                                    endif; ?></td>
                                                <td><?php echo $chamado['descricao']; ?></td>
                                                <td><?php foreach ($usuarios as $usuario) if ($usuario['cod'] == $chamado['codsolicitante']) : echo $usuario['nome'];
                                                    endif; ?></td>
                                                <td><?php foreach ($usuarios as $usuario) if ($usuario['cod'] == $chamado['codresponsavel']) : echo $usuario['nome'];
                                                    endif; ?></td>
                                                <td class="<?php echo $bgtx; ?>"><?php foreach ($status as $stato) if ($stato['cod'] == $chamado['codstatus']) : echo $stato['nome'];
                                                                                    endif; ?></td>
                                                <td>
                                                    <a title="Definir Responsável" data-toggle="modal" data-target="#defResponsavel-<?php echo $chamado['cod']; ?>" class="btn btn-info btn-circle btn-sm">
                                                        <i class="fas fa-user-check"></i>
                                                    </a>
                                                    <a title="Editar" data-toggle="modal" data-target="#editarChamado-<?php echo $chamado['cod']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a title="Deletar" href='<?php echo site_url('TI/deletarChamado') . '/' . $chamado['cod']; ?>' class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a title="Finalizar" href='<?php echo site_url('TI/finalizarChamado') . '/' . $chamado['cod']; ?>' class="btn btn-success btn-circle btn-sm">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </td>

                                                <div class="modal fade" id="defResponsavel-<?php echo $chamado['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="defResponsavelModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo site_url('TI/definirResponsavel'); ?>' method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="codChamado" id="codChamado" value='<?php echo $chamado['cod']; ?>'>

                                                                    <div class="">

                                                                        <div class="form-group">
                                                                            <label for="inputResponsavel">Responsável</label>
                                                                            <select id="inputResponsavel" name="inputResponsavel" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <option value='16'>Josimar Gabriel</option>
                                                                                <option value='15'>João Victor</option>
                                                                                <option value='1'>Renan Nunes</option>
                                                                            </select>
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

                                                <div class="modal fade" id="editarChamado-<?php echo $chamado['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="editarChamadoModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo site_url('TI/editarChamado'); ?>' method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="codChamado" id="codChamado" value='<?php echo $chamado['cod']; ?>'>

                                                                    <div class="">

                                                                        <div class="form-group">
                                                                            <label for="inputTipoChamado">Tipo Chamado</label>
                                                                            <select id="inputTipoChamado" name="inputTipoChamado" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($tiposolicitacao as $tipo) : ?>
                                                                                    <option value='<?php echo (int)$tipo['cod']; ?>'><?php echo $tipo['nome']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputCodSolicitante">Solicitante</label>
                                                                            <select id="inputCodSolicitante" name="inputCodSolicitante" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($usuarios as $usuario) : ?>
                                                                                    <option value='<?php echo (int)$usuario['cod']; ?>'><?php echo $usuario['nome']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputDescricao">Descrição</label>
                                                                            <textarea class="form-control" id="inputDescricao" name="inputDescricao" rows="3"><?php echo $chamado['descricao']; ?></textarea>
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