<main class="d-flex " style="background-color:#dee6ed">

    <?php include 'sidebar.php'; ?>

    <div class="mx-2 justify-content-center content-fluid" style="width: 100%;">

        <div class=" mx-2 pt-3 justify-content-center " id="cardHeaderEnvolvidos" name="">

            <div class="card">

                <div class="card-header">

                    <h5 class="card-title">Cadastro de Envolvidos</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Novo
                    </button>

                    <form action='<?php echo base_url('public/Envolvidos/salvar') ?>' method="post">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Envolvidos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="container-fluid">

                                            <div class="row">

                                                <div class="col">

                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect04">Nome</label>
                                                        <input type="text" class="form-control" name="nome" id="nome">
                                                    </div>

                                                </div>

                                                <div class="col">

                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="2">Setor</label>
                                                        <select class="form-select" id="codsetor" name="codsetor">
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
                                        <input type="submit" class="btn btn-primary" value="Salvar">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="card-body">

                    <div class="row">

                        <p>Envolvidos cadastrados: <?php echo count($envolvidos); ?> </p>

                    </div>
                </div>

            </div>

        </div>

        <div class=" mx-2 pt-3 justify-content-center " id="tabEnvolvidos" name="">

            <div class="card">
                <div class="card-body">

                    <table class="table table-sm align-middle compact stripe hover" name="gridenvolvidos" id="gridenvolvidos">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Setor</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($envolvidos as $envolvido) : ?>
                                <tr>
                                    <td><?php echo $envolvido['cod']; ?></td>
                                    <td><?php echo $envolvido['nome']; ?></td>
                                    <td><?php foreach ($setores as $setor) if ($setor['cod'] == $envolvido['codsetor']) : echo $setor['descricao'];
                                        endif; ?></td>
                                    <td>

                                        <form action="<?php echo base_url('public/Envolvidos/salvar') ?>" method="post">

                                            <input type="hidden" name="cod" id="cod" value="<?php echo $envolvido['cod']; ?>">

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#envolvidoModal-<?php echo $envolvido['cod']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </button>

                                            <a href='<?php echo base_url('public/Envolvidos/apagar') . '/' . $envolvido['cod']; ?>'>
                                                <button class="btn btn-danger btn-sm" value="<?php echo $envolvido['cod']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                </button>
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="envolvidoModal-<?php echo $envolvido['cod']; ?>" aria-labelledby="envolvidoModalLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-xl">

                                                    <div class="modal-content">

                                                        <div class="modal-header bg-light">
                                                            <h5 class="card-title">Editar envolvido - <?php echo $envolvido['nome']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="container-fluid">

                                                                <div class="row">

                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Nome:</label>
                                                                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $envolvido['nome']; ?>">
                                                                    </div>

                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect02">Setor:</label>
                                                                        <select class="form-select" name="codsetor" id="codsetor" required>
                                                                            <option selected value="">Selecione...</option>
                                                                            <?php foreach ($setores as $setore) : ?>
                                                                                <option value="<?php echo $setore['cod']; ?>"><?php echo $setore['descricao']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </form>

                                        <!--
                                        <a href='<?php echo base_url('public/Envolvidos/editar') . '/' . $envolvido['cod']; ?>'>
                                            <button class="btn btn-warning btn-sm" value="<?php echo $envolvido['cod']; ?>">Editar
                                            </button>
                                        </a>
                                        <a href='<?php echo base_url('public/Envolvidos/apagar') . '/' . $envolvido['cod']; ?>'>
                                            <button class="btn btn-danger btn-sm" value="<?php echo $envolvido['cod']; ?>">Apagar
                                            </button>
                                        </a>
                                        -->

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#gridenvolvidos').DataTable({
                "responsive": true,
                "pageLength": 25,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
                }
            });
        });
    </script>

</main>