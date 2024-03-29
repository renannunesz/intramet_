<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet - G.MTDS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href='<?php echo base_url('assets/img/favicon.ico') ?>'>

</head>

<body style="background-color:#78AED3">

    <?php include 'navbar.php' ?>

    <div class="container-md d-flex justify-content-center pt-3" id="" name="">

        <form action="<?php echo base_url('public/Atas/salvar') ?>" method="post">
            <div class="card" style="width: 100rem;">

                <div class="card-header">

                    <div class="row">

                        <div class="col">
                            <h5 class="card-title">Ata</h5>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-sm" value="Salvar">
                            <button type="button" class="btn btn-secondary btn-sm"><a class="dropdown-item" href='<?php echo base_url('public/Atas'); ?>'>Cancelar</a></button>
                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="row">

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect04">Data</label>
                                    <input type="date" class="form-control" name="data" id="data" value="<?php echo isset($atas['data']) ? $atas['data'] : ''; ?>" required>
                                </div>

                            </div>

                            <div class="row">

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="2">Descrição</label>
                                    <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo isset($atas['descricao']) ? $atas['descricao'] : ''; ?>">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <input type="hidden" name="cod" id="cod" value="<?php echo isset($atas['cod']) ? $atas['cod'] : ''; ?>">
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>