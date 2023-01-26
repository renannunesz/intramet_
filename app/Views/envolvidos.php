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

        <div class="section column is-two-fifths">

        <h1 class="title">Envolvidos</h1>

        <a href='Envolvidos/cadastrar'><button class="button is-small is-success">Novo</button></a>

            <table class="table is-fullwidth is-hoverable is-striped ">

                <thead>

                    <tr>

                        <th>Cod.</th>
                        <th>Nome</th>
                        <th>Setor</th>
                        <th>Opções</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach($envolvidos as $envolvido): ?>
                    <tr>

                        <td><?php echo $envolvido['cod']; ?></td>
                        <td><?php echo $envolvido['nome']; ?></td>
                        <td><?php echo $envolvido['descricao']; ?></td>
                        <td>
                            <a href='Envolvidos/editar/<?php echo $envolvido['cod']; ?>'><button class="button is-small is-warning" value="<?php echo $envolvido['cod']; ?>">Editar</button></a>
                            <a href='Envolvidos/apagar/<?php echo $envolvido['cod']; ?>'><button class="button is-small is-danger" value="<?php echo $envolvido['cod']; ?>">Apagar</button></a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</body>

</html>