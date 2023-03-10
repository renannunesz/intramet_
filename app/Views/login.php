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
            <img class="is-centered" width="300" height="300" src="<?php echo base_url('assets/img/grupoMetodos.png') ?>">
        </div>

        <div class="container">
            <div class="columns is-centered">
                <div class="column is-4">
                    <div class="columns is-flex is-flex-direction-column">

                        <form class="box" action="<?php echo base_url('public/Login/signIn') ?>" method="POST">
                            <div class="field">
                                <label class="label">Login:</label>
                                <input class="input" name="nomeUsuario" id="nomeUsuario" type="text" placeholder="Usuário">
                            </div>
                            <div class="field">
                                <label class="label">Senha:</label>
                                <input class="input" name="senhaUsuario" id="senhaUsuario" type="password" placeholder="******">
                            </div>
                            <div class="column">
                                <button class="button has-background-info-dark has-text-primary-light is-fullwidth" type="submit">Entrar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>