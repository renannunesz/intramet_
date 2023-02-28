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

            <h1 class="title">Novo Tópico - <?php echo $setor; ?></h1>

            <form action="<?php echo base_url('public/Topicos/salvar') ?>" method="post">

                <input type="hidden" value="<?php echo $setor; ?>" name="inpSetor" id="inpSetor">

                <!-- Dados Ata -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">Ata</label>
                    </div>

                    <div class="field-body">

                        <?php if (isset($dados_topicos)) : ?>

                            <div class="control">
                                <input class="input has-background-grey-lighter" type="number" value="<?php echo $dados_topicos['codata']; ?>" name="codata" id="codata" readonly>
                            </div>

                        <?php else : ?>

                            <div class="select">
                                <select id="codata" name="codata" required>
                                    <option>Selecione a Ata</option>
                                    <?php foreach ($topicos_atas as $ata) : ?>
                                        <option value="<?php echo $ata['cod']; ?>"><?php echo implode("/", array_reverse(explode("-", $ata['data']))) . " - " . $ata['descricao'] . " - " . $ata['descsetor'] . " - " . $ata['cod']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        <?php endif; ?>

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
                                <input class="input" type="text" placeholder="Topido do Assunto Tratado" name="assunto" id="assunto" value="<?php echo isset($dados_topicos['assunto']) ? $dados_topicos['assunto'] : ''  ?>">
                            </div>
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
                                <textarea class="textarea" placeholder="Descrição detalhada do assunto." name="descricao" id="descricao"><?php echo isset($dados_topicos['descricao']) ? $dados_topicos['descricao'] : ''  ?></textarea>
                            </div>
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
                            <select name="codstatus" id="codstatus" required>
                                <option> <?php echo isset($status_atual) ? 'Atual - ' . $status_atual[0] : 'Selecione o Status'; ?> </option>
                                <?php foreach ($status as $stato) : ?>
                                    <option value="<?php echo $stato['cod']; ?>"><?php echo $stato['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Setor Responsável -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">Setor Responsável</label>
                    </div>
                    <div class="field-body">

                        <?php if (isset($dados_topicos)) : ?>

                            <div class="control">
                                <input class="input" type="text" value="<?php echo $responsavel[0]; ?>" name="codresponsavel" id="codresponsavel">
                            </div>

                        <?php else : ?>

                            <div class="select">
                                <select name="codsetor" id="codsetor" required>
                                    <option value="">Selecione o Responsável</option>
                                    <?php foreach ($lista_setores as $setor_s) : ?>
                                        <option value="<?php echo $setor_s['cod']; ?>"> <?php echo $setor_s['descricao']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

                <input type="hidden" name="cod" id="cod" value="<?php echo isset($dados_topicos['cod']) ? $dados_topicos['cod'] : ''  ?>">

                <!-- Salvar -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">

                                <input class="button is-primary" type="submit" value="Salvar Topico">

                                <a href="<?php echo base_url('public/Topicos/topicos' . $setor); ?>"><input type="button" value="Voltar" class="button has-background-grey-light"></a>

                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

</body>

</html>