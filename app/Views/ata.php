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

        <div class="section column is-three-fifths is-offset-one-fifth">

            <h1 class="title">Dados Ata</h1>

            <form action="Atas/salvar" method="post">

                <!-- Data -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label is-four-fifths">Ata</label>
                    </div>

                    <div class="field-body">

                        <div class="field">
                            <p class="control">
                                <input class="input" type="date" name="data" id="data" placeholder="Data">
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
                                <input class="input" type="text" name="descricao" id="descricao" placeholder="Breve descrição da Ata.">
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
                                <option value="1">Audiplanner</option>
                                <option value="2">Comercial</option>
                                <option value="3">Diretoria/Financeiro</option>
                            </select>
                        </div>

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
                                <input class="input" type="text" name="participantes" id="participantes" placeholder="Envolvidos">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Salvar -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="button is-primary" type="submit" value="Salvar Ata">
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

</body>

</html>