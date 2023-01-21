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

        <h1 class="title">Setores</h1>

        <button class="button is-small"><a href="Setores/cadastrar">Cadastrar</a></button>

            <table class="table is-fullwidth is-hoverable is-striped">

                <thead>

                    <tr>

                        <th>Cod.</th>
                        <th>Setor</th>
                        <th>Opções</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach($setores as $setor): ?>
                    <tr>

                        <td><?php echo $setor['cod'] ?></td>
                        <td><?php echo $setor['descricao'] ?></td>
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