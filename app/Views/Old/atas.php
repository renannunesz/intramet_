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

        <div class="section column">

            <h1 class="title">Atas</h1>

            <a href='<?php echo base_url('Atas/cadastrar'); ?>'><button class="button is-success is-small">Nova</button></a>

            <table class="table is-fullwidth is-hoverable is-striped">

                <thead>

                    <tr>

                        <th>Nº Ata</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Opções</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($atas as $ata) :  ?>
                        <tr>

                            <td><?php echo $ata['cod'] ?></td>
                            <td><?php echo implode("/", array_reverse(explode("-", $ata['data']))); ?></td>
                            <td><?php echo $ata['descricao'] ?></td>
                            <td>
                                <a href='Atas/editar/<?php echo $ata['cod']; ?>'><button class="button is-small is-warning" value='<?php echo $ata['cod']; ?>'>Editar</button></a>
                                <!-- <a href='Atas/apagar/<?php echo $ata['cod']; ?>'><button class="button is-small is-danger" value="<?php echo $ata['cod']; ?>">Apagar</button></a> -->
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</body>

</html>