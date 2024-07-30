<nav class="navbar has-shadow is-light" role="navigation" aria-label="main navigation">

  <div class="navbar-brand">
    <a class="navbar-item" href='#'>
      <img src="http://metodos-rnc.com.br/wp-content/uploads/2021/12/Metodos_horizonta_corrigidol.png" width="150" height="30">
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">

      <a class="navbar-item" href='<?php echo base_url('public/Home'); ?>'> Geral </a>

      <div class="navbar-item has-dropdown is-hoverable">

        <a class="navbar-link"> Reuniões </a>

        <div class="navbar-dropdown">

          <a class="navbar-item" href='<?php echo base_url('public/Setores'); ?>'> Cadastro Setor </a>

          <a class="navbar-item" href='<?php echo base_url('public/Status'); ?>'> Cadastro Status </a>

          <a class="navbar-item" href='<?php echo base_url('public/Envolvidos'); ?>'> Cadastro Envolvidos </a>

          <hr class="navbar-divider">

          <a class="navbar-item" href='<?php echo base_url('public/Atas'); ?>'> Atas </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos'); ?>'> Topicos </a>

          <hr class="navbar-divider">

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosAudiplanner'); ?>'> Audiplanner </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosComercial'); ?>'> Comercial </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosDiretoriaFinanceiro'); ?>'> Diretoria/Financeiro </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosFiscon'); ?>'> Fiscon </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosKronos'); ?>'> Kronos </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosLegalizacao'); ?>'> Legalizacao </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosSetPessoal'); ?>'> Set. Pessoal </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosStartBI'); ?>'> Start BI </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosTecnologia'); ?>'> Tecnologia </a>

          <a class="navbar-item" href='<?php echo base_url('public/Topicos/topicosPublicidade'); ?>'> Publicidade </a>

        </div>

      </div>

    </div>

    <div class="navbar-end">
      <div class="navbar-item">

        <a class="navbar-item">
          <strong> <?php echo session()->get('user'); ?> </strong>
        </a>

        <div class="buttons">
          <a class="button is-link" href='<?php echo base_url('public/Login/signOut'); ?>'> Sair </a>
        </div>

      </div>
    </div>

</nav>