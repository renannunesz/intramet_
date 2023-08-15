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

    <div class="container-md d-flex justify-content-center pt-3" id="ctnrformfiltros" name="ctnrformfiltros">

        <div class="card" style="width: 100rem;">
            <div class="card-header">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo
                </button>

                <form action="<?php echo base_url('public/Topicos/salvar') ?>" method="post">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Tópico</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid">

                                        <div class="row">

                                            <div class="col">

                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Ata</label>
                                                    <select class="form-select" name="codata" id="codata">
                                                        <option selected value="">Selecione...</option>
                                                        <?php foreach ($atas as $ata) : ?>
                                                            <option value="<?php echo $ata['cod']; ?>"><?php echo implode("/", array_reverse(explode("-", $ata['data']))) . " - " . $ata['descricao']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">

                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Status</label>
                                                    <select class="form-select" name="codstatus" id="codstatus">
                                                        <option selected value="9">Novo</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">Assunto</label>
                                                <input type="text" class="form-control" name="assunto" id="assunto">
                                            </div>

                                        </div>

                                        <div class="row mb-3">

                                            <div class="input-group">
                                                <span class="input-group-text">Descrição</span>
                                                <textarea class="form-control" aria-label="Descrição" name="descricao" id="descricao"></textarea>
                                            </div>

                                        </div>

                                        <div class="row">


                                            <div class="col">

                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Origem</label>
                                                    <select class="form-select" name="codset_origem" id="codset_origem">
                                                        <option selected value="">Selecione...</option>
                                                        <?php foreach ($setores as $setor) : ?>
                                                            <option value="<?php echo $setor['cod'] ?>"><?php echo $setor['descricao'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">

                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Destino</label>
                                                    <select class="form-select" name="codset_destino" id="codset_destino">
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

                <h5 class="card-title">Tópicos</h5>

                <div class="row row-cols-5 justify-content-md-center align-middle">

                    <div class="col">

                        <div class="input-group mb-3">
                            <label class="input-group-text">Origem</label>
                            <select class="form-select" name="codset_origem" id="codset_origem">
                                <option selected value="">Selecione...</option>
                                <?php foreach ($setores as $setor) : ?>
                                    <option value="<?php echo $setor['cod'] ?>"><?php echo $setor['descricao'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="col">

                        <div class="input-group mb-3">
                            <label class="input-group-text">Destino</label>
                            <select class="form-select" name="codset_destino" id="codset_destino">
                                <option selected value="">Selecione...</option>
                                <?php foreach ($setores as $setor) : ?>
                                    <option value="<?php echo $setor['cod'] ?>"><?php echo $setor['descricao'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="col">

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="3">Status</label>
                            <select class="form-select" name="descricao" id="descricao">
                                <option selected value="">Selecione...</option>
                                <?php foreach ($status as $state) : ?>
                                    <option value='<?php echo $state['cod']; ?>'><?php echo $state['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="col">

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect04">Data</label>
                            <input type="date" class="form-control">
                        </div>

                    </div>

                    <div class="col">

                        <a href="#" class="btn btn-primary sm">Buscar</a>

                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid pt-3" id="ctnrtabtopicos" name="ctnrtabtopicos">

        <div class="card">
            <div class="card-body">

                <table class="table table-sm table-hover align-middle compact hover" name="gridtopicos" id="gridtopicos">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" style="width: 5%">ID Ata</th>
                            <th scope="col" style="width: 5%">Data Ata</th>
                            <th scope="col" style="width: 45%">Assunto</th>
                            <th scope="col" style="width: 10%">Setor Origem</th>
                            <th scope="col" style="width: 10%">Setor Destino</th>
                            <th scope="col" style="width: 10%">Status</th>
                            <th scope="col" style="width: 5%">Respostas</th>
                            <th scope="col" style="width: 5%">Ultima Resposta</th>
                            <th scope="col" style="width: 5%">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($topicos as $topico) : ?>
                            <tr>
                                <td><?php echo $topico['codata']; ?></td>
                                <td><?php foreach ($atas as $ata) if ($ata['cod'] == $topico['codata']) : echo implode("/", array_reverse(explode("-", $ata['data']))) ;
                                    endif; ?></td>
                                <td><?php echo $topico['assunto']; ?></td>
                                <td><?php foreach ($setores as $setor) if ($setor['cod'] == $topico['codset_origem']) : echo $setor['descricao'];
                                    endif; ?></td>
                                <td><?php foreach ($setores as $setor) if ($setor['cod'] == $topico['codset_destino']) : echo $setor['descricao'];
                                    endif; ?></td>
                                <td><?php foreach ($status as $state) if ($state['cod'] == $topico['codstatus']) : echo $state['descricao'];
                                    endif; ?></td>
                                <td><?php $i = 0;
                                    foreach ($topicosdetalhes as $detalhe) if ($detalhe['codtopico'] == $topico['cod']) : $i++;
                                    endif;
                                    echo $i; ?></td>
                                <td>...</td>
                                <td>

                                    <div class="row">
                                        <div class="col px-0" title="Respostas">
                                            <a href='<?php echo base_url('public/Topicos/editar') . '/' . $topico['cod']; ?>'>
                                                <button class="btn btn-warning btn-sm" value="<?php echo $topico['cod']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                    </svg>
                                                </button>
                                            </a>
                                        </div>

                                        <div class="col px-0" title="Finalizar">
                                            <a href='<?php echo base_url('public/Topicos/finalizar') . '/' . $topico['cod']; ?>'>
                                                <button class="btn btn-success btn-sm" value="<?php echo $topico['cod']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                    </svg>
                                                </button>
                                            </a>
                                        </div>

                                        <div class="col px-0" title="Apagar">
                                            <a href='<?php if ($i > 0) {
                                                            echo "javascript:void(0)";
                                                        } else {
                                                            echo base_url('public/Topicos/apagar') . '/' . $topico['cod'];
                                                        }  ?>'>
                                                <button class="btn btn-danger btn-sm" onclick="fncApagaTopico()" value="<?php echo $topico['cod']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
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
        $('#gridtopicos').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
            }
        });
    });

    function fncApagaTopico() {
        var x;
        var r = confirm("Verifique se existem respostas vinculadas antes de apagar.");
        if (r == true) {
            x = "Caso não existam respostas, o topico será apagado!";
        } 
        document.getElementById("demo").innerHTML = x;
    }
</script>
