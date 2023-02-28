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

        <div class="card" style="width: 30rem;">

            <form action="<?php echo base_url('public/Setores/salvar') ?>" method="post">
                <div class="card-header">

                    <div class="row">

                        <div class="col">
                            <h5 class="card-title">Setor</h5>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-sm" value="Salvar">
                            <button type="button" class="btn btn-secondary btn-sm"><a class="dropdown-item" href='<?php echo base_url('public/Setores'); ?>'>Cancelar</a></button>
                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect04">Descrição</label>
                            <input type="text" class="form-control" name="descricao" id="descricao" value='<?php echo isset($setor['descricao']) ? $setor['descricao'] : '' ; ?>'>
                        </div>

                    </div>

                </div>

                <input type="hidden" value="<?php echo isset($setor['cod']) ? $setor['cod'] : '' ; ?>" name="cod" id="cod" >

            </form>

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>