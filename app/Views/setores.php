<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet - G.MTDS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <link rel="icon" type="image/x-icon" href='<?php echo base_url('assets/img/favicon.ico') ?>'>

</head>

<body style="background-color:#78AED3">

    <?php include 'navbar.php' ?>

    <div class="container-md d-flex justify-content-center pt-3" id="" name="">

        <div class="card" style="width: 50rem;">
            <div class="card-header">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo
                </button>

                <form action="<?php echo base_url('public/Setores/salvar') ?>" method="post">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Setores</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid">

                                        <div class="row">

                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">Descrição</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Salvar">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

            <div class="card-body">

                <h5 class="card-title">Setores</h5>

                <div class="row">

                    <p>Setores cadastrados: <?php echo count($setores); ?></p>

                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid pt-3" id="" name="" style="width: 50rem;">


        <div class="card">
            <div class="card-body">

                <table class="table table-sm align-middle compact stripe hover" name="gridsetores" id="gridsetores">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Cod</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($setores as $setor) : ?>
                            <tr>
                                <td><?php echo $setor['cod'] ?></td>
                                <td><?php echo $setor['descricao'] ?></td>
                                <td>
                                    <a href='<?php echo base_url('public/Setores/editar') . '/' . $setor['cod']; ?>'><button class="btn btn-warning btn-sm" value="<?php echo $setor['cod']; ?>">Editar</button></a>
                                    <a href='<?php echo base_url('public/Setores/apagar') . '/' . $setor['cod']; ?>'><button class="btn btn-danger btn-sm" value="<?php echo $setor['cod']; ?>">Apagar</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>

<script>
    $(document).ready(function() {
        $('#gridsetores').DataTable({
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
            }
        }); 
    });
</script>