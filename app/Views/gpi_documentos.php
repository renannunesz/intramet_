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
                            <li class="breadcrumb-item active" aria-current="page"> Gestão de Processos Internos (G.P.I) </li>
                            <li class="breadcrumb-item"> Documentos </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Documentos </h1>

                    <?php if (session()->get('nivel') <> 3) :  ?>

                    <!-- Basic Card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                        </div>
                        <div class="card-body">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#processoModal">
                                Novo Documento
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="processoModal" tabindex="-1" role="dialog" aria-labelledby="processoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="processoModalLabel"> Incluir Documento </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action='<?php echo site_url('GPI/addDocumento'); ?>' method="post" enctype="multipart/form-data">

                                                <input type="hidden" name="codUsuario" id="codUsuario" value='<?php echo session()->get('codigousuario'); ?>'>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputCodDocumento">Codigo</label>
                                                        <input type="text" class="form-control" id="inputCodDocumento" name="inputCodDocumento">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputSetor">Setor</label>
                                                        <select id="inputSetor" name="inputSetor" class="form-control" required>
                                                            <option value="">Selecione...</option>
                                                            <?php foreach ($setores as $setor) : ?>
                                                                <option value='<?php echo $setor['cod']; ?>'><?php echo $setor['nome']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputVersao">Versão</label>
                                                        <input type="text" class="form-control" id="inputVersao" name="inputVersao">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputRevisao">Data Revisão</label>
                                                        <input type="date" class="form-control" id="inputRevisao" name="inputRevisao">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="inputDescricao">Descrição POP</label>
                                                        <input type="text" class="form-control" name="inputDescricao" id="inputDescricao">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Caminho do arquivo:</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="arqcaminho">
                                                        <label class="custom-file-label" for="customFile" data-browse="Procurar">Selecione o Arquivo</label>
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

                    <?php endif; ?>

                    <!-- Tab Chamados -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Documentos Disponíveis </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>POP</th>
                                            <th>Revisão</th>
                                            <th>Setor</th>
                                            <th>Versão</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>POP</th>
                                            <th>Revisão</th>
                                            <th>Setor</th>
                                            <th>Versão</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($gpidocumentos as $gpidocumento) : ?>
                                            <tr>
                                                <td><?php echo $gpidocumento['cod']; ?></td>
                                                <td><?php echo $gpidocumento['descricao']; ?></td>
                                                <td><?php echo date("d/m/Y", strtotime($gpidocumento['revisao'])); ?></td>
                                                <td><?php foreach ($setores as $setor) if ($setor['cod'] == $gpidocumento['codsetor']) : echo $setor['nome'];
                                                    endif; ?></td>
                                                <td><?php echo $gpidocumento['versao']; ?></td>
                                                <td>Editar/Excluir/Baixar</td>
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
<script>
    $('#customFile').on('change', function() {
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>