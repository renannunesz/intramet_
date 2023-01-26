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

        <h1 class="title">Reuniões - <?php echo $setor; ?></h1>

        <a href="<?php echo base_url('public/Topicos') ?>"><button class="button is-success is-small">Novo</button></a>

            <table class="table is-fullwidth is-hoverable is-striped">

                <thead>

                    <tr>

                        <th>Data</th>
                        <th>Setor</th>
                        <th>Assunto</th>
                        <th>Providencia</th>
                        <th>Responsável</th>
                        <th>Status</th>
                        <th>Diretoria</th>
                        <th>Nº Ata</th>
                        <th>Descrição</th>
                        <th>Participantes</th>
                        <th>Opções</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach($grid_reunioes as $topico):  ?>                    
                    <tr>

                        <td><?php echo implode("/", array_reverse(explode("-", $topico['data']))); ?></td>
                        <td><?php echo $topico['descsetor'] ?></td>
                        <td><?php echo $topico['assunto'] ?></td>
                        <td><?php echo $topico['providencia'] ?></td>
                        <td><?php echo $topico['nome'] ?></td>
                        <td><?php echo $topico['descstatus'] ?></td>
                        <td><?php echo $topico['diretoria'] == 1 ? "Sim" : "Não"; ?></td>
                        <td><?php echo $topico['coda'] ?></td>
                        <td><?php echo $topico['descata'] ?></td>
                        <td><?php echo $topico['participantes'] ?></td>
                        <td>
                            <a href='editar/<?php echo $topico['codt']; ?>'><button class="button is-small is-warning" value="<?php echo $topico['descsetor']; ?>" name="btnEditar" id="btnEditar" >Editar</button></a>
                            <a href='apagar/<?php echo $topico['codt']; ?>'><button class="button is-small is-danger"  value="<?php echo $topico['descsetor']; ?>" name="btnApagar" id="btnApagar" >Apagar</button></a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</body>

</html>