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
                                <input class="input has-background-grey-light" type="number" value="<?php echo $dados_topicos['codata']; ?>" name="codata" id="codata">
                            </div>

                        <?php else : ?>

                            <div class="select">
                                <select id="codata" name="codata">
                                    <option>Selecione a Ata</option>
                                    <?php foreach ($topicos_atas as $ata) : ?>
                                        <option value="<?php echo $ata['cod']; ?>"><?php echo $ata['cod'] . " - " . $ata['data'] . " - " . $ata['descricao'] . " - " . $ata['descsetor']; ?></option>
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

                <!-- Providencia -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Providências</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" placeholder="Descrição das providencias do assunto." name="providencia" id="providencia"><?php echo isset($dados_topicos['providencia']) ? $dados_topicos['providencia'] : ''  ?></textarea>
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

                        <?php if (isset($dados_topicos)) : ?>

                            <div class="control">
                                <input class="input" type="text" value="<?php echo $dados_topicos['codresponsavel']; ?>" name="codresponsavel" id="codresponsavel">
                            </div>

                        <?php else : ?>

                            <div class="select">
                                <select name="codresponsavel" id="codresponsavel">
                                    <option>Selecione o Responsável</option>
                                    <?php foreach ($envolvidos as $responsavel) : ?>
                                        <option value="<?php echo $responsavel['cod']; ?>"> <?php echo $responsavel['nome']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

                <!-- Status -->
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">Status</label>
                    </div>
                    <div class="field-body">

                        <?php if (isset($dados_topicos)) : ?>

                            <div class="control">
                                <input class="input" type="text" value="<?php echo $dados_topicos['codstatus']; ?>" name="codstatus" id="codstatus">
                            </div>

                        <?php else : ?>

                            <div class="select">
                                <select name="codstatus" id="codstatus">
                                    <option>Selecione o Status</option>
                                    <?php foreach ($status as $stato) : ?>
                                        <option value="<?php echo $stato['cod']; ?>"><?php echo $stato['descricao']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        <?php endif; ?>

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
                                    <input type="radio" name="diretoria" value="1">
                                    Sim
                                </label>
                                <label class="radio">
                                    <input type="radio" name="diretoria" value="2">
                                    Não
                                </label>
                            </div>
                        </div>
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

                                <a href="<?php echo base_url('public/Topicos/topicos'.$setor); ?>"><input type="button" value="Voltar" class="button has-background-grey-light"></a>

                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

</body>

</html>