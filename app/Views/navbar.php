<nav class="navbar navbar-expand-sm navbar-dark flex-md-nowrap bg-dark py-0">
  <div class="container-fluid">
    <div class="bg-light">
      <a class="navbar-item" href='<?php echo base_url('public/Home'); ?>'>
        <img src='<?php echo base_url('assets/img/logo.png') ?>' width="50" height="40">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Cadastros </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href='<?php echo base_url('public/Empresas'); ?>'> Empresas</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Envolvidos'); ?>'> Envolvidos</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Setores'); ?>'> Setores</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Status'); ?>'> Status</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Reuniões </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href='<?php echo base_url('public/Atas'); ?>'> Atas</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos'); ?>'> Topicos</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosAudiplanner'); ?>'> Audiplanner</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosComercial'); ?>'> Comercial</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosDiretoriaFinanceiro'); ?>'> Diretoria / Comercial</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosFiscon'); ?>'> Fiscon</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosKronos'); ?>'> Kronos</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosLegalizacao'); ?>'> Legalização</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosSetPessoal'); ?>'> Set. Pessoal</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosStartBI'); ?>'> Start BI</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosTecnologia'); ?>'> Tecnologia</a></li>
            <li><a class="dropdown-item" href='<?php echo base_url('public/Topicos/topicosPublicidade'); ?>'> Publicidade</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"> FisCon </a>
          <ul class="dropdown-menu">

            <?php if (session()->get('usernivel') == 3) : ?>
              <li><a class="dropdown-item" href='<?php echo base_url('#'); ?>'> RDA </a></li>
              <li><a class="dropdown-item" href='<?php echo base_url('public/Cronograma'); ?>'> Cronogramas </a></li>
            <?php endif; ?>

            <li>
              <hr class="dropdown-divider">
            </li>

            <?php if (session()->get('usernivel') <> 3) : ?>

              <li><a class="dropdown-item" href='<?php echo base_url('public/Cronograma/acompanhamentoCronograma'); ?>'> Status Cronogramas </a></li>
              <li><a class="dropdown-item" href='<?php echo base_url('#'); ?>'> Acompanhamento RDA </a></li>
            <?php endif; ?>

          </ul>
        </li>

      </ul>

      <div class="text-light">
        <strong> <?php echo session()->get('user'); ?> </strong>
      </div>

      <div>
        <a class="btn is-link" href='<?php echo base_url('public/Login/signOut'); ?>'><button class="btn btn-warning" type="submit"> <strong>Sair</strong> </button></a>
      </div>

    </div>
  </div>
</nav>