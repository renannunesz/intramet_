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

            <h1 class="title">Dados Ata</h1>

            <form action="<?php echo base_url('public/Atas/salvar') ?>" method="post">

                <!-- Data -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label is-four-fifths">Ata</label>
                    </div>

                    <div class="field-body">

                        <div class="field">
                            <p class="control">
                                <input class="input" type="date" name="data" id="data" placeholder="Data" value="<?php echo isset($dados_ata['data']) ? $dados_ata['data'] : ''; ?>" required>
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Descrição -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Descrição</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="descricao" id="descricao" placeholder="Breve descrição da Ata." value="<?php echo isset($dados_ata['descricao']) ? $dados_ata['descricao'] : ''; ?>">
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

                        <?php if (isset($dados_ata)) : ?>

                            <div class="control">
                                <input class="input has-background-grey-lighter" type="text" value="<?php echo $setores[0]; ?>" readonly>
                            </div>

                        <?php else : ?>

                            <div class="select">
                                <select id="codsetor" name="codsetor" required>
                                    <option value="">Selecione o Setor</option>
                                    <?php foreach ($setores as $setor) : ?>
                                        <option value="<?php echo $setor['cod']; ?>"><?php echo $setor['descricao']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

                <!-- Participantes -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Participantes</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="participantes" id="participantes" placeholder="Envolvidos" value="<?php echo isset($dados_ata['participantes']) ? $dados_ata['participantes'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="cod" id="cod" value="<?php echo isset($dados_ata['cod']) ? $dados_ata['cod'] : ''; ?>">

                <!-- Salvar -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">

                                <input class="button is-primary" type="submit" value="Salvar Ata">

                                <a href="<?php echo base_url('public/Atas'); ?>"><input type="button" value="Voltar" class="button has-background-grey-light"></a>

                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

</body>

</html>