<?php if(isset($usuario)) : ?>

<main class="d-flex " style="background-color:#dee6ed">

    <?php include 'sidebar.php'; ?>

    <div class="mx-2 justify-content-center content-fluid ml-sm-auto pt-1 px-1">

        <div class="text-center">

            <img class="img-fluid is-centered rounded mx-auto" height="90%" width="90%" src="<?php echo base_url('assets/img/intranet-metodoscapa1.png') ?>">

        </div>

        <div class="card text-center">

            <div class="card-footer text-muted">
                Grupo Métodos - Tecnologia 2023
            </div>

        </div>

    </div>

</main>

<?php else: ?>

<h3>Hi unknown user</h3>

<?php endif ?>
