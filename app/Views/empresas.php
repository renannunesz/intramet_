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
    <link href="../assets/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/theme/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/theme/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                            <li class="breadcrumb-item active" aria-current="page"> Cadastros </li>
                            <li class="breadcrumb-item"> Empresas </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Empresas (Cronograma) </h1>

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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clienteModal">
                                    Nova Empresa
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="clienteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="clienteModalLabel">Incluir Cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="<?php echo base_url('Clientes/addCliente') ?>" method="post">

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputDataInicio">Nome</label>
                                                            <input type="text" class="form-control" id="inputNomeCliente" name="inputNomeCliente" placeholder="Nome Cliente">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputServico">CPF / CNPJ</label>
                                                            <input type="text" class="form-control" id="inputCPFCNPJCliente" name="inputCPFCNPJCliente">
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

                            </div>
                        </div>
                    </div>

                    <!-- Tab clientes -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listagem de Empresas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Cod. Athenas</th>
                                            <th>Nome</th>
                                            <th>CNPJ</th>
                                            <th>C.H. Contábil</th>
                                            <th>C.H. Fiscal</th>
                                            <th>Curva</th>
                                            <th>Resp. Contábil</th>
                                            <th>Resp. Fiscal</th>
                                            <th>Ult. Att Contábil</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Cod. Athenas</th>
                                            <th>Nome</th>
                                            <th>CNPJ</th>
                                            <th>C.H. Contábil</th>
                                            <th>C.H. Fiscal</th>
                                            <th>Curva</th>
                                            <th>Resp. Contábil</th>
                                            <th>Resp. Fiscal</th>
                                            <th>Ult. Att Contábil</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($empresas as $empresa) : ?>
                                            <tr>
                                                <td><?php echo $empresa['cod']; ?></td>
                                                <td><?php echo $empresa['codathenas']; ?></td>
                                                <td><?php echo $empresa['nome']; ?></td>
                                                <td><?php echo $empresa['cnpj']; ?></td>
                                                <td><?php echo $empresa['chcontabil']; ?></td>
                                                <td><?php echo $empresa['chfiscal']; ?></td>
                                                <td><?php echo $empresa['curva']; ?></td>
                                                <td> <?php foreach ($usuarios as $usuario) if ($usuario['cod'] == $empresa['codresponsavelctb']) : echo $usuario['nome'];
                                                        endif; ?> </td>
                                                <td> <?php foreach ($usuarios as $usuario) if ($usuario['cod'] == $empresa['codresponsavelfsc']) : echo $usuario['nome'];
                                                        endif; ?> </td>
                                                <td><?php echo $empresa['atualizacaocontabil']; ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#editEmpresaModal-<?php echo $empresa['cod']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href='<?php echo base_url('Clientes/delCliente') . '/' . $empresa['cod']; ?>' class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>

                                                <div class="modal fade" id="editEmpresaModal-<?php echo $empresa['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="editEmpresaModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo base_url('Fiscon/editEmpresa') . '/' . $empresa['cod']; ?>' method="post">

                                                                    <input type="hidden" name="codEditEmpresa" id="codEditEmpresa" value='<?php echo $empresa['cod']; ?>'>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputCodAthenasCliente">Cod. Athenas</label>
                                                                            <input type="text" class="form-control" id="inputCodAthenasEmpresa" name="inputCodAthenasEmpresa" placeholder='<?php echo $empresa['codathenas']; ?>'>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputEditCNPJEmpresa">CNPJ</label>
                                                                            <input type="text" class="form-control" id="inputEditCNPJEmpresa" name="inputEditCNPJEmpresa" placeholder='<?php echo $empresa['cnpj']; ?>'>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputEditCurvaEmpresa">Curva</label>
                                                                            <input type="text" class="form-control" id="inputEditCurvaEmpresa" name="inputEditCurvaEmpresa" placeholder='<?php echo $empresa['curva']; ?>'>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md">
                                                                            <label for="inputEditNomeEmpresa">Nome</label>
                                                                            <input type="text" class="form-control" id="inputEditNomeEmpresa" name="inputEditNomeEmpresa" placeholder='<?php echo $empresa['nome']; ?>'>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3">
                                                                            <label for="inputEditCHContabilEmpresa">C.H. Contábil</label>
                                                                            <input type="text" class="form-control" id="inputEditCHContabilEmpresa" name="inputEditCHContabilEmpresa" placeholder='<?php echo $empresa['chcontabil']; ?>'>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="inputRespCTB">Resp. Contábil</label>
                                                                            <select id="inputRespCTB" name="inputRespCTB" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($usuarios as $usuario) : ?>
                                                                                    <option value='<?php echo (int)$usuario['cod']; ?>'><?php echo $usuario['nome']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="inputEditCHFiscalEmpresa">C.H. Fiscal</label>
                                                                            <input type="text" class="form-control" id="inputEditCHFiscalEmpresa" name="inputEditCHFiscalEmpresa" placeholder='<?php echo $empresa['chfiscal']; ?>'>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="inputRespFSC">Resp. Fiscal</label>
                                                                            <select id="inputRespFSC" name="inputRespFSC" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($usuarios as $usuario) : ?>
                                                                                    <option value='<?php echo (int)$usuario['cod']; ?>'><?php echo $usuario['nome']; ?></option>
                                                                                <?php endforeach; ?>
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
    <script src="../assets/theme/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/theme/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/theme/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/theme/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/theme/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/theme/js/demo/datatables-demo.js"></script>

</body>

</html>