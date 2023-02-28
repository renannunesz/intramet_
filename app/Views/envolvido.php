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

        <form action='<?php echo base_url('public/Envolvidos/salvar') ?>' method="post">
            <div class="card" style="width: 50rem;">
                <div class="card-header">

                    <div class="row">

                        <div class="col">
                            <h5 class="card-title">Envolvido</h5>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-sm" value="Salvar">
                            <button type="button" class="btn btn-secondary btn-sm"><a class="dropdown-item" href='<?php echo base_url('public/Envolvidos'); ?>'>Cancelar</a></button>
                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col">

                                <div class="input-group mb-3">

                                    <label class="input-group-text">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo isset($envolvido['nome']) ? $envolvido['nome'] : ''; ?>">

                                </div>

                            </div>

                            <div class="col">

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="2">Setor</label>
                                    <select class="form-select" id="codsetor" name="codsetor" required>
                                        <option selected value="">Selecione...</option>
                                        <?php foreach ($setores as $setor) : ?>
                                            <option value="<?php echo $setor['cod'] ?>"><?php echo $setor['descricao'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <input type="hidden" name="cod" id="cod" value="<?php echo isset($envolvido['cod']) ? $envolvido['cod'] : '' ; ?>">

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>