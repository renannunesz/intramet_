<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet - G.MTDS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon/favicon.ico') ?>">

</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="column is-mobile">

        <div class="section column is-two-fifths">

        <h1 class="title">Status</h1>

        <button class="button is-small">Cadastrar</button>

            <table class="table is-fullwidth is-hoverable is-striped">

                <thead>

                    <tr>

                        <th>Cod.</th>
                        <th>Status</th>
                        <th>Opções</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach($status as $state): ?>
                    <tr>

                        <td><?php echo $state['cod'] ?></td>
                        <td><?php echo $state['descricao'] ?></td>
                        <td>
                            <button class="button is-small">Editar</button>
                            <button class="button is-small">Apagar</button>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</body>

</html>