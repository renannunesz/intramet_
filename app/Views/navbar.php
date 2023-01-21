<nav class="navbar has-shadow is-light" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="http://metodos-rnc.com.br/wp-content/uploads/2021/12/Metodos_horizonta_corrigidol.png" width="150" height="30">
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">

      <a class="navbar-item">
        Geral
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Reuniões
        </a>

        <div class="navbar-dropdown">

          <a class="navbar-item" href="<?php echo base_url('public/Setores'); ?>">
            Cadastro Setor
          </a>

          <a class="navbar-item" href="<?php echo base_url('public/Status'); ?>">
            Cadastro Status
          </a>

          <a class="navbar-item" href="<?php echo base_url('public/Envolvidos'); ?>">
            Cadastro Envolvidos
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item" href="<?php echo base_url('public/Atas'); ?>">
            Nova Ata
          </a>

          <a class="navbar-item" href="<?php echo base_url('public/Topicos'); ?>">
            Novo Tópico
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item" href="#">
            Audiplanner
          </a>
          <a class="navbar-item" href="<?php echo base_url('public/Topicos/topicosComercial'); ?>">
            Comercial
          </a>
          <a class="navbar-item" href="#">
            Diretoria/Financeiro
          </a>

        </div>
      </div>
    </div>

</nav>