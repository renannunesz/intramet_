<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet - G.MTDS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magicsuggest/2.1.5/magicsuggest-min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magicsuggest/2.1.5/magicsuggest-min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <link rel="icon" type="image/x-icon" href='<?php echo base_url('assets/img/favicon.ico') ?>'>

</head>

<body style="background-color:#78AED3">

    <?php include 'navbar.php' ?>

    <div class="container-md d-flex justify-content-center pt-3" id="" name="">

        <div class="card" style="width: 100rem;">
            <div class="card-header">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nova
                </button>

                <form action="<?php echo base_url('public/Atas/salvar') ?>" method="post">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Atas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid">

                                        <div class="row">

                                            <div class="input-group mb-3">
                                                <label class="input-group-text">Data</label>
                                                <input type="date" class="form-control" name="data" id="data" required>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="input-group mb-3">
                                                <label class="input-group-text">Descrição</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="input-group mb-3">
                                                <label class="input-group-text">Parcitipantes</label>
                                                <select class="form-select" name="codenvolvidos" id="codenvolvidos" multiple="multiple" style="width: 80%;" required>
                                                    <option selectes value="">Selecione...</option>
                                                    <?php foreach ($envolvidos as $envolvido) : ?>
                                                        <option value='<?php echo $envolvido['cod']; ?>'><?php echo $envolvido['nome']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <div class="card-body">

                <h5 class="card-title">Atas</h5>

                <div class="row">

                    <p>Atas cadastradas: <?php echo count($atas); ?></p>

                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid pt-3" id="" name="">

        <div class="card">
            <div class="card-body">

                <table class="table table-sm table-hover align-middle compact hover" name="gridatas" id="gridatas">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" style="width: 5%">Data</th>
                            <th scope="col" style="width: 75%">Descrição</th>
                            <th scope="col" style="width: 5%">Topicos Vinculados</th>
                            <th scope="col" style="width: 5%">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($atas as $ata) : ?>
                            <tr>
                                <td><?php echo implode("/", array_reverse(explode("-", $ata['data']))); ?></td>
                                <td><?php echo $ata['descricao'] ?></td>
                                <td><?php $i = 0;
                                    foreach ($topicos as $topico) if ($ata['cod'] == $topico['codata']) : $i++;
                                    endif;
                                    echo $i; ?></td>
                                <td>

                                    <div class="row">

                                        <div class="col px-0" title="Apagar">

                                            <a href='<?php echo base_url('public/Atas/editar') . '/' . $ata['cod']; ?>'>
                                                <button class="btn btn-warning btn-sm" value="<?php echo $ata['cod']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>
                                                </button>
                                            </a>

                                        </div>

                                        <div class="col px-0" title="Apagar">

                                            <a href='<?php if ($i > 0) {
                                                            echo "javascript:void(0)";
                                                        } else {
                                                            echo base_url('public/Atas/apagar') . '/' . $ata['cod'];
                                                        } ?>'>
                                                <button class="btn btn-danger btn-sm" onclick="fncApagaAta()" value="<?php echo $ata['cod']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>
                                                </button>
                                            </a>

                                        </div>

                                    </div>

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
        $('#codenvolvidos').magicSuggest({});
    });

    $('#gridatas').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
        }
    });

    function fncApagaAta() {
        var x;
        var r = confirm("Verifique se existem topicos vinculados antes de apagar!");
        if (r == true) {
            x = "Caso não existam topicos, a ata será apagada!";
        }
        document.getElementById("demo").innerHTML = x;
    }
</script>