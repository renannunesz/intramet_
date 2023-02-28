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

    <div style="background-color:#78AED3">

        <div class="container-md d-flex justify-content-center pt-3" id="ctnrformfiltros" name="ctnrformfiltros">

            <div class="card" style="width: 100rem;">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-4">
                            Acompanhamento de Topico
                        </div>
                        <div class="col-md-4 ms-auto">
                            <a href='<?php echo base_url('public/Topicos'); ?>'><button type="button" class="btn btn-warning btn-sm">Voltar</button></a>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <h5 class="card-title">Tópico - <?php echo $topicos['assunto']; ?></h5>

                    <div class="row row-cols-5 justify-content-md-center align-middle">

                        <div class="col">

                            <div class="input-group mb-3">
                                <label class="input-group-text">Setor Origem:</label>
                                <input type="text" class="form-control" value="<?php foreach ($setores as $setor) if ($setor['cod'] == $topicos['codset_origem']) : echo $setor['descricao'];
                                                                                endif; ?>" disabled>
                            </div>

                        </div>

                        <div class="col">

                            <div class="input-group mb-3">
                                <label class="input-group-text">Setor Destino:</label>
                                <input type="text" class="form-control" value="<?php foreach ($setores as $setor) if ($setor['cod'] == $topicos['codset_destino']) : echo $setor['descricao'];
                                                                                endif; ?>" disabled>
                            </div>

                        </div>

                        <div class="col">

                            <div class="input-group mb-3">
                                <label class="input-group-text">Status Tópico</label>
                                <input type="text" class="form-control" value="<?php foreach ($status as $state) if ($state['cod'] == $topicos['codstatus']) : echo $state['descricao'];
                                                                                endif; ?>" disabled>
                            </div>

                        </div>

                    </div>
                    <div>

                        <div class="col">

                            <div class="input-group mb-3">
                                <label class="input-group-text">Descrição:</label>
                                <input type="text" class="form-control" value="<?php echo $topicos['descricao']; ?>" disabled>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="container-fluid pt-3" id="ctnrtabtopicos" name="ctnrtabtopicos">

            <div class="card">
                <div class="card-body">

                    <table class="table table-sm table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" style="width: 80%">Resposta</th>
                                <th scope="col" style="width: 10%">Responsável</th>
                                <th scope="col" style="width: 5%">Data</th>
                                <th scope="col" style="width: 5%"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($topicosdetalhes as $detalhe) if ($detalhe['codtopico'] == $topicos['cod']) : ?>
                                <tr>
                                    <td><?php echo $detalhe['descricao']; ?></td>
                                    <td><?php foreach ($envolvidos as $envolvido) if ($envolvido['cod'] == $detalhe['codenvolvido']) : echo $envolvido['nome'];
                                        endif; ?></td>
                                    <td><?php echo implode("/", array_reverse(explode("-", $detalhe['dataresposta']))); ?></td>
                                    <td>
                                        <a href='<?php echo base_url('public/Topicos/apagarDetalhes') . '/' . $detalhe['cod']; ?>'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Responder
                    </button>
                </div>

            </div>

            <form action="<?php echo base_url('public/Topicos/salvarDetalhes') ?>" method="POST">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Resposta Topico Assunto: <?php echo $topicos['assunto']; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="container-fluid">

                                    <div class="row mb-3">

                                        <div class="input-group">
                                            <span class="input-group-text">Data</span>
                                            <input type="date" class="form-control" name="dataresposta" id="dataresposta">
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
                                                <label class="input-group-text" for="1">Responsável</label>
                                                <select class="form-select" name="codenvolvido" id="codenvolvido" required>
                                                    <option selected value="">Selecione...</option>
                                                    <?php foreach ($envolvidos as $envolvido) : ?>
                                                        <option value="<?php echo $envolvido['cod']; ?>"><?php echo $envolvido['nome']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="codtopico" id="codtopico" value="<?php echo $topicos['cod']; ?>">

            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>