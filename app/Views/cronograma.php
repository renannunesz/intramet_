<main class="d-flex " style="background-color:#dee6ed">

    <?php include 'sidebar.php'; ?>

    <div class="mx-2 justify-content-center content-fluid" style="width: 100%;">

        <div class=" mx-2 pt-3 justify-content-center " id="ctnrformfiltros" name="ctnrformfiltros">

        <div class="card">
            <div class="card-header">

                <h5 class="card-title">Fiscon - Cronograma de Execução</h5>

            </div>
            <div class="card-body">

                <form action="<?php echo base_url('public/Cronograma'); ?>" method="get">

                    <div class="row row-cols-4">

                        <div class="col">

                            <div class="input-group mb-3">
                                <label class="input-group-text">Competência</label>
                                <input type="text" class="form-control" id="competencia" name="competencia" placeholder="MM/AAAA">
                            </div>

                        </div>

                        <div class="col">

                            <button class="btn btn-primary sm" type="submit">Buscar</button>

                        </div>

                        <div class="col">

                            <div class="card h-100 text-center">
                                <div class="card-header">
                                    Competência:
                                </div>
                                <div class="card-body">
                                    <strong>
                                        <?php echo $competencia == 0 ? "Selecione..." : $competencia; ?>
                                    </strong>
                                </div>
                            </div>

                        </div>

                        <div class="col">

                            <div class="card h-100 text-center">
                                <div class="card-header">
                                    Conclusão - Exec. Contábil:
                                </div>
                                <div class="card-body">
                                    <?php  
                                    
                                    $pendentes = count($empPendentesContabil) == 0 ? 1 : count($empPendentesContabil);
                                    
                                    $percConclusao = number_format( count($empFinalizadasContabil) / ($pendentes + count($empFinalizadasContabil)), 2) * 100; 
                                    ?>
                                    <strong>
                                        <div class="progress" role="progressbar" aria-label="barra de progresso" aria-valuenow="<?php echo $percConclusao; ?>" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-striped" style="width:<?php echo $percConclusao . "%"; ?>"><?php echo $percConclusao . "%"; ?></div>
                                        </div>
                                    </strong>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>
            </div>

        </div>

        </div>

        <div class=" mx-2 pt-3 justify-content-center " id="ctnrtabtopicos" name="ctnrtabtopicos">

        <div class="card">
            <div class="card-body">

                <table class="table table-sm table-hover align-middle compact hover" name="gridcronograma" id="gridcronograma">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" style="width: 7%">Competência</th>
                            <th scope="col" style="width: 7%">Cod</th>
                            <th scope="col">Empresa</th>
                            <th scope="col" style="width: 7%">Curva</th>
                            <th scope="col" style="width: 7%">Responsável</th>
                            <th scope="col" style="width: 7%">Setor</th>
                            <th scope="col" style="width: 7%">Fiscal - C.H.</th>
                            <th scope="col" style="width: 7%">Contabil - C.H.</th>
                            <th scope="col" style="width: 7%">Contabil - Ult. Atualização</th>
                            <th scope="col" style="width: 7%">Comp. Executar</th>
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
                                <td><?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo $empresa['curva'];
                                    endif; ?></td>
                                <td><?php foreach ($responsaveis as $responsavel) if ($responsavel['cod'] == $registro['codresponsavel']) : echo $responsavel['nome'];
                                    endif; ?></td>
                                <td>
                                    <?php switch ($registro['codsetor']) {
                                        case '56':
                                            echo '<span class="badge text-bg-dark">';
                                            break;

                                        case '57':
                                            echo '<span class="badge text-bg-light">';
                                            break;

                                        default:
                                            echo '<span class="badge text-bg-primary">';
                                            break;
                                    } ?>
                                    <?php foreach ($setores as $setor) if ($setor['cod'] == $registro['codsetor']) : echo $setor['descricao'];
                                    endif; ?>
                                    </span>
                                </td>
                                <td><?php echo $registro['fiscalprodch']; ?></td>
                                <td><?php echo $registro['contabilprodch']; ?></td>
                                <td><?php echo $registro['contabilultimaatualizacao']; ?></td>
                                <td><?php echo $registro['contabilcompetenciaexecutar'] == 0 ? "Não Executar" : $registro['contabilcompetenciaexecutar']; ?></td>
                                <td>
                                    <form action='<?php echo base_url('public/Cronograma/salvaExecucao'); ?>' method="post">

                                        <input type="hidden" name="codregistro" id="codregistro" value="<?php echo $registro['cod']; ?>">
                                        <input type="hidden" name="atualizacaoContabil" id="atualizacaoContabil" value="<?php echo $registro['contabilcompetenciaexecutar']; ?>">
                                        <input type="hidden" name="codEmpresaAthenas" id="codEmpresaAthenas" value="<?php echo $registro['codempresa']; ?>">

                                        <div class="col px-0" title="Finalizar">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $registro['cod']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                </svg>
                                                Finalizar
                                            </button>
                                            </a>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop-<?php echo $registro['cod']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cronograma <?php echo $competencia; ?>, Finalizar Empresa?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="container px-4 text-center">
                                                            <div class="row gx-5">
                                                                <div class="col">
                                                                    <div class="p-3"> A seguinte empresa será finalizada: <br>
                                                                        <strong>
                                                                            <?php foreach ($empresas as $empresa) if ($empresa['codathenas'] == $registro['codempresa']) : echo " " . $empresa['nome'];
                                                                            endif; ?>
                                                                        </strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text">Competência Finalizada:</label>
                                                            <input type="text" class="form-control" id="competencia" name="competencia" placeholder="<?php echo $registro['contabilcompetenciaexecutar'] == 0 ? "Não Executar" : $registro['contabilcompetenciaexecutar']; ?>">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
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
                "responsive": true,
                "pageLength": 25,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
                }
            });
        });
    </script>

</main>