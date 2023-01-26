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

            <h1 class="title">Cadastro Envolvido</h1>

            <form action="<?php echo base_url('public/Envolvidos/salvar') ?>" method="post">

                <!-- Nome -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Nome</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="nome" id="nome" placeholder="Nome." value="<?php echo isset($envolvido['nome']) ? $envolvido['nome'] : '' ; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Setores -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">Setor</label>
                    </div>

                    <div class="field-body">

                        <div class="select">
                            <select id="codsetor" name="codsetor">
                                <option value="">Selecione o Setor</option>
                                <?php foreach ($setores as $setor): ?>
                                <option value="<?php echo $setor['cod']; ?>"> <?php echo $setor['descricao']?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </div>              
                
                <input type="hidden" name="cod" id="cod" value="<?php echo isset($envolvido['cod']) ? $envolvido['cod'] : '' ; ?>">

                <input type="submit" value="Salvar Envolvido" class="button is-primary">

                <a href="<?php echo base_url('public/Envolvidos'); ?>"><input type="button" value="Voltar" class="button has-background-grey-light"></a>

            </form>

        </div>

    </div>

</body>

</html>