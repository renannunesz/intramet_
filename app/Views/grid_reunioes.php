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

        <div class="section column">

        <h1 class="title">Reuniões</h1>

            <table class="table is-fullwidth is-hoverable is-striped">

                <thead>

                    <tr>

                        <th>Data</th>
                        <th>Setor</th>
                        <th>Topico</th>
                        <th>Assunto</th>
                        <th>Providencia</th>
                        <th>Responsável</th>
                        <th>Status</th>
                        <th>Diretoria</th>
                        <th>Ata</th>
                        <th>Descrição</th>
                        <th>Participantes</th>
                        <th>Opções</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach($grid_reunioes as $reuniao):  ?>                    
                    <tr>

                        <td><?php echo implode("/", array_reverse(explode("-", $reuniao['data']))); ?></td>
                        <td><?php echo $reuniao['descsetor'] ?></td>
                        <td><?php echo $reuniao['codt'] ?></td>
                        <td><?php echo $reuniao['assunto'] ?></td>
                        <td><?php echo $reuniao['providencia'] ?></td>
                        <td><?php echo $reuniao['nome'] ?></td>
                        <td><?php echo $reuniao['descstatus'] ?></td>
                        <td><?php echo $reuniao['diretoria'] ?></td>
                        <td><?php echo $reuniao['coda'] ?></td>
                        <td><?php echo $reuniao['descata'] ?></td>
                        <td><?php echo $reuniao['participantes'] ?></td>
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