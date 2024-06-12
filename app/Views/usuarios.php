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
                            <li class="breadcrumb-item"> Usuários </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Usuários </h1>

                    <!-- Collapsable Card -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                            <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCard">
                            <div class="card-body">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novoUsuarioModal">
                                    Novo Usuário
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="novoUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="novoUsuarioModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="novoUsuarioModalLabel">Incluir Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="<?php echo base_url('#') ?>" method="post">

                                                    <div class="form row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputUsuario">Nome Usuário</label>
                                                            <input type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Nome">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputUsuario">Nome de Acesso</label>
                                                            <input type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Nome de Acesso">
                                                        </div>
                                                    </div>
                                                    <div class="form row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputUsuario">Senha</label>
                                                            <input type="password" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Senha">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputUsuario">Tipo</label>
                                                            <select name="" id=""  class="form-control">
                                                                <option value="">Selecione...</option>
                                                                <?php foreach ($usuariostipo as $tipo) : ?>
                                                                    <option value='<?php echo $tipo['cod']; ?>'><?php echo $tipo['nome']; ?></option>
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

                            </div>
                        </div>
                    </div>

                    <!-- Tab Usuarios -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Nome</th>
                                            <th>Nome Acesso</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Nome</th>
                                            <th>Nome Acesso</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($usuarios as $usuario) : ?>
                                            <tr>
                                                <td><?php echo $usuario['cod']; ?></td>
                                                <td><?php echo $usuario['nome']; ?></td>
                                                <td><?php echo $usuario['usuario']; ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#editUsuariosModal-<?php echo $usuario['cod']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href='<?php echo base_url('Usuarios/delUsuarios') . '/' . $usuario['cod']; ?>' class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>

                                                <div class="modal fade" id="editUsuariosModal-<?php echo $usuario['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUsuariosModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo base_url('Usuarios/editUsuarios') . '/' . $usuario['cod']; ?>' method="post">

                                                                    <input type="hidden" name="codEditUsuarios" id="codEditUsuarios" value='<?php echo $usuario['cod']; ?>'>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEditUsuarios">Nome</label>
                                                                            <input type="text" class="form-control" id="inputEditUsuarios" name="inputEditUsuarios" placeholder="Nome" value='<?php echo $usuario['nome']; ?>'>
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

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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