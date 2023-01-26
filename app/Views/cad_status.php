<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet - G.MTDS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico') ?>">

</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="column is-mobile">

        <div class="section column is-three-fifths is-offset-one-fifth">

            <h1 class="title">Cadastro Status</h1>

            <form action="<?php echo base_url('public/Status/salvar') ?>" method="post">

                <!-- Descrição -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Descrição</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="descricao" id="descricao" placeholder="Descrição do Status" value="<?php echo isset($status['descricao']) ? $status['descricao'] : '' ; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="cod" id="cod" value="<?php echo isset($status['cod']) ? $status['cod'] : '' ; ?>">

                <input type="submit" value="Salvar Status" class="button is-primary">

                <a href="<?php echo base_url('public/Status'); ?>"><input type="button" value="Voltar" class="button has-background-grey-light"></a>

            </form>

        </div>

    </div>

</body>

</html>