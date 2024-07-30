<main class="d-flex " style="background-color:#dee6ed">

    <?php include 'sidebar.php'; ?>

    <div class="mx-2 justify-content-center content-fluid" style="width: 100%;">

        <div class=" mx-2 pt-3 justify-content-center " id="cardHeaderEmpresas" name="">

            <div class="card justify-content-center">

                <div class="card-header">

                    <h5 class="card-title">Cadastro de Empresas</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#empresaModal">
                        Nova
                    </button>

                    <form action="<?php echo base_url('#') ?>" method="post">
                        <!-- Modal -->
                        <div class="modal fade" id="empresaModal" tabindex="-1" aria-labelledby="empresaModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="empresaModalLabel">Cadastro de Empresa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="container-fluid">

                                            <div class="row">

                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect01">Cod. Athenas:</label>
                                                    <input type="text" class="form-control" name="empresaCodAthenas" id="empresaCodAthenas">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect02">Nome:</label>
                                                    <input type="text" class="form-control" name="empresaNome" id="empresaNome">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect03">CNPJ:</label>
                                                    <input type="text" class="form-control" name="empresaCNPJ" id="empresaCNPJ">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect04">C.H. Contabil:</label>
                                                    <input type="text" class="form-control" name="empresaCHContabil" id="empresaCHContabil">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect05">C.H. Fiscal:</label>
                                                    <input type="text" class="form-control" name="empresaCHFiscal" id="empresaCHFiscal">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect06">Atualização Contabil:</label>
                                                    <input type="text" class="form-control" name="empresaAtualizacaoContabil" id="empresaAtualizacaoContabil">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect07">Curva:</label>
                                                    <input type="text" class="form-control" name="empresaCurva" id="empresaCurva">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect08">Responsável:</label>
                                                    <input type="text" class="form-control" name="empresaResponsavel" id="descricao">
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

                        <p>Empresas cadastradas: <?php echo count($empresas); ?></p>

                    </div>
                </div>

            </div>

        </div>

        <div class=" mx-2 pt-3 justify-content-center " id="tabEmpresas" name="">

            <div class="card justify-content-center">

                <div class="card-body">

                    <table class="table table-sm align-middle compact stripe hover" name="gridEmpresas" id="gridEmpresas">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">C.H. Contabil</th>
                                <th scope="col">C.H. Fiscal</th>
                                <th scope="col">Atualização Contabil</th>
                                <th scope="col">Responsável</th>
                                <th scope="col">Curva</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($empresas as $empresa) : ?>
                                <tr>
                                    <td><?php echo $empresa['codathenas']; ?></td>
                                    <td><?php echo $empresa['nome']; ?></td>
                                    <td><?php echo $empresa['cnpj']; ?></td>
                                    <td><?php echo $empresa['chcontabil']; ?></td>
                                    <td><?php echo $empresa['chfiscal']; ?></td>
                                    <td><?php echo $empresa['atualizacaocontabil']; ?></td>
                                    <td><?php foreach ($responsaveis as $responsavel) if ($responsavel['cod'] == $empresa['codresponsavel']) : echo $responsavel['nome'];
                                        endif; ?></td>
                                    <td><?php echo $empresa['curva']; ?></td>
                                    <td>
                                        <!--
                                        <a href='<?php echo base_url('public/Empresas/editar') . '/' . $empresa['cod']; ?>'>
                                            <button class="btn btn-warning btn-sm" value="<?php echo $empresa['cod']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </button>
                                        </a>
                                        -->

                                        <form action="<?php echo base_url('public/Empresas/salvar') ?>" method="post">

                                            <input type="hidden" name="empresaCod" id="empresaCod" value="<?php echo $empresa['cod']; ?>">

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#empresaModal-<?php echo $empresa['cod']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="empresaModal-<?php echo $empresa['cod']; ?>" aria-labelledby="empresaModalLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-xl">

                                                    <div class="modal-content">

                                                        <div class="modal-header bg-light">
                                                            <h5 class="card-title">Editar Empresa - <?php echo $empresa['nome']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="container-fluid">

                                                                <div class="row-cols-2">

                                                                    <div class="col">

                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="inputGroupSelect01">C.H. Contabil:</label>
                                                                            <input type="text" class="form-control" name="empresaCHContabil" id="empresaCHContabil" value="<?php echo $empresa['chcontabil']; ?>">
                                                                        </div>

                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="inputGroupSelect02">C.H. Fiscal:</label>
                                                                            <input type="text" class="form-control" name="empresaCHFiscal" id="empresaCHFiscal" value="<?php echo $empresa['chfiscal']; ?>">
                                                                        </div>

                                                                    </div>

                                                                    <div class="col input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect01">C.H. Contabil:</label>
                                                                        <input type="text" class="form-control" name="empresaCHContabil" id="empresaCHContabil" value="<?php echo $empresa['chcontabil']; ?>">
                                                                    </div>

                                                                    <div class="col input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect02">C.H. Fiscal:</label>
                                                                        <input type="text" class="form-control" name="empresaCHFiscal" id="empresaCHFiscal" value="<?php echo $empresa['chfiscal']; ?>">
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect03">Responsável:</label>
                                                                        <select class="form-select" name="empresaResponsavel" id="empresaResponsavel" required>
                                                                            <option selected value="">Selecione...</option>
                                                                            <?php foreach ($responsaveis as $responsavel) : ?>
                                                                                <option value="<?php echo $responsavel['cod']; ?>"><?php echo $responsavel['nome']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect04">Curva:</label>
                                                                        <select class="form-select" name="empresaCurva" id="empresaCurva" required>
                                                                            <option value="">Selecione...</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect05">Tributação:</label>
                                                                        <select class="form-select" name="empresaTributacao" id="empresaTributacao" required>
                                                                            <option value="">Selecione...</option>
                                                                            <option value="CEI">CEI</option>
                                                                            <option value="Doméstico">Doméstico</option>
                                                                            <option value="Imune">Imune</option>
                                                                            <option value="Isenta">Isenta</option>
                                                                            <option value="ITR">ITR</option>
                                                                            <option value="Livro Caixa">Livro Caixa</option>
                                                                            <option value="Lucro Presumido">Lucro Presumido</option>
                                                                            <option value="MEI">MEI</option>
                                                                            <option value="Não se aplica">Não se aplica</option>
                                                                            <option value="Presumido">Presumido</option>
                                                                            <option value="Real ">Real </option>
                                                                            <option value="Real/Anual">Real/Anual</option>
                                                                            <option value="Real/Trimestral">Real/Trimestral</option>
                                                                            <option value="SIMEI">SIMEI</option>
                                                                            <option value="Simples">Simples</option>
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
            $('#gridEmpresas').DataTable({
                "responsive": true,
                "pageLength": 25,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
                }
            });
        });
    </script>

</main>