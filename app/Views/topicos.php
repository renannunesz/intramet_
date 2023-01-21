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

            <h1 class="title">Dados Tópico</h1>

            <form action="Topicos/salvar" method="post">

                <!-- Dados Ata -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">Ata</label>
                    </div>
                    <div class="field-body">
                        <div class="select">
                            <select id="codata" name="codata">
                                <option>Selecione a Ata</option>
                                <?php foreach ($topicos_atas as $ata) : ?>
                                    <option value=<?php $ata['cod']; ?>><?php echo $ata['cod'] . " - " . $ata['data'] . " - " . $ata['descricao'] . " - " . $ata['descsetor']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Assunto -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Assunto</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Topido do Assunto Tratado" name="assunto" id="assunto">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Providencia -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Providências</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" placeholder="Descrição das providencias do assunto." name="providencia" id="providencia"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Responsável -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">Responsável</label>
                    </div>
                    <div class="field-body">

                        <div class="select">
                            <select name="codresponsavel" id="codresponsavel">
                                <option>Selecione o Responsável</option>
                                <?php foreach ($envolvidos as $responsavel) : ?>
                                    <option value=<?php $responsavel['cod']; ?>> <?php echo $responsavel['nome']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Status -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">Status</label>
                    </div>
                    <div class="field-body">
                        <div class="select">
                            <select name="codstatus" id="codstatus">
                                <option>Selecione o Status</option>
                                <?php foreach ($status as $stato) : ?>
                                    <option value=<?php $stato['cod']; ?>><?php echo $stato['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Enviar para a diretoria -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <label class="label">Enviar para Diretoria?</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="member" value="1">
                                    Sim
                                </label>
                                <label class="radio">
                                    <input type="radio" name="member" value="2">
                                    Não
                                </label>
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
                                <input class="button is-primary" type="submit" value="Salvar Topico">
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

</body>

</html>