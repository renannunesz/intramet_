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
    <link href="assets/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/theme/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/theme/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="columns is-centered">
                                    <img class="is-centered ml-5 mt-4" width="400" height="300" src="<?php echo base_url('assets/img/grupoMetodos.png') ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">

                                        <?php if (session()->getFlashdata('msg') !== null) : ?>

                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <?php echo session()->getFlashdata('msg'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                        <?php endif ?>

                                        <h1 class="h4 text-gray-900 mb-4">Intranet Grupo Métodos</h1>
                                    </div>
                                    <form class="user" action="<?php echo base_url('Login/signIn') ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nomeUsuario" name="nomeUsuario" aria-describedby="UsuarioHelp" placeholder="Usuário">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="senhaUsuario" name="senhaUsuario" placeholder="Senha">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lembrar</label>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Esqueceu sua Senha?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/theme/vendor/jquery/jquery.min.js"></script>
    <script src="assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/theme/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/theme/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/theme/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/theme/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/theme/js/demo/datatables-demo.js"></script>
</body>

</html>