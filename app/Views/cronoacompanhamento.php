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

                        <div class="row row-cols-4 ">

                            <div class="col">

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Competência</label>
                                    <select class="form-select" name="competencia" id="competencia" required>
                                        <option selected value="">Selecione...</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col">

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Executor</label>
                                    <select class="form-select" name="competencia" id="competencia" required>
                                        <option selected value="">Selecione...</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col">

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Empresa</label>
                                    <select class="form-select" name="competencia" id="competencia" required>
                                        <option selected value="">Selecione...</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col">

                                <button class="btn btn-primary sm" type="submit">Buscar</button>

                            </div>

                        </div>

                    </form>
                </div>

                <div class="card-footer text-body-secondary">
                    Em Aberto: 0
                    Finalizados: 0
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

                                            <div class="col px-0 text-bg-warning" title="Em Aberto">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-top" viewBox="0 0 16 16">
                                                    <path d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5zm2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1h-7z" />
                                                </svg>
                                                Em Aberto

                                            </div>

                                        <?php else : ?>

                                            <div class="col px-0 text-bg-success" title="Finalizado">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                </svg>
                                                Finalizado

                                            </div>

                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <form action='<?php echo base_url('public/Cronograma/desfazExecucao'); ?>' method="post">

                                            <input type="hidden" name="codregistro" id="codregistro" value="<?php echo $registro['cod']; ?>">

                                            <div class="col px-0" title="Desfazer">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                                    </svg>
                                                </button>
                                                </a>
                                            </div>
                                        </form>
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