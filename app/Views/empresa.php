<main class="d-flex " style="background-color:#048ABF">

    <?php include 'sidebar.php'; ?>

    <div class="mx-2 justify-content-center content-fluid ml-sm-auto pt-1 px-1" style="height: 100vh;">

        <div class="card">
            <div class="card-header">

                <h5 class="card-title">Empresa - <?php echo $empresa['nome']; ?></h5>

            </div>
            <form action="<?php echo base_url('public/Empresas/salvar') ?>" method="post">

                <input type="hidden" name="empresaCod" id="empresaCod" value="<?php echo $empresa['cod']; ?>">

                <div class="card-body">

                    <div class="row">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">C.H. Contabil:</label>
                            <input type="text" class="form-control" name="empresaCHContabil" id="empresaCHContabil" value="<?php echo $empresa['chcontabil']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">C.H. Fiscal:</label>
                            <input type="text" class="form-control" name="empresaCHFiscal" id="empresaCHFiscal" value="<?php echo $empresa['chfiscal']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect03">Responsável:</label>
                            <input type="text" class="form-control" name="empresaResponsavel" id="empresaResponsavel" value="<?php echo $empresa['codresponsavel']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect04">Curva:</label>
                            <input type="text" class="form-control" name="empresaCurva" id="empresaCurva" value="<?php echo $empresa['curva']; ?>">
                        </div>
                    </div>

                </div>

                <div class="card-footer">

                    <input type="submit" class="btn btn-primary" value="Salvar">
                    <button type="button" class="btn btn-secondary">Cancelar</button>

                </div>

            </form>
        </div>


    </div>

</main>