<main class="d-flex " style="background-color:#dee6ed">

    <?php include 'sidebar.php'; ?>

    <div class="mx-2 justify-content-center content-fluid" style="width: 100%;">

        <div class=" mx-2 pt-3 justify-content-center " id="ctnrformfiltros" name="ctnrformfiltros">

            <div class="card">
                <div class="card-header">

                    <h5 class="card-title">Fiscon - Acompanhamento de Cronograma </h5>
                    <button type="button" class="btn btn-primary btn-sm">Nova Empresa</button>
                    <button type="button" class="btn btn-primary btn-sm">Nova Competência</button>

                </div>

                <div class="card-body">

                    <form action="<?php echo base_url('#'); ?>" method="get">

                        <div class="row row-cols-4">

                            <div class="col">

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Competência</label>
                                    <input type="text" class="form-control" id="competencia" name="competencia" placeholder="MM/AAAA">
                                </div>

                            </div>

                            <div class="col">

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Executor</label>
                                    <select class="form-select" name="competencia" id="competencia" required>
                                        <option selected value="">Selecione...</option>
                                        <?php foreach ($responsaveis as $responsavel) : ?>
                                            <option value="<?php echo $responsavel['cod']; ?>">
                                                <?php echo $responsavel['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col">

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Empresa</label>
                                    <select class="form-select" name="competencia" id="competencia" required>
                                        <option selected value="">Selecione...</option>
                                        <?php foreach ($empresas as $empresa) : ?>
                                            <option value="<? echo $empresa['codathenas']; ?>">
                                                <?php echo $empresa['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col">

                                <button class="btn btn-primary sm" type="submit">Buscar</button>

                            </div>

                        </div>

                    </form>

                    <a href='<?php echo base_url('public/Cronograma/acompanhamentoCronograma'); ?>'>
                        <button class="btn btn-primary sm" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                            </svg>
                            Atualizar
                        </button>
                    </a>

                </div>

                <div class="card-footer text-body-secondary d-flex">

                    <div class="me-1">
                        <span class="badge bg-secondary">Em Aberto: <?php echo count($abertas); ?></span>
                    </div>

                    <div>
                        <span class="badge bg-success">Finalizados: <?php echo count($finalizadas); ?></span>
                    </div>

                </div>

            </div>

        </div>

        <div class=" mx-2 pt-3 justify-content-center " id="ctnrtabtopicos" name="ctnrtabtopicos">

            <div class="card">
                <div class="card-body">

                    <table class="table table-sm table-hover align-middle compact hover" name="gridcronograma" id="gridcronograma">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col" style="width: 7%">Competência</th>
                                <th scope="col" style="width: 7%">Cod</th>
                                <th scope="col">Empresa</th>
                                <th scope="col" style="width: 7%">Responsável</th>
                                <th scope="col" style="width: 7%">Setor</th>
                                <th scope="col" style="width: 7%">FS - C.H.</th>
                                <th scope="col" style="width: 7%">CTB - C.H.</th>
                                <th scope="col" style="width: 7%">CTB - Mês Atual.</th>
                                <th scope="col" style="width: 7%">Comp. Executar</th>
                                <th scope="col" style="width: 7%">Status Atualização</th>
                                <th scope="col" style="width: 7%">Opções</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($cronogramas as $registro) : ?>
                                <tr>
                                    <td><?php echo $registro['competencia']; ?></td>
                                    <td><?php echo $registro['codempresa']; ?></td>
                                    <td><?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo $empresa['nome'];
                                        endif; ?></td>
                                    <td><?php foreach ($responsaveis as $responsavel) if ($responsavel['cod'] == $registro['codresponsavel']) : echo $responsavel['nome'];
                                        endif; ?></td>
                                    <td><?php foreach ($setores as $setor) if ($setor['cod'] == $registro['codsetor']) : echo $setor['descricao'];
                                        endif; ?></td>
                                    <td><?php echo $registro['fiscalprodch']; ?></td>
                                    <td><?php echo $registro['contabilprodch']; ?></td>
                                    <td><?php echo $registro['contabilultimaatualizacao']; ?></td>
                                    <td><?php echo $registro['contabilcompetenciaexecutar'] == 0 ? "Não Executar" : $registro['contabilcompetenciaexecutar']; ?></td>
                                    <td class="text-center">
                                        <?php if ($registro['statusexecucao'] == 0) : ?>

                                            <div class="row">

                                                <div class="col px-0" title="Em Aberto">

                                                    <button type="" class="btn btn-secondary btn-sm disabled">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-top" viewBox="0 0 16 16">
                                                            <path d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5zm2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1h-7z" />
                                                        </svg>
                                                        Em Aberto
                                                    </button>

                                                </div>

                                            </div>

                                        <?php else : ?>

                                            <div class="row">

                                                <div class="col px-0" title="Finalizado">

                                                    <button type="" class="btn btn-success btn-sm disabled">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                        </svg>
                                                    </button>

                                                </div>

                                                <div class="col px-0" title="Desfazer">

                                                    <form action='<?php echo base_url('public/Cronograma/desfazExecucao'); ?>' method="post">

                                                        <input type="hidden" name="codregistro" id="codregistro" value="<?php echo $registro['cod']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward" viewBox="0 0 16 16">
                                                                <path d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm7 1.133L1.696 8 7.5 11.367V4.633zm7.5 0L9.196 8 15 11.367V4.633z" />
                                                            </svg>
                                                        </button>

                                                    </form>

                                                </div>

                                            </div>

                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">

                                        <div class="row">

                                            <div class="col px-0" name="Editar">

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#registroModal-<?php echo $registro['cod']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>
                                                </button>

                                            </div>

                                            <div class="col px-0" name="Apagar">
                                                <a href="<?php echo base_url('public/Cronograma/apagar') . '/' . $registro['cod']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" name="codregcrono" id="codregcrono" value="<?php echo $registro['cod']; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="registroModal-<?php echo $registro['cod']; ?>" aria-labelledby="registroModalLabel" aria-hidden="true">

                                                <form action='<?php echo base_url('public/Cronograma/salvar'); ?>' method="post">

                                                    <input type="hidden" name="md_codregistro" id="md_codregistro" value="<?php echo $registro['cod']; ?>">

                                                    <div class="modal-dialog modal-lg">

                                                        <div class="modal-content">

                                                            <div class="modal-header bg-light">

                                                                <h5 class="card-title">

                                                                    Cronograma: <?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo $empresa['nome'];
                                                                                endif; ?>

                                                                    - Competência: <?php echo $registro['competencia']; ?>

                                                                </h5>

                                                            </div>

                                                            <div class="modal-body">

                                                                <div class="container-fluid">

                                                                    <div class="row">

                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="inputGroupSelect01">Responsável:</label>
                                                                            <select class="form-select" name="md_codresponsavel" id="md_codresponsavel" required>
                                                                                <option selected value="">Selecione...</option>
                                                                                <?php foreach ($responsaveis as $md_responsavel) : ?>
                                                                                    <option value="<?php echo $md_responsavel['cod']; ?>">
                                                                                        <?php echo $md_responsavel['cod'] . " - " . $md_responsavel['nome']; ?>
                                                                                    </option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="inputGroupSelect02">Setor:</label>
                                                                            <select class="form-select" name="md_codsetor" id="md_codsetor" required>
                                                                                <option selected value="">Selecione...</option>
                                                                                <?php foreach ($setores as $setore) : ?>
                                                                                    <option value="<?php echo $setore['cod']; ?>"><?php echo $setore['descricao']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="inputGroupSelect03">Competencia a Executar:</label>
                                                                            <input type="text" class="form-control" name="md_contabilcompetenciaexecutar" id="md_contabilcompetenciaexecutar" required placeholder="<?php echo $registro['contabilcompetenciaexecutar'] == 0 ? "Não Executar" : $registro['contabilcompetenciaexecutar']; ?>">
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

                                                </form>

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

    </div>

    <script>
        $(document).ready(function() {
            $('#gridcronograma').DataTable({
                responsive: true,
                "pageLength": 25,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
                }
            });
        });
    </script>

</main>