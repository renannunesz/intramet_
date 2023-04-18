<body style="background-color:#78AED3">

    <div class="container-md d-flex justify-content-center pt-3" id="" name="">

        <div class="card" style="width: 50rem;">
            <div class="card-header">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#empresaModal">
                    Novo
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
                                                <label class="input-group-text" for="inputGroupSelect04">Cod. Athenas:</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">Nome:</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">CNPJ:</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">C.H. Contabil:</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">C.H. Fiscal:</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">Atualização Contabil:</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">Curva:</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect04">Responsável:</label>
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

                <h5 class="card-title">Empresas</h5>

                <div class="row">

                    <p>Empresas cadastrados: <?php echo count($empresas); ?></p>

                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid pt-3" id="" name="" style="width: 100%;">

        <div class="card">
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
                                <td><?php echo $empresa['cod']; ?></td>
                                <td><?php echo $empresa['nome']; ?></td>
                                <td><?php echo $empresa['cnpj']; ?></td>
                                <td><?php echo $empresa['chcontabil']; ?></td>
                                <td><?php echo $empresa['chfiscal']; ?></td>
                                <td><?php echo $empresa['atualizacaocontabil']; ?></td>
                                <td><?php echo $empresa['codresponsavel']; ?></td>
                                <td><?php echo $empresa['curva']; ?></td>
                                <td><?php echo 'Opções'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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

</body>