<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet - G.MTDS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico') ?>">

</head>

<body>

    <section class="section">

        <div class="columns is-centered">
            <h3 class="title is-3">Intranet - Grupo Métodos</h3>
        </div>

        <div class="container">
            <div class="columns is-centered">
                <div class="column is-4">
                    <div class="columns is-flex is-flex-direction-column">

                        <div class="box">                            
                            <article class="message is-success <?php echo $tipoMensagem; ?>">
                                <div class="message-body">
                                    <strong><?php echo $mensagem; ?></strong>!!!
                                </div>
                            </article>
                            <a href="<?php echo base_url($link); ?>">Voltar</a>                        
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>